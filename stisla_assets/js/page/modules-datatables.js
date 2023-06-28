"use strict";

// $("[data-checkboxes]").each(function () {
// 	var me = $(this),
// 		group = me.data("checkboxes"),
// 		role = me.data("checkbox-role");

// 	me.change(function () {
// 		var all = $(
// 				'[data-checkboxes="' + group + '"]:not([data-checkbox-role="dad"])'
// 			),
// 			checked = $(
// 				'[data-checkboxes="' +
// 					group +
// 					'"]:not([data-checkbox-role="dad"]):checked'
// 			),
// 			dad = $('[data-checkboxes="' + group + '"][data-checkbox-role="dad"]'),
// 			total = all.length,
// 			checked_length = checked.length;

// 		if (role == "dad") {
// 			if (me.is(":checked")) {
// 				all.prop("checked", true);
// 			} else {
// 				all.prop("checked", false);
// 			}
// 		} else {
// 			if (checked_length >= total) {
// 				dad.prop("checked", true);
// 			} else {
// 				dad.prop("checked", false);
// 			}
// 		}
// 	});
// });

// $("#table-1").dataTable({
// 	lengthMenu: [
// 		[10, 25, 50, -1],
// 		["10 rows", "25 rows", "50 rows", "Show all"],
// 	],
// 	lengthChange: false,
// 	buttons: [
// 		{
// 			extend: "pageLength",
// 		},
// 		{
// 			extend: "print",
// 			exportOptions: {
// 				columns: ":visible",
// 			},
// 		},
// 		{
// 			extend: "excel",
// 			exportOptions: {
// 				columns: ":visible",
// 			},
// 		},
// 		{
// 			extend: "pdf",
// 			exportOptions: {
// 				columns: ":visible",
// 			},
// 		},
// 		"colvis",
// 	],
// });
// $("#table-2").dataTable({
// 	columnDefs: [{ sortable: false, targets: [0, 2, 3] }],
// });
