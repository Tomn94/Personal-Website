<?php
  $num = (isset($_GET['e'])) ? (int)$_GET['e'] : 500;
  include('data.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?=$PAGE_TITLE?></title>
    <link rel="stylesheet" href="<?=$BASE_URL?>/style/error.css">
    
<?php /* Browser customization */ ?>
    <link rel="shortcut icon" href="<?=$BASE_URL?>/favicon.ico">
    <link rel="apple-touch-icon-precomposed" href="<?=$BASE_URL?>/favicon.png">
    <link rel="icon" sizes="256x256" href="<?=$BASE_URL?>/favicon.png">
    <meta name="msapplication-TileImage" content="<?=$BASE_URL?>/favicon.png"/>
    <meta name="msapplication-TileColor" content="#F1783D"/>
    <meta name="application-name" content="<?=$PAGE_TITLE_SHORT?>">
    <meta name="apple-mobile-web-app-title" content="<?=$PAGE_TITLE?>">
    <meta name="theme-color" content="#F1783D">
    <link color="#F1783D" href="<?=$BASE_URL?>/favicon.svg" rel="mask-icon">
    
<?php /* Bots integration */ ?>
    <meta property="og:title" content="<?=$PAGE_TITLE_SHORT?>" />
    <meta property="og:description" content="<?=str_replace("\n", '. ', $DESCRIPTION)?>" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?=$BASE_URL?>/img/avatar.jpg" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="442" />
    <meta property="og:image:height" content="442" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:creator" content="@tomn94" />
  </head>
  <body>
      <div>
          <h1>Error <?=$num?></h1>
          <p>
              <?php
                  if ($num == 403) echo "Forbidden";
                  else if ($num == 404) echo "Not Found";
                  else if ($num == 407) echo "Authentification Required";
                  else if ($num == 408) echo "Request Time-out";
                  else if ($num == 500) echo "Internal Server Error";
                  else if ($num == 502) echo "Bad Gateway";
                  else if ($num == 503) echo "Service Unavailable";
                  else if ($num == 504) echo "Gateway Time-out";
              ?>
          </p>
          <p><a href="<?=$BASE_URL?>"><span>‹</span>&nbsp;Go back on my website</a></p>
      </div>
  </body>
</html>