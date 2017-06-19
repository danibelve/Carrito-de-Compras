var inicio=function(){
	$(".cantidad").keyup(function(e){
		
		if($(this).val()!=''){

			if(e.keyCode==13){
				var id=$(this).attr('data-id');
				var precio=$(this).attr('data-precio');
				var cantidad=$(this).val();
				var sub=precio*cantidad;
				var subtotal = sub.toFixed(2); $('.subtotal'+id).html('$ '+(subtotal));
				$.post('../js/modificarDatos.php',{
					Id:id,
					Precio:precio,
					Cantidad:cantidad
				},function(e){
					$("#total").text('Total: '+ e);
				});
			}
		}
	});
}
$(document).on('ready',inicio);