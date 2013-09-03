<?php
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {
    public $name = 'User';
    public $hasMany = array(
        'Reservation' => array(
            'className' => 'Reservation'
            )
        );
    public $validate = array(
            'username' => array(
            'required' => array(
             'rule' => array('notEmpty'),
                'message' => 'Digite o registro!'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Digite a senha!'
            ),
            'Match passwords'=>array(
                'rule' => 'matchPasswords',
                'message' => 'Senha/Confirmação da Senha não são iguais'
            )
        ),

        'old_password' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Campo obrigatório',
                //'allowEmpty' => false,
                'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            )
        ),  

        'confirm_password' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Campo obrigatório',
                //'allowEmpty' => false,
                'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            )
        )
    );

    public function beforeSave($options = array()) {
    
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }

    public function gerenciaProfessores(){

        $professores = $this->find('all', 
            array(
                //'conditions' => $professores,
                'order' => array('nome asc'),
                'recursive' => 0,
                'fields' => array('id', 'username', 'nome', 'email','admin')
                ));

        $this->set(compact(array('professores')));

        return $professores;
    }

    public function matchPasswords($data) {
        
        //if($this->checkPassword($data)) {
            if($data['password'] == $this->data['User']['confirm_password']) {
                return true;
            }
            $this->invalidate('confirm_password', 'matchPasswords');
            return false;


        //}
    }
 
 
    public function checkPassword($data) {
        $usuario = $this->find('first', array(
            'conditions' => array(
                'User.id' => $this->data['User']['id'],
                'User.password' => AuthComponent::password($this->data['User']['old_password'])
            )
        ));
 
        if($usuario) {
            return true;
        }
 
        $this->invalidate('old_password', 'matchPasswords');
        return false;       
    }

}
?>