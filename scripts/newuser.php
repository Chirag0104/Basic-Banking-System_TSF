<?php
      // $title = 'Index';
      require_once '../includes/navbar.php';
      require_once '../db/conn.php';
  ?>
  <div id="home-1">
    
    <div class="container-2">
      <h1>Create a User</h1>
      <img src="../images/user.png" alt="">
      <form action="transfer-money.php" method="POST">
        <div class="form-group">
          <input type="text" name="name" required placeholder="Enter Your Name" >
        </div>
        <div class="form-group">
          <input type="email" name="mail" placeholder="Enter Your Mail ID" required>
        </div>
        <div class="form-group">
          <input type="number" name="balance" placeholder="Enter Your Balance" required>
          <!-- <input type="number" value="1" min="1" max="8" style="font-size: 55px;"> -->
        </div>
        <input type="submit" name='submit' class="btn-1 " value="Submit">
        
      </form>
    </div>
  </div>

  <?php
      // $title = 'Index';
      require_once '../includes/footer.php'
  ?>

</body>

</html>