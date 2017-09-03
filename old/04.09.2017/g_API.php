<?php
require_once 'google-api-php-client/vendor/autoload.php';

function getCategories() {
    $API_KEY = 'AIzaSyBoPJ2orpL4iYvlZ-BqKIEpi4BN1JrA0mU';
    $APP_NAME = 'SalonPlusSite';

    $client = new Google_Client();
    $client->setApplicationName($APP_NAME);
    $client->setDeveloperKey($API_KEY);
    $service = new Google_Service_Sheets($client);

    $spreadsheetId = '1HSfQ2I7E-jPAZiduzaRumL8R0DNkbAShKS4zUdfk3rk';
    $range = 'test!B1:B5';
    $optParams['includeGridData'] = false;
    $response = $service->spreadsheets->get($spreadsheetId, $optParams);
    //$response = $service->spreadsheets_values->get($spreadsheetId, $includeGridData);
    //$values = $response->getValues();
    //$response -> getProperties();
    //echo json_encode($response);
    $sheets = json_decode(json_encode($response))->sheets;
    //echo json_encode($sheets);
    return $sheets;
}
//    $client = new Google_Client();
//    $client->setAuthConfig('google-api-php-client/client_secret.json');
//    $client->setAccessType("offline");        // offline access
//    $client->setIncludeGrantedScopes(true);   // incremental auth
//    $client->addScope(Google_Service_Drive::DRIVE_METADATA_READONLY);
//    //$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
//    $redirect_uri = ('http://localhost/salonPlus/g_API.php');
//    $client->setRedirectUri($redirect_uri);
//
//    if (isset($_GET['code'])) {
//        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
//        $client->setAccessToken($token);
//        // store in the session also
//        $_SESSION['upload_token'] = $token;
//        // redirect back to the example
//        header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
//    }
//
//    $service = new Google_Service_Drive($client);
//
//    if (!empty($_SESSION['upload_token'])) {
//        $client->setAccessToken($_SESSION['upload_token']);
//        if ($client->isAccessTokenExpired()) {
//            unset($_SESSION['upload_token']);
//        }
//    } else {
//        $authUrl = $client->createAuthUrl();
//    }
//
//
//    error_log('-------------token:');
//    error_log($token);
?>