/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/cart.js ***!
  \******************************/
(function ($) {
  var qty = $('.quantity'),
      size = $('.size'),
      subTotalPrice = $('.subtotal'),
      total = $('.total-amount');

  function calculateSubTotal($this) {
    var parent = $this.closest('.product-quantity');
    var price = parent.siblings('.product-price').find('.unit-price').text();
    var qty = $this.val();
    var subTotal = parent.siblings('.product-subtotal').find('.subtotal');
    subTotal.text(parseFloat(qty) * parseFloat(price));
  }

  function calculateTotal() {
    var result = 0;
    subTotalPrice.each(function () {
      result += parseFloat($(this).text());
    });
    total.text(result.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
  }

  function update($this) {
    var className = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '.cart-qty';
    $this.closest('.cart_row').find(className).val($this.val());
    $this.closest('.cart_row').find('.cart-form').trigger('submit');
  }

  qty.each(function () {
    calculateSubTotal($(this));
    calculateTotal();
  });
  qty.on('change', function () {
    update($(this));
    calculateSubTotal($(this));
    calculateTotal();
  });
  qty.on('input', function () {
    update($(this));
    calculateSubTotal($(this));
    calculateTotal();
  });
  size.on('change', function () {
    update($(this), '.cart-size');
  });
})(jQuery);
/******/ })()
;