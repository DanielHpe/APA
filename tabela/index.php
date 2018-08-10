
<?php
require __DIR__.'\../conexao/conexao.php';

// $id = $_GET['id'];
// echo $id;

$resultado = $conexao->query("SELECT * FROM dadosrelatorios ");
$row = mysqli_num_rows($resultado);

if($row == '' || $row == null){
    echo "funcionou";
}else{
    if ($row > 0){
        while($row = mysqli_fetch_array($resultado))
        {
            $nome_proj = $row['nomeRelatorio'];
            $iptu = $row['iptu'];
            $zoneamento = $row['zoneamento'];
            $uso = $row['uso'];
            $afast_latEsq = $row['afastamento_lateral_esq'];
            $afast_latDir = $row['afastamento_lateral_dir'];
            $afast_fundos = $row['afastamento_fundos'];
            $afast_frente = $row['afastamento_frontal'];
            $num_pisos = $row['altura_maxima'];
            $alt_divisa = $row['altura_divisa'];

        } 
    }
    // SELECT SOMENTE NA LAYER LOTEAMENTO REAL
    $resultado = $conexao->query("SELECT * FROM projeto WHERE layer = 'Loteamento_val'");
    $row = mysqli_num_rows($resultado);

    if ($row > 0){
        while($row = mysqli_fetch_array($resultado))
        {
            $lote_real = $row['layer'];
            $arealoteReal = $row['area'];

            $area_lote_real = $arealoteReal/10000;
            $area_lote_real = number_format($area_lote_real, 2);


        } 
    }
    // SELECT SOMENTE NA LAYER EDIFICAÇÃO
    $resultado = $conexao->query("SELECT * FROM projeto WHERE layer = 'Edificacao_val'");
    $row = mysqli_num_rows($resultado);

    if ($row > 0){
        while($row = mysqli_fetch_array($resultado))
        {
            $edificacao = $row['layer'];
            $area_edif = $row['area'];

            $area_edificacao = $area_edif/10000;
            $area_edificacao = number_format($area_edificacao, 2);


        } 
    }
    // SELECT SOMENTE NA LAYER CADASTRO CP
    $resultado = $conexao->query("SELECT * FROM projeto WHERE layer = 'CadastroCP_val'");
    $row = mysqli_num_rows($resultado);
        
    if ($row > 0){
        while($row = mysqli_fetch_array($resultado))
        {
            
            $cadastro_cp = $row['layer'];
            $areaLoteCP = $row['area'];

            $area_cp = $areaLoteCP/10000;
            $area_cp = number_format($area_cp, 2);

        }
    }

    // SELECT SOMENTE NA LAYER AREA PERMEAVEL
    $resultado = $conexao->query("SELECT SUM(area) AS soma FROM projeto WHERE layer = 'Area permeavel_val'");
    $row = mysqli_fetch_assoc($resultado);
    $soma = $row['soma'];


    $taxa_projeto = $soma/10000;
    $taxa_projeto = number_format($taxa_projeto, 2);

    // echo "<script>console.log('".$soma."')</script>";
   
    // SELECT SOMENTE NA LAYER DAS VAGAS DE ESTACIONAMENTO
    $resultado = $conexao->query("SELECT * FROM projeto WHERE layer = 'Vagas_val'");
    $row = mysqli_num_rows($resultado);

    if ($row > 0){
        while($row = mysqli_fetch_array($resultado))
        {
            
            $nome_vagas = $row['layer'];
            $vagas_projeto = $row['num_count'];

        } 
    }

    // Paramentros Urbanísticos
    switch($zoneamento){
        case 'zur1':

            $tx_permeabilidade = 0.3;

            if($uso == 'unifamiliar'){
                $ca_maximo = 1.0;
                $tx_ocupacao = 0.6;
                // Mudando formato de exibição dos valores
                $afast_frontal_minimo = 3.00;
                $afast_frontal_minimo = number_format($afast_frontal_minimo, 2);

                $afast_lateral_minimo = 1.50;
                $afast_lateral_minimo = number_format($afast_lateral_minimo, 2);

                $afast_fundo_minimo = 1.50;
                $afast_fundo_minimo = number_format($afast_fundo_minimo, 2);

                $altura_divisa = 6.00;
                $altura_divisa = number_format($altura_divisa, 2);

                // Comparações

                // Tx de ocupação
                $area_permitida = ($area_lote_real * $tx_ocupacao);
                $area_permitida = number_format($area_permitida, 2);

                // // Coeficiente de aproveitamento
                $ca_permitido = ($area_lote_real * $ca_maximo);
                $ca_permitido = number_format($ca_permitido, 2);

                // Taxa de Permeabilidade
                $tx_permeavel = ($area_lote_real * $tx_permeabilidade);
                $tx_permeavel = number_format($tx_permeavel, 2);

                // Vagas de Estacionamento
                $_num_vagas = 1;

            }else if($uso == 'multifamiliar'){
                $tx_ocupacao = 0.5;
                $ca_maximo = 1.5;

                // Mudando formato de exibição dos valores
                $afast_frontal_minimo = 3.00;
                $afast_frontal_minimo = number_format($afast_frontal_minimo, 2);

                $afast_lateral_minimo = 1.50;
                $afast_lateral_minimo = number_format($afast_lateral_minimo, 2);

                $afast_fundo_minimo = 1.50;
                $afast_fundo_minimo = number_format($afast_fundo_minimo, 2);

                // $altura_maxima  = 5.00;
                // $altura_maxima = number_format($altura_maxima, 2);

                $altura_divisa = 6.00;
                $altura_divisa = number_format($altura_divisa, 2);

                // Comparações

                // Tx de ocupação
                $area_permitida = ($area_lote_real * $tx_ocupacao);
                $area_permitida = number_format($area_permitida, 2);

                // // Coeficiente de aproveitamento
                $ca_permitido = ($area_lote_real * $ca_maximo);
                $ca_permitido = number_format($ca_permitido, 2);

                // Taxa de Permeabilidade
                $tx_permeavel = ($area_lote_real * $tx_permeabilidade);
                $tx_permeavel = number_format($tx_permeavel, 2);

                // Vagas de Estacionamento
                $_num_vagas = 1;
                // break;
            }
        break;
        case 'zur2':

            $tx_permeabilidade = 0.3;

            if($uso == 'unifamiliar'){
                $ca_maximo = 1.0;
                $tx_ocupacao = 0.6;
                // Mudando formato de exibição dos valores
                $afast_frontal_minimo = 3.00;
                $afast_frontal_minimo = number_format($afast_frontal_minimo, 2);

                $afast_lateral_minimo = 1.50;
                $afast_lateral_minimo = number_format($afast_lateral_minimo, 2);

                $afast_fundo_minimo = 1.50;
                $afast_fundo_minimo = number_format($afast_fundo_minimo, 2);

                // $altura_maxima  = 5.00;
                // $altura_maxima = number_format($altura_maxima, 2);

                $altura_divisa = 6.00;
                $altura_divisa = number_format($altura_divisa, 2);

                // Comparações

                // Tx de ocupação
                $area_permitida = ($area_lote_real * $tx_ocupacao);
                $area_permitida = number_format($area_permitida, 2);

                // // Coeficiente de aproveitamento
                $ca_permitido = ($area_lote_real * $ca_maximo);
                $ca_permitido = number_format($ca_permitido, 2);

                // Taxa de Permeabilidade
                $tx_permeavel = ($area_lote_real * $tx_permeabilidade);
                $tx_permeavel = number_format($tx_permeavel, 2);

                // Vagas de Estacionamento
                $_num_vagas = 1;

            }else if($uso == 'multifamiliar'){
                $tx_ocupacao = 0.5;
                $ca_maximo = 1.2;

                // Mudando formato de exibição dos valores
                $afast_frontal_minimo = 3.00;
                $afast_frontal_minimo = number_format($afast_frontal_minimo, 2);

                $afast_lateral_minimo = 1.50;
                $afast_lateral_minimo = number_format($afast_lateral_minimo, 2);

                $afast_fundo_minimo = 1.50;
                $afast_fundo_minimo = number_format($afast_fundo_minimo, 2);

                // Analisar depois
                // $altura_maxima  = 5.00;
                // $altura_maxima = number_format($altura_maxima, 2);

                $altura_divisa = 6.00;
                $altura_divisa = number_format($altura_divisa, 2);

                // Comparações

                // Tx de ocupação
                $area_permitida = ($area_lote_real * $tx_ocupacao);
                $area_permitida = number_format($area_permitida, 2);

                // // Coeficiente de aproveitamento
                $ca_permitido = ($area_lote_real * $ca_maximo);
                $ca_permitido = number_format($ca_permitido, 2);

                // Taxa de Permeabilidade
                $tx_permeavel = ($area_lote_real * $tx_permeabilidade);
                $tx_permeavel = number_format($tx_permeavel, 2);

                // Vagas de Estacionamento
                $_num_vagas = 1;
                // break;
            }
        break;
        case 'zur3':
            $_num_vagas = 1;
            if($uso == 'unifamiliar'){
                $tx_permeabilidade = 0.3;

                $ca_maximo = 1.0;
                $tx_ocupacao = 0.5;
                // Mudando formato de exibição dos valores
                $afast_frontal_minimo = 5.00;
                $afast_frontal_minimo = number_format($afast_frontal_minimo, 2);

                $afast_lateral_minimo = 2.00;
                $afast_lateral_minimo = number_format($afast_lateral_minimo, 2);

                $afast_fundo_minimo = 3.00;
                $afast_fundo_minimo = number_format($afast_fundo_minimo, 2);

                // $altura_maxima  = 5.00;
                // $altura_maxima = number_format($altura_maxima, 2);

                $altura_divisa = 6.00;
                $altura_divisa = number_format($altura_divisa, 2);

                // Comparações

                // Tx de ocupação
                $area_permitida = ($area_lote_real * $tx_ocupacao);
                $area_permitida = number_format($area_permitida, 2);

                // // Coeficiente de aproveitamento
                $ca_permitido = ($area_lote_real * $ca_maximo);
                $ca_permitido = number_format($ca_permitido, 2);

                // Taxa de Permeabilidade
                $tx_permeavel = ($area_lote_real * $tx_permeabilidade);
                $tx_permeavel = number_format($tx_permeavel, 2);

                // Vagas de Estacionamento

                

            }else if($uso == 'multifamiliar'){
                $tx_permeabilidade = 0.4;

                $tx_ocupacao = 0.4;
                $ca_maximo = 0.8;

                // Mudando formato de exibição dos valores
                $afast_frontal_minimo = 5.00;
                $afast_frontal_minimo = number_format($afast_frontal_minimo, 2);

                $afast_lateral_minimo = 2.00;
                $afast_lateral_minimo = number_format($afast_lateral_minimo, 2);

                $afast_fundo_minimo = 3.00;
                $afast_fundo_minimo = number_format($afast_fundo_minimo, 2);

                // Analisar depois
                // $altura_maxima  = 5.00;
                // $altura_maxima = number_format($altura_maxima, 2);

                $altura_divisa = 6.00;
                $altura_divisa = number_format($altura_divisa, 2);

                // Comparações

                // Tx de ocupação
                $area_permitida = ($area_lote_real * $tx_ocupacao);
                $area_permitida = number_format($area_permitida, 2);

                // // Coeficiente de aproveitamento
                $ca_permitido = ($area_lote_real * $ca_maximo);
                $ca_permitido = number_format($ca_permitido, 2);

                // Taxa de Permeabilidade
                $tx_permeavel = ($area_lote_real * $tx_permeabilidade);
                $tx_permeavel = number_format($tx_permeavel, 2);

            }
        break;

    }  
}