<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponseTrait;
use App\Models\User;
use App\Services\User1Service;
use DB;

class UserController extends Controller {
    use ApiResponseTrait;
    private $request;

    /**
     * The service to consume the User1 Microservice
     * @var User1Service
     */
    public $user1Service;

    /**
     * Create a new controller instance
     * @param Request $request
     * @param User1Service $user1Service
     */
    public function __construct(Request $request, User1Service $user1Service)
    {
        $this->request = $request;
        $this->user1Service = $user1Service;
    }
    /**
    * Return the list of users
    * @return \Illuminate\Http\Response
    */

    public function index()
    {
    //
    }

    public function getUsers(){

    }

    public function add(Request $request) {

    }

    public function show($id) {

    }

    public function update(Request $request, $id) {

    }

    public function delete($id) {

    }
}
