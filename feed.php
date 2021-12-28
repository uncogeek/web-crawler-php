<?php
require_once("db.php");
$key = $_POST['keyword'];

if(strlen($key) > 3){
  $records = $conn->query("SELECT * FROM tbl_poem WHERE poem LIKE '%$key%'");
  $out = array();
  $out['result'] = '';
  foreach ($records as $record){
    if(strlen($_POST['keyword']) == 0){
      $out['result'] ='null';
    } else {
      $out['result'] .=
        '<div class="row-record">'.
        $record['poem'] .
        '</div>'
      ;
    }
  }
  echo json_encode($out);
}

