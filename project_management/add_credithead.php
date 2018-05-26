<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <script language="javascript" src="calendar.js"></script>
        <meta charset="UTF-8">
        <title></title>
        <style>
        input[type=text] {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 3px solid #ccc;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    outline: none;
}
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: lightblue;
  color: black;
  border: none;
  text-align: center;
  font-size:15px;
  padding: 12px;

  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
input[type=text]:focus {
    border: 3px solid #555;
}
select {

    padding: 16px 20px;
    border: none;
    border-radius: 4px;
    background-color: #f1f1f1;
}
</style>
    </head>
    <body>
                <form action="somewhere.php" method="post">
<?php
//get class into the page
require_once('classes/tc_calendar.php');






echo '<br>';



?>
</form>

        <form name="add_credithead" action="credit_out.php">


        <?php

       $con = mysqli_connect("localhost", "phpuser", "phpuserpw");
  if (!$con) {
     exit('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
  }
  mysqli_set_charset($con, 'utf-8');
  mysqli_select_db($con, "management");




$result=mysqli_query($con, "SELECT * FROM managedata ");

   echo '<br><br><b>SELECT SANCTION ORDER NUMBER   </b><br><br>';
echo '<select name="sancorderno">';


while($rs=mysqli_fetch_array($result)){

      echo '<option value="'.$rs['Sancorderno'].'">'.$rs['PrincInv']."-".$rs['ProjTitle'].'</option>';

}
echo '</select>';

  echo '<br><br><b>SELECT DATE OF CREDIT  </b><br><br>';

$myCalendar = new tc_calendar("date", true);
$myCalendar->setIcon("images/iconCalendar.gif");
//$myCalendar->setDate(02, 01, 1961);
$myCalendar->setYearInterval(1960, 2026);
  $myCalendar->dateAllow('1961-01-01', '2056-12-31');
$myCalendar->writeScript();
echo ' ';

 echo '<br><br><b> AMOUNT </b><br><br>';
 echo "<input type = \"number\" name = \"amount\ required" />

 <br>";


  echo '<br><br><b>SUB - HEAD </b><br>';
echo '<select name="subhead">';

echo '<option value="UNALLOCATED">UNALLOCATED</option>';
 echo '<option value="MANPOWER/FELLOWSHIP">MANPOWER/FELLOWSHIP</option>';
  echo '<option value="CONSUMABLE">CONSUMABLE</option>';
  echo '<option value="TRAVEL">TRAVEL</option>';
  echo '<option value="CONTINGENCY">CONTINGENCY</option>';
  echo '<option value="EQUIPMENT">EQUIPMENT</option>';
  echo '<option value="OVERHEAD">OVERHEAD</option>';
  echo '<option value="PROCURED_SERVICES">PROCURED_SERVICES</option>';
  echo '<option value="OTHER_COST">OTHER COST</option>';
  echo '<option value="STIPEND">STIPEND</option>';
  echo '<option value="OUTSOURCING OF FACILITIES">OUTSOURCING OF FACILITIES</option>';
  echo '<option value="SOFTWARE/HARDWARE">SOFTWARE/HARDWARE</option>';
   echo '<option value="TRAINING AND DEVELOPMENT">TRAINING AND DEVELOPMENT</option>';
   echo '<option value="WORKSHOP, CONFERENCE AND SEMINAR">WORKSHOP, CONFERENCE AND SEMINAR</option>';
    echo '<option value="DUTY_OF_IMPORT">DUTY OF IMPORT</option>';
     echo '<option value="BOOKS">BOOKS</option>';
      echo '<option value="REIMBURSEMENT_OF_RENT">REIMBURSEMENT OF RENT</option>';



echo '</select>';

echo '<br><br><b> MEMO </b><br>';

 echo "<textarea name = \"memo\" cols=\"40\" rows=\"5\"/></textarea>

 <br>";

?>

            <br>
            <br>
                <button class="button" style="vertical-align:middle"><span>SUBMIT</span></button>
        </form>
    </body>
</html>
