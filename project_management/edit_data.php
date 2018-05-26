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
</style>
    </head>
    <body>
        <center><b> <font size="7" >EDIT DATA</font></b></center><br><br><br>
       <form name="edit_data" action="edit_out.php">
            
            
        <?php
        
       $con = mysqli_connect("localhost", "phpuser", "phpuserpw");
  if (!$con) {
     exit('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
  }
  mysqli_set_charset($con, 'utf-8');
  mysqli_select_db($con, "management");
 

  

$result=mysqli_query($con, "SELECT * FROM managedata ");
   
   echo '<br><br><b>SELECT PROJECT  </b><br><br>';
echo '<select name="sancorderno">';

 
while($rs=mysqli_fetch_array($result)){
   
      echo '<option value="'.$rs['Sancorderno'].'">'.$rs['PrincInv']."-".$rs['ProjTitle'].'</option>';
  
}
echo '</select><br><br>';

 
        ?>
              <button class="button" style="vertical-align:middle"><span>SUBMIT</span></button>
              
              
        </form>
        
    </body>
</html>
