<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <style>
    body {
          background-image:url("pop.jpg");
          }
  </style>

  <title></title>
</head>
<body>
<h1>ようこそ <?php echo $user_name; ?> さん</h1>


<?php

  foreach($result2 as $row) {
    //<?php
    echo '<p>';
    echo '注文No：';
    echo $row["product_id"];
    $product_id = $row["product_id"];
    echo ' ';
    echo $row["goodsName"];
    echo '  \\';
    echo $row["price"];
    echo '  注文日：';
    echo $row["order_date"];

    //$product_id = $row["product_id"];
    //var_dump($product_id);
    echo '<div style="display:inline-flex">';
    echo '<form action = "update.php" method="get">
            <input type="hidden" name = "user_name" value="' .$user_name.'">
            <input type="hidden" name = "user_id" value="' .$user_id.'">
            <input type="hidden" name = "start" value="' .$start.'">
            <input type="hidden" name = "size" value="' .$size.'">
            <input type="hidden" name = "product_id" value="' .$product_id.'">
            <input type="hidden" name = "command" value="更新">
            <input type="submit" name = "submitBtn" value="変更">
          </form>';
    echo '<form action = "update.php" method="get">
            <input type="hidden" name = "user_name" value="' .$user_name.'">
            <input type="hidden" name = "user_id" value="' .$user_id.'">
            <input type="hidden" name = "start" value="' .$start.'">
            <input type="hidden" name = "size" value="' .$size.'">
            <input type="hidden" name = "product_id" value="' .$product_id.'">
            <input type="hidden" name = "command" value="削除">
            <input type="submit" name = "submitBtn" value="削除">
          </form>';
    echo '</div>';
    echo '</p>';


  }
?>

  <div style="display:inline-flex">
  <form action ="select5.php" method="get">
    <input type ="hidden" name="user_name" value="<?php echo $user_name; ?>">
    <input type ="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <input type ="hidden" name="start" value="

<?php
  $next = $start - 5;
  if ($next < 0)
  {
    $next = 0;
  }
  echo $next;
?>
    ">
    <input type ="hidden" name="size" value="<?php echo $size; ?>">
    <input type ="submit" name="submitBtn" value="前の５件">
  </form>



  <form action ="select5.php" method="get">
    <input type ="hidden" name="user_name" value="<?php echo $user_name; ?>">
    <input type ="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <input type ="hidden" name="start" value="<?php echo $start+5; ?>">
    <input type ="hidden" name="size" value="<?php echo $size; ?>">
    <input type ="submit" name="submitBtn" value="次の５件">
  </form>
  </div>

<p></p>

  <form action ="search.php" method = "get">
    <input type ="hidden" name="user_name" value="<?php echo $user_name; ?>">
    <input type ="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <input type ="hidden" name="start" value="<?php echo $start; ?>">
    <input type ="hidden" name="size" value="<?php echo $size; ?>">
    <input type ="submit" name="submitBtn" value="検索">
  </form>

<p></p>

  <form action ="NewOrder.php" method = "get">
    <input type ="hidden" name="user_name" value="<?php echo $user_name; ?>">
    <input type ="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <input type ="hidden" name="start" value="<?php echo $start; ?>">
    <input type ="hidden" name="size" value="<?php echo $size; ?>">
    <input type ="submit" name="submitBtn" value="新規">
  </form>
  

</body>
</html>



