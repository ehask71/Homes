<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * CakePHP Properties
 * @author EricMain
 */
App::uses('Model', 'Model');

class Properties extends AppModel {
    
    public $name = 'Properties';
    public $primaryKey = 'id';
   
    public $hasMany = array(
        'Image' => array(
            'className' => 'Attachment',
            'foreignKey' => 'foreign_key',
            'conditions' => array(
                'Image.model' => 'Properties',
            ),
        ),
    );

}
