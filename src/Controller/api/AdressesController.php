<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

class AdressesController extends AppController {

    public $paginate = [
        'page' => 1,
        'limit' => 5,
        'maxLimit' => 15,
       'sortWhitelist' => [
            'id', 'adress', 'city', 'zip_code', 'province', 'country', 'details', 'created', 'modified', 'user_id'
        ]
    ];

}
