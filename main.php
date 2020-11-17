<?php
$long = 36.7976586;

$lat = -1.2978588;
$sendy_api_url = "https://apitest.sendyit.com/v1/";


//$data = json_decode(file_get_contents('php://input'), true);

//$lat = $data['latitude'];

//$long = $data['longitude'];

//$location = $data['location'];

// $ch = curl_init();

// curl_setopt($ch, CURLOPT_URL, "https://apitest.sendyit.com/v1/");
// curl_setopt($ch, CURLOPT_POST, 1);


// $sending = http_build_query(array(
  // 'command'=> 'request',
  // 'data'=> [
    // 'api_key'=> 'T3ZdATDJ9ePHNj5NhMkk',
    // 'api_username'=> 'onlineliquorstoreofuchoenterprises',
    // 'vendor_type'=> 1,
    // 'rider_phone'=> '0728561783',
    // 'from'=> [
      // 'from_name'=> 'Corner House',
      // 'from_lat'=> -1.2849914,
      // 'from_long'=> 36.8241443,
      // 'from_description'=> '12th floor'
    // ],
    // 'to'=> [
      // 'to_name'=> 'addr',
      // 'to_lat'=> -1.2849914,
      // 'to_long'=> 36.8741443,
      // 'to_description'=> ''
    // ],
    // 'recepient'=> [
      // 'recepient_name'=> 'Sender Name',
      // 'recepient_phone'=> '0709779779',
      // 'recepient_email'=> 'sendyer@gmail.com',
      // 'recepient_notes'=> 'recepient specific Notes',
      // 'recepient_notify'=> false
    // ],
    // 'sender'=> [
      // 'sender_name'=> 'Sendyer Name',
      // 'sender_phone'=> '0709 779 779',
      // 'sender_email'=> 'sendyer@gmail.com',
      // 'sender_notes'=> 'Sender specific notes',
      // 'sender_notify'=> false
    // ],
    // 'delivery_details'=> [
      // 'pick_up_date'=> '2016-04-20 12:12:12',
      // 'collect_payment'=> [
        // 'status'=> false,
        // 'pay_method'=> 0,
        // 'amount'=> 0
      // ],
      // 'carrier_type'=> 2,
      // 'return'=> false,
      // 'note'=> ' Sample note',
      // 'note_status'=> true,
      // 'request_type'=> 'delivery',
      // 'order_type'=> 'ondemand_delivery',
      // 'ecommerce_order'=> false,
      // 'express'=> false,
      // 'skew'=> 1,
      // 'package_size'=> [
        // [
          // 'weight'=> 20,
          // 'height'=> 10,
          // 'width'=> 200,
          // 'length'=> 30,
          // 'item_name'=> 'laptop'
        // ]
      // ]
    // ]
  // ],
  // 'request_token_id'=> 'request_token_id'
// ));

// $array = array(
    // array("value", 1),
    // array("secondvalue", 2)
// );

// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($array ));

// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  // "Content-Type: application/json"
// ));


// $response = curl_exec($ch);

// var_dump($response);
// $result = json_decode($response, true);

// curl_close($ch);

// echo $response;




//var_dump($result);
//echo json_encode("KES ".$result ['data']['amount']);


function sendy_wc_curl_exec( $url, $command, $data ) {
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
		$from_lat = -1.3370364;
		$from_long = 36.7081472;
		$from_address = "Marula Ln, Nairobi, Kenya";
		$from_description = "To be picked from $from_address ($from_lat,$from_long)";
		$to_name = 'Customer';
		$to_lat = floatval($geo_lat);
		$to_long = floatval($geo_long);
		$to_address = $geo_addr;
		$to_description = "To be delivered to $to_address ($to_lat,$to_long).";
		$recepient_name = "Test User";
		$recepient_phone = "0711222333";
		$recepient_email = "test@domain.com";
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
				'to_lat' => -1.3270364,
				'to_long' => 36.7481472,
				'to_description' => "".$to_description."",
			),
			"recepient" => array(
				'recepient_name' => "".$recepient_name."",
				'recepient_phone' => "".$recepient_phone."",
				'recepient_email' => "".$recepient_email."",
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
		$response = sendy_wc_curl_exec( $sendy_api_url, $command, $data );
		
		# Print response
		$result = json_decode($result, true);
		
		echo "<br/><h1>DATA RECEIVED FROM SENDY API</h1>";
		var_dump($response);
	
	}else{
		echo "<h1>ERROR</h1>";
		echo "Check your API keys and ensure all mandatory fields are not empty before submission";
	}
	echo "</pre>";


?>
