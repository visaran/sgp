<?php
class ProjectorsController extends AppController {

	public $helpers = array('Form');

	function index () {

		$this->set('projectors', $this->Projector->find('all'));

	}

	function add (){

		if (!empty($this->data)) {
			$this->Projector->save($this->data);
			$this->redirect('index');
		}

	}

	function edit ($id){

		if (empty($this->data)) {
			$this->data = $this->Projector->find('first', array('conditions' => array('id' => $id)));
			
		}
		else{
				$this->Projector->save($this->data);
				$this->redirect('index');
		}

	}

	function delete ($id){

		$this->Projector->delete($id);
		$this->redirect('index');

	}




}

?>