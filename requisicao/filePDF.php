<?php

	// include('../conexao/conexao.php');

	// require_once('dompdf/dompdf/dompdf_config.inc.php');
	// $dompdf = new DOMPDF();

	$result = $conexao->query("SELECT * FROM projeto WHERE layer ='Loteamento' or layer = 'CadastroCP' or layer = 'Edificacao'");
    $linha = mysqli_num_rows($result);
        
        if ($linha > 0){
                while($linha = mysqli_fetch_array($result))
                {
						$layer = $linha['layer'];
						$length = $linha['length'];
						$area = $linha['area'];
					?>
						<table class="table table-bordered table-condensed">
							<thead>
								<tr>
									<th>layer</th>
									<th>length</th>
									<th>area</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $layer ?></td>
									<td><?php echo $length ?></td>
									<td><?php echo $area ?></td>
								</tr>
							</tbody>
						</table>

                <?php 
			 	} 
            }


 	$resultado = $conexao->query("SELECT * FROM dadosrelatorios ");
    $row = mysqli_num_rows($resultado);
        
        if ($row > 0){
                while($row = mysqli_fetch_array($resultado))
                {
                	$layer = $row['layer'];
				  	$nome_proj = $row['nomeRelatorio'];
					$iptu = $row['iptu'];
					$zoneamento = $row['zoneamento'];
					$afast_latEsq = $row['afastamento_lateral_esq'];
					$afast_latDir = $row['afastamento_lateral_dir'];
					$afast_fundos = $row['afastamento_fundos'];
					$afast_frente = $row['afastamento_frontal'];
					$alt_maxima = $row['altura_maxima'];

					?>
						<table style="border: 1px solid #000">
							<thead>
								<tr>
									<th>Nome</th>
									<th>layer</th>
									<th>Iptu</th>
									<th>Zoneamento</th>
									<th>Afastamento lateral</th>
									<th>Afastamento lateral esq</th>
									<th>Afastamento fundos</th>
									<th>Afastamento frontal</th>
									<th>Altura Máxima</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $nome_proj ?></td>
									<td><?php echo $layer ?></td>
									<td><?php echo $iptu ?></td>
									<td><?php echo $zoneamento ?></td>
									<td><?php echo $afast_latEsq ?></td>
									<td><?php echo $afast_latDir ?></td>
									<td><?php echo $afast_fundos ?></td>
									<td><?php echo $afast_frente ?></td>
									<td><?php echo $alt_maxima ?></td>
								</tr>
							</tbody>
						</table>

                <?php 
			 	} 
            }

// $dompdf->load_html("
// <html>

// <style>
// 	body{
// 		margin:10px;
// 		padding:5px;
// 	}
// 	h3{
// 		padding-bottom: 50px;

// 	}	
// 	#data{
// 	margin-right:50px;
// }
// .rodape{
// 	bottom:50px;
// }
// .imagem img{
// 	top:50%;
// 	margin-top:-100px;
// 	position:absolute;
// 	opacity:0.2;
// 	left:50%;
// 	margin-left:-200px;
// 	width: 400px;
// 	height:auto;
// }
// .imagem1 img{
// 	position:absolute;
// 	width:150px;
// 	height:auto;
// }
// </style>

// <body>
// <div class='container'>
// <div class='imagem1'>
// 	<img src='img/Logo.png' alt='Incentiva Construtora Ltda'>
// </div>
// <div class='imagem'>
// 	<img src='img/Logo.png' alt='Incentiva Construtora Ltda'>
// </div>
// <h3 style='text-align: center;'>Relatório Projeto $nome</h3>

// Nome: $nome <br>
// Responsavel: $responsavel <br>
// Telefone: $telefone <br>
// Lote: $lote <br>
// Quadra: $quadra <br>
// Logradouro: $logradouro <br>
// Bairro: $bairro <br>
// Data Inicio: $data_inicio <br>
// Data Término:  $data_termino <br>
// Status: $status <br> 
// Protocolo: $protocolo <br><br>
// <h4>Observacao:</h4> $var - $data_post 
// <br><br><br>
// <br><br><br>

// <div id='data'>
// 	<p style='text-align:right;'>Belo Horizonte,_____ de _____________________ de 2017.</p>
// </div>

// <br><br><br>
// <br><br><br>

// 	<div class='container rodape'>
// 		<p style='text-align:center;'>___________________________________________________________________</p>
// 							<p style='text-align:center; font:calibri;'>Incentiva Construtora Ltda <br>
// 							CNPJ: 23.042.937/0001-25</p>
// 	</div>
// </div>
// </body>
// </html>");
// $dompdf->render();
// $dompdf->stream("Relatório Projeto $nome.pdf",
// array('attachment', false)
// 	);

 ?>