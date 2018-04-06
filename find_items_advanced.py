import zeep
APP_ID = 'PingZhan-AuctionE-SBX-653bf921e-696db7c1'
wsdl = 'http://developer.ebay.com/webservices/finding/latest/FindingService.wsdl'
# For sandbox
endpoint_uri = 'http://svcs.sandbox.ebay.com/services/search/FindingService/v1'
# For production
#endpoint_uri = 'http://svcs.ebay.com/services/search/FindingService/v1'

ns = 'http://www.ebay.com/marketplace/search/v1/services'
# The SOAP function
operation = 'findItemsAdvanced'

http_headers = {
  "X-EBAY-SOA-OPERATION-NAME": operation,
  "X-EBAY-SOA-SECURITY-APPNAME": APP_ID,
}

client = zeep.Client(wsdl=wsdl)
