	public function executeEdit(sfWebRequest $request) {
		$this-><?php echo $this->getSingularName() ?> = $this->getRoute()->getObject();
		$this->form = $this->configuration->getForm($this-><?php echo $this->getSingularName() ?>);

		// Handle AJAX requests.
		if ($this->isAJAXRequest()) {
			return $this->emitJSONParts('edit', array('title', 'header', 'content', 'footer'), false);
		}
	}
