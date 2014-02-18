	public function executeDelete(sfWebRequest $request) {
		$request->checkCSRFProtection();

		$this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

		$success = false;
		try {
			if ($this->getRoute()->getObject()->delete()) {
				$success = true;
			}
		} catch (Doctrine_Exception $ex) {
		}

		if ($success) {
			$this->getUser()->setFlash('notice', 'The item was deleted successfully.');
		} else {
			$this->getUser()->setFlash('error', 'This item cannot be deleted.  It may be referenced elsewhere by other item(s).');
		}

		$this->redirect('@<?php echo $this->getUrlForAction('list') ?>');
	}
