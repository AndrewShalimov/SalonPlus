<?php
require_once 'google-api-php-client/vendor/autoload.php';


$ini_array = parse_ini_file("data/app_conf.ini");
//print_r($ini_array);

$API_KEY = $ini_array[API_KEY];
$APP_NAME = $ini_array[APP_NAME];
$spreadsheetId = $ini_array[SPREADSHEET_ID];
$productsCachePath = './data/productsCache';

function getCategories() {
    $client = new Google_Client();
    $client->setApplicationName($GLOBALS["APP_NAME"]);
    $client->setDeveloperKey($GLOBALS["API_KEY"]);
    $service = new Google_Service_Sheets($client);
    $optParams['includeGridData'] = false;
    $response = $service->spreadsheets->get($GLOBALS["spreadsheetId"], $optParams);
    //$response = $service->spreadsheets_values->get($spreadsheetId, $includeGridData);
    //$values = $response->getValues();
    //$response -> getProperties();
    //echo json_encode($response);
    $sheets = json_decode(json_encode($response))->sheets;
    //echo json_encode($sheets);
    return $sheets;
}


function getCategories_cached() {
    $data = unserialize( file_get_contents( $GLOBALS["productsCachePath"] ) );
    $sheets = json_decode(json_encode($data));
    return $sheets;
}

function getAllProducts_() {
$start = microtime(true);
    $client = new Google_Client();
    $client->setApplicationName($GLOBALS["APP_NAME"]);
    $client->setDeveloperKey($GLOBALS["API_KEY"]);
    $service = new Google_Service_Sheets($client);
    $optParams['includeGridData'] = true;
    $response = $service->spreadsheets->get($GLOBALS["spreadsheetId"], $optParams);
    $sheets = json_decode(json_encode($response))->sheets;
$time_elapsed_secs = microtime(true) - $start;
echo $time_elapsed_secs;
    return $sheets;
}

class Category {
    public $title;
    public $id;
    public $products;

    public function __construct($title, $id) {
        $this->title = $title;
        $this->id = $id;
    }
}

class Product {
    public $id;
    public $title;
    public $imageNames = [];
    public $description;
    public $price;
    public $categoryId;

    public function __construct($id, $title, $description, $price) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
    }
}

function updateProductsCache() {
    $start = microtime(true);
    $client = new Google_Client();
    $client->setApplicationName($GLOBALS["APP_NAME"]);
    $client->setDeveloperKey($GLOBALS["API_KEY"]);
    $service = new Google_Service_Sheets($client);

    $optParams['includeGridData'] = false;
    $response = $service->spreadsheets->get($GLOBALS["spreadsheetId"], $optParams);

    $categoriesArray = [];
    for ($i = 0; $i < sizeof($response->sheets); $i++) {
        array_push($categoriesArray, new Category($response->sheets[$i]->properties->title, $response->sheets[$i]->properties->sheetId));
    }

    for ($i = 0; $i < sizeof($categoriesArray); $i++) {
        $range = $categoriesArray[$i]->title;
        $response = $service->spreadsheets_values->get($GLOBALS["spreadsheetId"], $range);
        $productsArray = [];
        if ($response[values] != null) {
            $idIndex = array_search("id", $response->values[0]);
            $titleIndex = array_search("title", $response->values[0]);
            $imageNameIndex = array_search("image_name", $response->values[0]);
            $descriptionIndex = array_search("description", $response->values[0]);
            $priceIndex = array_search("price", $response->values[0]);

            foreach(array_slice($response->values,1) as $productRow) :
                $product = new Product($idIndex === null ? 0 : (int)str_replace(' ', '', $productRow[$idIndex]),
                    $titleIndex === null ? "" : $productRow[$titleIndex],
                    $descriptionIndex === null ? "" : $productRow[$descriptionIndex],
                    $priceIndex === null ? 0 : $productRow[$priceIndex]);
                $imageNames = [];
                if ($imageNameIndex != null) {
                    $imageNames = explode("::", $productRow[$imageNameIndex]);
                }
                $product -> imageNames = $imageNames;
                array_push($productsArray, $product);
            endforeach;
        }
        $categoriesArray[$i]->products = $productsArray;
    }

    file_put_contents($GLOBALS["productsCachePath"], serialize($categoriesArray));

$time_elapsed_secs = microtime(true) - $start;
    echo "Products updated OK<br>";
    echo "It took: " . $time_elapsed_secs . " sec.";
}

function getProduct_cached($categoryId, $productId) {
    $data = unserialize(file_get_contents($GLOBALS["productsCachePath"]));
    $category = null;
    foreach ($data as $struct) {
        if ($categoryId == $struct->id) {
            $category = $struct;
            break;
        }
    }
    if ($category == null) {
        return null;
    }

    $product = null;
    foreach ($category->products as $struct) {
        if ($productId == $struct->id) {
            $product = $struct;
            break;
        }
    }
    return $product;
}

function getProducts_cached($categoryId) {
    $data = unserialize( file_get_contents( $GLOBALS["productsCachePath"] ) );
    $category = null;
    foreach($data as $struct) {
        if ($categoryId == $struct->id) {
            $category = $struct;
            break;
        }
    }
    return $category;
}

function getRandomProducts_cached($count) {
    $resultProducts = [];
    $data = unserialize( file_get_contents( $GLOBALS["productsCachePath"] ) );
    for ($i = 0; $i < $count; $i++) {
        $min = 0;
        $max = sizeof($data) - 1;
        $randomCat = $data[rand($min, $max)];
        $min = 0;
        $max = sizeof($randomCat -> products) - 1;
        $randomProduct = $randomCat->products[rand($min, $max)];
        if ($randomProduct == null) {
            $count++;
        } else {
            $randomProduct -> categoryId = $randomCat -> id;
            array_push($resultProducts, $randomProduct);
        }
    }
    return $resultProducts;
}


function getProduct_($spreadsheetId, $categoryId, $rowId) {

    $client = new Google_Client();
    $client->setApplicationName($GLOBALS["API_NAME"]);
    $client->setDeveloperKey($GLOBALS["API_KEY"]);
    $service = new Google_Service_Sheets($client);

    $range = 'test!B1:B5';
    $optParams['includeGridData'] = false;
    $response = $service->spreadsheets->get($spreadsheetId, $optParams);
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
    //getAllProducts();
//updateProductsCache();
//getProduct_cached(2081529768, 3);
//$result = getRandomProducts_cached(20);
//echo $result;
?>