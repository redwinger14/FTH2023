<?php
    /*
    Subram & Brason
    reviewEmp.php
    April 15 2021
    FTH23
    */

    $title = "FTH23 SELECT";
    $name = "Subram & Brason";
    $file = "FTH23 - SELECT";
    $description = "FTH23 - SELECT";
    $date = "March 17, 2023";
    $banner = "FTH23 - EmpRetrieve";
    include("./header.php");
?>

<h1>Electronic ID - DB</h1>

<!-- setup the table -->
<table>
    <thead>
        <tr><th>Employee Number</th><th>Name</th><th>Position/Title</th></tr>
    </thead>

<?php
    $output = ""; //Set up a variable to store the output of the loop 
    //connect
    $conn = db_connect();

    //issue the query
    $sql = "SELECT * FROM employees";
        $result = pg_query($conn, $sql);
        $records = pg_num_rows($result);

    //generate the table
        for($i = 0; $i < $records; $i++){  //loop through all of the retrieved records and add to the output variable
            $output .= "\n\t<tr>\n\t\t<td>".pg_fetch_result($result, $i, "employeeNumber")."</td>"; 
            $output .= "\n\t\t<td>".pg_fetch_result($result, $i, "name")."</td>"; 
            $output .= "\n\t\t<td>".pg_fetch_result($result, $i, "position")."</td>\n\t</tr>"; 
        }

        echo $output; //display the output
?>

</table>

<a href="insertEmp.php">Enter Another Employee</a>
