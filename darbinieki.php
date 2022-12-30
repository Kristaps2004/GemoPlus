<?php
include 'backend/Auth.php';
require('backend/db_con.php');


if (isset($_REQUEST['username']) && isset($_REQUEST['password']) && isset($_REQUEST['phone']) && isset($_REQUEST['name']) && isset($_REQUEST['lastname'])){

	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($con,$username);

	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);

  $phone = stripslashes($_REQUEST['phone']);
	$phone = mysqli_real_escape_string($con,$phone);

	$name = stripslashes($_REQUEST['name']);
	$name = mysqli_real_escape_string($con,$name);

  $lastname = stripslashes($_REQUEST['lastname']);
	$lastname = mysqli_real_escape_string($con,$lastname);

  if(isset($_POST['admin'])){
    $admin = 1;
  }else{
    $admin = 0;
  }

  $query = "INSERT INTO lietotaji (Lietotajvards,Parole,Vards,Uzvards,Talr_Nr,Admin)
  VALUES ('$username','$password','$name','$lastname','$phone','$admin')";
  $result = mysqli_query($con,$query);


    if($result){
      echo("<h1 id='veiksmigi'>Veiksmīgi pievienots!</h1>");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lietotāji</title>
        <link rel="icon" href="resources/favicons/fav.png" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,700&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="resources/css/darbinieki.css"/>
    </head>
<body>
    <div class="Fields">
        <button id="add-btn">Pievienot Lietotāju</button>
        <form action="" method="post">
          <div id="add-pop">
              <input name="name" type="text" class="input" minlength="3" maxlength="25" placeholder="Vārds" required>
              <input name="lastname" type="text" class="input" minlength="3" maxlength="25" placeholder="Uzvārds" required>
              <input name="phone" type="tel" minlength="4" maxlength="8" class="input" placeholder="Telefona numurs" required>
              <input name="username" type="text" class="input" minlength="3" maxlength="25" placeholder="Lietotājvārds" required>
              <input name="password" type="password" class="input" minlength="3" maxlength="25" placeholder="Parole" required>
              <input name="admin" type="checkbox" id="html" name="fav_language" value="HTML">
              <label class="txt">Ir Admin</label>
              <input class="btn" name=submit type="submit" value="Pievienot">
              <button id="close-btn">Atcelt</button>
          </div>
        </form>
    </div>
    <div class="list">
    <div class="tabulaBox">
        <table id="customers">
          <tr class="tabula">
            <th class="teksts">ID</th>
            <th class="teksts">Lietotajvārds</th>
            <th class="teksts">Parole</th>
            <th class="teksts">Vārds</th>
            <th class="teksts">Uzvārds</th>
            <th class="teksts">Tālr_NR</th>
            <th class="teksts">Admin</th>
            <th class="teksts">Rediģēt</th>
          </tr>
          <?php
          $query = "SELECT * FROM lietotaji";
          $result = mysqli_query($con,$query);
          while($row = mysqli_fetch_array($result)) {
            ?>
            <tr class="table">
            <td><?php echo $row["Lietotaja_ID"]; ?></td>
            <td name='lala' class='edits' contenteditable="false"><?php echo $row['Lietotajvards']; ?></td>
            <td class='edits' contenteditable="false"><?php echo $row['Parole']; ?></td>
            <td class='edits' contenteditable="false"><?php echo $row['Vards']; ?></td>
            <td class='edits' contenteditable="false"><?php echo $row['Uzvards']; ?></td>
            <td class='edits' contenteditable="false"><?php echo $row['Talr_Nr']; ?></td>
            <td class='edits' contenteditable="false"><?php echo $row['Admin']; ?></td>
            <td><a href="delete.php?Lietotaja_ID=<?php echo $row["Lietotaja_ID"]; ?>"><button id='dzest'>Dzēst</button></a><br><button id='labot'>Labot</button><a><form action='editdata.php' method="post"><input type='Submit' style='display:none' value='Apstiprināt' name='aed' id='acceptbtn'></input></form></a></td>
            </tr>
            <?php
            }
          ?>
    </div>
    <script src="resources/js/darbinieki.js"></script>
</body>

</html>