<?php
  
  $PAGE_TITLE = "Thomas Naudet — Student Engineer+Manager";
  $PAGE_TITLE_SHORT = "Thomas Naudet";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $PAGE_TITLE; ?></title>
    <link rel="stylesheet" href="style/style.css">
    <script src="scripts/script.js"></script>
    
    <?php /* Browser customization */ ?>
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="apple-touch-icon-precomposed" href="favicon.png">
    <link rel="icon" sizes="256x256" href="favicon.png">
    <meta name="msapplication-TileImage" content="favicon.png"/>
    <meta name="msapplication-TileColor" content="#F1783D"/>
    <meta name="application-name" content="<?php echo $PAGE_TITLE_SHORT; ?>">
    <meta name="apple-mobile-web-app-title" content="<?php echo $PAGE_TITLE; ?>">
    <meta name="theme-color" content="#F1783D">
    <link color="#F1783D" href="favicon.svg" rel="mask-icon">
    
    <?php /* Bots integration */ ?>
    <meta property="og:title" content="<?php echo $PAGE_TITLE; ?>" />
    <meta property="og:image" content="favicon.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="256" />
    <meta property="og:image:height" content="256" />
    
    <?php /* External */ ?>
    <link href="https://fonts.googleapis.com/css?family=Inconsolata:b" rel="stylesheet">
  </head>
  <body>
      <header>
          <h1>Thomas Naudet</h1>
          <h2 class="altTitleColor">French Student Engineer+Manager<br>
              Polyglot Developer, Designer…</h2>
              
          <nav>
              <a class="button" href="mailto:t%6d%6E%73%74%75%64%69%6Fs%40%68%6ft%6d%61%69%6C%2e%66%72">Mail</a>
              <a class="button" href="Thomas-Naudet-CV.pdf">CV&nbsp;<span class="slash"></span>&nbsp;&nbsp;Résumé</a>
              <a class="button" href="https://linkedin.com/in/tomn94">LinkedIn</a>
          </nav>
          
          <table>
              <tr class="altTitleColor">
                  <th>last song I've listened to</th>
                  <th>GitHub activity</th>
                  <th>countries I've lived in/visited</th>
              </tr>
              <tr>
                  <td>I Feel It Coming<br>
                      <strong>The Weeknd</strong></td>
                  <td><strong>14</strong> repositories<br>
                      last commit <strong>3 hours ago</strong><br>
                      <strong>409</strong> contributions this year<br>
                      <span class="gitnote">+ BitBucket</span>
                  </td>
                  <td class="flags">🇫🇷🇭🇰🇬🇧🇮🇪🇩🇪🇨🇳<br>
                      🇨🇿🇧🇪🇱🇺🇮🇹🇬🇷<br>
                      🇻🇳🇲🇲🇹🇭🇰🇭🇲🇴🇲🇦</td>
              </tr>
              <tr>
                  <td><a class="button" href="https://twitter.com/tomn94">Twitter</a></td>
                  <td><a class="button" href="https://github.com/Tomn94">GitHub</a></td>
                  <td></td>
              </tr>
          </table>
      </header>
      
      <section id="skills">
          <h1>Skills</h1>
          <div>iOS SDK</div>
      </section>
      
      <section id="projects">
          <h1>Projects</h1>
      </section>
  </body>
</html>