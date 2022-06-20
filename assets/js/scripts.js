$(document).ready(function () {
  // Function get data quick view cart
  function get_quick_cart_data() {
    var test;
    $.ajax({
      url: "./user/cart/get-quick-view-cart-data.php",
      type: "POST",
      data: {
        test: test,
      },
      success: function (data) {
        $(".quick-cart").html(data);
      },
    });
  }
  // Get data quick view cart
  get_quick_cart_data();

  // Function get data for cart view
  function get_cart_data() {
    var test;
    $.ajax({
      url: "get-cart-data.php",
      type: "POST",
      data: {
        test: test,
      },
      success: function (data) {
        $("#cart-view").html(data);
      },
    });
  }
  // Get data quick view cart
  get_cart_data();

  //
  function add_to_cart(productID, quantity) {
    $.ajax({
      url: "./user/cart/process-add-to-cart.php",
      type: "POST",
      data: {
        productID: productID,
        quantity: quantity,
      },
      success: function (data) {
        // Create modal alert add to cart success
        var modalAddCartSucc = bootstrap.Modal.getOrCreateInstance(
          document.querySelector(".modal-add-to-cart-success")
        );
        // Show alert add to cart success
        modalAddCartSucc.show();
        // Update quick view cart
        get_quick_cart_data();
        //
        setTimeout(function () {
          modalAddCartSucc.hide();
        }, 3000);
      },
    });
  }
  // Envent click button add to cart in index.php
  $(".btn-add-to-cart").on("click", function () {
    var productID = $(this).data("product_id");
    add_to_cart(productID, "1");
  });

  // Check input quantity
  $("#input-quantity-detail").mouseleave(function () {
    let numPattern = /^[0-9]+$/;
    if (numPattern.test($(this).val()) == false) {
      $(".btn-add-to-cart-detail")
        .attr("disabled", "disabled")
        .css("background", "gray");
      $(this).val("1");
      setTimeout(function () {
        $(".btn-add-to-cart-detail")
          .removeAttr("disabled")
          .css("background", "#3d1a1a");
      }, 2000);
    } else if ($(this).val() > $(this).data("prod_stock")) {
      $(".btn-add-to-cart-detail")
        .attr("disabled", "disabled")
        .css("background", "gray");
      $(this).val($(this).data("prod_stock"));
      setTimeout(function () {
        $(".btn-add-to-cart-detail")
          .removeAttr("disabled")
          .css("background", "#3d1a1a");
      }, 1000);
    }
  });
  // When click button increase quantity
  $("#btn-increase").on("click", function () {
    var currQuantity = $("#input-quantity-detail").val();
    $("#input-quantity-detail").val(parseInt(currQuantity) + 1);
  });
  // When click button decrease quantity
  $("#btn-decrease").on("click", function () {
    var currQuantity = $("#input-quantity-detail").val();
    if (parseInt(currQuantity) > 1) {
      $("#input-quantity-detail").val(parseInt(currQuantity) - 1);
    }
  });

  // Event click button add to cart in detailView.php
  $(".btn-add-to-cart-detail").on("click", function () {
    var quantity = $("#input-quantity-detail").val();
    var productID = $(this).data("product_id");
    add_to_cart(productID, quantity);
  });

  // Scripts for Cart page

  // Event click button select products in cart
  // Select all
  $("#btn-check-all-cart").change(function () {
    if (this.checked) {
      $(".btn-check-shop").prop("checked", true);
      $(".btn-check-product").prop("checked", true);
    } else {
      $(".btn-check-shop").prop("checked", false);
      $(".btn-check-product").prop("checked", false);
    }
  });

  // Select a shop
  $(".btn-check-shop").change(function () {
    if (this.checked) {
      $(".btn-check-product").prop("checked", true);
    } else {
      $("#btn-check-all-cart").prop("checked", false);
      $(".btn-check-product").prop("checked", false);
    }
  });

  // Select a product
  $(document).on("change", ".btn-check-product", function () {
    var prodID = $(this).data("prodid");
    if (this.checked) {
      //
    } else {
      $("#btn-check-all-cart").prop("checked", false);
      $(".btn-check-shop").prop("checked", false);
    }
    //
    update_total_price();
  });

  // Show alert confirm when click button clear cart
  $(document).on("click", ".btn-clear-cart", function () {
    // Create modal confirm clear cart
    var modalConfClearCart = bootstrap.Modal.getOrCreateInstance(
      document.querySelector(".md-conf-remove-from-cart")
    );
    $("#conf-remove-from-cart-content").text(
      "Bạn có muốn xóa tất cả các sản phẩm khỏi giỏ hàng?"
    );
    // Show alert confirm clear cart
    modalConfClearCart.show();
    // Remove all product from cart
    $("#btn-conf-remove-cart").on("click", function () {
      var all = "all";
      $.ajax({
        url: "process-remove-from-cart.php",
        type: "POST",
        data: {
          all: all,
        },
        success: function (data) {},
      });
      //
      modalConfClearCart.hide();
      get_cart_data();
    });
    //
  });

  // Show alert confirm when click button remove a product from cart
  $(document).on("click", ".btn-remove-cart", function () {
    var productID = $(this).data("prodid");
    // Create modal confirm
    var modalConfRmCart = bootstrap.Modal.getOrCreateInstance(
      document.querySelector(".md-conf-remove-from-cart")
    );
    $("#conf-remove-from-cart-content").text(
      "Bạn có muốn xóa sản phẩm khỏi giỏ hàng?"
    );
    // Show alert confirm
    modalConfRmCart.show();
    // Remove product from cart
    $("#btn-conf-remove-cart").on("click", function () {
      $.ajax({
        url: "process-remove-from-cart.php",
        type: "POST",
        data: {
          productID: productID,
        },
        success: function (data) {},
      });
      //
      modalConfRmCart.hide();
      get_cart_data();
    });
    //
  });

  // Function update quantity
  function update_quantity(productID, quantity) {
    $.ajax({
      url: "process-update-quantity.php",
      type: "POST",
      data: {
        quantity: quantity,
        productID: productID,
      },
      success: function (data) {},
    });
  }
  //
  // Function format price
  function format_price(price) {
    var value = price.toString();
    var price_formatted = "";
    var d = 0;
    for (let i = value.length - 1; i >= 0; i--) {
      price_formatted = price_formatted + value[i];
      d++;
      if (d % 3 == 0 && d != value.length) {
        price_formatted = price_formatted + ".";
      }
    }
    //
    price_formatted = price_formatted.split("").reverse().join("");
    return price_formatted;
  }
  //
  function update_amount(productID, price, quantity) {
    var amount = price * quantity;
    $(".amount[data-prodid='" + productID + "']").html(
      format_price(amount) + '<u class="ms-1">đ</u>'
    );
    //
    $(".btn-check-product[data-prodid='" + productID + "']").attr(
      "data-amount",
      parseInt(amount)
    );
  }
  //
  function update_total_price() {
    var num_inp = $(".btn-check-product").length;
    var amount = 0;
    for (let i = 0; i < num_inp; i++) {
      var inp = $(".btn-check-product:eq(" + i + ")");
      if (inp.is(":checked")) {
        amount = amount + parseInt(inp.data("amount"));
      }
    }
    //$(".btn-check-product:eq(0)").data("amount");
    //
    $(".total-price").html(format_price(amount) + '<u class="ms-1">đ</u>');
  }

  // Check input quantity
  $(document).on("change", ".input-quantity-cart", function () {
    let numPattern = /^[0-9]+$/;
    var prodID = $(this).data("prodid");
    var prodPrice = $(this).data("prod_price");
    var stock = $(this).data("prod_stock");

    if (numPattern.test($(this).val()) == false) {
      $(this).val("1");
    } else if ($(this).val() > stock) {
      $(this).val(stock);
    } else if ($(this).val() == 0) {
      $(this).val("1");
    }
    //
    var quantity = $(this).val();
    // Update quantity in database
    update_quantity(prodID, quantity);
    update_amount(prodID, prodPrice, quantity);
    update_total_price();
  });

  // Function Update when quantity is over stock
  function update_all_quantity() {
    setTimeout(function () {
      for (let i = 0; i < $(".input-quantity-cart").length; i++) {
        var object = $(".input-quantity-cart:eq(" + i + ")");
        var prodID = object.data("prodid");
        var stock = object.data("prod_stock");
        if (object.val() > stock) {
          update_quantity(prodID, stock);
          get_cart_data();
        }
      }
    }, 2000);
  }
  // Call func
  update_all_quantity();

  // When click button increase quantity
  $(document).on("click", ".btn-increase-cart", function () {
    var prodID = $(this).data("prodid");
    var prodPrice = $(this).data("prod_price");
    var stock = $(this).data("prod_stock");
    var inpQuantity = $(".input-quantity-cart[data-prodid='" + prodID + "']");
    var currQuantity = inpQuantity.val();
    //
    if (inpQuantity.val() < stock) {
      inpQuantity.val(parseInt(currQuantity) + 1);
    }
    //
    var quantity = inpQuantity.val();
    // Update quantity in database
    update_quantity(prodID, quantity);
    // get_cart_data();
    update_amount(prodID, prodPrice, quantity);
    update_total_price();
  });

  // When click button decrease quantity
  $(document).on("click", ".btn-decrease-cart", function () {
    var prodID = $(this).data("prodid");
    var prodPrice = $(this).data("prod_price");
    var inpQuantity = $(".input-quantity-cart[data-prodid='" + prodID + "']");
    var currQuantity = inpQuantity.val();
    if (parseInt(currQuantity) > 1) {
      inpQuantity.val(parseInt(currQuantity) - 1);
    }
    //
    var quantity = inpQuantity.val();
    // Update quantity in database
    update_quantity(prodID, quantity);
    // get_cart_data();
    update_amount(prodID, prodPrice, quantity);
    update_total_price();
  });

  //
});
