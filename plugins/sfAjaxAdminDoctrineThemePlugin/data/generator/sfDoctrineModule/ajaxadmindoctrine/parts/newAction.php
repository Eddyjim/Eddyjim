	public function executeNew(sfWebRequest $request) {
		$this->form = $this->configuration->getForm();
		$this-><?php echo $this->getSingularName() ?> = $this->form->getObject();

		// Handle AJAX requests.
		if ($this->isAJAXRequest()) {
			return $this->emitJSONParts('new', array('title', 'header', 'content', 'footer'), true);
		}
	}
