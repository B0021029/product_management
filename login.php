<?php
  $user_id = $_GET["user_id"];
  $password = $_GET["password"];
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
    //$query = 'SELECT * FROM users WHERE user_id = \'', $user=id, '\' AND password =\'' , $password , '\'';
    $query = 'SELECT * FROM users WHERE user_id = :user_id AND password = :password';
 
    // SQL文をセット
    $stmt = $pdo->prepare($query);
    //バインド
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':password', $password);

 
    // SQL文を実行
    $stmt->execute();
 
/*ループして1レコードずつ取得
foreach ($stmt as $row) {
    echo($row["user_id"]);
    echo ",";
    echo($row["userName"]);
    echo ", ";
    echo($row["password"]);
    echo ", ";
    echo($row["e_mail"]);
    echo ", ";
    echo($row["permission"]);
    echo "<BR> ";
    }
*/

    $result = $stmt->fetchAll();
    //var_dump($result);
    //$user_name = $result[0]["userName"];
    //var_dump($user_name);

    if(empty($result)) {
        require_once 'login.html';
    }   else  {
        $user_name = $result[0]["userName"];
        //var_dump($user_name);

        //5件検索コード追加
        //$query2 = 'SELECT * FROM products ORDER BY product_id LIMIT 5';
        $query2 = 'SELECT * FROM products ORDER BY product_id LIMIT :begin, :size';

        $stmt2 = $pdo->prepare($query2);
        $stmt2->bindParam(':begin', $start, PDO::PARAM_INT);
        $stmt2->bindParam(':size', $size, PDO::PARAM_INT);
        $stmt2->execute();
        $result2 = $stmt2->fetchAll();
        //var_dump($result2);

        require_once 'ViewSelect_tpl.php';
    } 


  } catch (PDOException $e) {
        //例外が発生したら無視
        require_once 'exception_tpl.php';
        echo $e->getMessage();
        exit();
    }


//require_once 'print_login.php';


?>


