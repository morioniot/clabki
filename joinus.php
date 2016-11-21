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
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">
        <link rel="stylesheet" href="./Public/stylesheets/joinus.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
        <meta charset="utf-8">
        <title>Clabki | ¡Haz parte!</title>
    </head>
    <body>
        <!-- <script>
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
        </script> -->
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
        <div id="shadow_container">
            <img src="./Public/img/joinus/shadow.png" alt="shadow" />
        </div>
        <section id="main_container">
            <section id="info_and_form_container">
                <div id="info_paragraph">
                    <div id="info_title"></div>
                    <hr>
                    <p id="info_text">
                        ¡Gracias por tu interés! Te contamos que en este momento
                        estamos trabajando en llevar esta idea al siguiente nivel.
                        Si quieres mantenerte informado sobre nuestros avances,
                        <span>síguenos en nuestras redes sociales.</span> Puedes
                        decirnos lo que piensas usando este formulario. En caso
                        de que estés interesado en el dispositivo para el collar,
                        cuéntanos y te enviaremos la información a tu correo.
                    </p>
                    <hr>
                </div>
                <div id="form_container">
                    <form id="join_us_form" action="/app/joinus.php" method="post">
                        <div id="form_fields_container">
                            <div class="small_field">
                                <label for="name">NOMBRE</label>
                                <input type="text" name="name" id="name" required>
                            </div>
                            <div class="small_field">
                                <label for="email">CORREO</label>
                                <input type="text" name="email" id="email" required>
                            </div>
                            <div class="large_field">
                                <label for="opinion">COMENTARIOS</label>
                                <textarea name="opinion" id="opinion" required></textarea>
                            </div>
                            <div class="check_box_container">
                                <label>QUIERO SABER ACERCA DEL COLLAR</label>
                                <input type="checkbox" name="interested" value="1">
                            </div>
                            <input type="submit" value="">
                        </div>
                    </form>
                </div>
            </section>
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
