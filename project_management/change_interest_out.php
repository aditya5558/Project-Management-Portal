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
</style>
    </head>
    <body>
           <center><b> <font size="7" >EDIT INTEREST GENERATED</font></b></center><br><br><br>
        
           <!-- <font size="5" > SELECT : <br><br> DATE &nbsp AMOUNT &nbsp SUB-HEAD &nbsp MEMO<br><br> </font> -->
           
           <form  action="change_interest_out2.php">
        <?php
       $con = mysqli_connect("localhost", "phpuser", "phpuserpw");
  if (!$con) {
     exit('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
  }
  mysqli_set_charset($con, 'utf-8');
  mysqli_select_db($con, "management");
  
  $gsancorderno=$_GET["sancorderno"];
 // $gyear=$_GET["year"];
  
  $q1="SELECT * FROM `interest` WHERE sanc_key = '$gsancorderno'";
  $result= mysqli_query($con, $q1);
  $num_row=0;
  
  echo "<table >";
  // echo "<th>";
  echo "<td align=center><b>Year</b></td><td align=center><b>Interest</b></td>";
  while($row = mysqli_fetch_array($result))
  {
      
       $n1 = "y".$num_row;
       $n2 = "i".$num_row;

      $num_row++;
      if($row['sanc_key']==$gsancorderno)
      { 
       //  echo $row['Date_of_credit']."&nbsp&nbsp&nbsp " .$row['Amount']."&nbsp&nbsp&nbsp&nbsp " .$row['SubHead']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" .$row['Memo'] ;
     
       // echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type=\"checkbox\" name={$num_row}> <br>";
       echo "<tr>";   

      
       // echo $n1;
       // echo $n2;

       echo "<td align=center><input type=\"text\" value=$row[1] name = \"$n1\" readonly style=\"color:#A8A8A8;\"></td><td align=center><input type=\"text\" value=$row[2] name = \"$n2\"</td>";
         echo"<br><br>";
      }  

      echo "</tr>";

    }

    // echo $num_row;
    echo '<input type="text" name="num_rows" value="'.$num_row.'" style="display: none;" >';
    // setcookie("num_rows",$num_row);
    setcookie("gid",$gsancorderno);

    echo "</table>";
        ?>
                 <button class="button" style="vertical-align:middle"><span>SUBMIT</span></button>
              
              
        </form>
        
    </body>
</html>
