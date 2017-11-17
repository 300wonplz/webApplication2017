<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8" />
  </head>
  <body>
    <form action="./sql.php" method="post">
      <div>
        <label>dbname:</label>
        <input type="text" id="dbname" name="dbname" />
      </div>
      <div>
        <label>query:</label>
        <input type="text" id="query" name="query" />
      </div>

      <div>
        <button type="submit">submit</button>
      </div>
    </form>

    <?php
      $db = new PDO("mysql:dbname=".$_POST["dbname"], "root", "root");
      $rows = $db->query($_POST["query"]);
    ?>
    <ul>
    <?php
    foreach ($rows as $row) {
      ?>
      <li>
      <?php
        foreach ($row as $key => $value) {
          if(!is_integer($key)){
          ?>
            <?=" ".$value?>
          <?php
          }
        }
      ?>
    </li>
      <?php
    }
     ?>
   </ul>
  </body>
</html>
