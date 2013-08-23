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

}
?>