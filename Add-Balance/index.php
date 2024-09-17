<?php
include '../php/login_request.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BudgetEase</title>
    <link rel="icon" type="image/png" href="./img/—Pngtree—money bag with dollar icon_15308302.png" sizes="32x32">
    <link rel="stylesheet" href="./stylesheet.css">
</head>

<body>

    <header>
        <div class="section-container">
            <nav class="top-navbar">
                <div class="logo-img">
                    <div class="nav-img">
                        <img src="./img/—Pngtree—money bag with dollar icon_15308302.png">
                    </div>
                    <div class="nav-bar">
                        <p>BudgetEase</p>
                    </div>
                </div>
                <div class="menu-list">
                    <ul class="nav-bar-list">
                        <li class="main-menu"><a><span><i class="fa-solid fa-house"></i></span>Main Menu</a></li>
                        <li class="add-expense"> <a><span><i class="fa-solid fa-wallet"></i></span>Add Expense</a></li>
                        <li class="settings"><a><span><i class="fa-solid fa-gear"></i></span>Settings</a></li>
                        <li class="balance"><a><span><i class="fa-solid fa-scale-balanced"></span></i>Balance</a></li>
                    </ul>
                </div>
                <div class="username-display">
                <div class="logout">
                    <form action="../php/logout.php" method="POST">
                        <button type="submit" class="btn" id="navbar-login-btn">
                            <span id="span_logout"><i class="fa-solid fa-right-from-bracket"></i>Logout</span>
                        </button>
                    </form>
                </div>
                <div class="menu-compress">
                    <button id="open-navbar-menu"><i class="fa-solid fa-bars"></i></button>
                    <div class="menu-components slide-menu">
                        <button id="close-menu-drop"><i class="fa-solid fa-xmark"></i></button>
                        <ul class="drop-down">
                            <li class="main-menu"><a><span><i class="fa-solid fa-house"></i></span>Main Menu</a></li>
                            <li class="add-expense"><a><span><i class="fa-solid fa-wallet"></i></span>Add Expense</a></li>
                            <li class="settings"><a><span><i class="fa-solid fa-gear"></i></span>Settings</a></li>
                            <li class="balance"><a><span><i class="fa-solid fa-scale-balanced"></span></i>Balance</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>


    <article class="main-section">
        <main>
            <div class="section-container">

                <div class="title">
                    <h1>Add Income</h1>
                </div>

                <div class="main-opitions-container">

                    <div class="option" id="salary">
                        <i class="fa-solid fa-money-check-dollar"></i>
                        <p>Salary</p>
                    </div>

                    <div class="option" id="ebay">
                        <i class="fa-brands fa-ebay"></i>
                        <p>Ebay Sales</p>
                    </div>

                    <div class="option" id="bank">
                        <i class="fa-solid fa-building-columns"></i>
                        <p>Bank Interest</p>
                    </div>

                    <div class="option" id="other">
                        <i class="fa-solid fa-ellipsis"></i>
                        <p>Other</p>
                    </div>
                </div>
            </div>
        </main>
    </article>

    <article class="add-income animate">
        <div class="modal" id="id01">
            <form id="addIncomeForm" class="modal-content section-container">
                <div class="close-modal">
                    <button id="close-modal-btn"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="title-h2">
                    <h2>Add Income</h2>
                    <p id="income-type">Income type</p>
                </div>
                <div class="form-container">
                    <div class="input-container">
                        <i class="fa-solid fa-cash-register icon"></i>
                        <select name="income-method" id="income-methods">
                            <option value="Cash">Cash</option>
                            <option value="transfer">Transfer</option>
                        </select>
                    </div>
                    <div class="input-container">
                        <label for="amount"></label>
                        <i class="fa-solid fa-dollar-sign icon"></i>
                        <input type="number" step="0.01" placeholder="Please Enter Amount" name="amount" >
                    </div>
                    <div class="input-container">
                        <i class="fa-solid fa-calendar-days icon"></i>
                        <input type="date" placeholder="Please Enter Date" name="date">
                    </div>
                    <div class="comment">
                        <div class="question">
                            <label>Do you want to add a comment?</label>
                        </div>
                        <div class="anwser">
                            <input type="radio" id="commentYes" name="addComment" value="yes">
                            <label for="commentYes">Yes</label>
                            <input type="radio" id="commentNo" name="addComment" value="no" checked>
                            <label for="commentNo">No</label>
                        </div>
                    </div>
                    <div class="input-container" id="comment-section">
                        <i class="fa-solid fa-comment icon"></i>
                        <input type="text" placeholder="Comment" name="comment">
                    </div>
                </div>
                <input class="btn" id="submit-income" type="submit" value="Submit">
                <div class="message_php" id="form-message"></div>
            </form>
        </div>
    </article>


    <footer>
        <div class="section-container">
            <div class="contact-info">
                <h3>Contact Me:</h3>
                <p>Email: <a href="mailto:contact@example.com">contact@example.com</a></p>
                <p>Phone: <a href="tel:+1234567890">+1234567890</a></p>
            </div>
        </div>
    </footer>


    <script src="https://kit.fontawesome.com/dbe3cc6cfd.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="./index.js"></script>

</body>

</html>