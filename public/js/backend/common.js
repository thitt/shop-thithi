const COMMON_ADMIN = (function () {
    const modules = {};

    modules.showLoading = function () {
        $('.js-loading').addClass('loading');
    }

    modules.hideLoading = function () {
        $('.js-loading').removeClass('loading');
    }

    modules.handleRecordList = function (number_record) {
        let url = new URL(window.location.href);
        url.searchParams.set('number_record', number_record);
        window.location = url;
    }

    modules.clearDataForm = function (form) {
        $(form).find("input:not(.input-not-reset)").val('');
        $(form).submit();
    }

    modules.sortList = function (element) {
        let url = new URL(window.location.href);
        let key = element.data('sort');
        let sort = 'asc';
        if (element.hasClass('asc')) {
            sort = 'desc';
        }
        url.searchParams.set('sort', sort);
        url.searchParams.set('key', key);
        window.location = url;
    }

    return modules;
})(window.jQuery, window, document);

$(document).ready(() => {
    $('.btn-loading').on('click', function () {
        COMMON_ADMIN.showLoading();
    })

    $('.select-number-record').on('change', function () {
        COMMON_ADMIN.handleRecordList($(this).val());
    })

    $('.btn-clear-form').on('click', function () {
        COMMON_ADMIN.clearDataForm('.form-search');
    })

    $('.btn-delete').on('click', function () {
        let url = $(this).data('url');
        $('.btn-link-delete').attr('href', url);
    })

    $('table .js-icon-sort').on('click', function () {
        COMMON_ADMIN.sortList($(this));
    })
});
