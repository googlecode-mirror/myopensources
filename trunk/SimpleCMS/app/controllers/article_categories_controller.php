<?php
class ArticleCategoriesController extends AppController {

	var $name = 'ArticleCategories';
	var $helpers = array('Html', 'Form');
	var $breakcrumb = null;
		
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
		
		$this->breakcrumb = array(
			'nav' => array(
				array('text'=> __("ArticleCategory", true), 'url'=>'/admin/article_categories' ),
				array('text'=>__("Listing", true) ),
				
			),
			'actions' => array(
				array('text'=> __("New", true), 'url'=>'/admin/article_categories/add', 'class'=>'act-new' ),
				array('text'=> __("Delete", true), 'url'=>'###', 'class'=>'act-del' ),
				//array('text'=> __("Search", true), 'url'=>'/admin/article_categories/add', 'class'=>'act-find' ),
				
			)
		);
		
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid ArticleCategory.', true));
			$this->redirect(array('action'=>'index'));
		}
		
		$categories = $this->_getCategories();
		$this->set("categories", $categories);
		
		$this->set('articleCategory', $this->ArticleCategory->read(null, $id));
		
		// breakcrumb
		$this->breakcrumb = array(
			'nav' => array(
				array('text'=> __("ArticleCategory", true), 'url'=>'/admin/article_categories' ),
				array('text'=>__('View', true)),
				
			),
			'actions' => array(
				array('text'=> __('Listing', true), 'url'=>'/admin/article_categories', 'class'=>'act-list' ),
				array('text'=> __("New", true), 'url'=>'/admin/article_categories/add', 'class'=>'act-new' ),
				array('text'=> __("Edit", true), 'url'=>'/admin/article_categories/edit/'.$id, 'class'=>'act-edit' ),
				array('text'=> __("Delete", true), 'url'=>'/admin/article_categories/delete/'.$id, 'class'=>'act-del', 'js'=> sprintf(__('Are you sure you want to delete # %s?', true), $id) ),
				
			)
		);
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

		$this->breakcrumb = array(
			'nav' => array(
				array('text'=> __("ArticleCategory", true), 'url'=>'/admin/article_categories' ),
				array('text'=>__("New", true)),
				
			),
			'actions' => array(
				array('text'=> __('Listing', true), 'url'=>'/admin/article_categories', 'class'=>'act-list' ),
				
			)
		);
		
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
		
		// breakcrumb
		$this->breakcrumb = array(
			'nav' => array(
				array('text'=> __("ArticleCategory", true), 'url'=>'/admin/article_categories' ),
				array('text'=>__("Edit", true)),
				
			),
			'actions' => array(
				array('text'=> __('Listing', true), 'url'=>'/admin/article_categories', 'class'=>'act-list' ),
				array('text'=> __("Delete", true), 'url'=>'/admin/article_categories/delete/'.$id, 'class'=>'act-del', 'js'=> sprintf(__('Are you sure you want to delete # %s?', true), $id) ),
				
			)
		);
		
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for ArticleCategory', true));
			$this->reidirect(array('action'=>'index'));
		}
		if ($this->ArticleCategory->del($id)) {
			$this->Session->setFlash(__('ArticleCategory deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
	
	function admin_delSelected() {
		if ( $this->ArticleCategory->delIds($this->params['form']['all']) ) {
			$this->Session->setFlash(__('Deleted select records', true));
			$this->redirect(array('action'=>'index'));
		}
	}
	
	function _getCategories() {
		$tree_data = $this->ArticleCategory->generatetreelist(null, null, null, '--');
		return array( 0=>__("None", true) ) + $tree_data;
	}
	
	function beforeRender() {
		if (!empty($this->breakcrumb) ) {
			$this->set("breakcrumb", $this->breakcrumb);
		}
	}
	
}
?>