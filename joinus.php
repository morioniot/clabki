<?php
    function getPageFollowers() {

        $fanPageId = '795628257177459';
        $accessToken = 'access_token=207271499718170|7ede4633f6e471307ce8a678a74922c0';
        $fields = 'fields=fan_count';
        $address = 'https://graph.facebook.com/';
        $url = $address.$fanPageId.'?'.$accessToken.'&'.$fields;
        $response = file_get_contents( $url );
        $page = json_decode( $response );
        return $page->fan_count;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Coiny|Slabo+27px" rel="stylesheet">
        <link rel="stylesheet" href="./Public/stylesheets/joinus.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
        <meta charset="utf-8">
        <title>Clabky | ¡Haz parte!</title>
    </head>
    <body>
        <script>
          window.fbAsyncInit = function() {

              let newLike = false;

              const likeButtonCallback = function() {
                  const countElement = document.getElementById('count_number');
                  let count = countElement.innerHTML;
                  count = parseInt( count );
                  count++;
                  countElement.innerHTML = count;
                  newLike = true;
                  countElement.classList.add('green_text');
              };

              const unlikeButtonCallback = function() {
                  const countElement = document.getElementById('count_number');
                  let count = countElement.innerHTML;
                  count = parseInt( count );
                  count--;
                  countElement.innerHTML = count;
                  if( newLike ) {
                      countElement.classList.remove('green_text');
                  }
              };

              FB.init({
                appId      : '207271499718170',
                xfbml      : true,
                version    : 'v2.8'
              });

              FB.Event.subscribe('xfbml.render', function(){
                  FB.Event.subscribe('edge.create', likeButtonCallback);
                  FB.Event.subscribe('edge.remove', unlikeButtonCallback);
              });
          };

          (function(d, s, id){
             var js, fjs = d.getElementsByTagName(s)[0];
             if (d.getElementById(id)) {return;}
             js = d.createElement(s); js.id = id;
             js.src = "//connect.facebook.net/es_LA/sdk.js";
             fjs.parentNode.insertBefore(js, fjs);
           }(document, 'script', 'facebook-jssdk'));
        </script>
        <header>
            <div id="logo_container">
                <a href="#">
                    <img src="./Public/img/joinus/logo.png" alt="Clabki"/>
                </a>
            </div>
            <nav id="contact_navigation">
                <ul>
                    <li>
                        <a id="social_link" href="#">
                            <!-- <img src="./Public/img/joinus/siguenos.png" alt="Redes"/> -->
                        </a>
                    </li>
                    <li>
                        <a id="contact_us_link" href="#">
                            <!-- <img src="./Public/img/joinus/conocenos.png" alt="Conócenos"/> -->
                        </a>
                    </li>
                </ul>
            </nav>
        </header>
        <section id="main_container">
            <h1 id="info_title">¡Haz parte!</h1>
            <p id="info_paragraph">
                Te en lo acudieron ah recababan discipula talentazo distraido.
                Sacamuelas imposibles un pretension molestarle es.
                Gr lo desencanto apasionado comprender no en comprendia.
                Alguien hacerle ya ceguera le decidio guardia mi un. Hay flexible
                sea hermanos llamaban sufrirla. Memorias cerraban ido garantia vez
                gritaban era merlatti invasora. Las actualidad amabilidad indecibles
                preteritos hoy sin magnificas. Apoplejia ola retroceso homenajes por
                tal pretendia.
            </p>
            <form id="join_us_form" action="/app/joinus.php" method="post">
                <div id="form_fields_container">
                    <div class="form_left_column">
                        <div class="small_field">
                            <label for="name">Nombre:</label>
                            <input type="text" name="name" id="name" required>
                        </div>
                        <div class="small_field">
                            <label for="email">Email:</label>
                            <input type="text" name="email" id="email" required>
                        </div>
                    </div>
                    <div class="form_right_column">
                        <div class="large_field">
                            <label for="opinion">Lo que pienso:</label>
                            <textarea name="opinion" id="opinion" required></textarea>
                        </div>
                        <div class="check_box_container">
                            <input type="checkbox" name="interested" value="1">
                            <p>Quiero saber más sobre el collar</p>
                        </div>
                    </div>
                </div>
                <div id="button_container">
                    <input type="submit" value="¡Quiero ser parte!">
                </div>
            </form>
            <section id="followers_container">
                <section id="facebook-page">
                    <div id="facebook-page-container">
                        <div
                        class="fb-page"
                        data-href="https://www.facebook.com/geekedtshirts/"
                        data-tabs="false"
                        data-small-header="false"
                        data-adapt-container-width="true"
                        data-hide-cover="false"
                        data-show-facepile="false">
                            <blockquote
                                cite="https://www.facebook.com/geekedtshirts/"
                                class="fb-xfbml-parse-ignore">
                                <a href="https://www.facebook.com/geekedtshirts/">Geeked</a>
                            </blockquote>
                        </div>
                    </div>
                </section>
                <section id="followers_count">
                    <p id="followers_paragraph">
                        Contigo, ya somos
                        <span id="count_number">
                            <?php echo(getPageFollowers()); ?>
                        </span> personas
                        mostrando interés por esta iniciativa
                    </p>
                </section>
            </section>
        </section>
    </body>
</html>
