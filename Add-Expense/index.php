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
                        <li class="add-income"> <a><span><i class="fa-solid fa-wallet"></i></span>Add Income</a></li>
                        <li class="settings"><a><span><i class="fa-solid fa-gear"></i></span>Settings</a></li>
                        <li class="balance"><a><span><i class="fa-solid fa-scale-balanced"></span></i>Balance</a></li>
                    </ul>
                </div>
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
                            <li class="add-income"> <a><span><i class="fa-solid fa-wallet"></i></span>Add Income</a></li>
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
                    <h1>Add Expense</h1>
                </div>
                <div class="main-opitions-container">
                    <div class="option" id="food">
                        <i class="fa-solid fa-bowl-food"></i>
                        <p>Food</p>
                    </div>

                    <div class="option" id="rent">
                        <i class="fa-solid fa-house"></i>
                        <p>Rent</p>
                    </div>

                    <div class="option" id="transport">
                        <i class="fa-solid fa-car"></i>
                        <p>Transport</p>
                    </div>

                    <div class="option" id="telephone">
                        <i class="fa-solid fa-phone"></i>
                        <p>Telephone</p>
                    </div>

                    <div class="option" id="health-care">
                        <i class="fa-solid fa-notes-medical"></i>
                        <p>Health Care</p>
                    </div>

                    <div class="option" id="clothes">
                        <i class="fa-solid fa-shirt"></i>
                        <p>Clothes</p>
                    </div>

                    <div class="option" id="hygiene">
                        <i class="fa-solid fa-soap"></i>
                        <p>Hygiene</p>
                    </div>

                    <div class="option" id="family">
                        <i class="fa-solid fa-people-roof"></i>
                        <p>Family</p>
                    </div>

                    <div class="option" id="entertainment">
                        <i class="fa-solid fa-music"></i>
                        <p>Entertainment</p>
                    </div>

                    <div class="option" id="vacation">
                        <i class="fa-solid fa-sun"></i>
                        <p>Vacation</p>
                    </div>

                    <div class="option" id="books">
                        <i class="fa-solid fa-book"></i>
                        <p>Books</p>
                    </div>

                    <div class="option" id="savings">
                        <i class="fa-solid fa-piggy-bank"></i>
                        <p>Savings</p>
                    </div>

                    <div class="option" id="retirement-plan">
                        <i class="fa-brands fa-pied-piper-hat"></i>
                        <p>Retirement Plan</p>
                    </div>

                    <div class="option" id="debts">
                        <i class="fa-solid fa-credit-card"></i>
                        <p>Debts</p>
                    </div>

                    <div class="option" id="charity">
                        <i class="fa-solid fa-heart"></i>
                        <p>Charity</p>
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
            <form id="addExpenseForm" class="modal-content section-container">
                <div class="close-modal">
                    <button id="close-modal-btn"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="title-h2">
                    <h2>Add Expense</h2>
                    <p id="income-type">Income type</p>
                </div>
                <div class="form-container">
                    <div class="input-container">
                        <label for="amount"></label>
                        <i class="fa-solid fa-dollar-sign icon"></i>
                        <input type="number" step="0.01" name="amount" placeholder="Please Enter Amount">
                    </div>
                    <div class="input-container">
                        <i class="fa-solid fa-calendar-days icon"></i>
                        <input type="date" name="date" placeholder="Please Enter Date">
                    </div>
                    <div class="input-container">
                        <i class="fa-solid fa-cash-register icon"></i>
                        <select name="payment-method" id="payment-methods">
                            <option value="Cash">Cash</option>
                            <option value="Debit">Debit Card</option>
                            <option value="Credit">Credit Card</option>
                        </select>
                    </div>
                    <div class="comment">
                        <div class="question">
                            <label>Do you want to add a comment?</label>
                        </div>
                        <div class="anwser">
                            <input type="radio" id="commentYes" name="addComment" f value="yes">
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