$(document).ready(function(){
	
	var busqueda = $('#busqueda').val();

		$('#busqueda').focus().val("").val(busqueda);

		$('#busqueda').keyup(function(){
			if($('#filtro').val()!="")
				document.getElementById('buscar').submit();
		});			

	$('#filtro').on("click", function(){
		$('#busqueda').val("");
	});
	
	//$('#marcoForm').css("width",$('#tabla1').width());
});