<?php
    include_once './views/header.php';

    ini_set('display_errors',1);
    error_reporting(-1);
?>

<div id="main">

    <title>Add Card</title>

    <h2 class="text-center mb-5">Add Card</h2>

    <div class="container input-group mb-3">
        <form action="/addnamecard" method="post">
            <label>Card:</label>
            <input type="text" name="inputpatron">
            <label>Name:</label>
            <input type="text" name="inputpatron2">
            <input class="btn btn-outline-secondary" name="namecardsubmit" value="Submit" type="submit">
        </form>
    </div> 

    <?php
        echo "<div class='container'>";
        echo    "<div class='card shadow'>";    
        echo "<table class='table table-hover container'>";
        echo "<th class='text-center'></th><th class='text-center'></th><th class='text-center'>" . 'Name' . "</th><th class='text-center'>" . 'Barcode' . "</th>";
        echo "<tbody>";
        $i = 1; 
        foreach($cardQueryResult as $cardRow) {
            echo "<tr>";
            echo "<td>" . $i++ . "</td>";
            echo 
            "<td class='text-center'><form action='/deletenamecard' method='post'>
                <input type='submit' name='deletePatronButton' class='btn btn-danger btn-sm' value='Delete'>
                <input type='hidden' name='patronCard' value='$cardRow[0]'>
            </form></td>";
            echo "<td class='text-center'>" . $cardRow[1] . "</td><td class='text-center'>" . $cardRow[0] . "</td>";
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
        navLink[1].style.color = "black";
        navListItem[1].style.backgroundColor = "lightskyblue";
    </script>

</div>

<?php
    include_once './views/footer.php';
?>