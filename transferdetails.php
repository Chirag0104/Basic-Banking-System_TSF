<?php
      require_once 'includes/navbar.php';
      include 'db/conn.php';

      if(isset($_POST['submit'])){
          $SName=$_POST['SName'];
          $Amount=$_POST['Amount'];
          $RName=$_POST['RName'];
          
          $isSucces = $crud->update_balance($SName,$Amount,$RName);

      }

      $detail = $crud->transaction_data();

?>

  <div id="home-transferdetail">

    <div class="heading">
        <h1 >Transactions</h1>
    </div>

    <table>
        <thead> 
            <tr>
                <th>SNo &emsp; </th>
                <th>Sender &emsp;</th>
                <th>Reciever &emsp;</th>
                <th>Transfer Amount &emsp;</th>
                <th>Date &nbsp;</th>
            </tr>
        </thead>

        <tbody>

                <?php  
                         while($t=$detail->fetch(PDO::FETCH_ASSOC)){ ?>
                         <tr>
                         
                            <td> <?php echo $t['SNo'];  ?> </td>
                            <td> <?php echo $t['Sender_name']; ?> </td>
                            <td> <?php echo $t['Reciever_Name']; ?> </td>
                            <td> <?php echo $t['Amount']; ?> </td>
                            <td> <?php
                            // To convert time in IST on webhost server 
                            // $startTime = date($t['Date']);
                            // $convertedTime = date('Y-m-d H:i:s',strtotime('+5 hour +30 minutes',strtotime($startTime)));
                            // echo $convertedTime;
                            echo $t['Date'];?> </td>
                         </tr>    
                        <?php }

                    ?>
            </tr>

        </tbody>
    </table>

</div>
<?php
      require_once 'includes/footer.php'
  ?>
</div>
</body>

</html>



