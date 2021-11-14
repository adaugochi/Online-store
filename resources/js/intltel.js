(function ($) {
    let apiKey = "https://api.ipdata.co/?api-key=c1472ac0d8fcf796675b19f34b6d0f179401c54a36f5a2bb443e3ab2";
    let phoneNumber = $(".phone-number");

    function intlTelNumber($this, intlNumber) {
        $this.intlTelInput({
            initialCountry: "auto",
            geoIpLookup: function (callback) {
                $.get(apiKey, function () {
                }, "jsonp").always(function (resp) {
                    //countryCode defaults to Nigeria
                    let countryCode = (resp && resp.country_code) ? resp.country_code : "NG";
                    callback(countryCode);
                });
            },
            hiddenInput: intlNumber,
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js",
            separateDialCode: true,
        });
    }

    intlTelNumber(phoneNumber, "international_number")
})(jQuery);
