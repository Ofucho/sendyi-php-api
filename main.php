<?php
$longitude = 36.7976586;

$latitude = -1.2978588;
$sendy_api_url = "https://apitest.sendyit.com/v1/";





function sendy_curl_exec( $url, $command, $data ) {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_HEADER, FALSE);
	
	curl_setopt($ch, CURLOPT_POST, TRUE);
	# Setup request to send json via POST.
	$payload = json_encode(array('command' => $command, 'data' => $data));
	
	curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	
	# Send request.
	$result = curl_exec($ch);
	curl_close($ch);
	
	return $result;
}

	if( !empty($sendy_api_url) ){
				
		$api_key = "T3ZdATDJ9ePHNj5NhMkk";
		$api_username = "onlineliquorstoreofuchoenterprises";
		$command = 'request';
		$from_name = "Test Shop";
		$from_lat = -1.2849921;
		$from_long = 36.8242003;
		$from_address = "TechCamp Kenya, Kimathi Street, Nairobi, Kenya";
		$from_description = "To be picked from $from_address ($from_lat,$from_long)";
		$to_name = 'Customer';
		$to_lat = $latitude;
		$to_long = $longitude;
		$to_address = $geo_addr;
		$to_description = "To be delivered to $to_address ($to_lat,$to_long).";
		$recepient_name = "Test User";
		$recepient_phone = "0711222333";
		$recepient_email = "test@domain.com";
		$recepient_notes = "Call the number";
		$pick_up_date = date('Y-m-d', strtotime("+1 week"));
		$status = false;
		$pay_method = 1;
		$amount = 0;
		$return = true;
		$note = $from_description." ".$to_description;
		$note_status = true;
		$request_type = "quote";
								
		$data = array(
			"api_key" => "".$api_key."",
			"api_username" => "".$api_username."",
			"from" => array(
				'from_name' => "".$from_name."",
				'from_lat' => $from_lat,
				'from_long' => $from_long,
				'from_description' => "".$from_description."",
			),
			"to" => array(
				'to_name' => "".$to_name."",
				'to_lat' => $to_lat,
				'to_long' => $to_long,
				'to_description' => "".$to_description."",
			),
			"recepient" => array(
				'recepient_name' => "".$recepient_name."",
				'recepient_phone' => "".$recepient_phone."",
				'recepient_email' => "".$recepient_email."",
				'recepient_notes' => "".$recepient_notes."",
			),
			"delivery_details" => array(
				"pick_up_date" => "".$pick_up_date."",
				"collect_payment" => array(
					"status" => $status,
					"pay_method" => $pay_method,
					"amount" => $amount,
				),
				"return" => $return,
				"note" => "".$note."",
				"note_status" => $note_status,
				"request_type" => "".$request_type.""
			),
		);
		
		echo "<h1>DATA SENT TO SENDY API</h1>";
		echo "URL:".$sendy_api_url."<br/>";
		print_r($data);
		
		# Execute the curl command
		$response = sendy_curl_exec( $sendy_api_url, $command, $data );
		
		# Print response
		#$result = json_decode($result, true);
		
		echo "<br/><h1>DATA RECEIVED FROM SENDY API</h1>";
		var_dump($response);
	
	}else{
		echo "<h1>ERROR</h1>";
		echo "Check your API keys and ensure all mandatory fields are not empty before submission";
	}
	echo "</pre>";


?>
