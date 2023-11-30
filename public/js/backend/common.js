const COMMON_ADMIN = (function () {
    const modules = {};

    modules.showLoading = function () {
        $('.js-loading').addClass('loading');
    }

    modules.hideLoading = function () {
        $('.js-loading').removeClass('loading');
    }

    return modules;
})(window.jQuery, window, document);

$(document).ready(() => {
    $('.btn-loading').on('click', function () {
        COMMON_ADMIN.showLoading();
    })
});
