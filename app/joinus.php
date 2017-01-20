<?php
    require_once(__DIR__.'/database/db_connection.php');
    require_once(__DIR__.'/mail.php');

    //Creating a new sql connection
    $sqlConnection = new DatabaseConnection();

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $opinion = htmlspecialchars($_POST['opinion']);
    $interested = htmlspecialchars($_POST['interested']);

    //Verifies for no empty strings in the variables
    if(!$name || !$email || !$opinion) {
        $USER_ERROR = 1;
        $message = 'Algunos campos se encuentran vacíos';
        throw new Exception($message, $USER_ERROR);
    }
    else {
        //Allocating value if it is undefined (unchecked checkbox)
        $interested = ($interested !== '') ? $interested : 0;

        //Saving in database
        $query = "INSERT INTO `users`(
            `name`,
            `mail`,
            `opinion`,
            `interested`,
            `date`
        ) VALUES (
            '".$name."',
            '".$email."',
            '".$opinion."',
            '".$interested."',
            NOW()
        )";

        if(!$sqlConnection->query( $query )) {
            $message =
            'Se produjo un error al guardar los datos del formulario: '
            .$sqlConnection->error;
            throw new Exception($message, $sqlConnection->errno);
        }

        //Sending email
        if($interested == '1') {
            sendDeviceInfoMail( $email );
        }

        header('Location: '.'../submit_confirmation.html');
    }
?>
