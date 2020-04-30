<?php

namespace system;
	
class Controller {

    public $view;

    function __construct(){
        $this->view = new View;
    }
}