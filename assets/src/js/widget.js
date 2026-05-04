jQuery(document).ready(function ($) {

    $(document).on('click', '.upload-image', function (e) {

        e.preventDefault();

        let button = $(this);
        let input = button.prev('.image-url');

        let frame = wp.media({
            title: 'Select Image',
            button: { text: 'Use Image' },
            multiple: false
        });

        frame.on('select', function () {

            let attachment = frame.state().get('selection').first().toJSON();

            input.val(attachment.url).trigger('change');
        });

        frame.open();

    });

});