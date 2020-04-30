<?php
namespace system;

class Routes {

    function __construct($path)
    {
            $ctrl_obj = new \Controllers\UserController;
            if (isset($path[1]) && !empty($path[1])) {
                $method = $path[1];
                if (method_exists($ctrl_obj, $method)) {
                    $array = array_slice($path, 2);
                    call_user_func_array([$ctrl_obj, $method], $array);
                } else {
                    echo "method not found";
                }
            } else {
                $ctrl_obj->index();
            }

    }
}
