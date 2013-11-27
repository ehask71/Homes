<?php

/*
 * Copyright 2013 EricMain.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * CakePHP AuthHelper
 * @author EricMain
 */
class AuthHelper extends AppHelper {

    public $helpers = array();

    public function __construct(View $View, $settings = array()) {
        parent::__construct($View, $settings);
    }

    public function beforeRender($viewFile) {
        
    }

    public function afterRender($viewFile) {
        
    }

    public function beforeLayout($viewLayout) {
        
    }

    public function afterLayout($viewLayout) {
        
    }

    public static function roles() {
        $roles = AuthComponent::user('Role');
        if (!is_array($roles)) {
            return $roles;
        }
        if (isset($roles[0]['id'])) {
            $roles = Hash::extract($roles, '{n}.id');
        }
        return $roles;
    }

    public static function hasRole($ownRole, $providedRoles = null) {
        if ($providedRoles !== null) {
            $roles = $providedRoles;
        } else {
            $roles = self::roles();
        }
        if (is_array($roles)) {
            if (in_array($ownRole, $roles)) {
                return true;
            }
        } elseif (!empty($roles)) {
            if ($ownRole == $roles) {
                return true;
            }
        }
        return false;
    }

}
