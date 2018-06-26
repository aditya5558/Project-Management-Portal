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
 
function tableme($result){
    $header='';
    $rows='';
    while ($row = mysqli_fetch_array($result)) { 
        if($header==''){
            $header.='<tr>'; 
            $rows.='<tr>'; 
            foreach($row as $key => $value){ 
                $header.='<th>'.$key  .'</th>'; 
                $rows.='<td>'.$value  .'</td>'; 
            } 
            $header.='</tr>'; 
            $rows.='</tr>'; 
        }else{
            $rows.='<tr>'; 
            foreach($row as $value){ 
                $rows .= "<td>".$value."</td>"; 
            } 
            $rows.='</tr>'; 
        }
    } 
    return '<table>'.$header.$rows.'</table>';
}
       

  ?>
        
<!--        <table dir="ltr" width="500" border="1" 
			summary="project details">
	<caption>Project Details
	</caption>
	<colgroup width="25%" />
	<colgroup id="colgroup" class="colgroup" align="center" 
			valign="middle" title="title"  
			span="2" style="background:#ddd;" />
	<thead>
		<tr>
			<th scope="col">Serial No</th>
			<th scope="col">Project Title</th>
			<th scope="col">Department</th>
		</tr>
	</thead>
	-->

      
        <?php
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
        $query= "SELECT * FROM managedata WHERE Sancorderno = '$gsancorderno' AND ProjTitle REGEXP '$gprojtitle' AND Status REGEXP '$gstatus'  AND Dept REGEXP '$gdept' AND PrincInv REGEXP '$gprincinv' AND Subagency REGEXP '$gsubagency' AND CoCord REGEXP '$gcocord' AND Duration REGEXP '$gduration' AND SancDate BETWEEN '$theDate' AND '$toDate' AND StartDate BETWEEN '$theDate1' AND '$toDate1' AND EndDate BETWEEN '$theDate2' AND '$toDate2'" ;
        $result = mysqli_query($con,$query );
        $fields_num = mysqli_num_fields($result);

//        $q="SELECT GrantRec FROM managedata ";
//        $q1="SELECT Expenditure FROM managedata ";
//        $q3="SELECT Dateofrec FROM managedata";
//        $q4="SELECT CURDATE()";
//       // $q5="SELECT DATEDIFF($t1,$t2)/365";
//        $p1 = mysqli_query($con,$q );
//        $p2 = mysqli_query($con,$q1 );
//        $t2=mysqli_query($con,$q3 );
//        $t1=mysqli_query($con,$q4 );
//        $q5="SELECT DATEDIFF($t1,$t2)/365";
//        $t=mysqli_query($con,$q5 );
//        $p=$p1-$p2;
//        $test="SELECT CURDATE()";
//        echo "mysqli_query($con,$test)";
       // $k= $p*(1 + $ginterest)^($t) - $p;
       // echo $k;
       //$q2="UPDATE Table managedata SET Interest=$k";
         //mysqli_query($con,$q2 );
echo "<h1>PROJECT DETAILS</h1>";
echo "<table border='1'><tr>";
// printing table headers
for($i=0; $i<$fields_num; $i++)
{
    $field = mysqli_fetch_field($result);
    if (isset($_GET[$i])||$i==$fields_num-1)
    {   
//        echo"$i checked";
    
    echo "<td>{$field->name}</td>";}
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
        </table>
        
        //<?php
//        $result= mysqli_query($con, "SELECT * FROM managedata");
//              echo tableme($result);
//                 $result= mysqli_query($con, "SELECT * FROM managedata");
//$fields_num = mysql_num_fields($result);
//
//echo "<h1>Table: {$table}</h1>";
//echo "<table border='1'><tr>";
//// printing table headers
//for($i=0; $i<$fields_num; $i++)
//{
//    $field = mysqli_fetch_field($result);
//    echo "<td>{$field->name}</td>";
//}
//echo "</tr>\n";
//// printing table rows
//while($row = mysqli_fetch_row($result))
//{
//    echo "<tr>";
//
//    // $row is array... foreach( .. ) puts every element
//    // of $row to $cell variable
//    foreach($row as $cell)
//        echo "<td>$cell</td>";
//
//    echo "</tr>\n";
//}
//
//?>

        
 </table>

          </body>
</html>
