<?php
include_once 'Request.php';
include_once 'Router.php';
$router = new Router(new Request);

include './model/dbmodel.php';

include './controller/reloadindex.php';
include './controller/reloadadd.php';
include './controller/gethistory.php';
include './controller/reloadaddnocard.php';
include './controller/loadcompcheckout.php';
include './controller/getcomphistory.php';

$router->get('/', function() {
        reloadindex();
    });

$router->get('/add', function() {
        reloadadd();
    });

$router->get('/history', function() {       
        include_once './views/history.php';
    });

$router->get('/addnocard', function() {
        reloadaddnocard();
    });

$router->get('/compcheckout', function($request) {
        loadcompcheckout();
    });

$router->get('/comphistory', function($request) {
        include_once './views/comphistory.php';        
    });


// insert transaction into db
$router->post('/submitsignin', function($request) {
        $DB = new DB();

        //get card number input and match with name in database
        $bcNum = $_POST['bcNum'];
        $getNameStatement = "SELECT name FROM FMLTRACNameList WHERE card = '$bcNum'";
        $results = $DB->select($getNameStatement, array());
        $row = $results;
        $rowZero = $row[0][0];
        $signInStatement = "INSERT into SignIn (card, name, time, date, notes) VALUES ('$bcNum', '$rowZero', TIME('now', 'localtime'), DATE('now', 'localtime'), NULL);";
        $DB->select($signInStatement, array());

        reloadindex();
    });

$router->post('/deletesignin', function($request) {
        $DB = new DB();

        $transidTwo = $_POST['deleteTrans'];               
        $deleteSigninQuery = "DELETE FROM SignIn WHERE transid = '$transidTwo'";
        $DB->select($deleteSigninQuery, array());

        reloadindex();
    });

$router->post('/addnotes', function($request) {
        $DB = new DB();
        
        $notesText = $_POST['notesText'];
        $transIdThree = $_POST['transIdThree'];
        $addNotesQuery = "UPDATE SignIn SET notes = '$notesText' WHERE transid = '$transIdThree'";
        $DB->select($addNotesQuery, array());

        reloadindex();
    });

$router->post('/addnamecard', function($request) {
        $DB = new DB();

        // obtain card and name
        $inputPatronCard = $_POST['inputpatron'];
        $inputPatronName = $_POST['inputpatron2'];
        // query
        $addQuery = "INSERT INTO FMLTRACNameList (card, name) VALUES ('$inputPatronCard','$inputPatronName')";
        $DB->select($addQuery, array());

        reloadadd();
    });

$router->post('/deletenamecard', function($request) {
        $DB = new DB();

        $patronCard = $_POST['patronCard'];
        $deleteQuery = "DELETE FROM FMLTRACNameList WHERE card = '$patronCard'";
        $DB->select($deleteQuery, array());

        reloadadd();       
    });

$router->post('/gethistory', function($request) {
        gethistory();
    });

$router->post('/deletehistory', function($request) {
        $DB = new DB();
        $inputDate = $_POST['inputDate'];
        $inputDate2 = $_POST['inputDate2'];
        $transid = $_POST['datesRow'];
        $delQuery = "DELETE FROM SignIn WHERE transid = '$transid'";
        $DB->select($delQuery, array());        
        gethistory();
    });

    $router->post('/addnocard', function($request) {
        $DB = new DB();
        $inputNoCardName = $_POST['nocardpatronname'];
        $noCardDateTime = date("F j, Y h:i:s");
        $addNoCardQuery = "INSERT INTO FMLTRACNoCardList (name, date) VALUES ('$inputNoCardName','$noCardDateTime')";
        $DB->select($addNoCardQuery, array());
        reloadaddnocard();
    });

    $router->post('/deletenocard', function($request) {
        $DB = new DB();

        $patronNoCardDateTime = $_POST['patronNoCardDateTime'];
        $deleteNoCardQuery = "DELETE FROM FMLTRACNoCardList WHERE date = '$patronNoCardDateTime'";
        $DB->select($deleteNoCardQuery, array());

        reloadaddnocard();       
    });
    
$router->post('/submitcompcheckout', function($request) {
        $DB = new DB();
        $ptName = $_POST['ptName'];
        $comp = $_POST['comp'];
        $periph = $_POST['periph'];
        $compOutStatement = "INSERT into CompOut (name, time, date, computer, peripheral) VALUES ('$ptName', TIME('now', 'localtime'), DATE('now', 'localtime'), '$comp', '$periph');";
        $DB->select($compOutStatement, array());      
        loadcompcheckout();
    });

$router->post('/deletecompcheckout', function($request) {
        $DB = new DB();
        $transidTwo = $_POST['deleteTrans'];               
        $deleteSigninQuery = "DELETE FROM CompOut WHERE transid = '$transidTwo'";
        $DB->select($deleteSigninQuery, array());      
        loadcompcheckout();
    });

$router->post('/savereturned', function($request) {
        $DB = new DB();
        $transID = $_POST['transID'];
        $checkbox = $_POST['checkbox'];
        $returnedQuery = "UPDATE CompOut SET returned = '$checkbox' WHERE transid = '$transID'";
        $DB->select($returnedQuery, array());  
        loadcompcheckout();
    });

$router->post('/getcomphistory', function() {
        getcomphistory();
    });

$router->post('/deletecomphistory', function() {
        $DB = new DB();
        $inputDate = $_POST['inputDate'];
        $inputDate2 = $_POST['inputDate2'];
        $transid = $_POST['datesRow'];
        $delQuery = "DELETE FROM CompOut WHERE transid = '$transid'";
        $DB->select($delQuery, array()); 
        getcomphistory();
    });