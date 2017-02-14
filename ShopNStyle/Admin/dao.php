<?php
include_once "dbconnect.php";

$conn = connect();


/**
 * @param $status
 * @return array
 */
function dao_load_order_details_for_status($status) {
    global $conn ;
    $sql = 'SELECT  OrderID,
                    MemberID,
                    Qty,
                    Price,
                    ProductID,
                    Status,
                    ModeOfPayment,
                    TransactionCode
            FROM db_project.dbo.OrderDetails WITH (NOLOCK)
            WHERE Status = :status';

    $statement = $conn->prepare($sql);
    $statement->bindValue(':status', $status);
    $success = $statement->execute();

    if ($success) {
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }
    return [];
}

/**
 * Fetches product details for the given product category
 * @param string $pcategory Product Category eg: handbag, travel bag
 * @return array
 */
function dao_fetch_product_details($pcategory)
{
    global $conn ;
    $sql = "SELECT ProductID,
                   PName,
                   PDescription,
                   PCategory,
                   PPrice,
                   Location,
                   Quantity,
                   Originated              
            FROM db_project.dbo.tb_products WITH (NOLOCK)
            WHERE PCategory = :pcategory";

    $statement = $conn->prepare($sql);

    $statement->bindValue(':pcategory', $pcategory);
    $success = $statement->execute();
    if ($success) {
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }
    return [];
}

function dao_load_all_products() {
    global $conn ;
    $sql = "SELECT ProductID,
                   PName,
                   PDescription,
                   PCategory,
                   Originated,
                   PPrice,
                   Location,
                   Quantity              
            FROM db_project.dbo.tb_products 
            WITH (NOLOCK)";

    $statement = $conn->prepare($sql);
    $success = $statement->execute();
    if ($success) {
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }
    return [];
}

function dao_fetch_product_data($productid)
{
    global $conn ;
    $sql = "SELECT ProductID,
                   PName,
                   PDescription,
                   PCategory,
                   PPrice,
                   Originated,
                   Location,
                   Quantity
              
            FROM db_project.dbo.tb_products WITH (NOLOCK)
            WHERE ProductID = :productid";

    $statement = $conn->prepare($sql);

    $statement->bindValue(':productid', $productid, PDO::PARAM_INT);
    $success = $statement->execute();
    if ($success) {
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }
    return [];
}

function dao_save_contact_details($name,$email,$message) {
    global $conn ;
    $sql = 'INSERT INTO db_project.dbo.Messages(Name,Email,Message) 
            VALUES (:name, :email, :message)';

    $statement = $conn->prepare($sql);

    $statement->bindValue(':name', $name);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':message', $message);

    $success = $statement->execute();
    return $success;
}

/**
 * @param $firstname
 * @param $lastname
 * @param $email
 * @param $password
 * @return bool
 */
function dao_save_register_details($firstname, $lastname, $email, $password) {
    global $conn ;
    $sql = 'INSERT INTO db_project.dbo.Member(Firstname,Lastname,Email,MPassword) 
            VALUES (:firstname, :lastname, :email,:pword)';

    $statement = $conn->prepare($sql);
    $statement->bindValue(':firstname', $firstname);
    $statement->bindValue(':lastname', $lastname);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':pword',hash('sha1',$password));

   $success = $statement->execute();
   return $success;
}

function dao_add_new_user($firstname,$lastname,$username,$password,$roleid) {
    global $conn ;
    $sql = 'INSERT INTO db_project.dbo.TB_User(Username, Password, FirstName,Lastname, RoleId) 
            VALUES (:username, :pword, :firstname, :lastname, :roleid)';

    $statement = $conn->prepare($sql);
    $statement->bindValue(':firstname', $firstname);
    $statement->bindValue(':lastname', $lastname);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':roleid', $roleid);
    $statement->bindValue(':pword',hash('sha1',$password));

    $success = $statement->execute();
    return $success;

}

function dao_load_user_details($email, $password) {
    global $conn ;
    $sql = 'SELECT * FROM db_project.dbo.Member WITH (NOLOCK)
            WHERE Email = :email 
            AND MPassword = :pword';

    $statement = $conn->prepare($sql);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':pword',hash('sha1',$password));
    $success = $statement->execute();

    if ($success) {
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }
    return [];
}

/**
 * @param $productid
 * @param $productstatus
 *
 * @return array
 */
function dao_load_product_details_for_product_id($productid, $productstatus) {
    global $conn ;
    $sql = 'SELECT ProductID, SUM(qty) AS Qty 
            FROM db_project.dbo.OrderDetails WITH (NOLOCK)
            WHERE ProductID = :productid
            AND Status = :status
            GROUP BY ProductID';

    $statement = $conn->prepare($sql);
    $statement->bindValue(':productid', $productid, PDO::PARAM_INT);
    $statement->bindValue(':status', $productstatus);
    $success = $statement->execute();

    if ($success) {
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }
    return [];
}

/**
 * @param $memberid
 * @return array
 */
function dao_load_user($memberid) {
    global $conn ;
    $sql = 'SELECT MemberID,
                   Firstname,
                   Lastname,
                   Email
            FROM db_project.dbo.Member WITH(NOLOCK)
            WHERE MemberID = :memberid';

    $statement = $conn->prepare($sql);
    $statement->bindValue(':memberid', $memberid, PDO::PARAM_INT);
    $success = $statement->execute();

    if ($success) {
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }
    return [];
}

/**
 * @param $memberid
 * @return int
 */
function dao_count_orders($memberid) {
    global $conn ;

    $sql = 'SELECT *
            FROM db_project.dbo.OrderDetails WITH (NOLOCK)
            WHERE MemberID= :memberid
            AND Status=\'Pending\'';

    $statement = $conn->prepare($sql);
    $statement->bindValue(':memberid', $memberid);
    $success = $statement->execute();

    if ($success) {
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $result = $statement->fetchAll();
        return count($result);
    }
    return 0;
}


/**
 * @param $memberid
 * @param $status
 * @return array
 */
function dao_load_order_details($memberid, $status) {
    global $conn ;

    $sql = 'SELECT *
            FROM db_project.dbo.OrderDetails WITH (NOLOCK)
            WHERE MemberID= :memberid
            AND Status=:status';

    $statement = $conn->prepare($sql);
    $statement->bindValue(':memberid', $memberid);
    $statement->bindValue(':status', $status);
    $success = $statement->execute();

    if ($success) {
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }
    return [];
}

function dao_load_order_details_for_customer($memberid, $status) {
    global $conn ;

    $sql = 'SELECT sum(Qty * Price) AS Total
            FROM db_project.dbo.OrderDetails WITH (NOLOCK)
            WHERE MemberID= :memberid
            AND Status=:status';

    $statement = $conn->prepare($sql);
    $statement->bindValue(':memberid', $memberid);
    $statement->bindValue(':status', $status);
    $success = $statement->execute();

    if ($success) {
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchColumn();
    }
    return [];
}

function dao_save_to_order_details($memberid,$qty,$productid,$price,$status,$modeofpayment) {
    global $conn ;
    $sql = 'INSERT INTO db_project.dbo.OrderDetails(MemberID,Qty,ProductID,Price,Status,ModeOfPayment,TransactionCode) 
            VALUES(:memberid,:quantity,:productid,:price,:status,:modeofpayment,:transactioncode);';

    $statement = $conn->prepare($sql);
    $statement->bindValue(':memberid', $memberid);
    $statement->bindValue(':quantity', $qty);
    $statement->bindValue(':productid', $productid);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':status', $status);
    $statement->bindValue(':modeofpayment', $modeofpayment);
    $statement->bindValue(':transactioncode','online');
    return $statement->execute();
}

function dao_remove_item($orderid) {
    global $conn ;
    $sql = 'DELETE FROM db_project.dbo.OrderDetails
            WHERE OrderID=:orderid';

    $statement = $conn->prepare($sql);
    $statement->bindValue(':orderid', $orderid);

    return $statement->execute();
}

function dao_load_role_id($rolename) {
    global $conn ;
    $sql='SELECT r.RoleId AS Role_Id
          FROM db_project.dbo.Roles r WITH (NOLOCK)
          WHERE RoleName = :rolename';

    $statement = $conn->prepare($sql);
    $statement->bindValue(':rolename', $rolename);
    $success = $statement->execute();
    if ($success) {
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchColumn();
    }

    return false;
}

function dao_user_exists($username, $password) {
    global $conn ;
    $sql='SELECT r.RoleId as Role_Id
          FROM db_project.dbo.TB_User u WITH (NOLOCK)
          INNER JOIN db_project.dbo.Roles r WITH (NOLOCK) ON u.RoleId = r.RoleId
          WHERE username = :username 
            AND password = :password';

    $statement = $conn->prepare($sql);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $success = $statement->execute();
    if ($success) {
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchColumn();
    }

    return false;
}


/**
 * @param $total
 * @param $productid
 * @return bool
 */
function dao_update_qty($total, $productid) {
    global $conn ;
    $sql='UPDATE db_project.dbo.TB_Products 
          SET Quantity = :total 
          WHERE ProductID = :productid';

    $statement = $conn->prepare($sql);
    $statement->bindValue(':total', $total);
    $statement->bindValue(':productid', $productid);
    return $statement->execute();
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
function dao_save_product($productname, $productdesc, $productcategory, $productoriginate, $productprice, $qty, $location) {
    global $conn ;
    $sql = 'INSERT INTO db_project.dbo.TB_Products(PName,PDescription,PCategory,Originated,PPrice,Quantity,Location)
                                           values (:pname,:pdesc,:pcategory,:poriginate,:pprice,:quantity,:location)
                                ';
    $statement = $conn->prepare($sql);
    $statement->bindValue(':pname', $productname);
    $statement->bindValue(':pdesc', $productdesc);
    $statement->bindValue(':pcategory', $productcategory);
    $statement->bindValue(':poriginate', $productoriginate);
    $statement->bindValue(':pprice', $productprice);
    $statement->bindValue(':quantity', $qty);
    $statement->bindValue(':location', $location);

    return $statement->execute();
}

/**
 * @param $productid
 * @return bool
 */
function dao_delete_product($productid) {
    global $conn;
    $sql='DELETE FROM db_project.dbo.TB_Products 
          WHERE ProductID=:productid';

    $statement = $conn->prepare($sql);
    $statement->bindValue(':productid', $productid);
    return $statement->execute();
}

/**
 * @param $productname
 * @param $productdesc
 * @param $productcategory
 * @param $productoriginate
 * @param $productprice
 * @param $qty
 * @param $location
 * @param $productid
 * @return bool
 */
function dao_update_product($productname, $productdesc, $productcategory, $productoriginate, $productprice, $qty, $location, $productid) {
    global $conn;
    $sql = 'UPDATE db_project.dbo.TB_Products 
            SET PName = :pname,
                PDescription = :pdesc,
                PCategory= :pcategory,
                Originated = :poriginate,
                PPrice = :pprice,
                Quantity=:qty,
                Location=:location
            WHERE ProductID=:productid';

    $statement = $conn->prepare($sql);
    $statement->bindValue(':pname', $productname);
    $statement->bindValue(':pdesc', $productdesc);
    $statement->bindValue(':pcategory', $productcategory);
    $statement->bindValue(':poriginate', $productoriginate);
    $statement->bindValue(':pprice', $productprice);
    $statement->bindValue(':qty', $qty);
    $statement->bindValue(':location', $location);
    $statement->bindValue(':productid', $productid);

    return $statement->execute();
}

/**
 * @return array
 */
function dao_load_category() {
    global $conn;
    $sql = 'SELECT CategoryName
            FROM db_project.dbo.Category WITH(NOLOCK)';

    $statement = $conn->prepare($sql);
    $success = $statement->execute();
    if ($success) {
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }

    return [];
}

/**
 * @return array
 */
function dao_load_origin() {
    global $conn;
    $sql = 'SELECT OriginName
            FROM db_project.dbo.Origin WITH(NOLOCK)';

    $statement = $conn->prepare($sql);
    $success = $statement->execute();

    if ($success) {
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }

    return [];
}

function dao_load_members() {
    global $conn;
    $sql = 'SELECT MemberID,
                   Firstname,
                   Lastname,
                   Email                  
            FROM db_project.dbo.Member WITH (NOLOCK)';

    $statement = $conn->prepare($sql);
    $success = $statement->execute();

    if ($success) {
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }

    return [];
}

/**
 * @return array
 */
function dao_load_users() {
    global $conn;
    $sql = 'SELECT UserID,
                   Username,
                   FirstName,
                   LastName,
                   r.RoleName as Rolename            
            FROM db_project.dbo.TB_User u WITH (NOLOCK) JOIN db_project.dbo.Roles r
            ON u.RoleId = r.RoleId';

    $statement = $conn->prepare($sql);
    $success = $statement->execute();

    if ($success) {
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }

    return [];
}

/**
 * @param $status
 * @return array
 */
function dao_load_order_and_member_details_for_status($status) {
    global $conn ;
    $sql = 'SELECT  OrderID,
                    od.MemberID,
                    Qty,
                    Price,
                    od.ProductID,
                    Status,
                    ModeOfPayment,
                    TransactionCode,
                    p.PName,
                    m.Lastname AS LastName,
                    m.Firstname AS FirstName
            FROM db_project.dbo.OrderDetails od WITH (NOLOCK)
            INNER JOIN db_project.dbo.Member m WITH (NOLOCK) ON od.MemberID = m.MemberID
            INNER JOIN db_project.dbo.TB_Products p WITH (NOLOCK) ON od.ProductID = p.ProductID
            WHERE Status = :status';

    $statement = $conn->prepare($sql);
    $statement->bindValue(':status', $status);
    $success = $statement->execute();

    if ($success) {
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }
    return [];
}

function dao_update_order_details_admin($status, $modeOfPayment, $orderID) {
    global $conn ;
    $sql='UPDATE db_project.dbo.OrderDetails 
          SET Status = :status,
              ModeOfPayment = :modeOfPayment
          WHERE OrderID = :orderid';

    $statement = $conn->prepare($sql);
    $statement->bindValue(':status', $status);
    $statement->bindValue(':modeOfPayment', $modeOfPayment);
    $statement->bindValue(':orderid', $orderID, PDO::PARAM_INT);
    return $statement->execute();
}

function dao_load_roles() {
    global $conn ;
    $sql='SELECT RoleId, RoleName
          FROM db_project.dbo.Roles WITH(NOLOCK)';

    $statement = $conn->prepare($sql);
    $success = $statement->execute();
    if ($success) {
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }
    return [];
}

function dao_check_user_exists($username) {
    global $conn ;
    $sql='SELECT COUNT(1)
          FROM db_project.dbo.TB_User WITH(NOLOCK)
          WHERE Username = :username';

    $statement = $conn->prepare($sql);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $rows = $statement->fetchColumn(0);
    return ($rows > 0);
}

function dao_delete_user($user_id) {
    global $conn ;
    $sql='DELETE FROM db_project.dbo.TB_User
          WHERE UserID=:user_id';

    $statement = $conn->prepare($sql);
    $statement->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();
    $rows = $statement->rowCount();
    return ($rows > 0);
}

function dao_load_message() {
    global $conn ;
    $sql = 'SELECT *
            FROM db_project.dbo.Messages WITH (NOLOCK)
            ORDER BY MessageID';

    $statement = $conn->prepare($sql);
    $success = $statement->execute();

    if ($success) {
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }
    return [];
}


function dao_fetch_message($messageid) {
    global $conn ;
    $sql = 'SELECT *
            FROM db_project.dbo.Messages WITH (NOLOCK)
            WHERE MessageID = :messageid
            ORDER BY MessageID';

    $statement = $conn->prepare($sql);
    $statement->bindValue(':messageid', $messageid);
    $success = $statement->execute();

    if ($success) {
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }
    return [];
}


function dao_update_message($responded,$respondedmessage, $messageid) {
    global $conn ;
    $sql='UPDATE db_project.dbo.Messages 
          SET Responded = :responded ,
              RespondedMessage = :respondedmessage
          WHERE MessageID = :messageid';

    $statement = $conn->prepare($sql);
    $statement->bindValue(':responded', $responded, PDO::PARAM_BOOL);
    $statement->bindValue(':respondedmessage', $respondedmessage);
    $statement->bindValue(':messageid', $messageid, PDO::PARAM_INT);
    $statement->execute();
    $rows = $statement->rowCount();
    return ($rows > 0);
}
?>