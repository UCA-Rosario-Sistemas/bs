var inicio=function	() {
	
	
	$('.cantidad').keyup(function (e) {
		if($(this).val()!=''){
			if(e.keyCode == 13){


				
				var id=$(this).attr('data-id');
				var price=$(this).attr('data-price');
				var stock=$(this).attr('stock');
				var cantidad=$(this).val();
				// si cantidad > stock

				//Encuentro el la clase subtotal, y cambio su texto
				$(this).parentsUntil('.product').find('.subtotal').text('Subtotal: '+ (price*cantidad));
				//Usando ajax post = (ruta,{parametros},resultado)
				$.post(('js/modificarDatos.php'),{
					Id: id,
					Price: price,
					Cantidad: cantidad

				}, function (e) {
					$("#total").text('Total: '+e);

				});

				
			}
		}
	});
	
}
$(document).ready(inicio);