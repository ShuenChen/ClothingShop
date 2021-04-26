<?php
/* (A) CART CORE LIBRARY */
class CartCore {
  public $pdo = null;
  public $stmt = null;
  public $error = "";
  public $lastID = null;

  function __construct() {
  // __construct() : connect to database

    try {
      $str = "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET;
      if (defined('DB_NAME')) { $str .= ";dbname=" . DB_NAME; }
      $this->pdo = new PDO(
        $str, DB_USER, DB_PASSWORD, [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_EMULATE_PREPARES => false
        ]
      );
      return true;
    } catch (Exception $ex) {
      print_r($ex); die();
    }
  }

  function __destruct() {
  // __destruct() : auto close database connection

    if ($this->stmt !== null) { $this->stmt = null; }
    if ($this->pdo !== null) { $this->pdo = null; }
  }

  function extend ($module="") {
  // extend() : extend the cart core
  //  $module : module to extend

    require PATH_LIB . "lib-" . $module . ".php";
    $this->$module = new $module($this);
  }

  function exec($sql, $data=null) {
  // exec() : run insert, replace, update, delete query
  //  $sql : SQL query
  //  $data : array of data
 
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($data);
      $this->lastID = $this->pdo->lastInsertId();
    } catch (Exception $ex) {
      $this->error = $ex;
      return false;
    }
    $this->stmt = null;
    return true;
  }

  function fetch($sql, $cond=null, $key=null, $value=null) {
  // fetch() : perform select query & optionally sort results
  //  $sql : SQL query
  //  $cond : array of conditions
  //  $key : sort in this $key=>data order, optional
  //         pass in -1 if single row result expected
  //  $value : $key must be provided, sort in $key=>$value order

    $result = false;
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($cond);
      if ($key == -1) {
        $result = $this->stmt->fetch();
      } else if (isset($key)) {
        $result = array();
        if (isset($value)) {
          while ($row = $this->stmt->fetch(PDO::FETCH_NAMED)) {
            $result[$row[$key]] = $row[$value];
          }
        } else {
          while ($row = $this->stmt->fetch(PDO::FETCH_NAMED)) {
            $result[$row[$key]] = $row;
          }
        }
      } else {
        $result = $this->stmt->fetchAll();
      }
    } catch (Exception $ex) {
      $this->error = $ex;
      return false;
    }
    $this->stmt = null;
    return $result;
  }
}

/* (B) SETTINGS & INIT */
/* (B1) DATABASE - ! CHANGE THESE TO YOUR OWN ! */
define('DB_HOST', 'localhost');
define('DB_NAME', 'test');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

/* (B2) MUTE NOTIFICATIONS */
error_reporting(E_ALL & ~E_NOTICE);

/* (B3) AUTO PATH */
// Manually define the absolute path if you get path problems
define('PATH_LIB', __DIR__ . DIRECTORY_SEPARATOR);

/* (B4) CART SETTINGS */
define('CART_MAX', 99);

/* (B5) START SESSION */
session_start();
if (!is_array($_SESSION['cart'])) { $_SESSION['cart'] = []; }

/* (B6) INIT CORE */
$_CC = new CartCore();