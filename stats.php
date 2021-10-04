<?php
    include_once './views/header.php';

    ini_set('display_errors',1);
    error_reporting(-1);

    require_once("./controller/statscontroller.php");
?>

<div id="main">

    <title>Stats</title>

    <h2 class="text-center mb-5" id='dateTitle'>Stats</h2>

    <div class="d-flex justify-content-center">
        <form action="stats.php" method="get">
            <label>Month:</label>    
            <input class="mb-5" type="month" name="dateInput" id="dateInput" value=<?php if(isset($inputDate)) {echo $inputDate;} ?>>
            <input type="hidden" id="inputDate" name="inputDate">
            <button class="btn btn-outline-secondary" name="dateSubmit" value="$dateInput" type="submit" id="button-addon2">Submit</button>
        </form>
    </div> 

    <table class="table table-hover container">
    <thead>
        <tr>
            <th scope="col"></th>    
            <th scope="col"></th>
            <th scope="col">Barcode</th>
            <th scope="col">Name</th>
            <th scope="col">Time</th>
            <th scope="col">Date</th>
            <th scope="col">Notes</th>
        </tr>
    </thead>
    <tbody id="tBody">
        <?php
            
            $i = 1;
            foreach ($getSelDateStats as $datesRow) {
                echo "<tr>";
                echo    "<td>" . $i++ . "</td>";
                echo    "<td>";
                echo        "<form action='stats.php' method='get'>";
                echo            "<input type='hidden' name='inputDate' value='$inputDate'>";
                echo            "<input type='hidden' name='datesRow' value='$datesRow[0]'>";
                echo            "<input type='submit' id='delete' name='delete' value='Delete' class='btn btn-danger btn-sm'>";
                echo        "</form>";
                echo    "</td>";
                echo    "<td>" . $datesRow[1] . "</td><td>" . $datesRow[2] . "</td><td>" . date("h:i:s a", strtotime($datesRow[3])) . "</td><td>" . date("M d, Y", strtotime($datesRow[4])) . "</td><td>" . $datesRow[5] . "</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
    </table>


    <script type="text/javascript" src="./public/stats.js"></script>

    <script>
        let navListItem = document.querySelectorAll(".nav-list-item")
        let navLink = document.querySelectorAll(".nav-link")
        navLink[3].style.color = "black";
        navListItem[3].style.backgroundColor = "lightskyblue";
    </script>

</div>

<?php
    include_once './views/footer.php';
?>