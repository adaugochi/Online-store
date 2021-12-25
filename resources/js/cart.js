(function ($) {
    let qty = $('.quantity'),
        size = $('.size'),
        removeItem = $('.cart-remove'),
        subTotalPrice = $('.subtotal'),
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
        total.text(result.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'))
    }

    function update($this, className = '.cart-qty') {
        $this.closest('.cart_row').find(className).val($this.val())
        $this.closest('.cart_row').find('.cart-form').trigger('submit');
    }

    qty.each(function () {
        calculateSubTotal($(this));
        calculateTotal()
    })

    qty.on('change', function () {
        update($(this));
        calculateSubTotal($(this));
        calculateTotal();
    })

    qty.on('input', function () {
        update($(this));
        calculateSubTotal($(this));
        calculateTotal();
    })

    size.on('change', function () {
        update($(this), '.cart-size');
    })

    removeItem.on('click', function () {
        $(this).closest('.cart_row').find('.cart-remove-form').trigger('submit');
    })
})(jQuery)
