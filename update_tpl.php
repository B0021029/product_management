
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <style>
    body {
          background-image:url("dot_circles.jpg");
          }
  </style>

  <title></title>
</head>

<body>

 <h1>この注文履歴を<?php echo $command; ?>しますか？</h1>
  <form action="UpdateData.php" method="get">
    <label for="goodsName">商品名：</label>
    <input type="text" name="goodsName" value="<?php echo $goodsName; ?>" >

    <label for="goodsTypes">商品カテゴリー：</label>
    <select name="goodsTypes">
      <option value="0"> <?php echo $goodsTypes2; ?> </option>
      <option value="1">書籍</option>
      <option value="2">サプライ品</option>
      <option value="3">ドローン</option>
      <option value="4">DVD</option>
      <option value="5">ゲーム</option>
      <option value="6">家電</option>
      <option value="7">カメラ</option>
      <option value="8">AV機器</option>
      <option value="9">パソコン・周辺機器</option>
      <option value="10">オフィス用品</option>
      <option value="11">食品・飲料</option>
      <option value="12">お酒</option>
      <option value="13">DYI</option>
      <option value="14">ペット</option>
      <option value="15">ビューティー</option>
      <option value="16">おもちゃ</option>
      <option value="17">服</option>
      <option value="18">スポーツ</option>
      <option value="19">アウトドア用品</option>
    </select>

    <p></p>

    <label for="price">価格：</label>
    <input type="text" name="price" value="<?php echo $price; ?>">
    <label for="currency">円</label>
    <p></p>
    <label for="order_date">注文日：</label>
    <input type="text" name="order_date" value="<?php echo $order_date; ?>">

    <label for="order_user">注文者：</label>
    <select name="order_user">
      <option value="0"> <?php echo $order_user; ?> </option>
      <option value="hoge">hoge</option>
      <option value="k-ygawa">k-ygawa</option>
      <option value="sugi">sugi</option>
      <option value="morino">morino</option>
    </select>
    <p></p>
    <label for="delivered_date">配達日：</label>
    <input type="text" name="delivered_date" value="<?php echo $delivered_date; ?>">

    <label for="status">注文状況：</label>
    <select name="status">
      <option value="0"> <?php echo $status2; ?> </option>
      <option value="1">発注済</option>
      <option value="2">納品済</option>
      <option value="3">未発注</option>
      <option value="4">返品</option>
    </select>
    <p></p>



    <input type ="hidden" name="user_name" value="<?php echo $user_name; ?>">
    <input type ="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <input type ="hidden" name="start" value="<?php echo $start; ?>">
    <input type ="hidden" name="size" value="<?php echo $size; ?>">
    <input type ="hidden" name="product_id" value="<?php echo $product_id; ?>">
    <input type ="hidden" name="goodsTypes2" value="<?php echo $goodsTypes2; ?>">
    <input type ="hidden" name="status2" value="<?php echo $status2; ?>">
    <input type ="hidden" name="order_user2" value="<?php echo $order_user; ?>">
    <input type ="hidden" name="command" value ="<?php echo $command; ?>">
    <input type="submit" name="submitBtn" value="<?php echo $command; ?>">
  </form>

  <p></p>
  <form action="select5.php" method="get">
    <input type ="hidden" name="user_name" value="<?php echo $user_name; ?>">
    <input type ="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <input type ="hidden" name="start" value="<?php echo $start; ?>">
    <input type ="hidden" name="size" value="<?php echo $size; ?>">
    <input type="submit" name="submitBtn" value="トップページへ戻る">
  </form>


</body>
</html>


