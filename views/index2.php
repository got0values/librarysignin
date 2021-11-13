<?php
    include_once './views/header.php';
    
    ini_set('display_errors',1);
    error_reporting(-1);

    // require_once("./controller/index.php");
?>

<div id="main">

    <title>Sign In</title>

    <h2 class="text-center mb-5">Sign In</h2>

    <div class="container input-group mb-3">
        <form action="/submitsignin" method="post">
            <input type="text" name="bcNum" placeholder="Barcode" id="bcInput" autofocus>
            <input class="btn btn-outline-secondary" name="bcSubmit" value="Submit" type="submit">
        </form>
    </div> 

    <div class='container'>
        <div class='card shadow'>
            <table class="table table-hover container">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Barcode</th>
                    <th scope="col">Name</th>
                    <th scope="col">Time</th>
                    <th scope="col">Date</th>
                    <th scope="col">Notes</th>
                </tr>
            </thead>
            <tbody id="tBody">
                <?php
                if(isset($curDateStats)) {
                    foreach ($curDateStats as $cdsRow) {
                        echo 
                        "<tr class='trows'>
                            <td>" . $i-- . "</td>
                            <td> 
                            <form action='/deletesignin' method='post'>
                                <input type='submit' name='deleteTwo' value='Delete' class='btn btn-danger btn-sm' value='Delete'>
                                <input type='hidden' name='deleteTrans' value='$cdsRow[0]'>
                            </form>
                            </td><td>" . $cdsRow[1] . "</td><td>" . $cdsRow[2] . "</td><td>" . date("h:i:s a", strtotime($cdsRow[3])) . "</td><td>" . date("M d, Y", strtotime($cdsRow[4])) . "</td><td>" .  
                            "<form action='/addnotes' method='post'>
                                <input type='text' name='notesText' value='$cdsRow[5]'>
                                <input type='submit' name='notesButton' value='Save'>
                                <input type='hidden' name='transIdThree' value='$cdsRow[0]'>                    
                            </form>" . 
                            "</td>
                        </tr>";
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
    navLink[0].style.color = "black";
    navListItem[0].style.backgroundColor = "lightskyblue";
</script>

</div>

<?php
    include_once './views/footer.php';
?>