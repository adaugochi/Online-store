(function ($) {
    let amountForEachItem = $('.product-amount'),
        subTotal = $('.cart-sub-amount'),
        subtotalInput = $('.cart-subtotal-input'),
        total = $('.cart-total-amount'),
        totalInput = $('.cart-total-input'),
        deliveryFee = $('.cart-delivery-fee'),
        countryField = $('#country');

    let result = 0;
    amountForEachItem.each(function () {
        result += parseFloat($(this).val())
        subTotal.text(result.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'))
        subtotalInput.val(result)
    })

    let orderTotal = parseFloat(deliveryFee.text()) + parseFloat(subtotalInput.val());
    total.text('$' + orderTotal.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
    totalInput.val(orderTotal);

    countryField.on('change', function () {
        let orderTotal = parseFloat(deliveryFee.text()) + parseFloat(subtotalInput.val());
        total.text('$' + orderTotal.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
        totalInput.val(orderTotal);
    })
})(jQuery)
