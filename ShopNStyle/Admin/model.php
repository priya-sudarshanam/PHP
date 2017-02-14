<?php
include_once "dao.php";

/**
 * @param $memberid
 * @param $qty
 * @param $productid
 * @param $price
 * @param $status
 * @param $modeofpayment
 * @return bool
 */
function save_to_order_details($memberid, $qty, $productid, $price, $status, $modeofpayment) {
    return dao_save_to_order_details($memberid,$qty,$productid,$price,$status,$modeofpayment);
 }


 function fetch_message($messageid) {
    return dao_fetch_message($messageid);
 }

function update_message($responded,$respondedmessage, $messageid) {
    return dao_update_message($responded,$respondedmessage, $messageid);
}


/**
 * @return array
 */
function load_message() {
    return dao_load_message();}

/**
 * @param $username
 * @return bool
 */
function check_user_exists($username) {
    return dao_check_user_exists($username);
 }

function delete_user($user_id) {
    return dao_delete_user($user_id);
}

/**
 * @param $rolename
 * @return bool|string
 */
function load_role_id($rolename) {
    return dao_load_role_id($rolename);
}

/**
 * @param $firstname
 * @param $lastname
 * @param $username
 * @param $password
 * @param $role
 * @return mixed
 */
function add_new_user($firstname, $lastname, $username, $password, $role) {
    return dao_add_new_user($firstname,$lastname,$username,$password,$role);
 }

/**
 * @return mixed
 */
function load_roles() {
    return dao_load_roles();
 }

/**
 * @param $memberid
 * @param $status
 * @return array
 */
function load_order_details($memberid, $status) {
    return dao_load_order_details($memberid, $status);
}

/**
 * @param $memberid
 * @param $status
 * @return array|string
 */
function load_order_details_for_customer($memberid, $status) {
    return dao_load_order_details_for_customer($memberid, $status);
}

/**
 * @return array
 */
function load_members() {
  return dao_load_members();
}

/**
 * @param $status
 * @return array
 */
function load_order_details_for_status($status) {
    return dao_load_order_details_for_status($status);
}


/**
 * @param $status
 * @return array
 */
function load_order_and_member_details_for_status($status) {
    return dao_load_order_and_member_details_for_status($status);
}

/**
 * @param $status
 * @param $modeOfPayment
 * @param $orderID
 * @return mixed
 */
function update_order_details_admin($status, $modeOfPayment, $orderID) {
    return dao_update_order_details_admin($status, $modeOfPayment, $orderID);
}

/**
 * @return array
 */
function load_users() {
    return dao_load_users();
}

/**
 * @param $orderid
 * @return bool
 */
function delete_item($orderid) {
    return dao_remove_item($orderid);
}

/**
 * @param $productid
 * @return array
 */
function fetch_product_data($productid) {
    return dao_fetch_product_data($productid);
}

/**
 * @param $username
 * @param $password
 * @return bool|string
 */
function user_exists($username, $password) {
    return dao_user_exists($username, $password);
}

/**
 * @return array
 */
function load_all_products() {
    return dao_load_all_products();
}

/**
 * @param $productname
 * @param $productdesc
 * @param $productcategory
 * @param $productoriginate
 * @param $productprice
 * @param $qty
 * @param $location
 * @return bool
 */
function save_product($productname, $productdesc, $productcategory, $productoriginate, $productprice, $qty, $location) {
    return dao_save_product($productname,$productdesc,$productcategory,$productoriginate,$productprice,$qty,$location);
}

/**
 * @param $total
 * @param $productid
 * @return bool
 */
function update_qty($total, $productid) {
    return dao_update_qty($total, $productid);
}

/**
 * @param $productname
 * @param $productdesc
 * @param $productcategory
 * @param $productoriginate
 * @param $productprice
 * @param $qty
 * @param $location
 * @return bool
 */
function update_product($productname, $productdesc, $productcategory, $productoriginate, $productprice, $qty, $location,$productid) {
    return dao_update_product($productname,$productdesc,$productcategory,$productoriginate,$productprice,$qty,$location,$productid);
}

function delete_product($productid) {
    return dao_delete_product($productid);
}

function load_category() {
    return dao_load_category();
}

function load_origin() {
    return dao_load_origin();
}
/**
 * @return string
 */
function createRandomPassword() {
    $chars = "abcdefghijkmnopqrstuvwxyz023456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;
    while ($i <= 7) {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }
    return $pass;
}

/**
 * @param $memberid
 * @return int
 */
function count_orders($memberid) {
    return dao_count_orders($memberid);
}

/**
 * @param $memberid
 * @return array
 */
function load_user($memberid) {
    return dao_load_user($memberid);
}

/**
 * @param $category
 * @return array
 */
function fetch_product_details($category) {
    return dao_fetch_product_details($category);
}

/**
 * @param $productid
 * @param $productstatus
 * @return array
 */
function load_product_details_for_product_id($productid, $productstatus) {
    return dao_load_product_details_for_product_id($productid, $productstatus);
}
/**
 * @param string $name
 * @param string $email
 * @param string $message
 *
 * @return bool contact details saved
 */
function save_contact_details($name,$email,$message) {
   if (validate_email($email) && validate_name($name)) {
        return dao_save_contact_details($name,$email,$message);
   }
    return false;
}

/**
 * @param $firstname
 * @param $lastname
 * @param $email
 * @param $password
 *
 * @return bool
 */
function save_register_details($firstname, $lastname, $email, $password) {
    if (validate_email($email) && validate_name($firstname) && validate_name($lastname) && validate_password($password)) {
        return dao_save_register_details($firstname, $lastname, $email, $password);
    }
    return false;
}

/**
 * @param $password
 * @return bool
 */
function validate_password($password) {
 return ((strlen($password) > 8) && (strlen($password) < 20) && ctype_alnum($password));
}

/**
 * @param $email
 * @return boolean
 */
function validate_email($email) {
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * @param $email
 * @param $password
 */
function get_user_details($email, $password) {
    $email = htmlspecialchars($email);
  $password = htmlspecialchars($password);

  return dao_load_user_details($email,$password);
}

/**
 * @param $name
 * @return boolean
 */
function validate_name($name) {
    $pattern = '/[A-Za-z\s]+/';
    return preg_match($pattern, $name);
}

/**
 * @param $val
 * @return null|string
 */
function clean_vars($val) {
    if(!isset($val)) {
        return null;
    }
    return trim(htmlentities($val, ENT_QUOTES, 'UTF-8'));
}
?>
