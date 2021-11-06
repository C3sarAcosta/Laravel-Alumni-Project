$(function () {
    $('#table-filter thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#table-filter thead');

    var table = $('#table-filter').DataTable({
        
        orderCellsTop: true,
        fixedHeader: true,
        buttons: ["copy", "csv", "excel", "colvis"],
        initComplete: function () {
            var api = this.api();

            // For each column
            api
                .columns()
                .eq(0)
                .each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');

                    // On every keypress in this input
                    $(
                            'input',
                            $('.filters th').eq($(api.column(colIdx).header()).index())
                        )
                        .off('keyup change')
                        .on('keyup change', function (e) {
                            e.stopPropagation();

                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != '' ?
                                    regexr.replace('{search}', '(((' + this.value + ')))') :
                                    '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();

                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
        },
    }).buttons().container().appendTo('#table-filter_wrapper .col-md-6:eq(0)');;
});

$(function () {
    $("#example2").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": true,
        "buttons": ["copy", "csv", "excel", "colvis"]
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
});
