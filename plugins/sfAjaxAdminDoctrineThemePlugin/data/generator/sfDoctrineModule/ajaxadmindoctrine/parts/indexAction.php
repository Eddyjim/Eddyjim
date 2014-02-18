	public function executeIndex(sfWebRequest $request) {
		// sorting
		if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort'))) {
			$this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
		}

		// pager
		if ($request->getParameter('page')) {
			$this->setPage($request->getParameter('page'));
		}

		$this->pager = $this->getPager();
		$this->sort = $this->getSort();

		$this->form = $this->configuration->getForm();
		$this-><?php echo $this->getSingularName() ?> = $this->form->getObject();

		// Handle AJAX requests.
		if ($this->isAJAXRequest()) {
			return $this->emitJSONParts('list', array('list'));
		}
	}
