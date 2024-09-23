<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=craftex_brand', 'root', '');

$result = $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$form_errors = [];
$newsletter_Email = '';
$newsletter_errors = [];
$success = [];
$success_subscribe = [];
$email = '';
$name = '';
$address = '';
$question = '';
$city = '';
$state = '';
$zip = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    # code...

    $email = $_POST['email'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $question = $_POST['question'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $date = date('Y-m-d H:m:s');

    if (!$email) {
        $form_errors[] = 'Input your email';
    }

    if (!$name) {
        $form_errors[] = 'Input your name';
    }

    if (!$address) {
        $form_errors[] = 'Input your address';
    }

    if (!$question) {
        $form_errors[] = 'Input your question';
    }
    if (!$city || !$state || !$zip) {
        $form_errors[] = 'I need to know your location';
    }


    if (empty($form_errors)) {
        # code...


        $statement = $pdo->prepare("INSERT INTO customers (email, name, address, question, city, state, zip, create_date)
     VALUES(:name, :email, :address, :question, :city, :state, :zip, :date) #Insert into products these values");

        $statement->bindValue(':email', $email);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':address', $address);
        $statement->bindValue(':question', $question);
        $statement->bindValue(':city', $city);
        $statement->bindValue(':state', $state);
        $statement->bindValue(':zip', $zip);
        $statement->bindValue(':date', $date);
        $statement->execute();

        $success[] = "Successfully submitted into the database";
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    # code...

    $newsletter_Email = $_GET['newsletter'] ?? null;
    $date = date('Y-m-d H:m:s');

    if (!$newsletter_Email) {
        $newsletter_errors[] = 'Input your email';
    }
}


?>









<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/bootstrap-5.0.2-dist/css/
        bootstrap.css">
    <!-- Carousel css -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>CraftEx_Brand</title>
</head>

<body>
    <style>
        body {
            background: rgb(247, 245, 240);

        }

        .overlayimage {
            height: 30vh;
            background-position: center;
            background-size: cover;

        }
    </style>
    <!-- Nav section -->
    <nav class=" navbar px-2 container navbar-expand-lg fw-bold fixed-top mb-5 " style=" background: rgb(1, 178, 254); border-top-left-radius:30px; border-top-right-radius:30px;">
        <div class="container">
            <div>
                <a href="index.php">
                    <img src="images/logoextractedwhite.png" class="rounded-circle" alt="">

                </a>
            </div>


            <!-- Hamburger menu button-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <i class="bi bi-list text-warning"></i>
            </button>
            <!-- Hamburger menu ends -->



            <div class="collapse mt-2 navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto mx-2" style=" gap:0.51rem">

                    <div class="dropdown">
                        <a class="btn btn-secondary  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Engage with us
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a data-bs-target="#started" data-bs-toggle="modal" class="dropdown-item" href="#">
                                    Get Started with Expert Writing Guidance.

                                </a></li>
                            <li><a data-bs-target="#book" data-bs-toggle="modal" class="dropdown-item" class="dropdown-item" href="">
                                    Book Your Free Consultation.

                                </a></li>
                            <li><a class="dropdown-item" href="#form"> Explore Our Services.</a></li>
                        </ul>
                    </div>
                    <li class="nav-item">
                        <a href="index.php" class="text-white btn btn-sm nav-link btn-secondary  link-warning">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#about" class="text-white btn-secondary  btn btn-sm nav-link link-warning">About</a>
                    </li>
                    <li class=" nav-item">
                        <a href="#service" class="text-white btn btn-sm nav-link btn-secondary  link-warning">Services</a>
                    </li>


                </ul>
            </div>


        </div>

    </nav>
    <!-- Nav section -->


    <!-- Modal section -->
    <div class="modal fade " data-aos="fade-down" id="started" tabindex="-1" aria-labelledby="enrollLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content ">
                <div class="modal-header ">

                    <h2 style="color: rgba(8, 47, 76);">Connect with us</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body  text-dark">

                    <form method="post" class="p-3" style="background:rgba(247, 245, 240);">

                        <div class="  row form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Full Name</label>
                                <input type="text" class="form-control" name="name" id="inputPassword4" placeholder="Name">
                            </div>
                        </div>
                        <div class=" mt-2 form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" name="address" id="inputAddress" placeholder="1234 Main St">
                        </div>

                        <div class=" mt-2 form-group">
                            <label for="exampleFormControlTextarea1">What services do you need?</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="question" rows="3"></textarea>
                        </div>
                        <div class=" mt-2 row form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" name="city" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <input type="text" name="state" class="form-control" name="state" id="inputZip">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputZip">Zip</label>
                                <input type="text" name="zip" class="form-control" id="inputZip">
                            </div>
                        </div>
                        <div class="form-group">

                        </div>
                        <button type="submit" class="btn mt-2 btn-primary">Send</button>
                    </form>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn text-white btn-lg" style="background: rgba(8, 47, 76);" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade " data-aos="fade-down" id="book" tabindex="-1" aria-labelledby="enrollLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content ">
                <div class="modal-header ">

                    <h2 style="color: rgba(8, 47, 76);">Book here</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body  text-dark">

                    <form method="post" class="p-3" style="background:rgba(247, 245, 240);">

                        <div class="  row form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Full Name</label>
                                <input type="text" class="form-control" name="name" id="inputPassword4" placeholder="Name">
                            </div>
                        </div>
                        <div class=" mt-2 form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" name="address" id="inputAddress" placeholder="1234 Main St">
                        </div>

                        <div class=" mt-2 form-group">
                            <label for="exampleFormControlTextarea1">Service needed</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="question" rows="3"></textarea>
                        </div>
                        <div class=" mt-2 row form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" name="city" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <input type="text" name="state" class="form-control" name="state" id="inputZip">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputZip">Zip</label>
                                <input type="text" name="zip" class="form-control" id="inputZip">
                            </div>
                        </div>
                        <div class="form-group">

                        </div>
                        <button type="submit" class="btn mt-2 btn-primary">Send</button>
                    </form>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn text-white btn-lg" style="background: rgba(8, 47, 76);" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>



    <!-- Modal section -->









    <!-- Showcase section -->
    <section class=" container mt-5 text-center px-1 text-sm-justify " data-aos="zoom-in" data-aos-delay="200">

        <style>
            .carousel-item-banner {
                height: 38rem;

                ;
                color: white;

            }

            .carousel-item {
                height: 40rem;
                background-color: blck;
                ;
                color: white;

            }

            .contain {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                margin-bottom: 150px;

            }

            .overlay-image {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                top: 0;
                background-position: center;
                background-size: cover;


            }

            .overlayimage1 {
                height: 90vh;
                background-position: center;
                background-size: cover;

            }
        </style>

        <div id="myCarousel" class="carousel slide " data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>



            </ol>
            <div class="carousel-inner">
                <!-- 1 -->
                <div class="carousel-item-banner active p-5 " data-interval="200">
                    <div class="overlay-image" style="background-image:url(images/banner.jpg);">

                    </div>

                </div>
                <!-- 2 -->



            </div>
        </div>
    </section>
    <!-- Showcase Section -->



    <!-- About first brand section -->
    <section class="container mt-1 ">
        <div id="about" class="row  align-items-center shadow justify-content-between" style="background: rgb(255, 255, 237);">
            <!-- <div class="col-md  p-5 " style="background:url(images/cards.jpg); width:100%; background-size:contain; background-repeat:no-repeat; margin-top:5rem">

            </div> -->



            <!-- Showcase Section -->
            <section class="col-md text-center px-2 text-sm-justify " data-aos="zoom-in" data-aos-delay="200">

                <style>
                    .carousel-item {
                        height: 16rem;

                        ;
                        color: white;

                    }

                    .carousel-item1 {
                        height: 25rem;

                        ;
                        color: white;

                    }

                    .carousel-item2 {
                        height: 40rem;


                        color: white;

                    }

                    .contain {
                        position: absolute;
                        top: 0;
                        bottom: 0;
                        left: 0;
                        right: 0;


                    }

                    .overlay-image {
                        position: absolute;
                        bottom: 0;
                        left: 0;
                        right: 0;
                        top: 0;
                        background-position: center;
                        background-size: cover;


                    }
                </style>

                <div id="myCarousel" class="carousel slide " data-bs-ride="carousel">

                    <div class="carousel-inner">
                        <!-- 1 -->
                        <div class="carousel-item active p-5 " data-interval="200">
                            <div class="overlay-image" style="background:var(--accent)">

                            </div>
                            <div class="contain ">

                                <figcaption class=" text-start mt-md-3 p-2 text-light">

                                    <h4 class="text-start">Our Mission</h4>

                                    <p class=" ">

                                        CraftEx was founded out of a passion for writing, tutoring, and helping individuals craft excellence in all their academic and professional endeavors. With years of experience in academic writing, editing, and career counseling, we pride ourselves on offering personalized and high-quality services.


                                    </p>
                                    <cite title="Source Title"> Crafting Excellence in Writing, Tutoring, and Career Counseling.
                                    </cite>
                                </figcaption>

                            </div>
                        </div>


                    </div>
                </div>
            </section>
            <!-- Showcase Section -->
            <div class="col-md">
                <img src="images/about_name.PNG" class="img-fluid w-100" data-aos="fade-down" alt="">
            </div>
        </div>
    </section>
    <!-- About brand section -->

    <!--About second name section  -->
    <section class="container mt-1 ">
        <div class="row  align-items-center shadow justify-content-between" style="background: rgb(255, 255, 237);">
            <!-- <div class="col-md  p-5 " style="background:url(images/cards.jpg); width:100%; background-size:contain; background-repeat:no-repeat; margin-top:5rem">

            </div> -->



            <!-- Showcase Section -->
            <section class="col-md text-center px-2 text-sm-justify " data-aos="zoom-in" data-aos-delay="200">



                <div id="myCarousel" class="carousel slide " data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>



                    </ol>
                    <div class="carousel-inner">
                        <!-- 1 -->
                        <div class="carousel-item active p-5 " data-interval="200">
                            <div class="overlay-image" style="background-image:url(images/cards.jpg)">

                            </div>
                            <div class="contain ">

                                <figcaption class=" text-start mt-md-2 p-2 text-light">
                                    <h4 class="text-start" style="color: black;">Our Story</h4>

                                    <p class=" " style="color:black ">

                                        CraftEx was founded out of a passion for writing, tutoring, and helping individuals craft excellence in all their academic and professional endeavors. With years of experience in academic writing, editing, and career counseling, we pride ourselves on offering personalized and high-quality services.
                                    </p>
                                    <p style="color: black;"> rafting Excellence <cite title="Source Title"> in Writing, Tutoring, and Career Counseling.
                                        </cite>
                                    </p> C
                                </figcaption>

                            </div>
                        </div>


                    </div>
                </div>
            </section>
            <!-- Showcase Section -->
            <div class="col-md">
                <img src="images/about_brand.PNG" class="img-fluid w-100" data-aos="fade-down" alt="">
            </div>
        </div>

    </section>
    <!--About name section  -->

    <!--About Third reason section  -->
    <section class="container mt-1 ">
        <div class="row  align-items-center shadow justify-content-between" style="background: rgb(255, 255, 237);">
            <!-- <div class="col-md  p-5 " style="background:url(images/cards.jpg); width:100%; background-size:contain; background-repeat:no-repeat; margin-top:5rem">

            </div> -->



            <!-- Showcase Section -->
            <section class="col-md text-center px-2 text-sm-justify " data-aos="zoom-in" data-aos-delay="200">



                <div id="myCarousel" class="carousel slide " data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>



                    </ol>
                    <div class="carousel-inner">
                        <!-- 1 -->
                        <div class="carousel-item1 active p-5 " data-interval="200">

                            <div class="contain ">

                                <figcaption class=" text-start mt-md-2 p-2 text-light">
                                    <h4 class="text-start p-2" style="color: black;">
                                        Why CraftEx?

                                    </h4>

                                    <p class=" px-4" style="color:black ">
                                        At the core of our approach lies a deep understanding of each client’s unique needs and aspirations. We combine our expertise, creativity, and dedication to providing personalized solutions, ensuring that every project is not only successful but exceeds expectations.

                                    </p>
                                    <p style="color:black " class="px-4"> With a keen eye for detail and an unwavering commitment to delivering excellence, we ensure that no aspect of the project is overlooked. It’s this passion for perfection and tailored approach that sets us apart, consistently driving outstanding results and long-term success for our clients.
                                    </p>
                                    <p style="color: black;"> rafting Excellence <cite title="Source Title"> in Writing, Tutoring, and Career Counseling.
                                        </cite>
                                    </p> C
                                </figcaption>

                            </div>
                        </div>


                    </div>
                </div>
            </section>
            <!-- Showcase Section -->
            <div class="col-md">
                <img src="images/reasons.jpg" class="img-fluid" data-aos="fade-down" alt="">
            </div>
        </div>

    </section>
    <!--About reason section  -->

    <!--About Fourth name section  -->
    <section class="container mt-1 " id="service">
        <div class="row  align-items-center shadow justify-content-between" style="background: rgb(255, 255, 237);">

            <!-- Showcase Section -->
            <section class="col-md  px-2 text-start " data-aos="zoom-in" data-aos-delay="200">

                <section class="  rounded text-justify">

                    <style>
                        .carousel-itemx {
                            height: 45rem;
                            background: black;
                            color: white;
                            position: relative;
                        }

                        .containx {
                            position: absolute;
                            bottom: 0;
                            left: 0;
                            right: 0;


                        }

                        .overlay-imagex {
                            position: absolute;
                            bottom: 0;
                            left: 0;
                            right: 0;
                            top: 0;
                            background-position: center;
                            background-size: cover;

                            opacity: 0.6;
                        }

                        .overlayimagex {
                            height: 90vh;
                            background-position: center;
                            background-size: cover;

                        }
                    </style>
                    <div id="myCarousel" class="carousel slide " data-bs-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>

                        </ol>
                        <div class="carousel-inner">
                            <!-- 1 -->
                            <div class="carousel-itemx active p-5 " data-interval="300">
                                <div class="overlay-imagex" style="background-image:url(images/owner.jpg)">

                                </div>
                                <div class="containx  p-5">

                                    <p> <span class="fw-bold">Writing Guidance:</span> Our writing guidance services cater to students, professionals, and creative writers. We help with academic writing, creative projects, and professional documentation. Whether you're working on a thesis, a business proposal, or personal essays, we guide you every step of the way.
                                    </p>

                                    <p> <span class="fw-bold">Editing & Proofreading:</span> We offer editing and proofreading services for a wide variety of documents, including academic papers, personal statements, and business proposals. Our expert editors ensure that your work is polished, professional, and error-free.
                                    </p>



                                    <p> <span class="fw-bold">Tutoring Services:</span> We provide tutoring in specialized fields like law, human rights, and other academic areas. Our tutors work closely with students to help them understand complex subjects and improve their academic performance.
                                    </p>

                                    <p> <span class="fw-bold">Career Counseling:</span> Our career counseling services help you navigate career choices, whether you're a student, graduate, or professional seeking a change.
                                    </p>
                                    <hr>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>

            </section>
            <!-- Showcase Section -->
            <div class="col-md">
                <img src="images/services.jpg" class="carousel-itemx img-fluid w-100" data-aos="fade-down" alt="">
            </div>
        </div>

    </section>
    <!--About name section  -->

    <!-- Get Fifth started section -->
    <section class="container mt-1 " data-aos="fade-down">
        <div class="row  align-items-center shadow justify-content-between" style="background: rgb(255, 255, 237);">
            <div class="col-md">
                <img src="images/get_started.jpg" style="height:45rem" class="img-fluid w-100" alt="">
            </div>
        </div>

    </section>
    <!-- Get started section -->


    <!-- form section  -->
    <section class="container mt-1 " id="form" data-aos="flip-left">
        <div class="row  align-items-center shadow justify-content-between" style="background: rgb(255, 255, 237);">
            <div class="p-1 col-md" style="background:var(--accent);  ">

                <div class="overlayimage1" style="background-image:url(images/banner.jpg); height:fit-content; opacity:0.8;">


                    <div class=" text-white p-2">

                        <form method="post" class=" container col-md p-3" style="  background:transparent">
                            <h4> Reach out to us</h4>
                            <div class="  row form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4 " c>Email</label>
                                    <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4" class="fw-bold">Full Name</label>
                                    <input type="text" class="form-control" name="name" id="inputPassword4" placeholder="Name">
                                </div>
                            </div>
                            <div class=" mt-2 form-group">
                                <label for="inputAddress" class="fw-bold">Address</label>
                                <input type="text" class="form-control" name="address" id="inputAddress" placeholder="1234 Main St">
                            </div>

                            <div class=" mt-2 form-group">
                                <label for="exampleFormControlTextarea1" class="fw-bold">Talk to us</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="question" rows="3"></textarea>
                            </div>
                            <div class=" mt-2 row form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity" class="fw-bold">City</label>
                                    <input type="text" class="form-control" name="city" id="inputCity">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState" class="fw-bold">State</label>
                                    <input type="text" name="state" class="form-control" name="state" id="inputZip">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputZip" class="fw-bold">Zip</label>
                                    <input type="text" name="zip" class="form-control" id="inputZip">
                                </div>
                            </div>
                            <div class="form-group">

                            </div>
                            <button type="submit" class="btn mt-2 btn-secondary fw-bold">Send</button>
                        </form>
                    </div>
                </div>



            </div>
        </div>

    </section>
    <!-- form section  -->

    <!-- Footer section -->
    <footer class="container  text-white  text-left position-relative" style="background: var(--accent); border-bottom-left-radius:3rem; border-bottom-right-radius:3rem;">


        <div class="p-3 text-white text-center position-relative">
            <div class="container">


                <p class="lead fw-bold">© Craft<span style="color: gold;">Ex</span> Brand. All Rights Reserved</p>


                <a href="#" class="position-absolute bottom-0 end-0 p-1 text-success">
                    <i class="bi bi-arrow-up-circle h1"></i>
                </a>

            </div>
        </div>
    </footer>
    <!-- Footer section -->



















    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js">

    </script>

    <script>
        AOS.init();
    </script>

    <!-- AOS -->
    <!-- Bootstrap Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Bootstrap Javascript -->

    <!-- Jquery Javascript -->
    <script src="javascript/jquery3.7.1.min.js"></script>
    <!-- Jquery Javascript -->
    <!-- Owl Carousel -->
    <script src="javascript/owl.carousel.min.js"></script>
    <!-- Owl Carousel -->

    <!-- Custom Javascript -->
    <script src="javascript/main.js"></script>
    <!-- Custom Javascript -->
</body>

</html>