<?php
      require_once 'includes/navbar.php';
      require_once 'db/conn.php';
?>

  <div id="home">
    <h1 class="primary center"> Welcome To The Best Bank </h1>
      <div id="services">
        <div class="box">
          <img src="images/newuser.png" alt="Create a new User" />
            <h2 id="head">
            <a href="newuser.php">
            <button class="btn center">
              New User
            </button>
          </a>
        </h2>
      </div>

      <div class="box">
        <img src="images/Transaction.png" alt="Make A Transaction">
          <h2 id="head"><a href="transfer-money.php">
            <button class="btn center">
              Make A Transaction
            </button></a>
          </h2>
      </div>

      <div class="box">
        <img src="images/make-transaction.png" alt="Transaction History" />
          <h2 id="head">
            <a href="transferdetails.php">
              <button class="btn center">
                Transaction History
              </button>
            </a>
        </h2>
      </div>

    </div>
  </div>

  <?php
      require_once 'includes/footer.php'
  ?>

</body>
</html>