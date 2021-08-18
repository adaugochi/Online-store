(function ($) {
    let qty = $('.quantity'),
        unitPrice = $('.unit-price'),
        subTotalPrice = $('.subtotal')
        total = $('.total-amount');

    function calculateSubTotal($this) {
        let parent = $this.closest('.product-quantity');
        let price = parent.siblings('.product-price').find('.unit-price').text()
        let qty = $this.val();
        let subTotal = parent.siblings('.product-subtotal').find('.subtotal')
        subTotal.text(parseFloat(qty) * parseFloat(price));
    }

    function calculateTotal() {
        let result = 0;
        subTotalPrice.each(function () {
            result += parseFloat($(this).text())
        })
        total.text(result)
    }

    qty.each(function () {
        calculateSubTotal($(this));
        calculateTotal()
    })


    qty.on('change', function () {
        calculateSubTotal($(this))
        calculateTotal()
    })

    qty.on('input', function () {
        calculateSubTotal($(this))
        calculateTotal()
    })
})(jQuery)
