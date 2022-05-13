<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../public/style.css">
    <title>Library Sign In</title>
</head>
<body>
<nav id="nav">
    <div class="nav-section">
        <div class="nav-section-title">
            <h5>
                Library Sign In
            </h5>
        </div>
        <ul class="nav-list">
            <li class="nav-list-item">
                <a class="nav-link" href='/'>
                    <i class="fa-solid fa-table-list"></i> 
                    Sign In
                </a>
            </li>
            <li class="nav-list-item">
                <a class="nav-link" href='/add'>
                    <i class="fa-solid fa-people-group"></i> 
                    Add Patron
                </a>
            </li>
            <li class="nav-list-item">
                <a class="nav-link" href='/history'>
                    <i class="fa-solid fa-book"></i> 
                    History
                </a>
            </li>
            <li class="nav-list-item">
                <a class="nav-link" href='/addnocard'>
                    <i class="fa-solid fa-user-slash"></i> 
                    Add No Card
                </a>
            </li>
        </ul>
    </div>
    <div class="nav-section">
        <div class="nav-section-title">
            <h5>
                Computer Checkout
            </h5>
        </div>
        <ul class="nav-list">
            <li class="nav-list-item">
                <a class="nav-link" href='/compcheckout'>
                    <i class="fa-solid fa-laptop"></i> 
                    Checkout
                </a>
            </li>
            <li class="nav-list-item">
                <a class="nav-link" href='/comphistory'>
                <i class="fa-solid fa-laptop-file"></i> 
                    History
                </a>
            </li>
        </ul>
    </div>
</nav>