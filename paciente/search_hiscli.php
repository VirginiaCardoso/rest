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
$paciente->hiscli = isset($_GET['hiscli']) ? $_GET['hiscli'] : die();
//print_r($paciente->hiscli);
// read the details of product to be edited
$paciente->searchHiscli();
 
if($paciente->apenom!=null){
    // create array
    $paciente_arr = array(
        "hiscli" => $paciente->hiscli,
        "apenom" => $paciente->apenom,
            "nombre" => $paciente->nombre,
            "apellido" => $paciente->apellido,
            "nombreelegido" => $paciente->nombreelegido,
            "tipdoc" => $paciente->tipdoc,
            "numdoc" => $paciente->numdoc,
            "fecnacimiento" => $paciente->fecnacimiento,
            "localidadnac" => $paciente->localidadnac,
            "partidonac" => $paciente->partidonac,
            "provincianac" => $paciente->provincianac,
            "paisnac" => $paciente->paisnac,
            "nacionalidad" => $paciente->nacionalidad,
            "sexo" => $paciente->sexo,
            "direccion" => $paciente->direccion,
            "codcalle" => $paciente->codcalle,
            "nrocalle" => $paciente->nrocalle,
            "barrio" => $paciente->barrio,
            "cuerpo" => $paciente->cuerpo,
            "depto" => $paciente->depto,
            "codlocalidad" => $paciente->codlocalidad,
            "codprovincia" => $paciente->codprovincia,
            "telefono" => $paciente->telefono,
            "email"=> $paciente->email,
            "codobrasoc" => $paciente->codobrasoc,
            "nroafiliado" => $paciente->nroafiliado,
            "apellidomadre" => $paciente->apellidomadre,
            "situacionlaboral" => $paciente->situacionlaboral,
            "ocupacion" => $paciente->ocupacion,
            "apellidofamiliar" => $paciente->apellidofamiliar,
            "telefonofamiliar" => $paciente->telefonofamiliar,
            "fallecido" => $paciente->fallecido
 
    );
 
    // set response code - 200 OK
    http_response_code(200);
 
    // make it json format
    echo json_encode($paciente_arr);
}
 
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user product does not exist
    echo json_encode(array("message" => "Paciente no existe."));
}
?>