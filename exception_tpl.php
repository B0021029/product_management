<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <style>
    body {
          background-image:url("simple_stars.jpg");
          }
  </style>

  <title></title>
</head>
<body>
<p>アクセスに失敗しました</p>
<form action="select5.php" method="get">
    <input type = "hidden" name="user_name" value="<?php echo $user_name; ?>">
    <input type ="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <input type ="hidden" name="start" value="<?php echo $start; ?>">
    <input type ="hidden" name="size" value="<?php echo $size; ?>">
    <input type="submit" name="submitBtn" value="トップページへ戻る">
</form>

</body>
</html>



