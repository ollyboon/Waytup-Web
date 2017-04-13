<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

class RoomsController extends AppController
{
	
	public $paginate = [
        'page' => 1,
        'limit' => 500,
        'maxLimit' => 500,
    ];

	public function index() {
		
		$this->Crud->on('beforePaginate', function (\Cake\Event\Event $event) {
        	$event->subject->query->contain(['Buildings']);
      	});
		
		$this->Crud->execute();
	}

}