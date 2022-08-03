<?php
  $user_id = $_GET["user_id"];
  $user_name = $_GET["user_name"];
  $start = $_GET["start"];
  $size = $_GET["size"];
  $product_id = $_GET["product_id"];
  $goodsName = $_GET["goodsName"];
  $goodsTypes = $_GET["goodsTypes"];
  $price = $_GET["price"];
  $order_date = $_GET["order_date"];
  $order_user = $_GET["order_user"];
  $status = $_GET["status"];
  $delivered_date = $_GET["delivered_date"];
  $goodsTypes2 = $_GET["goodsTypes2"];
  $status2 = $_GET["status2"];
  $order_user2 = $_GET["order_user2"];
  $command = $_GET["command"];
  //var_dump($command);
  //var_dump($goodsTypes);
  //var_dump($status);
  


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

    //command="削除"の場合

    if ($command == "削除")
    {
        $query_delete = 'DELETE FROM products WHERE product_id = :product_id';
        $stmt_delete = $pdo->prepare($query_delete);
        $stmt_delete->bindParam(':product_id', $product_id);
        $stmt_delete->execute();
        if(empty($result)) {
            $order_user = $order_user2;
            $message = "の注文履歴を削除しました";
            require_once 'Registration_tpl.php';
        }   else  {
            require_once 'update_tpl.php';
        } 

    }   else{
        //$command="更新"の場合

        //商品カテゴリーが空白の場合、元データのカテゴリー値に変換
        if ($goodsTypes == "0") 
        {
            $query_Types = 'SELECT types_id FROM types WHERE goodsType = :goodsTypes';
            $stmt_goodsTypes = $pdo->prepare($query_Types);
            $stmt_goodsTypes->bindParam(':goodsTypes', $goodsTypes2);
            $stmt_goodsTypes->execute();
            $types_id1 = $stmt_goodsTypes->fetchAll();
            $types_id2 = $types_id1[0]["types_id"];
            $types_id2 = (string)$types_id2;
        }   else{
            $tpyes_id2 = $goodsTypes;
            $query_Types = 'SELECT goodsType FROM types WHERE types_id = :goodsTypes';
            $stmt_goodsTypes = $pdo->prepare($query_Types);
            $stmt_goodsTypes->bindParam(':goodsTypes', $goodsTypes, PDO::PARAM_INT);
            $stmt_goodsTypes->execute();
            $goodsTypes1 = $stmt_goodsTypes->fetchAll();
            $goodsTypes2 = $goodsTypes1[0]["goodsType"];

       }
  
        //注文者が空白の場合、元データのorder_user値に変換
        if ($order_user == "0")
        {
            $query_user = 'SELECT user_id FROM users WHERE user_id = :user_id';
            $stmt_user = $pdo->prepare($query_user);
            $stmt_user->bindParam(':user_id', $order_user2);
            $stmt_user->execute();
            $user1 = $stmt_user->fetchAll();
            $order_user = $user1[0]["user_id"];
       }

        //注文状況が空白の場合、元データの注文状況値に変換
        if ($status == "0")
       {
            $query_status = 'SELECT status_id FROM status WHERE status = :status';
            $stmt_status = $pdo->prepare($query_status);
            $stmt_status->bindParam(':status', $status2);
            $stmt_status->execute();
            $status_id1 = $stmt_status->fetchAll();
            $status_id2 =  $status_id1[0]["status_id"];
            $status_id2 = (string)$status_id2;
            //var_dump($status_id2);
        }   else{
            $status_id2 = $status;
            $query_status = 'SELECT status FROM status WHERE status_id = :status';
            $stmt_status = $pdo->prepare($query_status);
            $stmt_status->bindParam(':status', $status, PDO::PARAM_INT);
            $stmt_status->execute();
            $status1 = $stmt_status->fetchAll();
            $status2 = $status1[0]["status"];
        }
  
        //UPDATEのSQL
        $query = 'UPDATE products SET types_id=:types_id2, goodsName=:goodsName, price=:price, order_date=:order_date, order_user=:order_user, status_id=:status_id2, delivered_date=:delivered_date WHERE product_id=:product_id';
 
        // SQL文をセット
        $stmt = $pdo->prepare($query);
        //バインド
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->bindParam(':types_id2', $types_id2, PDO::PARAM_INT);
        $stmt->bindParam(':goodsName', $goodsName);
        $stmt->bindParam(':price', $price, PDO::PARAM_INT);
        $stmt->bindParam(':order_date', $order_date);
        $stmt->bindParam(':order_user', $order_user);
        $stmt->bindParam(':status_id2', $status_id2, PDO::PARAM_INT);
        $stmt->bindParam(':delivered_date', $delivered_date);

        // SQL文を実行
        $stmt->execute();

        $query2 = 'SELECT * FROM products WHERE product_id = :product_id';
        $stmt2 = $pdo->prepare($query2);
        $stmt2->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt2->execute();
        $result = $stmt2->fetchAll();

        if(empty($result)) {
            require_once 'update_tpl.php';
        }   else  {
            $message = " の注文履歴を更新しました";
            require_once 'Registration_tpl.php';
           } 
    }

  } catch (PDOException $e) {
        //例外が発生したら無視
        require_once 'exception_tpl.php';
        echo $e->getMessage();
        exit();
    }

?>



