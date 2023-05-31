<?php
    require_once '../class/conection.php';

    $conn = new ConnDb();
    $controle = 0;
    $email_usuario = $_POST['email_usuario'];
    $senha_usuario = $_POST['senha_usuario'];

    if (!empty($email_usuario) && !empty($senha_usuario)){
        $email_usuario = addslashes($email_usuario);
        $senha_usuario = addslashes($senha_usuario);

        $sql = "SELECT email_usuario, senha_usuario, id_usuario FROM tbl_usuario WHERE email_usuario = :email_usuario AND :senha_usuario";

        $result = $conn-> select($sql, array('email_usuario' => $email_usuario, 'senha_usuario' => $senha_usuario));

        $sql_senha = "SELECT senha_usuario, email_usuario FROM tbl_usuario";
        $resultado_senha = $conn-> select($sql_senha, []);
        
        foreach ($resultado_senha as $linha) {
            // Processar cada linha do resultado
            $confirmaSenha = $linha['senha_usuario'];
            $confirmaEmail = $linha['email_usuario'];
        }

        // print_r($linha);
        // exit;



        if (count($result) == 1){

        if ($senha_usuario == $confirmaSenha && $email_usuario == $confirmaEmail){
                
            echo "Sucesso";
            header('Location: ../public/pages/adm_page.html');
            
        
            $id = $result[0]["id_usuario"];

            session_start();
            $_SESSION["id_usuario"] = $id;
            $controle = 1;

            $json = array(
                'status' => '200',
                'result' => 'Deu bom'
            );
            
        } else {
            echo "deu ruim";
            
        }
    }
    }
    header('Content-type: application/json; chatset=utf-8');
    // echo $json_encode($json);