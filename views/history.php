<?php
    include_once './views/header.php';

    ini_set('display_errors',1);
    error_reporting(-1);
    
?>

<div id="main">

    <title>History</title>

    <h2 class="text-center mb-5" id='dateTitle'>History</h2>

    <div class="d-flex justify-content-center">
        <form action="/gethistory" method="post">
            <label>Date Range:</label>    
            <input class="mb-5" type="date" name="inputDate" id="inputDate" value=<?php if (isset($inputDate)) {echo $inputDate;} ?>>
             - 
            <input class="mb-5" type="date" name="inputDate2" id="inputDate2" value=<?php if (isset($inputDate2)) {echo $inputDate2;} ?>>
            <input type="submit" class="btn btn-outline-secondary" name="dateSubmit" id="button-addon2">
        </form>
    </div> 

    <div class='container'>
        <div class='card shadow'>
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
                    if (isset($getSelDateStats)) {
                        foreach ($getSelDateStats as $datesRow) {
                            echo "<tr>";
                            echo    "<td>" . $i++ . "</td>";
                            echo    "<td>";
                            echo        "<form action='/deletehistory' method='post'>";
                            echo            "<input type='hidden' name='inputDate' value='$inputDate'>";
                            echo            "<input type='hidden' name='inputDate2' value='$inputDate2'>";
                            echo            "<input type='hidden' name='datesRow' value='$datesRow[0]'>";
                            echo            "<input type='submit' id='delete' name='delete' value='Delete' class='btn btn-danger btn-sm'>";
                            echo        "</form>";
                            echo    "</td>";
                            echo    "<td>" . $datesRow[1] . "</td><td>" . $datesRow[2] . "</td><td>" . date("h:i:s a", strtotime($datesRow[3])) . "</td><td>" . date("M d, Y", strtotime($datesRow[4])) . "</td><td>" . $datesRow[5] . "</td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </tbody>
            </table>
        </div>
    </div>

    <script>
        let navListItem = document.querySelectorAll(".nav-list-item")
        let navLink = document.querySelectorAll(".nav-link")
        navLink[2].style.color = "black";
        navListItem[2].style.backgroundColor = "lightskyblue";
    </script>

</div>

<?php
    include_once './views/footer.php';
?>