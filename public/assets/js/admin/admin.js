$(document).ready(function() {
    $('.table-data-table').DataTable();
    $('.editor').wysihtml5();
    $('input[type="file"].autosubmit').on('change', function(e) {
        $(this).parents('form').submit()
    });
});