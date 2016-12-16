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
        <link rel="stylesheet" href="./public/stylesheets/joinus.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
        <meta charset="utf-8">
        <title>Clabki | ¡Haz parte!</title>
    </head>
    <body>
        <header>
            <div id="logo_container">
                <a href="./">
                </a>
            </div>
            <nav id="contact_navigation">
                <ul id="desktop_navigation">
                    <li>
                        <a id="home_link" href="./"></a>
                    </li>
                    <li>
                        <div id="social_link_container">
                            <a class="facebook_link social_link" href="#"></a>
                            <a class="instagram_link social_link" href="#"></a>
                        </div>
                    </li>
                    <li>
                        <a id="contact_us_link" href="./team.html"></a>
                    </li>
                </ul>
                <ul id="mobile_navigation">
                    <li>
                        <a id="home_link_mobile" href="./"></a>
                    </li>
                    <li>
                        <div id="social_link_container_mobile">
                            <a class="facebook_link social_link" href="#"></a>
                            <a class="instagram_link social_link" href="#"></a>
                        </div>
                    </li>
                    <li>
                        <a id="contact_us_link_mobile" href="./team.html"></a>
                    </li>
                </ul>
            </nav>
        </header>
        <div id="shadow_container">
            <img src="./public/img/common/shadow.png" alt="shadow" />
        </div>
        <section id="main_container">
            <section id="info_and_form_container">
                <div id="info_paragraph">
                    <div id="info_title"></div>
                    <hr>
                    <p class="info_text">
                        ¡Gracias por tu interés! Te contamos que este proyecto
                        aún se encuentra en desarrollo y estamos trabajando
                        fuertemente para hacer de esta iniciativa una realidad.
                    </p>
                    <p class="info_text">
                        No te desanimes, puedes hacer parte de Clabki desde ya
                        <span>siguiéndonos en nuestras redes sociales</span> en
                        donde te contaremos cómo vamos avanzando. En caso de que
                        quieras dejarnos algún comentario o saber más sobre el
                        dispositivo para el collar, puedes usar el siguiente
                        formulario.
                    </p>
                </div>
                <div id="form_container">
                    <form id="join_us_form" action="app/joinus.php" method="post">
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
                                <label for="interested_check">QUIERO SABER ACERCA DEL COLLAR</label>
                                <input id="interested_check" type="checkbox" name="interested" value="1">
                            </div>
                            <input type="submit" value="">
                        </div>
                    </form>
                </div>
            </section>
            <section id="followers_container">
                <div id="facebook_widget">
                    <div class="widget_element" id="like_image_container">
                        <a href="#"></a>
                    </div>
                    <div id="text_count_container" class="widget_element">
                        <p>A
                            <span id=facebook_count>
                                <?php echo getPageFollowers(); ?>
                            </span>
                        </p>
                        <p class="bold_text">PERSONAS</p>
                        <p>LES GUSTA</p>
                        <p class="bold_text">CLABKI<span id="exclamation">!</span></p>
                    </div>
                    <div class="widget_element" id="lines_container">
                        <img src="./public/img/joinus/lines.png" />
                    </div>
                </div>
            </section>
        </section>
    </body>
</html>
