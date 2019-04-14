<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="w3.css">

        <title></title>
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
 

        $gstatus = $_GET["status"];
        $gdept=$_GET["dept"];
        $gprincinv=$_GET["princinv"];
        $gprojtitle=$_GET["projtitle"];
        $gsancorderno=$_GET["sancorderno"];
        $gsubagency=$_GET["subagency"];
        $gcocord=$_GET["cocord"];
        $gduration=$_GET["duration"];
       // $ginterest=$_GET["Interest"];
       
       // $fromDate = isset($_POST["date1"]) ? $_POST["date1"] : "";
        $theDate = isset($_REQUEST["date1"]) ? $_REQUEST["date1"] : "";
        $toDate = isset($_REQUEST["date2"]) ? $_REQUEST["date2"] : "";
         $theDate1 = isset($_REQUEST["date3"]) ? $_REQUEST["date3"] : "";
        $toDate1 = isset($_REQUEST["date4"]) ? $_REQUEST["date4"] : "";
         $theDate2 = isset($_REQUEST["date5"]) ? $_REQUEST["date5"] : "";
        $toDate2 = isset($_REQUEST["date6"]) ? $_REQUEST["date6"] : "";
//        
//        
        $query= "SELECT * FROM managedata WHERE Sancorderno REGEXP '$gsancorderno' AND ProjTitle REGEXP '$gprojtitle' AND Status REGEXP '$gstatus'  AND Dept REGEXP '$gdept' AND PrincInv REGEXP '$gprincinv' AND Subagency REGEXP '$gsubagency' AND CoCord REGEXP '$gcocord' AND Duration REGEXP '$gduration' AND SancDate BETWEEN '$theDate' AND '$toDate' AND StartDate BETWEEN '$theDate1' AND '$toDate1' AND EndDate BETWEEN '$theDate2' AND '$toDate2'" ;
        //echo $query;
        $result = mysqli_query($con,$query );
        $fields_num = mysqli_num_fields($result);

echo "<h1>PROJECT DETAILS</h1>";
echo '<div class="w3-container" style="overflow: scroll;  font-size: 11px"><table class="w3-table w3-striped" ><tr>';
// printing table headers
for($i=0; $i<$fields_num; $i++)
{
    $field = mysqli_fetch_field($result);
    if (isset($_GET[$i])||$i==$fields_num-1)
    {   
//        echo"$i checked";
    
    echo "<td><b>{$field->name}</b></td>";}
}
echo "</tr>\n";
// printing table rows
while($row = mysqli_fetch_row($result))
{
    
    echo "<tr>";

    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
//    foreach($row as $cell)
//        echo "<td>$cell</td>";
    for($i=0;$i<$fields_num;$i++)
    {
          if (isset($_GET[$i])||$i==$fields_num-1)
    {  
//              echo"$i checked";
        echo "<td>$row[$i]</td>";
    }
    }

    echo "</tr>\n";
}

        if(mysqli_num_rows($result)<1)
            echo 'NO RESULTS FOUND';
    
//  while ($row = mysqli_fetch_array($result)) {
//    echo "<tr><td>" . htmlentities($row["Sl_No"]) . "</td>";
//    echo "<td>" . htmlentities($row["ProjTitle"]) . "</td>";
//      echo "<td>" . htmlentities($row["Dept"]) . "</td></tr>\n";
//}

 
        ?>
        </table></div>
        
 


          </body>
</html>
