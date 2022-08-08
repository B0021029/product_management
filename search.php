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
          background-image:url("pop_trees.jpg");
          }
  </style>
  
  <title></title>
</head>
<body>
 <h1>検索項目を入力してください</h1>

  <form action="SearchData.php" method="get">

    <label for="product_id1">注文No：</label>
    <input type="text" name="product_id1">

    <label for="product_id2"> ～ </label>
    <input type="text" name="product_id2">

    <p></p>

    <label for="order_user">注文者：</label>
    <select name="order_user">
      <option value="0"> </option>
      <option value="hoge">hoge</option>
      <option value="k-ygawa">k-ygawa</option>
      <option value="sugi">sugi</option>
      <option value="morino">morino</option>
    </select>

    <label for="status">注文状況：</label>
    <select name="status">
      <option value="0"> </option>
      <option value="1">発注済</option>
      <option value="2">納品済</option>
      <option value="3">未発注</option>
      <option value="4">返品</option>
    </select>

    <p></p>

    <label for="goodsName">商品名：</label>
    <input type="text" name="goodsName">

    <label for="goodsTypes">商品カテゴリー：</label>
    <select name="goodsTypes">
      <option value="0"> </option>
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
    <input type="text" name="price_min">
    <label for="price_max"> 円 以上 </label>
    <input type="text" name="price_max">
    <label for="currency">円 未満</label>

    <p></p>

    <label for="order_date">注文日：</label>
    <input type="text" name="order_date1">
    <label for="order_date1"> 以降 ～ </label>
    <input type="text" name="order_date2">
    <label for="order_date2"> 以前 </label>


    <p></p>

    <label for="delivered_date">配達日：</label>
    <input type="text" name="delivered_date1">
    <label for="delivered_date1"> 以降～ </label>
    <input type="text" name="delivered_date2">
    <label for="delivered_date2"> 以前 </label>

    <p></p>
    <input type ="hidden" name="user_name" value="<?php echo $user_name; ?>">
    <input type ="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <input type ="hidden" name="start" value="<?php echo $start; ?>">
    <input type ="hidden" name="size" value="<?php echo $size; ?>">
    <input type ="hidden" name="begin" value="0">
    <input type ="hidden" name="volume" value="10">

    <input type="submit" name="submitBtn" value="検索">
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
