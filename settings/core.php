<?php
//for header redirection
ob_start();

//start session
session_start();

$current_file = $_SERVER['SCRIPT_NAME'];


function check_login(){
	if (!isset($_SESSION['user_id']))
	{
    	header('Location: ../login/login.php');
	}
}

function check_permission(){
	if (isset($_SESSION['user_role'])) {
		$uperm = $_SESSION['user_role'];
		if ($uperm == 2) {
    		return 2;
		}else{
			return 1;
		}
	}
}



?>
