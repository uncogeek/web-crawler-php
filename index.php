<?php
?>


<html>
<head>
  <link type="text/css" href="files/style.css" rel="stylesheet" />
  <title>Home</title>
</head>
<body class="rtl" style="width: max-content; margin: auto;">
<div style="background-color: #FFFFFF; padding: 10px;margin-top: 5px; border-radius: 5px;">
  <div class="tac unselectable">
    <div style="position: fixed; top: 8px;margin-right: 214px;" class="btn4 inline" onclick="window.location='search.php'">&#x1F50E;&#xFE0E;</div>
    <div style="position: fixed; top: 8px;margin-right: -59px;" class="btn4 inline tac" onclick="window.location='core.php?page=1'">&#128466;</div>
    <img src="files/logo.png" style="cursor: pointer;" onclick="window.location='http://uncogeek.ir'" width="190"><br>
    <span><b>Web Crawler &#128375;</b></span>

  </div>
<div class="tac" style="margin-top: 10px; float: right; ">
  <div class="clear"></div></div><br>

  <br>
<div>
  <form name="crawl" action="grab.php" method="post">
    <input class="block ltr mt-5" type="text" name="url-begin" placeholder="URL begin with">
    <input class="block ltr mt-5" type="text" name="url-end" placeholder="URL end with">
    <input class="block ltr mt-5" type="text" name="page-begin" placeholder="Start page number">
    <input class="block ltr mt-5" type="text" name="div-kind" placeholder="Tag type">
    <input class="block ltr mt-5" type="text" name="div-close" placeholder="Tag Close">
    <input class="block ltr mt-5" type="text" name="div-class" placeholder="Class name">
    <input class="block ltr mt-5" type="text" name="total-pages" placeholder="Total number of pages"><br>
    <input class="submit" type="submit" value="Start">
  </form>
</div>

</div>
</body>

</html>