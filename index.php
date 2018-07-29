<?php
  include('data.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?=$PAGE_TITLE?></title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="style/style.css">
    <script src="scripts/script.js"></script>
    
<?php /* Browser customization */ ?>
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="apple-touch-icon-precomposed" href="favicon.png">
    <link rel="icon" sizes="256x256" href="favicon.png">
    <meta name="msapplication-TileImage" content="favicon.png"/>
    <meta name="msapplication-TileColor" content="#F1783D"/>
    <meta name="application-name" content="<?=$PAGE_TITLE_SHORT?>">
    <meta name="apple-mobile-web-app-title" content="<?=$PAGE_TITLE?>">
    <meta name="theme-color" content="#F1783D">
    <link color="#F1783D" href="favicon.svg" rel="mask-icon">
    
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
      <header>
          <h1>Thomas Naudet</h1>
          <h2 class="altTitleColor"><?=nl2br($DESCRIPTION)?></h2>
          <div id="avatar">&nbsp;</div>
              
          <nav>
              <a class="button" href="mailto:t%6d%6E%73%74%75%64%69%6Fs%40%68%6ft%6d%61%69%6C%2e%66%72">Mail</a>
              <a class="button" href="Thomas-Naudet-CV.pdf" download>CV&nbsp;<span class="slash"></span>&nbsp;&nbsp;Résumé</a>
              <a class="button" href="https://linkedin.com/in/tomn94">LinkedIn</a>
          </nav>
          
          <table>
              <tr class="altTitleColor">
<?php           foreach ($HEADER_TABLE_HEADERS as $header) { ?>
                  <th><?=$header?></th>
<?php           } ?>
              </tr>
              <tr>
                  <td data-th="<?=$HEADER_TABLE_HEADERS[0]?>">
                      <a id="tw-link" title="Search on YouTube" href="https://www.youtube.com/watch?v=0YuSg4mts9E">
                          <span id="tw-name" style="font-weight: 300;">Young Blood</span><br>
                          <span id="tw-artist">The Naked and Famous</span>
                      </a>
                      
                      <div class="hiddenButtons">
                          <?=$HEADER_BUTTONS[0]."\n"?>
                      </div>
                  </td>
                  <td data-th="<?=$HEADER_TABLE_HEADERS[1]?>">
                      <span id="gh-repos">14+</span> repositories<br>
                      last commit <span id="gh-commit-time">some time ago</span><br>
                      <span id="gh-contributions">Many</span> contributions this year<br>
                      
                      <span class="gitnote">+ BitBucket + GitLab</span>
                      
                      <div class="hiddenButtons" id="gitHubHiddenButtons">
                          <?=$HEADER_BUTTONS[1]."\n"?>
                      </div>
                  </td>
                  <td data-th="<?=$HEADER_TABLE_HEADERS[2]?>" class="flags">
                      <?=nl2br($COUNTRIES)?>

                  </td>
              </tr>
              <tr class="standardButtons">
                  <td><?=$HEADER_BUTTONS[0]?></td>
                  <td><?=$HEADER_BUTTONS[1]?></td>
                  <td>&nbsp;</td>
              </tr>
          </table>
      </header>
      
      <section id="skills">
          <h1>Computer Skills</h1>
          
          <canvas id="skillsCanvas">
            <?php
                $skillsString = "Some of my skills are: ";
                for ($i = 0 ; $i < count($SKILLS) ; $i++) {
                    if ($i != 0) $skillsString .= ", ";
                      $skillsString .= $SKILLS[$i][0];
                }
                echo $skillsString; ?>

          </canvas>
          
          <div id="boxLayer"></div>
          
          <script>
              var skillList = <?=json_encode(array_values(array_filter($SKILLS, function($item) {
                                                                      return $item[3];
                                                                   })))?>;
          </script>
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
                  foreach ($projectsRow as $someProject) {
                    
                    // If it's not an array, just a standard project
                    $isAssoc = $someProject !== array() && array_keys($someProject) !== range(0, count($someProject) - 1);
                    $subProjNum = 0;
                    if ($isAssoc) {
                      $project = $someProject;
                    } else {
                      $project = $someProject[$subProjNum];
                    }

                       echo '                  <td';
                       if (count($projectsRow) == 1 || (isset($project["inline"]) && $project["inline"])) {
                           echo ' class="';
                           if (count($projectsRow) == 1) echo "large ";
                           if (isset($project["inline"]) && $project["inline"]) echo "stayInline ";
                           echo '"';
                       }
                       echo '>';

                    do {
                      if (!$isAssoc) {
                        $project = $someProject[$subProjNum];
                        $subProjNum++;
                      }
                      echo '<div class="projectWrapper"';
                      if ($subProjNum > 1) {
                        echo ' style="padding-top: 20px"';
                      }
                      echo '>';
                       foreach ($project["imgs"] as $img) {
                          if (strpos($img, '.mp4') !== false) {
                  ?>

                      <video muted loop autoplay playsinline>
                          <source src="<?=$img?>" type="video/mp4" />
                          Your browser does not support the video tag.
                      </video><?php
                          } else {
                  ?>

                      <img src="<?=$img?>" id="<?=$project["id"]?>" title="<?php
                        echo $project["title"];
                        if ($project["title"] == 'DelDots') echo '" style="border-radius: 15px;';
                        if ($project["title"] == 'DigiSheep') echo '" style="max-width: 36%;';
                        ?>" /><?php
                          }
                       } ?>

                      <br>
                      <h2><?=$project["title"]?><span>&nbsp;&nbsp;<?=$project["date"]?></span></h2>
                      <p><?=$project["details"]?></p>
<?php
                        foreach ($project["links"] as $linkInfo) {
                    ?>
                      <a href="<?=$linkInfo[1]?>"><img class="linkIcon" src="img/icns/<?=$linkInfo[2]?>.png" alt="icon" />&nbsp;<?=$linkInfo[0]?>&nbsp;<span>›</span></a>
<?php                   }
                      echo '                  </div>';
                    } while (!$isAssoc && $subProjNum < count($someProject)); ?>
</td>
<?php             } ?>
              </tr>
          </table>
<?php
                    } else {
                        echo "\n          <h3 class='letterpress'>".$projectsRow."</h3>\n";
                    }
                }
            }
          ?>
      </section>
      
      <section id="paint">
          <table>
              <tr>
                  <td>
                      <h1 class="letterpress">I&nbsp;also&nbsp;enjoy&nbsp;playing tennis&nbsp;and&nbsp;drawing</h1>
                  </td>
                  <td id="gallery">
<?php                 for ($i = 1 ; $i <= $NBR_PAINTINGS ; $i++) { ?>
                      <img name="painting" src="img/paintings/<?=$i?>.jpg" title="Painting <?=$i?>" onclick="changePainting()"<?php
                          if ($i == 1) echo ' style="opacity: 1"'; ?> />
<?php                 } ?>
                  </td>
              </tr>
          </table>
      </section>
              
      <nav id="footerContacts">
          <a class="button" href="mailto:t%6d%6E%73%74%75%64%69%6Fs%40%68%6ft%6d%61%69%6C%2e%66%72">Mail</a>
          <a class="button" href="https://linkedin.com/in/tomn94">LinkedIn</a>
          <a class="button" href="Thomas-Naudet-CV.pdf">CV&nbsp;<span class="slash"></span>&nbsp;&nbsp;Résumé</a><div>&nbsp;</div>
          <?php for ($i = count($HEADER_BUTTONS) - 1 ; $i >= 0 ; $i--) echo $HEADER_BUTTONS[$i]; ?>
      </nav>
      
      <footer class="letterpress">&copy; <?=$DATE_LAST_CHANGE?><br>
          Everything here is home-made except the fonts
      </footer>
      
      <?php include_once("analytics.php") ?>

  </body>
</html>