//user name check area
var checked = false;
$('#check').onblur(function () {
	$('#error').empty();
	var inputValue = $('#loginName').val();
	if (jQuery.trim(inputValue) == '') {
		return false;
	}
	$.post('check.php', {
			username: inputValue
		},
		function (data) {
			if (data == 'available') {
				checked = true;
			}
			$('#status').html(data);
		}
	);
});