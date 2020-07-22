<?php

if(!isset($_POST['producto'], $_POST['precio'])){
    exit("Hubo un Error!");
}

require 'config.php';

$producto = htmlspecialchars($_POST['producto']);
$precio =  htmlspecialchars($_POST['precio']);
$precio = (int)$precio;
$envio = 0;
$total = $precio + $envio;

//creamos una orden nueva

use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
$request = new OrdersCreateRequest();
$request->prefer('return=representation');
$request->body = [
                     "intent" => "CAPTURE",
                     "purchase_units" => [[
                         "reference_id" => "test_ref_id1",
                         "amount" => [
                             "value" => $precio,
                             "currency_code" => "USD"
                         ]
                     ]],
                     "application_context" => [
                          "cancel_url" => "https://gaboedicion.github.io/pagos/cancel",
                          "return_url" => "https://gaboedicion.github.io/pagos/return"
                     ] 
                 ];

try {
    // Call API with your client and get a response for your call
    $response = $client->execute($request);
    
    // If call returns body in response, you can get the deserialized version from the result attribute of the response
    print_r($response);
}catch (HttpException $ex) {
    echo $ex->statusCode;
    print_r($ex->getMessage());
}


use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
// Here, OrdersCaptureRequest() creates a POST request to /v2/checkout/orders
// $response->result->id gives the orderId of the order created above
$request = new OrdersCaptureRequest("APPROVED-ORDER-ID");
$request->prefer('return=representation');
try {
    // Call API with your client and get a response for your call
    $response = $client->execute($request);
    
    // If call returns body in response, you can get the deserialized version from the result attribute of the response
    print_r($response);
}catch (HttpException $ex) {
    echo $ex->statusCode;
    print_r($ex->getMessage());
}

?>