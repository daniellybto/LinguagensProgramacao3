<?php

    // class ClassConexao{

    //     public function conectaDB(){
    //         try {
    //             $con = new mysqli("localhost", "root", "", "ifto", "3307");
    //             return $con;
    //         } catch (Exception $erro) {
    //             return $erro->getMessage();
    //         }
    //     }

    // }

    // class classCrud extends ClassConexao{
    //     private $crud;
    //     private $contador;
    //     private $resultado;
        
    //     #peparação das declarativas
    //     private function preparedStatements($query, $tipos, $parametros){
    //         $this->countParametros($parametros);

    //         $con = $this->conectaDB();
    //         $this->crud = $con->prepare($query);

    //         if($this->contador > 0){
    //             $callParametros = array();
    //             foreach($parametros as $key => $parametros){
    //                 $callParametros[$key] = &$parametros[$key];
    //             }

    //             array_unshift($callParametros, $tipos);
    //             call_user_func_array(array($this->crud, 'bind_param'), $callParametros);
    //         }
             
    //         $this->crud->execute();
    //         $this->resultado = $this->crud->get_result();
    //     }

    //     #contador de parâmetros
    //     private function countParametros($parametros){
    //         $this->contador = count($parametros);


    //     }
    // }


    // $conexao = new ClassConexao();
    // echo "<pre>";
    // var_dump($conexao->conectaDB());
    // echo "</pre>";


    // $mysqli = new mysqli("localhost", "root", "", "ifto", "3307");
    // $mysqli = mysqli_connect("localhost", "root", "", "ifto", "3307");

    // $sql = "INSERT INTO empresa(razao_social,nome_fantasia,cnpj, endereco, numero, bairro, cidade, estado, responsavel, email, telefone) VALUES ($this->razaoSocial, $this->nomeFantasia, $this->cnpj, $this->endereco, $this->numero, $this->bairro, $this->cidade, $this->estado, $this->responsavel, $this->email, $this->telefone)";

    // /* check connection */
    // if ($mysqli->connect_errno) {
    //     printf("Connect failed: %s\n", $mysqli->connect_error);
    //     exit();
    // }



    // $con=mysqli_connect("localhost", "root", "", "ifto");
    // // Check connection
    // if (mysqli_connect_errno())
    // {
    // echo "Failed to connect to MySQL: " . mysqli_connect_error();
    // }

    // // Perform queries
    // mysqli_query($con,"INSERT INTO empresa(razao_social,nome_fantasia,cnpj, endereco, numero, bairro, cidade, estado, responsavel, email, telefone) VALUES ($this->razaoSocial, $this->nomeFantasia, $this->cnpj, $this->endereco, $this->numero, $this->bairro, $this->cidade, $this->estado, $this->responsavel, $this->email, $this->telefone)");
    // mysqli_query($con,"INSERT INTO Persons (FirstName,LastName,Age)
    // VALUES ('Glenn','Quagmire',33)");

    // mysqli_close($con);
    
    // $mysqli->query("INSERT INTO empresa(razao_social,nome_fantasia,cnpj, endereco, numero, bairro, cidade, estado, responsavel, email, telefone) VALUES ($this->razaoSocial, $this->nomeFantasia, $this->cnpj, $this->endereco, $this->numero, $this->bairro, $this->cidade, $this->estado, $this->responsavel, $this->email, $this->telefone)");


    /* Create table doesn't return a resultset */
    // if ($mysqli->query("INSERT INTO empresa(razao_social,nome_fantasia,cnpj, endereco, numero, bairro, cidade, estado, responsavel, email, telefone) VALUES ($this->razaoSocial, $this->nomeFantasia, $this->cnpj, $this->endereco, $this->numero, $this->bairro, $this->cidade, $this->estado, $this->responsavel, $this->email, $this->telefone)") === TRUE) {
    //     printf("Table myCity successfully created.\n");
    // }

    // if (mysqli_query($mysqli, $sql) === TRUE) {
    //     printf("Table myCity successfully created.\n");
    // }


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ifto";

    $razaoSocial = 'dany2';
    $nomeFantasia = 'asfawefaea';
    $cnpj = '25828-595';
    $endereco = 'aefae oaewfo am3f';
    $numero = '282';
    $bairro = 'adfmoad';
    $cidade = 'aefaooem';
    $estado = 'TO';
    $responsavel = 'AQUI';
    $email = 'dany@gmail.com';
    $telefone = '29161-216178';


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // $sql = "INSERT INTO empresa(razao_social ,nome_fantasia ,cnpj , endereco, numero, bairro, cidade, estado, responsavel, email, telefone) VALUES ($razaoSocial, `$nomeFantasia`, `$cnpj`, `$endereco`, `$numero`, `$bairro`, `$cidade`, `$estado`, `$responsavel`, `$email`, `$telefone`)";


    $sql = "INSERT INTO empresa(razao_social,nome_fantasia,cnpj, endereco, numero, bairro, cidade, estado, responsavel, email, telefone) VALUES ('$razaoSocial', '$nomeFantasia', '$cnpj', '$endereco', '$numero', '$bairro', '$cidade', '$estado', '$responsavel', '$email', '$telefone')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

?>