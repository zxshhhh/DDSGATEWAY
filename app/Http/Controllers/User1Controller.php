<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponseTrait;
use App\Models\User;
use App\Services\User1Service;
use DB;

class User1Controller extends Controller {
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
        return $this->successResponse($this->user1Service->obtainUsers1());
    }

    public function getUsers(){
        $users = User::all();
        return response()->json($users, 200);
    }

    public function add(Request $request) {
        $rules = [
            'username' => 'required|max:20',
            'password' => 'required|max:20',
            'gender' => 'required|in:Male,Female',
        ];
        $this->validate($request, $rules);
        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    public function show($id) {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request, $id) {
        $rules = [
            'username' => 'max:20',
            'password' => 'max:20',
            'gender' => 'in:Male,Female',
        ];
        $this->validate($request, $rules);
        $user = User::findOrFail($id);
        $user->fill($request->all());

        if ($user->isClean()) {
            return response()->json(['error' => 'At least one value must change'], 422);
        }

        $user->save();
        return response()->json($user);
    }

    public function delete($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
