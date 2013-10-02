<?php
/**
 * CakePHP Account
 * @author Eric
 */
App::uses('AppModel', 'Model');

class Account extends AppModel {
    public $primaryKey = 'id';
    
    public $hasAndBelongsToMany = array(
	'Role' => array(
	    'className' => 'Role',
	    'joinTable' => 'roles_users',
	    'foreignKey' => 'user_id',
	    'assosciationForeignKey' => 'role_id',
	    'unique' => 'keepExisting'
	)
    );
    public $hasMany = array(
	'RoleUser' => array(
	    'className' => 'RoleUser',
	    'foreignKey' => 'user_id',
	    'dependant' => true
	)
    );
}

