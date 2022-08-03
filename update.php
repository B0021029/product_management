<?php
  $user_id = $_GET["user_id"];
  $user_name = $_GET["user_name"];
  $start = $_GET["start"];
  $size = $_GET["size"];
  $product_id = $_GET["product_id"];
  $command = $_GET["command"];
  var_dump($command);

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


        //変更注文履歴検索コード
    $query = 'SELECT * FROM products WHERE product_id = :product_id';

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
    $stmt->execute();
        
    foreach ($stmt as $row) {
        $product_id = $row["product_id"];
        $types_id = $row["types_id"];
        $goodsName = $row["goodsName"];
        $price =$row["price"];
        $order_date = $row["order_date"];
        $order_user = $row["order_user"];
        $status_id = $row["status_id"];
        $delivered_date = $row["delivered_date"];
        //var_dump($types_id);
        //var_dump($status_id);
    }

    $query_Types = 'SELECT goodsType FROM types WHERE types_id = :types_id';
    $stmt_goodsTypes = $pdo->prepare($query_Types);
    $stmt_goodsTypes->bindParam(':types_id', $types_id, PDO::PARAM_INT);
    $stmt_goodsTypes->execute();
    $goodsTypes1 = $stmt_goodsTypes->fetchAll();
    //var_dump($goodsTypes1);
    $goodsTypes2 = $goodsTypes1[0]["goodsType"];
    //var_dump($goodsTypes2);
    


    $query_status = 'SELECT status FROM status WHERE status_id = :status_id';
    $stmt_status = $pdo->prepare($query_status);
    $stmt_status->bindParam(':status_id', $status_id, PDO::PARAM_INT);
    $stmt_status->execute();
    $status1 = $stmt_status->fetchAll();
    //var_dump($status1);
    $status2 = $status1[0]["status"];
    //var_dump($status2);

    //$result = $stmt->fetchAll();
    //var_dump($result);


        require_once 'update_tpl.php';


  } catch (PDOException $e) {
        //例外が発生したら無視
        require_once 'exception_tpl.php';
        echo $e->getMessage();
        exit();
    }


//require_once 'print_login.php';


?>


