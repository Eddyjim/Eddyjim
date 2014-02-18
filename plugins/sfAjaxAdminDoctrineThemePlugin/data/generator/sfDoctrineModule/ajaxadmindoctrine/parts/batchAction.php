	public function executeBatch(sfWebRequest $request) {
		$request->checkCSRFProtection();

		if (!$ids = $request->getParameter('ids')) {
			$this->getUser()->setFlash('error', 'Please select at least one item.');

			$this->redirect('@<?php echo $this->getUrlForAction('list') ?>');
		}

		if (!$action = $request->getParameter('batch_action')) {
			$this->getUser()->setFlash('error', 'Please select an action to execute on the selected items.');

			$this->redirect('@<?php echo $this->getUrlForAction('list') ?>');
		}

		if (!method_exists($this, $method = 'execute'.ucfirst($action))) {
			throw new InvalidArgumentException(sprintf('You must create a "%s" method for action "%s"', $method, $action));
		}

		if (!$this->getUser()->hasCredential($this->configuration->getCredentials($action))) {
			$this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
		}

		$validator = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => '<?php echo $this->getModelClass() ?>'));
		try {
			// validate ids
			$ids = $validator->clean($ids);

			// execute batch
			$this->$method($request);
		} catch (sfValidatorError $e) {
			$this->getUser()->setFlash('error', 'A problem occurred when processing the selected items: some items do not exist anymore.');
		}

		$this->redirect('@<?php echo $this->getUrlForAction('list') ?>');
	}

	protected function executeBatchDelete(sfWebRequest $request) {
		$ids = $request->getParameter('ids');

		$records = Doctrine_Query::create()
			->from('<?php echo $this->getModelClass() ?>')
			->whereIn('<?php echo $this->getPrimaryKeys(true) ?>', $ids)
			->execute();

		$numAttempted = 0;
		$numDeleted = 0;
		foreach ($records as $record) {
			$numAttempted++;
			try {
				if ($record->delete()) {
					$numDeleted++;
				}
			} catch (Doctrine_Exception $ex) {
			}
		}

		if ($numDeleted == 0) {
			$this->getUser()->setFlash('error', 'None of the selected items could be deleted.  They may be referenced elsewhere by other item(s).');
		} else if ($numDeleted < $numAttempted) {
			$this->getUser()->setFlash('error', 'Some of the selected items could not be deleted.  They may be referenced elsewhere by other item(s).');
			$this->getUser()->setFlash('notice', 'Some of the selected items have been deleted successfully.');
		} else {
			$this->getUser()->setFlash('notice', 'The selected items have been deleted successfully.');
		}
		$this->redirect('@<?php echo $this->getUrlForAction('list') ?>');
	}
