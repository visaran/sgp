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
        ),
        'confirm_password' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Campo obrigatório',
                'required' => false,
            ),
            'Match passwords'=>array(
                'rule' => 'matchPasswords',
                'message' => 'Senha/Confirmação da Senha não são iguais'
            )
        ),
        'limite_proj' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Apenas números são permitidos'
             ),
            'maxlength' => array(
                'rule' => array('maxLength', '3'),
                'message' => 'Máximo de 3 dígitos'
            ),
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
                'order' => array('nome asc'),
                'recursive' => 0,
                'fields' => array('id', 'username', 'nome', 'email','admin', 'limite_proj')
                ));

        $this->set(compact(array('professores')));

        return $professores;
    }

    public function matchPasswords() {
        $senhas = $this->data['User'];
        return ($senhas['password'] == $senhas['confirm_password']);
    }
}
?>