<?php


namespace Models;


class Country
{
    public static function get_countries() {
        return json_decode(file_get_contents('data.json'))->countries;
    }

    public static function get_countries_by_key() {
        $countries = [];
        foreach(self::get_countries() as $country) {
            $countries[$country->id] = $country;
        }
        return $countries;
    }
}