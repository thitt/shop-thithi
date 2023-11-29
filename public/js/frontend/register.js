const REGISTRATION = (function () {
    const modules = {};

    modules.callAPI = function (api) {
        return axios.get(api)
            .then((response) => {
                modules.renderData(response.data, "city");
            });
    }

    modules.callApiDistrict = function (api) {
        return axios.get(api)
            .then((response) => {
                modules.renderData(response.data.districts, "district");
            });
    }

    modules.renderData = function (array, select) {
        let row = ' <option value="" selected>Chọn</option>';
        array.forEach(element => {
            row += `<option value="${element.code}">${element.name}</option>`
        });
        document.querySelector("#" + select).innerHTML = row;
        $("#" + select).val($('input[name="' + select + '"]').val());
    }

    modules.setDistrict = function (city_code) {
        let host = "https://provinces.open-api.vn/api/";
        if (city_code) {
            modules.callApiDistrict(host + "p/" + city_code + "?depth=2");
        } else {
            $("#district").html('<option value="" selected>Chọn</option>');
        }
    }

    return modules;
})(window.jQuery, window, document);

$(document).ready(() => {
    let city_code_old = $('input[name="city"]').val();
    REGISTRATION.callAPI('https://provinces.open-api.vn/api/?depth=1');
    REGISTRATION.setDistrict(city_code_old);

    $("#city").change(() => {
        let city_code = $("#city").find(':selected').val();
        REGISTRATION.setDistrict(city_code);
        $('input[name="city"]').val(city_code);
    });

    $("#district").change(() => {
        let district_code = $("#district").find(':selected').val();
        $('input[name="district"]').val(district_code);
    });
});
