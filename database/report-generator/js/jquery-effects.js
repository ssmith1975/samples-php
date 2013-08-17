
$(document).ready(function() {

	// Apply zebra stripes to table rows
	$('table.report tr:odd td').addClass('odd-row');
	
	// Highlight rows on mouseover
	$('table.report tbody.datacell tr').hover(
		function() {
			$(this).find('td').addClass('hover-row');	
		}, function() {
			$(this).find('td').removeClass('hover-row');
		}
	); // end hover
	
}); // end 