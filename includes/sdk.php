<?php
class Acuarela {
    public $domain = "https://acuarelacore.com/api/";
    public $domainWP = "https://application.bilingualchildcaretraining.com/wp-json/wp/v2";
    public $domainWPA = "https://adminwebacuarela.bilingualchildcaretraining.com/wp-json/wp/v2";
    public $daycareID;
    public $userID;
    public $token;
    public $defaultInitialDate;
    public $defaultFinalDate;
    
    function __construct(){
        $this->userID = $_SESSION["user"]->acuarelauser->id;
        $this->token = $_SESSION["userLogged"]->user->token;
        $this->daycareID = $_SESSION['activeDaycare'];
        // Default initial date
        $this->defaultInitialDate = (new DateTime())
        ->sub(new DateInterval('P7D')) // subtract 7 days
        ->format('Y-m-d');

        // Default final date
        $this->defaultFinalDate = (new DateTime())
        ->add(new DateInterval('P2D')) // add 2 days
        ->format('Y-m-d');
    }
    
    function queryStrapi($url, $body = "", $method="GET") {
        $endpoint = $this->domain . $url;
        $curl = curl_init();
        
        $curlOptions = array(
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'token: ' . $this->token
            ),
        );
    
        // Verificar si $body no es un string antes de hacer json_encode
        if (!empty($body) && !is_string($body)) {
            $curlOptions[CURLOPT_POSTFIELDS] = json_encode($body);
        } elseif (is_string($body)) {
            $curlOptions[CURLOPT_POSTFIELDS] = $body;
        }
    
        curl_setopt_array($curl, $curlOptions);
        
        $response = curl_exec($curl);
        curl_close($curl);
        
        return json_decode($response);
    }
    
    function getPostsDaycares($daycare = null){
        if (is_null($daycare)) {
            $daycare = $this->daycareID;
        }
        $resp = $this->queryStrapi("posts?daycareId=$daycare");
        return $resp;
    }
    function setReactionPost($data){
        $resp = $this->queryStrapi("reactions", $data, "POST");
        return $resp;
    }
    function addComment($data){
        $resp = $this->queryStrapi("comments", $data, "POST");
        return $resp;
    }
    function createAsistente($data){
        $data["daycare"] = $this->daycareID;
        $data["rel_daycare"] = [
            [
                "daycare" => $this->daycareID,
                "status_invitation" => 2
            ]
        ];
        $resp = $this->queryStrapi("acuarelausers/register", $data, "POST");
        return $resp;
    }
    function getAgeGroups(){
        $resp = $this->queryStrapi("age-groups");
        return $resp;
    }
    function getEstadosCiudades(){
        $resp = $this->queryStrapi("estados-y-ciudades");
        return $resp;
    }
    function deleteElement($type, $id){
        $resp = $this->queryStrapi("$type/$id", $data, "DELETE");
        return $resp;
    }
    function getInscripciones($id = "", $daycare = null){
        if (is_null($daycare)) {
            $daycare = $this->daycareID;
        }
        if($id == ""){
            $resp = $this->queryStrapi("inscripciones?daycare=$daycare");
        }else{
            $resp = $this->queryStrapi("inscripciones/{$id}");
        }
        return $resp;
    }
    function postInscripcion($data){
        $data = json_decode($data);
        if($data->status == "Borrador"){
            $resp = $this->queryStrapi("inscripciones", $data, "POST");
            return $resp;
        }else{
            $respInscripcion = $this->queryStrapi("inscripciones", $data, "POST");
            $data->inscripcion = $respInscripcion->id;
            $respInscripcionComplete = $this->queryStrapi("inscripciones/complete", $data, "POST");
            return $respInscripcionComplete;
        }
    }
    function putInscripcion($data){
        $data = json_decode($data);
        if($data->status == "Borrador"){
            $resp = $this->queryStrapi("inscripciones/$data->inscripcion", $data, "PUT");
            return $resp;
        }else{
            $resp = $this->queryStrapi("inscripciones/$data->inscripcion", $data, "PUT");
            $respInscripcionComplete = $this->queryStrapi("inscripciones/complete", $data, "POST");
            return $respInscripcionComplete;
        }
    }
    function getChildren($id = "", $daycare = null){
        if (is_null($daycare)) {
            $daycare = $this->daycareID;
        }
        if($id == ""){
            $resp = $this->queryStrapi("children/?daycare=$daycare");
        }else{
            $resp = $this->queryStrapi("children/{$id}");
            $resp = $resp->response[0];
        }
        return $resp;
    }
    function updateChildren($id, $data){
        $resp = $this->queryStrapi("children/{$id}", $data, "PUT");
        return $resp;
    }
    function getAsistentes($id = "", $daycare = null){
        if (is_null($daycare)) {
            $daycare = $this->daycareID;
        }
        if($id == ""){
            $resp = $this->queryStrapi("acuarelausers?rols=5ff78fd55d6f2e272cfd7392&daycare=$daycare");
        }else{
            $resp = $this->queryStrapi("acuarelausers/{$id}");
        }
        return $resp;
    }
    function getGrupos($id = ""){
        if($id == ""){
            $resp = $this->queryStrapi("groups");
            $resp = $resp->response;
        }else{
            $resp = $this->queryStrapi("groups/{$id}");
            $resp = $resp->response[0];
        }
        return $resp;
    }
    function createGroup($data){
        $resp = $this->queryStrapi("groups",$data,'POST');
        return $resp;
    }
    function createActivity($data){
        $resp = $this->queryStrapi("groups/activity",$data,'POST');
        return $resp;
    }
    

    function checkIn($data) {
        $data->asistente = $this->userID;
        $data->token = $this->token;
        $resp = $this->queryStrapi("checkins", $data, "POST");
        return $resp;
    }
    
    function checkOut($data) {
        $data->asistente = $this->userID;
        $data->token = $this->token;
        $resp = $this->queryStrapi("checkouts", $data, "POST");
        return $resp;
    }
    function getMovements($initialDate = null, $finalDate = null, $type = null) {
        if (is_null($initialDate)) {
            $initialDate = $this->defaultInitialDate;
        }
        if (is_null($finalDate)) {
            $finalDate = $this->defaultFinalDate;
        }
        
        $daycare = $this->daycareID;
        $array = array();
        
        // Construir la URL base para la consulta
        $url = "movements?date_gte=$initialDate&date_lte=$finalDate&_sort=date:DESC&daycare=$daycare";
        
        // Ajustar la consulta según el tipo especificado
        if (!is_null($type)) {
            $url .= "&type=$type";
        }
        
        // Realizar la consulta a través de queryStrapi (asumiendo que es una función o método definido)
        $resp = $this->queryStrapi($url);
    
        return $resp;
    }
    
}