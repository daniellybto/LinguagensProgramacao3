<h4>Alunos:</h4>
<a href="?pagina=home&action=add" class="btn btn-primary"> <i class="glyphicon glyphicon-plus"></i> Cadastrar</a>
<a href="?pagina=home" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Listar</a>

<hr>

<?php
    $action = '';
    //caso a minha variável $_GET['action'] não estiver vazia....
    if(!empty($_GET['action'])){
        $action = $_GET['action'];
    }
    if($action == 'insert'){
        #a função 'addslashes' é uma função que pode ser utilizada como uma forma de combater o SQL injection... 
        #não é isso que irá resolver, mais ajuda a prevenir contra ataques do tipo: ' OR '1' = '1
        $nome_alu = addslashes($_POST['nome_alu']);
        $email_alu = addslashes($_POST['email_alu']);

        $bd->query("INSERT INTO tb_aluno (nome_alu, email_alu) VALUES ('$nome_alu', '$email_alu')");
        $action = '';
    }

    #ALTERANDO DADOS NO BANCO!!!
    if($action == 'update'){
        $id_alu = addslashes($_POST['id_alu']);
        $nome_alu = addslashes($_POST['nome_alu']);
        $email_alu = addslashes($_POST['email_alu']);

        $bd->query("UPDATE tb_aluno SET nome_alu='$nome_alu', email_alu='$email_alu' WHERE id_alu = $id_alu");
        $action = '';
    }

    #ADICIONANDO OS DADOS <FORMULÁRIO PARA ADICIONAR DADOS AO BANCO> 
    if($action == 'add'){
?>
<!-- HTML - ADICIONAR -->
    <div class="col-6 col-md-4">

        <form action="?action=insert" method="post" name="form1" id="form1">
            <label>Nome: </label>
            <input type="text" name="nome_alu" id="nome_alu" class="form-control">
            <label>Email: </label>
            <input type="email" name="email_alu" id="email_alu" class="form-control">
            <br>
            <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Salvar</button>
            <a href="?" class="btn btn-default">Cancelar</a>
            
        </form>
    </div>

<?php
    }
    if($action == 'edit'){
        $id_alu = $_GET['id_alu'];
        $bd->query("SELECT * FROM tb_aluno WHERE id_alu = $id_alu");

        foreach ($bd->result() as $dados) {
?>
<!-- HTML - EDITAR -->
            <div class="col-6 col-md-4">

                <form action="?action=update" method="post" name="form1" id="form1">
                    <input type="hidden" name="id_alu" id="id_alu" class="form-control" value="<?= $dados['id_alu'];?>">
                    <label>Nome: </label>
                    <input type="text" name="nome_alu" id="nome_alu" class="form-control" value="<?= $dados['nome_alu'];?>">
                    <label>Email: </label>
                    <input type="email" name="email_alu" id="email_alu" class="form-control" value="<?= $dados['email_alu'];?>">
                    <br>
                    <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Salvar</button>
                    <a href="?" class="btn btn-default">Cancelar</a>
                    
                </form>
            </div>

<?php   
        }
    }
    #ACTION PARA EXCLUIR REGISTROS:::::
    if($action == 'delete'){
        $id_alu = $_GET['id_alu'];
        $bd->query("DELETE FROM tb_aluno WHERE id_alu = '$id_alu'");
        $action = '';
    }

    if($action == ''){
        $bd->query("SELECT * FROM tb_aluno");
        $total = $bd->linhas(); #retorna a quantidade linhas encontradas (linhas de registro no banco de dados)
        if($total == ''){#caso NÃO TENHA NENHUM registro:
            echo "Nenhum resultado encontrado!";
        }else{#caso tenha algum registro:

?>
<!-- HTML - APRESENTAR OS DADOS NA TABELA -->
            <table class="table table-striped">
                <thead class="thead-light"><!-- cabeçalho da tabela -->
                    <tr><!-- LINHA da tabela -->
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th align="center">Opções</th>
                    </tr>
                </thead>

                <tbody><!-- corpo da tabela -->

                <?php foreach ($bd->result() as $dados) {?>
                    <tr>
                        <td><?=$dados['id_alu'];?></td>
                        <td><?=$dados['nome_alu'];?></td>
                        <td><?=$dados['email_alu'];?></td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="?action=edit&id_alu=<?=$dados['id_alu'];?>"><i class="glyphicon glyphicon-pencil"></i> </a>
                            <a class="btn btn-danger btn-sm" href="?action=delete&id_alu=<?=$dados['id_alu'];?>"><i class="glyphicon glyphicon-trash"></i> </a>
                        </td>
                    </tr>
                <?php } ?>

                </tbody>
            </table>
<?php

        }
        
    }
?>