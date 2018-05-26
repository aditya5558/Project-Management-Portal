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
                    <center>
        <b> <font size="20" >ENTER DETAILS</font></b>
        <br>
         </center>
<?php
//get class into the page
require_once('classes/tc_calendar.php');






echo '<br>';



?>
</form>

        <form name="add_out" action="add_out.php">
        <?php
        // put your code here


  require_once('classes/tc_calendar.php');

  echo '<br><br><b> Project Sanc Authority  </b><br>';
  echo "<input required type = \"text\" name = \"projsancauth\" />

 <br>";

 echo '<br><br><b>  Sub Agency </b><br>';
  echo "<input required type = \"text\" name = \"subagency\" />

 <br>";
 

  echo '<br><br><b> Project Sanc Authority Address </b><br>';
  echo "<input required type = \"text\" name = \"projsancadd\" />

 <br>";

 echo '<br><br><b> Project Title  </b><br>';
  echo "<input required type = \"text\" name = \"projtitle\" />

 <br>";


  echo '<br><br><b> Sanction order number  </b><br>';
  echo "<input required type = \"text\" name = \"sancorderno\" />

 <br>";

  echo '<br><br><b> Department  </b><br>';
  echo "<input required type = \"text\" name = \"dept\" />

 <br>";

  echo '<br><br><b> Principal Investigator </b><br>';
  echo "<input required type = \"text\" name = \"princinv\" />

 <br>";


  echo '<br><br><b> Co-coordinator </b><br>';
  echo "<input required type = \"text\" name = \"cocord\" />

 <br>";
//
  echo '<br><br><b> Cost</b><br>';
  echo "<input required type = \"text\" name = \"cost\" />

 <br>";

  echo '<br><br><b> Duration </b><br>';
  echo "<input required type = \"text\" name = \"duration\" />

 <br>";

//  echo '<br><br><b> Expenditure </b>';
 // echo "<input required type = \"text\" name = \"exp\" />

 //<br>";
//
 // echo '<br><br><b> Interest </b>';
 // echo "<input required type = \"text\" name = \"interest\" />

// <br>";
//
 // echo '<br><br><b> Debit Head </b>';
 // echo "<input required type = \"text\" name = \"debithead\" />

 //<br>";
//  echo '<br><br><b> Status </b>';
 // echo "<input required type = \"text\" name = \"status\" />
//
//
//
// <br>";

  echo '<br><br><b>Status </b><br><br>';
echo '<select name="status">';


 echo '<option value="Ongoing">Ongoing</option>';
  echo '<option value="Completed">Completed</option>';


echo '</select>';
 echo '<br><br><b>SELECT DATE OF SANCTION OF PROJECT  </b><br>';

$myCalendar = new tc_calendar("date1", true);
$myCalendar->setIcon("images/iconCalendar.gif");
$myCalendar->setDate(02, 01, 1961);
$myCalendar->setYearInterval(1960, 2026);
  $myCalendar->dateAllow('1961-01-01', '2026-12-31');
$myCalendar->writeScript();
echo ' ';


   echo '<br><br><b>SELECT START DATE OF PROJECT  </b><br>';

$myCalendar = new tc_calendar("date2", true);
$myCalendar->setIcon("images/iconCalendar.gif");
$myCalendar->setDate(02, 01, 1961);
$myCalendar->setYearInterval(1960, 2026);
  $myCalendar->dateAllow('1961-01-01', '2026-12-31');
$myCalendar->writeScript();
echo ' ';


  echo '<br><br><b>SELECT END DATE OF PROJECT  </b><br>';

$myCalendar = new tc_calendar("date3", true);
$myCalendar->setIcon("images/iconCalendar.gif");
$myCalendar->setDate(02, 01, 1961);
$myCalendar->setYearInterval(1960, 2026);
  $myCalendar->dateAllow('1961-01-01', '2026-12-31');
$myCalendar->writeScript();
echo ' ';

 echo '<br><br><b>SELECT  DATE OF GRANT RECEIVED </b><br>';

$myCalendar = new tc_calendar("date4", true);
$myCalendar->setIcon("images/iconCalendar.gif");
$myCalendar->setDate(02, 01, 1961);
$myCalendar->setYearInterval(1960, 2026);
  $myCalendar->dateAllow('1961-01-01', '2026-12-31');
$myCalendar->writeScript();
echo ' ';




        ?>
            <br>
            <br>
              <button class="button" style="vertical-align:middle"><span>SUBMIT</span></button>
        </form>
    </body>
</html>
