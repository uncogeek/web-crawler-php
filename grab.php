<html>
<head>
  <link type="text/css" href="files/style.css" rel="stylesheet" />
  <style>
    body{
      direction: rtl;
      width: 70%;
      margin: auto;
      overflow: auto;
    }
  </style>
</head>
<body>
<div>
  <div class="btn inline" onclick="window.location='index.php'">خانه</div>
  <div class="btn inline" onclick="window.location='search.php'">جستجو</div>
  <div class="btn2 inline" onclick="window.location='core.php?page=1'">آرشیو</div>
</div>
<br>
<div style="height: 200px; width: 900px; padding: 10px; direction: rtl; overflow: auto; padding: 10px; background-color: #FFFFFF;">
<?php
require_once("db.php");

// get data from home page
$urlFirst = $_POST['url-begin'];
$urlLast = $_POST['url-end'];
$urlStartPage = $_POST['page-begin'];
$totalPages = $_POST['total-pages'];
$divKind = $_POST['div-kind'];
$divClass = $_POST['div-class'];
$divClose = $_POST['div-close'];
$endDiv = "</div\">";

// mix data to create pattern
$preg = "/<blockquote class=\"postcontent restore \">(.*?)$endDiv/s";

$counter = 0;
$pageCount = 0;
$urlList = array();
$count = $totalPages;


for($i = $count; $i > 0; $i--){
  $urlList[$i] = $urlFirst . $i . $urlLast;
  $html = file_get_contents($urlList[$i]);
  preg_match_all("/<$divKind class=\"$divClass\">(.*?)<\/$divClose>/s", $html, $matches);
  $array = array();
  foreach ($matches[1] as $row){
   $insert = "INSERT INTO tbl_poem (poem) VALUES ('$row')";
    mysqli_query($conn, $insert);
    $counter++;
   print_r($row);
    }
  $pageCount++;br();
  echo (" صفحه شماره " . " " . $i . "به دیتابیس افزوده شد");br();
     hr();
     $resultFinalRecord =  "تعداد $counter رکورد به دیتابیس اضافه گردید";
     $resultFinalTotalPage =  "در میان $pageCount صفحه با موفقیت جستجو انجام شد ";
}

function br(){echo '<br>';}
function hr(){echo '<hr>';}
?>
      </div><br>
<div style="background-color: #FFFFFF; padding: 10px; border-radius: 5px;">
<div>&#128504; <?=$resultFinalRecord?></div>
<div>&#128504; <?=$resultFinalTotalPage?></div>
</div>
</body>
</html>

