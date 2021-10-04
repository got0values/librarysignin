<?php
    include_once './views/header.php';

    ini_set('display_errors',1);
    error_reporting(-1);

    include_once("./controller/compstatscontroller.php");
?>

<div id="main">

    <title>Comp Stats</title>

    <h2 class="text-center mb-5" id='dateTitle'>Comp Stats</h2>

    <div class="d-flex justify-content-center">
        <form action="compstats.php" method="get">
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
            <th scope="col">Name</th>
            <th scope="col">Time</th>
            <th scope="col">Date</th>
            <th scope="col">Computer</th>
            <th scope="col">Peripheral</th>
        </tr>
    </thead>
    <tbody id="tBody">
        <?php
            $i = 1;
            if(isset($getSelDateStats)){
                foreach ($getSelDateStats as $datesRow) {
                    echo "<tr>";
                    echo    "<td>" . $i++ . "</td>";
                    echo    "<td>";
                    echo        "<form action='compstats.php' method='get'>";
                    echo            "<input type='hidden' name='inputDate' value='$inputDate'>";
                    echo            "<input type='hidden' name='datesRow' value='$datesRow[0]'>";
                    echo            "<input type='submit' id='delete' name='delete' value='Delete' class='btn btn-danger btn-sm'>";
                    echo        "</form>";
                    echo    "</td>";
                    echo    "<td>" . $datesRow[1] . "</td><td>" . date("h:i:s a", strtotime($datesRow[2])) . "</td><td>" . date("M d, Y", strtotime($datesRow[3])) . "</td><td>" . $datesRow[4] . "</td><td>" . $datesRow[5] . "</td>";
                    echo "</tr>";
                }
            }
        ?>
    </tbody>
    </table>


    <script type="text/javascript" src="./public/stats.js"></script>

    <script>
        let navListItem = document.querySelectorAll(".nav-list-item")
        let navLink = document.querySelectorAll(".nav-link")
        navLink[6].style.color = "black";
        navListItem[6].style.backgroundColor = "lightskyblue";
    </script>

</div>

<?php
    include_once './views/footer.php';
?>