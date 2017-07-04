<? 
$codeNo = $_POST['codeNo']; 
  
?> 

<?  
if ($_POST['search']) { 
$db = mysql_connect("192.168.121.11", "me", "me0311") or die ("Unable to connect to MySQL server."); 
mysql_select_db("QC",$db) or die ("Unable to select requested database."); 

$sql = "SELECT * FROM EQUIPMENT WHERE E_CODE='$codeNo'";  

$result = mysql_query($sql,$db); 

$result = mysql_query($sql) or die ("There was an error query into MySQL! ".mysql_error()."<br>\nThe SQL was: ".$sql);  

 echo mysql_error();  
  
if ($myrow = mysql_fetch_array($result)) { 

echo "<form method='post' action='insertEquipment.php' onsubmit='return confirmEntry();'>";
echo "<table width='100%'  border='0' cellspacing='4' cellpadding='2'> 
      <tr> 
         <td colspan='3'> 
           <fieldset class='style3'><legend class='style13'>EQUIPMENT INFORMATION</legend>* 
                 
           <table width='100%'  border='0' cellpadding='2' cellspacing='4'> 
            <tr class='style3'> 
              <td width='13%'>Code</td> 
              <td width='35%'><input name='textCode' type='text' value="; 
              printf  ("%s", $myrow["E_CODE"]); 
              echo "></td> 
             
                <td width='17%'>Description </td> 
             <td width='38%'><input name='textDesc' type='text' value="; 
              printf  ("%s", $myrow["E_DESC"]); 
              echo "></td> 
            </tr> 
               
            <tr class='style3'> 
              <td>Type</td> 
              <td><select name='selectType'> 
                  <option value='PC'>PC</option> 
                  <option value='Printer'>Printer</option> 
                  <option value='Monitor'>Monitor</option> 
                  <option value='Hub'>Hub</option> 
               </select></td>"; 

       echo"<td> Location ID  </td> 
            <td>"; 
             
                  
            //This is combo box for Location ID. Query from database.           
       echo'<select name="selectLocationID">'; 
            $res2 =mysql_query("select L_ID from LOCATION"); 
                if(mysql_num_rows($res2)==0) { 
                   echo "there is no data in table.."; 
} else { 
                        for($i=0;$i<mysql_num_rows($res2);$i++) { 
                        $row=mysql_fetch_assoc($res2); 
                        echo"<option>$row[L_ID]</option>"; 
                        } 
                        echo'</select>'; } 
echo"        </td> 
          </tr>  
     
        <table> 
        <tr> <td> Others</td> </tr> 
        <tr> <td> 
            <input name='checkbox1' type='checkbox' value='Floppy Disk'><span class='style3'>Floppy Disk </span>     
            <input name='checkbox2' type='checkbox' value='CD Room'><span class='style3'> CD Room </span> 
            <input name='checkbox3' type='checkbox' value='CD/ RW'><span class='style3'> CD/RW</span> 
        </td> </tr> 
                     
         
        </table> 
         
        </fieldset> 
        </table> 
      
          <tr> 
             <td colspan='3'> 
                  <div align='center'><input type='submit' name='submit' value='Save'></div>                                    
             </td>  
          </tr>  
       </table>  
  </form>"; 
   
  }  

  
 while ($myrow = mysql_fetch_array($result)); 
}  

else { 
    echo "Sorry, no records were found!"; 
} 

mysql_close(); 
} 
?>