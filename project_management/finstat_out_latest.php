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
  
  $q1="SELECT * FROM `managedata` WHERE Sancorderno = '$gsancorderno'";
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

$q2 = "SELECT credit_key,'' as debit_key,subhead,amount,memo, Date_of_credit as
 new_date FROM credit_head WHERE Credit_key = '$gsancorderno' UNION
  SELECT '' as credit_key, debit_key,subhead,amount,memo,Date_of_debit as new_date 
  FROM debit_head WHERE debit_key = '$gsancorderno' ORDER BY `new_date` ASC";

$result2= mysqli_query($con, $q2);


// echo "<b><font size=\"3\"> CREDIT HEADS </font></b><br>";
// echo "<table>   
//      <tr>
//      <th>Date</th>
//      <th>Amount</th>
//      <th>Memo</th>
//      <th>SubHead</th>
//    </tr></table>";

// while($rs=mysqli_fetch_array($result2)){
   
//    if($rs[1]==NULL)
//    {
//    echo "<table>
//    <tr>
//      <td>$rs[5]</td>
//      <td>$rs[3]</td>
//      <td>$rs[4]</td>
//      <td>$rs[2]</td>
//    </tr>
//  </table>";
//    }
// }

// $result2= mysqli_query($con, $q2);

// echo "<b><font size=\"3\"> DEBIT HEADS </font></b><br>";
// echo "<table>   
//            <tr>
//      <th>Date</th>
//      <th>Amount</th>
//      <th>Memo</th>
//      <th>SubHead</th>
//    </tr></table>";


// while($rs=mysqli_fetch_array($result2)){
   
//    if($rs[0]==NULL)
//    {
//    echo "<table>
//    <tr>
//      <td>$rs[5]</td>
//      <td>$rs[3]</td>
//      <td>$rs[4]</td>
//      <td>$rs[2]</td>
//    </tr>
//  </table>";
//    }
// }
 

while($rs=mysqli_fetch_array($result2)){
   
    if($rs[1]==NULL)
    {
    echo "<table>
    <tr>
      <td>$rs[5]</td>
      <td>$rs[3]</td>
      <td>$rs[4]</td>
      <td>$rs[2]</td>
    </tr>
  </table>";
    }
 }
 