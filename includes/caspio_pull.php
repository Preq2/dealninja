<?
//Method: POST
//URL:    Token Endpoint
//Body:   grant_type=client_credentials&client_id=Client ID&client_secret=Client Secret
$activeEndPoint="https://c1ect864.caspio.com/oauth/token";
$caspio_URL ="https://c1ect864.caspio.com/rest/v1";
$Client_ID="fbea5b0314264c8540764e0b0ecd2cd123b2c41bfbc6f1ea52";
$Client_Secret="5b29519e68aa44a2bf9b73d0498d262dce060466587d70b7bd";
$caspio_auth_url = "grant_type=client_credentials&client_id=$Client_ID&client_secret=$Client_Secret";


$bank_tbls [];

$bank_tbls[0] = "bank_regions";
$bank_tbls[1] = "bank_gmfinancial";

//Get Rows  from REST API
$service_url = $caspio_URL . "/tables/". $bank_tbls[0] . "rows"
$curl = curl_init($service_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$curl_response = curl_exec($curl);
if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('error occured during curl exec. Additioanl info: ' . var_export($info));
}
curl_close($curl);
$decoded = json_decode($curl_response);
if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
    die('error occured: ' . $decoded->response->errormessage);
}
echo 'response ok!';
var_export($decoded->response);

?>
Testing