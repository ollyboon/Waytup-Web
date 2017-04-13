<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

class BuildingsController extends AppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 500,
        'maxLimit' => 500,
    ];

	public function view($id = null)
    {
      $this->Crud->on('beforeFind', function (\Cake\Event\Event $event) {
        $event->subject->query->contain(['Users' => ['conditions' => ['active' => true]]]);
      });

      return $this->Crud->execute();
    }

   
    
}

