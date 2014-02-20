<?php

/**
 * CakePHP HomeController
 * @author Eric
 */
App::uses('AppController', 'Controller');

class HomeController extends AppController {

    public $name = 'Home';
    public $uses = array('ZipCodes', 'Lead');
    public $helpers = array('Html', 'Form', 'Session');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }

    public function index() {
        if (isset($this->request->params['slug'])) {
            $this->loadModel('Account');
            if ($this->Account->checkAcctSlug($this->request->params['slug'])) {
                
            } else {
                throw new NotFoundException('Sorry we seemed to have misplaced it.');
            }
        }
        $this->layout = 'index';
    }

    public function sell() {
        if ($this->request->is('post')) {
            // From the Index
            if (isset($this->request->data['ZipCodes']['fzip']) && isset($this->request->data['ZipCodes']['ffname']) && isset($this->request->data['ZipCodes']['femail'])) {
                $zipinfo = $this->ZipCodes->getZipInfo($this->request->data['ZipCodes']['fzip']);
                $data = array('Lead' => array(
                        'firstname' => $this->request->data['ZipCodes']['ffname'],
                        'lastname' => $this->request->data['ZipCodes']['flname'],
                        'email' => $this->request->data['ZipCodes']['femail'],
                        'phone' => $this->request->data['ZipCodes']['fphone'],
                        'zip' => $this->request->data['ZipCodes']['fzip'],
                        'city' => (isset($zipinfo['ZipCodes']['City'])) ? $zipinfo['ZipCodes']['City'] : '',
                        'state' => (isset($zipinfo['ZipCodes']['State'])) ? $zipinfo['ZipCodes']['State'] : '',
                        'address' => $this->request->data['ZipCodes']['faddress']
                ));
                $this->loadModel('Tmplead');
                $data['Tmplead'] = $data['Lead'];
                if ($this->Tmplead->save($data)) {
                    $data['Lead']['tmplead'] = $this->Tmplead->getLastInsertID();
                }
                unset($data['Tmplead']);
                $this->request->data = $data;
            } else {
                // From the Sell Page Insert the Lead
                if ($this->Lead->validateLead()) {
                    $tmplead = ($this->request->data['Lead']['tmplead'] != '') ? $this->request->data['Lead']['tmplead'] : 0;
                    unset($this->request->data['Lead']['tmplead']);
                    if ($this->Lead->save($this->request->data)) {
                        if ($tmplead != 0) {
                            $this->loadModel('Tmplead');
                            $data['Tmplead']['id'] = $tmplead;
                            $this->Tmplead->delete($tmplead);
                        }
                        $this->Session->setFlash('Saved');
                        $this->redirect('/');
                    }
                } else {
                    $this->Session->setFlash('Unable To Save');
                }
            }
        }
        // Check for Slug
        if (isset($this->request->params['county']) && isset($this->request->params['state'])) {
            // We have a Slug lets Check for an Active Account
            $this->loadModel('Account');
            if ($account = $this->Account->getAccountByCounty($this->request->params['state'], str_replace('-', ' ', $this->request->params['county']))) {
                $this->set('account', $account);
            }
        } else {
            
        }
    }

    public function contact() {
        if ($this->request->is('post')) {
            
        }
    }

    public function buy() {
        
    }

    public function why() {
        
    }

    public function terms() {
        
    }

    public function privacy() {
        
    }

    // Admin 
    public function admin_index() {
        $this->redirect('/admin/dashboard');
    }

    public function admin_dashboard() {
        $last15 = $this->Lead->chartLast15day();
        $this->set('last15', $last15);
        $this->loadModel('Account');
        $lastusers = $this->Account->find('all', array(
            'order' => array('Account.created DESC'),
            'limit' => 5
        ));
        $this->set(compact('lastusers'));

        //mail('ehask71@gmail.com','Last count',print_r($last15,1));
    }

}
