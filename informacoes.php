<?php

  include('./conexao/conexao.php');

  $nome_proj = strval($_POST['nome']);
  $iptu = strval($_POST['iptu']);
  $zoneamento = strval($_POST['zoneamento']);
  $afast_latEsq = strval($_POST['afastamento_lateral_esq']);
  $afast_latDir = strval($_POST['afastamento_lateral_dir']);
  $afast_fundos = strval($_POST['afastamento_fundos']);
  $afast_frente = strval($_POST['afastamento_frontal']);
  $alt_maxima = strval($_POST['altura-maxima']);

// Arquivo CSV
  $arquivo = $_POST['codigo'];
  
      $row = 1;

      if (($handle = fopen($arquivo, "r")) !== FALSE)
      {
        //Passagem pelas linhas
        while (($data = fgetcsv($handle, ",")) !== FALSE)
        {
            $num = count($data);
            $row++;
            // Passagem pelas colunas
            for ($col = 0; $col < $num; $col++)
            {
                //Printando apenas a coluna 13
                if($col == 1)
                {
                  $cadastrando_csv = $conexao->query("INSERT INTO projeto (id, layer, positionX, positionY, positionZ, length, area) VALUES
                  ('','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]')");
                }

            }
        }

      }

    fclose($handle);
    
    $cadastrar = $conexao->query("INSERT INTO dadosRelatorios ( nomeRelatorio, iptu, zoneamento, 
    afastamento_lateral_esq, afastamento_lateral_dir, afastamento_fundos, afastamento_frontal, altura_maxima)
    VALUES('$nome_proj','$iptu', '$zoneamento','$afast_latEsq', '$afast_latDir','$afast_fundos', '$afast_frente','$alt_maxima'");
 
    
    if($cadastrando_csv == true && $cadastrar == true){
      echo "Gerando Relatorio";
    }


  
  
    ?>
