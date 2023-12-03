const CATEGORY_ADMIN = (function () {
    let modules = {};

    modules.showCategoryParent = function () {
        $('.block-category-parent').removeClass('d-none');
    }

    modules.hideCategoryParent = function () {
        $('.block-category-parent').addClass('d-none');
    }

    return modules;
})(window.jQuery, window, document);

$(document).ready(() => {
    if ($('.input-category-parent:checked').val() == 0) {
        CATEGORY_ADMIN.hideCategoryParent();
    } else {
        CATEGORY_ADMIN.showCategoryParent();
    }

    $('.input-category-parent').on('change', function () {
        if ($(this).val() == 0) {
            CATEGORY_ADMIN.hideCategoryParent();
        } else {
            CATEGORY_ADMIN.showCategoryParent();
        }
    })
})
