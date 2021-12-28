<?php
require_once("db.php");

$total= $conn->query("SELECT COUNT(*) AS total FROM tbl_poem");
while($row = $total->fetch_assoc()) {
  $records[] = $row;
}
$total_count = $records[0]['total'];


$page = (isset($_POST['keyword'])) ? $_POST['keyword'] : "";
$sql = "SELECT * FROM tbl_poem WHERE poem=''";
$result = $conn->query($sql);
$total_rows = $result->num_rows;
?>


<html>
<head>
  <link type="text/css" href="files/style.css" rel="stylesheet" />
  <script type="text/javascript" src="files/jquery-3.5.1.min.js"></script>
</head>
<body>
<div class="tac" style="margin-top: 10px;">
  <div style="float: right; display: inline ; width: 230px; height: 60px;" class=" ">
    <div class="btn inline" onclick="window.location='search.php'">جستجو</div>
    <div class="btn2 inline" onclick="window.location='core.php?page=1'">آرشیو</div>
    <div class="btn3 inline" onclick="window.location='index.php'">خانه</div>
    <div class="rtl inline tac mr-5">تعداد رکورد های دیتابیس:  <?=$total_count?></div>
  </div>
  <div class="div-second" style="">
    <span class="" style="text-align:right;">جستجو در رکورد ها: </span><br>
    <input type="text" name="search" id="search" placeholder="جستجو..." autocomplete="off"><br>
  </div>
  <div class="clear"></div>

</div>
  <br>
<hr>
<div id="preview"></div><br>
</body>

</html>

<script>

  $(function (){
    $('#search').on('keyup', function (){
      var value = $(this).val();
      if(value.length > 2)
        $.ajax('feed.php', {
          type: 'post',
          dataType: 'json',
          data: {
            keyword: value
          },
          success: function (data){
            $('#preview').html(data['result']);
          }
        });
    });
  });
</script>