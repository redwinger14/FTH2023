<?php
    /*
    Subram & Brason
    EmpIns.php
    March 17 2023
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
<link href="assets/css/main.css" rel="stylesheet">

<body>
    <div id="mainbgimage">
    <div id="wrapper">
        <div id="queerc">
        </div>
        <main id="mainbg">
            <div id="wrapper2">
                <?php
                $output = ""; //Set up a variable to store the output
                //connect
                $conn = db_connect();

                //issue the query
                $sql = "SELECT * FROM employees";
                    $result = pg_query($conn, $sql);
                    $records = pg_num_rows($result);

                //generate the table
                $output .= "\n\t\t<div id='position'>".pg_fetch_result($result, $employee_number = $_POST['employee_number'], "position")."</div>";
                $output .="\n\t\t<br>";
                $output .= "\n\t\t<div id='name'>".pg_fetch_result($result, $employee_number = $_POST['employee_number'], "name")."</div>";
                $output .="\n\t\t<br>";
                echo $output; //display the output
                ?>
                <div id="pronoun">She/Her</div>
                <div id="freespace"></div>
            </div>
        </main>
        <section>
            <br>
            <div id="div1">
                <button onclick="change1()">BG</button>
                <button onclick="change2()">PN</button>
            </div>
            <div id="div2">
                <button onclick="change3()">QR</button>
            </div>
        </section>
    </div>
    <script>
        var i = 0;
        var images = new Array("assets/images/bg1.png","assets/images/bg2.png","assets/images/bg3.png","assets/images/bg4.png","assets/images/bg5.png","assets/images/bg6.png");

        function change1() {
        i++;
        if (i == images.length) {
        i = 0;
        }
        document.getElementById("mainbg").style.backgroundImage= `url('${images[i]}')`
        }

        var x = 0
        var pronouns = new Array("","She/Her","He/Him","She/Them","He/Them","Ze/Zir","Xe/Xem","Sie/Hir","They/Them","Pronouns: Ask me!");

        function change2() {
        x++;
        if (x == pronouns.length) {
        x = 0;
        }
        document.getElementById("pronoun").innerHTML = `${pronouns[x]}`;
        }

        var y = 0;
        var logoqr = new Array("assets/images/lq1.png","assets/images/lq2.png");

        function change3() {
        y++;
        if (y == logoqr.length) {
        y = 0;
        }
        document.getElementById("queerc").style.backgroundImage= `url('${logoqr[y]}')`
        }

    </script>
    </div>
</body>
</html>
