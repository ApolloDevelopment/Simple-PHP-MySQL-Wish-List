<!DOCTYPE html>
<?php
  include 'php/connection.php';

  if(!empty($_POST['itemName'])) {
    $GLOBALS['itemName'] = htmlentities($_POST['itemName']);
  }
  if(!empty($_POST['url'])) {
    $GLOBALS['url'] = htmlentities($_POST['url']);
  }

  if(isset($_POST['save'])) {
    if(isset($url) && isset($itemName)) {
      $sql = "INSERT INTO `items` (`itemName`, `url`)
      VALUES ('$itemName','$url')";

      $insert = mysqli_query($connect, $sql);
    }
  }

?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="web-fonts-with-css/css/fontawesome-all.min.css">
    <link rel="shortcut icon" href="img/favicon.ico">
    <title>PHP*MySQL Wish List</title>
  </head>
  <body>
    <div class="container">
      <h1 class="heading text-center">Simple Wish List Using PHP and MySQL</h1>

      <form class="form-group" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input class="form-control" id="name" placeholder="Item Name" name="itemName" autocomplete="off">
        <input class="form-control" id="link" placeholder="Link" name="url" autocomplete="off">
        <button id="add" class="btn btn-primary" type="submit" name="save">Add</button>
      </form>

      <div class="itemContainer">

        <?php
          $query = "SELECT `id`, `itemName`, `url` FROM $table";
          $result = mysqli_query($connect, $query);

          //creates div for each wish item
          if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              echo "
              <div class='item' id='".$row['id']."'>
                <i class='fas fa-ellipsis-v extras'></i>
                <h3 class='item_name'>".$row['itemName']."</h3>
                <a href='".$row["url"]."' class='link' target='_blank'>".$row["url"]."</a><br>
                <div class='btnContainer'>
                  <button class='btn btn-primary'>Edit</button>
                  <button class='btn btn-danger'>Remove</button>
                </div>
              </div>
              ";
            }
          }
        ?>

      </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">

      $(document).ready(function() {
        $(".item").on('mouseenter', function() {
          $(this).children('.btnContainer').slideToggle("fast");
        }).on('mouseleave', function() {
          $(this).children('.btnContainer').slideToggle("fast");
        });
      });

    </script>
  </body>
</html>
