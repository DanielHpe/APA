
<?php
session_start();

include('conexao/conexao.php');
include('tabela/index.php');
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
    <td class=''>  $area_edificacao  m²</td>
        
    <th colspan='2'>Uso</th>
    <td class='' style='text-transform: uppercase'>  $uso </td>
        
    <th class='' >Área do lote (REAL)</th>                                
    <td class=''>  $area_lote_real  m²</td>     
    
    <th class='' >Área do lote (CP)</th>
    <td class=''>  $area_cp  m²</t>
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
";
if($afast_latDir < $afast_lateral_minimo) {

$html.="<tr >
<td class='text-center'>Afastamento lateral direita</td>
<td class='text-center'> $afast_latDir  m</td>
<td class='text-center'> $afast_lateral_minimo  m</td>
<td class='text-center'>Reprovado</td>
<td style='width:50%' class='text-left'>De acordo com a lei 079/2009, afastamento lateral é de no minímo <strong> $afast_lateral_minimo  m</strong> e de acordo com o projeto é de:  $afast_latDir m.
<br><i>(Favor considerar a cota lateral apartir da edificação até a projeção do cadastro da prefeitura (CP))</i></td>
</tr>";

}else if($afast_latDir >= $afast_lateral_minimo) {

$html .="<tr>
<td class='text-center'>Afastamento lateral direita</td>
<td class='text-center'> $afast_latDir  m</td>
<td class='text-center'> $afast_lateral_minimo  m</td>
<td class='text-center'>Aprovado</td>
<td style='width:50%' class='text-left'> <i>(Favor considerar a cota lateral apartir da edificação até a projeção do cadastro da prefeitura (CP))</i></td>

</tr>";
// Afastamento Lateral Esquerdo Minimo
}
if($afast_latEsq < $afast_lateral_minimo) {
$html .="<tr >
        <td class='text-center'>Afastamento lateral esquerda</td>
        <td class='text-center'> $afast_latEsq  m</td>
        <td class='text-center'> $afast_lateral_minimo  m</td>
        <td class='text-center'>Reprovado</td>
        <td style='width:50%' class='text-left'>De acordo com a lei 079/2009, afastamento lateral é de no minímo <strong> $afast_lateral_minimo  m</strong> e de acordo com o projeto é de:  $afast_latEsq m.
        <i>(Favor considerar a cota lateral apartir da edificação até a projeção do cadastro da prefeitura (CP))</i></td>
    </tr>";
}else { 
 $html .="<tr>
    <td class='text-center'>Afastamento lateral esquerda</td>
        <td class='text-center'> $afast_latEsq  m</td>
        <td class='text-center'> $afast_lateral_minimo  m</td>
        <td class='text-center'>Aprovado</td>
        <td style='width:50%' class='text-left'><i>(Favor considerar a cota lateral apartir da edificação até a projeção do cadastro da prefeitura (CP))</i></td>
    
    </tr>";
} 
if($afast_frente < $afast_frontal_minimo) { 
$html .= "<tr >
        <td class='text-center'>Afastamento frontal</td>
        <td class='text-center'> $afast_frente  m</td>
        <td class='text-center'> $afast_frontal_minimo  m</td>
        <td class='text-center'>Reprovado</td>
        <td style='width:50%' class='text-left'>De acordo com a lei 079/2009, afastamento frontal é de no minímo <strong> $afast_frontal_minimo  m</strong> e de acordo com o projeto é de:  $afast_frente m
        <i>(Favor considerar a cota frontal apartir da edificação até a projeção do cadastro da prefeitura (CP))</i></td>
    </tr>";
}else { 
$html .= "<tr>
    <td class='text-center'>Afastamento frontal</td>
        <td class='text-center'> $afast_frente  m</td>
        <td class='text-center'> $afast_frontal_minimo  m</td>
        <td class='text-center'>Aprovado</td>
        <td style='width:50%' class='text-left'><i>(Favor considerar a cota frontal apartir da edificação até a projeção do cadastro da prefeitura (CP))</i></td>
    
    </tr>";
}
if($afast_fundos < $afast_fundo_minimo) { 
$html .="<tr >
        <td class='text-center'>Afastamento fundos</td>
        <td class='text-center'> $afast_fundos  m</td>
        <td class='text-center'> $afast_fundo_minimo  m</td>
        <td class='text-center'>Reprovado</td>
        <td style='width:50%' class='text-left'>De acordo com a lei 079/2009, afastamento de fundos é de no minímo <strong> $afast_fundo_minimo  m</strong> e de acordo com o projeto é de:  $afast_fundos m
        <i>(Favor considerar a cota dos fundos apartir da edificação até a projeção do cadastro da prefeitura (CP))</i></td>
    </tr>";
}else { 
$html .="<tr>
        <td colspan='' class='text-center'>Afastamento fundos</td>
        <td class='text-center'> $afast_fundos  m</td>
        <td class='text-center'> $afast_fundo_minimo  m</td>
        <td class='text-center'>Aprovado</td>
        <td style='width:50%' class='text-left'><i>(Favor considerar a cota dos fundos apartir da edificação até a projeção do cadastro da prefeitura (CP))</i></td>
    
    </tr>";
} 
if($area_edificacao > $area_permitida) { 
$html .="<tr >
        <td class='text-center'>Taxa de Ocupação</td>
        <td class='text-center'> $area_edificacao  m²</td>
        <td class='text-center'> $area_permitida  m²</td>
        <td class='text-center'>Reprovado</td>
        <td style='width:50%' class='text-left'>De acordo com a lei 079/2009, a taxa de ocupação é de no minímo <strong> $area_permitida  m²</strong> e de acordo com o projeto é de:  $area_edificacao m². 
        <i>(A taxa de ocupação é a projeção da edificação com relação ao lote. Caso a edificação possua dois pavimentos
        e a projeção do segundo pavimento seja maior em relação ao primeiro pavimento, favor considerar o perimetro do segundo pavimento.)</i></td>
    </tr>";
}else{ 
$html.="<tr>
        <td colspan='' class='text-center'>Taxa de Ocupação</td>
        <td class='text-center'> $area_edificacao  m²</td>
        <td class='text-center'> $area_permitida  m²</td>
        <td class='text-center'>Aprovado</td>
        <td style='width:50%' class='text-left'>
        <i>(A taxa de ocupação é a projeção da edificação com relação ao lote. Caso a edificação possua dois pavimentos
        e a projeção do segundo pavimento seja maior em relação ao primeiro pavimento, favor considerar o perimetro do segundo pavimento.)</i> </td>
    
    </tr>";
} 
if($area_edificacao > $ca_permitido) { 
$html .="<tr >
        <td class='text-center'>Coeficiente Aproveitamento</td>
        <td class='text-center'> $area_edificacao  m²</td>
        <td class='text-center'> $ca_permitido  m²</td>
        <td class='text-center'>Reprovado</td>
        <td style='width:50%' class='text-left'>De acordo com a lei 079/2009, afastamento de fundos é de no minímo <strong> $ca_permitido  cm</strong> e de acordo com o projeto é de:  $area_edificacao m².
        <i>(O coeficiente de aproveitamento é a área máxima que poderá ser construída, nesse caso á área máxima é  $ca_permitido m²)</i> </td>
    </tr>";
}else if($area_edificacao <= $ca_permitido) { 
$html .="<tr>
        <td colspan='' class='text-center'>Coeficiente Aproveitamento</td>
        <td class='text-center'> $area_edificacao  m²</td>
        <td class='text-center'> $ca_permitido  m²</td>
        <td class='text-center'>Aprovado</td>
        <td style='width:50%' class='text-left'>(O coeficiente de aproveitamento é a área máxima que poderá ser construída, nesse caso á área máxima é  $ca_permitido m²)</i> </td>
    
    </tr>";
} 
if($alt_maxima > $altura_maxima) { 
$html .="<tr >
        <td class='text-center'>Altura na dívisa</td>
        <td class='text-center'> $alt_maxima  m</td>
        <td class='text-center'> $altura_maxima  m</td>
        <td class='text-center'>Reprovado</td>
        <td style='width:50%' class='text-left'>De acordo com a lei 079/2009, a altura máxima na dívisa é de  $altura_maxima m.</td>
    </tr>";
}else if($alt_maxima <= $altura_maxima) { 
$html .="<tr>
        <td colspan='' class='text-center'>Altura na dívisa</td>
        <td class='text-center'> $alt_maxima  m</td>
        <td class='text-center'> $altura_maxima  m</td>
        <td class='text-center'>Aprovado</td>
        <td style='width:50%' class='text-left'>Aprovado</td>
    
    </tr>";
} 
if($taxa_projeto < $tx_permeavel) { 
$html .="<tr >
        <td class='text-center'>Área Permeável</td>
        <td class='text-center'> $taxa_projeto  m²</td>
        <td class='text-center'> $tx_permeavel  m²</td>
        <td class='text-center'>Reprovado</td>
        <td style='width:50%' class='text-left'>De acordo com a lei 079/2009, a área mínima de permeabilidade é  de:  $tx_permeavel m².</td>
    </tr>";
}else if($taxa_projeto >= $tx_permeavel) { 
$html .="<tr>
        <td colspan='' class='text-center'>Área Permeável</td>
        <td class='text-center'> $taxa_projeto  m²</td>
        <td class='text-center'> $tx_permeavel  m²</td>
        <td class='text-center'>Aprovado</td>
        <td style='width:50%' class='text-left'>Aprovado</td>
    
    </tr>";
} 
if($vagas_projeto < $_num_vagas) { 
$html .="<tr >
        <td class='text-center'>Vagas de Estacionamento</td>
        <td class='text-center'> $vagas_projeto  vagas</td>
        <td class='text-center'> $_num_vagas = 1  vagas</td>
        <td class='text-center'>Reprovado</td>
        <td style='width:50%' class='text-left'>De acordo com a lei 079/2009, o numero mínimo de vagas é de  $_num_vagas  vaga. <i>(Obs: Lembrando que
        a medida mínima de uma vaga e outra é de 5.00 m, que é destinado para manobra de veículos.</i></td>
    </tr>";
}else if($vagas_projeto >= $_num_vagas) {
$html .="<tr >
        <td class='text-center'>Vagas de Estacionamento</td>
        <td class='text-center'> $vagas_projeto  vagas</td>
        <td class='text-center'> $_num_vagas  vagas</td>
        <td class='text-center'>Aprovado</td>
        <td style='width:50%' class='text-left'><i>(Obs: Lembrando que
        a medida mínima de uma vaga e outra é de 5.00 m, que é destinado para manobra de veículos.</i></td>
    </tr>";
} 

$html .="
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