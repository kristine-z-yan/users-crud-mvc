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
        $data = $this->get_post_data();
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
     * Show the form for editing the specified user.
     */
    public function edit()
    {
        $countries = Country::get_countries();
        if (isset($_GET['index'])) {
            $user = User::get_user_by_index($_GET['index']);
            $this->view->user = $user;
            $this->view->countries = $countries;
            $this->view->render("edit");
        }
    }

    /**
     * Update the specified user.
     */
    public function update()
    {
        $data = $this->get_post_data();
        $index = $_POST['index'];
        if (isset($index)) {
            $updated = User::update($index, $data);
//            if($updated) {
//            $message = "<label class='text-success'>User Created Successfully</p>";
                //        } else {
                //            $message = "<label class='text-error'>Something went wrong</p>";
                //        }
                //        $this->view->message = $message;
            header("Location: /edit?index=".$index);
        }
    }

    /**
     * Remove the specified user.
     */
    public function delete()
    {
        if ($_POST['index']) {
            User::delete($_POST['index']);
            echo 'deleted';
        }
    }

    private function get_post_data() {
        return [
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'email' => $_POST['email'],
            'country_id' => (int) $_POST['country_id'],
            'roles' => $_POST['roles'],
        ];
    }
}
