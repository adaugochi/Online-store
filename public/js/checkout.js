/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./resources/js/checkout.js ***!
  \**********************************/
(function ($) {
  var amountForEachItem = $('.product-amount'),
      subTotal = $('.cart-sub-amount'),
      subtotalInput = $('.cart-subtotal-input'),
      total = $('.cart-total-amount'),
      totalInput = $('.cart-total-input'),
      deliveryFee = $('.cart-delivery-fee'),
      countryField = $('#country');
  var result = 0;
  amountForEachItem.each(function () {
    result += parseFloat($(this).val());
    subTotal.text(result.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
    subtotalInput.val(result);
  });
  var orderTotal = parseFloat(deliveryFee.text()) + parseFloat(subtotalInput.val());
  total.text('$' + orderTotal.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
  totalInput.val(orderTotal);
  countryField.on('change', function () {
    var orderTotal = parseFloat(deliveryFee.text()) + parseFloat(subtotalInput.val());
    total.text('$' + orderTotal.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
    totalInput.val(orderTotal);
  });
})(jQuery);
/******/ })()
;