<?php
class API{
    private $connect = '';

    function __construct(){
        $this->dbConnection();
    }

    function dbConnection(){
        $this->connect = new PDO("mysql:host=localhost;dbname=", "", "");
    }

    function outputData(){
        $select = $this->connect->prepare("SELECT * FROM to_do ORDER BY id");
        if($select->execute()){
            while($row = $select->fetch(PDO::FETCH_ASSOC)){
                $data[] = $row;
            }
            return $data;
        }
    }

    function addNewToDo(){
        if(isset($_POST["to_do"])){
            $data = array(
                ':to_do' => $_POST["to_do"],
                ':date' => $_POST["date"]
            );
            $insert = $this->connect->prepare("INSERT INTO to_do (to_do, date) VALUES (:to_do, :date)");
            $insert->execute($data);
        }
    }

}

?>