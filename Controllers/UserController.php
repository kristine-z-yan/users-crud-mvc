<?php

namespace Controllers;

use system\Controller;
use Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $users = User::get_users_with_countries();
        $this->view->users = $users;
        $this->view->render("index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->view->render("create");
//        $countries = Country::all();
//        $roles = Role::all();
//        return view('store', compact(['countries', 'roles']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreUser $request)
    {
//        $data = $request->all();
//        $user = User::create($data);
//        $user->roles()->attach($data['roles']);
//        return redirect(route('index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
