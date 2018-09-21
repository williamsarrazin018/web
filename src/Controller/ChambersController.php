<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Chambers Controller
 *
 * @property \App\Model\Table\ChambersTable $Chambers
 *
 * @method \App\Model\Entity\Chamber[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ChambersController extends AppController
{

    public function isAuthorized($user) {
        
        $action = $this->request->getParam('action');
        
        if (in_array($action, ['view', 'add'])) {
            return true;
        }

        // All other actions require a slug.
        $id = $this->request->getParam('pass.0');
        if (!$id) {
            return false;
        }

        if ($user['type'] === 'secretaire') {
            // Check that the article belongs to the current user.
            $chamber = $this->Chambers->findById($id)->first();

            return $chamber->user_id === $user['id'];
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
            'contain' => ['Levels', 'Departments', 'Users']
        ];
        $chambers = $this->paginate($this->Chambers);

        $this->set(compact('chambers'));
    }

    /**
     * View method
     *
     * @param string|null $id Chamber id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $chamber = $this->Chambers->get($id, [
            'contain' => ['Levels', 'Departments', 'Assignments']
        ]);

        $this->set('chamber', $chamber);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $chamber = $this->Chambers->newEntity();
        if ($this->request->is('post')) {
            $chamber = $this->Chambers->patchEntity($chamber, $this->request->getData());
            if ($this->Chambers->save($chamber)) {
                $this->Flash->success(__('The chamber has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chamber could not be saved. Please, try again.'));
        }
        $users = $this->Chambers->Users->find('list', ['limit' => 200]);
        $levels = $this->Chambers->Levels->find('list', ['limit' => 200]);
        $departments = $this->Chambers->Departments->find('list', ['limit' => 200]);
        $this->set(compact('chamber', 'levels', 'departments', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Chamber id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $chamber = $this->Chambers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $chamber = $this->Chambers->patchEntity($chamber, $this->request->getData());
            if ($this->Chambers->save($chamber)) {
                $this->Flash->success(__('The chamber has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chamber could not be saved. Please, try again.'));
        }
        $users = $this->Chambers->Users->find('list', ['limit' => 200]);
        $levels = $this->Chambers->Levels->find('list', ['limit' => 200]);
        $departments = $this->Chambers->Departments->find('list', ['limit' => 200]);
        $this->set(compact('chamber', 'levels', 'departments', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Chamber id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $chamber = $this->Chambers->get($id);
        if ($this->Chambers->delete($chamber)) {
            $this->Flash->success(__('The chamber has been deleted.'));
        } else {
            $this->Flash->error(__('The chamber could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}