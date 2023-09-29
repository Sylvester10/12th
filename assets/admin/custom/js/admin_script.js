jQuery(document).ready(function ($) {
 "use strict";



 	Dropzone.options.upload_photo_form = {
 		maxFilesize: 3,
 		acceptedFiles: '.jpg, .jpeg, .png, .gif',
		init: function() {
			this.on('success', function() {
				if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
					location.reload(); //reload page after upload success
				}
			});
		}
	};

	function disableSubmitBtn(){
		var submitButton = $("#submit");
			submitButton.html("Please Wait...");
			submitButton.attr("disabled",true);
			submitButton.addClass("disabled");

	}

	function enableSubmitBtn(){
		var submitButton = $("#submit");
		submitButton.html("Submit");
		submitButton.removeClass("disabled");
		submitButton.attr("disabled",false);
	}


 	//Quick Mail
	$('#quick_mail_form').submit(function(e) {
		e.preventDefault();
		var form_data = $('#quick_mail_form').serialize();
		$.ajax({
			url: base_url + 'admin/send_quick_mail_ajax', 
			type: 'POST',
			data: form_data, 
			success: function(msg) {
				if (msg == 1) {
					$( '#q_status_msg' ).html('<div class="alert alert-success text-center">Mail successfully sent.</div>').fadeIn( 'fast' ).delay( 30000 ).fadeOut( 'slow' );
					$('#quick_mail_form')[0].reset(); //reset form fields
					var email_message = $("#email_message");
					email_message.val('');
				    email_message.siblings('[class="trumbowyg-editor"]').html('');
				} else {
					$('#q_status_msg').html('<div class="alert alert-danger text-center"> Email not Sent!</div>').fadeIn( 'fast' ).delay( 30000 ).fadeOut( 'slow' );
				}
			}
		});
	});
		
	
	//print and export buttons for DataTables
	var ExportButtons = [
		{
			extend: 'colvis', //column visibility
			className: 'data_export_buttons'
		},
		{
			extend: 'print',
			className: 'data_export_buttons',
			exportOptions: {
				columns: ':visible'
			}
		},
		{
			extend: 'excel',
			className: 'data_export_buttons',
			exportOptions: {
				columns: ':visible'
			}
		},
		{
			extend: 'csv',
			className: 'data_export_buttons',
			exportOptions: {
				columns: ':visible'
			}
		},
		{
			extend: 'pdf',
			className: 'data_export_buttons',
			exportOptions: {
				columns: ':visible'
			}
		}
	];


	//Properties
	var csrf_hash = $('#csrf_hash').val();
	var property_table = $('#property_table').DataTable({ 
		paging: true,
		pageLength : 10,
		lengthChange: true, 
		searching: true,
		info: true,
		scrollX: true,
		autoWidth: false,
		ordering: true,
		stateSave: true,
		processing: false, 
		serverSide: true, 
		pagingType: "simple_numbers", 
		dom: "<'dt_len_change'l>f<'dt_buttons'B>trip", 
		order: [], //Initial no order.
		language: {
			search: "Search/filter properties: ",
			processing: "Please wait a sec...",
			info: "Showing _START_ to _END_ of _TOTAL_ properties",
			infoFiltered: "(filtered from _MAX_ total properties)",
			emptyTable: "No property to show.",
			lengthMenu: "Show _MENU_ properties",
		},
		ajax: {
			url: base_url + 'properties/property_ajax',
			dataType: "json",
			type: "POST",
			data: { 'q2r_secure' : csrf_hash } //cross site request forgery protection
		},
		columnDefs: [
			{targets: [0, 1], orderable: false}
		],
		buttons: ExportButtons
	});


	//Affiliates
	var csrf_hash = $('#csrf_hash').val();
	var affiliates_table = $('#affiliates_table').DataTable({ 
		paging: true,
		pageLength : 10,
		lengthChange: true, 
		searching: true,
		info: true,
		scrollX: true,
		autoWidth: false,
		ordering: true,
		stateSave: true,
		processing: false, 
		serverSide: true, 
		pagingType: "simple_numbers", 
		dom: "<'dt_len_change'l>f<'dt_buttons'B>trip", 
		order: [], //Initial no order.
		language: {
			search: "Search/filter affiliates: ",
			processing: "Please wait a sec...",
			info: "Showing _START_ to _END_ of _TOTAL_ affiliates",
			infoFiltered: "(filtered from _MAX_ total affiliates)",
			emptyTable: "No property to show.",
			lengthMenu: "Show _MENU_ affiliates",
		},
		ajax: {
			url: base_url + 'affiliates/affiliates_ajax',
			dataType: "json",
			type: "POST",
			data: { 'q2r_secure' : csrf_hash } //cross site request forgery protection
		},
		columnDefs: [
			{targets: [0, 1], orderable: false}
		],
		buttons: ExportButtons
	});


	//Staff
	var csrf_hash = $('#csrf_hash').val();
	var staff_table = $('#staff_table').DataTable({ 
		paging: true,
		pageLength : 10,
		lengthChange: true, 
		searching: true,
		info: true,
		scrollX: true,
		autoWidth: false,
		ordering: true,
		stateSave: true,
		processing: false, 
		serverSide: true, 
		pagingType: "simple_numbers", 
		dom: "<'dt_len_change'l>f<'dt_buttons'B>trip", 
		order: [], //Initial no order.
		language: {
			search: "Search/filter staff: ",
			processing: "Please wait a sec...",
			info: "Showing _START_ to _END_ of _TOTAL_ staff",
			infoFiltered: "(filtered from _MAX_ total staff)",
			emptyTable: "No property to show.",
			lengthMenu: "Show _MENU_ staff",
		},
		ajax: {
			url: base_url + 'staff/staff_ajax',
			dataType: "json",
			type: "POST",
			data: { 'q2r_secure' : csrf_hash } //cross site request forgery protection
		},
		columnDefs: [
			{targets: [0, 1], orderable: false}
		],
		buttons: ExportButtons
	});


	//Location
	var csrf_hash = $('#csrf_hash').val();
	var locations_table = $('#locations_table').DataTable({ 
		paging: true,
		pageLength : 10,
		lengthChange: true, 
		searching: true,
		info: true,
		scrollX: true,
		autoWidth: false,
		ordering: true,
		stateSave: true,
		processing: false, 
		serverSide: true, 
		pagingType: "simple_numbers", 
		dom: "<'dt_len_change'l>f<'dt_buttons'B>trip", 
		order: [], //Initial no order.
		language: {
			search: "Search/filter locations: ",
			processing: "Please wait a sec...",
			info: "Showing _START_ to _END_ of _TOTAL_ locations",
			infoFiltered: "(filtered from _MAX_ total locations)",
			emptyTable: "No property to show.",
			lengthMenu: "Show _MENU_ locations",
		},
		ajax: {
			url: base_url + 'locations/locations_ajax',
			dataType: "json",
			type: "POST",
			data: { 'q2r_secure' : csrf_hash } //cross site request forgery protection
		},
		columnDefs: [
			{targets: [0, 1], orderable: false}
		],
		buttons: ExportButtons
	});


	//Projects
	var csrf_hash = $('#csrf_hash').val();
	var projects_table = $('#projects_table').DataTable({ 
		paging: true,
		pageLength : 10,
		lengthChange: true, 
		searching: true,
		info: true,
		scrollX: true,
		autoWidth: false,
		ordering: true,
		stateSave: true,
		processing: false, 
		serverSide: true, 
		pagingType: "simple_numbers", 
		dom: "<'dt_len_change'l>f<'dt_buttons'B>trip", 
		order: [], //Initial no order.
		language: {
			search: "Search/filter projects: ",
			processing: "Please wait a sec...",
			info: "Showing _START_ to _END_ of _TOTAL_ projects",
			infoFiltered: "(filtered from _MAX_ total projects)",
			emptyTable: "No projects to show.",
			lengthMenu: "Show _MENU_ projects",
		},
		ajax: {
			url: base_url + 'projects/projects_ajax',
			dataType: "json",
			type: "POST",
			data: { 'q2r_secure' : csrf_hash } //cross site request forgery protection
		},
		columnDefs: [
			{targets: [0, 1], orderable: false}
		],
		buttons: ExportButtons
	});


	//Text Editor	
	$('#email_message').trumbowyg({
		btns: [['viewHTML'],['formatting'],['bold', 'italic','underline','del'],['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],['unorderedList', 'orderedList'],['link'],['removeformat'], ['fullscreen']],
		changeActiveDropdownIcon: true,
		imageWidthModalEdit: true
	});
	










































































	
}); //jQuery(document).ready(function)