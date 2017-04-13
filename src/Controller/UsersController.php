<?php
namespace App\Controller;

use App\Controller\AppController;

class UsersController extends AppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 10,
        'maxLimit' => 100
    ];


    public function index()
    {
      $this->paginate = [
        'contain' => ['Buildings']
      ];

      return $this->Crud->execute();
    }
}