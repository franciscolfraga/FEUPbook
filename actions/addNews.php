<?php
function load_news($start){
  $xml=simplexml_load_file("https://sigarra.up.pt/feup/pt/noticias_web.atom?p_grupo_noticias=47");
  if($xml){
    $i = 0;
    foreach($xml->entry as $news) {
      if( $i >= $start){?>
      <div class="card news" id="news-<?= $i ?>">
        <div class="news-container">
              <?php
                $url = $news->link['href'];
                $content = file_get_contents($url);
                $first_step = explode( '<div id="conteudoinner">' , $content );
                $second_step = explode("</div>" , $first_step[1] );
                $string = str_replace('<img src="', '<img src="https://sigarra.up.pt/feup/pt/', $second_step[0]);
                $string = $string . '<p> <a target="_blank" rel="noopener noreferrer" href="'.$news->link['href'] .'">Click here for original.</a>';
                echo $string;
              ?>
          </div>
        </div>
      </div>
    <?php }
      if (++$i == $start + 2) break;
    }
  } else {
    $_SESSION['error_message'] = 'Could not load FEUP news!';
    die(header('Location: ../index.php'));
  }
}

if (isset($_POST['start'])) {
        echo load_news($_POST['start']);
    }
?>
