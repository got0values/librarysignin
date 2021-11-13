<?php
    include_once './views/header.php';

    ini_set('display_errors',1);
    error_reporting(-1);
?>

<div id="main">

    <h2 class="text-center mb-5">Add "No Card" Patron</h2>

    <div class="container input-group mb-3">
        <form action="/addnocard" method="post">
            <label>Name:</label>
            <input type="text" name="nocardpatronname">
            <input class="btn btn-outline-secondary" name="nocardsubmit" value="Submit" type="submit">
        </form>
    </div> 

    <?php
        echo "<div class='container'>";
        echo    "<div class='card shadow'>";    
        echo "<table class='table table-hover container'>";
        echo "<th class='text-center'></th><th class='text-center'></th><th class='text-center'>" . 'Name' . "</th><th class='text-center'>" . 'Date' . "</th>";
        echo "<tbody>";
        $i = 1; 
        foreach($noCardQueryResult as $cardRow) {
            echo "<tr>";
            echo "<td>" . $i++ . "</td>";
            echo 
            "<td class='text-center'><form action='/deletenocard' method='post'>
                <input type='submit' name='deleteNoPatronButton' class='btn btn-danger btn-sm' value='Delete'>
                <input type='hidden' name='patronNoCardDateTime' value='$cardRow[1]'>
            </form></td>";
            echo "<td class='text-center'>" . $cardRow[0] . "</td><td class='text-center'>" . $cardRow[1] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo      "</div>";
        echo   "</div>";
        
    ?>

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