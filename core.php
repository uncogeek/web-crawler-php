<?php
require_once("db.php");
$total= $conn->query("SELECT COUNT(*) AS total FROM tbl_poem");
while($row = $total->fetch_assoc()) {
  $records[] = $row;

}
$totalAllRecords =  $records[0]['total'];
$page = $_GET['page'];
$before = $page - 10;
$after = $page + 10;

$min = $page -1;
$max = $page + 10;
$sql = "SELECT * FROM tbl_poem WHERE id >= '$min' AND id <= '$max'";
$result = $conn->query($sql);
$total_rows = $result->num_rows;
?>
<div class="tac" style="margin-top: 10px; float: right; ">
  <div style="float: right; display: inline ; width: 230px; height: 60px;" class=" ">
    <div class="btn inline" onclick="window.location='search.php'">جستجو</div>
    <div class="btn2 inline" onclick="window.location='core.php?page=1'">آرشیو</div>
    <div class="btn3 inline" onclick="window.location='index.php'">خانه</div>

    <div class="rtl inline tac mr-5">تعداد رکورد های دیتابیس:  <?=$records[0]['total']?></div>
  </div>
  <div class="clear"></div></div><br>
<?php
echo '<div class="" style="top: 0"><ul class="pagination-ul">';
$count = $page;
if($page > 11){
  while($count > $before){
      echo "<a href=\"core.php?page=$before\" ><li class=\"pagination\">" . $before++ . '</li></a>';
   } 
  } else {
      for($i = 1; $i < $page; $i++){
        echo "<a href=\"core.php?page=$i\" ><li class=\"pagination\">" . $i . '</li></a>';
      }

  }

$count = $page;

while($count < $after AND $count < pageNumbers() ){
  if($count !== $page ){
    $class = "pagination";
  }else {
    $class = "pagination-current";
  }
    echo "<a href=\"core.php?page=$count\" ><li class=\"$class\">" . $count++ . '</li></a>'; 
  
}

echo '</ul></div>';


function pageNumbers(){
  global $total_rows, $page;
  $devide = $GLOBALS['totalAllRecords'] / 10;
  $devide = ceil($devide);
  $devide_ten = ceil($devide / 10);
  return $devide +1;
}


$max = $page + 10;
if($page == 1){
  $minr = 1;
  $limit = 9;
  }else {
    $limit = 10;
  $minr = ($page -1) * 10;
  }
$fetch = "SELECT * FROM tbl_poem WHERE id >= '$minr' LIMIT $limit";

$result_fetch = $conn->query($fetch);
$total_rows_fetch = $result->num_rows;

fetch();
function fetch($from = NULL, $to = NULL){
  if ($GLOBALS['total_rows_fetch'] > 0 ) {
    while($row = $GLOBALS['result_fetch']->fetch_assoc()) {
      echo '<div class="row-record">';
      echo $row["poem"]. "<br>";
      echo "</div>";
    }
  }
}
?>
<html>
<head>
  <link type="text/css" href="files/style.css" rel="stylesheet" />
</head>
<body>
</body>
</html>