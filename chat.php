<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="php/images/<?php echo $row['img']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
          <p><?php echo $row['status']; ?></p>
        </div>
        <div class="button-group">
        <button class="unblock-user" data-blocked-id="<?php echo $row['unique_id']; ?>">Unblock</button>
        <button class="block-user" data-blocked-id="<?php echo $row['unique_id']; ?>">Block</button>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="javascript/chat.js"></script>

  <style>
    .button-group {
      margin-left: auto;
    }
    .block-user,
    .unblock-user {
      display: block;
      background: #333;
      color: #fff;
      outline: none;
      border: none;
      padding: 7px 15px;
      text-decoration: none;
      border-radius: 5px;
      font-size: 17px;
      margin: 10px;
      cursor: pointer;
      transition: background-color 0.3s;
      width: 100px;
    }

    .block-user:hover,
    .unblock-user:hover,
    .block-user:focus,
    .unblock-user:focus {
      background: #555;
    }

</body>
</html>
