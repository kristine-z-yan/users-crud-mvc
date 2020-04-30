<?php

namespace Models;

use Controllers\helpers;

class User
{
    private static function get_users() {
        return json_decode(file_get_contents('data.json'))->users;
    }
    private static function get_countries() {
        $countries = [];
        foreach(json_decode(file_get_contents('data.json'))->countries as $country) {
            $countries[$country->id] = $country;
        }
        return $countries;
    }

    public static function get_users_with_countries() {
        $users = self::get_users();
        $countries = self::get_countries();
        foreach ($users as $user) {
            $user->country = $countries[$user->country_id];
        }
        return $users;
    }

    public static function all() {
        return self::get_data()->users;
    }
}