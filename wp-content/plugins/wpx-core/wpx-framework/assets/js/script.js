jQuery(document).ready(function($){
	'use strict';

	// ColorPicker, Datepicker, Timepicker
	$(".wpx-metabox-picker").each(function() {
		// Exclude first hidden repeater field
		if ( !$(this).parents('.wpx-postmeta-repeater.repeater-init').length ) {
			executePickers($(this));
		}
	});

	// Multi Select
	$(".wpx-multi-select").select2();

	// initialize conditionals
	$( ".wpx-postmeta-container .wpx-postmeta-dependent" ).each(function() {
		var name  = $( this ).data('required');
		var value = $( this ).data('required-value');

		var $input = $( "input[name=" + name +"]" );
		var inputType = $input.attr('type');

		var fieldValue = null;

		// radio
		if ( inputType == 'radio' ) {
			fieldValue = $( "input[name=" + name +"]:checked" ).val();
		}

		//action
		if ( value != fieldValue ) {
			$( this ).hide();
		}
	});

	// radio field onchange conditional
	$( ".wpx-postmeta-container input[type=radio]" ).on('change', function() {
		var name = $( this ).attr('name');
		var value = $( this ).val();

		// hide
		$( '.wpx-postmeta-container tr[data-required="'+name+'"]' )
		.filter(function () {
			return $(this).data("required-value") != value;
		}).hide();

		// show
		$( '.wpx-postmeta-container tr[data-required="'+name+'"]' )
		.filter(function () {
			return $(this).data("required-value") == value;
		}).show();

	});

	/*Repeater*/

	// Generate close button
	var repeaterCloseHtml = '<a class="wpx-postmeta-repeater-close"></a>'
	$(".wpx-postmeta-repeater tr:last-child td").append(repeaterCloseHtml);

	// Close button action
	$(".wpx-postmeta-repeater-wrap").on('click', '.wpx-postmeta-repeater-close', function(event) {
		$(this).closest('.wpx-postmeta-repeater').fadeOut("fast", function(){ $(this).remove(); })
	});

	// Add more button action
	$( ".wpx-postmeta-container .wpx-postmeta-repeater-addmore" ).on('click', 'button', function(event) {

		// Num Data
		var $wrapper = $(this).closest('.wpx-postmeta-repeater-wrap');
		var oldNum = $wrapper.data('num');
		var newNum = oldNum + 1;
		$wrapper.data('num', newNum);

		// Generate contents
		var $repeaterContent = $wrapper.find(".wpx-postmeta-repeater.repeater-init");

		var inputField = $wrapper.data('fieldname');;

		inputField = inputField.split('[')[0];
		var replaceString = inputField + '\\[hidden\\]';
		var replaceWith   = inputField + '[' + oldNum +']';
		var replaceString = new RegExp (replaceString , "g");

		var repeaterHtml = $repeaterContent[0].innerHTML.replace(replaceString, replaceWith);

		var newElement =  document.createElement('table');
		newElement.className = 'wpx-postmeta-repeater';
		newElement.innerHTML = repeaterHtml;

		// Execute contents
		$(this).closest('.wpx-postmeta-repeater-addmore').before(newElement);

		// Execute Pickers
		$(newElement).find(".wpx-metabox-picker").each(function() {
			executePickers($(this));
		});

		return false;
	});

	// Enable Sortable
	$(".wpx-postmeta-repeater-wrap").sortable({
		items: '.wpx-postmeta-repeater',
		cursor: "move"
	});

	// Image upload field
	$("body").on('click', '.wpx_upload_image', function(event) {
		var btnClicked = $(this);
		var custom_uploader = wp.media({
			multiple: false
		}).on("select", function () {
			var attachment = custom_uploader.state().get("selection").first().toJSON();
			btnClicked.closest(".wpx_metabox_image").find(".custom_upload_image").val(attachment.id);
			btnClicked.closest(".wpx_metabox_image").find(".custom_preview_image").attr("src", attachment.url).show();
			btnClicked.closest(".wpx_metabox_image").find(".wpx_remove_image_wrap").show();

		}).open();
	});
	$("body").on('click', '.wpx_remove_image', function(event) {
		event.preventDefault();
		$(this).closest(".wpx_metabox_image").find(".custom_upload_image").val("");
		$(this).closest(".wpx_metabox_image").find(".custom_preview_image").attr("src", "").hide();
		$(this).closest(".wpx_metabox_image").find(".wpx_remove_image_wrap").hide();
		return false;
	});

	// Gallery upload field
	var rtMetaGalleryFrame = wp.media({multiple: true});
	var rtMetaGalleryBtn;

	$("body").on('click', '.wpx_upload_gallery', function(event) {
		rtMetaGalleryBtn = $(this);
		rtMetaGalleryFrame.open();
	});
	$("body").on('click', '.wpx_remove_gallery', function(event) {
		event.preventDefault();
		$(this).closest(".wpx_metabox_gallery").find(".custom_upload_image").val("");
		$(this).closest(".wpx_metabox_gallery").find(".custom_preview_images").html('');
		$(this).closest(".wpx_metabox_gallery").find(".wpx_remove_gallery").hide();
		return false;
	});

	rtMetaGalleryFrame.on("select", function () {
		var selection  = rtMetaGalleryFrame.state().get('selection');
		var ids  = [];

		rtMetaGalleryBtn.closest(".wpx_metabox_gallery").find(".custom_preview_images").html('');

		selection.map( function( attachment ) {
			attachment = attachment.toJSON();
			ids.push(attachment.id);
			rtMetaGalleryBtn.closest(".wpx_metabox_gallery").find(".custom_preview_images").append("<img src=" +attachment.url+">");
		});

		rtMetaGalleryBtn.closest(".wpx_metabox_gallery").find(".custom_upload_image").val(ids);
		rtMetaGalleryBtn.closest(".wpx_metabox_gallery").find(".wpx_remove_gallery").show();
	});

	rtMetaGalleryFrame.on('open',function(event) {
		var selection = rtMetaGalleryFrame.state().get('selection');
		var ids = rtMetaGalleryBtn.closest(".wpx_metabox_gallery").find(".custom_upload_image").val().split(',');

		ids.forEach(function(id) {
			var attachment = wp.media.attachment(id);
			attachment.fetch();
			selection.add( attachment ? [ attachment ] : [] );
		});
	});

	// File upload field
	$("body").on('click', '.wpx_upload_file', function(event) {
		var btnClicked = $(this);
		var custom_uploader = wp.media({
			multiple: false
		}).on("select", function () {
			var attachment = custom_uploader.state().get("selection").first().toJSON();
			console.log(attachment);
			btnClicked.closest(".wpx_metabox_file").find(".custom_upload_file").val(attachment.id);
			btnClicked.closest(".wpx_metabox_file").find(".custom_preview_file").attr("href", attachment.url).html(attachment.title).show();
			btnClicked.closest(".wpx_metabox_file").find(".wpx_remove_file_wrap").show();
		}).open();
		
	});
	$("body").on('click', '.wpx_remove_file', function(event) {
		event.preventDefault();
		$(this).closest(".wpx_metabox_file").find(".custom_upload_file").val("");
		$(this).closest(".wpx_metabox_file").find(".custom_preview_file").attr("href", "#").html("").hide();
		$(this).closest(".wpx_metabox_file").find(".wpx_remove_file_wrap").hide();
		return false;
	});
});

function executePickers($item) {
	if ($item.hasClass('wpx-metabox-colorpicker')) {
		$item.wpColorPicker();
	}
	else if ($item.hasClass('wpx-metabox-datepicker')) {
		$item.datepicker(jQuery.datepicker.regional['en-US']);
		$item.datepicker({
			dateFormat : $item.data('format')
		});
	}
	else if ($item.hasClass('wpx-metabox-timepicker')) {
		$item.timepicker();
	}
	else if ($item.hasClass('wpx-metabox-timepicker-24')) {
		$item.timepicker({'timeFormat': 'H:i'});
	}
}