<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyThirdWSebsite</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css.css">
</head>

<body>

    <!-- Navbar starts here -->

    <nav class="navbar navbar-expand-lg">
        <div class="width-container">
            <div class="split-container-one">

                <a class="navbar-brand" href="#"><img src="images/logo.png" alt="Logo"></a>

                <a class="logos" href="#">
                    <img src="images/trustpilot.png" alt="Logo">
                </a>

                <div class="wrapper1">
                    <div class="searchBar">
                        <input id="searchQueryInput" type="text" name="searchQueryInput" placeholder="Search"
                            value="" />
                        <button id="searchQuerySubmit" type="submit" name="searchQuerySubmit">
                            <svg style="width:35px;height:35px" viewBox="0 0 24 24">
                                <path fill="#666666"
                                    d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <a class="logos" href="#">
                    <img src="images/logo2.png" alt="Logo">
                </a>

                <select class="drp-dwn" name="countries">
                    <option value="NL">🇳🇱&nbsp;Ne</option>
                    <option value="DE">🇩🇪&nbsp;Ge</option>
                    <option value="FR">🇫🇷&nbsp;Fr</option>
                    <option value="ES">🇪🇸&nbsp;Sp</option>
                </select>

                <div class="user" id="u1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person" viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                    </svg>
                    <div class="my-text">My Account</div>
                </div>

                <div class="v-div"></div>

                <div class="user" id="u2">
                    <div class="notification">0</div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />

                    </svg>
                    <div class="my-text">Bag</div>
                </div>

                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#col-1"
                    aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="hamburger" onclick="toggleMenu()">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </button>
            </div>
        </div>


        <div class="split-container-two">
            <div class="width-container">
                <div class="collapse navbar-collapse flex-column" id="col-1">
                    <ul class="drp-grp-one">
                        <li>
                            <div class="dropdown open">
                                <button class="btn drop-down-btn" type="button" id="triggerId" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    SUPPLEMENTS<i class="fa fa-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="triggerId">
                                    <div class="row width row-cols-1 row-cols-sm-3 row-cols-md-5">
                                        <ul class="col">
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="product-listing.html">Amino acids</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="#">Glucose Disposal</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="#">Protein & whey</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="#">vitamins & minerals</a>
                                            </li>
                                        </ul>
                                        <ul class="col">
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="#">Bundles</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="#">Intra-Workout</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="#">Sleep Aid</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="#">Weight Gainers</a>
                                            </li>
                                        </ul>
                                        <ul class="col">
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="#">Carbohydrates</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="#">Omega 3 &EFA's</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="#">Bars & Snacks</a>
                                            </li>
                                        </ul>
                                        <ul class="col">
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="#">Creatine</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="#">Post Workout</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="#">Stress Relief</a>
                                            </li>
                                        </ul>
                                        <ul class="col">
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="#">Fat Burners</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="#">Pre-Workout</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="#">T-Boosters</a>
                                            </li>
                                        </ul>
                                    </div>

                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown open">
                                <button class="btn drop-down-btn" type="button" id="triggerId" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    BRANDS<i class="fa fa-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="triggerId">
                                    <div class="row">
                                        <ul class="col">
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="#">Content goes here</a>
                                            </li>
                                        </ul>
                                    </div>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown open">
                                <button class="btn drop-down-btn" type="button" id="triggerId" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    APPARELS<i class="fa fa-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="triggerId">
                                    <div class="row">
                                        <ul class="col">
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="#">Content goes here</a>
                                            </li>
                                        </ul>
                                    </div>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown open">
                                <button class="btn drop-down-btn" type="button" id="triggerId" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    TRAINING EQUIPMENT<i class="fa fa-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="triggerId">
                                    <div class="row">
                                        <ul class="col">
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="#">Content goes here</a>
                                            </li>
                                        </ul>
                                    </div>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown open">
                                <button class="btn drop-down-btn" type="button" id="triggerId" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    PROTEIN<i class="fa fa-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="triggerId">
                                    <div class="row">
                                        <ul class="col">
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="#">Content goes here</a>
                                            </li>
                                        </ul>
                                    </div>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown open">
                                <button class="btn drop-down-btn" type="button" id="triggerId" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    HEALTH SUPPLEMENTS<i class="fa fa-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="triggerId">
                                    <div class="row">
                                        <ul class="col">
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="#">Content goes here</a>
                                            </li>
                                        </ul>
                                    </div>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown open">
                                <button class="btn drop-down-btn" type="button" id="triggerId" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    YOUR GOAL<i class="fa fa-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="triggerId">
                                    <div class="row">
                                        <ul class="col">
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="#">Content goes here</a>
                                            </li>
                                        </ul>
                                    </div>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <button class="btn drop-down-btn" type="button">
                                OUTLET
                            </button>
                        </li>
                        <li>
                            <button class="btn drop-down-btn" type="button">
                                OFFERS
                            </button>
                        </li>
                        <li>
                            <button class="btn drop-down-btn" type="button">
                                NEW!
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="split-container-three">
            <div class="width-container">
                <div class="container">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="white"
                        class="bi bi-clipboard-minus" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M5.5 9.5A.5.5 0 0 1 6 9h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z" />
                        <path
                            d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                        <path
                            d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                    </svg>

                    <div class="text"><b>MARKET REFERENCE</b>&nbsp;Quality Products, Value For Money</div>
                </div>
                <div class="container">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="white" class="bi bi-truck"
                        viewBox="0 0 16 16">
                        <path
                            d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                    </svg>

                    <div class="text"><b>FREE EU SHIPPING*</b>&nbsp; On all orders Over 100$</div>
                </div>
                <div class="container">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="white" class="bi bi-headset"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5z" />
                    </svg>

                    <div class="text"><b>MARKET REFERENCE</b>&nbsp;Experienced Staff, It's Our Hobby</div>
                </div>
            </div>
            <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="container">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="white"
                                class="bi bi-clipboard-minus" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M5.5 9.5A.5.5 0 0 1 6 9h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z" />
                                <path
                                    d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                <path
                                    d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                            </svg>

                            <div class="text"><b>MARKET REFERENCE</b>&nbsp;Quality Products</div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="white"
                                class="bi bi-truck" viewBox="0 0 16 16">
                                <path
                                    d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                            </svg>

                            <div class="text"><b>FREE EU SHIPPING*</b>&nbsp;On all orders Over 100$</div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="white"
                                class="bi bi-headset" viewBox="0 0 16 16">
                                <path
                                    d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5z" />
                            </svg>

                            <div class="text"><b>MARKET REFERENCE</b>&nbsp;Quality Products</div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

    </nav>

    <!-- Navbar End -->

    <!-- Body starts here -->

    <div class="body-container">
        <div class="width-container">

            <!-- Image group -->

            <div class="image-container">
                <div class="card-group">
                    <div class="card-set">
                        <div class="card border-0">
                            <img class="card-img-top" src="images/pic1.png" alt="Card image cap">

                        </div>
                        <div class="card">
                            <img class="card-img-top" src="images/pic2.png" alt="Card image cap">

                        </div>
                    </div>
                    <div class="card-set">
                        <div class="card">
                            <img class="card-img-top" src="images/pic3.png" alt="Card image cap">

                        </div>
                        <div class="card">
                            <img class="card-img-top" src="images/pic4.png" alt="Card image cap">

                        </div>
                    </div>
                </div>
            </div>


            <div class="head-nd-links">
                <h5>POPULAR PRODUCTS</h5>
                <a href="product-details.html">view all products</a>
            </div>

            <!-- Product group -->

            <div class="products-container">
                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5 g-4">
                    <div class="col">
                        <div class="card">
                            <img src="images/pp1.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4 class="card-title">Viterna Premium Whey Isolate</h4>
                                <div class="container">
                                    <p class="card-text">&#8364;34,90</p>
                                    <button class="card-button">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="images/pp2.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4 class="card-title">Life Extension Vitamin D3(1000IU)</h4>
                                <div class="container">
                                    <p class="card-text">&#8364;12,72</p>
                                    <button class="card-button">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col dis">
                        <div class="card">
                            <img src="images/pp3.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4 class="card-title">Scitec Nutrition 100% Whey Isolate</h4>
                                <div class="container">
                                    <p class="card-text">&#8364;24,90</p>
                                    <button class="card-button">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col dis">
                        <div class="card">
                            <img src="images/pp4.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4 class="card-title">Scitec Nutrition 100% Whey Protein Professional</h4>
                                <div class="container">
                                    <p class="card-text">&#8364;24,90</p>
                                    <button class="card-button">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col dis">
                        <div class="card">
                            <img src="images/pp5.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4 class="card-title">HD Muscle-Pre-HD Ultra</h4>
                                <div class="container">
                                    <p class="card-text">&#8364;44,90</p>
                                    <button class="card-button">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info group -->

            <div class="info-container">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-body" id="body2">
                                <h6 class="card-title">Review a product & get</h6>
                                <h2>12% discount</h2>
                                <p class="card-text">Receive a 12% discout code when you review a product from your
                                    latest order
                                    on our website.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body" id="body2">
                                <h6 class="card-title">Sign up your</h6>
                                <h2>Newsletter</h2>
                                <p class="card-text">Never miss the latest news about products, campaigns and more.</p>
                                <h6 class="card-text">Sign up to our newsletter today</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card rating-card">
                            <div class="card-body">
                                <h3>Excellent</h3>
                                <div class="rating rating2">
                                    <a href="#5" title="Give 5 stars">★</a>
                                    <a href="#4" title="Give 4 stars">★</a>
                                    <a href="#3" title="Give 3 stars">★</a>
                                    <a href="#2" title="Give 2 stars">★</a>
                                    <a href="#1" title="Give 1 star">★</a>
                                </div>
                                <p class="text">Based on <a class="text" href="">534 Reviews</a></p>
                                <img src="images/trustpilot.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="head-nd-links">
                <h5>NEW ARRIVALS</h5>
                <a href="product-details.html">view all products</a>
            </div>

            <!-- New arrival group -->

            <div class="new-arrival-container">
                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5 g-4">
                    <div class="col">
                        <div class="card">
                            <span class="new">New</span>
                            <img src="images/napic1.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Bull's All Out The ZMA</h5>
                                <div class="container">
                                    <p class="card-text"><b>&#8364;19.92</b></p>
                                    <button class="card-button">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <span class="new">New</span>
                            <img src="images/napic2.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4 class="card-title">Dymatize Elite 100% Whey</h4>
                                <div class="container">
                                    <p class="card-text"><b>&#8364;52,90</b></p>
                                    <button class="card-button">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col dis">
                        <div class="card">
                            <span class="new">New</span>
                            <img src="images/napic3.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4 class="card-title">Bull's All Out The Omega-3</h4>
                                <div class="container">
                                    <p class="card-text"><b>&#8364;19.92</b></p>
                                    <button class="card-button">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col dis">
                        <div class="card">
                            <span class="new">New</span>
                            <img src="images/napic4.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4 class="card-title">Iron Rebel Rebel Knee Wraps</h4>
                                <div class="container">
                                    <p class="card-text"><b>&#8364;47.90</b></p>
                                    <button class="card-button">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col dis">
                        <div class="card">
                            <span class="new">New</span>
                            <img src="images/napic5.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4 class="card-title">Peak No Jokes</h4>
                                <div class="container">
                                    <p class="card-text"><b>&#8364;39.90</b></p>
                                    <button class="card-button">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subscription -->

        <div class="subscribe">
            <div class="width-container">
                <div class="sub-items">
                    <div class="circle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white"
                            class="bi bi-person-plus" viewBox="0 0 16 16">
                            <path
                                d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                            <path fill-rule="evenodd"
                                d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                        </svg>
                    </div>
                </div>
                <div class="sub-items">
                    <h2>NEW SUBSCRIBER</h2>
                    <h2><b>DISCOUNT</b></h2>
                </div>
                <div class="division"></div>
                <div class="sub-items">
                    <div class="text">Sign up to our weekly newsletter and receive a <a href="" class="red"><b>12%
                                discount code</b></a>
                    </div>
                </div>
                <div class="sub-items">
                    <form class="search-wrapper cf">
                        <input type="text" placeholder="Email Address" required style="box-shadow: none">
                        <button type="submit">SUBSCRIBE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Body end -->

    <!-- Footer starts here -->

    <footer>
        <div class="width-container">
            <nav class="navbar navbar-expand-lg">
                <div class="footer-container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#footer-1"
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation"><b>CONTACT INFORMATION</b></button>
                    <div class="collapse navbar-collapse" id="footer-1">
                        <div class="footer-items">
                            <div class="footer-row">
                                <div class="footer-col-svg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-geo-alt"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    </svg>
                                </div>
                                <div class="footer-col">
                                    <div class="footer-items">
                                        <a class="footer-heading" href="#"><b>Approved companies</b></a>
                                        <a class="footer-links" href="#">Rosenkranzer str.2b</a>
                                        <a class="footer-links" href="#">25927 Aventoft</a>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-row">
                                <div class="footer-col-svg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-phone"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
                                        <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                    </svg>
                                </div>
                                <div class="footer-col">
                                    <div class="footer-items">
                                        <a class="footer-heading" href="#"><b>Phone</b></a>
                                        <a class="footer-links" href="#">+45 36997080</a>
                                        <a class="footer-links" href="#">+49 4664 2830428</a>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-row">
                                <div class="footer-col-svg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-envelope"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                    </svg>
                                </div>
                                <div class="footer-col">
                                    <div class="footer-items">
                                        <a class="footer-heading" href="#"><b>Email</b></a>
                                        <a class="footer-links" href="#">cs@only-approved.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#footer-2"
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation"><b>USER
                            LINKS</b></button>
                    <div class="collapse navbar-collapse" id="footer-2">
                        <div class="footer-items">
                            <a class="footer-links" href="#">About us</a>
                            <a class="footer-links" href="#">Contact us</a>
                            <a class="footer-links" href="#">My Account</a>
                            <a class="footer-links" href="#">Order history</a>
                            <a class="footer-links" href="#">Login</a>
                        </div>
                    </div>
                </div>
                <div class="footer-container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#footer-3"
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation"><b>GENERAL INFORMATION</b></button>
                    <div class="collapse navbar-collapse" id="footer-3">
                        <div class="footer-items">
                            <a class="footer-links" href="#">Privacy Policy</a>
                            <a class="footer-links" href="#">Terms & Conditions</a>
                            <a class="footer-links" href="#">Bodybuilding Blog</a>
                            <a class="footer-links" href="#">Free shipping</a>
                            <a class="footer-links" href="#">Delivery</a>
                        </div>
                    </div>
                </div>
                <div class="footer-container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#footer-4"
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation"><b>QUICK
                            LINKS</b></button>
                    <div class="collapse navbar-collapse" id="footer-4">
                        <div class="footer-items">
                            <a class="footer-links" href="#">Buy Whey Protein</a>
                            <a class="footer-links" href="#">Buy Fat Burners</a>
                            <a class="footer-links" href="#">Buy Pre workouts</a>
                            <a class="footer-links" href="#">Buy Vitamins & Minerals</a>
                            <a class="footer-links" href="#">Buy EAA & BCAA</a>
                            <a class="footer-links" href="#">Buy Gym Clothing</a>
                        </div>
                    </div>
                </div>
                <div class="footer-container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#footer-5"
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation"><b>FOLLOW US</b></button>
                    <div class="collapse navbar-collapse" id="footer-5">
                        <div class="footer-items">
                            <div class="svg-grp">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 512 512">
                                    <path
                                        d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 448 512">
                                    <path
                                        d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 576 512">
                                    <path
                                        d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 448 512">
                                    <path
                                        d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="width-container">
            <div class="h-line"></div>
        </div>
        <div class="width-container">
            <div class="support p-1">
                <h6>Support hours</h6>
                <div class="text p-1">Mon-Fri / 9:00AM - 2:00PM</div>
            </div>
            <p class="p-1">@ EST.2021 Approved Comapanies GmbH, All Rights Reserved.Approved Companies</p>
            <div class="footer-image">
                <img class="p-1" src="images/footer.png" alt="">
            </div>
        </div>
    </footer>

    <!-- Footer end -->

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="javascript.js"></script>

</html>