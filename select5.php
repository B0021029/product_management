<?php
  $user_id = $_GET["user_id"];
  $user_name = $_GET["user_name"];
  $start = $_GET["start"];
  $size = $_GET["size"];

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


        //5件検索コード追加
        $query2 = 'SELECT * FROM products ORDER BY product_id LIMIT :begin, :size';

        $stmt2 = $pdo->prepare($query2);
        $stmt2->bindParam(':begin', $start, PDO::PARAM_INT);
        $stmt2->bindParam(':size', $size, PDO::PARAM_INT);
        $stmt2->execute();
        $result2 = $stmt2->fetchAll();


        require_once 'ViewSelect_tpl.php';


  } catch (PDOException $e) {
        //例外が発生したら無視
        require_once 'exception_tpl.php';
        echo $e->getMessage();
        exit();
    }


//require_once 'print_login.php';


?>


