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
(function(){
  const serverTimestamp = <?php echo time(); ?> * 1000;
  const serverDate = new Date(serverTimestamp);
  const locale = navigator.language || 'ro-RO';

  function pad(v){
    return v.toString().padStart(2, '0');
  }

  function formatDate(d, useLocale)
  {
    const day = pad(d.getDate());
    const month = useLocale
      ? d.toLocaleString(locale, { month: 'long' })
      : ["Ianuarie","Februarie","Martie","Aprilie","Mai","Iunie","Iulie","August","Septembrie","Octombrie","Noiembrie","Decembrie"][d.getMonth()];
    return `${day} ${month} ${d.getFullYear()}`;
  }

  function updateClocks(){
    serverDate.setSeconds(serverDate.getSeconds() + 1);
    document.getElementById('servertime').textContent = formatDate(serverDate, false) + ' ' +
      `${pad(serverDate.getHours())}:${pad(serverDate.getMinutes())}:${pad(serverDate.getSeconds())}`;

    const now = new Date();
    document.getElementById('local-time').textContent = `${formatDate(now, true)} ${pad(now.getHours())}:${pad(now.getMinutes())}:${pad(now.getSeconds())}`;
  }

  updateClocks();
  setInterval(updateClocks, 1000);
})();
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
<span class="footer">This document is <a href="http://validator.w3.org/check?uri=<?php echo htmlspecialchars($myurl); ?>">HTML5</a> and <a href="https://jigsaw.w3.org/css-validator/validator?uri=<?php echo htmlspecialchars($myurl); ?>">CSS3</a> valid &bull; Coding by Zion</span>
</body></html>
