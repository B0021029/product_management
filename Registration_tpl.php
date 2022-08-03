<?php
//$_GETで受け取る
$user_name = $_GET["user_name"];
$user_id = $_GET["user_id"];
$start = $_GET["start"];
$size = $_GET["size"];
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <style>
    body {
          background-image:url("wave_circles.jpg");
          }
  </style>

  <title></title>
</head>
<body>
 <h1>注文No：<?php echo $product_id; ?><?php echo $message; ?></h1>
 <table border=2>
 <tr>
  <th>商品名</th>
  <th>商品カテゴリー</th>
  <th>価格</th>
  <th>注文日</th>
  <th>注文者</th>
  <th>注文状況</th>
  <th>配達日</th>
 </tr>
 <tr>
  <td><?php echo $goodsName; ?></td>
  <td><?php echo $goodsTypes2; ?></td>
  <td><?php echo $price; ?></td>
  <td><?php echo $order_date; ?></td>
  <td><?php echo $order_user; ?></td>
  <td><?php echo $status2; ?></td>
  <td><?php echo $delivered_date; ?></td>
 </tr>
</table>
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



