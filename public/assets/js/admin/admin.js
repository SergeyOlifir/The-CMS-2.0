$(document).ready(function() {
    $('.table-data-table').DataTable();
    $('input[type="file"].autosubmit').on('change', function(e) {
        $(this).parents('form').submit()
    });
});