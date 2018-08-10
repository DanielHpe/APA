
<?php
// session_start();

include('conexao/conexao.php');

$nome_relatorio = $_GET['nome_relatorio'];


      // SELECT SOMENTE NA LAYER LOTEAMENTO REAL
    $resultado = $conexao->query("SELECT * FROM dadosReport WHERE nomeRelatorio = '".$nome_relatorio."' LIMIT 1");
    $row = mysqli_num_rows($resultado);

    if ($row > 0){
        while($row = mysqli_fetch_array($resultado))
        {
            $nome_proj = $row['nomeRelatorio'];
            $iptu = $row['iptu'];
            $zoneamento = $row['zoneamento'];
            $uso = $row['uso'];
            $areaEdificacao = $row['areaEdificacao'];
            $areaLote = $row['areaLoteReal'];
            $areaCp = $row['areaLoteCp'];
        } 
    }

    $resultado = $conexao->query("SELECT * FROM dadosreport WHERE nomeRelatorio = '".$nome_relatorio."' AND descricao = 'Afastamento lateral direita' LIMIT 1");

    $row = mysqli_num_rows($resultado);

    if ($row > 0){
        while($row = mysqli_fetch_array($resultado))
        {

            $descricaoAfastamentoDireito = $row['descricao'];   
            $afastamentoLateralDireito = $row['medidaProjeto'];
            $afastamentoDireitoPermitido = $row['medidaPermitida'];
            $situacaoAfastDireito = $row['situacao'];
            $observacaoAfastDireito = $row['observacao'];

        } 
    }

    $resultado = $conexao->query("SELECT * FROM dadosreport WHERE nomeRelatorio = '".$nome_relatorio."' AND descricao = 'Afastamento lateral esquerda' LIMIT 1");

    $row = mysqli_num_rows($resultado);

    if ($row > 0){
        while($row = mysqli_fetch_array($resultado))
        {

            $descricaoAfastamentoEsquerdo = $row['descricao'];  
            $afastamentoLateralEsquerdo = $row['medidaProjeto'];
            $afastamentoEsquerdoPermitido = $row['medidaPermitida'];
            $situacaoAfastEsquerda = $row['situacao'];
            $observacaoAfastEsquerdo = $row['observacao'];

        } 
    }

    $resultado = $conexao->query("SELECT * FROM dadosreport WHERE nomeRelatorio = '".$nome_relatorio."' AND descricao = 'Afastamento frontal' LIMIT 1");

    $row = mysqli_num_rows($resultado);

    if ($row > 0){
        while($row = mysqli_fetch_array($resultado))
        {

            $descricaoAfastamentoFrontal = $row['descricao'];   
            $afastamentoFrontal = $row['medidaProjeto'];
            $afastamentoFrontalPermitido = $row['medidaPermitida'];
            $situacaoAfastFrontal = $row['situacao'];
            $observacaoAfastFrontal = $row['observacao'];

        } 
    }

    $resultado = $conexao->query("SELECT * FROM dadosreport WHERE nomeRelatorio = '".$nome_relatorio."' AND descricao = 'Afastamento fundos' LIMIT 1");

    $row = mysqli_num_rows($resultado);

    if ($row > 0){
        while($row = mysqli_fetch_array($resultado))
        {

            $descricaoAfastamentoFundo = $row['descricao'];     
            $afastamentoFundos = $row['medidaProjeto'];
            $afastamentoFundosPermitido = $row['medidaPermitida'];
            $situacaoAfastFundos = $row['situacao'];
            $observacaoAfastFundos = $row['observacao'];

        } 
    }

    $resultado = $conexao->query("SELECT * FROM dadosreport WHERE nomeRelatorio = '".$nome_relatorio."' AND descricao = 'Taxa de Ocupação' LIMIT 1");

    $row = mysqli_num_rows($resultado);

    if ($row > 0){
        while($row = mysqli_fetch_array($resultado))
        {

            $descricaoTaxa = $row['descricao'];
            $taxaOcupacao = $row['medidaProjeto'];
            $taxaOcupacaoPermitido = $row['medidaPermitida'];
            $situacaoTaxa = $row['situacao'];
            $observacaoTaxa = $row['observacao'];

        } 
    }

    $resultado = $conexao->query("SELECT * FROM dadosreport WHERE nomeRelatorio = '".$nome_relatorio."' AND descricao = 'Coeficiente Aproveitamento' LIMIT 1");

    $row = mysqli_num_rows($resultado);

    if ($row > 0){
        while($row = mysqli_fetch_array($resultado))
        {

            $descricaoCaAproveitamento = $row['descricao']; 
            $caAproveitamento = $row['medidaProjeto'];
            $caAproveitamentoPermitido = $row['medidaPermitida'];
            $situacaoCA = $row['situacao'];
            $observacaoCA = $row['observacao'];

        } 
    }

    $resultado = $conexao->query("SELECT * FROM dadosreport WHERE nomeRelatorio = '".$nome_relatorio."' AND descricao = 'Altura na divisa' LIMIT 1");

    $row = mysqli_num_rows($resultado);

    if ($row > 0){
        while($row = mysqli_fetch_array($resultado))
        {

            $descricaoAlturaDivisa = $row['descricao']; 
            $alturaDivisa = $row['medidaProjeto'];
            $alturaDivisaPermitido = $row['medidaPermitida'];
            $situacaoAlturaDivisa = $row['situacao'];
            $observacaoAlturaDivisa = $row['observacao'];

        } 
    }

    $resultado = $conexao->query("SELECT * FROM dadosreport WHERE nomeRelatorio = '".$nome_relatorio."' AND descricao = 'Área Permeável' LIMIT 1");

    $row = mysqli_num_rows($resultado);

    if ($row > 0){
        while($row = mysqli_fetch_array($resultado))
        {

            $descricaoAreaPermeavel = $row['descricao'];        
            $areaPermeavel = $row['medidaProjeto'];
            $areaPermeavelPermitido = $row['medidaPermitida'];
            $situacaoAreaPermeavel = $row['situacao'];
            $observacaoAreaPermeavel = $row['observacao'];

        } 
    }

    $resultado = $conexao->query("SELECT * FROM dadosreport WHERE nomeRelatorio = '".$nome_relatorio."' AND descricao = 'Vagas de Estacionamento' LIMIT 1");

    $row = mysqli_num_rows($resultado);

    if ($row > 0){
        while($row = mysqli_fetch_array($resultado))
        {

            $descricaoVagas = $row['descricao'];    
            $vagasEstacionamento = $row['medidaProjeto'];
            $vagasPermitido = $row['medidaPermitida'];
            $situacaoVagas = $row['situacao'];
            $observacaoVagas = $row['observacao'];

        } 
    }

require_once('dompdf/dompdf/dompdf_config.inc.php');

$dompdf = new DOMPDF();

$html = "
<style>
*{
    margin: 2;
}
table{
    width: 100%;
    
}
.principal1{
    font-size: 16px;
    font-family: Arial, Helvetica, sans-serif;
    border: 0.5px solid #ddd;
    background-color: #eee;
}
.principal{
    font-size: 14px;
    font-family: Arial, Helvetica, sans-serif;
    border: 0.5px solid #ddd;
    background-color: #eee;
}
table tr th{x'
    padding: 5px;
    border: 0.5px solid #bbb;
    font-size: 14px;
    background-color: #eee;
}
td{
    padding: 5px;
    border: 0.5px solid #bbb;
    font-size: 13px;
    font-family: Arial, Helvetica, sans-serif;    
}

.painel-info{
	border: 0.5px solid #ddd;
	border-left: 5px solid #ddd;
	background-color: #eee;
	margin: 8px;
    padding-left: 10px;
    padding-top: 2px;
    padding-bottom: 2px;
	
	font-size: 14px;
	
}
.painel-danger{
	border: 1px solid #e00;
	border-left: 10px solid #e00;
	background-color: rgb(250, 232, 225);
	margin: 8px;
	padding-left: 15px;
	font-size: 12px;
}
.painel-warning{
	border: 1px solid rgb(243, 181, 65);
	border-left: 10px solid rgb(243, 181, 65);
	background-color: rgb(255, 243, 220);
	margin: 8px;
	padding-left: 15px;
	font-size: 12px;
}
</style>
<table>
<thead>
<tr>
<th class='principal1'>RELATÓRIO DE VALIDAÇÕES DE PROJETO</th>
</tr>
</thead>
</table>

<table class='table' style='margin-top: 10px;'>
<thead>
<tr>
<th class='principal'>DADOS DO LOTE</th>
</tr>
</thead>
<tbody>
<tr>
<td>
<table class='table table-condensed table-bordered'>
<thead>
<tr >
    <th>Nome Projeto</th>
    <td colspan='4' style='text-transform: uppercase'>  $nome_proj </td>
    <th >IPTU</th>
    <td class=''>  $iptu </td>
    <th class=''>Zoneamento</th>
    <td class='' style='text-transform: uppercase'>  $zoneamento </td>
        

</tr>
</thead>
<tbody>
<tr>
    <th class='' >Área da Edificação</th>
    <td class=''>  $areaEdificacao  m²</td>
        
    <th colspan='2'>Uso</th>
    <td class='' style='text-transform: uppercase'>  $uso </td>
        
    <th class='' >Área do lote (REAL)</th>                                
    <td class=''>  $areaLote  m²</td>     
    
    <th class='' >Área do lote (CP)</th>
    <td class=''>  $areaCp  m²</t>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>  


<table style='margin-top: 30px'>
<thead>
<tr>
<th class='principal'>ESPECIFICIDADES DO PROJETO</th>
</tr>
</thead>
<tbody>
<tr>

<td>
<table>
<thead>
<tr>
<th colspan='5'>ITENS VERIFICADOS</th>  
            
</tr>
<tr>
<th >Descrição</th>
<th >Medida do projeto</th>  
<th >
Permitido conforme:<br>
<i>(lei nº 079/2009)</i>
</th>                          
<th>Status</th>                          
<th>Observação</th>                          

</tr>

</thead>
<tbody>
<tr >
    <td class='text-center'> $descricaoAfastamentoDireito</td>
    <td class='text-center'> $afastamentoLateralDireito  m</td>
    <td class='text-center'> $afastamentoDireitoPermitido  m</td>
    <td class='text-center'> $situacaoAfastDireito</td>
    <td style='width:50%' class='text-left'>$observacaoAfastDireito</td>
</tr>
<tr >
    <td class='text-center'> $descricaoAfastamentoEsquerdo  m</td>
    <td class='text-center'> $afastamentoLateralEsquerdo m</td>
    <td class='text-center'> $afastamentoEsquerdoPermitido  m</td>
    <td class='text-center'> $situacaoAfastEsquerda</td>
    <td style='width:50%' class='text-left'>$observacaoAfastEsquerdo</td>
</tr>
<tr >
    <td class='text-center'> $descricaoAfastamentoFrontal</td>
    <td class='text-center'> $afastamentoFrontal m</td>
    <td class='text-center'> $afastamentoFrontalPermitido  m</td>
    <td class='text-center'> $situacaoAfastFrontal</td>
    <td style='width:50%' class='text-left'>$observacaoAfastFrontal</td>
</tr>
<tr >
    <td class='text-center'> $descricaoAfastamentoFundo</td>
    <td class='text-center'> $afastamentoFundos m</td>
    <td class='text-center'> $afastamentoFundosPermitido  m</td>
    <td class='text-center'> $situacaoAfastFundos</td>
    <td style='width:50%' class='text-left'>$observacaoAfastFundos</td>
</tr>
<tr >
    <td class='text-center'> $descricaoTaxa</td>
    <td class='text-center'> $taxaOcupacao m</td>
    <td class='text-center'> $taxaOcupacaoPermitido  m</td>
    <td class='text-center'> $situacaoTaxa</td>
    <td style='width:50%' class='text-left'>$observacaoTaxa</td>
</tr>
<tr >
    <td class='text-center'> $descricaoCaAproveitamento</td>
    <td class='text-center'> $caAproveitamento m</td>
    <td class='text-center'> $caAproveitamentoPermitido  m</td>
    <td class='text-center'> $situacaoCA</td>
    <td style='width:50%' class='text-left'>$observacaoCA</td>
</tr>
<tr >
    <td class='text-center'> $descricaoAlturaDivisa</td>
    <td class='text-center'> $alturaDivisa m</td>
    <td class='text-center'> $alturaDivisaPermitido  m</td>
    <td class='text-center'> $situacaoAlturaDivisa</td>
    <td style='width:50%' class='text-left'>$observacaoAlturaDivisa</td>
</tr>
<tr >
    <td class='text-center'> $descricaoAreaPermeavel</td>
    <td class='text-center'> $areaPermeavel m</td>
    <td class='text-center'> $areaPermeavelPermitido  m</td>
    <td class='text-center'> $situacaoAreaPermeavel</td>
    <td style='width:50%' class='text-left'>$observacaoAreaPermeavel</td>
</tr>
<tr >
    <td class='text-center'> $descricaoVagas</td>
    <td class='text-center'> $vagasEstacionamento m</td>
    <td class='text-center'> $vagasPermitido  m</td>
    <td class='text-center'> $situacaoVagas</td>
    <td style='width:50%' class='text-left'>$observacaoVagas</td>
</tr>
</tbody>                       
</table>
</td>
</tr>
</tbody>
</table>
        
";



// echo session_id();

$dompdf->load_html($html);
$dompdf->render();
$dompdf->set_paper('A4');
$output = $dompdf->output();

mkdir('C:/xampp/htdocs/TCC/documentos/'.$_SESSION['nome_usuario'], 0777);

file_put_contents('C:/xampp/htdocs/TCC/documentos/'.$_SESSION['nome_usuario'].'/'.$nome_proj.'.pdf', $output);

$dompdf->stream("Relatorio Projeto $nome_proj.pdf", array('Attachment' => false));


// echo $_SESSION['nome_usuario'];
// $path = 'C:/xampp/htdocs/tcc/documentos/'.$_SESSION['nome_usuario'].'/';

// $conexao->query("INSERT INTO documentos (id, nome, path) 
// VALUES ('', '".$_SESSION['nome_usuario']."', '$path')");




?>