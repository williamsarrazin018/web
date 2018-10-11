<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MedicalCenters Controller
 *
 * @property \App\Model\Table\MedicalCentersTable $MedicalCenters
 *
 * @method \App\Model\Entity\MedicalCenter[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MedicalCentersController extends AppController
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
            $medicalcenter = $this->MedicalCenters->findById($id)->first();

            return $medicalcenter->user_id === $user['id'];
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
        $medicalCenters = $this->paginate($this->MedicalCenters);
        $user = $this->Auth->user();
        $this->set(compact('medicalCenters', 'user'));
    }

    /**
     * View method
     *
     * @param string|null $id Medical Center id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $medicalCenter = $this->MedicalCenters->get($id, [
            'contain' => ['Adresses', 'Doctors']
        ]);

        $user = $this->Auth->user();
        $this->set('medicalCenter', $medicalCenter);
        $this->set('user', $user);
        
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $medicalCenter = $this->MedicalCenters->newEntity();
        if ($this->request->is('post')) {
            $medicalCenter = $this->MedicalCenters->patchEntity($medicalCenter, $this->request->getData());
            if ($this->MedicalCenters->save($medicalCenter)) {
                $this->Flash->success(__('The medical center has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The medical center could not be saved. Please, try again.'));
        }
        $users = $this->MedicalCenters->Users->find('list', ['limit' => 200]);
        $adresses = $this->MedicalCenters->Adresses->find('list', ['limit' => 200]);
        $user = $this->Auth->user();
        $this->set(compact('medicalCenter', 'adresses', 'users', 'user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Medical Center id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $medicalCenter = $this->MedicalCenters->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $medicalCenter = $this->MedicalCenters->patchEntity($medicalCenter, $this->request->getData());
            if ($this->MedicalCenters->save($medicalCenter)) {
                $this->Flash->success(__('The medical center has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The medical center could not be saved. Please, try again.'));
        }
        $users = $this->MedicalCenters->Users->find('list', ['limit' => 200]);
        $adresses = $this->MedicalCenters->Adresses->find('list', ['limit' => 200]);
        $user = $this->Auth->user();
        $this->set(compact('medicalCenter', 'adresses', 'users', 'user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Medical Center id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $medicalCenter = $this->MedicalCenters->get($id);
        if ($this->MedicalCenters->delete($medicalCenter)) {
            $this->Flash->success(__('The medical center has been deleted.'));
        } else {
            $this->Flash->error(__('The medical center could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
