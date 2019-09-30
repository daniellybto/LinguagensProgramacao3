<?php

################################################
# Ações do objeto USUÁRIO:
################################################
    if(!empty($_GET['objeto']) AND $_GET['objeto'] == 'usuario'){
        
        
        // ++++++++++++++++++++++++++
        // INSERIR usuário
        // ++++++++++++++++++++++++++
        if($_GET['action'] == 'add'){
?>
            <br>
            <h2 class="text-center">Adicionar Usuário</h2>
            <br>		
            <form action="os_acoes_formularios.php" method="post" class="form-signin col-md-4 mx-auto">
                <div class="form-group row">
                    <label for="nome" class="col-sm-2 col-form-label">Nome:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nome">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="senha" class="col-sm-2 col-form-label">Senha:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="senha">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" name="acao" value="usuario;add">Adicionar</button>
                <a href="os_home.php" class="btn btn-outline-secondary">Voltar</a>
            </form>

<?php

        }

        // ++++++++++++++++++++++++++
        // ATUALIZAR / UPDATE usuário
        // ++++++++++++++++++++++++++
        if($_GET['action'] == 'update'){
            $usuario = new Usuario();
            
            $totalLinhas = $usuario->selectGeral();

            if($totalLinhas == ''){#caso não tenha nenhum registro;
                echo "<p class = 'text-danger'> Nenhum Registro Encontrado</p>";
            } else{ #caso tenha algum registro:
?>
            <br>
            <h2 class="text-center">Atualizar Usuário</h2>
            <br>

            <table class="table table-striped">
                <!-- Cabeçalho da Tabela -->
                <thead class="thead-light">
                    <tr> <!-- linha do cabeçalho da tabela -->
                        <th>ID Aluno</th>
                        <th>Nome do Usuário</th>
                        <th>Email do Usuário</th>
                        <th>Senha do Usuário</th>
                        <th>Alterar</th>
                    </tr>
                </thead>

                <!-- Corpo da Tabela -->
                <tbody>

                </tbody>

            </table>


<?php
            }
        }

        // ++++++++++++++++++++++++++
        // BUSCAR usuário
        // ++++++++++++++++++++++++++
        if($_GET['action'] == 'search'){
?>
            <br>
            <h2 class="text-center">Buscar Usuário</h2>
            <br>


<?php    
        }

        // ++++++++++++++++++++++++++
        // REMOVER usuário
        // ++++++++++++++++++++++++++
        if($_GET['action'] == 'delete'){
?>
            <br>
            <h2 class="text-center">Remover Usuário</h2>
            <br>


<?php            
        }

    }
?>