<?php
namespace App\Controller\Api;


use App\Controller\Api\AppController;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;

class UsersController extends AppController {
	private $Buildings;
	
    public $paginate = [
        'page' => 1,
        'limit' => 500,
        'maxLimit' => 15,
    ];
    


    public function add($id = null) {
	    
	      
		$this->Crud->on('afterSave', function (\Cake\Event\Event $event) {	  

		  $building_id = $event->subject()->entity->building_id;
		  
		  $this->Buildings = TableRegistry::get('Buildings');

		  $building = $this->Buildings->get($building_id);

		  $building->active_users += 1; 
		  if($this->Buildings->save($building)) {
			$this->log('active_users + 1' , 'debug');  
		  }
		  
	    });
	    
	    
		return $this->Crud->execute();
    }
    
    public function edit($id = null) {
	    
	      

		$this->Crud->on('afterSave', function (\Cake\Event\Event $event) {
			
			$building_id = $event->subject()->entity->building_id;	  
						
			$this->Buildings = TableRegistry::get('Buildings');
			
			$building = $this->Buildings->get($building_id);
				
// 			if $building->active_users >=0 {
			$building->active_users -= 1;	
				if($this->Buildings->save($building)){
					$this->log('active_users - 1' , 'debug');
				}
// 		}	 
	    });
 
		return $this->Crud->execute();
    }


}