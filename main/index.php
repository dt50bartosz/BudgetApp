<?php 
include '../php/login_request.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"
        href="./assets/img/—Pngtree—money bag with dollar icon_15308302.png">
    <link rel="stylesheet" href="./stylesheet.css">

    <title>BudgetEase</title>
</head>

<body>

    <header>
        <nav>
            <div class="navbar-logo">
                <div class="navbar-logo-img">
                    <img src="./img/—Pngtree—money bag with dollar icon_15308302.png" alt="BudgetEase Logo">
                </div>
                <div class="navbar-name">
                    <p>BudgetEase</p>
                </div>
            </div>
            <div class="username-display">
                <p>UserLogin:<span>  <?php echo $_SESSION["username"]  ?>        </span></p>
            </div>
            <form action="../php/logout.php">
            <button class="btn" id="navbar-login-btn">Logout</button>
            </form>
        </nav>
    </header>




    <article class="main-section">
        <div class="section-container">
            <main class="menu">
                <div class="container">
                    <div class="add-income icon-container">
                        <i class="fa-solid fa-dollar-sign icon"></i>            
                        <p>Add Income</p>
                    </div>
                    <div class="add-expense icon-container ">
                        <i class="fa-solid fa-wallet icon"></i>
                        <p>Add Expense</p>
                    </div>
                </div>
                <div class="container2">
                    <div class="setting  icon-container">
                        <i class="fa-solid fa-cog icon"></i>
                        <p>Settings</p>
                    </div>
                    <div class="balance  icon-container">
                        <i class="fa-solid fa-scale-balanced icon"></i>
                        <p>Balance</p>
                    </div>
    
                </div>  
                
            </main>

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