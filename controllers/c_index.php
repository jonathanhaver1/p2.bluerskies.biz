<?php 

class index_controller extends base_controller {

public function index() {

	$_SESSION['userid'] = 529;

	$timeNow = Time::now();

	$this->template->content = View::instance('v_index');
	$this->template->title = "BluerSkies Blogging";

	#Render template
	echo $this->template;

}

}

?>