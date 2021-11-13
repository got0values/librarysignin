<?php
    include_once './views/header.php';

    ini_set('display_errors',1);
    error_reporting(-1);
?>

<div id="main">

    <title>Computer History</title>

    <h2 class="text-center mb-5" id='dateTitle'>Computer History</h2>

    <div class="d-flex justify-content-center">
        <form action="/getcomphistory" method="post">
            <label>Date:</label>    
            <input class="mb-5" type="date" name="inputDate" value=<?php if (isset($_GET['dateSubmit'])) {echo $inputDate;} ?>>
             - 
            <input class="mb-5" type="date" name="inputDate2" value=<?php if (isset($_GET['dateSubmit'])) {echo $inputDate2;} ?>>
            <input class="btn btn-outline-secondary" name="dateSubmit" type="submit">
        </form>
    </div> 

    <div class='container'>
        <div class='card shadow'>
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
                    <th scope="col">Returned</th>
                </tr>
            </thead>
            <tbody id="tBody">
                <?php
                    $i = 1;
                    if (isset($getSelDateStats)){
                        foreach ($getSelDateStats as $datesRow) {
                            echo "<tr>";
                            echo    "<td>" . $i++ . "</td>";
                            echo    "<td>";
                            echo        "<form action='/deletecomphistory' method='post'>";
                            echo            "<input type='hidden' name='inputDate' value='$inputDate'>";
                            echo            "<input type='hidden' name='inputDate2' value='$inputDate2'>";
                            echo            "<input type='hidden' name='datesRow' value='$datesRow[0]'>";
                            echo            "<input type='submit' id='delete' name='delete' value='Delete' class='btn btn-danger btn-sm'>";
                            echo        "</form>";
                            echo    "</td>";
                            echo    "<td>" . $datesRow[1] . "</td>";
                            echo    "<td>" . date("h:i:s a", strtotime($datesRow[2])) . "</td>";
                            echo    "<td>" . date("M d, Y", strtotime($datesRow[3])) . "</td>";
                            echo    "<td>" . $datesRow[4] . "</td>";
                            echo    "<td>" . $datesRow[5] . "</td>";
                                if ($datesRow[6] == 1) {
                            echo    "<td>yes</td>";
                                }
                                else if ($datesRow[6] == 0) {
                            echo    "<td>no</td>";
                                }
                                else {
                            echo    "<td>?</td>";
                                }    
                            echo "</tr>";
                        }
                    }
                ?>
            </tbody>
            </table>
        </div>
    </div>

    <!-- <script type="text/javascript" src="../signin/history.js"></script> -->

    <script>
        let navListItem = document.querySelectorAll(".nav-list-item")
        let navLink = document.querySelectorAll(".nav-link")
        navLink[5].style.color = "black";
        navListItem[5].style.backgroundColor = "lightskyblue";
    </script>

</div>

<?php
    include_once './views/footer.php';
?>