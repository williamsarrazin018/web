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
}