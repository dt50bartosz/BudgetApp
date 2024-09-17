<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32"
        href="./assests/img/—Pngtree—money bag with dollar icon_15308302.png">
    <link rel="stylesheet" href="./stylesheet.css">

    <title>BudgetEase</title>
</head>

<body>

    <header>
        <nav>
            <div class="navbar-logo">
                <div class="navbar-logo-img">
                    <img src="./assests/img/—Pngtree—money bag with dollar icon_15308302.png" alt="bag full of money">
                </div>
                <div class="navbar-name">
                    <p>BudgetEase</p>
                </div>
            </div>
            <button class="btn" id="navbar-login-btn">Login</button>
        </nav>
    </header>

    <article class="login-form animate">
        <div class="modal" id="id01">
            <form id="login" class="modal-content section-container">
                <div class="img-container">
                    <span id="close-login">&times;</span>
                    <img src="./assests/img/pobrane.png" alt="man standing next to safe full of money, carton">
                </div>
                <div class="text-container">
                    <h2><span>$</span> Start Saving with BudgetEase <span>$</span></h2>
                </div>

                <div class="form-container">
                    <div class="input-container">
                        <i class="fa-solid fa-user icon"></i>
                        <input type="text" id="username"  name="name" placeholder="Username">
                    </div>
                    <div class="input-container">
                        <i class="fa-solid fa-lock icon"></i>
                        <input type="text" id="password" name="user-password" placeholder="Password">
                    </div>
                    <div class="login-newAccount">
                        <button class="btn" id="login-btn" >Login</button>
                        <a id="oper-form-newaccount">Create New Account</a>
                    </div>
                </div>
                <p class="message"></p>
            </form>
        </div>
    </article>

    <article class="signup-form">
        <div class="modal" id="id02">
            <form id="register-form" class="modal-content section-container">
                <div class="img-container">
                    <span id="close-signup">&times;</span>
                    <img class="img-business-man"
                        src="./assests/img/business-man-cartoon-character-in-formal-suit-vector-22952852.jpg"
                        alt="business-man-cartoon-character-in-formal-suit">
                </div>
                <div class="text-container">
                    <h2>Join our community and take charge of your financial future</h2>
                </div>

                <div class="form-container signup">

                    <div class="input-container">
                        <i class="fa-solid fa-user icon"></i>
                        <input type="text" id="name" name="name" placeholder="Name">
                    </div>

                    <div class="input-container">
                        <i class="fa-solid fa-user icon"></i>
                        <input type="text" id="surname" name="surname" placeholder="Surname" >
                    </div>

                    <div class="input-container">
                        <i class="fa-solid fa-user icon"></i>
                        <input type="text" id="username" name="username" placeholder="Username">
                    </div>

                    <div class="input-container">
                        <i class="fa-solid fa-lock icon"></i>
                        <input type="password" id="password" name="password" placeholder="Password" >
                    </div>

                    <div class="input-container">
                        <i class="fa-solid fa-lock icon"></i>                        
                        <input type="password" id="confirm_password" name="confirm_password"
                        placeholder="Confirm Password">
                        
                    </div>             

                <div class="create-newaccount">
                    <button class="btn" id="create-newaccount-btn">Sign in</button>
                    <button class="btn" id="cancel" >Cancel</button>
                </div>
                <p class="message"> </p>
            </form>
        </div>
    </article>

    <article class="middle section">
        <main class="about-section">
            <div class="section-container">
                <div class="heading-container">
                    <div class="text-heading">
                        <h1>New dimension of budget management!</h1>
                        <p>Save, control expenses, and achieve financial success with the BudgetEasy app</p>
                        <button id="register-btn" class="btn">Register</button>
                    </div>
                    <div class="img-heading">
                        <img src="./assests/img/94afcdbd10118d92aeb71049925235a3.jpg" alt="">
                    </div>
                </div>
            </div>
        </main>
    </article>

    <article class="budget-calculator">
        <div class="section-container">
            <div class="calculator">
                <div class="user-input">
                    <p>Calculate Your Monthly Saving Target</p>
                    <form action="#">
                        <div class="input-container">
                            <i class="fa-solid fa-bullseye icon"></i>
                            <input type="text" id="goal" name="goal" placeholder="e.g., vacation">
                        </div>
                        <div class="input-container">
                            <i class="fa-solid fa-money-bill icon"></i>
                            <input type="number" id="target-amount" name="target-amount" placeholder="$1000" required>
                        </div>
                        <div class="input-container">
                            <i class="fa-regular fa-calendar-days icon"></i>
                            <input type="number" id="timeframe" 
                                placeholder="Enter number of months, e.g., 12 months" required>
                        </div>                        
                    </form>
                    <button id="calculate-btn" class="btn btn-image ">Calculate</button>
                    
                </div>
                <div class="calculator-output">
                    <div class="text-output">
                        <p>To save for your dream <span id="item">item</span>, you need to save monthly:</p>
                        <p id="target-amount-output">$0.00</p>
                    </div>
                    <div class="output-img">
                        <img src="./assests/img/773a60dc44693a76ef272018b0ccf18b.jpg" alt="">
                    </div>
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