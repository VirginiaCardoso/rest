<?php
class Paciente{
	//conexion base de datos
	private $conn;
    private $table_name = "paciente";

    //propiedades
    public $hiscli;
    public $apenom; //pa_apenom
    public $nombre; //pa_nombre
    public $apellido; //pa_apellido
    public $nombreelegido; //pa_nomeleg
    public $tipdoc; //pa_tipdoc
    public $numdoc; //pa_numdoc
    public $fecnacimiento; //pa_fecnac
    public $localidadnac; //pa_locnac
    public $partidonac; //pa_partidonac
    public $provincianac;//pa_provnac
    public $paisnac;//pa_paisnac
    public $nacionalidad; //pa_nacion
    public $sexo; //pa_sexo
    public $direccion; //pa_direc
    public $codcalle;//pa_codcalle
    public $nrocalle;//pa_nrocalle
    public $barrio;//pa_barrio
    public $cuerpo;//pa_cuerpo
    public $depto;//pa_dpto
    public $codlocalidad;//pa_codloc
    public $codprovincia;//pa_codpro
    public $telefono;//pa_telef
    public $email;//pa_email
    public $codobrasoc; //pa_codos
    public $nroafiliado;//pa_nroafi
    public $apellidomadre; //pa_apema
    public $situacionlaboral; //pa_sitlabo
    public $ocupacion;//pa_ocupa
    public $apellidofamiliar;//pa_apefa
    public $telefonofamiliar;//pa_telfa
    public $fallecido;   //pa_fallec 
    

    // constructor
    // $db conexion a la base de datos
    public function __construct($db){
        $this->conn = $db;
    }

    function read(){
     
        // select all 
        $query = "SELECT p.PA_HISCLI as hiscli, p.PA_APENOM as apenom, p.pa_apellido as apellido, p.pa_nombre as nombre, p.pa_nomeleg as nombreelegido,p.pa_tipdoc as tipdoc, p.PA_NUMDOC as numdoc, p.pa_fecnac as fecnacimiento, p.pa_locnac as localidadnac, p.pa_partidonac as partidonac, p.pa_provnac as provincianac, p.pa_paisnac as paisnac, p.pa_nacion as nacionalidad, p.pa_sexo as sexo, p.pa_direc as direccion, p.pa_codcall as codcalle, p.pa_nrocall as nrocalle, p.pa_barrio as barrio, p.pa_cuerpo as cuerpo,p.pa_dpto as depto, p.pa_codloc as codlocalidad, p.pa_codpro as codprovincia, p.pa_telef as telefono, p.pa_email as email, p.pa_codos as codobrasoc, p.pa_nroafi as nroafiliado, p.pa_apema as apellidomadre, p.pa_sitlabo as situacionlaboral, p.pa_ocupac as ocupacion, p.pa_apefa as apellidofamiliar, p.pa_telfa as telefonofamiliar, p.pa_fallec as fallecido  FROM " . $this->table_name . " as p";
     
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // execute query
        $stmt->execute();
     
        return $stmt;
    }

        // used when filling up the update product form
    function searchHiscli(){
     
        // query to read single record
        $query = "SELECT p.PA_HISCLI as hiscli, p.PA_APENOM as apenom, p.pa_apellido as apellido, p.pa_nombre as nombre, p.pa_nomeleg as nombreelegido,p.pa_tipdoc as tipdoc, p.PA_NUMDOC as numdoc, p.pa_fecnac as fecnacimiento, p.pa_locnac as localidadnac, p.pa_partidonac as partidonac, p.pa_provnac as provincianac, p.pa_paisnac as paisnac, p.pa_nacion as nacionalidad, p.pa_sexo as sexo, p.pa_direc as direccion, p.pa_codcall as codcalle, p.pa_nrocall as nrocalle, p.pa_barrio as barrio, p.pa_cuerpo as cuerpo,p.pa_dpto as depto, p.pa_codloc as codlocalidad, p.pa_codpro as codprovincia, p.pa_telef as telefono, p.pa_email as email, p.pa_codos as codobrasoc, p.pa_nroafi as nroafiliado, p.pa_apema as apellidomadre, p.pa_sitlabo as situacionlaboral, p.pa_ocupac as ocupacion, p.pa_apefa as apellidofamiliar, p.pa_telfa as telefonofamiliar, p.pa_fallec as fallecido  FROM " . $this->table_name . " as p
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
     
        // propiedades
        $this->hiscli = $row['hiscli'];
         $this->apenom = $row['apenom'];
         $this->nombre = $row['nombre'];
         $this->apellido = $row['apellido'];
         $this->nombreelegido = $row['nombreelegido'];
         $this->tipdoc = $row['tipdoc'];
         $this->numdoc = $row['numdoc'];
         $this->fecnacimiento = $row['fecnacimiento'];
         $this->localidadnac = $row['localidadnac'];
         $this->partidonac = $row['partidonac'];
         $this->provincianac = $row['provincianac'];
         $this->paisnac = $row['paisnac'];
         $this->nacionalidad = $row['nacionalidad'];
         $this->sexo = $row['sexo'];
         $this->direccion = $row['direccion'];
         $this->codcalle = $row['codcalle'];
         $this->nrocalle = $row['nrocalle'];
         $this->barrio = $row['barrio'];
         $this->cuerpo = $row['cuerpo'];
         $this->depto = $row['depto'];
         $this->codlocalidad = $row['codlocalidad'];
         $this->codprovincia = $row['codprovincia'];
         $this->telefono = $row['telefono'];
         $this->email = $row['email'];
         $this->codobrasoc = $row['codobrasoc'];
         $this->nroafiliado = $row['nroafiliado'];
         $this->apellidomadre = $row['apellidomadre'];
         $this->situacionlaboral = $row['situacionlaboral'];
         $this->ocupacion = $row['ocupacion'];
         $this->apellidofamiliar = $row['apellidofamiliar'];
         $this->telefonofamiliar = $row['telefonofamiliar'];
         $this->fallecido = $row['fallecido'];
    }

        // used when filling up the update product form
    function searchDoc(){
     
        // query to read single record
        $query = "SELECT p.PA_HISCLI as hiscli, p.PA_APENOM as apenom, p.pa_apellido as apellido, p.pa_nombre as nombre, p.pa_nomeleg as nombreelegido,p.pa_tipdoc as tipdoc, p.PA_NUMDOC as numdoc, p.pa_fecnac as fecnacimiento, p.pa_locnac as localidadnac, p.pa_partidonac as partidonac, p.pa_provnac as provincianac, p.pa_paisnac as paisnac, p.pa_nacion as nacionalidad, p.pa_sexo as sexo, p.pa_direc as direccion, p.pa_codcall as codcalle, p.pa_nrocall as nrocalle, p.pa_barrio as barrio, p.pa_cuerpo as cuerpo,p.pa_dpto as depto, p.pa_codloc as codlocalidad, p.pa_codpro as codprovincia, p.pa_telef as telefono, p.pa_email as email, p.pa_codos as codobrasoc, p.pa_nroafi as nroafiliado, p.pa_apema as apellidomadre, p.pa_sitlabo as situacionlaboral, p.pa_ocupac as ocupacion, p.pa_apefa as apellidofamiliar, p.pa_telfa as telefonofamiliar, p.pa_fallec as fallecido FROM " . $this->table_name . " as p
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
        $query = "SELECT p.PA_HISCLI as hiscli, p.PA_APENOM as apenom, p.pa_apellido as apellido, p.pa_nombre as nombre, p.pa_nomeleg as nombreelegido,p.pa_tipdoc as tipdoc, p.PA_NUMDOC as numdoc, p.pa_fecnac as fecnacimiento, p.pa_locnac as localidadnac, p.pa_partidonac as partidonac, p.pa_provnac as provincianac, p.pa_paisnac as paisnac, p.pa_nacion as nacionalidad, p.pa_sexo as sexo, p.pa_direc as direccion, p.pa_codcall as codcalle, p.pa_nrocall as nrocalle, p.pa_barrio as barrio, p.pa_cuerpo as cuerpo,p.pa_dpto as depto, p.pa_codloc as codlocalidad, p.pa_codpro as codprovincia, p.pa_telef as telefono, p.pa_email as email, p.pa_codos as codobrasoc, p.pa_nroafi as nroafiliado, p.pa_apema as apellidomadre, p.pa_sitlabo as situacionlaboral, p.pa_ocupac as ocupacion, p.pa_apefa as apellidofamiliar, p.pa_telfa as telefonofamiliar, p.pa_fallec as fallecido FROM " . $this->table_name . " as p
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

    // update the product
    function update(){
     
        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    pa_apenom = :apenom,
                    pa_nombre = :nombre,
                    pa_apellido = :apellido,
                    pa_nomeleg = :nombreelegido,
                    pa_tipdoc = :tipdoc,
                    pa_numdoc = :numdoc,
                    pa_fecnac = :fecnacimiento,
                    pa_locnac = :localidadnac,
                    pa_partidonac = :partidonac,
                    pa_provnac = :provincianac,
                    pa_paisnac = :paisnac,
                    pa_nacion = :nacionalidad,
                    pa_sexo = :sexo,
                    pa_direc = :direccion,
                    pa_codcall = :codcalle,
                    pa_nrocall = :nrocalle,
                    pa_barrio = :barrio,
                    pa_cuerpo = :cuerpo,
                    pa_dpto = :depto,
                    pa_codloc = :codlocalidad,
                    pa_codpro = :codprovincia,
                    pa_telef = :telefono,
                    pa_email = :email,
                    pa_codos = :codobrasoc,
                    pa_nroafi = :nroafiliado,
                    pa_apemae = :apellidomadre,
                    pa_sitlabo = :situacionlaboral,
                    pa_ocupac = :ocupacion,
                    pa_apefa = :apellidofamiliar,
                    pa_telfa = :telefonofamiliar,
                    pa_fallec = :fallecido,
                WHERE
                    pa_hiscli = :hiscli";
     
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->price=htmlspecialchars(strip_tags($this->price));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->category_id=htmlspecialchars(strip_tags($this->category_id));
        $this->id=htmlspecialchars(strip_tags($this->id));
     
        // bind new values
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->bindParam(':id', $this->id);
     
        // execute the query
        if($stmt->execute()){
            return true;
        }
     
        return false;
    }

}
?>
