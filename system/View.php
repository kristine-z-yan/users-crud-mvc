<?php 

namespace system;

class View {

	public function render($file){
        include('views/layouts/app.php');
	}
}