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
class AdressesController extends AppController {

    public $paginate = [
        'page' => 1,
        'fields' => [
            'id', 'adress', 'city', 'zip_code', 'province', 'country', 'details', 'created', 'modified', 'user_id'
        ],
       'sortWhitelist' => [
            'id', 'adress', 'city', 'zip_code', 'province', 'country', 'details'
        ]
    ];

}
