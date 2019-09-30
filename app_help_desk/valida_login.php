<?php
    session_start();

    //variável que verifica se a autenticação foi realizada:
    $usuario_autenticado = false; //só irá receber verdadeiro caso o usuário seja autenticado com sucesso!

    //relação de usuários do sistema:
    $usuarios_app= array(
        array('email' => 'adm@teste.com.br', 'senha' => '123456'),
        array('email' => 'dany@teste.com', 'senha' => '123')
    );

    foreach($usuarios_app as $user){
        //validar se o usuário é um usuário válido
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
            $usuario_autenticado = true; //usuário autenticado - OK!!!!!!
            
        }
    }

    //Verificando se o usuário foi autenticado com sucessxxo (se for igual a um usuário permitido acima) ou não...
    if($usuario_autenticado){
        echo 'Usuário autenticado e validado com sucesso!!';
        $_SESSION['autenticado'] = 'SIM';
        header('Location: home.php');
    }
    else{
        //função nativa do php onde redireciona p/ uma pagina
        header('Location: index.php?login=erro'); 
        $_SESSION['autenticado'] = 'NAO';
    }

?>