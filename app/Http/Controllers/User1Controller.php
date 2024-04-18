<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\User1Service;
use DB;

class User1Controller extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the User1 Microservice
     * @var User1Service
     */
    public $user1Service;

    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct(User1Service $user1Service)
    {
        $this->user1Service = $user1Service;
    }

    private $request;

    // Removed duplicate __construct method

    public function getUsers()
    {

    }

    public function index()
    {
        //
        return $this->successResponse($this-> user1Service->obtainUsers1());
    }


    public function add(Request $request){

    }
}
