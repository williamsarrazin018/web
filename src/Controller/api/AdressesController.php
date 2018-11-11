<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;

class AdressesController extends AppController {

    public $paginate = [
        'page' => 1,
        'limit' => 10,
        'maxLimit' => 100,
       'sortWhitelist' => [
            'id', 'adress', 'city', 'zip_code', 'province', 'country', 'details', 'created', 'modified', 'user_id'
        ]
    ];

}
