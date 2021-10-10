<?php
      // $title = 'Index';
      require_once '../includes/navbar.php';
      include '../db/conn.php';

      if(isset($_POST['submit'])){
          $name=$_POST['name'];
          $mail=$_POST['mail'];
          $balance=$_POST['balance'];
          $isSuccess = $crud->insert_data($name,$mail,$balance);

      }

      $results = $crud->get_data(); 
      $reciver = $crud->get_data();

      
  ?>

    <div id="home-transfermoney">
        <div class="container-3">
            <div class="center">
                <h1>Transfer Money</h1></div>
                <form action="transferdetails.php"  method="POST">
            <div class="label-1">
                <label for="sender-detail"><h4>Select Sender Details</h4> </label>

                <select name="SName" id="sender" required>
                <option value="" >Select</option>
                <?php 
                    while($s=$results->fetch(PDO::FETCH_ASSOC)){ ?>
                    <option value="<?php echo $s['name'] ?>" ><?php  
                     echo 'Name - '.$s['name'].'      ';
                     echo 'Mail - '.$s['email'].'      '; 
                     echo 'Balance - '.$s['balance'].'      ';
                     
                       ?></option>
                <?php }

                ?>
                </select>
            </div>

            <div class="label-2">
                <h4>Enter Amount</h4>
                <div class="amount-transfer">
                    <input type="number" name="Amount" placeholder="Amount" required>
                </div>
            </div>

            <div class="label-3">
                
                <label for="reciever-detail"><h4>Select Reciever Details </h4></label>

                <select name="RName" id="reciever" required >
                <option value="">Select</option>
                <?php 
                    while($s=$reciver->fetch(PDO::FETCH_ASSOC)){ ?>
                    <option value="<?php echo $s['name'] ?>" ><?php  
                    echo $s['name']; 
                    echo $s['email']; 
                      ?></option>
                <?php }

                ?>
                </select>
            </div>
            <div class="btn-transfer">
                
                <input type="submit" class="btn-4 transfer-page " value="submit" name="submit">
            </div>
        </form>
        </div>
        <?php
      // $title = 'Index';
      require_once '../includes/footer.php'
      ?>
    </div>

</body>

</html>