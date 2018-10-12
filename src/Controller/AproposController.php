<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Adresses Controller
 *
 * @property \App\Model\Table\AdressesTable $Adresses
 *
 * @method \App\Model\Entity\Adress[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AproposController extends AppController
{

    public function isAuthorized($user) {
        
        $action = $this->request->getParam('action');
        
        if (in_array($action, ['view'])) {
            return true;
        }
        
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $user = $this->Auth->user();
        $this->set(compact('user'));
    }

    
}
