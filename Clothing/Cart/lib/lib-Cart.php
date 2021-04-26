<?php
class Cart {
  // "Link" to parent core
  private $core = null;
  function __construct ($core) {
    $this->core = $core;
  }

  function add ($id, $qty) {
  // add() : add item to cart
  //  $id : product id
  //  $qty : quantity to add

    // Check ID and qty
    if (!is_numeric($id) || !is_numeric($qty)) {
      $this->core->error = "Invalid product ID or quantity";
      return flase;
    }

    // Add to cart
    if (is_numeric($_SESSION['cart'][$id])) {
      $_SESSION['cart'][$id] += $qty;
    } else {
      $_SESSION['cart'][$id] = $qty;
    }

    // Over max
    if ($_SESSION['cart'][$id] > CART_MAX) {
      $_SESSION['cart'][$id] = CART_MAX;
    }

    // OK
    return true;
  }

  function change ($id, $qty) {
  // change() : change product quantity
  //  $id : product id
  //  $qty : quantity to add (0 to remove item)

    // Check ID and qty
    if (!is_numeric($id) || !is_numeric($qty)) {
      $this->core->error = "Invalid product ID or quantity";
      return flase;
    }

    // Change quantity
    if ($qty == 0) {
      unset($_SESSION['cart'][$id]);
    } else {
      $_SESSION['cart'][$id] = $qty;
    }

    // Over max
    if ($_SESSION['cart'][$id] > CART_MAX) {
      $_SESSION['cart'][$id] = CART_MAX;
    }

    // OK
    return true;
  }

  function count () {
  // count() : count items in cart

    $total = 0;
    if (count($_SESSION['cart'])>0) {
      foreach ($_SESSION['cart'] as $id => $qty) {
        $total += $qty;
      }
    }
    return $total;
  }

  function getAll () {
  // getAll() : get all items in cart

    // Empty
    if (count($_SESSION['cart'])==0) {
      return false;
    }

    // Get products in cart
    $sql = "SELECT * FROM `products` WHERE `product_id` IN (";
    $sql .= str_repeat('?,', count($_SESSION['cart']) - 1) . '?';
    $sql .= ")";
    return $this->core->fetch($sql, array_keys($_SESSION['cart']), "product_id");
  }

  function checkout ($name, $email) {
  // checkout() : checkout, create new order
  //  $name : customer's name
  //  $email : customer's email address

    // Auto commit off
    $this->core->pdo->beginTransaction();

    // Create new order
    $pass = $this->core->exec(
      "INSERT INTO `orders` (`order_name`, `order_email`) VALUES (?, ?)",
      [$name, $email]
    );

    // Insert the items
    if ($pass) {
      $this->core->orderID = $this->core->lastID;
      $sql = "INSERT INTO `orders_items` (`order_id`, `product_id`, `quantity`) VALUES ";
      $cond = [];
      foreach ($_SESSION['cart'] as $id=>$qty) {
        $sql .= "(?, ?, ?),";
        array_push($cond, $this->core->orderID, $id, $qty);
      }
      $sql = substr($sql, 0, -1) . ";";
      $pass = $this->core->exec($sql, $cond);
    }

    // Finalize
    if ($pass) { 
      $this->core->pdo->commit(); 
      $_SESSION['cart'] = []; // Empty cart
    }
    else { $this->core->pdo->rollBack(); }
    return $pass;
  }

  function emailOrder ($id) {
  // emailOrder () : email order to client
  //  $id : order ID

    // Get order
    $order = $this->core->fetch(
      "SELECT * FROM `orders` WHERE `order_id`=?", [$id], -1
    );
    if (!is_array($order)) {
      $this->core->error = "Invalid order";
      return false;
    }

    // Get items
    $order['items'] = $this->core->fetch(
      "SELECT * FROM `orders_items` LEFT JOIN `products` USING (`product_id`) WHERE `orders_items`.order_id=?", 
      [$id], "product_id"
    );
    
    // Format this email message as you see fit
    $to = $order['order_email'];
    $subject = "Order Received";
    $message = "Dear " . $order['order_name'] . ",<br>";
    $message .= "Thank you and we have received your order.<br>";
    foreach ($order['items'] as $pid=>$p) {
      $message .= $p['product_name'] . " - " . $p['quantity'] . "<br>";
    }
    $headers = implode("\r\n", [
      'MIME-Version: 1.0',
      'Content-type: text/html; charset=utf-8',
      'From: john@doe.com'
    ]);

    // Send email
    if (@mail($to, $subject, $message, $headers)) {
      return true;
    } else {
      $this->error = "Error sending email";
      return false;
    }
  }
}