<?php
    require_once '../CLASS/conection.php';

    $conn = new ConnDb();
    $controle = 0;


    if (isset($_POST['email_emissor'])){
        $email_emissor = addslashes($_POST['email_emissor']);
        $mensagem_emissor = addslashes($_POST['mensagem_emissor']);
    }



    $sql = "INSERT into tbl_mensagem(email_emissor, mensagem_emissor)
    VALUES (:email_emissor, :mensagem_emissor)";
   
    $novo_id = $conn -> insert($sql, array(
        'email_emissor' => $email_emissor,
        'mensagem_emissor' => $mensagem_emissor
    ));
    // print_r($_POST);
    // exit;

//     if (isset($novo_id)){
//         $controle = 1
//     } else{
//         echo "erro";
//     }

// ?>
