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
            
            table {
    border-collapse: collapse;
    width: 100%;
         table-layout: fixed;
}

th, td {
    text-align: left;
    padding: 8px;
     border-bottom: 1px solid #ddd;

}
tr:hover{background-color:#f5f5f5}
tr:nth-child(even){background-color: #f2f2f2}
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
    <center><b> <font size="10" >ACCOUNT STATEMENT</font></b></center><br><br><br><br><br>
        <?php
            $arr=array('April','May','June','July','August','September','October','November','December','January','February' ,'March');
        $con = mysqli_connect("localhost", "phpuser", "phpuserpw");
  if (!$con) {
     exit('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
  }
  mysqli_set_charset($con, 'utf-8');
  mysqli_select_db($con, "management");
  
  $gsancorderno=$_GET["sancorderno"];
 // $gyear=$_GET["year"];
  
  $q1="SELECT * FROM `managedata` WHERE Sancorderno REGEXP '$gsancorderno'";
  $result= mysqli_query($con, $q1);
  
  $rs=mysqli_fetch_array($result);
  $title=$rs['ProjTitle'];
  $pinv=$rs['PrincInv'];
  //$edate=$rs['EndDate'];
  
  echo "<b><font size=\"5\">PROJECT SANCTION ORDER NUMBER : $gsancorderno </font></b></center><br><br><br>";
  echo "<b><font size=\"5\">PROJECT TITLE : $title </font></b></center><br><br><br>";
  echo "<b><font size=\"5\">PRINCIPLE INVESTIGATOR: $pinv </font></b></center><br><br><br>";

//   $q2="SELECT * FROM `debit_head` WHERE debit_key REGEXP '$gsancorderno' ORDER BY `Date_of_debit` ASC";
//   $result2= mysqli_query($con, $q2);
// //   $all_debit = mysqli_fetch_array($result2);
//   while($rs=mysqli_fetch_array($result2)){

//     echo 'value="'.$rs['debit_key'].'">'.$rs['Date_of_debit']."-".$rs['Amount'];
//     echo '<br>';

// }
// //   echo($all_debit);
// echo"done <br>";
//   $q3="SELECT * FROM `credit_head` WHERE credit_key REGEXP '$gsancorderno' ORDER BY `Date_of_credit` ASC";
//   $result2= mysqli_query($con, $q3);
// //   echo "wassup <br>";
//   $num_rows = mysqli_num_rows($result2);
// //   echo($num_rows);
//   while($rs=mysqli_fetch_array($result2)){

//     echo 'value="'.$rs['credit_key'].'">'.$rs[1]."-".$rs[2];
//     echo '<br>';

// $q2 = "SELECT * FROM `credit_head` A, `debit_head` B where A.credit_key REGEXP '$gsancorderno' and 
//         B.debit_key REGEXP '$gsancorderno' ORDER BY A.Date_of_debit,B.Date_of_credit";

$q2 = "select concat(a.Date_of_credit,b.Date_of_debit) as new_date from credit_head a,debit_head b where a.credit_key = sanc_order_no and b.debit_key = sance_order_no and a.credit_key = b.debit_key order by new_date";

$result2= mysqli_query($con, $q2);

  while($rs=mysqli_fetch_array($result2)){

    echo 'value="'.$rs['debit_key'].'">'.$rs['Date_of_debit']."-".$rs['Amount'];
    echo '<br>';

}
 




