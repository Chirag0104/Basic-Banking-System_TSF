<?php    
    class crud{

        private $db;

        function __construct($conn)
        {   
            $this->db = $conn;
        }

        public function insert_data($name,$mail,$balance){
            try {
                $sql = "INSERT INTO user_data VALUES (:name,:mail,:balance)";
                $statement = $this->db->prepare($sql);
                $statement->bindparam(':name',$name);
                $statement->bindparam(':mail',$mail);
                $statement->bindparam(':balance',$balance);

                $statement->execute();
                return True;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function get_data(){
            $sql = "SELECT * FROM `user_data`;";
            $result = $this->db->query($sql);
            return $result;
        }

        // public function transfer_money($SName,$Amount,$RName){
            
        //     try {
        //         // $SNo = '12';
        //         // $Date = getdate();
        //         $sql = "INSERT INTO `transfer_data`( `Sender_name`, `Amount`, `Reciever_Name`) VALUES ('$SName','$Amount','$RName')";
        //         $transfer = $this->db->query($sql);
        //         // $transfer->bindparam(':SName',$SName);
        //         // $transfer->bindparam(':Amount',$Amount);
        //         // $transfer->bindparam(':RName',$RName);
        //         // $transfer->bindparam(':date',$Date);
        //         // $transfer->bindparam(':SNo',$SNo);
                
        //         // $transfer->execute();
        //         return True;

        //     } catch (PDOException $e) {
        //         echo $e->getMessage();
        //         return false;
        //     }

    
        // }

        public function transaction_data(){
            $sql = "SELECT * FROM `transfer_data`;";
            $detail = $this->db->query($sql);
            return $detail;
        }

        public function update_balance($SName,$Amount,$RName){
            
            


                $sql1 = "SELECT * FROM   user_data WHERE `name`='$SName'" ;
                $result = $this->db->query($sql1);
                $m=$result->fetch();
                

                $sql2 = "SELECT * FROM   user_data WHERE `name`='$RName'" ;
                $result2 = $this->db->query($sql2);
                $n=$result2->fetch();
                

                if (($Amount)<0)
                {
                     echo '<script type="text/javascript">';
                     echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
                     echo '</script>';
                 }
             
             
               
                 // constraint to check insufficient balance.
                 else if($Amount > $m['balance']) 
                 {
                     
                     echo '<script type="text/javascript">';
                     echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
                     echo '</script>';
                 }
                 
             
             
                 // constraint to check zero values
                 else if($Amount == 0){
             
                      echo "<script type='text/javascript'>";
                      echo "alert('Oops! Zero value cannot be transferred')";
                      echo "</script>";
                  }
             
             
                 else {
                     
                             // deducting amount from sender's account
                             $newbalance = $m['balance'] - $Amount;
                             $sqlquery1 = "UPDATE user_data set balance=$newbalance where `name`='$SName'";
                             $SBalance = $this->db->query($sqlquery1);
                          
             
                             // adding amount to reciever's account
                             $newbalance2 = $n['balance'] + $Amount;
                             $sqlquery2 = "UPDATE user_data set balance=$newbalance2 where `name`='$RName'";
                             $RBalance = $this->db->query($sqlquery2);
                             
                            //  $sender = $sql1['name'];
                            //  $receiver = $sql2['name'];
                            // INSERT INTO `transfer_data` (`SNo`, `Sender_name`, `Amount`, `Reciever_Name`, `Date`) VALUES ('50', 'chirag', '5000', 'sanath', current_timestamp());
                             $sql = "INSERT INTO transfer_data(`Sender_name`, `Amount`, `Reciever_Name`,`Date`) VALUES ('$SName','$Amount','$RName',current_timestamp())";
                             $query = $this->db->query($sql);
             
                             if($query){
                                  echo "<script> alert('Transaction Successful');
                                                  window.location='transferdetails.php';
                                        </script>";
                                 
                             }
             
                             
                     }
                 
             

            

    
        }
    }

?>