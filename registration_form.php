<?php
session_start();
	if(!empty($_SESSION) && isset($_SESSION['usertype'])){
		if ($_SESSION['usertype'] == '3'){
			include('admin_html_header_and_navbar.php');
		}
		else{
			include('html_header_and_navbar.php');
		}
		}
		else{
			include('html_header_and_navbar.php');
		}
include ('html_registration_form.php');
include ('html_footer.php');

?>