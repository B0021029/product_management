<?php
  $user_id = $_GET["user_id"];
  $user_name = $_GET["user_name"];
  $start = $_GET["start"];
  $size = $_GET["size"];
  $goodsName = $_GET["goodsName"];
  $price = $_GET["price"];
  $goodsTypes = $_GET["goodsTypes"];
  $order_date = $_GET["order_date"];
  $order_user = $_GET["order_user"];
  $status = $_GET["status"];
  $delivered_date = $_GET["delivered_date"];

  //var_dump($goodsName);
  //var_dump($price);
  
  

try {

    // データベースに接続
    $pdo = new PDO(
        // ホスト名、データベース名
        'mysql:host=localhost;dbname=order;charset=utf8;',
        // ユーザー名
        'root',
        // パスワード
        '',
        // レコード列名をキーとして取得させる
        [ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ]
    );

    //SQLクエリ作成

    $query_maxID = 'SELECT MAX(product_id) FROM products';
    $stmt_maxID = $pdo->prepare($query_maxID);
    $stmt_maxID->execute();
    $MaxID = $stmt_maxID->fetchAll();
    //var_dump($LastMaxID);
    $LastMaxID = $MaxID[0]["MAX(product_id)"];
    //var_dump($LastMaxID);
    $LastMaxID++;
    //var_dump($LastMaxID);

    //$query = 'SELECT * FROM users WHERE user_id = \'', $user=id, '\' AND password =\'' , $password , '\'';
    $query_Types = 'SELECT goodsType FROM types WHERE types_id = :goodsTypes';
    $stmt_goodsTypes = $pdo->prepare($query_Types);
    $stmt_goodsTypes->bindParam(':goodsTypes', $goodsTypes, PDO::PARAM_INT);
    $stmt_goodsTypes->execute();
    $goodsTypes1 = $stmt_goodsTypes->fetchAll();
    //var_dump($goodsTypes1);
    $goodsTypes2 = $goodsTypes1[0]["goodsType"];
    //var_dump($goodsTypes2);
    


    $query_status = 'SELECT status FROM status WHERE status_id = :status';
    $stmt_status = $pdo->prepare($query_status);
    $stmt_status->bindParam(':status', $status, PDO::PARAM_INT);
    $stmt_status->execute();
    $status1 = $stmt_status->fetchAll();
    //var_dump($status1);
    $status2 = $status1[0]["status"];
    //var_dump($status2);
    

    $query = 'INSERT INTO products VALUES (0, :types_id, :goodsName, :price, :order_date, :order_user, :status_id, :delivered_date)';
 
    // SQL文をセット
    $stmt = $pdo->prepare($query);
    //バインド
    $stmt->bindParam(':types_id', $goodsTypes, PDO::PARAM_INT);
    $stmt->bindParam(':goodsName', $goodsName);
    $stmt->bindParam(':price', $price, PDO::PARAM_INT);
    $stmt->bindParam(':order_date', $order_date);
    $stmt->bindParam(':order_user', $order_user);
    $stmt->bindParam(':status_id', $status, PDO::PARAM_INT);
    $stmt->bindParam(':delivered_date', $delivered_date);

    // SQL文を実行
    $stmt->execute();

    $query2 = 'SELECT * FROM products ORDER BY product_id DESC LIMIT 1';
    $stmt2 = $pdo->prepare($query2);
    $stmt2->execute();
    $result = $stmt2->fetchAll();
    $InsertProduct_id = $result[0]["product_id"];
    $InsertGoodsName = $result[0]["goodsName"];
    $InsertTypes_id = $result[0]["types_id"];
    $InsertOrder_user = $result[0]["order_user"];
    $InsertOrder_date = $result[0]["order_date"];
    $InsertDelivered_date = $result[0]["delivered_date"];
    $InsertStatus_id = $result[0]["status_id"];
    $InsertPrice = $result[0]["price"];
    //var_dump($InsertProduct_id);

    

    if($InsertProduct_id == $LastMaxID) {
        $message = "に新規注文履歴登録しました";
        $product_id = $InsertProduct_id;
        require_once 'Registration_tpl.php';
    }   else  {
        require_once 'exception_tpl.php';
    } 


  } catch (PDOException $e) {
        //例外が発生したら無視
        require_once 'exception_tpl.php';
        echo $e->getMessage();
        exit();
    }



?>

