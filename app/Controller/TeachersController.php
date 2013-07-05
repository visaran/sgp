<?php
	class TeachersController extends AppController{

		public $helpers = array('Form');

		function index(){	
			$this->set('teachers', $this->Teacher->find("all"));
		}

		function add(){
			if (!empty($this->data)){
				$this->Teacher->save($this->data);
				$this->redirect('index');
			}
		}

		function edit($id){
			if (empty($this->data)){
				$this->data = $this->Teacher->find("first", array('conditions' => array('id' => $id)));
			} else{
				$this->Teacher->save($this->data);
				$this->redirect('index');
			}
		}

		function delete($id){
			$this->Teacher->delete($id);
			$this->redirect('index');
		}
}
?>