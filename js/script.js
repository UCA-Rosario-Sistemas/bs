var inicio=function	() {
	
	
	$('.cantidad').keyup(function (e) {
		
			if(e.keyCode == 13){
					if(($(this).val()!='') && ($(this).val() > 0)) {
							console.log($(this).data('stock'));
							console.log($(this).val());
							
							var id=$(this).data('id');
							var price=$(this).data('price');
							var stock=$(this).data('stock');
							var cantidad=$(this).val();
							// si cantidad > stock cambiamos cantidad, sino alerta

							if (parseInt(cantidad) > parseInt(stock)) {

								alert('La cantidad que está ingresando, es mayor a nuestro stock')

								

							}else{
								

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

				
					}else {
						alert('La cantidad ingresada no puede ser negativa, ni letras ');
					}
		}
	});
	
}
$(document).ready(inicio);