<?php 
require_once('connect.php');
extract($_POST);

$update = $conn->query("UPDATE `authors` set `first_name` = '{$first_name}', `last_name` = '{$last_name}', `email` = '{$email}',`birthdate` = '{$birthdate}' where id = '{$id}'");
if($update){
    $resp['status'] = 'success';
}else{
    $resp['status'] = 'failed';
    $resp['msg'] = 'An error occured while saving the data. Error: '.$conn->error;
}

echo json_encode($resp);