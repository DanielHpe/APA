
<?php
    include('../conexao/conexao.php');
    

       $arquivo = $_POST['codigo'];
       $row = 1;

        $conexao->query("TRUNCATE TABLE projeto");

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
                $cadastrando_csv = $conexao->query("INSERT INTO projeto (id, num_count ,layer, positionX, positionY, positionZ, area, length) VALUES
                ('','$data[0]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]')");
              }
            }
          }
        }  
        fclose($handle);

        // $names = array('Name', 'Layer', 'Position X', 'Position Y', 'Position Z', 'Area', 'Length');
        // $picked = array();
        // $theData = array();
        // // new array to store the "mapping"
        // $map = array();

        // $handle = fopen("C:/fakepath/ANDERSON  L06 Q441.csv", "r");
        // if ( FALSE !== $handle ) {
        //     // get the first row
        //     $row = fgetcsv( $handle, 1000, ',');

        //     // loop over desired fields, assign the column index to map array
        //     foreach( $names AS $name ) {
        //         $index = array_search( strtolower( $name ), array_map( 'strtolower', $row ) );
        //         if ( FALSE !== $index ) {
        //             $map[$index] = $name;
        //         }
        //     }

        //     // if not all fields present, error and exit
        //     if ( count( $map ) < count( $names ) ) {
        //         echo 'All fields must be present: ' . implode( ', ', $names );
        //         die();
        //     }

        //     while ( $data = fgetcsv($handle, 1000, "," ) ) {
        //         $row = array();

        //         // loop over known fields / index and assign to record
        //         foreach( $map AS $index => $field ) {
        //             // $index is the column number / index
        //             // $field is the name of the field
        //             $row[ $field ] = $data[ $index ];
        //         }    

        //         $theData[] = $row;
        //     }

        //     fclose($handle);
        // }

?>