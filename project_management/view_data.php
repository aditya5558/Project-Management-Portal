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
table {
    border-collapse: collapse;
    margin-top: -250px;

}

td {
    padding-top: .5em;
    padding-bottom: .5em;
    padding-right: 1.0em;
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
       <div id="container" style="width:100%;">
  <div id="left" style="float:left; width:70%;">
         
<?php
//get class into the page
require_once('classes/tc_calendar.php');






// echo '<br>';



?>

        <b>SELECT STATUS</b>
       <form name="output" action="output.php">
  <input type="radio" name="status" value=".*"checked> ALL<br>
  <input type="radio" name="status" value="Completed"> COMPLETED<br>
  <input type="radio" name="status" value="Ongoing"> ONGOING <table width="90%">
 <?php
       $con = mysqli_connect("localhost", "phpuser", "phpuserpw");
  if (!$con) {
     exit('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
  }
  mysqli_set_charset($con, 'utf-8');
  mysqli_select_db($con, "management");


   $result=mysqli_query($con, "SELECT ProjTitle FROM managedata ");

   // echo '<table width="80%">';
   echo '<tr><td><b>SELECT PROJECT TITLE   </b></td>';
echo '<td><select  style="width: 300px" name="projtitle">';

 echo '<option value=".*">all</option>';
while($rs=mysqli_fetch_array($result)){

      echo '<option value="'.$rs['ProjTitle'].'">'.$rs['ProjTitle'].'</option>';

}

echo '</select></td></tr>';

$result=mysqli_query($con, "SELECT DISTINCT Sancorderno FROM managedata ");

   echo '<br><br><tr><td><b>SELECT SANCTION ORDER NUMBER   </b></td>';
echo '<td><select style="width: 300px" name="sancorderno">';

 echo '<option value=".*">all</option>';
while($rs=mysqli_fetch_array($result)){

      echo '<option value="'.$rs['Sancorderno'].'">'.$rs['Sancorderno'].'</option>';

}

echo '</select></td></tr>';

 echo '<br><br><tr><td><b>SELECT DEPARTMENT   </b></td>';
 $result=mysqli_query($con, "SELECT DISTINCT Dept FROM managedata ");
echo '<td><select style="width: 300px" name="dept">';

 echo '<option value=".*">all</option>';
while($rs=mysqli_fetch_array($result)){

      echo '<option value="'.$rs['Dept'].'">'.$rs['Dept'].'</option>';

}

echo '</select></td></tr>';
echo '<br><br><tr><td><b>SELECT PRINCIPAL INVESTIGATOR   </b></td>';

  $result=mysqli_query($con, "SELECT DISTINCT PrincInv FROM managedata ");
echo '<td><select style="width: 300px" name="princinv">';

 echo '<option value=".*">all</option>';
while($rs=mysqli_fetch_array($result)){

      echo '<option value="'.$rs['PrincInv'].'">'.$rs['PrincInv'].'</option>';

}

echo '</select></td></tr>';

echo '<br><br><tr><td><b>SELECT CO-COARDINATOR   </b></td>';
$result=mysqli_query($con, "SELECT DISTINCT CoCord FROM managedata ");
echo '<td><select style="width: 300px" name="cocord">';

 echo '<option value=".*">all</option>';
while($rs=mysqli_fetch_array($result)){

      echo '<option value="'.$rs['CoCord'].'">'.$rs['CoCord'].'</option>';

}

echo '</select></td></tr>';

echo '<br><br><tr><td><b>SELECT SUB AGENCY   </b></td>';
$result=mysqli_query($con, "SELECT DISTINCT Subagency FROM managedata ");
echo '<td><select style="width: 300px" name="subagency">';

 echo '<option value=".*">all</option>';
while($rs=mysqli_fetch_array($result)){

      echo '<option value="'.$rs['Subagency'].'">'.$rs['Subagency'].'</option>';

}



echo '</select></td></tr>';

echo '<br><br><tr><td><b>SELECT DURATION   </b></td>';
$result=mysqli_query($con, "SELECT DISTINCT Duration FROM managedata ");
echo '<td><select style="width: 300px" name="duration">';

 echo '<option value=".*">all</option>';
while($rs=mysqli_fetch_array($result)){

      echo '<option value="'.$rs['Duration'].'">'.$rs['Duration'].'</option>';

}

echo '</select></td></tr>';
echo '<br><br><tr><td></td></tr><tr style="border-top:1px solid black"><td rowspan= "2" style="border-bottom:1px solid black "><b>SELECT RANGE FOR DATE OF SANCTION   </b></td><br>';

echo '<td><b>FROM</b>  ';
$myCalendar = new tc_calendar("date1", true);
$myCalendar->setIcon("images/iconCalendar.gif");
$myCalendar->setDate(02, 01, 1961);
$myCalendar->setYearInterval(1960, 2026);
  $myCalendar->dateAllow('1961-01-01', '2026-12-31');
$myCalendar->writeScript();
echo '</td></tr> ';

echo '<tr style="border-bottom:1px solid black"><td><b>TO</b>  ';
$myCalendar = new tc_calendar("date2", true);
$myCalendar->setIcon("images/iconCalendar.gif");
$myCalendar->setDate(30, 12, 2026);
$myCalendar->setYearInterval(1960, 2026);
$myCalendar->dateAllow('1960-01-01', '2026-12-31');


$myCalendar->writeScript();

echo '</td></tr><br><br><tr><td rowspan= "2" style="border-bottom:1px solid black"><b>SELECT RANGE FOR START DATE OF PROJECT   </b></td><br>';
echo '<td><b>FROM</b>  ';
$myCalendar = new tc_calendar("date3", true);
$myCalendar->setIcon("images/iconCalendar.gif");
$myCalendar->setDate(02, 01, 1961);
$myCalendar->setYearInterval(1960, 2026);
  $myCalendar->dateAllow('1961-01-01', '2026-12-31');
$myCalendar->writeScript();
echo '</td></tr> ';

$myCalendar = new tc_calendar("date4", true);
$myCalendar->setIcon("images/iconCalendar.gif");
$myCalendar->setDate(30, 12, 2026);
$myCalendar->setYearInterval(1960, 2026);
$myCalendar->dateAllow('1960-01-01', '2026-12-31');
echo '<tr style="border-bottom:1px solid black"><td><b>TO</b>  ';

$myCalendar->writeScript();

echo '</td></tr><br><br><tr><td rowspan= "2" style="border-bottom:1px solid black"><b>SELECT RANGE FOR END DATE OF PROJECT  </b></td><br>';
echo '<td><b>FROM</b>  ';
$myCalendar = new tc_calendar("date5", true);
$myCalendar->setIcon("images/iconCalendar.gif");
$myCalendar->setDate(02, 01, 1961);
$myCalendar->setYearInterval(1960, 2026);
  $myCalendar->dateAllow('1961-01-01', '2026-12-31');
$myCalendar->writeScript();
echo '</td></tr> ';

$myCalendar = new tc_calendar("date6", true);
$myCalendar->setIcon("images/iconCalendar.gif");
$myCalendar->setDate(30, 12, 2026);
$myCalendar->setYearInterval(1960, 2026);
$myCalendar->dateAllow('1960-01-01', '2026-12-31');
echo '<tr><td style="border-bottom:1px solid black"><b>TO</b>  ';

$myCalendar->writeScript();
echo '</td></tr></table>';
?>

  </div>


<div id="right" style="float:right; width:30%;">
    <b>SELECT OUTPUT PARAMETERS</b><br><br>
     <?php
$resultt=mysqli_query($con, "SELECT * FROM managedata ");
$fields_num = mysqli_num_fields($resultt);

for($i=0; $i<$fields_num-1; $i++)
{
    $field = mysqli_fetch_field($resultt);
     echo "<input type=\"checkbox\" name={$i} checked>{$field->name} <br>";

}

//
//$result3=mysqli_query($con, "SELECT * FROM manageint ");
//
//$row = mysqli_fetch_row($result3);
//$val=$row[0];
//
//
// echo '<br><br><b> INTEREST RATE  </b><br>';
//  echo "<input required type = \"text\" name = \"Interest\" value = $val />
//
//  <br><br>";
?>
  <input type="submit" value="Go" /><!--
--></div>
       </div>
</form>
    </body>
</html>
