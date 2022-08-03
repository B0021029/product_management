<?php
 
//$_GETで受け取る
  $user_name = $_GET["user_name"];
  $user_id = $_GET["user_id"];
  $start = $_GET["start"];
  $size = $_GET["size"];
  $begin = $_GET["begin"];
  $volume = $_GET["volume"];


?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <style>
    body {
          background-image:url("green_botanical.jpg");
          }
  </style>

  <title></title>
</head>
<body>
 <h1><?php echo $message; ?>:<?php echo $begin; ?> ～ <?php echo $begin+10; ?> / <?php echo $subject; ?> 件中</h1>
 <table border=2>
 <tr>
  <th>注文No</th>
  <th>商品名</th>
  <th>商品カテゴリー</th>
  <th>価格</th>
  <th>注文日</th>
  <th>注文者</th>
  <th>注文状況</th>
  <th>配達日</th>
  <th>変更・削除</th>
 </tr>
<?php

  foreach($result2 as $row){
      $product_id = $row["product_id"];
      $types_id= $row["types_id"];
      $goodsName = $row["goodsName"];
      $price = $row["price"];
      $order_date = $row["order_date"];
      $order_user = $row["order_user"];
      $status_id = $row["status_id"];
      $delivered_date = $row["delivered_date"];

      $query_Types = 'SELECT goodsType FROM types WHERE types_id = :goodsTypes';
      $stmt_goodsTypes = $pdo->prepare($query_Types);
      $stmt_goodsTypes->bindParam(':goodsTypes', $types_id, PDO::PARAM_INT);
      $stmt_goodsTypes->execute();
      $goodsTypes1 = $stmt_goodsTypes->fetchAll();
      //var_dump($goodsTypes1);
      $goodsTypes2 = $goodsTypes1[0]["goodsType"];
      //var_dump($goodsTypes2);
    


      $query_status = 'SELECT status FROM status WHERE status_id = :status';
      $stmt_status = $pdo->prepare($query_status);
      $stmt_status->bindParam(':status', $status_id, PDO::PARAM_INT);
      $stmt_status->execute();
      $status1 = $stmt_status->fetchAll();
      //var_dump($status1);
      $status2 = $status1[0]["status"];
      //var_dump($status2);

     //echo '<p>';
      echo '<tr>';
      echo '<td>'.$product_id.'</td>';
      echo '<td>'.$goodsName.'</td>';
      echo '<td>'.$goodsTypes2.'</td>';
      echo '<td>'.$price.'</td>';
      echo '<td>'.$order_date.'</td>';
      echo '<td>'.$order_user.'</td>';
      echo '<td>'.$status2.'</td>';
      echo '<td>'.$delivered_date.'</td>';
      echo '<td>';
      echo '<form action = "update.php" method="get">
              <input type="hidden" name = "user_name" value="' .$user_name.'">
              <input type="hidden" name = "user_id" value="' .$user_id.'">
              <input type="hidden" name = "start" value="' .$start.'">
              <input type="hidden" name = "size" value="' .$size.'">
              <input type="hidden" name = "product_id" value="' .$product_id.'">
              <input type="hidden" name = "command" value="更新">
              <input type="submit" name = "submitBtn" value="変更">
              </form>';
      echo '<p></p>';
      echo '<form action = "update.php" method="get">
              <input type="hidden" name = "user_name" value="' .$user_name.'">
              <input type="hidden" name = "user_id" value="' .$user_id.'">
              <input type="hidden" name = "start" value="' .$start.'">
              <input type="hidden" name = "size" value="' .$size.'">
              <input type="hidden" name = "product_id" value="' .$product_id.'">
              <input type="hidden" name = "command" value="削除">
              <input type="submit" name = "submitBtn" value="削除">
              </form>';
      echo '</td>';
      echo '</tr>';
  }
?>
</table>
<p></p>
  <div style="display:inline-flex">
  <form action ="select10.php" method="get">
    <input type ="hidden" name="user_name" value="<?php echo $user_name; ?>">
    <input type ="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <input type ="hidden" name="start" value="<?php echo $start; ?>">
    <input type ="hidden" name="size" value="<?php echo $size; ?>">
    <input type ="hidden" name="begin" value="

<?php
  $next = $begin - 10;
  if ($next < 0)
  {
    $next = 0;
  }
  echo $next;
?>
    ">
    <input type ="hidden" name="volume" value="<?php echo $volume; ?>">
    <input type ="hidden" name="subject" value="<?php echo $subject; ?>">
    <input type ="hidden" name="message" value="<?php echo $message; ?>">

    <input type ="submit" name="submitBtn" value="前の10件">
  </form>



  <form action ="select10.php" method="get">
    <input type ="hidden" name="user_name" value="<?php echo $user_name; ?>">
    <input type ="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <input type ="hidden" name="start" value="<?php echo $start; ?>">
    <input type ="hidden" name="size" value="<?php echo $size; ?>">
    <input type ="hidden" name="begin" value="<?php echo $begin+10; ?>">
    <input type ="hidden" name="volume" value="<?php echo $volume; ?>">
    <input type ="hidden" name="subject" value="<?php echo $subject; ?>">
    <input type ="hidden" name="message" value="<?php echo $message; ?>">

    <input type ="submit" name="submitBtn" value="次の10件">
  </form>
  </div>

<p></p>

  <form action="search.php" method="get">
    <input type = "hidden" name="user_name" value="<?php echo $user_name; ?>">
    <input type ="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <input type ="hidden" name="start" value="<?php echo $start; ?>">
    <input type ="hidden" name="size" value="<?php echo $size; ?>">
    <input type="submit" name="submitBtn" value="検索画面へ戻る">
  </form>

<p></p>

  <form action="select5.php" method="get">
    <input type = "hidden" name="user_name" value="<?php echo $user_name; ?>">
    <input type ="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <input type ="hidden" name="start" value="<?php echo $start; ?>">
    <input type ="hidden" name="size" value="<?php echo $size; ?>">
    <input type="submit" name="submitBtn" value="トップページへ戻る">
  </form>

</body>
</html>



