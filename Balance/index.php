<?php
include '../php/balance.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BudgetEase</title>
    <link rel="icon" type="image/png" href="./img/—Pngtree—money bag with dollar icon_15308302.png" sizes="32x32">
    <link rel="stylesheet" href="./stylesheet.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>

<body>
    <header>
        <div class="section-container">
            <nav class="top-navbar">
                <div class="logo-img">
                    <div class="nav-img">
                        <img src="./img/—Pngtree—money bag with dollar icon_15308302.png" alt="BudgetEase Logo">
                    </div>
                    <div class="nav-bar">
                        <p>BudgetEase</p>
                    </div>
                </div>
                <div class="menu-list">
                    <ul class="nav-bar-list">
                        <li class="main-menu"><span><i class="fa-solid fa-house"></i></span>Main Menu</li>
                        <li class="add-income"><span><i class="fa-solid fa-dollar-sign"></i></span>Add Income</li>
                        <li class="add-expense"><span><i class="fa-solid fa-wallet"></i></span>Add Expense</li>
                        <li class="settings"><span><i class="fa-solid fa-gear"></i></span>Settings</li>
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
                            <li class="add-income"><a><span><i class="fa-solid fa-wallet"></i></span>Add Income</a></li>
                            <li class="add-expense"><a><span><i class="fa-solid fa-gear"></i></span>Settings</a></li>
                            <li class="settings"><a><span><i class="fa-solid fa-scale-balanced"></span></i>Balance</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <article>
        <main class="display-budget">
            <div class="section-container">
                <div class="main-section-navbar">
                    <div class="navbar-title">
                        <h1>Transactions</h1>
                    </div>
                    <div class="total-income total">
                        <i class="fa-solid fa-arrow-trend-up"></i>
                        <p id="totalIncome"></p>
                    </div>
                    <div class="total-expense total">
                        <i class="fa-solid fa-arrow-trend-down"></i>
                        <p id="totalExpenses"></p>
                    </div>
                </div>
                <hr>
                <div class="select-dates">
                    <form id="update-table" class="dates">
                        <div class="start-date date">
                            <label for="first-day">From</label>
                            <div class="input-container">
                                <i class="fa-solid fa-calendar-days icon"></i>
                                <input id="first-day" name="start-date" type="date" placeholder="Start date">
                            </div>
                        </div>
                        <div class="finish-date date">
                            <label for="current-date">End Date</label>
                            <div class="input-container">
                                <i class="fa-solid fa-calendar-days icon"></i>
                                <input id="current-date" name="finish-date" type="date" placeholder="Finish date">
                            </div>
                        </div>
                        <div class="transaction-type date">
                            <label for="transaction-type">Transaction Type</label>
                            <div class="input-container">
                                <i class="fa-solid fa-money-bill-transfer icon"></i>
                                <select name="transaction" id="transaction-type">
                                    <option id="selected-value-display" value="all-transaction">All Transaction</option>
                                    <option id="selected-value-display" value="income">Income</option>
                                    <option id="selected-value-display" value="expense">Expense</option>
                                </select>
                            </div>
                        </div>
                        <div class="date">
                            <button type="submit" class="btn" id="display-btn">Display</button>
                        </div>

                    </form>
                    <div class="display-piechart">
                        <p id="display-piechart">Display Pie Chart</p>
                    </div>
                </div>
                <div class="table-container">
                    <table id="transactionsTable">
                        <tr>
                            <th>Transaction Type</th>
                            <th>Transaction Methods</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Category</th>
                            <th>Comment</th>
                            <th>Action</th>
                        </tr>
                    </table>
                </div>
            </div>
        </main>
    </article>

    <article class="animate">
        <div class="modal" id="id01">
            <div class="modal-content section-container">
                <div class="close-modal">
                    <button id="close-modal-btn"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="piechart-container">
                    <canvas id="myChart" style="width:100%;max-width:800px"></canvas>
                </div>
            </div>
        </div>
    </article>

    <article class="animate">
        <div class="modal" id="id02">
            <div class="modal-content section-container">
                <div class="edit-title">
                    <p>Edit Transaction</p>
                </div>
                <div class="close-modal">
                    <button id="close-modal-btn"><i class="fa-solid fa-xmark edit"></i></button>
                </div>
                <div>
                    <form id="edit-form">
                        <div class="date">
                            <label for="new-date">Edit Date</label>
                            <div class="input-container">
                                <i class="fa-solid fa-calendar-days icon"></i>
                                <input id="new-date" name="date" type="date" placeholder="New Date">
                            </div>
                        </div>
                        <div class="date">
                            <label for="new-amount">Edit Amount</label>
                            <div class="input-container">
                                <i class="fa-solid fa-dollar-sign icon"></i>
                                <input id="new-amount" name="amount" min="0.00" type="number" step="0.01" placeholder="Amount">
                            </div>
                        </div>
                        <div class="date">
                            <label for="new-comment">Edit Comment</label>
                            <div class="input-container">
                                <i class="fa-solid fa-comment icon"></i>
                                <input id="new-comment" name="comment" type="text" placeholder="Comment">
                            </div>
                        </div>
                        <div class="btn-container">
                            <button type="submit" class="btn" id="save-changes-btn">Save Changes</button>
                            <button  class="btn" id="cancel-btn">Cancel</button>
                        </div>
                        <p id="edit-message" class="message"></p>
                    </form>
                </div>
            </div>
        </div>
    </article>

    <article class="animate">
        <div class="modal" id="id03">
            <div class="modal-content section-container">
            <div class="close-modal">
                    <button id="close-modal-btn"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="edit-title">
                    <p>Delete Transaction</p>
                </div>
                <div class="delete-txt">
                    <p>Do you want to delete this transaction permanently?</p>
                </div>
                <div>
                    <form id="delete-form">
                        <div class="btn-container">
                            <button type="submit" class="btn" id="delete-btn">Confirm</button>
                            <button  class="btn" id="delete-cancel-btn">Cancel</button>
                        </div>
                        <p id="delete-message" class="massage"></p>
                    </form>
                </div>
            </div>
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