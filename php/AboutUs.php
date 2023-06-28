<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/aboutus.css">
    <script src="https://kit.fontawesome.com/38b6b4f5e7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
    <title>About Us</title>
</head>

<body>

    <!-- HEADER -->

    <?php
    include 'includes/header.php';
    ?>

    <div class="content1">


<!-- Achievements -->
<section class="about__achievements">
    <div class="container about__achievements-container">
        <div class="about__achievements-left">
            <img class="img" src="../images/about achievements.svg" alt="">
        </div>
        <div class="about__achievements-right">
            <h1>Our Achievements</h1>
            <p>Our global community and our exam catalog get bigger every day.Check out our latest numbers as of May 2022.</p>
            <div class="achievements__cards">
                <article class="achievements__card">
                    <span class="achievement__icon">
                        <i class="uil uil-book"></i>
                    </span>
                    <h3>10+</h3>
                    <p>Exams</p>
                </article>

                <article class="achievements__card">
                    <span class="achievement__icon">
                        <i class="uil uil-users-alt"></i>
                    </span>
                    <h3>100+</h3>
                    <p>Users</p>
                </article>

                <article class="achievements__card">
                    <span class="achievement__icon">
                        <i class="uil uil-trophy"></i>
                    </span>
                    <h3>8+</h3>
                    <p>Awards</p>
                </article>

            </div>
        </div>
    </div>
</section>

        <section class="section">
            <div class="image">
                <img src="https://cdn.pixabay.com/photo/2017/08/26/23/37/business-2684758__340.png">
            </div>

            <div class="content">
                <h2>A+ Exams</h2>
                
                <p>We help organizations of all types and sizes prepare for the path ahead — wherever it leads. Our curated collection of business and technical courses help companies, governments, and nonprofits go further by placing learning at the center of their strategies.!</p>
                <ul class="links">
                    <li><a href="">TAKE EXAM</a></li>
                    <div class="vertical-line"></div>
                    <li><a href="#">VIEW RESULT</a></li>
                </ul>
                
            </div>
        </section><br><br>

<br><br><br><br>

    <?php

    include('includes/footer.php');

    ?>


</body>

</html>