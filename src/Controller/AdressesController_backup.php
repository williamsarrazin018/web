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
class AdressesController extends AppController
{

    public function isAuthorized($user) {
        
        $action = $this->request->getParam('action');
        
        if ($user['type'] === 'secretaireNC') {
 
            if (in_array($action, ['view'])) {
                   return true;
            }

            
        }
        
        if (in_array($action, ['view', 'add'])) {
            return true;
        }

        
        
        // All other actions require a slug.
        $id = $this->request->getParam('pass.0');
        if (!$id) {
            return false;
        }

        if ($user['type'] === 'secretaire') {
            // Check that the   belongs to the current user.
            $adress = $this->Adresses->findById($id)->first();
            
            if($adress->user_id === $user['id']){
                if (in_array($action, ['view', 'add', 'edit', 'delete'])) {
                    return true;
                }
                    
            } 

            
        } else if ($user['type'] === 'admin'){
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
        $adresses = $this->paginate($this->Adresses);
        $user = $this->Auth->user();
        $this->set(compact('adresses', 'user'));
    }

    /**
     * View method
     *
     * @param string|null $id Adress id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adress = $this->Adresses->get($id, [
            'contain' => ['MedicalCenters', 'Patients']
        ]);
        $user = $this->Auth->user();
        $this->set('adress', $adress);
        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adress = $this->Adresses->newEntity();
        if ($this->request->is('post')) {
            $adress = $this->Adresses->patchEntity($adress, $this->request->getData());
            if ($this->Adresses->save($adress)) {
                $this->Flash->success(__('The adress has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adress could not be saved. Please, try again.'));
        }
        $user = $this->Auth->user();
        $users = $this->Adresses->Users->find('list', ['limit' => 200]);
        $this->set(compact('adress', 'users', 'user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Adress id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adress = $this->Adresses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adress = $this->Adresses->patchEntity($adress, $this->request->getData());
            if ($this->Adresses->save($adress)) {
                $this->Flash->success(__('The adress has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adress could not be saved. Please, try again.'));
        }
        $users = $this->Adresses->Users->find('list', ['limit' => 200]);
        $user = $this->Auth->user();
        $this->set(compact('adress', 'users', 'user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Adress id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adress = $this->Adresses->get($id);
        if ($this->Adresses->delete($adress)) {
            $this->Flash->success(__('The adress has been deleted.'));
        } else {
            $this->Flash->error(__('The adress could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
