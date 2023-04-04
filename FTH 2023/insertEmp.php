<?php
    /*
    Subram & Brason
    EmpIns.php
    April 15 2021
    FTH 2023
    */

    $title = "Employee - INSERT";
    $name = "Subram & Brason";
    $file = "";
    $description = "Employee - INSERT";
    $date = "March 17, 2023";
    $banner = "Add Employee";
    include("./header.php");
?>

<!-- PHP Code Begins Here -->
<?php
    // Global Variables
    $error = "";
    $employeeNumber = "";
    $name = "";
    $position = "";

    // check for POST method
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //trim whitespace
        $employeeNumber = trim($_POST["employeeNumber"]);
        $name = trim($_POST["name"]);
        $position = trim($_POST["position"]);

        // validate employeeNumber
        if (empty($employeeNumber)) {
            $error .= '<p class="error">ERROR: Employee number is required.</p>';
        } else if (strlen($employeeNumber) != EMPLOYEE_NUMBER_LENGTH) {
            $error .= '<p class="error">ERROR: Employee number <mark>must</mark> be '
                . EMPLOYEE_NUMBER_LENGTH . " characters. You entered: 
                {$employeeNumber}</p>";
            // empty invalid data
            $employeeNumber = "";
        }

        // validate name
        if (empty($name)) {
            $error .= '<p class="error">ERROR: Employee name is required!</p>';
        } else if (strlen($name) > MAXIMUM_NAME_LENGTH) {
            $error .= '<p class="error">ERROR: Employee name <mark>must</mark> be less than '
                . MAXIMUM_NAME_LENGTH . " characters. You entered: 
                {$name}</p>";
            // empty invalid data
            $name = "";
        }

        // validate position
        if (empty($position)) {
            $error .= '<p class="error">ERROR: Position/Title is required!</p>';
        } else if (strlen($position) > MAXIMUM_NAME_LENGTH) {
            $error .= '<p class="error">ERROR: Position/Title <mark>must</mark> be less than '
                . MAXIMUM_NAME_LENGTH . " characters. You entered: 
                {$position}</p>";
            // empty invalid data
            $position = "";
        }

        
        // check for submission errors
        if ($error == "") {
            // connect to the database if there are no errors
            $connection = db_connect();

            // register the new employee
            $sqlCode = "SELECT * FROM employees WHERE employeeNumber = '" . $employeeNumber . "'";

            // code results
            $employeeNumberResults = pg_query($connection, $sqlCode);
            
            // check for existing course codes
            if (pg_num_rows($employeeNumberResults)) {
                $employeeNumber = pg_fetch_result($employeeNumberResults, 0, "employeeNumber");

                echo '<p class="error">ERROR: Employee Number '. $employeeNumber . ' already exists</p>';
                        
            // update the database with the new information    
            } else {
                $nameUpdate = "INSERT INTO employees(employeeNumber, name, position)
                VALUES('".$employeeNumber."', '".$name."', '".$position."');";

                $nameUpdate = pg_query($connection, $nameUpdate);
                
                // output an activity log https://www.php.net/manual/en/function.file-put-contents.php
                $file = 'EmployeeAdd.log';
                // The new person to add to the file
                $log = date("j F Y (g:i a)") . ' - The employee "' . $name . ' (' . $employeeNumber . ')" was added. From IP adress: ' . getenv("REMOTE_ADDR") . ". \n";
                // Write the contents to the file, 
                // using the FILE_APPEND flag to append the content to the end of the file
                // and the LOCK_EX flag to prevent anyone else writing to the file at the same time
                file_put_contents($file, $log, FILE_APPEND | LOCK_EX);
                // close the file
                // fclose($file);

                // redirect the user to lab9 if there are no errors in submission.
                header("Location: reviewEmp.php");

                // required to clear invalid data when redirecting to another page.
                ob_flush();
                
                // best practices
                exit;
            }

        }
        
    }

    echo $error;
?>

<h1>Add Employee</h1>

<ul>
	<li>The employee number must be exactly 8 characters long.</li>
	<li>The employee number cannot already exist in the database.</li>
	<li>The employee name cannot be empty.</li>
	<li>The employee name must be less than or exactly 32 characters long.</li>
	<li>A Position/Title must be provided.</li>
</ul>

<h3>Please enter a Employee Number, a Name and a Position/Title.</h3>

<form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<table>
		<tr>
			<td>
				<label for="employeeNumber">Employee Number:</label>
			</td>
			<td>
				<input type="text" id="employeeNumber" name="employeeNumber" value="<?php echo $employeeNumber; ?>" size="30" />
			</td>
		</tr>

		<tr>
			<td>
				<label for="name">Employee Name:</label>
			</td>
			<td>
				<input type="text" id="name" name="name" value="<?php echo $name; ?>" size="30" />
			</td>
		</tr>

		<tr>
			<td>
				<label for="position">Position/Title:</label>
			</td>
			<td>
				<input type="text" id="position" name="position" value="<?php echo $position; ?>" size="30" />
			</td>
		</tr>

		<tr>
			<td colspan="2">
				<input type="submit" id="submit" value = "Add Employee">
			</td>
		</tr>
	</table>
</form>
