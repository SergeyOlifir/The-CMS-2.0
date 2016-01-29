$(document).ready(function() {
    $('.table-data-table').DataTable();
    $('.editor').wysihtml5();
    $('input[type="file"].autosubmit').on('change', function(e) {
        $(this).parents('form').submit()
    });

    $('.modal-with-param').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var index = 1;
        var modal = $(this);
        do {
            var passData = button.data('pass-' + index.toString());
            if (passData != undefined) {
                modal.find('input.param-input[data-target-index="' + index.toString() + '"]').val(passData);
                index++;
            } else {
                break;
            }
        } while (true);
        //modal.find('input.param-input').val(passData);
    });
});