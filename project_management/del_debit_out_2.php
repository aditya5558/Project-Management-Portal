<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         <style>
.button {
    background-color: #555555; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
 
    transition-duration: 0.4s;
    cursor: pointer;
}
    </style>
    </head>
    <body>
        <?php
      $con = mysqli_connect("localhost", "phpuser", "phpuserpw");
  if (!$con) {
     exit('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
  }
  mysqli_set_charset($con, 'utf-8');
  mysqli_select_db($con, "management");
  
     $q2="SELECT * FROM `debit_head` ";
   $result2= mysqli_query($con, $q2);
   $x= mysqli_num_rows($result2);
   
   $i=1;
   $num_true_times=0;
   
   $order_no = $_GET['order_no'];
//    echo($order_no);
   while($i<=$x)
   {
       if(isset($_GET[$i]))
       {   
           
        //  echo "$i <br>"; 
           $j=$i-1-$num_true_times;
           ++$num_true_times;
           
            $q2="SELECT * FROM debit_head WHERE debit_key=$order_no LIMIT $j,1";
            $res2=mysqli_query($con,$q2);
            
        //    if(!$res2)
        //        echo"true<br>";
        //    else
        //        echo "false<br>";
            
            $rs= mysqli_fetch_array($res2);
            
            $gsancorderno=$rs['debit_key'];
        //    echo"$gsancorderno <br>";
            $gdate=$rs['Date_of_debit'];
            $gmemo=$rs['Memo'];
             $gsub=$rs['SubHead'];
            
            
            
            $gmonth=date("F", strtotime($gdate));
            $gyear=date("Y", strtotime($gdate));
            $gamount=$rs['Amount'];
            
            $query="DELETE from `debit_head` WHERE debit_key = '$gsancorderno' AND  Date_of_debit = '$gdate' AND  Amount = '$gamount' AND Memo = '$gmemo' AND SubHead = '$gsub' ";
            // echo($query);
            $q3="SELECT * FROM `expenditure` WHERE sanc_key = '$gsancorderno' AND month = '$gmonth' AND year = '$gyear' ";
                 $res3=mysqli_query($con,$q3);
            
            $rs3= mysqli_fetch_array($res3);
            
            $gamount2=$rs3['amount'];
            
           // echo"$gamount2<br>";
            $amount2=$gamount2-$gamount;
            
            $q4="UPDATE `expenditure` SET `amount`='$amount2' WHERE month = '$gmonth' AND year = '$gyear' AND sanc_key = '$gsancorderno' ";
              if(! $resultt = mysqli_query($con,$q4))
                   {
                       echo"ERROR" .mysqli_error($con);
                   }
                   else
                   {
                       echo"SUCCESSFULLY UPDATED EXPENDITURE <br><br>";
                   }
            
        
              if(! $resultt = mysqli_query($con,$query))
                   {
                       echo"ERROR" .mysqli_error($con);
                   }
                   else
                   {
                       echo"SUCCESSFULLY DELETED DEBIT HEAD <br><br>";
                   }


            if ($gmonth=="January" || $gmonth == "February" || $gmonth == "March")
                    {
                      $year2=$gyear-1;
                    }

                    else
                    {$year2 = $gyear;}

                    $q1="SELECT * FROM `modify` WHERE year = '$year2' AND sanc_key = '$gsancorderno' ";
                    $result = mysqli_query($con,$q1);
                    $num_rows = mysqli_num_rows($result);



                    if($num_rows==0)
                    {
                      // echo "in if";
                       $q2= "INSERT INTO `modify` VALUES ('$gsancorderno','$year2',1)";
                       $resultt = mysqli_query($con,$q2 );
                    }

                    else

                    {
                      // echo "in else";
                      $q3="UPDATE `modify` SET `x`=1 WHERE year = '$year2' AND sanc_key = 'gsancorderno'";
                      $resultt = mysqli_query($con,$q3 );

                    }

   }
          ++$i;
   }
   
 //  $query="DELETE FROM debit_head LIMIT $i,1";

  
        ?>
        
          <form name="back" action="index.php">
                      <button class="button button5">Back</button>
        </form>
    </body>
</html>
