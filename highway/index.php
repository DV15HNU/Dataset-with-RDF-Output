<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../src/model/datacontext.php';
include_once '../src/model/dataclass.php';

if(!isset($db)) {
    $db = new datacontext();
}

$highway = $db->data_class();

if($highway)
{
    $code = 200;
    header_remove();
    http_response_code($code);
    header('Content-Type: application/json');
    header('Status: '.$code);

    echo getSemanticMarkup($highway);
}
else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "Nothing found.")
    );
}

function getSemanticMarkup($response)
{
    $SemanticResult = '{ "@context" : { "DataFeed" : "http://schema.org" }, "DataFeed": [ ';

    foreach($response as $meadow)
    {
        $SemanticResult .= '{ "@type" : "DataFeed",
                "identifier" : "'.$meadow->Postcode().'",
                "dateCreated" : "'.$meadow->Dateincident().'",
                "contentLocation" : "'.$meadow->Streetname().'",
                "name" : "'.$meadow->Issuereported().'",
                "category" : "'.$meadow->Subcat().'"},';
    }
    //remove the traliing comma from the end
    $SemanticResult = substr($SemanticResult, 0, -1);
    $SemanticResult .= ']}';

    return $SemanticResult;
}

function returnJSON($response, $code)
{
    header_remove();
    http_response_code($code);
    header('Content-Type: application/json');
    header('Status: '.$code);
    return json_encode(array('status' => $code, 'message' => $response));
}
