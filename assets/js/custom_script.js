jQuery(document).ready(function ($) {
	"use strict";

	/*=========== Disable Button ===========*/
	function disableSubmitBtn() {
		var submitButton = $("#submit");
		submitButton.html("Please Wait...");
		submitButton.attr("disabled", true);
		submitButton.addClass("disabled");
	}

	/*=========== Enable Button ===========*/
	function enableSubmitBtn() {
		var submitButton = $("#submit");
		submitButton.html("Submit");
		submitButton.removeClass("disabled");
		submitButton.attr("disabled", false);
	}

	/*============= Countdown ==============*/

	$("[data-countdown]").each(function () {
		var $this = $(this),
			finalDate = $(this).data("countdown");
		$this.countdown(finalDate, function (event) {
			$this.html(
				event.strftime(
					'<span class="dcare-count days"><span class="count-inner"><span class="time-count">%-D</span> <p>Days</p></span></span> <span class="dcare-count hour"><span class="count-inner"><span class="time-count">%-H</span> <p>Hours</p></span></span> <span class="dcare-count minutes"><span class="count-inner"><span class="time-count">%M</span> <p>Minutes</p></span></span> <span class="dcare-count second"><span class="count-inner"><span class="time-count">%S</span> <p>Seconds</p></span></span>'
				)
			);
		});
	});

	//Contact Us
	$("#contact_us_form").submit(function (e) {
		e.preventDefault();
		var form_data = $(this).serialize();
		disableSubmitBtn();

		$.ajax({
			url: base_url + "home/contact_ajax",
			type: "POST",
			data: form_data,
			success: function (msg) {
				if (msg == 1) {
					$("#status_msg")
						.html(
							'<div class="alert alert-success text-center"> Thank you! One of our representatives would contact you soon.</div>'
						)
						.fadeIn("fast")
						.delay(5000)
						.fadeOut("slow");
					enableSubmitBtn();
					$("#contact_us_form")[0].reset(); //reset form fields
				} else {
					$("#status_msg")
						.html(
							'<div class="alert alert-danger text-center">' + msg + "</div>"
						)
						.fadeIn("fast")
						.delay(7000)
						.fadeOut("slow");
					enableSubmitBtn();
				}
			},
		});
	});

	//Affiliate Us
	$("#affiliate_form").submit(function (e) {
		e.preventDefault();
		var form_data = $(this).serialize();
		disableSubmitBtn();

		$.ajax({
			url: base_url + "home/add_affiliate_ajax",
			type: "POST",
			data: form_data,
			success: function (msg) {
				if (msg == 1) {
					$("#status_msg")
						.html(
							'<div class="alert alert-success text-center"> Thank you! One of our representatives would contact you soon.</div>'
						)
						.fadeIn("fast")
						.delay(5000)
						.fadeOut("slow");
					enableSubmitBtn();
					$("#affiliate_form")[0].reset(); //reset form fields
				} else {
					$("#status_msg")
						.html(
							'<div class="alert alert-danger text-center">' + msg + "</div>"
						)
						.fadeIn("fast")
						.delay(7000)
						.fadeOut("slow");
					enableSubmitBtn();
				}
			},
		});
	});

	//Admin login
	$("#admin_login_form").submit(function (e) {
		e.preventDefault();
		var form_data = $(this).serialize();
		var redirect_url = $("#requested_page").val();
		$.ajax({
			url: base_url + "login/login_ajax",
			type: "POST",
			data: form_data,
			dataType: "json",
			success: function (res) {
				if (res.status) {
					$("#status_msg")
						.html('<div class="alert alert-success text-center" style="color: #000">' + res.msg + "</div>").fadeIn("fast");
					setTimeout(function () {
						$(location).attr("href", redirect_url);
					}, 3000);
				} else {
					$("#status_msg")
						.html(
							'<div class="alert alert-danger text-center" style="color: #000">' +
								res.msg +
								"</div>"
						)
						.fadeIn("fast")
						.delay(10000)
						.fadeOut("slow");
				}
			},
		});
	});

	//Volunteer
	$("#volunteer_form").submit(function (e) {
		e.preventDefault();

		var submitButton = $("#submit");
		submitButton.html("Please Wait...");
		submitButton.attr("disabled", true);
		submitButton.addClass("disabled");
		var form_data = $(this).serialize();
		$.ajax({
			url: base_url + "home/volunteer_ajax",
			type: "POST",
			data: form_data,
			success: function (msg) {
				if (msg == 1) {
					$("#c_status_msg")
						.html(
							'<div class="alert alert-success text-center"> Thank you! Application sent successfully.</div>'
						)
						.fadeIn("fast");
					$("#volunteer_form")[0].reset(); //reset form fields
					submitButton.html("Submit");
					submitButton.removeClass("disabled");
					submitButton.attr("disabled", false);
					setTimeout(function () {
						$("#c_status_msg").fadeOut();
					}, 5000);
				} else {
					$("#c_status_msg")
						.html(
							'<div class="alert alert-danger text-center">' + msg + "</div>"
						)
						.fadeIn("fast");
					setTimeout(function () {
						submitButton.html("Submit");
						submitButton.removeClass("disabled");
						submitButton.attr("disabled", false);
						$("#c_status_msg").fadeOut();
					}, 5000);
				}
			},
		});
	});

	$('select[multiple="multiple"]').each(function (index, element) {
		// selecting all select elements with multiple and looping throught them

		//getting variables

		var placeHolder = $(this).attr("placeholder");
		var allSelected = $(this).attr("all-selected");
		$(this).multiselect({
			includeSelectAllOption: true,
			nonSelectedText: placeHolder,
			nSelectedText: " - Too many options selected!",
			allSelectedText: allSelected,
			numberDisplayed: 10,
		});
	});

	//Date Picker
	$(document).ready(function () {
		$("#datepicker").datepicker({
			format: "dd-mm-yyyy",
			autoclose: true,
			todayHighlight: true,
		});
	});
});
