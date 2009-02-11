<?php
/**
 *
 * Article controller, 
 * File: /app/controllers/articles_controller.php
 *
 * @package    App
 * @subpackage Controller
 * @author  John Meng (孟远螓) arzen1013@gmail.com 2009-2-11
 * @version 1.0.0 $id$
 */

class ArticlesController extends AppController {

	var $name = 'Articles';
	var $components = array( 
		'Upload'=>array(
			'image_library'	=> 'gd2',//gd, gd2, magickwand
			'encrypt_name' 	=> TRUE,
			'operate' 		=> 'resize',//[none, resize, crop, rotate, watermark]	
			'upload_type' 	=> 'article',
			'width'			=> 120,
			'height'		=> 120,
	) 
	); 
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Article->recursive = 0;
		$this->set('articles', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Article.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('article', $this->Article->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Article->create();
			if ($this->Article->save($this->data)) {
				$this->Session->setFlash(__('The Article has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Article could not be saved. Please, try again.', true));
			}
		}
		$articleCategories = $this->Article->ArticleCategory->find('list');
		$this->set(compact('articleCategories'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Article', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Article->save($this->data)) {
				$this->Session->setFlash(__('The Article has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Article could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Article->read(null, $id);
		}
		$articleCategories = $this->Article->ArticleCategory->find('list');
		$this->set(compact('articleCategories'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Article', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Article->del($id)) {
			$this->Session->setFlash(__('Article deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}


	function admin_index() {
		$this->Article->recursive = 0;
		$this->set('articles', $this->paginate());
		
		$this->breakcrumb = array(
			'nav' => array(
				array('text'=> __("ArticleCategory", true), 'url'=>'/admin/article_categories' ),
				array('text'=>__("Listing", true) ),
				
			),
			'actions' => array(
				array('text'=> __("New", true), 'url'=>'/admin/articles/add', 'class'=>'act-new' ),
				array('text'=> __("Delete", true), 'url'=>'###', 'class'=>'act-del' ),
				//array('text'=> __("Search", true), 'url'=>'/admin/article_categories/add', 'class'=>'act-find' ),
				
			)
		);
		
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Article.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('article', $this->Article->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {

			// do validate
			$this->Article->set($this->data);
			if ( $this->Article->validates() ) {
				
				if ($this->data['Article']['photo']['size'] > 0 ) {
					$this->Upload->upload('photo', 'Article');
				} else {
					$this->data['Article']['photo'] = "";
				}
				
				$this->Article->create();
				if ( $this->Article->save($this->data, FALSE) ) {
					$this->Session->setFlash(__('The Article has been saved', true));
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash(__('The Article could not be saved. Please, try again.', true));
				}
				
			}
			
		}
		$articleCategories = $this->Article->ArticleCategory->find('list');
		$this->set(compact('articleCategories'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Article', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Article->save($this->data)) {
				$this->Session->setFlash(__('The Article has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Article could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Article->read(null, $id);
		}
		$articleCategories = $this->Article->ArticleCategory->find('list');
		$this->set(compact('articleCategories'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Article', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Article->del($id)) {
			$this->Session->setFlash(__('Article deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

	function beforeRender() {
		if (!empty($this->breakcrumb) ) {
			$this->set("breakcrumb", $this->breakcrumb);
		}
	}
	
}
?>