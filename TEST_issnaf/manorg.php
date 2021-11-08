<script type="text/javascript">
function showfield(name){
  if(name=='Other')document.getElementById('div1').innerHTML='Other: <input type="text" name="other" />';
  else document.getElementById('div1').innerHTML='';
}
</script>

<select name="travel_arriveVia" id="travel_arriveVia" onchange="showfield(this.options[this.selectedIndex].value)">
<option selected="selected">Please select ...</option>
<option value="Plane">Plane</option>
<option value="Train">Train</option>
<option value="Own Vehicle">Own Vehicle</option>
<option value="Other">Other</option>
</select>
<div id="div1"></div>



<div></div>
          <label>Violator:</label>
          <select name="purge" id="purge">
            <option value=''>------- Select --------</option>

              <?php 
              
                require_once("connect.php");
                echo "test0\n";
                $query = "SELECT * FROM chapter";
                echo "test1\n";   
                $result = $conn->query($query);
                echo "test2\n";
                //$result->execute();
                echo "test3";

                if ($result !== false && $result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                      echo "<option value='". $row['chapter_id']. "'>". $row['chapter_name']. "</option>";
                      $tots[] = $row;
                  }
                } else {
                      echo "0 results";
                  }
                    echo json_encode($tots);
              ?>
        </select>


<div></div>
          <label>Organization:</label>
          <select name="org" id="org">
            <option value=''>------- Select Organization name--------</option>

              <?php 
              
                require_once("connect.php");
   
                $query = "SELECT * FROM organization";
      
                $result = $conn->query($query);

                if ($result !== false && $result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                      echo "<option value=''>". $row['organization_name']. "</option>";
                      $tots[] = $row;
                  }
                } else {
                      echo "0 results";
                  }
                    echo json_encode($tots);
              ?>
        </select>
