<?php
$long = 36.7976586;

$lat = -1.2978588;

//$data = json_decode(file_get_contents('php://input'), true);

//$lat = $data['latitude'];

//$long = $data['longitude'];

//$location = $data['location'];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://apitest.sendyit.com/v1/");
curl_setopt($ch, CURLOPT_POST, 1);


$sending = http_build_query(array(
  'command'=> 'request',
  'data'=> [
    'api_key'=> 'T3ZdATDJ9ePHNj5NhMkk',
    'api_username'=> 'onlineliquorstoreofuchoenterprises',
    'vendor_type'=> 1,
    'rider_phone'=> '0728561783',
    'from'=> [
      'from_name'=> 'Corner House',
      'from_lat'=> -1.2849914,
      'from_long'=> 36.8241443,
      'from_description'=> '12th floor'
    ],
    'to'=> [
      'to_name'=> 'addr',
      'to_lat'=> -1.2849914,
      'to_long'=> 36.8741443,
      'to_description'=> ''
    ],
    'recepient'=> [
      'recepient_name'=> 'Sender Name',
      'recepient_phone'=> '0709779779',
      'recepient_email'=> 'sendyer@gmail.com',
      'recepient_notes'=> 'recepient specific Notes',
      'recepient_notify'=> false
    ],
    'sender'=> [
      'sender_name'=> 'Sendyer Name',
      'sender_phone'=> '0709 779 779',
      'sender_email'=> 'sendyer@gmail.com',
      'sender_notes'=> 'Sender specific notes',
      'sender_notify'=> false
    ],
    'delivery_details'=> [
      'pick_up_date'=> '2016-04-20 12:12:12',
      'collect_payment'=> [
        'status'=> false,
        'pay_method'=> 0,
        'amount'=> 0
      ],
      'carrier_type'=> 2,
      'return'=> false,
      'note'=> ' Sample note',
      'note_status'=> true,
      'request_type'=> 'delivery',
      'order_type'=> 'ondemand_delivery',
      'ecommerce_order'=> false,
      'express'=> false,
      'skew'=> 1,
      'package_size'=> [
        [
          'weight'=> 20,
          'height'=> 10,
          'width'=> 200,
          'length'=> 30,
          'item_name'=> 'laptop'
        ]
      ]
    ]
  ],
  'request_token_id'=> 'request_token_id'
));

$array = array(
    array("value", 1),
    array("secondvalue", 2)
);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($array ));

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json"
));


$response = curl_exec($ch);

var_dump($response);
$result = json_decode($response, true);

curl_close($ch);

echo $response;




//var_dump($result);
//echo json_encode("KES ".$result ['data']['amount']);


?>
