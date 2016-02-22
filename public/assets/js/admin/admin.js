$(document).ready(function() {
    $('.table-data-table').DataTable();
    $.each($('.editor'), function (index, element) {
        CKEDITOR.replace(element.id, {
            toolbar: [
                { name: 'document', groups: ['mode'], items: ['Source'] },
                { name: 'basicstyles', groups: ['basicstyles', 'cleanup'], items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat'] },
                { name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align'], items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] },
                { name: 'clipboard', groups: ['clipboard', 'undo'], items: ['Cut', 'Copy', 'Paste', '-', 'PasteText', '-', 'Undo', 'Redo'] },
                { name: 'forms', items: ['Table', 'HorizontalRule'] },
                { name: 'colors', items: [ 'TextColor', 'BGColor' ] }
            ],
            toolbarGroups: [
                { name: 'document', groups: ['mode'] },
                { name: 'basicstyles', groups: ['basicstyles', 'cleanup'] },
                { name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align'] },
                { name: 'clipboard', groups: ['clipboard', 'undo'] },
                { name: 'forms' },
                { name: 'insert' },
                { name: 'colors' }
            ],
            language: 'ru',
            height: 600,
            allowedContent: true,
            ignoreEmptyParagraph: false,
            protectedSource: [
                /<a[^>]*><\/a>/g
            ],
            templates_replaceContent: false,
            contentsCss: extraCss
        });
    });

    $('button[type="submit"]').click(function () {
       for (var inst in CKEDITOR.instances) {
           CKEDITOR.instances[inst].updateElement();
       }
    });

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