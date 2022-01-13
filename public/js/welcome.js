/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/welcome.js ***!
  \*********************************/
(function ($) {
  $('#addCart').click(function () {
    var productId = $('#productId').val(),
        productSize = $("select[name='product_size']").val(),
        productQty = $("input[name='quantity']").val();
    $.ajax({
      url: '/cart/add',
      type: 'get',
      data: {
        product_id: productId,
        size: productSize,
        quantity: productQty
      },
      success: function success(data) {
        toastr.success(data['message']);
        $('#cart').html(data['total']);
      },
      error: function error(xhr) {
        var status = xhr.status;
        var err = JSON.parse(xhr.responseText);

        if (status === 422) {
          toastr.error(err.errors.size);
        }

        if (status === 401) {
          window.location.href = "{{ route('login') }}"; //toastr.info('You have to be signed in to be able to add item to cart');
        }
      }
    });
  });
  $('#saveItem').click(function () {
    var productId = $('#productId').val(),
        productSize = $("select[name='product_size']").val(),
        productQty = $("input[name='quantity']").val();
    $.ajax({
      url: '/customer/product/save',
      type: 'post',
      data: {
        product_id: productId,
        size: productSize,
        quantity: productQty
      },
      success: function success(data) {
        toastr.success(data['message']);
      },
      error: function error(xhr) {
        var status = xhr.status;
        var err = JSON.parse(xhr.responseText);

        if (status === 422) {
          console.log(err.errors);
        }

        if (status === 401) {
          window.location.href = "{{ route('login') }}";
        }
      }
    });
  });
})(jQuery);
/******/ })()
;