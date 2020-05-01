<?php

namespace Controllers;

use Models\Country;
use system\Controller;
use Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the user.
     *
     */
    public function index()
    {
        $users = User::get_users_with_countries();
        $this->view->users = $users;
        $this->view->render("index");
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        $countries = Country::get_countries();
        $this->view->countries = $countries;
        $this->view->render("create");
    }

    /**
     * Store a newly created user in json.
     */
    public function store()
    {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $country_id = (int) $_POST['country_id'];
        $roles = $_POST['roles'];
        $data = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'country_id' => $country_id,
            'roles' => $roles,
        ];
        $created = User::insert($data);
//        if($created) {
//            $message = "<label class='text-success'>User Created Successfully</p>";
//        } else {
//            $message = "<label class='text-error'>Something went wrong</p>";
//        }
//        $this->view->message = $message;
        $this->view->render("create");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $countries = Country::get_countries();
        if ($_GET['index']) {
            $user = User::get_user_by_index($_GET['index']);
            $this->view->user = $user;
            $this->view->countries = $countries;
            $this->view->render("edit");
        }
//        $user = User::find($id);
//        $countries = Country::all();
//        $roles = Role::all();
//        foreach($user->roles as $role)
//        {
//            $user_roles[] = $role->id;
//        }
//        return view('edit', compact(['user','countries', 'roles', 'user_roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUser $request, $id)
    {
//        $data = $request->all();
//        $user = user::find($id);
//        if (!empty($data)) {
//            $user->roles()->sync($data['roles']);
//            $user->update($data);
//            return redirect(route('index'));
//        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        $user = User::find($id);
//        if ($user){
//            $user->delete();
//            return response('deleted', 200);
//        };
    }
}
