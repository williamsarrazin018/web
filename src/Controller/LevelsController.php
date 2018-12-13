<?php
namespace App\Controller;

use App\Controller\AppController;

class LevelsController extends AppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 10,
        'maxLimit' => 100,
        'fields' => [
            'id', 'number', 'user_id'
        ],
        'sortWhitelist' => [
            'id', 'number', 'user_id', 
        ]
    ];
    
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['getLevels']);
        // Set the layout.
        $this->viewBuilder()->setLayout('monopage');
    }
    
    public function getLevels() {
        $this->autoRender = false; // avoid to render view

        $levels = $this->Levels->find('all', [
            'contain' => ['chambers'],
        ]);

        $levelsJ = json_encode($levels);
        $this->response->type('json');
        $this->response->body($levelsJ);
        //$this->set(compact('levels'));
        //$this->set('_serialize', ['levels']);

    }
    
     /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $levels = $this->paginate($this->Levels);
           $this->paginate = [
            'contain' => ['Users']
        ];
           $user = $this->Auth->user();
        $this->set(compact('levels', 'users', 'user'));
        
    }

    /**
     * View method
     *
     * @param string|null $id Level id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $level = $this->Levels->get($id, [
            'contain' => ['Chambers', 'Assignments']
        ]);
        $user = $this->Auth->user();
        $this->set('level', $level);
        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $level = $this->Levels->newEntity();
        if ($this->request->is('post')) {
            $level = $this->Levels->patchEntity($level, $this->request->getData());
            if ($this->Levels->save($level)) {
                $this->Flash->success(__('The level has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The level could not be saved. Please, try again.'));
        }
        $user = $this->Auth->user();
        $users = $this->Levels->Users->find('list', ['limit' => 200]);
        $this->set(compact('level', 'users', 'user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Level id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $level = $this->Levels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $level = $this->Levels->patchEntity($level, $this->request->getData());
            if ($this->Levels->save($level)) {
                $this->Flash->success(__('The level has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The level could not be saved. Please, try again.'));
        }
        $user = $this->Auth->user();
        $users = $this->Levels->Users->find('list', ['limit' => 200]);
        $this->set(compact('level', 'users', 'user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Level id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $level = $this->Levels->get($id);
        if ($this->Levels->delete($level)) {
            $this->Flash->success(__('The level has been deleted.'));
        } else {
            $this->Flash->error(__('The level could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}