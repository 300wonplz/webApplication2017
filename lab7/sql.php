<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8" />
  </head>
  <body>
    <?php
      $db = new PDO("mysql:dbname=college", "root", "root");
      $rows = $db->query("select * from student where major='컴퓨터공학'");
    ?>
    <ul>
    <?php
    foreach ($rows as $row) {
    ?>
        <li><?=$row["name"]?></li>
    <?php
    }
     ?>
   </ul>
  </body>
</html>
