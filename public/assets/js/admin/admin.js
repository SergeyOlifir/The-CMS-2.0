$(document).ready(function() {
    $('.table-data-table').DataTable();
    $('.editor').wysihtml5();
    $('input[type="file"].autosubmit').on('change', function(e) {
        $(this).parents('form').submit()
    });

    $('.modal-with-param').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var passData = button.data('pass');
        var modal = $(this);
        modal.find('input.param-input').val(passData);
    });
});