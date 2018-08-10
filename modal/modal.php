<div class="bg-principal">
	<form method="GET"  id="infoProjeto">
		<div class="header-relatorio">
        	<h4>CADASTRO PROJETOS</h4>
			<button type="button" id="close" class="btn fechar" style=""><i class="fas fa-times"></i></button>
    	</div>
		<div class="container-fluid info-zoneamento">
			<h4><strong>INFORMAÇÕES</strong></h4>
			<hr>
			<div class="col-md-3 col-md-offset-1">
				<i style="color: red">*</i> <span>Nome Projeto:</span>
				<input type="text" name="nome" class="form-control" required>
			</div>

			<div class="col-md-2">
				<i style="color: red">*</i> <span>IPTU:</span>
				<input type="text" class="form-control" id="iptu" name="iptu" required>
			</div>
			
			<div class=" col-md-3">
				<i style="color: red">*</i> <span>Zoneamento</span>
				<select name="zoneamento" id="" class="form-control" required>
					<option value="zur1">ZUR 1</option>
					<option value="zur2">ZUR 2</option>
					<option value="zur3">ZUR 3</option>
				</select>
			</div>	 
			<div class=" col-md-2">
				<i style="color: red">*</i> <span data-toggle="tooltip" data-placement="top" title="Ex: Unifamiliar - Multifamiliar">Tipo de Uso</span>
				<select name="uso" id="" class="form-control" required>
					<option value="unifamiliar">Unifamiliar</option>
					<option value="multifamiliar">Multifamiliar</option>
				</select>
			</div>	 
		</div>
		
		<div class="container-fluid dados-projeto">
			<h4><strong>INFORMAÇÕES DO PROJETO</strong></h4>
			<!-- <div class="col-md-2" style="">
				<i style="color: red">*</i> <span>Possui Afastamento laterais e de fundos </span>
				<select name="conf-afastamento" id="conf-afast" class="form-control" required>
					<option value="sim">Sim</option>
					<option value="nao">Não</option>
					
				</select>
			</div> -->

			<div class="col-md-2 col-md-offset-1">
				<i style="color: red">*</i> <span>Menor cota lateral direita (m)</span>
				<input type="text" class="form-control" maxlength="3" id="cotas1" name="afastamento_lateral_dir" required>
			</div>
			<div class="col-md-2">
				<i style="color: red">*</i> <span>Menor cota lateral esquerda (m)</span>
				<input type="text" class="form-control" id="cotas2" maxlength="3" name="afastamento_lateral_esq" required>
			</div>
			<div class="col-md-2">
				<i style="color: red">*</i> <span>Menor cota fundos (m)</span>
				<input type="text" class="form-control" maxlength="3" id="cotas3" name="afastamento_fundos" required>
			</div>
			<div class="col-md-2">
				<i style="color: red">*</i> <span>Menor cota frontal (m)</span>
				<input type="text" class="form-control" maxlength="3" id="cotas4" name="afastamento_frontal" required>
			</div>
			<div class="col-md-2" style="margin-top: 37px;">
				<i style="color: red">*</i> <span>Altura na dívisa (m)</span>
				<input type="text" class="form-control" maxlength="4" id="cotas5" name="altura-divisa" >
				
			</div>
			<!-- <div class="col-md-2" style="margin-top: 10px;">
				<span>Nº de pisos</span>
				<input type="number" class="form-control" maxlength="4" name="altura-maxima" >
				
			</div> -->
		</div>
		<div class="dados-projeto">
			<h4><strong>ANEXAR ARQUIVO CSV</strong> (Extraído do autoCad)</h3>
			<div class="col-md-4 col-md-offset-4" style="margin-top: 20px;">
			<input type="file" class="form-control" id="abrir-csv">
			<button type="submit" class="btn btn-success" id="gerar-relatorio" style="width: 100%; margin-top: 20px; height:40px; border: 0;" ><i class="fas fa-check"></i> Gerar Relatório</button>
			</div>
		</div>
	</form>
</div>		