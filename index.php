<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kambat Restaurant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body>
    <header class="sticky-top">
        <nav class="navbar navbar-expand-lg" style="  background-color:#070C20;">
            <a class="navbar-brand px-5 d-flex align-items-center" href="#">
        <img class="navbar-logo img-fluid rounded-circle me-2" src="assets/images/logo1.jpg" alt="Logo" style="width:80px; height:80px;">
       </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 px-5">
                        <li class="nav-item">
                          <a class="nav-link active fw-semibold text-white"  aria-current="page" href="#home" style="font-size: 20px;">Home</a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link  fw-semibold text-white" href="#about" style="font-size: 20px;">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  fw-semibold text-white" href="#menu" style="font-size: 20px; ">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  fw-semibold text-white" href="#chef" style="font-size: 20px; ">Chefs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  fw-semibold text-white" href="#event" style="font-size: 20px; ">Events</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle  fw-semibol text-white" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false" style="font-size: 20px;">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  fw-semibold text-white" href="#contact" style="font-size: 20px;">Contact</a>
                        </li>
                    </ul>
                    <div class="div">
                        <button class="btn btn-warning btn-sm m-3" data-bs-toggle="modal"
                            data-bs-target="#modal6">Sign Up</button>
                        <button class="btn btn-danger btn-sm mx-3 " data-bs-toggle="modal"
                            data-bs-target="#modal2">Login</button>
                    </div>
                </div>`

            </div>
        </nav>
    </header>

    <main>
        <!-- Carousel -->
         <section class="mt-2">
            <div class="container-fluid">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active h-100">
                       <img src="assets/images/carousel1.png" class="d-block w-100" alt="...">
                        </div>
                       <div class="carousel-item h-100">
                       <img src="assets/images/carousel2.png" class="d-block w-100" alt="...">
                         </div>
                           <div class="carousel-item h-100">
                         <img src="assets/images/carousel3.png" class="d-block w-100" alt="...">
                             </div>
                         </div>
                        </div>
                    </div>
            </section>
        <!-- HOME PAGE -->
        <section class="py-5" id="home">
            <div class="container">
                <div class="row g-0 align-items-stretch">
                    <div
                        class="col-md-6 d-flex flex-column justify-content-center bg-light p-5 rounded-start shadow equal-content">
                        <h1 class="fw-bold mb-3">Savor Authentic Mediterranean Cuisine</h1>
                        <h2 class="text-success mb-4">Enjoy Your Healthy & Delicious Food</h2>
                        <p class="mb-4" style="text-align: justify;">
                            Food is more than just what we eat — it’s a language of love, emotion, and connection.
                            Every flavor tells a story, every aroma awakens a memory, and every meal has the power
                            to bring people closer. At <strong>Foodie Restaurant</strong>, we celebrate this art of
                            taste,
                            crafting dishes that speak to your heart as much as your hunger.
                        </p>
                        <div class="d-flex gap-3">
                            <button class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal"
                        data-bs-target="#modal4">Book a Table</button>
                            <a href="#" class="btn btn-outline-primary rounded-pill px-4">Explore Menu</a>
                        </div>
                    </div>
                    <div class="col-md-6 p-0">
                        <div class="h-100 w-100">
                            <img src="assets/images/showcase-2.webp" alt="Mediterranean Food"
                                class="img-fluid w-100 h-100 object-fit-cover rounded-end shadow">
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- ABOUT PAGE -->
        <section id="about">
            <div class="container mt-5">
                <div class="row align-items-stretch">
                    <div class="col-md-6">
                        <div class="h-100 d-flex justify-content-center align-items-center">
                            <img src="assets/images/chef-3.webp" alt="Executive Chef" class="img-fluid shadow"
                                style="height:100%; object-fit:cover;">
                        </div>
                    </div>
                    <div class="col-md-6 d-flex flex-column justify-content-center mt-0">
                        <h1 class="fw-bold font-awesome">Meet Our Executive Chef</h1>
                        <h2 class="text-info">Crafting memorable dining experiences since 1999</h2>
                        <p class="fw-bold font-awesome">
                            "Food is not just a necessity; it is an experience that brings people together. Every
                            culture
                            has its own unique flavors and cooking styles, from spicy curries to delicate pastries.
                            Sharing a meal is more than just eating — it is a way of expressing love, tradition, and
                            creativity. Fresh ingredients, balanced flavors, and thoughtful presentation make a meal
                            memorable, turning ordinary dishes into extraordinary experiences."
                        </p>
                        <p class="fw-bold font-awesome">Food as an experience: The passage emphasizes that food is more
                            than just something to eat—it
                            creates experiences and memories.</p>
                        <p class="fw-bold font-awesome">Quality and creativity: Fresh ingredients, good taste, and
                            appealing presentation make meals enjoyable and memorable.
                        </p>
                        <p class="fw-bold font-awesome">Overall message: Food connects people emotionally, culturally,
                            and socially, making it a central part of life, not just a necessity.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- MENU -->
        <section id="menu">
            <div class="container mt-5 ">
                <div class="text-center mb-4">
                    <h2>Welcome to Our Restaurant</h2>
                    <p class="lead">Experience the best dining with us!</p>
                </div>

                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card h-100 text-center">
                            <img src="assets/images/biryani.webp" class="card-img-top" alt="Biryani"
                                style="height:200px; object-fit:cover;">
                            <div class="card-body">
                                <h5 class="card-title">Biryani</h5>
                                <p class="card-text">Serve 2 people. Chicken dum biryani with layers of rice and meat.
                                </p>
                                <p class="fs-6"><i class="fa-solid fa-indian-rupee-sign me-1"></i>350</p>
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal2"
                                    type="submit">Place Order</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 text-center">
                            <img src="assets/images/roti.webp" class="card-img-top" alt="Non Veg Thali"
                                style="height:200px; object-fit:cover;">
                            <div class="card-body">
                                <h5 class="card-title">Non Veg Thali</h5>
                                <p class="card-text">Smoky Butter Chicken with delicate Rumali Rotis for a feast.</p>
                                <p class="fs-6"><i class="fa-solid fa-indian-rupee-sign me-1"></i>350</p>
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal2"
                                    type="submit">Place Order</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 text-center">
                            <img src="assets/images/veg.jpg" class="card-img-top" alt="Veg Thali"
                                style="height:200px; object-fit:cover;">
                            <div class="card-body">
                                <h5 class="card-title">Veg Thali</h5>
                                <p class="card-text">Bold Pindi Chole flavors with freshly made Rumali Rotis.</p>
                                <p class="fs-6"><i class="fa-solid fa-indian-rupee-sign me-1"></i>350</p>
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal2"
                                    type="submit">Place Order</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- CHEF -->
        <section class="py-5" id="chef">
            <div class="container">
                <h1 class="text-center mb-5">
                    <u style="text-underline-offset: 20px; text-decoration-color: orange;">Chef</u>
                </h1>
                <div class="row g-4">
                    <div class="col-md-3 d-flex">
                        <div class="card w-100 h-100 shadow-sm text-center " style="background-color: #ff7f33;">
                            <img src="assets/images/Chef-Sanjeev-Kapoor_2.avif" class="card-img-top img-fluid"
                                alt="Sanjeev Kapoor" style="height:250px; object-fit:cover;">
                            <div class="card-body d-flex flex-column">
                                <h4 class="card-title">Sanjeev Kapoor</h4>
                                <p class="card-text mt-auto text-white fw-semibold">
                                    “Cooking is an art that speaks to the soul — every dish tells a story.”
                                    <br>“A great meal begins long before the first bite; it starts with passion,
                                    patience, and creativity.”
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex">
                        <div class="card w-100 h-100 shadow-sm text-center" style="background-color:#20c997;">
                            <img src="assets/images/vikas" class="card-img-top img-fluid" alt="Vikas Khanna"
                                style="height:250px; object-fit:cover;">
                            <div class="card-body d-flex flex-column">
                                <h4 class="card-title">Vikas Khanna</h4>
                                <p class="card-text mt-auto text-white fw-semibold">
                                    “For me, food is a language — it connects people without words.”
                                    <br>“The secret ingredient in every recipe is love and attention to detail.”
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex">
                        <div class="card w-100 h-100 shadow-sm text-center" style="background-color:#7950f2;">
                            <img src="assets/images/ranbeer" class="card-img-top img-fluid" alt="Ranveer Brar"
                                style="height:250px; object-fit:cover;">
                            <div class="card-body d-flex flex-column">
                                <h4 class="card-title">Ranveer Brar</h4>
                                <p class="card-text mt-auto text-white fw-semibold">
                                    “I don’t just cook food, I create memories on a plate.”
                                    <br>“Every spice, every flavor has a purpose — together they create harmony.”
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex">
                        <div class="card w-100 h-100 shadow-sm text-center" style="background-color:#6c757d;">
                            <img src="assets/images/chef-kunal-.avif" class="card-img-top img-fluid" alt="Kunal Kapur"
                                style="height:250px; object-fit:cover;">
                            <div class="card-body d-flex flex-column">
                                <h4 class="card-title">Kunal Kapur</h4>
                                <p class="card-text mt-auto text-white fw-semibold">
                                    “Cooking isn’t about following rules; it’s about creating emotions.”
                                    <br>“My kitchen is my canvas, and every dish is a piece of art.”
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- EVENT -->
        <section class="bg-info" id="event">
            <div class="container">
                <div class="py-5 text-center">
                    <h1 class="">Best Event Parties 2025</h1>
                    <h6 class="py-2 ">Join the most exciting parties and events in your city!</h6>
                    <button type="submit" class="btn btn-warning btn-rounded-pill btn-lg" data-bs-toggle="modal"
                        data-bs-target="#modal4">Register Now</button>
                </div>
            </div>
        </section>

        <section class="py-5">
            <div class="container">
                <h1 class="text-center">Upcoming Parties</h1>
                <div class="row py-5">
                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <img src="https://images.unsplash.com/photo-1519677100203-a0e668c92439" class="card-img-top"
                                alt="Wedding Party">
                            <div class="card-body">
                                <h5 class="card-title">Birthday Parties</h5>
                                <p class="card-img-top">Dance by the waves under a glowing sunset. Drinks, music, and
                                    good
                                    vibes!</p>
                                <button class=" btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal4">Join
                                    Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <img src="https://images.unsplash.com/photo-1508606572321-901ea443707f" class="card-img-top"
                                alt="Wedding Party">
                            <div class="card-body">
                                <h5 class="card-title">Wedding Parties</h5>
                                <p class="card-img-top">Dance by the waves under a glowing sunset. Drinks, music, and
                                    good
                                    vibes!</p>
                                <button class=" btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal4">Join
                                    Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <img src="https://images.unsplash.com/photo-1542831371-d531d36971e6" class="card-img-top"
                                alt="Rooftop Event">
                            <div class="card-body">
                                <h5 class="card-title">Rooftop Glow Party</h5>
                                <p class="card-text">Enjoy panoramic city views, neon décor, and live performances.</p>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal4">Join
                                    Now</button>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

        <!-- TESTMONIALS -->
        <section>
            <div class="container">
                <h1 class="text-center">
                    <u style="text-underline-offset: 25px; text-decoration-color: rgba(0, 0, 0, 0.938)">Testmonials</u>
                </h1>
                <div class="row py-5 g-4">
                    <div class="col-md-4">
                        <div class="card text-center bg-success">
                            <img src="assets/images/chef-4.webp" class="img-fluid mx-auto mt-4" alt="Circular img"
                                style="border-radius: 50%; width: 150px; height: 150px;">
                            <div class="card-body">
                                <h4>“Taste the love.”</h4>
                                <p class="card-text fw-100">“Good food brings people together, filling both hearts and
                                    stomachs.
                                    Every meal is a chance to savor life’s little joys.”</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center bg-danger">
                            <img src="assets/images/chef-4.webp" class="img-fluid mx-auto mt-4" alt="Circular img"
                                style="border-radius: 50%; width: 150px; height: 150px;">
                            <div class="card-body">
                                <h4>“Fresh, fast, fabulous.”</h4>
                                <p class="card-text fw-100">“Great food sparks conversations, laughter, and a taste of
                                    happiness in
                                    every bite.”
                                    Quick bites, lasting smiles.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center bg-warning">
                            <img src="assets/images/chef-4.webp" class="img-fluid mx-auto mt-4" alt="Circular img"
                                style="border-radius: 50%; width: 150px; height: 150px;">
                            <div class="card-body ">
                                <h4>“Nature’s taste, perfected.”</h4>
                                <p class="card-text fw-100">“Fresh ingredients, carefully prepared, turn every meal into
                                    a delight.
                                    Eating well is not just a choice—it’s an experience to cherish.”</p>
                            </div>
                        </div>
                    </div>
                </div>
                </h1>
            </div>
        </section>
        <!-- GALLERY -->
        <section>
            <div class="container my-5">
                <h2 class="text-center mb-4 fw-bold">Gallery</h2>

                <div class="row g-4">

                    <div class="col-md-4 col-sm-6">
                        <div class="card">
                            <img src="assets/images/event-4.webp" class="card-img-top img-fluid" alt="Food 1"
                                style="height:250px; object-fit:cover;">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="card">
                            <img src="assets/images/event-6.webp" class="card-img-top img-fluid" alt="Food 1"
                                style="height:250px; object-fit:cover;">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="card">
                            <img src="assets/images/event-9.webp" class="card-img-top img-fluid" alt="Food 1"
                                style="height:250px; object-fit:cover;">
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <div class="card">
                            <img src="assets/images/Gallery/Afghani.avif" class="card-img-top img-fluid" alt="Food 1"
                                style="height:250px; object-fit:cover;">
                        </div>
                    </div>


                    <div class="col-md-4 col-sm-6">
                        <div class="card">
                            <img src="https://images.unsplash.com/photo-1529042410759-befb1204b468"
                                class="card-img-top img-fluid" alt="Food 2" style="height:250px; object-fit:cover;">
                        </div>
                    </div>


                    <div class="col-md-4 col-sm-6">
                        <div class="card">
                            <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836"
                                class="card-img-top img-fluid" alt="Food 3" style="height:250px; object-fit:cover;">
                        </div>
                    </div>


                    <div class="col-md-4 col-sm-6">
                        <div class="card">
                            <img src="assets/images/biryani.webp" class="card-img-top img-fluid" alt="Food 4"
                                style="height:250px; object-fit:cover;">
                        </div>
                    </div>


                    <div class="col-md-4 col-sm-6">
                        <div class="card">
                            <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c"
                                class="card-img-top img-fluid" alt="Food 5" style="height:250px; object-fit:cover;">
                        </div>
                    </div>


                    <div class="col-md-4 col-sm-6">
                        <div class="card">
                            <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd"
                                class="card-img-top img-fluid" alt="Food 6" style="height:250px; object-fit:cover;">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="card">
                            <img src="assets/images/Gallery/kebab.avif" class="card-img-top img-fluid" alt="Food 4"
                                style="height:250px; object-fit:cover;">
                        </div>
                    </div>


                    <div class="col-md-4 col-sm-6">
                        <div class="card">
                            <img src="assets/images/Gallery/jamoon.avif" class="card-img-top img-fluid" alt="Food 5"
                                style="height:250px; object-fit:cover;">
                        </div>
                    </div>


                    <div class="col-md-4 col-sm-6">
                        <div class="card">
                            <img src="assets/images/Gallery/mushroom.avif" class="card-img-top img-fluid" alt="Food 6"
                                style="height:250px; object-fit:cover;">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- CONTACT -->
        <section id="contact">
            <div class="container">
                <h2 class="text-center ">Contact</h2>
                <div class="row py-5">
                    <div class="col-md-6">
                      <div class="card">
                        <div class="card-body">
                              <form action="" method="POST" id="modal1">
                            <div class="mb-3">
                                <label for="Name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Username"
                                    oninput="this.value=this.value.replace(/[^A-Za-z/s]/g,'')" required>
                                 </div>

                            <div class="mb-3">
                                <label for="Password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="Email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text" name="phone" class="form-control"
                                    oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,10)" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" placeholder="message"></textarea>

                                <button type="submit" class="btn btn-success btn-lg mt-4 btn-sm">Submit</button>

                            </div>
                        </form>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3809.9972564859393!2d83.35009757450461!3d17.89067598772841!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a395b2e3c35e7b3%3A0x95a4b6b6a8d95de7!2sGMR%20Institute%20of%20Technology!5e0!3m2!1sen!2sin!4v1697895239202!5m2!1sen!2sin"
                                style="border:0; width:100%; height:100%; min-height:450px;" allowfullscreen=""
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- modal -->
         <!-- place order -->
        <section>
            <div class="modal" tabindex="-1" id="modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Place Order</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" class="mt-4">
                                <input type="hidden" name="food_id" value="<?php echo $food['id']; ?>">
                                <input type="hidden" name="price" value="<?php echo $food['price']; ?>">
                                <div class="mb-3">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" name="name" class="form-control"
                                        oninput="this.value=this.value.replace(/[^A-Za-z/s]/g,'')" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input type="text" name="phone" class="form-control"
                                        oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,10)" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Quantity</label>
                                    <input type="number" name="quantity" class="form-control" value="1" required>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="place_order" class="btn btn-success">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
         <!-- register -->
<section>
    <div class="modal" tabindex="-1" id="modal6">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h3 class="modal-title fw-bold mx-auto">Create Account</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form action="register.php" method="POST">

                        <!-- FULL NAME -->
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="name"
                                placeholder="Ex: Ramesh Kumar"
                                oninput="this.value=this.value.replace(/[^A-Za-z\s]/g,'')" required>
                        </div>

                        <!-- EMAIL -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email"
                                placeholder="Ex: ramesh@gmail.com" required>
                        </div>

                        <!-- PASSWORD -->
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password"
                                placeholder="Create Password" required>
                        </div>

                        <!-- PHONE -->
                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" name="phone" class="form-control"
                                placeholder="10 digit mobile number"
                                oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,10)" required>
                        </div>

                        <!-- ADDRESS SECTION -->
                        <h5 class="fw-bold">Delivery Address</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">House / Flat No.</label>
                                <input type="text" class="form-control" name="house" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Street / Area</label>
                                <input type="text" class="form-control" name="street" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control" name="city"
                                    oninput="this.value=this.value.replace(/[^A-Za-z\s]/g,'')" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">State</label>
                                <input type="text" class="form-control" name="state"
                                    oninput="this.value=this.value.replace(/[^A-Za-z\s]/g,'')" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pincode</label>
                            <input type="text" name="pincode" class="form-control"
                                oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,6)" required>
                        </div>

                        <!-- BUTTONS -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" name="save">
                                Register
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</section>

         <!-- login -->
<section>
            <div class="modal" tabindex="-1" id="modal2">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fw-bold">Login</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="login.php" method="POST" id="modal2">
                                <div class="mb-3">
                                    <label for="Name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Username"
                                        oninput="this.value=this.value.replace(/[^A-Za-z/s]/g,'')" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                               <div class="modal-footer d-flex justify-content-between">
    <a href="#" data-bs-toggle="modal" data-bs-target="#modal6">Create an Account</a>

    <div>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="login">Login</button>
    </div>
</div>

</form>
</div>  
</div>
</div>
</section>
        <!--register for event -->
        <section>
            <div class="modal" tabindex="-1" id="modal4">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title">Register for an Event</h2>
                            <button class="btn-close" role="button" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="event.php">
                                <div class="mb-3">
                                    <label class="form-label" for="Name">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name"
                                        oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="Email">Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="Email">Mobile Number</label>
                                    <input type="text" class="form-control" name="number" placeholder="Number"
                                        oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,10)">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" >Event</label>
                                    <select class="form-select" name="event_1">
                                        <option>Evening Party</option>
                                        <option>Night Party</option>
                                        <option>Afternoon Party</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button role="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button role="button" class="btn btn-success" name="event">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

<footer class="sticky">
 <section class="bg-dark text-white pt-5 pb-4">
      <div class="container">
        <div class="row text-center text-md-start">

          <!-- Social Icons -->
          <div class="col-md-3 mb-4 mb-md-0 text-center">
            <div class="fs-2 mb-3">
              <i class="bi bi-facebook me-3"></i>
              <i class="bi bi-twitter me-3"></i>
              <i class="bi bi-instagram"></i>
            </div>
            <p class="small">© 2025 Kambat Restaurant</p>
          </div>

          <!-- Column 1 -->
          <div class="col-md-3">
            <h6 class="fw-bold">Company</h6>
            <hr class="divider border-3  border-light w-25">
            <p>About Us</p>
            <p>Restaurant Corporate</p>
          </div>

          <!-- Column 2 -->
          <div class="col-md-3">
            <h6 class="fw-bold">Services</h6>
            <hr class="w-25 border-3 border-light">
            <p>Menu</p>
            <p>Events</p>
          </div>

          <!-- Column 3 -->
          <div class="col-md-3">
            <h6 class="fw-bold">Contact</h6>
            <hr class="w-25 border-3 border-light">
            <p><i class="bi bi-telephone-fill me-2"></i> +91 98765 43210</p>
            <p><i class="bi bi-geo-alt-fill me-2"></i> Hyderabad, India</p>
            <p><i class="bi bi-envelope-fill me-2"></i> info@restaurant.com</p>
          </div>

        </div>
        <hr class="divider"></hr>
         <div class="text-white text-center py-3 mt-0">
    <p class="mb-0 fw-bold">© Copyright MyWebsite All Rights Reserved</p>
  </div>
      </div>
    </section>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>