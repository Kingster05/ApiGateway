<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\User2Service;
use DB;

class UserController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the User2 Microservice
     * @var User2Service
     */
    public $user2Service;

    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct(User2Service $user2Service)
    {
        $this->user2Service = $user2Service;
    }

    private $request;

    // Removed duplicate __construct method

    public function getUsers()
    {

    }

    public function index()
    {

    }

    public function add(Request $request){

    }
}
