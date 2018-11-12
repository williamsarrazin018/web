
<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

class LevelsController extends AppController
{
    public $paginate = [
        'page' => 1,
        'sortWhitelist' => [
            'id', 'number', 'user_id'
        ]
    ];
}