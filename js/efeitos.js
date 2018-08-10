$(document).ready(function(){

	$('[data-toggle="tooltip"]').tooltip();

	$('#iptu').mask('99.999.999-99');
	$('#cotas1').mask('9.99');
	$('#cotas2').mask('9.99');
	$('#cotas3').mask('9.99');
	$('#cotas4').mask('9.99');
	$('#cotas5').mask('9.99');
	$('#cotas6').mask('9.99');

	$('#hover').click(function(){
		$('.dropdown').toggle("show");
	});

	$('#conf-afast').select(function(){
		var opcao = $(this).val();
		if(opcao == 'sim'){
			alert('funfou')
		}
	});

	$("#documentacao-1").on("click", function(){
		$('#documentacao').animatescroll({scrollSpeed:500});
	})

	$("#extration").on("click", function(){
		$('#data-extration').animatescroll({scrollSpeed:500});
	})

	$('#cadastrar-projeto').bind('click', function(){
		$('.bg-principal').fadeIn('fast')
		$('.bg-body').fadeIn('fast');
	});

	$('.fechar').bind('click', function(){	
		$('.bg-principal').fadeOut('fast');
		$('.bg-body').fadeOut('fast');
		$('#relatorio').fadeOut('fast');
		$('.mostrar').fadeOut(500);
	});


	$('.bg-body').bind('click', function(){	
		$('.bg-principal').fadeOut('fast');
		$('.bg-body').fadeOut('fast');
		$('#relatorio').fadeOut('fast');
	});

	$('#tabela').bind('click', function(){
		console.log('passou')
		$('#relatorio').css("display","inline-block")
	})
	

	$('#infoProjeto').bind('submit', function(e){
		e.preventDefault();
		$('.bg-principal').fadeOut('fast')
		$('.bg-body').fadeIn('fast');
		$('.carregando').fadeIn('fast');

		var objeto = $("#infoProjeto").serialize();
		var dwg_csv = $('#abrir-csv').val();

		// console.log(objeto);
		$.ajax({
			url: 'requisicao/arquivo.php',
			type: 'POST',
			// dataType: 'json',
			data: 'codigo='+dwg_csv,
			success: (dados) => {
				$('.carregando').fadeOut(150);
				$('.bg-body').fadeOut(150);
				console.log("Cadastrado com sucesso!",dados)
				$('.modal-confirmacao').css('display','inline-block')
					setTimeout(function(){
						$('.modal-confirmacao').addClass('fadeOut')
					},2100)
					setTimeout(function(){
						location.reload()
					},3000)	
			}
		});
	
		$.ajax({
			url: 'requisicao/informacoes.php',
			type: 'POST',
			// dataType: 'json',
			data: objeto,
			success: (data) => {
				console.log("Cadastrado com sucesso!");	
			}
		});


	});
	// $('.print').bind('click',function(){
	// 	// console.log(`clicou`);
	// 	var idResp = $(this).attr('id');
	// 	// alert(idResp);
	// 	$('.bg-body').fadeIn('fast');
	// 	$('#relatorio').fadeIn('fast');
		
	// });

	$('.print').bind('click',function(){
		// console.log(`clicou`);
		var nomeRelatorio = $(this).attr('id');
		// alert(idResp)

		location.href="teste/teste.php?nome_relatorio="+nomeRelatorio;


		// $.ajax({
		// 	url: "modal/info-modal.php",
		// 	type: 'POST',
		// 	data: 'codigo='+idResp,
		// 	success: (data) => {
		// 		$('#testando-modal').html(data);
		// 	}
		// })

		
	});
	// $('#visualizar-proj').bind('click',function(){
	// 	console.log('passou aqui')
	// 	$('.bg-body').fadeIn('fast')
	// 	$('#relatorio').fadeIn('fast')
	// })

	$('.corpo-tabela').on('click',function(){
		var id = $(this).attr('id');
		


		$.ajax({
			url: "requisicao/push.php",
			type: 'GET',
			data: 'codigo='+id,
			success: (data) => {
				$('#corpo-info div').toggle();
				$('.mostrar').html(data);
			}
		})
	})
	
	$('#docs').bind('click',function(){
		$('#corpo-menu').css('display','inline-block');
	})

});


