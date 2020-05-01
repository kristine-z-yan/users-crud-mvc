<?php

namespace Models;

class User
{
    public static function get_users() {
        return json_decode(file_get_contents('data.json'))->users;
    }

    public static function get_users_with_countries() {
        $users = self::get_users();
        $countries = Country::get_countries_by_key();
        foreach ($users as $user) {
            $user->country = $countries[$user->country_id];
        }
        return $users;
    }

    public static function get_user_by_index($index) {
        return self::get_users()[$index];
    }

    public static function insert($data) {
        $json_data = json_decode(file_get_contents('data.json'));
        $json_data->users[] = $data;
        return file_put_contents('data.json', json_encode($json_data)) ? true : false;
    }
}