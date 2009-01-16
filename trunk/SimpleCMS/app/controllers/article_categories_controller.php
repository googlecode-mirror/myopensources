<?php
class ArticleCategoriesController extends AppController {

	var $name = 'ArticleCategories';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->ArticleCategory->recursive = 0;
		$this->set('articleCategories', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid ArticleCategory.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('articleCategory', $this->ArticleCategory->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ArticleCategory->create();
			if ($this->ArticleCategory->save($this->data)) {
				$this->Session->setFlash(__('The ArticleCategory has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The ArticleCategory could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid ArticleCategory', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->ArticleCategory->save($this->data)) {
				$this->Session->setFlash(__('The ArticleCategory has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The ArticleCategory could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ArticleCategory->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for ArticleCategory', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ArticleCategory->del($id)) {
			$this->Session->setFlash(__('ArticleCategory deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}


	function admin_index() {
		$this->ArticleCategory->recursive = 0;
		
		$categories = $this->_getCategories();
		$this->set("categories", $categories);
		
		$this->set('articleCategories', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid ArticleCategory.', true));
			$this->redirect(array('action'=>'index'));
		}
		
		$categories = $this->_getCategories();
		$this->set("categories", $categories);
		
		$this->set('articleCategory', $this->ArticleCategory->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->ArticleCategory->create();
			if ($this->ArticleCategory->save($this->data)) {
				$this->Session->setFlash(__('The ArticleCategory has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The ArticleCategory could not be saved. Please, try again.', true));
			}
		}
		$categories = $this->_getCategories();
		$this->set("categories", $categories);
		
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid ArticleCategory', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->ArticleCategory->save($this->data)) {
				$this->Session->setFlash(__('The ArticleCategory has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The ArticleCategory could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ArticleCategory->read(null, $id);
		}
		$categories = $this->_getCategories();
		$this->set("categories", $categories);
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for ArticleCategory', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ArticleCategory->del($id)) {
			$this->Session->setFlash(__('ArticleCategory deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
	
	function _getCategories() {
		$tree_data = $this->ArticleCategory->generatetreelist(null, null, null, '--');
//		debug($tree_data);
		return array( 0=>__("None", true) ) + $tree_data;
	}
	

}
?>