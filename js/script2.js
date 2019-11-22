$(document).ready(function(){
	$('#tombol').hide();

	$('#keyword').on('keyup', function(){
		$('#container').load('../../ajax/pengembalian.php?keyword=' + $('#keyword').val());
	});
});