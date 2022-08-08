<?php
  $user_id = $_GET["user_id"];
  $user_name = $_GET["user_name"];
  $start = $_GET["start"];
  $size = $_GET["size"];
  $product_id1 = $_GET["product_id1"];
  $product_id2 = $_GET["product_id2"];
  $goodsName = $_GET["goodsName"];
  $types_id = $_GET["goodsTypes"];
  $order_user = $_GET["order_user"];
  $priceMin = $_GET["price_min"];
  $priceMax = $_GET["price_max"];
  $order_date1 = $_GET["order_date1"];
  $order_date2 = $_GET["order_date2"];
  $status_id = $_GET["status"];
  $delivered_date1 = $_GET["delivered_date1"];
  $delivered_date2 = $_GET["delivered_date2"];
  $begin = $_GET["begin"];
  $volume = $_GET["volume"];
  $goodsName2 = "%".$goodsName."%";

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

        


        //検索項目リスト作成
        //$search = compact( "goodsName", "types_id", "order_user", "status_id", "product_id1", "product_id2", "priceMin", "priceMax", "order_date1", "order_date2", "delivered_date1", "delivered_date2");
        //var_dump($search);
        //SQLクエリ作成
        //foreach ($search as $row){
        if ($goodsName != ""){
            $query = 'SELECT * FROM products WHERE goodsName LIKE :goodsName';
            $bind1 = ":goodsName";
       }
        if ($types_id != "0"){
            if (isset($query)){
                $query = '$query INTERSECT SELECT * FROM products WHERE types_id = :types_id';
           }    else{
                 $query = 'SELECT * FROM products WHERE types_id = :types_id';
           }
            $bind2 = ":types_id";
       }
        if ($order_user != "0"){
            if (isset($query)){
                $query = '$query INTERSECT SELECT * FROM products WHERE order_user = :order_user';
           }    else{
                $query = 'SELECT * FROM products WHERE order_user = :order_user';
           }
            $bind3 = ":order_user";
            var_dump($bind3);
       }
        if ($status_id != "0"){
            if (isset($query)){
                $query = '$query INTERSECT SELECT * FROM products WHERE status_id = :status_id';
           }    else{
                $query = 'SELECT * FROM products WHERE status_id = :status_id';
           }
            $bind4 = "status_id";
       }
        if ($product_id1 != "" && $product_id2 != "" ){
            if (isset($query)){
                $query = '$query INTERSECT SELECT * FROM products WHERE product_id >= :product_id1 AND product_id <= :product_id2';
           }    else{
                $query = 'SELECT * FROM products WHERE product_id >= :product_id1 AND product_id <= :product_id2';
           }
            $bind5 = ":product_id1";
            $bind6 = ":product_id2";
       }    elseif ($product_id1 != "" && $product_id2 == ""){
            if (isset($query)) {
                $query = '$query INTERSECT SELECT * FROM products WHERE product_id >= :product_id1';
           }    else{
                $query = 'SELECT * FROM products WHERE product_id >= :product_id1';
           }
            $bind5 = ":product_id1";
       }    elseif ($product_id1 == "" && $product_id2 != "") {
                if (isset($query)){
                    $query = '$query INTERSECT SELECT * FROM products WHERE product_id <= :product_id2';
               }    else{
                    $query = 'SELECT * FROM products WHERE product_id <= :product_id2';
               }
                $bind6 = "product_id2";
           }
        if ($priceMin != "" && $priceMax != "" ){
            if (isset($query)){
                $query = '$query INTERSECT SELECT * FROM products WHERE price >= :priceMin AND price < :priceMax';
           }    else{
                $query = 'SELECT * FROM products WHERE price >= :priceMin AND price < :priceMax';
           }
            $bind7 = ":priceMin";
            $bind8 = ":priceMax";
       }    elseif ($priceMin != "" && $priceMax == ""){
                if (isset($query)) {
                    $query = '$query INTERSECT SELECT * FROM products WHERE price >= :priceMin';
               }    else{
                    $query = 'SELECT * FROM products WHERE price >= :priceMin';
               }
                $bind7 = ":priceMin";
           }    elseif ($priceMin == "" && $priceMax != "") {
                    if (isset($query)){
                        $query = '$query INTERSECT SELECT * FROM products WHERE price < :priceMax';
               }    else{
                    $query = 'SELECT * FROM products WHERE price < :priceMax';
               }
                $bind8 = ":priceMax";
           }
        if ($order_date1 != "" && $order_date2 != "" ){
            if (isset($query)){
                $query = "$query INTERSECT SELECT * FROM products WHERE order_date >= :order_date1 AND order_date <= :order_date2";
           }    else{
                $query = 'SELECT * FROM products WHERE order_date >= :order_date1 AND order_date <= :order_date2';
           }
            $bind9 = ":order_date1";
            $bind10 = ":order_date2";
       }    elseif ($order_date1 != "" && $order_date2 == ""){
                if (isset($query)) {
                $query = '$query INTERSECT SELECT * FROM products WHERE order_date >= :order_date1';
           }    else{
                $query = 'SELECT * FROM products WHERE order_date >= :order_date1';
           }
            $bind9 = ":order_date1";
       }    elseif ($order_date1 == "" && $order_date2 != "") {
                if (isset($query)){
                    $query = '$query INTERSECT SELECT * FROM products WHERE order_date <= :order_date2';
               }    else{
                    $query = 'SELECT * FROM products WHERE order_date <= :order_date2';
               }
                $bind10 = ":order_date2";
       }
        if ($delivered_date1 != "" && $delivered_date2 != "" ){
            if (isset($query)){
                $query = '$query INTERSECT SELECT * FROM products WHERE delivered_date >= :delivered_date1 AND delivered_date <= :delivered_date2';
           }    else{
                $query = 'SELECT * FROM products WHERE delivered_date >= :delivered_date1 AND delivered_date <= :delivered_date2';
           }
            $bind11 = ":delivered_date1";
            $bind12 = ":delivered_date2";
       }    elseif ($delivered_date1 != "" && $delivered_date2 == ""){
                if (isset($query)) {
                    $query = '$query INTERSECT SELECT * FROM products WHERE delivered_date >= :delivered_date1';
               }    else{
                    $query = 'SELECT * FROM products WHERE delivered_date >= :delivered_date1';
               }
                $bind11 = ":delivered_date1";
       }    elseif ($delivered_date1 == "" && $delivered_date2 != "") {
                if (isset($query)){
                    $query = '$query INTERSECT SELECT * FROM products WHERE delivered_date <= :delivered_date2';
               }    else{
                    $query = 'SELECT * FROM products WHERE delivered_date <= :delivered_date2';
               }
                $bind12 = "delivered_date2";
       }


        //var_dump($query);



        $stmt = $pdo->prepare($query);
        if (isset($bind1)){
            $stmt->bindParam($bind1,$goodsName2, PDO::PARAM_STR);
        }
        if (isset($bind2)){
            $stmt->bindParam($bind2,$types_id, PDO::PARAM_INT);
        }
        if (isset($bind3)){
            $stmt->bindParam($bind3, $order_user);
        }
        if (isset($bind4)){
            $stmt->bindParam($bind4, $status_id, PDO::PARAM_INT);
        }
        if (isset($bind5)){
            $stmt->bindParam($bind5, $product_id1, PDO::PARAM_INT);
        }
        if (isset($bind6)){
            $stmt->bindParam($bind6, $product_id2, PDO::PARAM_INT);
        }
        if (isset($bind7)){
            $stmt->bindParam($bind7, $priceMin, PDO::PARAM_INT);
        }
        if (isset($bind8)){
            $stmt->bindParam($bind8, $priceMax, PDO::PARAM_INT);
        }
        if (isset($bind9)){
            $stmt->bindParam($bind9, $order_date1);
        }
        if (isset($bind10)){
            $stmt->bindParam($bind10, $order_date2);
        }
        if (isset($bind11)){
            $stmt->bindParam($bind11, $delivered_date1);
        }
        elseif (isset($bind12)){
            $stmt->bindParam($bind12, $delivered_date2);
        }
        $stmt->execute();
        $result = $stmt->fetchAll();
        $subject = count($result);
        //var_dump($subject);


        $query_delete = 'DELETE FROM results WHERE EXISTS (SELECT * FROM results)';
        $stmt1 = $pdo->prepare($query_delete);
        $stmt1->execute();

        foreach($result as $row){
            $query_insert = 'INSERT INTO results VALUES (0, :product_id, :types_id, :goodsName, :price, :order_date, :order_user, :status_id, :delivered_date)';
            $stmt2 = $pdo->prepare($query_insert);
            //バインド
            $stmt2->bindParam(':product_id', $row["product_id"], PDO::PARAM_INT);
            $stmt2->bindParam(':types_id', $row["types_id"], PDO::PARAM_INT);
            $stmt2->bindParam(':goodsName', $row["goodsName"]);
            $stmt2->bindParam(':price', $row["price"], PDO::PARAM_INT);
            $stmt2->bindParam(':order_date', $row["order_date"]);
            $stmt2->bindParam(':order_user', $row["order_user"]);
            $stmt2->bindParam(':status_id', $row["status_id"], PDO::PARAM_INT);
            $stmt2->bindParam(':delivered_date', $row["delivered_date"]);

            // SQL文を実行
            $stmt2->execute();
       }
        //$result2 = $stmt2->fetchAll();
        //var_dump($result2);
        //検索結果10行選択
        $query2 = 'SELECT * FROM results ORDER BY result_id LIMIT :begin, :volume';

        $stmt2 = $pdo->prepare($query2);
        $stmt2->bindParam(':begin', $begin, PDO::PARAM_INT);
        $stmt2->bindParam(':volume', $volume, PDO::PARAM_INT);
        $stmt2->execute();
        $result2 = $stmt2->fetchAll();
        //var_dump($result2);
        


        $message = "検索結果";
        require_once 'SearchEffect10_tpl.php';


  } catch (PDOException $e) {
        //例外が発生したら無視
        require_once 'exception_tpl.php';
        echo $e->getMessage();
        exit();
    }




?>


