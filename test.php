<?php 

include 'employee.php';
include 'validate_all.php';

$data = json_decode(file_get_contents("php://input"),true);


$required  = array(
	'first_name' 	=> $first_name, 
	'last_name' 	=> $last_name, 
	'email' 		=> $email, 
	'age' 			=> $age
);


$validate_result = validate_all($required,$data);

// print_r($data);
print_r($validate_result);

 ?>