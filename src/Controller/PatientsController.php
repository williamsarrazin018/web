<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Patients Controller
 *
 * @property \App\Model\Table\PatientsTable $Patients
 *
 * @method \App\Model\Entity\Patient[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PatientsController extends AppController
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
            $patient = $this->Patients->findById($id)->first();

            return $patient->user_id === $user['id'];
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
            'contain' => ['Adresses', 'Users']
        ];
        $patients = $this->paginate($this->Patients);

        $this->set(compact('patients'));
    }

    /**
     * View method
     *
     * @param string|null $id Patient id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $patient = $this->Patients->get($id, [
            'contain' => ['Adresses', 'Users', 'Assignments', 'Files']
        ]);

        $this->set('patient', $patient);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $patient = $this->Patients->newEntity();
        if ($this->request->is('post')) {
            $patient = $this->Patients->patchEntity($patient, $this->request->getData());
            if ($this->Patients->save($patient)) {
                $this->Flash->success(__('The patient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The patient could not be saved. Please, try again.'));
        }
        $adresses = $this->Patients->Adresses->find('list', ['limit' => 200]);
        $users = $this->Patients->Users->find('list', ['limit' => 200]);
        $files = $this->Patients->Files->find('list', ['limit' => 200]);
        $this->set(compact('patient', 'adresses', 'users', 'files'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Patient id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $patient = $this->Patients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $patient = $this->Patients->patchEntity($patient, $this->request->getData());
            if ($this->Patients->save($patient)) {
                $this->Flash->success(__('The patient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The patient could not be saved. Please, try again.'));
        }
        $adresses = $this->Patients->Adresses->find('list', ['limit' => 200]);
        $users = $this->Patients->Users->find('list', ['limit' => 200]);
        $files = $this->Patients->Files->find('list', ['limit' => 200]);
        $this->set(compact('patient', 'adresses', 'users', 'files'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Patient id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $patient = $this->Patients->get($id);
        if ($this->Patients->delete($patient)) {
            $this->Flash->success(__('The patient has been deleted.'));
        } else {
            $this->Flash->error(__('The patient could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
