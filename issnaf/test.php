<select id="comboA" onchange="getComboA(this)">
<option value="">Select combo</option>
<option value="Temple University">Text1</option>
<option value="Value2">Text2</option>
<option value="Value3">Text3</option>
</select>
<script>
function getComboA(sel) {
    var value = sel.value;  
    location.replace("getuser.php?q="+value); 
}
</script>
