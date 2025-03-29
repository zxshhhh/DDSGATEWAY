<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use DB;
use App\Services\User2Service;

class User2Controller extends Controller
{
    use ApiResponser;

    /**
    * The service to consume the User2 Microservice
    * @var User2Service
    */
    public $user2Service;

    /**
    * Create a new controller instance
    */
    public function __construct(User2Service $user2Service)
    {
        $this->user2Service = $user2Service;
    }

    /**
    * Return the list of users from Site2
    */
    public function index()
    {
        return $this->successResponse($this->user2Service->obtainUsers2());
    }

    public function getUsers()
    {
        
    }

    public function add(Request $request)
    {
        return $this->successResponse($this->user2Service->createUser2($request->all(), Response::HTTP_CREATED));
    }

    public function show($id)
    {
        return $this->successResponse($this->user2Service->obtainUser2($id));
    }

    public function update(Request $request, $id)
    {
        return $this->successResponse($this->user2Service->editUser2($request->all(), $id));
    }

    public function delete($id)
    {
        return $this->successResponse($this->user2Service->deleteUser2($id));  
    }

}
  