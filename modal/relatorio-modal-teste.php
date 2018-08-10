<?php 

require (__DIR__ ."\../conexao/conexao.php");



if(isset($_POST['codigo'])){

    $codigo = $_POST['codigo'];

}else{
    echo "Não Existe";
}


$resultado = $conexao->query("SELECT * FROM dadosrelatorios WHERE idRelatorio = '".$codigo."'");
$row = mysqli_num_rows($resultado); 

if ($row > 0){
    while($row = mysqli_fetch_array($resultado))
    {

?>

    <div class="relatorio-novo">
        <label>Nome: </label><?php echo " ".$row['nomeRelatorio']."" ?><br>

        <label>Iptu: </label><?php echo " ".$row['iptu']."" ?><br>
        
        <label>Zoneamento: </label><?php echo " ".$row['zoneamento']."" ?><br>
        
        <label>Uso: </label><?php echo " ".$row['uso']."" ?><br>

        <label>Afastamento lateral esquerdo: </label><?php echo " ".$row['afastamento_lateral_esq']."" ?><br>
        
        <label>Afastamento lateral direito: </label><?php echo " ".$row['afastamento_lateral_dir']."" ?><br>
        
        <label>afastamento fundos: </label><?php echo " ".$row['afastamento_fundos']."" ?><br>
        
        <label>afastamento frontal: </label><?php echo " ".$row['afastamento_frontal']."" ?><br>

        <label>Numero de Pisos: </label><?php echo " ".$row['altura_maxima']."" ?><br>

        <label>Altura na dívisa: </label><?php echo " ".$row['altura_divisa']."" ?><br>

    </div>
        <button type="button" class="btn btn-primary" id="visualizar-proj">Visualizar Relatório</button>

    <!-- Button trigger modal -->
<?php }
}
?>
<style type="text/css" scoped>
    .relatorio-novo{
        margin-top: 20px;
    }
    #visualizar-proj{
        padding: 3px 5px;
        font-size: 10px;
        border-radius: 2px;
        margin-bottom: 20px;
    }

</style>
<script type="text/javascript">
    $('#visualizar-proj').bind('click',function(){
        $('.bg-body').fadeIn();
        $('#relatorio').fadeIn();
    })
</script>
