<?php


namespace Controllers;


class helpers
{
    public static function get_json_file(){
        return json_decode(file_get_contents('data.json'));
    }
}
