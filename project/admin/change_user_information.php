<?php 
session_start(); 
include("db_connection.php"); 
include("Header.php");

if(isset($_POST['submit'])) {
  $user = $_POST['Username'];

  $check_user_query = "SELECT * FROM users_tab WHERE user_name = '$user'";
  $check_user_result = mysqli_query($connect, $check_user_query);

  if(mysqli_num_rows($check_user_result) > 0) {
    // Get the user data from the database
    $user_data = mysqli_fetch_assoc($check_user_result);
    $userid = $user_data['userid'];
    $username = $user_data['user_name'];
    $password = $user_data['password'];
    $show_form = true;
  } else {
    echo "The user '$user' does not exist in the database.";
    $show_form = false;
  }
} else {
  $show_form = false;
}

if(isset($_POST['update'])) {
  $userid = $_POST['Userid'];
  $username = $_POST['Username'];
  $password = $_POST['Password'];

  $update_user_query = "UPDATE users_tab SET user_name = '$username', password = '$password' WHERE userid = '$userid'";
  mysqli_query($connect, $update_user_query);

  echo "The user '$username' has been updated.";
  $show_form = false;
}

?>
<html>
<head>
</head>
<body style="background-color:#FFF8DC;">

<a href="users_options.php"><button type="button" style="float:right;">Cancel</button></a>
	  <br><br>
	    <h2>Change User Information</h2>
		<br>
		
<?php
  if($show_form) {
    ?>
    <form method="POST" action="">
      <label for="Username">Username:</label>
      <input type="text" name="Username" id="Username" style="text-align:center" value="<?php echo $username ?>" required>
      <br><br>
      <label for="Userid">Userid:</label>
      <input type="text" name="Userid" id="Userid" style="text-align:center" value="<?php echo $userid ?>" required>
      <br><br>
      <label for="Password">Password:</label>
      <input type="password" name="Password" id="Password" style="text-align:center" value="<?php echo $password ?>" required>
      <br><br>
      <input type="hidden" name="Userid" value="<?php echo $userid ?>">
      <button type="submit" name="update">Update user</button>
    </form>
    <?php
  } else {
    ?>
    <form method="POST" action="">
      <label for="Username">Username:</label>
      <input type="text" name="Username" id="Username" style="text-align:center" required>
      <br><br>
      <button type="submit" name="submit">Edit user</button>
    </form>
    <?php
  }
?>

</body>
</html>

