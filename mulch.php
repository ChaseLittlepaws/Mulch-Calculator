<?php
echo $_GET['length'];
echo $_GET['width'];
echo $_GET['depth'];
?>

<!DOCTYPE html>
<html>
<body>

<h1>Mulch Calculator</h1>

<form action="" target="_self" method="get">
    <label for="length">Length in feet:</label><br>
    <input type="number" id="length" name="length"><br>
    <label for="width">Width in feet:</label><br>
    <input type="number" id="width" name="width"><br>
    <label for="depth">Depth in inches:</label><br>
    <input type="number" id="depth" name="depth"><br><br>
    <input type="submit" value="Calculate!">
</form>



</body>
</html>