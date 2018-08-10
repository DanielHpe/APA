<?php
    session_start();
    include('../conexao/conexao.php');
    $codigo = $_GET['codigo'];
    $result = $conexao->query("SELECT * FROM dadosrelatorios WHERE idRelatorio = ".$codigo."");
    $linha = mysqli_num_rows($result);

    if ($linha > 0){
        while($linha = mysqli_fetch_array($result)) {   
            $nome = $linha['nomeRelatorio'];

        } 
    }

?>

<h4 class="text-center">INFORMAÇÕES ADICIONAIS</h4>
<button type="button" id="close" class="btn fechar" style=""><i class="fas fa-times"></i></button>
<hr>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nome:</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $nome ?></td>
        </tr>
    </tbody>
</table>

<script type="text/javascript" src="js/efeitos.js"></script>
<style type="text/css" scoped>
    .fechar{
       /*border: 1px solid black;*/
       padding-top: 15px;
    }
</style>