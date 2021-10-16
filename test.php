<?php
// $mydate = "2010-05-12";
// $months = array("January","February","March","April","May","June","July","August","September","October","November","December");
// $month = date("m",strtotime($mydate));

// echo $months[$month-1];

// This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
require_once 'HTTP/Request2.php';

$request = new Http_Request2('https://sandbox.momodeveloper.mtn.com/collection/v1_0/requesttopay');
$url = $request->getUrl();

$headers = array(
    // Request headers
    'Authorization' => '',
    'X-Callback-Url' => '',
    'X-Reference-Id' => '',
    'X-Target-Environment' => '',
    'Content-Type' => 'application/json',
    'Ocp-Apim-Subscription-Key' => '{subscription key}',
);

$request->setHeader($headers);

$parameters = array(
    // Request parameters
);

$url->setQueryVariables($parameters);

$request->setMethod(HTTP_Request2::METHOD_POST);

// Request body
$request->setBody("{body}");

try
{
    $response = $request->send();
    echo $response->getBody();
}
catch (HttpException $ex)
{
    echo $ex;
}

?>