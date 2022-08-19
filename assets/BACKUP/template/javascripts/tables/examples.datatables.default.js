

(function( $ ) {

	'use strict';

	var datatableInit = function() {

		$('#datatable-default').dataTable();
		// $('#tables2').dataTable();

	};

	// var datatableInit2 = function() {

	// 	$('#tables2').dataTable();

	// };

	$(function() {
		datatableInit();
		// datatableInit2();
	});

}).apply( this, [ jQuery ]);