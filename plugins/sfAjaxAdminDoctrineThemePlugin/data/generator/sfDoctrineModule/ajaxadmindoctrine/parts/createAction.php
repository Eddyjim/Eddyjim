	public function executeCreate(sfWebRequest $request) {
		$this->form = $this->configuration->getForm();
		$this-><?php echo $this->getSingularName() ?> = $this->form->getObject();

		$this->processForm($request, $this->form);

		$this->setTemplate('new');

		// Handle AJAX requests.
		if ($this->isAJAXRequest()) {
			return $this->emitJSONParts(basename($this->getTemplate()), array('title', 'header', 'content', 'footer'), true);
		}
	}
