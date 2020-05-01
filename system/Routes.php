<?php
namespace system;

class Routes {

    function __construct($path)
    {
            $ctrl_obj = new \Controllers\UserController;
            if (isset($path[0]) && !empty($path[0])) {
                $method = explode('?', $path[0]);
                if (method_exists($ctrl_obj, $method[0])) {
                    $array = array_slice($path, 2);
                    call_user_func_array([$ctrl_obj, $method[0]], $array);
                } else {
                    echo "method not found";
                }
            } else {
                $ctrl_obj->index();
            }

    }
}
