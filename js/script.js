var inicio=function	() {
	
	
	$('.cantidad').keyup(function (e) {
		if($(this).val()!=''){
			if(e.keyCode == 13){
				
				var id=$(this).attr('data-id');
				var precio=$(this).attr('data-precio');
				var cantidad=$(this).val();
				//Encuentro el la clase subtotal, y cambio su texto
				$(this).parentsUntil('.producto').find('.subtotal').text('Subtotal: '+ (precio*cantidad));
				//Usando ajax post = (ruta,{parametros},resultado)
				$.post(('js/modificarDatos.php'),{
					Id: id,
					Precio: precio,
					Cantidad: cantidad

				}, function (e) {
					$("#total").text('Total: '+e);

				});

				
			}
		}
	});
	
}
$(document).ready(inicio);