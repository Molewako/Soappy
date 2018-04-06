<?php
function print_d($array){    echo "<pre>\n";    print_r($array);    echo "</pre>\n";}

$mytoken = "AgAAAA**AQAAAA**aAAAAA**S1zGWg**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6ADlouhD5WBqQmdj6x9nY+seQ**TDkEAA**AAMAAA**dTcEYtyG2v5dVwz4C4z8BBz35oyyHfsZ73qmwNhWTi+vT2oGKKFTPCIcLvZCpH9A+sc0MkBJXzj9hqYQl60dYjXr0KqaxMJwutZ91qFsGS59DT9ft8bP6sJfsEWS+f5D2ErvCjGeo7O+TyU/qghVxz4EpAvp2HE8YYuzCeS+1gnbFGjYXRmBkn3ajIMDbaXzKUNLwUIUmbnDJZZ+onkHLq+tVP7q/VP0RS0yXlBgBnyoBPa2IHNnhHtzn/Iv388g9CVX/UslDcbyZojiA3wQTCA+04Jth7XUWMUHWqoYqV3Eol0AfDJCB01IGLhxtAjGjwFAAP5M+nx3X2D2rRz6Wz1KxAznmB/yGOCi4/VQbkHQlby4Lbc/ghhkSRfYhCCyj0HclAMpM+4wCtYpwGeQDW3MzYLd8yh7Aj/fLireCPVdEVyCrH431RtbP1MvVT9ruFK3BQyj05mku2bFAyhLDl+pijJ90LJXWDZEIWZNmj/amY3lq6TJmWa9XU+ISZzVUUq0qJr2s/vBvbg7wjB5AmR1tN3OVMTySSutw5DMyHdgNBi88Pddx6wz5kjH9gybsj7U7zWDQMywYU+5YQyCuEdI7o9w7LbwOj137uAA0SZXtZXFDFjm8JuHqd4Lwj/s3hb6zX1AO0xfCjMviUCStYbZ7DYMEwCB1YBcX/W+oDYPJXGED3EYBXZfN0OsAK4NTcHom2w1g98P0M7KDY2e+B/kqWY369qaKzgV1PS8x1Lx6HOy3573tmwhSMIHd+K1";
$devId = "8dc6638b-f038-49e1-bc3c-85454a83aa22";
$appId = "PingZhan-AuctionE-SBX-653bf921e-696db7c1";
$certId = "SBX-53bf921e6edd-587c-45f1-a0ce-4c49";
$wsdl_url = 'http://developer.ebay.com/webservices/latest/ebaySvc.wsdl';
$apiCall = "GetSuggestedCategories";
$credentials = array('AppId' => $appId, 'DevID' => $devId, 'AuthCert' => $certId);

$client = new SOAPClient($wsdl_url, array('trace' => 1, 'exceptions' => 0, 'location' => "https://api.ebay.com/wsapi?callname=$apiCall&appid=$appId&siteid=0&version=803&Routing=new"));
$eBayAuth = array('eBayAuthToken' => new SoapVar($mytoken, XSD_STRING, NULL, NULL, NULL, 'urn:ebay:apis:eBLBaseComponents'),
                    'Credentials' => new SoapVar ($credentials, SOAP_ENC_OBJECT, NULL, NULL, NULL, 'urn:ebay:apis:eBLBaseComponents'));  
                    
$header_body = new SoapVar($eBayAuth, SOAP_ENC_OBJECT);    
$header = array(new SOAPHeader('urn:ebay:apis:eBLBaseComponents', 'RequesterCredentials', $header_body));                

$params = array('Version' => 803, 'Query'=>'Electronics');  //set the API call parameters

$request = $client->__soapCall($apiCall, array($params), NULL, $header);  //make the actual API call

print_d($request); // print the API call results in a nice readable format

?>
