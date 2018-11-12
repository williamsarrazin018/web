<?php
namespace App\Controller;

use App\Controller\AppController;

class LevelsController extends AppController
{
    public $paginate = [
        'page' => 1,
        'fields' => [
            'id', 'number', 'user_id', 'created', 'modified'
        ],
        'sortWhitelist' => [
            'id', 'number', 'user_id', 
        ]
    ];
}