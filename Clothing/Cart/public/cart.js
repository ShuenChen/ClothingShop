// NOTE: INTERFACE IS INCOMPLETE, SAMPLE AJAX CALL ONLY
// Bootstrap, jQuery, Vue, React - Go ahead and use the library of your choice

var cart = {
  ajax : function (opt) {
  // ajax() : helper function, do AJAX request
  //   opt.data : data to be sent, an object with key-value pairs
  //   opt.url : target URL
  //   opt.target : (optional) ID of HTML element, put server response in here if provided
  //   opt.load : (optional) function to call when AJAX load is complete

    // Data
    var data = null;
    if (opt.data) {
      data = new FormData();
      for (var d in opt.data) {
        data.append(d, opt.data[d]);
      }
    }

    // AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', opt.url);
    xhr.onload = function(){
      if (xhr.status!=200) {
        alert("AJAX error. Server responded with error code " + xhr.status + " " + xhr.statusText);
      } else {
        if (opt.target) {
          document.getElementById(opt.target).innerHTML = this.response;
        }
        if (typeof opt.load == "function") {
          opt.load(this.response);
        }
      }
    };
    xhr.send(data);
  },

  add : function (id) {
  // add () : add item to cart
  //  id : product ID

    cart.ajax({
      url : "ajax-cart.php",
      data : {
        req : "add",
        product_id : id
      },
      load : function (res) {
        cart.count();
        alert(res);
        /*
        var result = JSON.parse(res);
        if (result.status == true) { OK }
        else { ERROR - alert(result.message); }
        */
      }
    });
  },
  
  count : function () {
  // count() : update items count

    cart.ajax({
      url : "ajax-cart.php",
      data : { req : "count", },
      load : function (res) {
        var result = JSON.parse(res);
        document.getElementById("scCartCount").innerHTML = result['count'];
      }
    });
  },

  toggle : function (reload) {
  // toggle() : show/hide cart
  // PARAM reload : force cart reload?

    var pgPdt = document.getElementById("scProduct"),
        pgCart = document.getElementById("scCart");

    if (reload || pgCart.classList.contains("ninja")) {
      cart.ajax({
        url : "ajax-cart.php",
        data : { req : "show", },
        target : "scCart",
        load : function () {
          pgPdt.classList.add("ninja");
          pgCart.classList.remove("ninja");
        }
      });
    } else {
      pgPdt.classList.remove("ninja");
      pgCart.classList.add("ninja");
    }
  },

  change : function (id) {
  // change() : change quantity

    var qty = document.getElementById("qty_"+id).value;
    cart.ajax({
      url : "ajax-cart.php",
      data : {
        req : "change",
        product_id : id,
        qty : qty
      },
      load : function (res) {
        cart.count();
        cart.toggle(1);
        alert(res);
        /*
        var result = JSON.parse(res);
        if (result.status == true) { OK }
        else { ERROR - alert(result.message); }
        */
      }
    });
  },

  remove : function (id) {
  // remove() : remove item from cart

    document.getElementById("qty_"+id).value = 0;
    cart.change(id);
  },

  checkout : function () {
  // checkout () : checkout

    cart.ajax({
      url : "ajax-cart.php",
      data : {
        req : "checkout",
        // Change to checkout-email if you want an email to be sent on checkout
        // req : "checkout-email",
        name : document.getElementById("co_name").value,
        email : document.getElementById("co_email").value
      },
      load : function (res) {
        cart.count();
        cart.toggle(1);
        alert(res);
        /*
        var result = JSON.parse(res);
        if (result.status == true) { OK - window.location = "THANK-YOU"; }
        else { ERROR - alert(result.message); }
        */
      }
    });
    return false;
  }
};

window.addEventListener("load", cart.count);