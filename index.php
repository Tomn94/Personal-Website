<?php
  include('data.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $PAGE_TITLE; ?></title>
    <meta name="viewport" content="width=device-width">
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
                  <?php foreach ($HEADER_TABLE_HEADERS as $header) { ?>
                      <th><?php echo $header; ?></th>
                  <?php } ?>
              </tr>
              <tr>
                  <td data-th="<?php echo $HEADER_TABLE_HEADERS[0]; ?>">
                      I Feel It Coming<br>
                      <strong>The Weeknd</strong>
                      
                      <div class="hiddenButtons">
                          <?php echo $HEADER_BUTTONS[0]; ?>
                      </div>
                  </td>
                  <td data-th="<?php echo $HEADER_TABLE_HEADERS[1]; ?>">
                      <strong>14</strong> repositories<br>
                      last commit <strong>3 hours ago</strong><br>
                      <strong>409</strong> contributions this year<br>
                      
                      <span class="gitnote">+ BitBucket</span>
                      
                      <div class="hiddenButtons">
                          <?php echo $HEADER_BUTTONS[1]; ?>
                      </div>
                  </td>
                  <td data-th="<?php echo $HEADER_TABLE_HEADERS[2]; ?>" class="flags"><?php echo nl2br($COUNTRIES); ?></td>
              </tr>
              <tr class="standardButtons">
                  <td><?php echo $HEADER_BUTTONS[0]; ?></td>
                  <td><?php echo $HEADER_BUTTONS[1]; ?></td>
                  <td></td>
              </tr>
          </table>
      </header>
      
      <section id="skills">
          <h1>Skills</h1>
          
          <div>iOS SDK</div>
      </section>
      
      <section id="projects">
          <h1 class="letterpress">Projects</h1>
          
<?php
            if (isset($PROJECTS)) {
                foreach ($PROJECTS as $projectsRow) {
                    if (is_array($projectsRow)) {
                    ?>
          <table>
              <tr>
                  <?php
                    foreach ($projectsRow as $project) {
                       echo '<td';
                       if (count($projectsRow) == 1 || (isset($project["inline"]) && $project["inline"])) {
                           echo ' class="';
                           if (count($projectsRow) == 1) echo "large ";
                           if (isset($project["inline"]) && $project["inline"]) echo "stayInline ";
                           echo '"';
                       }
                       echo '>';
                       foreach ($project["imgs"] as $img) {
                          if (strpos($img, '.mp4') !== false) {
                  ?>
                  <video muted loop autoplay playsinline>
                    <source src="<?php echo $img; ?>" type="video/mp4" />
                    Your browser does not support the video tag.
                  </video>
                  <?php
                          } else {
                  ?>
                    <img src="<?php echo $img; ?>" title="<?php
                        echo $project["title"];
                        if ($project["title"] == 'DelDots') echo '" style="border-radius: 15px;';
                        if ($project["title"] == 'DigiSheep') echo '" style="max-width: 36%;';
                        ?>" /><?php
                          }
                       } ?>
                       
                    <br>
                    <h2><?php echo $project["title"]; ?></h2>
                    <p><?php echo $project["details"]; ?></p>
                    <?php
                        foreach ($project["links"] as $linkInfo) {
                    ?>
                    <a href="<?php echo $linkInfo[1]; ?>"><?php echo $linkInfo[0]; ?>&nbsp;<span>›</span></a>
                    <?php } ?>
                  </td>
                  <?php } ?>
              </tr>
          </table>
                   <?php
                    } else {
                        echo "<h3 class='letterpress'>".$projectsRow."</h3>";
                    }
                }
            }
          ?>
      </section>
      
      <footer class="letterpress">&copy; 2016<br>
          Everything here is home-made except the fonts
      </footer>
  </body>
</html>