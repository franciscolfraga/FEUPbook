<?php
header ('Content-type: text/html; charset=utf-8');
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
                $content = file_get_contents_utf8($url);
                $first_step = explode( '<div id="conteudoinner">' , $content );
                $second_step = explode("</div>" , $first_step[1] );
                $string = str_replace('<img src="', '<img src="https://sigarra.up.pt/feup/pt/', $second_step[0]);
                #$string = preg_replace_callback("/src=[\'\"](.*?)[\'\"]/", "urlHandler", $string);
                echo $string;

                #https://sigarra.up.pt/feup/pt/noticias_geral.noticias_cont?p_id=F1046967137/Convite%20Lan%C3%A7amento%20do%20livro%20Eletr%C3%B3nica.jpg

                #https://sigarra.up.pt/feup/pt/noticias_geral.noticias_cont?p_id=F1046967137/Convite%20Lan%EF%BF%BDamento%20do%20livro%20Eletr%EF%BF%BDnica.jpg

                #https://sigarra.up.pt/feup/pt/noticias_geral.noticias_cont?p_id=F1046967137/Convite%20Lan%E7amento%20do%20livro%20Eletr%F3nica.jpg
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

function file_get_contents_utf8($fn) {
  $string = file_get_contents($fn);
  return utf8_encode($string);
  }

  function urlHandler($matches) {
    return "src='" . utf8_decode($matches[1]) . "'";
  }


if (isset($_POST['start'])) {
        echo load_news($_POST['start']);
    }
?>
