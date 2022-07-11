$(function () {
    $('.js-basic-example').DataTable({
        /*dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],*/
        'ordering'    : true,
        language: {
            processing:     "Loading...",
            search:         "Search",
            lengthMenu:    "Show _MENU_ Entries",
            info:           "Showing _START_ to _END_ of  _TOTAL_ entries",
            infoEmpty:      "Showing 0 to 0 of 0 entries",
            infoFiltered:   "(filtered  from _MAX_ total entries)",
            infoPostFix:    "",
            loadingRecords: "Loading...",
            zeroRecords:    "No matching records found",
            emptyTable:     "Sorry, no data found",
            paginate: {
                first:      "First",
                previous:   "Previous",
                next:       "Next",
                last:       "Last"
            },
            aria: {
                sortAscending:  ": تفعيل لترتيب العمود تصاعدياً",
                sortDescending: ": تفعيل لترتيب العمود تنازلياً"
            }
        }
    });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],

        'paging'      : true,
        'lengthChange': true,
    });
});
