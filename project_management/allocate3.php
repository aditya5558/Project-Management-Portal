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
  
    $gsanc = $_COOKIE["gsanc"];
        $gamount=$_GET["amount"];
        $gsubhead = $_GET["subhead"];
        $gsubhead = $gsubhead." (taken from unallocated funds) ";
        $gmemo=$_GET["memo"];
        
        
              $date = isset($_REQUEST["date"]) ? $_REQUEST["date"] : "";
              //echo "date : $date";
//              
       //$fdate= date('Y-m-d', strtotime($date));
       
        $query= "INSERT INTO `credit_head` (`credit_key`,`Date_of_credit`,`Amount`,`Memo`,`SubHead`) VALUES ('$gsanc','$date','$gamount','$gmemo','$gsubhead')";
       
        if(! $result = mysqli_query($con,$query ))
{
    echo"ERROR" .mysqli_error($con);
}
else
{
    echo"SUCCESSFULLY UPDATED CREDIT HEAD <br><br>";
}

//updating grant_rec

$month=date("F", strtotime($date));
$year=date("Y", strtotime($date));

//echo"$month , $year";
$q1="SELECT * FROM `grant_rec` WHERE month REGEXP '$month' AND year REGEXP '$year' AND sanc_key REGEXP '$gsanc' ";
$result = mysqli_query($con,$q1);
$num_rows = mysqli_num_rows($result);

if($num_rows==0)
{
    //echo"in here";
    $q2= "INSERT INTO `grant_rec` (`sanc_key`,`amount`,`month`,`year`) VALUES ('$gsanc','$gamount','$month','$year')";
                            
                    if(! $resultt = mysqli_query($con,$q2 ))
                   {
                       echo"ERROR" .mysqli_error($con);
                   }
                   else
                   {
                       echo"SUCCESSFULLY UPDATED GRANTS RECEIVED <br><br>";
                   }
}
else
{
    $rs=mysqli_fetch_array($result);
    $amount1=$rs['amount'];
    $amount2=$amount1+$gamount;
    
    //echo"$amount1";
    $q3="UPDATE `grant_rec` SET `amount`='$amount2' WHERE month REGEXP '$month' AND year REGEXP '$year' AND sanc_key REGEXP '$gsanc'";
    
     if(! $resultt = mysqli_query($con,$q3 ))
                   {
                       echo"ERROR" .mysqli_error($con);
                   }
                   else
                   {
                       echo"SUCCESSFULLY UPDATED GRANTS RECEIVED <br><br>";
                   }
}


    $q1="SELECT * FROM `unallocated` WHERE sanc_key REGEXP '$gsanc' ";
  $result = mysqli_query($con,$q1);
 

 
      $rs=mysqli_fetch_array($result);
      $amount1=$rs['amount'];
      $amount2=$amount1-$gamount;
      
      //echo"$amount1";
      $q3="UPDATE `unallocated` SET `amount`='$amount2' WHERE sanc_key REGEXP '$gsanc'";
      
       if(! $resultt = mysqli_query($con,$q3 ))
                     {
                         echo"ERROR" .mysqli_error($con);
                     }
                     else
                     {
                         echo"SUCCESSFULLY UPDATED UNALLOCATED FUNDS <br><br>";
                     }
  







        ?>
        
        <form name="back" action="index.php">
            <button class="button button5">Back</button>
        </form>
    </body>
</html>
