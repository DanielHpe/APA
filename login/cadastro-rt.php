<?php
			include("../conexao/conexao.php");

			$nome = $_POST['nome'];
			$email = $_POST['email'];
			$senha = md5($_POST['senha']);

			$cadastrar = $conexao->query("INSERT INTO respTecnico VALUES ('','$nome','$email','$senha')") or die(mysqli_error());

			if($cadastrar){
				echo "
				<script>
				alert('Cadastro Realizado com sucesso!');
				location.href= '../index1.php';
				</script>";

				// $conn = mysqli_connect('localhost','root','');
				// if(!$conn)
				// {
				// 	die('Não é possivel conectar'.mysqli_error());
				// }
				// if($sql = ($conn->query('CREATE DATABASE '.$nome.'') or die(mysqli_error($conn))))
				// {
				// 	echo "<script></script>";
				//
				// }

			}else{
				echo "<script>alert('Usuario ja existe');
				location.href= 'cadastrar_rt.php';
				</script>";
			}




?>
