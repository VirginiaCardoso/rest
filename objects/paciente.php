<?php
class Paciente{
	//conexion base de datos
	private $conn;
    private $table_name = "paciente";

    //propiedades
    public $hiscli;
    public $apenom;
    //public $tipdoc;
    public $numdoc;
   // public $fec_nac;

    // constructor
    // $db conexion a la base de datos
    public function __construct($db){
        $this->conn = $db;
    }

    function read(){
     
        // select all 
        $query = "SELECT p.PA_HISCLI as hiscli, p.PA_APENOM as apenom, p.PA_NUMDOC as numdoc FROM " . $this->table_name . " as p";
     
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // execute query
        $stmt->execute();
     
        return $stmt;
    }

        // used when filling up the update product form
    function searchHiscli(){
     
        // query to read single record
        $query = "SELECT p.PA_HISCLI as hiscli, p.PA_APENOM as apenom, p.PA_NUMDOC as numdoc FROM " . $this->table_name . " as p
                WHERE
                    p.PA_HISCLI = ?
                LIMIT
                    0,1";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
        
        // bind id of product to be updated
        $stmt->bindParam(1, $this->hiscli);
     
        // execute query
        $stmt->execute();
     
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        // set values to object properties
        $this->hiscli = $row['hiscli'];
        $this->apenom = $row['apenom'];
        $this->numdoc = $row['numdoc'];
       
    }

        // used when filling up the update product form
    function searchDoc(){
     
        // query to read single record
        $query = "SELECT p.PA_HISCLI as hiscli, p.PA_APENOM as apenom, p.PA_NUMDOC as numdoc FROM " . $this->table_name . " as p
                WHERE
                    p.PA_NUMDOC = ?
                LIMIT
                    0,1";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
        
        // bind id of product to be updated
        $stmt->bindParam(1, $this->numdoc);
     
        // execute query
        $stmt->execute();

        return $stmt;
       
    }


    // read products with pagination
    public function searchPaging($from_record_num, $records_per_page){
     
        // select query
        $query = "SELECT p.PA_HISCLI as hiscli, p.PA_APENOM as apenom, p.PA_NUMDOC as numdoc FROM " . $this->table_name . " as p
                LIMIT ?, ?";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        // bind variable values
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
     
        // execute query
        $stmt->execute();
     
        // return values from database
        return $stmt;
    }

    // used for paging products
    public function count(){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row['total_rows'];
    }

}
?>
