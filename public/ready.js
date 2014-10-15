/**
 * Loaded upon page load.
 */
$(function () {
	if ($('#usertable').length)
		$('#usertable').DataTable();
	
	if ($('#homeworks').length)
		$('#homeworks').DataTable();
});