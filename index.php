<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
// Set the default timezone to Bucharest
date_default_timezone_set('Europe/Bucharest');
$tz = date_default_timezone_get();
?>
<!DOCTYPE html><html xmlns="http://www.w3.org/1999/xhtml" lang="ro">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>Current time in <?php echo $tz; ?></title>
<link rel="stylesheet" href="style.css">
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-PGNFWNZT71"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
// Make sure you change the 'config' ID to your own Google Analytics measurement ID
  gtag('config', 'G-PGNFWNZT71');
</script>
</head>
<body>
<script>
// JavaScript code to display and update server time
// PHP method of getting server date
var currenttime = "<?php print date('d F Y H:i:s', time() )?>";
// We always display in the user's locale
var locale = navigator.language || navigator.userLanguage;
var montharray = [];
for (var i = 0; i < 12; i++) {
    var date = new Date(2000, i, 1); // year doesn't matter
    var monthName = new Intl.DateTimeFormat(locale, { month: 'long' }).format(date);
    montharray.push(monthName);
}


// var montharray = ["Ianuarie","Februarie","Martie","Aprilie","Mai","Iunie","Iulie","August","Septembrie","Octombrie","Noiembrie","Decembrie"];
var serverdate = new Date(currenttime);

function padlength(what){
  var output=(what.toString().length==1)? "0"+what : what
  return output
}

function displaytime(){
  serverdate.setSeconds(serverdate.getSeconds()+1)
  var datestring=padlength(serverdate.getDate())+" "+montharray[serverdate.getMonth()]+" "+serverdate.getFullYear()
  var timestring=padlength(serverdate.getHours())+":"+padlength(serverdate.getMinutes())+":"+padlength(serverdate.getSeconds())
  document.getElementById("servertime").innerHTML=datestring+" "+timestring
}

window.onload=function(){
  setInterval("displaytime()", 1000)
}
</script>
<p class="center big"><span class="bold"><?php echo $tz; ?></span><br>
<span id="servertime">Server time:</span><br>
<?php require_once('time.php');
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $myurl = "https";
else 
      $myurl = "http";
$myurl .= "://";
$myurl .= $_SERVER['HTTP_HOST'];
$myurl .= $_SERVER['REQUEST_URI'];
?>
<span class="footer">This document is <a href="http://validator.w3.org/check?uri=<?php echo $myurl; ?>">HTML5</a> and <a href="https://jigsaw.w3.org/css-validator/validator?uri=<?php echo $myurl; ?>">CSS3</a> valid &bull; Coding by Zion</span>
</body></html>