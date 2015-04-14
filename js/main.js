$(document).ready(function(){
//	var height=$(window).height();
	
	var table = $('#computers').DataTable({
		columnDefs: [
		   {type: 'non-empty-string', targets: 0},
		   {type: 'non-empty-string', targets: 1},
		   {type: 'non-empty-string', targets: 2}
		],
		"paging":false,
		"scrollY":$(window).height()-210,
		responsive: true,
		"language": { 
			"search": "",
			searchPlaceholder: "Search records"
		}
	});
	$('.menu-button').click(function(){
		$(".sidemenu").animate({width:'toggle'},350);
		$(".sidemenu-overlay").fadeToggle();
	});
	$(".sidemenu-overlay").click(function() {
		$('.menu-button').click();
	});
	
	jQuery.extend( jQuery.fn.dataTableExt.oSort, {
		"non-empty-string-asc": function (str1, str2) {
			if(str1 == "")
				return 1;
			if(str2 == "")
				return -1;
			return ((str1 < str2) ? -1 : ((str1 > str2) ? 1 : 0));
		},

		"non-empty-string-desc": function (str1, str2) {
			if(str1 == "")
				return 1;
			if(str2 == "")
				return -1;
			return ((str1 < str2) ? 1 : ((str1 > str2) ? -1 : 0));
		}
	} );
	
});

