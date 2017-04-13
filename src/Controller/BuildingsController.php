<?php
namespace App\Controller;

use App\Controller\AppController;

class BuildingsController extends AppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 10,
        'maxLimit' => 100
    ];

    public function index()
    {
      
      $this->Crud->on('beforePaginate', function (\Cake\Event\Event $event) {
        $event->subject->query->contain(['Users' => ['conditions' => ['active' => true]]]);
      });

      return $this->Crud->execute();
    }


    public function view($id = null)
    {
      $this->Crud->on('beforeFind', function (\Cake\Event\Event $event) {
        $event->subject->query->contain(['Users' => ['conditions' => ['active' => true]]]);
      });

      return $this->Crud->execute();
    }
}
