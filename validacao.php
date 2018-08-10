<?php
	include("conexao/conexao.php");
	session_start();


	$valida_nome = $_POST['nome'];
	$valida_senha = md5($_POST['senha']);

	$resultado = $conexao->query("SELECT * FROM respTecnico WHERE nome = '".$valida_nome."'");
	$row = mysqli_num_rows($resultado);

	if($row){
		$row = mysqli_fetch_array($resultado);

		if(!strcmp($valida_senha, $row['senha'])){
			$_SESSION['nome_usuario'] = $row['nome'];
			$_SESSION['ultimoAcesso'] = date('d-m-Y H:i');

			header("Location: index.php");

		}else{
			echo "<script>alert('Senha Invalida')
			location.href = 'index1.php';
			</script>";
			exit;
		}
	}else{
		echo "<script>alert('Usuário não existe')
			location.href = 'index1.php';
			</script>";
		exit;
	}


?>
