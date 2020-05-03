<?php

namespace Controllers;

use Models\Country;
use system\Controller;
use Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the user.
     */
    public function index()
    {
        $users = User::get_users_with_countries();

        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;
        $total_items = count($users); // total items
        $pages = ceil($total_items / $limit);
        $current_users = array_splice($users, $offset, $limit);

        $this->view->offset = $offset;
        $this->view->pages = $pages;
        $this->view->current_users = $current_users;
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
        $data = $this->validate_post_data();
        if (empty($data['errors'])) {
            $created = User::insert($data['data']);
            if($created) {
                $message = "<h3 class='text-success'>User Created Successfully</h3>";
            } else {
                $message = "<h3 class='text-error'>Something went wrong</h3>";
            }
            $_SESSION['message'] =$message;
            unset($_SESSION['values']);
        } else {
            $_SESSION['errors'] = $data['errors'];
            $_SESSION['values'] = $data['data'];
        }
        header("Location: /create");
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

    private function validate_post_data() {
        $first_name = $last_name = $email = $country_id = "";
        $roles = $data['errors'] = array();

        if (empty($_POST["first_name"])) {
            $data['errors']['first_name'] = "The first name is required";
        }
        else {
            $first_name = $_POST["first_name"];
        }
        if (empty($_POST["last_name"])) {
            $data['errors']['last_name'] = "The last name is required";
        }
        else {
            $last_name = $_POST["last_name"];
        }
        if (empty($_POST["email"])) {
            $data['errors']['email'] = "The email is required";
        }
        else {
            $email = $_POST["email"];
        }
        if (!isset($_POST["country_id"]) || $_POST["country_id"] == 0) {
            $data['errors']['country_id'] = "The country is required";
        }
        else {
            $country_id = (int) $_POST["country_id"];
        }
        if ($_POST["roles"][0] == "") {
            $data['errors']['roles'] = "There must be at least one role";
        }
        else {
            $roles = $_POST["roles"];
        }

        $data['data'] = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'country_id' => $country_id,
            'roles' => $roles,
        ];

        return $data;
    }
}
