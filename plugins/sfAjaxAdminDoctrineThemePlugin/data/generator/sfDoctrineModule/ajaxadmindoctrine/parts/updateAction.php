	public function executeUpdate(sfWebRequest $request) {
		$this-><?php echo $this->getSingularName() ?> = $this->getRoute()->getObject();
		$this->form = $this->configuration->getForm($this-><?php echo $this->getSingularName() ?>);

		$this->processForm($request, $this->form);

		$this->setTemplate('edit');

		// Handle AJAX requests.
		if ($this->isAJAXRequest()) {
			return $this->emitJSONParts('edit', array('title', 'header', 'content', 'footer'), false);
		}
	}
