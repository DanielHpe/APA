<?php 
require('./conexao/conexao.php'); 
include('./tabela/index.php');
$cont = $_SESSION['value']++;
?>

<div class="row table-responsive" id="relatorio">
    <div class="header-relatorio">
        <h3 class="text-center" style="margin-top: 15px;">Relatório</h3>
		<button type="button" id="close" class="btn fechar" style=""><i class="fas fa-times"></i></button>
        <a href="./impressao.php" target="_blank" class="btn btn-default" id="printer" style="float: left; margin-top: -70px; margin-right: 50px; width: 100px; border: 0px;"><i class="fas fa-print" style="color:#000; width: 12px;"></i> Imprimir</a>
        <div style="clear: both; "></div>
    </div>

    <table class="table table-bordered table-condensed" style="margin-top: 8px;">
            <thead>
                <tr>
                    <th class="text-center" style="background-color: #d2d2d2; color: #444; ">DADOS DO LOTE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <table class="table table-condensed table-bordered">
                            <thead>
                                <tr >
                                    <th>Nome Projeto</th>
                                    <td colspan="4" style="text-transform: uppercase"><?php echo $nome_proj ?></td>
                                    <th >Indice Cadastral</th>
                                    <td class=""><?php echo $iptu ?></td>
                                    <th class="">Zoneamento</th>
                                    <td class="" style="text-transform: uppercase"><?php echo $zoneamento ?></td>
                                        

                               </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="" >Área da Edificação</th>
                                    <td class=""><?php echo $area_edificacao ?> m²</td>
                                        
                                    <th colspan="2">Tipo de uso</th>
                                    <td class="" style="text-transform: uppercase"><?php echo $uso ?></td>
                                        
                                    <th class="" >Área do lote (REAL)</th>                                
                                    <td class=""><?php echo $area_lote_real ?> m²</td>     
                                    
                                    <th class="" >Área do lote (CP)</th>
                                    <td class=""><?php echo $area_cp ?> m²</t>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
                    
        <table class="table table-bordered table-condensed">
            <thead>
                <tr>
                    <th colspan="9" class="text-center"  style="background-color: #d2d2d2; color: #444;">ESPECIFICIDADES DO PROJETO</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    
                    <td>
                        <table class="table table-condensed table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="5" style="background-color: #f0f0f0;" class="text-center">ITENS VERIFICADOS</th>  
                                                               
                                </tr>
                                <tr>
                                    <th class="text-center">Descrição</th>
                                    <th colspan="" class="text-center">Medida do projeto</th>  
                                    <th colspan="" class="text-center">
                                        Permitido conforme:<br>
                                       <i style="font-size: 10px; font-weight: initial">(lei nº 079/2009)</i>
                                    </th>                          
                                    <th colspan="" class="text-center">Status</th>                          
                                    <th colspan="" class="text-center">Observação</th>                          
                                    
                                </tr>
                                
                            </thead>
                            <tbody>
                                <!-- Comparação das cotas laterais -->
                                <?php 
                                if($afast_latDir < $afast_lateral_minimo) {
                                $conexao->query("INSERT INTO registros (parametro, statusRegistro) VALUES ('Afastamento Lateral Direito', 'Reprovado')");    
                                $conexao->query("INSERT INTO dadosReport (idRelatorio, nomeRelatorio, iptu, zoneamento, areaEdificacao, uso, areaLoteReal, areaLoteCp, descricao, medidaProjeto, medidaPermitida, situacao, observacao) VALUES ('$cont', '$nome_proj', '$iptu', '$zoneamento', '$area_edificacao', '$uso', '$area_lote_real', '$area_cp', 'Afastamento lateral direita', '$afast_latDir', '$afast_lateral_minimo', 'Reprovado', 'Reprovado. De acordo com a lei 079/2009, afastamento lateral é de no minímo $afast_lateral_minimo m e de acordo com o projeto é de: $afast_latDir m.(Favor considerar a cota lateral a partir da edificação até a projeção do cadastro da prefeitura (CP))')");                                   
                                 ?>
                                    <tr >
                                        <td class="text-center">Afastamento lateral direita</td>
                                        <td class="text-center"><?php echo $afast_latDir ?> m</td>
                                        <td class="text-center"><?php echo $afast_lateral_minimo ?> m</td>
                                        <td class="text-center"><i class="fas fa-times-circle fa-lg" style="color: #e00; margin-top: 5%;"></></td>
                                        <td style="width:50%" class="text-left">Reprovado. De acordo com a lei 079/2009, afastamento lateral é de no minímo <strong><?php echo $afast_lateral_minimo ?> m</strong> e de acordo com o projeto é de: <?php echo $afast_latDir?> m.
                                        <br><i>(Favor considerar a cota lateral apartir da edificação até a projeção do cadastro da prefeitura (CP))</i></td>
                                    </tr>
                                <?php }else { 
                                $conexao->query("INSERT INTO registros (parametro, statusRegistro) VALUES ('Afastamento Lateral Direito', 'Aprovado')");    
                                $conexao->query("INSERT INTO dadosReport (idRelatorio, nomeRelatorio, iptu, zoneamento, areaEdificacao, uso, areaLoteReal, areaLoteCp, descricao, medidaProjeto, medidaPermitida, situacao, observacao) VALUES ('$cont', '$nome_proj', '$iptu', '$zoneamento', '$area_edificacao', '$uso', '$area_lote_real', '$area_cp', 'Afastamento lateral direita', '$afast_latDir', '$afast_lateral_minimo', 'Aprovado', 'Aprovado. (Favor considerar a cota lateral apartir da edificação até a projeção do cadastro da prefeitura (CP))')");     
                                    ?>
                                    <tr>
                                        <td class="text-center">Afastamento lateral direita</td>
                                            <td class="text-center"><?php echo $afast_latDir ?> m</td>
                                            <td class="text-center"><?php echo $afast_lateral_minimo ?> m</td>
                                            <td class="text-center"><i class="fas fa-check fa-lg" style="color: green; margin-top: 5%;"></></td>
                                            <td style="width:50%" class="text-left">Aprovado.  <i>(Favor considerar a cota lateral apartir da edificação até a projeção do cadastro da prefeitura (CP))</i></td>
                                        
                                        </tr>
                                <?php } ?>
                                
                                <!-- Comparação das cotas laterais -->
                                <?php 
                                if($afast_latEsq < $afast_lateral_minimo) {
                                $conexao->query("INSERT INTO registros (parametro, statusRegistro) VALUES ('Afastamento Lateral Esquerdo', 'Reprovado')");  
                                $conexao->query("INSERT INTO dadosReport (idRelatorio, nomeRelatorio, iptu, zoneamento, areaEdificacao, uso, areaLoteReal, areaLoteCp, descricao, medidaProjeto, medidaPermitida, situacao, observacao) VALUES ('$cont', '$nome_proj', '$iptu', '$zoneamento', '$area_edificacao', '$uso', '$area_lote_real', '$area_cp', 'Afastamento lateral esquerda', '$afast_latEsq', '$afast_lateral_minimo', 'Reprovado', 'Reprovado. De acordo com a lei 079/2009, afastamento lateral é de no minímo $afast_lateral_minimo e de acordo com o projeto é de: $afast_latEsq m.(Favor considerar a cota lateral apartir da edificação até a projeção do cadastro da prefeitura (CP))')");     
                                 ?>
                                    <tr >
                                        <td class="text-center">Afastamento lateral esquerda</td>
                                        <td class="text-center"><?php echo $afast_latEsq ?> m</td>
                                        <td class="text-center"><?php echo $afast_lateral_minimo ?> m</td>
                                        <td class="text-center"><i class="fas fa-times-circle fa-lg" style="color: #e00; margin-top: 5%;"></></td>
                                        <td style="width:50%" class="text-left">Reprovado. De acordo com a lei 079/2009, afastamento lateral é de no minímo <strong><?php echo $afast_lateral_minimo ?> m</strong> e de acordo com o projeto é de: <?php echo $afast_latEsq?> m.
                                        <i>(Favor considerar a cota lateral apartir da edificação até a projeção do cadastro da prefeitura (CP))</i></td>
                                    </tr>
                                <?php }else { 
                                    $conexao->query("INSERT INTO registros (parametro, statusRegistro) VALUES ('Afastamento Lateral Esquerdo', 'Aprovado')");    
                                    $conexao->query("INSERT INTO dadosReport (idRelatorio, nomeRelatorio, iptu, zoneamento, areaEdificacao, uso, areaLoteReal, areaLoteCp, descricao, medidaProjeto, medidaPermitida, situacao, observacao) VALUES ('$cont', '$nome_proj', '$iptu', '$zoneamento', '$area_edificacao', '$uso', '$area_lote_real', '$area_cp', 'Afastamento lateral esquerda', '$afast_latEsq', '$afast_lateral_minimo', 'Aprovado', 'Aprovado.(Favor considerar a cota lateral apartir da edificação até a projeção do cadastro da prefeitura (CP))')");     
                                    ?>
                                    <tr>
                                    <td class="text-center">Afastamento lateral esquerda</td>
                                        <td class="text-center"><?php echo $afast_latEsq ?> m</td>
                                        <td class="text-center"><?php echo $afast_lateral_minimo ?> m</td>
                                        <td class="text-center"><i class="fas fa-check fa-lg" style="color: green; margin-top: 5%;"></></td>
                                        <td style="width:50%" class="text-left">Aprovado. <i>(Favor considerar a cota lateral apartir da edificação até a projeção do cadastro da prefeitura (CP))</i></td>
                                    
                                    </tr>
                                <?php } ?>
                                    <!-- Afastamento frontal -->
                                <?php 
                                if($afast_frente < $afast_frontal_minimo) {
                                 $conexao->query("INSERT INTO registros (parametro, statusRegistro) VALUES ('Afastamento Frontal', 'Reprovado')");
                                 $conexao->query("INSERT INTO dadosReport (idRelatorio, nomeRelatorio, iptu, zoneamento, areaEdificacao, uso, areaLoteReal, areaLoteCp, descricao, medidaProjeto, medidaPermitida, situacao, observacao) VALUES ('$cont', '$nome_proj', '$iptu', '$zoneamento', '$area_edificacao', '$uso', '$area_lote_real', '$area_cp', 'Afastamento frontal', '$afast_frente', '$afast_frontal_minimo', 'Reprovado', 'Reprovado. De acordo com a lei 079/2009, afastamento frontal é de no minímo $afast_frontal_minimo e de acordo com o projeto é de: $afast_frente m. (Favor considerar a cota frontal apartir da edificação até a projeção do cadastro da prefeitura (CP))')");  
                                    ?>          
                                 ?>
                                    <tr >
                                        <td class="text-center">Afastamento frontal</td>
                                        <td class="text-center"><?php echo $afast_frente ?> m</td>
                                        <td class="text-center"><?php echo $afast_frontal_minimo ?> m</td>
                                        <td class="text-center"><i class="fas fa-times-circle fa-lg" style="color: #e00; margin-top: 5%;"></></td>
                                        <td style="width:50%" class="text-left">Reprovado. De acordo com a lei 079/2009, afastamento frontal é de no minímo <strong><?php echo $afast_frontal_minimo ?> m</strong> e de acordo com o projeto é de: <?php echo $afast_frente?> m
                                        <i>(Favor considerar a cota frontal apartir da edificação até a projeção do cadastro da prefeitura (CP))</i></td>
                                    </tr>
                                <?php }else { 
                                    $conexao->query("INSERT INTO registros (parametro, statusRegistro) VALUES ('Afastamento Frontal', 'Aprovado')");  
                                    $conexao->query("INSERT INTO dadosReport (idRelatorio, nomeRelatorio, iptu, zoneamento, areaEdificacao, uso, areaLoteReal, areaLoteCp, descricao, medidaProjeto, medidaPermitida, situacao, observacao) VALUES ('$cont', '$nome_proj', '$iptu', '$zoneamento', '$area_edificacao', '$uso', '$area_lote_real', '$area_cp', 'Afastamento frontal', '$afast_frente', '$afast_frontal_minimo', 'Aprovado', 'Aprovado. (Favor considerar a cota frontal apartir da edificação até a projeção do cadastro da prefeitura (CP))')");  
                                    ?>
                                    <tr>
                                    <td class="text-center">Afastamento frontal</td>
                                        <td class="text-center"><?php echo $afast_frente ?> m</td>
                                        <td class="text-center"><?php echo $afast_frontal_minimo ?> m</td>
                                        <td class="text-center"><i class="fas fa-check fa-lg" style="color: green; margin-top: 5%;"></></td>
                                        <td style="width:50%" class="text-left">Aprovado. <i>(Favor considerar a cota frontal apartir da edificação até a projeção do cadastro da prefeitura (CP))</i></td>
                                    
                                    </tr>
                                <?php } ?>
                                <!-- Afastamento fundos -->
                                <?php 
                                if($afast_fundos < $afast_fundo_minimo) {
                                $conexao->query("INSERT INTO registros (parametro, statusRegistro) VALUES ('Afastamento Fundos', 'Reprovado')"); 
                                $conexao->query("INSERT INTO dadosReport (idRelatorio, nomeRelatorio, iptu, zoneamento, areaEdificacao, uso, areaLoteReal, areaLoteCp, descricao, medidaProjeto, medidaPermitida, situacao, observacao) VALUES ('$cont', '$nome_proj', '$iptu', '$zoneamento', '$area_edificacao', '$uso', '$area_lote_real', '$area_cp', 'Afastamento fundos', '$afast_fundos', '$afast_fundo_minimo', 'Reprovado', 'Reprovado. De acordo com a lei 079/2009, afastamento de fundos é de no minímo $afast_fundo_minimo e de acordo com o projeto é de: $afast_fundos m (Favor considerar a cota dos fundos apartir da edificação até a projeção do cadastro da prefeitura (CP))')");  
                                    ?> 
                                 
                                    <tr >
                                        <td class="text-center">Afastamento fundos</td>
                                        <td class="text-center"><?php echo $afast_fundos ?> m</td>
                                        <td class="text-center"><?php echo $afast_fundo_minimo ?> m</td>
                                        <td class="text-center"><i class="fas fa-times-circle fa-lg" style="color: #e00; margin-top: 5%;"></></td>
                                        <td style="width:50%" class="text-left">Reprovado. De acordo com a lei 079/2009, afastamento de fundos é de no minímo <strong><?php echo $afast_fundo_minimo ?> m</strong> e de acordo com o projeto é de: <?php echo $afast_fundos ?> m
                                        <i>(Favor considerar a cota dos fundos apartir da edificação até a projeção do cadastro da prefeitura (CP))</i></td>
                                    </tr>
                                <?php }else { 
                                    $conexao->query("INSERT INTO registros (parametro, statusRegistro) VALUES ('Afastamento Fundos', 'Aprovado')");
                                    $conexao->query("INSERT INTO dadosReport (idRelatorio, nomeRelatorio, iptu, zoneamento, areaEdificacao, uso, areaLoteReal, areaLoteCp, descricao, medidaProjeto, medidaPermitida, situacao, observacao) VALUES ('$cont', '$nome_proj', '$iptu', '$zoneamento', '$area_edificacao', '$uso', '$area_lote_real', '$area_cp', 'Afastamento fundos', '$afast_fundos', '$afast_fundo_minimo', 'Aprovado', '(Favor considerar a cota dos fundos apartir da edificação até a projeção do cadastro da prefeitura (CP))')"); 
                                    ?>
                                    <tr>
                                        <td colspan="" class="text-center">Afastamento fundos</td>
                                        <td class="text-center"><?php echo $afast_fundos ?> m</td>
                                        <td class="text-center"><?php echo $afast_fundo_minimo ?> m</td>
                                        <td class="text-center"><i class="fas fa-check fa-lg" style="color: green; margin-top: 5%;"></></td>
                                        <td style="width:50%" class="text-left">Aprovado. <i>(Favor considerar a cota dos fundos apartir da edificação até a projeção do cadastro da prefeitura (CP))</i></td>
                                    
                                    </tr>
                                <?php } ?>

                                <!-- tx ocupação  -->
                                <?php
                                
                                if($area_edificacao >= $area_permitida) { 
                                    $conexao->query("INSERT INTO registros (parametro, statusRegistro) VALUES ('Taxa de Ocupacao', 'Reprovado')");
                                     $conexao->query("INSERT INTO dadosReport (idRelatorio, nomeRelatorio, iptu, zoneamento, areaEdificacao, uso, areaLoteReal, areaLoteCp, descricao, medidaProjeto, medidaPermitida, situacao, observacao) VALUES ('$cont', '$nome_proj', '$iptu', '$zoneamento', '$area_edificacao', '$uso', '$area_lote_real', '$area_cp', 'Taxa de Ocupação', '$area_edificacao', '$area_permitida', 'Reprovado', 'De acordo com a lei 079/2009, a taxa de ocupação é de no máximo $area_permitida m² e de acordo com o projeto é de: $area_edificacao m². (A taxa de ocupação é a projeção da edificação com relação ao lote. Caso a edificação possua dois pavimentos e a projeção do segundo pavimento seja maior em relação ao primeiro pavimento, favor considerar o perimetro do segundo pavimento.)')");  
                                    ?>
                                    <tr >
                                        <td class="text-center">Taxa de Ocupação</td>
                                        <td class="text-center"><?php echo $area_edificacao ?> m²</td>
                                        <td class="text-center"><?php echo $area_permitida ?> m²</td>
                                        <td class="text-center"><i class="fas fa-times-circle fa-lg" style="color: #e00; margin-top: 5%;"></></td>
                                        <td style="width:50%" class="text-left">De acordo com a lei 079/2009, a taxa de ocupação é de no máximo <strong><u><?php echo $area_permitida ?> m²</u></strong> e de acordo com o projeto é de: <?php echo $area_edificacao?> m². 
                                        <i>(A taxa de ocupação é a projeção da edificação com relação ao lote. Caso a edificação possua dois pavimentos
                                        e a projeção do segundo pavimento seja maior em relação ao primeiro pavimento, favor considerar o perimetro do segundo pavimento.)</i></td>
                                    </tr>
                                <?php }else{
                                    $conexao->query("INSERT INTO registros (parametro, statusRegistro) VALUES ('Taxa de Ocupacao', 'Aprovado')");
                                    $conexao->query("INSERT INTO dadosReport (idRelatorio, nomeRelatorio, iptu, zoneamento, areaEdificacao, uso, areaLoteReal, areaLoteCp, descricao, medidaProjeto, medidaPermitida, situacao, observacao) VALUES ('$cont', '$nome_proj', '$iptu', '$zoneamento', '$area_edificacao', '$uso', '$area_lote_real', '$area_cp', 'Taxa de Ocupação', '$area_edificacao', '$area_permitida', 'Aprovado', 'Aprovado. (A taxa de ocupação é a projeção da edificação com relação ao lote. Caso a edificação possua dois pavimentos e a projeção do segundo pavimento seja maior em relação ao primeiro pavimento, favor considerar o perimetro do segundo pavimento.)')");     
                                 ?>
                                    <tr>
                                        <td colspan="" class="text-center">Taxa de Ocupação</td>
                                        <td class="text-center"><?php echo $area_edificacao ?> m²</td>
                                        <td class="text-center"><?php echo $area_permitida ?> m²</td>
                                        <td class="text-center"><i class="fas fa-check fa-lg" style="color: green; margin-top: 5%;"></></td>
                                        <td style="width:50%" class="text-left">Aprovado. 
                                        <i>(A taxa de ocupação é a projeção da edificação com relação ao lote. Caso a edificação possua dois pavimentos
                                        e a projeção do segundo pavimento seja maior em relação ao primeiro pavimento, favor considerar o perimetro do segundo pavimento.)</i> </td>
                                    
                                    </tr>
                                <?php } ?>

                                <!-- ca de Aproveitamento  -->
                                <?php
                                if($area_edificacao >= $ca_permitido) {
                                $conexao->query("INSERT INTO registros (parametro, statusRegistro) VALUES ('Coeficiente Aproveitamento', 'Reprovado')"); 
                                 $conexao->query("INSERT INTO dadosReport (idRelatorio, nomeRelatorio, iptu, zoneamento, areaEdificacao, uso, areaLoteReal, areaLoteCp, descricao, medidaProjeto, medidaPermitida, situacao, observacao) VALUES ('$cont', '$nome_proj', '$iptu', '$zoneamento', '$area_edificacao', '$uso', '$area_lote_real', '$area_cp', 'Coeficiente Aproveitamento', '$area_edificacao', '$ca_permitido', 'Reprovado', 'De acordo com a lei 079/2009, afastamento de fundos é de no minímo $ca_permitido cm e de acordo com o projeto é de: $area_edificacao m².(O coeficiente de aproveitamento é a área máxima que poderá ser construída, nesse caso á área máxima é $ca_permitido m²)')");         
                                 ?>
                                    <tr >
                                        <td class="text-center">Coeficiente Aproveitamento</td>
                                        <td class="text-center"><?php echo $area_edificacao ?> m²</td>
                                        <td class="text-center"><?php echo $ca_permitido ?> m²</td>
                                        <td class="text-center"><i class="fas fa-times-circle fa-lg" style="color: #e00; margin-top: 5%;"></></td>
                                        <td style="width:50%" class="text-left">De acordo com a lei 079/2009, afastamento de fundos é de no minímo <strong><?php echo $ca_permitido ?> cm</strong> e de acordo com o projeto é de: <?php echo $area_edificacao?> m².
                                        <i>(O coeficiente de aproveitamento é a área máxima que poderá ser construída, nesse caso á área máxima é <?php echo $ca_permitido?> m²)</i> </td>
                                    </tr>
                                <?php }else if($area_edificacao <= $ca_permitido) {
                                    $conexao->query("INSERT INTO registros (parametro, statusRegistro) VALUES ('Coeficiente Aproveitamento', 'Aprovado')"); 
                                    $conexao->query("INSERT INTO dadosReport (idRelatorio, nomeRelatorio, iptu, zoneamento, areaEdificacao, uso, areaLoteReal, areaLoteCp, descricao, medidaProjeto, medidaPermitida, situacao, observacao) VALUES ('$cont', '$nome_proj', '$iptu', '$zoneamento', '$area_edificacao', '$uso', '$area_lote_real', '$area_cp', 'Coeficiente Aproveitamento', '$area_edificacao', '$ca_permitido', 'Aprovado', 'Aprovado (O coeficiente de aproveitamento é a área máxima que poderá ser construída, nesse caso á área máxima é $ca_permitido m²)')");      
                                 ?>
                                    <tr>
                                        <td colspan="" class="text-center">Coeficiente Aproveitamento</td>
                                        <td class="text-center"><?php echo $area_edificacao ?> m²</td>
                                        <td class="text-center"><?php echo $ca_permitido ?> m²</td>
                                        <td class="text-center"><i class="fas fa-check fa-lg" style="color: green; margin-top: 5%;"></></td>
                                        <td style="width:50%" class="text-left">Aprovado <i>(O coeficiente de aproveitamento é a área máxima que poderá ser construída, nesse caso á área máxima é <?php echo $ca_permitido?> m²)</i> </td>
                                    
                                    </tr>
                                <?php } ?>

                                <!-- Altura máxima na dívisa  -->
                                <!--?php
                                if($alt_maxima >= $altura_maxima) { 
                                    $conexao->query("INSERT INTO registros (parametro, statusRegistro) VALUES ('Altura na Divisa', 'Reprovado')"); 
                                    ?>
                                    <tr >
                                        <td class="text-center">Altura Máxima</td>
                                        <td class="text-center"><-?php echo $alt_maxima ?> m</td>
                                        <td class="text-center"><-?php echo $altura_maxima ?> m</td>
                                        <td class="text-center"><i class="fas fa-times-circle fa-lg" style="color: #e00; margin-top: 5%;"></></td>
                                        <td style="width:50%" class="text-left">De acordo com a lei 079/2009, a altura máxima na dívisa é de <?php echo $altura_maxima ?>m.</td>
                                    </tr>
                                <!?php }else if($alt_maxima <= $altura_maxima) {
                                    $conexao->query("INSERT INTO registros (parametro, statusRegistro) VALUES ('Altura na Divisa', 'Aprovado')"); 
                                 ?>
                                    <tr>
                                        <td colspan="" class="text-center">Altura Máxima</td>
                                        <td class="text-center"><-?php echo $alt_maxima ?> m</td>
                                        <td class="text-center"><-?php echo $altura_maxima ?> m</td>
                                        <td class="text-center"><i class="fas fa-check fa-lg" style="color: green; margin-top: 5%;"></></td>
                                        <td style="width:50%" class="text-left">Aprovado</td>
                                    
                                    </tr>
                                <!?php } ?>
                                <! Altura na Divísa -->
                                <?php
                                if($alt_divisa > $altura_divisa) { 
                                    $conexao->query("INSERT INTO registros (parametro, statusRegistro) VALUES ('Altura na Divisa', 'Reprovado')"); 
                                    $conexao->query("INSERT INTO dadosReport (idRelatorio, nomeRelatorio, iptu, zoneamento, areaEdificacao, uso, areaLoteReal, areaLoteCp, descricao, medidaProjeto, medidaPermitida, situacao, observacao) VALUES ('$cont', '$nome_proj', '$iptu', '$zoneamento', '$area_edificacao', '$uso', '$area_lote_real', '$area_cp', 'Altura na divisa', '$alt_divisa', '$altura_divisa', 'Reprovado', 'De acordo com a lei 079/2009, a altura máxima na dívisa é de echo $altura_divisa m.')");      
                                    ?>
                                    <tr >
                                        <td class="text-center">Altura na divisa</td>
                                        <td class="text-center"><?php echo $alt_divisa ?> m</td>
                                        <td class="text-center"><?php echo $altura_divisa ?> m</td>
                                        <td class="text-center"><i class="fas fa-times-circle fa-lg" style="color: #e00; margin-top: 5%;"></></td>
                                        <td style="width:50%" class="text-left">De acordo com a lei 079/2009, a altura máxima na dívisa é de <?php echo $altura_divisa ?>m.</td>
                                    </tr>
                                <?php }else if($alt_divisa <= $altura_divisa) {
                                    $conexao->query("INSERT INTO registros (parametro, statusRegistro) VALUES ('Altura na Divisa', 'Aprovado')"); 
                                    $conexao->query("INSERT INTO dadosReport (idRelatorio, nomeRelatorio, iptu, zoneamento, areaEdificacao, uso, areaLoteReal, areaLoteCp, descricao, medidaProjeto, medidaPermitida, situacao, observacao) VALUES ('$cont', '$nome_proj', '$iptu', '$zoneamento', '$area_edificacao', '$uso', '$area_lote_real', '$area_cp', 'Altura na divisa', '$alt_divisa', '$altura_divisa', 'Aprovado', 'Aprovado (De acordo com a lei 079/2009, a altura máxima permitido é de $altura_divisa , caso ultrapasse esse valor, será passível de multa.)')");
                                 ?>
                                    <tr>
                                        <td colspan="" class="text-center">Altura na divisa</td>
                                        <td class="text-center"><?php echo $alt_divisa ?> m</td>
                                        <td class="text-center"><?php echo $altura_divisa ?> m</td>
                                        <td class="text-center"><i class="fas fa-check fa-lg" style="color: green; margin-top: 5%;"></></td>
                                        <td style="width:50%" class="text-left">Aprovado <i>(De acordo com a lei 079/2009, a altura máxima permitido é de <?php echo $altura_divisa ?>, caso ultrapasse esse valor, será passível de multa.)</i></td>
                                    
                                    </tr>
                                <?php } ?>
                                <!-- Área Permeável  -->
                                <?php
                                // if($taxa_projeto <= $tx_permeavel) { <!-- ? -->
                                if($taxa_projeto <= $tx_permeavel) { 
                                    $conexao->query("INSERT INTO registros (parametro, statusRegistro) VALUES ('Area Permeavel', 'Reprovado')"); 
                                    $conexao->query("INSERT INTO dadosReport (idRelatorio, nomeRelatorio, iptu, zoneamento, areaEdificacao, uso, areaLoteReal, areaLoteCp, descricao, medidaProjeto, medidaPermitida, situacao, observacao) VALUES ('$cont', '$nome_proj', '$iptu', '$zoneamento', '$area_edificacao', '$uso', '$area_lote_real', '$area_cp', 'Área Permeável', '$taxa_projeto', '$tx_permeavel', 'Reprovado', 'Reprovado. De acordo com a lei 079/2009, a área mínima de permeabilidade é  de: $tx_permeavel m².')");
                                    ?>
                                    <tr >
                                        <td class="text-center">Área Permeável</td>
                                        <td class="text-center"><?php echo $taxa_projeto ?> m²</td>
                                        <td class="text-center"><?php echo $tx_permeavel ?> m²</td>
                                        <td class="text-center"><i class="fas fa-times-circle fa-lg" style="color: #e00; margin-top: 5%;"></></td>
                                        <td style="width:50%" class="text-left">Reprovado. De acordo com a lei 079/2009, a área mínima de permeabilidade é  de: <?php echo $tx_permeavel ?>m².</td>
                                    </tr>

                                <?php }else if($taxa_projeto >= $tx_permeavel) {
                                    $conexao->query("INSERT INTO registros (parametro, statusRegistro) VALUES ('Area Permeavel', 'Aprovado')"); 
                                    $conexao->query("INSERT INTO dadosReport (idRelatorio, nomeRelatorio, iptu, zoneamento, areaEdificacao, uso, areaLoteReal, areaLoteCp, descricao, medidaProjeto, medidaPermitida, situacao, observacao) VALUES ('$cont', '$nome_proj', '$iptu', '$zoneamento', '$area_edificacao', '$uso', '$area_lote_real', '$area_cp', 'Área Permeável', '$taxa_projeto', '$tx_permeavel', 'Aprovado', 'Aprovado')");
                                    ?>
                                    <tr>
                                        <td colspan="" class="text-center">Área Permeável</td>
                                        <td class="text-center"><?php echo $taxa_projeto ?> m²</td>
                                        <td class="text-center"><?php echo $tx_permeavel ?> m²</td>
                                        <td class="text-center"><i class="fas fa-check fa-lg" style="color: green; margin-top: 5%;"></></td>
                                        <td style="width:50%" class="text-left">Aprovado</td>
                                    
                                    </tr>
                                <?php } ?>
                                 <!-- Vagas de Garagem  -->
                                 <?php
                                if($vagas_projeto < $_num_vagas) {
                                 $conexao->query("INSERT INTO registros (parametro, statusRegistro) VALUES ('Vagas de Estacionamento', 'Reprovado')");  
                                 $conexao->query("INSERT INTO dadosReport (idRelatorio, nomeRelatorio, iptu, zoneamento, areaEdificacao, uso, areaLoteReal, areaLoteCp, descricao, medidaProjeto, medidaPermitida, situacao, observacao) VALUES ('$cont', '$nome_proj', '$iptu', '$zoneamento', '$area_edificacao', '$uso', '$area_lote_real', '$area_cp', 'Vagas de Estacionamento', '$vagas_projeto', '$_num_vagas = 1', 'Reprovado', 'Reprovado. De acordo com a lei 079/2009, o numero mínimo de vagas é de $_num_vagas vaga. (Obs: Lembrando que a medida mínima de uma vaga e outra é de 5.00 m, que é destinado para manobra de veículos.')"); 
                                 ?>
                                    <tr >
                                        <td class="text-center">Vagas de Estacionamento</td>
                                        <td class="text-center"><?php echo $vagas_projeto ?> vagas</td>
                                        <td class="text-center"><?php echo $_num_vagas = 1 ?> vagas</td>
                                        <td class="text-center"><i class="fas fa-times-circle fa-lg" style="color: #e00; margin-top: 5%;"></></td>
                                        <td style="width:50%" class="text-left">Reprovado. De acordo com a lei 079/2009, o numero mínimo de vagas é de <?php echo $_num_vagas ?> vaga. <i>(Obs: Lembrando que
                                        a medida mínima de uma vaga e outra é de 5.00 m, que é destinado para manobra de veículos.</i></td>
                                    </tr>
                                <?php }else if($vagas_projeto >= $_num_vagas) {
                                    $conexao->query("INSERT INTO registros (parametro, statusRegistro) VALUES ('Vagas de Estacionamento', 'Aprovado')");
                                     $conexao->query("INSERT INTO dadosReport (idRelatorio, nomeRelatorio, iptu, zoneamento, areaEdificacao, uso, areaLoteReal, areaLoteCp, descricao, medidaProjeto, medidaPermitida, situacao, observacao) VALUES ('$cont', '$nome_proj', '$iptu', '$zoneamento', '$area_edificacao', '$uso', '$area_lote_real', '$area_cp', 'Vagas de Estacionamento', '$vagas_projeto', '$_num_vagas = 1', 'Aprovado', 'Aprovado. (Obs: Lembrando que a medida mínima de uma vaga e outra é de 5.00 m, que é destinado para manobra de veículos)')");  
                                    ?>
                                    <tr >
                                        <td class="text-center">Vagas de Estacionamento</td>
                                        <td class="text-center"><?php echo $vagas_projeto ?> vagas</td>
                                        <td class="text-center"><?php echo $_num_vagas = 1 ?> vagas</td>
                                        <td class="text-center"><i class="fas fa-check fa-lg" style="color: green; margin-top: 5%;"></></td>
                                        <td style="width:50%" class="text-left">Aprovado. <i>(Obs: Lembrando que
                                        a medida mínima de uma vaga e outra é de 5.00 m, que é destinado para manobra de veículos.</i></td>
                                    </tr>
                                
                                
                                <?php }

                                    $conexao->query("DELETE FROM dadosReport WHERE areaEdificacao = 0")

                                 ?>
                                                           
                                
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        
        </table>
        
    </div>