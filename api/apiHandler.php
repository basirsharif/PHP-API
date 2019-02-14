<?php
include("api.php");

$apiObject = new API();

if($_GET["action"] == 'outputData'){
    $data = $apiObject->outputData();
}

if($_GET["action"] == 'addNew'){
    $data = $apiObject->addNewToDo();
}

echo json_encode($data);
?>