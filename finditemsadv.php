<?php


define('APP_ID', 'PingZhan-AuctionE-SBX-653bf921e-696db7c1');
$wsdl = 'http://developer.ebay.com/webservices/finding/latest/FindingService.wsdl';
// For sandbox
$endpoint_uri = 'http://svcs.sandbox.ebay.com/services/search/FindingService/v1';
// For production
//$endpoint_uri = 'http://svcs.ebay.com/services/search/FindingService/v1';

$ns = 'http://www.ebay.com/marketplace/search/v1/services';
// The SOAP function
$operation = 'findItemsAdvanced';

$http_headers = implode(PHP_EOL, [
  "X-EBAY-SOA-OPERATION-NAME: $operation",
  "X-EBAY-SOA-SECURITY-APPNAME: " . APP_ID,
]);

$options = [
  'trace' => true,
  'cache' => WSDL_CACHE_NONE,
  'exceptions' => true,
  'location' => $endpoint_uri,
  //'uri' => 'ns1',
  'stream_context' => stream_context_create([
    'http' => [
      'method' => 'POST',
      'header' => $http_headers,
    ]
  ]),
];

$client = new \SoapClient($wsdl, $options);

try {
  $wrapper = new StdClass;
  $wrapper->categoryId = new SoapVar('58058', XSD_STRING, null, null, null, $ns);
  $wrapper->keywords = new SoapVar('Samsung Laptops', XSD_STRING, null, null, null, $ns);

  $result = $client->$operation(new SoapVar($wrapper, SOAP_ENC_OBJECT));
  
  echo "<pre>";
  print_r($result);
  
  //var_dump($result);
} catch (Exception $e) {
  echo $e->getMessage();
}


?>
