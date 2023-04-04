<?php
    $title = "FTH23";
    $name = "Subram & Brason";
    $file = "FTH23";
    $description = "FTH23";
    $date = "March 17, 2023";
    $banner = "FTH23";
?>
 
 <h1>Assign ID to Employee</h1>

 <form id="assign_emp" method="post">
    <label for="employee_number">Employee Number: </label>
    <input type="number" id="employee_number" name="employee_number" size="3" pattern="[0-9]+" required>
    <button type="submit" formaction="index.php">Submit</button>
</form>
