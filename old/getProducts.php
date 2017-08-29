<?php

function csvToArray($file, $delimiter) {
    if (($handle = fopen($file, 'r')) !== FALSE) {
        $i = 0;
        while (($lineArray = fgetcsv($handle, 4000, $delimiter, '"')) !== FALSE) {
            //$lineArray = array_map("utf8_encode", $lineArray);
            //$lineArray[1] = iconv('CP1251', 'utf-8',  $lineArray[1]);
            for ($j = 0; $j < count($lineArray); $j++) {
                $arr[$i][$j] = $lineArray[$j];
            }
            $i++;
        }
        fclose($handle);
    }
    return $arr;
}


header('Content-type: application/json');
$categoryId = $_REQUEST["catID"];

// lookup all hints from array if $q is different from "" 
//if ($q !== "") {
//    $q = strtolower($q);
//    $len = strlen($q);
//    foreach ($a as $name) {
//        if (stristr($q, substr($name, 0, $len))) {
//            if ($hint === "") {
//                $hint = $name;
//            } else {
//                $hint .= ", $name";
//            }
//        }
//    }
//}

// Output "no suggestion" if no hint was found or output correct values 
//echo $hint === "" ? "no suggestion" : $hint;
//$csvFile = "data/products.csv";
//$csvFile = 'https://docs.google.com/spreadsheets/d/1HSfQ2I7E-jPAZiduzaRumL8R0DNkbAShKS4zUdfk3rk/export?gid=0&format=csv';

$csvFile = 'https://docs.google.com/spreadsheets/d/1HSfQ2I7E-jPAZiduzaRumL8R0DNkbAShKS4zUdfk3rk/export?gid=' . $categoryId . '&format=csv';
error_log("Oracle database not available!", 0);
error_log($csvFile, 0);

$data = csvToArray($csvFile, ',');
$count = count($data) - 1;
$labels = array_shift($data);
foreach ($labels as $label) {
    $keys[] = $label;
}

// Add Ids, just in case we want them later
$keys[] = 'id';
for ($i = 0; $i < $count; $i++) {
    $data[$i][] = $i;
}

// Bring it all together
for ($j = 0; $j < $count; $j++) {
    $d = array_combine($keys, $data[$j]);
    $newArray[$j] = $d;
}

// Print it out as JSON
echo json_encode($newArray);
//
//$csv = file_get_contents($csvFile);
//$array = array_map("str_getcsv", explode("\n", $csv));
//$json = json_encode($array);
//
////header('Content-Type: application/json');
//print_r($json);
?>