var TableDatatablesButtons=function(){
	var e=function(){
		var e=$("#sample_1");e.dataTable({
			language:{aria:{sortAscending:": activate to sort column ascending",
			sortDescending:": activate to sort column descending"},
			emptyTable:"No data available in table",
			info:"Showing _START_ to _END_ of _TOTAL_ entries",
			infoEmpty:"No entries found",
			infoFiltered:"(filtered1 from _MAX_ total entries)",
			lengthMenu:"_MENU_ entries",
			search:"Search:",
			zeroRecords:"No matching records found"
		},
		buttons:[{extend:"print",className:"btn dark btn-outline"},
		{extend:"copy",className:"btn red btn-outline"},
		{extend:"pdf",className:"btn green btn-outline"},
		{extend:"excel",className:"btn yellow btn-outline "},
		{extend:"csv",className:"btn purple btn-outline "},
		{extend:"colvis",className:"btn dark btn-outline",text:"Columns"}],
		responsive:!0,order:[[0,"asc"]],
		lengthMenu:[[5,10,15,20,-1],[5,10,15,20,"All"]],
		pageLength:10,dom:"<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>"})},t=function(){var e=$("#sample_2");e.dataTable({language:{aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ entries",infoEmpty:"No entries found",infoFiltered:"(filtered1 from _MAX_ total entries)",lengthMenu:"_MENU_ entries",search:"Search:",zeroRecords:"No matching records found"},buttons:[{extend:"print",className:"btn default"},{extend:"copy",className:"btn default"},{extend:"pdf",className:"btn default"},{extend:"excel",className:"btn default"},{extend:"csv",className:"btn default"},{text:"Reload",className:"btn default",action:function(e,t,n,a){alert("Custom Button")}}],order:[[0,"asc"]],lengthMenu:[[5,10,15,20,-1],[5,10,15,20,"All"]],pageLength:10,dom:"<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>"})};return{init:function(){jQuery().dataTable&&(e(),t())}}}();jQuery(document).ready(function(){TableDatatablesButtons.init()});