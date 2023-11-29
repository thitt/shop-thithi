const COMMON = (function () {
    const modules = {};

    modules.showPassword = function (element) {
        if (element.find('.input-password').attr("type") == "text"){
            element.find('.input-password').attr('type', 'password');
            element.find('.icon-show-password').addClass( "icon-eye-slash" );
            element.find('.icon-show-password').removeClass( "icon-eye" );
        } else if(element.find('.input-password').attr("type") == "password"){
            element.find('.input-password').attr('type', 'text');
            element.find('.icon-show-password').removeClass( "icon-eye-slash" );
            element.find('.icon-show-password').addClass( "icon-eye" );
        }
    }

    return modules;
})(window.jQuery, window, document);

$(document).ready(() => {
    $(".icon-show-password").on('click', function(event) {
        event.preventDefault();
        COMMON.showPassword($(this).parent());
    });
});
