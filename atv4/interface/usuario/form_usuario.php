<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Cadastro de Usuário</title>
	<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/css/bootstrap.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
<body class="text-center vsc-initialized">
	<div class="container mt-5">
	<i class="material-icons text-primary" style="font-size: 80px;">person_add</i>
		<h2 class="mt-2 mb-4">Cadastro de Usuário</h2>
		
		<form action="acoes_usuario.php" method="post" class="form-signin col-md-4 mx-auto">
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

			<button type="submit" class="btn btn-primary" name="acao" value="cadastrar">Cadastrar</button>
			<a href="login_usuario.php" class="btn btn-outline-secondary">Voltar</a>
		</form>

	</div>
</body>
</html>