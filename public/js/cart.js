/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/cart.js ***!
  \******************************/
(function ($) {
  var qty = $('.quantity'),
      unitPrice = $('.unit-price'),
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
    total.text(result);
  }

  qty.each(function () {
    calculateSubTotal($(this));
    calculateTotal();
  });
  qty.on('change', function () {
    calculateSubTotal($(this));
    calculateTotal();
  });
  qty.on('input', function () {
    calculateSubTotal($(this));
    calculateTotal();
  });
})(jQuery);
/******/ })()
;