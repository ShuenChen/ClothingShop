<?php
class Products {
  // "Link" to parent core
  private $core = null;
  function __construct ($core) {
    $this->core = $core;
  }

  function getAll () {
  // getAll () : get all products

    return $this->core->fetch(
      "SELECT * FROM `products`", 
      null, "product_id"
    );
  }

  function get ($id) {
  // getAll () : get specified product

    return $this->core->fetch(
      "SELECT * FROM `products` WHERE `product_id`=?", 
      [$id], -1
    );
  }
}