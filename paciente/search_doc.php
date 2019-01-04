<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/paciente.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$paciente = new Paciente($db);
 
// set ID property of record to read
$paciente->numdoc = isset($_GET['numdoc']) ? $_GET['numdoc'] : die();
//print_r($paciente->hiscli);
// read the details of product to be edited
$stmt = $paciente->searchDoc();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $paciente_arr=array();
    $paciente_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $paciente_item=array(
            "hiscli" => $hiscli,
            "apenom" => $apenom,
            "numdoc" => $numdoc
        );
 
        array_push($paciente_arr["records"], $paciente_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show products data in json format
    echo json_encode($paciente_arr);
}
 
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user product does not exist
    echo json_encode(array("message" => "Paciente no existe."));
}
?>