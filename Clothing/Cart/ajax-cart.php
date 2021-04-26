<?php
/* (A) INIT */
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "core.php";
$_CC->extend("Cart");

switch ($_POST['req']) {
  /* (B) INVALID REQUEST */
  default:
    echo "INVALID REQUEST";
    break;

  /* (C) ADD ITEM TO CART */
  case "add":
    $pass = $_CC->Cart->add($_POST['product_id'], 1);
    echo json_encode([
      "status" => $pass,
      "message" => $pass ? "Item added to cart" : $_CC->error
    ]);
    break;

  /* (D) CHANGE QTY */
  case "change":
    $pass = $_CC->Cart->change($_POST['product_id'], $_POST['qty']);
    echo json_encode([
      "status" => $pass,
      "message" => $pass ? "Quantity updated" : $_CC->error
    ]);
    break;

  /* (E) COUNT TOTAL NUMBER OF ITEMS */
  case "count":
    echo json_encode([
      "status" => 1,
      "count" => $_CC->Cart->count()
    ]);
    break;

  /* (F) SHOW CART */
  case "show":
    $products = $_CC->Cart->getAll();
    $sub = 0;
    $total = 0; ?>
    <h1>MY CART</h1>
    <table id="scTable">
      <tr>
        <th>Remove</th>
        <th>Qty</th>
        <th>Item</th>
        <th>Price</th>
      </tr>
      <?php
      if (count($_SESSION['cart'])>0) {
      foreach ($_SESSION['cart'] as $id => $qty) {
        $sub = $qty * $products[$id]['product_price'];
        $total += $sub; ?>
      <tr>
        <td>
          <input class="scDel bRed" type="button" value="X" onclick="cart.remove(<?= $id ?>);"/>
        </td>
        <td><input id='qty_<?= $id ?>' onchange='cart.change(<?= $id ?>);' type='number' value='<?= $qty ?>'/></td>
        <td><?= $products[$id]['product_name'] ?></td>
        <td><?= sprintf("RM%0.2f", $sub) ?></td>
      </tr>
      <?php }} else { ?>
      <tr><td colspan="3">Cart is empty</td></tr>
      <?php } ?>
      <tr>
        <td colspan="2"></td>
        <td><strong>Grand Total</strong></td>
        <td><strong><?= sprintf("RM%0.2f", $total) ?></strong></td>
      </tr>
    </table>
    <?php if (count($_SESSION['cart']) > 0) { ?>
    <form id="scCheckout" onsubmit="return cart.checkout();">
      <h1>CHECKOUT</h1>
      <label>Name</label>
      <input type="text" id="co_name" required value=""/>
      <label>Email</label>
      <input type="email" id="co_email" required value=""/>
      <input type="submit" class="bRed" value="Checkout"/>
    </form>
    <?php }
    break;

  /* (G) CHECKOUT */
  case "checkout":
    // NOTE: You might want to do more security checks + payment here
    $pass = $_CC->Cart->checkout($_POST['name'], $_POST['email']);
    echo json_encode([
      "status" => $pass,
      "message" => $pass ? "Order confirmed" : $_CC->error
    ]);
    break;
  
  /* (H) ALTERNATIVE CHECKOUT - SEND EMAIL */
  case "checkout-email":
    $pass = $_CC->Cart->checkout($_POST['name'], $_POST['email']);
    if ($pass) {
      $pass= $_CC->Cart->emailOrder($_CC->orderID);
    }
    echo json_encode([
      "status" => $pass,
      "message" => $pass ? "Order confirmed" : $_CC->error
    ]);
    break;
}