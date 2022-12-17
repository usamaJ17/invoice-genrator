<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Http\Requests;
use App\DataTables\UserDataTable;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\ProfileUserRequest;
use App\Http\Controllers\AppBaseController;
use App\User;
use Illuminate\Http\Request;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $UserRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }
     /**
     * Get users for select2 plugin.
     *
     * @return Response
     */
    public function getUser(Request $request)
    {
        $search = $request->name;
    
        if($search == ''){
            $users = $this->userRepository->model()::orderby('name','asc')->select('id','name')->limit(5)->get(); 
        }else{
            $users =$this->userRepository->model()::orderby('name','asc')->select('id','name')->where('name', 'like', '%' .$search . '%')->limit(5)->get();
        }
    
        $response = array();
        foreach($users as $user){
            $response[] = array(
                "id"=>$user->id,
                "text"=>$user->name
            );
        }
        return response()->json($response); 
    }
    // Add company by ajax
    public function addUser(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'user_name' => 'required',
        ]);

        if ($validator->fails())
        {
            $errors = $validator->messages()->get('*');
            return response()->json($errors, 422);
        }

        $input = $request->all();
        $user = $this->userRepository->invoiceUser([
            'name' => $input['user_name']
        ]);
        
        if($user)
            return response()->json($user);
        else
            return response()->json('Unable to add user!', 423);
    }
    /**
     * Show the form for creating a new SystemUser.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created SystemUser in storage.
     *
     * @param CreateSystemUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();

        $user = $this->userRepository->createUser($input);

        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified SystemUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified SystemUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);
        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified SystemUser in storage.
     *
     * @param  int              $id
     * @param UpdateSystemUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $user = $this->userRepository->updateUser($request, $user);

        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $status = $this->userRepository->delete($id);
        if($status)
            Flash::success('User deleted successfully.');
        else
            Flash::error(__('messages.permisssion_error'));


        return redirect(route('users.index'));
    }

    // Get Collectors Details
    public function get_collectors()
    {
        $users = $this->userRepository->getCollectors();

        return response()->json($users);
    }
    // Get User Profile
    public function user_profile($id)
    {
        if(Auth::user()->id != $id)
            return abort(404);

        $user = $this->userRepository->find($id);
        return view('users.profile')->with('user', $user);
    }
    // Update User Profile
    public function update_user_profile($id, ProfileUserRequest $request)
    {
        if(Auth::user()->id != $id)
            return abort(404);

        $user = $this->userRepository->find($id);
        if (empty($user)) {
            Flash::error('User not found');
            return redirect()->back();
        }

        $user = $this->userRepository->updateUserProfile($request, $user);

        Flash::success('Profile updated successfully.');
        return redirect()->back();
    }
}
