<?php

namespace App\Http\Controllers;


use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Services\User1Service;
use App\Models\User;
use App\Models\UserJob;
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
    /**
     * Obtains and show one user
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {
    return $this->successResponse($this->user1Service-> obtainUser1($id));
    }
    public function index()
    {
        //
        return $this->successResponse($this-> user1Service->obtainUsers1());
    }

    /**
     * Update an existing user
     * @return Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $rules = [
            'username' => 'max:20',
            'password' => 'max:20',
            'gender' => 'in:Male,Female',
            'jobid' => 'required|numeric|min:1|not_in:0',
            ];

            $this->validate($request, $rules);

            // validate if Jobid is found in the table tbluserjob
            $userjob = UserJob::findOrFail($request->jobid);
            $user = User::findOrFail($id);
            $user->fill($request->all());

            // if no changes happen
            if ($user->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            $user->save();
            return $this->successResponse($user);
    }
    public function add(Request $request){
        $rules = [
            'username' => 'required|max:20',
            'password' => 'required|max:20',
            'gender' => 'required|in:Male,Female',
            'jobid' => 'required|numeric|min:1|not_in:0',
            ];

            $this->validate($request,$rules);

            // validate if Jobid is found in the table tbluserjob
            $userjob = UserJob::findOrFail($request->jobid);
            $user = User::create($request->all());

            return $this->successResponse($user, Response::HTTP_CREATED);
        }
    /**
     * Remove an existing user
     * @return Illuminate\Http\Response
     */
    public function patch(Request $request,$id)
    {
        $rules = [
            'username' => 'max:20',
            'password' => 'max:20',
            'gender' => 'in:Male,Female',
            'jobid' => 'required|numeric|min:1|not_in:0',
            ];

            $this->validate($request, $rules);

            // validate if Jobid is found in the table tbluserjob
            $userjob = UserJob::findOrFail($request->jobid);
            $user = User::findOrFail($id);
            $user->fill($request->all());

            // if no changes happen
            if ($user->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            $user->save();
            return $this->successResponse($user);
    }
    public function delete($id)
    {
    return $this->successResponse($this->user1Service-> deleteUser1($id));
    }
}
