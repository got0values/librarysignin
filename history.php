<?php
    include_once 'header.php';
?>

<div id="main">

    <title>History</title>

    <h2 class="text-center mb-5" id='dateTitle'>History</h2>

    <?php
    try{
        // connect to sqlitedb
        $pdo = new PDO('sqlite:signin.db');

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    if (isset($_GET['dateSubmit'])) {
        $inputDate = $_GET['inputDate'];
        $inputDate2 = $_GET['inputDate2'];
    }

    ?>

    <div class="d-flex justify-content-center">
        <form action="history.php" method="get">
            <label>Date Range:</label>    
            <input class="mb-5" type="date" name="inputDate" id="inputDate" value=<?php echo $inputDate ?>>
             - 
            <input class="mb-5" type="date" name="inputDate2" id="inputDate2" value=<?php echo $inputDate2 ?>>
            <input type="submit" class="btn btn-outline-secondary" name="dateSubmit" id="button-addon2">
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
            $pdo = new PDO('sqlite:signin.db');
            //$getDateInput = "SELECT * FROM SignIn WHERE date = '$inputDate'";            
            $getDateInput = "SELECT * FROM SignIn WHERE date BETWEEN '$inputDate' AND '$inputDate2'";
            $getSelDateStats = $pdo->query($getDateInput);       
            if(isset($_GET['delete'])) {    
                $inputDate = $_GET['inputDate'];
                $transid = $_GET['datesRow'];
                $delQuery = "DELETE FROM SignIn WHERE transid = '$transid'";
                $pdo->query($delQuery);
            };
            $i = 1;
            foreach ($getSelDateStats as $datesRow) {
                echo "<tr>";
                echo    "<td>" . $i++ . "</td>";
                echo    "<td>";
                echo        "<form action='history.php' method='get'>";
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


    <!-- <script type="text/javascript" src="history.js"></script> -->

    <script>
        let navListItem = document.querySelectorAll(".nav-list-item")
        let navLink = document.querySelectorAll(".nav-link")
        navLink[2].style.color = "black";
        navListItem[2].style.backgroundColor = "lightskyblue";
    </script>

</div>

<?php
    include_once 'footer.php';
?>