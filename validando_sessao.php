<?php

	session_start();

	if(!isset($_SESSION['nome_usuario'])){

		session_destroy();
		header("Location: index1.php");
		exit;

	}else{
		$salvaData = $_SESSION['ultimoAcesso'];
		$agora = date('d-m-Y H:i');

		$tempo = (strtotime($agora)-strtotime($salvaData));

		if($tempo >= 2000){
			session_destroy();
			echo "<script>alert('Finalizando Sessão')
			location.href = 'index1.php';
			</script>";
		}else{
			$_SESSION['ultimoAcesso'] = $agora;
		}
	}



?>
