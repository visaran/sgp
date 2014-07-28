<?php
class UsersController extends AppController {

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário inválido!'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('<script> alert("Usuario salvo com sucesso!"); </script>', true));
                $this->redirect(array('action' => 'add'));
            } else {
               $this->Session->setFlash(__('<script> alert("O usuário não pode ser salvo."); </script>', true));
            }
        }
    }

    public function manager() {

        $professores =  $this->User->gerenciaProfessores();
       
        $this->set(compact(array('professores')));

    }

    public function delete ($id){

        $this->User->delete($id);
        $this->redirect(array(
                            'controller' => 'users', 'action' => 'manager'));

    }

    function edit ($id){

        if (empty($this->data)) {
            $this->data = $this->User->find('first', array('conditions' => array('id' => $id)));
            
        }
        else{
                $this->User->save($this->data);
                $this->redirect('manager');
        }

    }

    public function change_pass() {
        $this->User->recursive = 0;
 
        if (!empty($this->data)) {
 
            $this->User->id = $this->Session->read('Auth.User.id');
 
            if ($this->User->save($this->data)) {
                $this->Session->setFlash(__('<script> alert("Senha alterada com sucesso!"); </script>', true));
                $this->redirect(array('controller' => 'reservations', 'action' => 'add'));
            } else {
                $this->Session->setFlash(__('<script> alert("As duas senhas não conferem! Tente novamente."); </script>', true));
            }
        }
 
        $this->data = $this->User->read(null, $this->Session->read('Auth.User.id'));
    }


    public function beforeFilter() {
        parent::beforeFilter();
    }

    /*

    public function login() {
        if ($this->Auth->login()) {

                if ($this->Auth->user('admin')){
                    $this->redirect(array('controller' => 'administrators', 'action' => 'index'));  
                }
                elseif ((date('Y-m-d', strtotime('now'))) == (date('Y-m-d', strtotime('Saturday')))
                        OR
                        ((date('Y-m-d', strtotime('now'))) == (date('Y-m-d', strtotime('Sunday'))))) {
                    $this->redirect(array('controller' => 'reservations', 'action' => 'add'));
                }
                elseif ((date('H:i:s', strtotime('now'))) <= (date('H:i:s', strtotime('5pm')))
                        OR
                        ((date('H:i:s', strtotime('now'))) >= (date('H:i:s', strtotime('11pm'))))) { 
                    $this->redirect(array('controller' => 'reservations', 'action' => 'add'));
                }
                elseif(empty($this->data)){
                    return;
                }
                else {
                    $this->Session->setFlash(__('<script> alert("O sistema está indisponível neste horário! Tente novamente antes das 17hrs ou depois das 23hrs."); </script>', true));
                    $this->request->data = null;
                }
        }

        elseif (empty($this->data)) {
            return;
        }

        else {
            $this->Session->setFlash(__('<script> alert("Registro ou senha inválidos, tente novamente."); </script>', true));
            $this->request->data = null;
        }
    }

    */

    public function login(){
        if ($this->Auth->login()) {
            if ($this->Auth->user('admin')) {
                $this->redirect(array('controller' => 'administrators', 'action' => 'index'));   
            }
            else {
                $this->redirect(array('controller' => 'reservations', 'action' => 'add'));
            }
            
        }
        elseif (empty($this->data)) {
            return;
        } else {   
            $this->Session->setFlash(__('<script> alert("Usuário ou senha inválidos."); </script>', true));
            $this->request->data = null;
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    function edit_projectors (){

        if (empty($this->data)) {
            $this->data = $this->User->find('first', array('conditions' => array('admin' => true)));
            
        }
        else{
                $this->User->save($this->data);
                $this->redirect(array('controller' => 'administrators', 'action'=>'index'));
        }

    }
}
?>
