<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Cocktails Controller
 *
 * @property \App\Model\Table\CocktailsTable $Cocktails
 *
 * @method \App\Model\Entity\Cocktail[] paginate($object = null, array $settings = [])
 */
class LevelsController extends AppController {

    public $paginate = [
        'page' => 1,
        'limit' => 10,
        'maxLimit' => 15,
        /*        'fields' => [
          'id', 'name', 'description'
          ],
         */ 'sortWhitelist' => [
            'id', 'number', 'user_id'
        ]
    ];

    public function initialize() {
        parent::initialize();
        // Use the Bootstrap layout from the plugin.
        // $this->viewBuilder()->setLayout('admin');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $levels = $this->paginate($this->Levels);

        $this->set(compact('levels'));
        $this->set('_serialize', ['levels']);
    }

    /**
     * View method
     *
     * @param string|null $id Cocktail id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $level = $this->Levels->get($id, [
            'contain' => []
        ]);

        $this->set('level', $level);
        $this->set('_serialize', ['level']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $level = $this->Levels->newEntity();
        if ($this->request->is('post')) {
            $level = $this->Levels->patchEntity($level, $this->request->getData());
            if ($this->Levels->save($level)) {
                $this->Flash->success(__('The level has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The level could not be saved. Please, try again.'));
        }
        $this->set(compact('level'));
        $this->set('_serialize', ['level']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cocktail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
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
        $this->set(compact('level'));
        $this->set('_serialize', ['level']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cocktail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
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
