<?php 
// codes 

// 0 => error
// 1 => all ok

function validate_all($required,$data){

	$result = array();
	$result['code'] = 1;
	$result['error'] = "All OK!";

	if(count(array_intersect_key($required, $data)) != count($required)){
		$result['code'] = 0;
		$result['error'] = "Fields Mismatch!";
		return $result;
	}

	$field_count 	= count($required);

	foreach ($required as $field => $rules) {
		$value = $data[$field];

		$code = 0;
		$error = "";

		switch ($rules['type']) {
			case 'numeric':
				if($rules['required'] && empty($value)){
					$error = $field." is empty.";	
				}else if(!is_numeric($value)){
					$error = $field." is not numeric.";
				}else if(isset($rules['min'])){
					if($value < $rules['min']){
						$error = $field." min error.";
					}else{
						$code   = 1;
						$error  = "All OK!";
					}
				}else if(isset($rules['max'])){
					if($value > $rules['max']){
						$error = $field." max error.";
					}else{
						$code   = 1;
						$error  = "All OK!";
					}
				}else{
					$code   = 1;
					$error  = "All OK!";
				}						
				break;
			case 'alpha':
				if($rules['required'] && empty($value)){
					$error = $field." is empty.";	
				}else{
					$code   = 1;
					$error  = "All OK!";
				}						
				break;
			case 'email':
				if($rules['required'] && empty($value)){
					$error = $field." is empty.";	
				}else if(!preg_match($rules['pattern'], $value)){
					$error = $field." is invalid.";
				}else{
					$code   = 1;
					$error  = "All OK!";
				}		
				break;
			default:
				# code...
				break;
		}


		$result['fields'][$field] = array('code' => $code, 'error' => $error, 'value'=>$value, 'field'=>$field );
	}

	foreach ($result['fields'] as $row) {
		if($row["code"] == 0){
			$result['code'] = 0;
			$result['error'] = "Invalid Fields!";
			break;
		}		
	}

	return $result;

}
 ?>