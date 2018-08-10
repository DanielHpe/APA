<?php
    include('../conexao/conexao.php');

    $resultado = $conexao->query("SELECT * FROM projeto WHERE layer = 'Loteamento'");
    
    while($row = $resultado->fetch_array()){
            $layer_lote = $row['layer']."<br>";
            $length_lote = $row['length']."<br>";
            $area_lote = $row['area']."<br>";



            $areaCorreta = (int) $area_lote;
            $areaLote = $areaCorreta/10000;

            $areaCorrigida = number_format($areaLote, 2);
    }

    $resultado = $conexao->query("SELECT * FROM projeto WHERE layer = 'Edificacao'");
    
    while($row = $resultado->fetch_array()){
            $layer_edif = $row['layer']."<br>";
            $length_edif = $row['length']."<br>";
            $area_edif = $row['area']."<br>";

            $areaCorreta = (int) $area_edif;
            $areaEdif = $areaCorreta/10000;

            $area_edif_correta = number_format($areaEdif, 2);
            
            
            
    }

    // taxa de ocupação
    $tx_ocupacao = $areaCorrigida * 0.5;

    //condição para verificar se a area do lote está conforme a tx de ocupação
    if($area_edif_correta <= $tx_ocupacao){
        echo "Sua area é: ".$area_edif_correta.
        "Aprovado! Área permitida é: ".$tx_ocupacao." m²";
    }else{
        echo "Reprovado";
    }

?>
