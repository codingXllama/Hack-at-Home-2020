<?php
ini_set( "display_errors", 0);
error_reporting(0);
include('login/app_logic.php');
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GET IT DONE</title>
        <!-- main css file -->
        <link rel="stylesheet" href="./css/main.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
            integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <!-- font awesome icons -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" <!-- google font import
            -->
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    </head>

    <body>
        <header id="header">
            <!-- START of nav-section -->
            <nav>
                <div id="nav-top">
                    <h3>get<span id="nex">Done</span></h3>
                </div>

                <!-- Creating the nav-links -->
                <ul id="links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#Explore">Learn More</a></li>
                    <li><a href="#">Get Started</a></li>
                    <!-- END of nav-section -->
                </ul> 
            <ul>
                <ul id="userPortal">
                    <li id="login">
                       <?php if(isset($_SESSION['username'])){
                              echo $_SESSION['username'];}
                        else {echo"<a href=login/signin.php>login</a></li>
                       <li id=singUp>
                        <a href=login/signup.php>sign up</a></li>";}?>
                </ul>     
          </nav>
            <!-- Creating the banner (front page)-->
            <section id="banner">
                <div id="banner-box">
                    <!-- <div class="banner-underline"></div> -->
                    <h1 id="banner-title">Get All Your Work Done
                        <div class="banner-underline"></div> with <span id="nex"> get</span>Done</h1>
                    <br>
                    <br>
                    <a href="#" id="nex"><i id="arrowRight" class="fas fa-arrow-right"></i>&nbsp;Get Working</a>
                </div>
            </section>
        </header>

        <!-- Explore Section -->
        <section id="Explore" class="">
            <!-- title -->
            <div class="title">
                <h1 class="title-text">Learn More</h1>
            </div>
            <!-- End of title -->
            <div class="Explore-center">
                <article class="Explore">
                    <i class="fa fa-question"></i>
                    <h3>About</h3>
                    <p class='info'>A Productivity Application that Uses ML to predict the best time for getting work
                        done
                    </p>
                </article>
                <article class="Explore">
                    <i class="fa fa-question"></i>
                    <h3>Features</h3>
                    <ol id="features">
                        <li>Create Tasks</li>
                        <li>Set Duration for tasks</li>
                        <li>Complete a random happy activity</li>
                        <li>Let ML find your productive time</li>
                        <li>You Discover the rest!</li>
                    </ol>
                </article>
                <article class="Explore">
                    <i class="fa fa-question"></i>
                    <h3>Why Bother</h3>
                    <p>This app is targeted towards those who are trying to self improve and manage a work life balance.
                    </p>
                </article>
            </div>
        </section>
        <!-- End of Explore Section -->


        <!-- User Portal 
        <section id="userPortal" class="dark-section blank">
            
            <div class="userPortal dark-section">
                <h1 class="title-text">User Portal</h1>
                <div class="userPortal-subSection">
                    <h3 id="userPortal-subtitle">Login or Register to Make posts/interact with our Community!</h3>
                </div>
            </div>
            <div class="user-center">
                <article id="user-login">
                    <form class="login-form">
                        <input type="text" id="username" placeholder="Username">
                        <input type="password" id="password" placeholder="Password">
                    </form>
                    <a href="#" class="logIn">Login</a>

                    <a href="signUp.html" target="_blank" class="singUp">Click <span id="here">here</span> to sign
                        up!</a>

                </article>
            </div>
        </section>
         End of User portal -->




        <!-- Get Started Section -->
        <section id="app">
            <section id="app" class="">
                <!-- title -->
                <div class="title">
                    <h1 class="title-text">Learn More</h1>
                </div>
                <!-- End of title -->
                <div class="app-center">
                    <article class="app">
                        <i class="fa fa-question"></i>
                        <h3>About</h3>
                        <p class='info'>A Productivity Application that Uses ML to predict the best time for getting
                            work
                            done
                        </p>
                    </article>
                    <article class="app">
                        <i class="fa fa-question"></i>
                        <h3>Features</h3>
                        <ol id="features">
                            <li>Create Tasks</li>
                            <li>Set Duration for tasks</li>
                            <li>Complete a random happy activity</li>
                            <li>Let ML find your productive time</li>
                            <li>You Discover the rest!</li>
                        </ol>
                    </article>
                    <article class="app">
                        <i class="fa fa-question"></i>
                        <h3>Why Bother</h3>
                        <p>This app is targeted towards those who are trying to self improve and manage a work life
                            balance.
                        </p>
                    </article>
                </div>

            </section>
            <!-- End of Explore Section -->








            <!-- Scripts -->
            <script src="https://code.jquery.com/jquery-3.4.1.js"
                integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

            <script src="./script1.js"></script>



    </body>

</html>
