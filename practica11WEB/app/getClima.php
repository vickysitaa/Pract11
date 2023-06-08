<?php
// Initialize variables
$units = 'm';
$params = '';
$numDays = 7;
$weather = '';
$format = '24 hourly';
$startTime = new DateTime();
$wsdl = 'https://graphical.weather.gov/xml/SOAP_server/ndfdXMLserver.php?wsdl';
$wsdlfile = file_get_contents($wsdl);
// Get info from HTML form
$citie = filter_input(INPUT_GET, "city");
$currentLatLon = isset($citie) ? strip_tags(urldecode($citie)) : '';
// Instantiate soap client
$soap = new SoapClient("http://localhost/~feynmansc/appClienteGetClima/ndfdXMLserver.xml", ['trace' => TRUE]);
// Call a function $soap->LatLonListCityNames(1) as defined in the WSDL
$xml = new SimpleXMLElement($soap->LatLonListCityNames(1));
$cityNames = explode('|', $xml->cityNameList);
$latLonCity = explode(' ', $xml->latLonList);
$cityLatLon = array_combine($latLonCity, $cityNames);
asort($cityLatLon);
// process request
if ($currentLatLon) {
  list($lat, $lon) = explode(',', $currentLatLon);
  try {
    $weather = $soap->NDFDgenByDay($lat,$lon,$startTime->format('Y-m-d'),$numDays,$unit,$format);
  } catch (Exception $e) {
     $weather .= PHP_EOL;
     $weather .= 'Latitude: ' . $lat . ' | Longitude: ' . $lon . PHP_EOL;
     $weather .= 'ERROR' . PHP_EOL;
     $weather .= $e->getMessage() . PHP_EOL;
     $weather .= $soap->__getLastResponse() . PHP_EOL;
  }
}
?>
