<?php 


$first_name = array(
	'type' 			=> 'alpha',
	'required' 		=> true,
);

$last_name = array(
	'type' 			=> 'alpha',
	'required' 		=> true,
);


$email = array(
	'type' 			=> 'email',
	'required' 		=> true,
	'pattern'		=> '/[a-z]{3,}@[a-z]{3,}\.[a-z]{3,}/'
);

$age = array(
	'type'			=> 'numeric',
	'required'		=> true,
	'min' 			=> 2,
	'max' 			=> 150
);

 ?>