<?php 
require('./conexao/conexao.php');

$result = $conexao->query("SELECT * FROM dadosrelatorios WHERE nomeResp = '".$_SESSION['nome_usuario']."'");
$linha = mysqli_num_rows($result);

?>
<div class="col-xs-12" > 
            <table class="table table-bordered table-condensed" style="background-color: #fff;">
            <thead> 
                <tr style="background-color: #fff">    
                    <th>Nome Relatório</th>
                    <th>IPTU</th>
                    <th>Zoneamento</th>
                    <th>Uso</th>
                    <th style="width: 5%">Visualizar</th>
                    <th style="width: 5%">Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php  if ($linha > 0){
                while($linha = mysqli_fetch_array($result)) {   ?>
                <tr  >    
                        <td >
                            <?php echo $linha['nomeRelatorio']; ?>
                        </td>
                        <td >
                            <?php echo $linha['iptu']; ?>
                        </td>
                        <td >
                            <?php echo $linha['zoneamento']; ?>
                        </td>
                        <td >
                            <?php echo $linha['uso']; ?>
                        </td>
                        <td class="text-center">
                            <a href="#" class="print" id="<?php echo $linha['nomeRelatorio'] ?>">
                                <i class="fas fa-eye" style="width: 30px;"></i> 
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="./delete/delete.php?id=<?php echo $linha['idRelatorio'] ?>&nome=<?php echo $linha['nomeRelatorio']?>" class="text-center"><i style="color: red" class=" fas fa-trash-alt"></i></a>
                        </td>
                </tr>
            <?php } ?>
            <?php } ?>
            </tbody> 
    </table>
</div>
<style type="text/css">
    
</style>