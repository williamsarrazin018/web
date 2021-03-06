<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Assignments Controller
 *
 * @property \App\Model\Table\AssignmentsTable $Assignments
 *
 * @method \App\Model\Entity\Assignment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AssignmentsController extends AppController
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
            // Check that the   belongs to the current user.
            $assignment = $this->Assigments->findById($id)->first();

            return $assignment->user_id === $user['id'];
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
            'contain' => ['Departments', 'Patients', 'Levels', 'Chambers', 'Users']
        ];
        $assignments = $this->paginate($this->Assignments);
        $user = $this->Auth->user();
        $this->set(compact('assignments', 'user'));
    }

    /**
     * View method
     *
     * @param string|null $id Assignment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $assignment = $this->Assignments->get($id, [
            'contain' => ['Departments', 'Patients', 'Levels', 'Chambers', 'Users']
        ]);
        $user = $this->Auth->user();
        $this->set('assignment', $assignment);
        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $assignment = $this->Assignments->newEntity();
        if ($this->request->is('post')) {
            $assignment = $this->Assignments->patchEntity($assignment, $this->request->getData());
            if ($this->Assignments->save($assignment)) {
                $this->Flash->success(__('The assignment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The assignment could not be saved. Please, try again.'));
        }
        
        // Bâtir la liste des Levels
        $this->loadModel('Levels');
        $levels = $this->Levels->find('list', ['limit' => 200]);

        // Extraire le id du 1er leve;
        $levels = $levels->toArray();
        reset($levels);
        $level_id = key($levels);

        // Bâtir la liste des chambres
        $chambers = $this->Assignments->Chambers->find('list', [
            'conditions' => ['Chambers.level_id' => $level_id],
        ]);
        
        $departments = $this->Assignments->Departments->find('list', ['limit' => 200]);
        $patients = $this->Assignments->Patients->find('list', ['limit' => 200]);
        //$levels = $this->Assignments->Levels->find('list', ['limit' => 200]);
        //$chambers = $this->Assignments->Chambers->find('list', ['limit' => 200]);
        $users = $this->Assignments->Users->find('list', ['limit' => 200]);
        $user = $this->Auth->user();
        $this->set(compact('assignment', 'departments', 'patients', 'users', 'user', 'chambers', 'levels'));
        $this->set('_serialize', ['assignment', 'departments', 'patients', 'users', 'user', 'chambers', 'levels']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Assignment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $assignment = $this->Assignments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $assignment = $this->Assignments->patchEntity($assignment, $this->request->getData());
            if ($this->Assignments->save($assignment)) {
                $this->Flash->success(__('The assignment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The assignment could not be saved. Please, try again.'));
        }
        
        // Bâtir la liste des Levels
        $this->loadModel('Levels');
        $levels = $this->Levels->find('list', ['limit' => 200]);

        // Extraire le id du 1er leve;
        $levels = $levels->toArray();
        reset($levels);
        $level_id = key($levels);

        // Bâtir la liste des chambres
        $chambers = $this->Assignments->Chambers->find('list', [
            'conditions' => ['Chambers.level_id' => $level_id],
        ]);
        
        $departments = $this->Assignments->Departments->find('list', ['limit' => 200]);
        $patients = $this->Assignments->Patients->find('list', ['limit' => 200]);
        
        $users = $this->Assignments->Users->find('list', ['limit' => 200]);
        $user = $this->Auth->user();
        $this->set(compact('assignment', 'departments', 'patients', 'levels', 'chambers', 'users', 'user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Assignment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $assignment = $this->Assignments->get($id);
        if ($this->Assignments->delete($assignment)) {
            $this->Flash->success(__('The assignment has been deleted.'));
        } else {
            $this->Flash->error(__('The assignment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
