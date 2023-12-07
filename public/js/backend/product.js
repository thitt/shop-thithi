const PRODUCT_ADMIN = (function () {
    const modules = {};

    modules.addProductQuantity = function () {
        let html = $('.js-product-quantity:not(.clone-product-quantity)').clone();
        let count = parseInt($('.count-product-quantity:last').val()) + 1;
        html.find('.count-product-quantity').val(count);
        html.addClass('clone-product-quantity');
        html.find('.invalid-feedback').remove();
        html.find('.input-color').attr('name', 'color[' + count + ']');
        html.find('.input-size').attr('name', 'size[' + count + ']');
        html.find('.input-stock-quantity').attr('name', 'stock_quantity[' + count + ']');

        $(html.find('.input-color, .input-size')).each(function() {
            let id_input = $(this).attr('id') + '-' + count;
            $(this).attr('id', id_input);
            $(this).parent().find('.label-input').attr('for', id_input);
        });

        html.find('input[type="number"]').val(0);
        html.find('input[type="radio"]').prop('checked', false);
        html.find('.input-color:first').prop('checked', true);
        html.find('.input-size:first').prop('checked', true);
        html.find('.btn-delete-product-quantity').removeClass('d-none');
        html.find('.input-product-quantity-id').val('');
        html.find('.input-product-quantity-id').attr('name', 'product_quantity_id[' + count + ']');
        $('.block-product-quantity').append(html);
    }

    modules.getEditor = function () {
        new Quill('#editor', {
            modules: {
                toolbar: [
                    [{ header: [1, 2, false] }],
                    ['bold', 'italic', 'underline'],
                    ['image', 'code-block']
                ]
            },
            theme: 'snow'
        });
    }

    modules.displayImagePreview = function (element) {
        const [file] = element.files;
        let img = $(element).parent().find(".block-img");
        if (file) {
            img.html('');
            let src = URL.createObjectURL(file);
            img.append('<img src="' + src  + '"/>');
        }
    }

    modules.saveImageStorage = function (event, element) {
        const image = event.target.files[0];
        const reader = new FileReader();
        reader.readAsDataURL(image);
        let name = $(element).attr('name');

        reader.addEventListener('load', () => {
            localStorage.setItem(name, reader.result);
            localStorage.setItem(name + '_name', image.name);
        });
    }

    modules.getImageStorage = function () {
        if ($('input[name="check_form_validate"]').val() == 'true') {
            modules.previewImageStorage('image_base');
            modules.previewImageStorage('image_small');
            modules.previewImageStorage('image_thumbnail');
            modules.previewImageStorage('image_swatch');
        } else {
            localStorage.removeItem('image_base');
            localStorage.removeItem('image_base_name');
            localStorage.removeItem('image_small');
            localStorage.removeItem('image_small_name');
            localStorage.removeItem('image_thumbnail');
            localStorage.removeItem('image_thumbnail_name');
            localStorage.removeItem('image_swatch');
            localStorage.removeItem('image_swatch_name');
        }
    }

    modules.previewImageStorage = function (name) {
        let image_src = localStorage.getItem(name);
        if (image_src) {
            let name_file = localStorage.getItem(name + '_name');
            let input_file = $('input[name="' + name + '"]');
            input_file.parent().find('.preview-image').html('');
            input_file.parent().find('.preview-image').append('<img src="' + image_src + '"/>');
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(modules.dataURLtoFile(image_src, name_file));
            input_file.files = dataTransfer.files;
            input_file.prop('files', dataTransfer.files);
        }
    }

    modules.dataURLtoFile = function (dataurl, filename) {
        var arr = dataurl.split(','),
            mime = arr[0].match(/:(.*?);/)[1],
            bstr = atob(arr[arr.length - 1]),
            n = bstr.length,
            u8arr = new Uint8Array(n);
        while(n--){
            u8arr[n] = bstr.charCodeAt(n);
        }
        return new File([u8arr], filename, {type:mime});
    }

    return modules;
})(window.jQuery, window, document);

$(document).ready(() => {
    PRODUCT_ADMIN.getEditor();
    $(".form-create-product").on('submit',function() {
        $('textarea[name="description"]').val($('#editor').html());
    })

    $('.btn-add-product-quantity').on('click', function () {
        PRODUCT_ADMIN.addProductQuantity();
    })

    $(document).on('click', '.btn-delete-product-quantity',function () {
        $(this).parents('.clone-product-quantity').remove();
    })

    $('.input-image').on('change', function (event) {
        PRODUCT_ADMIN.displayImagePreview(this);
        PRODUCT_ADMIN.saveImageStorage(event, this);
    })

    PRODUCT_ADMIN.getImageStorage();
})
