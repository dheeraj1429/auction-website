<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>How It Works</title>

   <!-- Bootstarp 5 CDN -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />

   <!-- Font Awesome CDN -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

   <!-- Style sheet Link -->
   <link rel="stylesheet" href="./assests/style/global.css" />
   <link rel="stylesheet" href="./assests/style/Home.css" />
   <link rel="stylesheet" href="./assests/style/ended.css" />
   <link rel="stylesheet" href="./assests/style/navbar.css" />
   <link rel="stylesheet" href="./assests/style/button.css" />
   <link rel="stylesheet" href="./assests/style/footer.css" />
   <link rel="stylesheet" href="./assests/style/responsive.css" />

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
</head>

<body>
   <!-- Header -->
   <header>
      <!-- Top Header -->
      <div class="Top_Header">
         <div class="Top_Header_Inner container-fluid side_padding">
            <div class="Top_Navbar_Inner_Sm_div">
               <i class="fas fa-envelope"></i>
               <p class="text-white">loremipsum@gmail.com</p>
            </div>

            <!-- Top navbar icons -->
            <div class="Top_Navbar_Inner_Sm_div">
               <i class="fab fa-facebook-f"></i>
               <i class="fab fa-instagram"></i>
               <i class="fab fa-linkedin-in"></i>
               <i class="fab fa-twitter"></i>
            </div>
            <!-- Top navbar icons -->
         </div>
      </div>
      <!-- Top Header -->

      <!-- Main-Navbar -->
      <div class="Top_second_naber py-1">
         <div class="container-fludi side_padding">
            <nav class="navbar navbar-expand-xxl navbar-light">
               <div class="container-fluid">
                  <a class="navbar-brand" href="./home.html">
                     <h1>Smart-Auction</h1>
                  </a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                     aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                     <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                           <a class="nav-link active" aria-current="page" href="./home.html">HOME</a>
                        </li>

                        <li class="nav-item">
                           <a class="nav-link active" aria-current="page" href="./howItWorks.html">HOW IT WORKS</a>
                        </li>

                        <li class="nav-item">
                           <a class="nav-link active active_header" aria-current="page" href="./Ended.html">ENDED
                              AUCTIONS</a>
                        </li>

                        <li class="nav-item">
                           <a class="nav-link active" aria-current="page" href="./currentAuctions.html">CURRENT
                              AUCTIONS</a>
                        </li>

                        <li class="nav-item">
                           <a class="nav-link active" aria-current="page" href="./contact.html">CONTACT</a>
                        </li>

                        <li class="nav-item">
                           <a class="nav-link active" aria-current="page" href="./Buy_token.html">BUY TOKENS</a>
                        </li>
                        <!-- <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="./MyAccount.html">AALBOUCHI</a>
                </li> -->

                        <li class="nav-item">
                           <div class="dropdown">
                              <button class="btn btn-secondary dropdown-toggle drop" type="button"
                                 id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                 AALBOUCHI
                              </button>
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                 <li><a class="dropdown-item" href="./MyAccount.html">My Account</a></li>
                                 <li><a class="dropdown-item" href="#">Sign Out</a></li>
                              </ul>
                           </div>
                        </li>

                        <div class="sign_in_button d-flex align-items-center ms-5">
                           <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="./logIn.html">LOG IN</a>
                           </li>
                           <a class="Subcribe_button_sm text-white" href="./register.html">REGISTER </a>
                        </div>
                     </ul>
                  </div>
               </div>
            </nav>
         </div>
      </div>
      <!-- Main-Navbar -->
   </header>
   <!-- Header -->

   <!-- Main -->
   <main>
      <!-- Banner section -->
      <section class="Banner_Section_div">
         <h1 class="text-white">ENDED <span>AUCTIONS</span></h1>
      </section>
      <!-- Banner section -->

      <!-- Catelog section -->
      <div class="catalog_section padding_one main_bg">
         <div class="container_fluid side_padding">
            <!-- Catelog section heading -->
            <div class="row">
               <div class="col-12">
                  <div class="hot_it_works_heading text-center py-3">
                     <h1>CATALOG OF COMPLETER <span class="span_color_2">AUCTIONS</span></h1>
                     <div class="line_div my-4"></div>
                  </div>
               </div>
            </div>
            <!-- Catelog section heading -->

            <!-- Catalog section products -->
            <div class="row mt-5 justify-content-center">
               <div
                  class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-4 mb-5 d-flex justify-content-center align-items-center">
                  <!-- Products Cards -->
                  <div class="Auctions_products_cards text-center p-3">
                     <!-- Products Images -->
                     <img src="./assests/icons&images/image 58.png" alt="" class="img-fluid my-4" />
                     <!-- Products Images -->

                     <!-- content -->
                     <div class="Auction_Products_Cards_content">
                        <h3>White Solo 2 Wireless</h3>
                        <h5>Headphones</h5>

                        <!-- Instead price -->
                        <div class="Instead_Price_div d-flex align-items-center justify-content-center my-3">
                           <h3 class="me-2">instead of <strike>$1100</strike></h3>
                           <h4>$248</h4>
                        </div>
                        <!-- Instead price -->

                        <!-- Add to card -->
                        <!-- <button class="Add_to_cart mb-3">Add to Cart</button> -->
                        <!-- Add to card -->
                     </div>
                     <!-- content -->
                  </div>
                  <!-- Products Cards -->
               </div>

               <div
                  class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-4 mb-5 d-flex justify-content-center align-items-center">
                  <!-- Products Cards -->
                  <div class="Auctions_products_cards text-center p-3">
                     <!-- Products Images -->
                     <img src="./assests/icons&images/image 59.png" alt="" class="img-fluid my-4" />
                     <!-- Products Images -->

                     <!-- content -->
                     <div class="Auction_Products_Cards_content">
                        <h3>White Solo 2 Wireless</h3>
                        <h5>Headphones</h5>

                        <!-- Instead price -->
                        <div class="Instead_Price_div d-flex align-items-center justify-content-center my-3">
                           <h3 class="me-2">instead of <strike>$1100</strike></h3>
                           <h4>$248</h4>
                        </div>
                        <!-- Instead price -->

                        <!-- Add to card -->
                        <!-- <button class="Add_to_cart mb-3">Add to Cart</button> -->
                        <!-- Add to card -->
                     </div>
                     <!-- content -->
                  </div>
                  <!-- Products Cards -->
               </div>

               <div
                  class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-4 mb-5 d-flex justify-content-center align-items-center">
                  <!-- Products Cards -->
                  <div class="Auctions_products_cards text-center p-3">
                     <!-- Products Images -->
                     <img src="./assests/icons&images/image 18.png" alt="" class="img-fluid my-4" />
                     <!-- Products Images -->

                     <!-- content -->
                     <div class="Auction_Products_Cards_content">
                        <h3>White Solo 2 Wireless</h3>
                        <h5>Headphones</h5>

                        <!-- Instead price -->
                        <div class="Instead_Price_div d-flex align-items-center justify-content-center my-3">
                           <h3 class="me-2">instead of <strike>$1100</strike></h3>
                           <h4>$248</h4>
                        </div>
                        <!-- Instead price -->

                        <!-- Add to card -->
                        <!-- <button class="Add_to_cart mb-3">Add to Cart</button> -->
                        <!-- Add to card -->
                     </div>
                     <!-- content -->
                  </div>
                  <!-- Products Cards -->
               </div>

               <div
                  class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-4 mb-5 d-flex justify-content-center align-items-center">
                  <!-- Products Cards -->
                  <div class="Auctions_products_cards text-center p-3">
                     <!-- Products Images -->
                     <img src="./assests/icons&images/image 56.png" alt="" class="img-fluid my-4" />
                     <!-- Products Images -->

                     <!-- content -->
                     <div class="Auction_Products_Cards_content">
                        <h3>White Solo 2 Wireless</h3>
                        <h5>Headphones</h5>

                        <!-- Instead price -->
                        <div class="Instead_Price_div d-flex align-items-center justify-content-center my-3">
                           <h3 class="me-2">instead of <strike>$1100</strike></h3>
                           <h4>$248</h4>
                        </div>
                        <!-- Instead price -->

                        <!-- Add to card -->
                        <!-- <button class="Add_to_cart mb-3">Add to Cart</button> -->
                        <!-- Add to card -->
                     </div>
                     <!-- content -->
                  </div>
                  <!-- Products Cards -->
               </div>

               <div
                  class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-4 mb-5 d-flex justify-content-center align-items-center">
                  <!-- Products Cards -->
                  <div class="Auctions_products_cards text-center p-3">
                     <!-- Products Images -->
                     <img src="./assests/icons&images/image 56.png" alt="" class="img-fluid my-4" />
                     <!-- Products Images -->

                     <!-- content -->
                     <div class="Auction_Products_Cards_content">
                        <h3>White Solo 2 Wireless</h3>
                        <h5>Headphones</h5>

                        <!-- Instead price -->
                        <div class="Instead_Price_div d-flex align-items-center justify-content-center my-3">
                           <h3 class="me-2">instead of <strike>$1100</strike></h3>
                           <h4>$248</h4>
                        </div>
                        <!-- Instead price -->

                        <!-- Add to card -->
                        <!-- <button class="Add_to_cart mb-3">Add to Cart</button> -->
                        <!-- Add to card -->
                     </div>
                     <!-- content -->
                  </div>
                  <!-- Products Cards -->
               </div>

               <div
                  class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-4 mb-5 d-flex justify-content-center align-items-center">
                  <!-- Products Cards -->
                  <div class="Auctions_products_cards text-center p-3">
                     <!-- Products Images -->
                     <img src="./assests/icons&images/image 57.png" alt="" class="img-fluid my-4" />
                     <!-- Products Images -->

                     <!-- content -->
                     <div class="Auction_Products_Cards_content">
                        <h3>White Solo 2 Wireless</h3>
                        <h5>Headphones</h5>

                        <!-- Instead price -->
                        <div class="Instead_Price_div d-flex align-items-center justify-content-center my-3">
                           <h3 class="me-2">instead of <strike>$1100</strike></h3>
                           <h4>$248</h4>
                        </div>
                        <!-- Instead price -->

                        <!-- Add to card -->
                        <!-- <button class="Add_to_cart mb-3">Add to Cart</button> -->
                        <!-- Add to card -->
                     </div>
                     <!-- content -->
                  </div>
                  <!-- Products Cards -->
               </div>

               <div
                  class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-4 mb-5 d-flex justify-content-center align-items-center">
                  <!-- Products Cards -->
                  <div class="Auctions_products_cards text-center p-3">
                     <!-- Products Images -->
                     <img src="./assests/icons&images/image 57.png" alt="" class="img-fluid my-4" />
                     <!-- Products Images -->

                     <!-- content -->
                     <div class="Auction_Products_Cards_content">
                        <h3>White Solo 2 Wireless</h3>
                        <h5>Headphones</h5>

                        <!-- Instead price -->
                        <div class="Instead_Price_div d-flex align-items-center justify-content-center my-3">
                           <h3 class="me-2">instead of <strike>$1100</strike></h3>
                           <h4>$248</h4>
                        </div>
                        <!-- Instead price -->

                        <!-- Add to card -->
                        <!-- <button class="Add_to_cart mb-3">Add to Cart</button> -->
                        <!-- Add to card -->
                     </div>
                     <!-- content -->
                  </div>
                  <!-- Products Cards -->
               </div>

               <div
                  class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-4 mb-5 d-flex justify-content-center align-items-center">
                  <!-- Products Cards -->
                  <div class="Auctions_products_cards text-center p-3">
                     <!-- Products Images -->
                     <img src="./assests/icons&images/image 57.png" alt="" class="img-fluid my-4" />
                     <!-- Products Images -->

                     <!-- content -->
                     <div class="Auction_Products_Cards_content">
                        <h3>White Solo 2 Wireless</h3>
                        <h5>Headphones</h5>

                        <!-- Instead price -->
                        <div class="Instead_Price_div d-flex align-items-center justify-content-center my-3">
                           <h3 class="me-2">instead of <strike>$1100</strike></h3>
                           <h4>$248</h4>
                        </div>
                        <!-- Instead price -->

                        <!-- Add to card -->
                        <!-- <button class="Add_to_cart mb-3">Add to Cart</button> -->
                        <!-- Add to card -->
                     </div>
                     <!-- content -->
                  </div>
                  <!-- Products Cards -->
               </div>

               <div
                  class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-4 mb-5 d-flex justify-content-center align-items-center">
                  <!-- Products Cards -->
                  <div class="Auctions_products_cards text-center p-3">
                     <!-- Products Images -->
                     <img src="./assests/icons&images/image 58.png" alt="" class="img-fluid my-4" />
                     <!-- Products Images -->

                     <!-- content -->
                     <div class="Auction_Products_Cards_content">
                        <h3>White Solo 2 Wireless</h3>
                        <h5>Headphones</h5>

                        <!-- Instead price -->
                        <div class="Instead_Price_div d-flex align-items-center justify-content-center my-3">
                           <h3 class="me-2">instead of <strike>$1100</strike></h3>
                           <h4>$248</h4>
                        </div>
                        <!-- Instead price -->

                        <!-- Add to card -->
                        <!-- <button class="Add_to_cart mb-3">Add to Cart</button> -->
                        <!-- Add to card -->
                     </div>
                     <!-- content -->
                  </div>
                  <!-- Products Cards -->
               </div>

               <div
                  class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-4 mb-5 d-flex justify-content-center align-items-center">
                  <!-- Products Cards -->
                  <div class="Auctions_products_cards text-center p-3">
                     <!-- Products Images -->
                     <img src="./assests/icons&images/image 59.png" alt="" class="img-fluid my-4" />
                     <!-- Products Images -->

                     <!-- content -->
                     <div class="Auction_Products_Cards_content">
                        <h3>White Solo 2 Wireless</h3>
                        <h5>Headphones</h5>

                        <!-- Instead price -->
                        <div class="Instead_Price_div d-flex align-items-center justify-content-center my-3">
                           <h3 class="me-2">instead of <strike>$1100</strike></h3>
                           <h4>$248</h4>
                        </div>
                        <!-- Instead price -->

                        <!-- Add to card -->
                        <!-- <button class="Add_to_cart mb-3">Add to Cart</button> -->
                        <!-- Add to card -->
                     </div>
                     <!-- content -->
                  </div>
                  <!-- Products Cards -->
               </div>

               <div
                  class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-4 mb-5 d-flex justify-content-center align-items-center">
                  <!-- Products Cards -->
                  <div class="Auctions_products_cards text-center p-3">
                     <!-- Products Images -->
                     <img src="./assests/icons&images/image 18.png" alt="" class="img-fluid my-4" />
                     <!-- Products Images -->

                     <!-- content -->
                     <div class="Auction_Products_Cards_content">
                        <h3>White Solo 2 Wireless</h3>
                        <h5>Headphones</h5>

                        <!-- Instead price -->
                        <div class="Instead_Price_div d-flex align-items-center justify-content-center my-3">
                           <h3 class="me-2">instead of <strike>$1100</strike></h3>
                           <h4>$248</h4>
                        </div>
                        <!-- Instead price -->

                        <!-- Add to card -->
                        <!-- <button class="Add_to_cart mb-3">Add to Cart</button> -->
                        <!-- Add to card -->
                     </div>
                     <!-- content -->
                  </div>
                  <!-- Products Cards -->
               </div>

               <div
                  class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-4 mb-5 d-flex justify-content-center align-items-center">
                  <!-- Products Cards -->
                  <div class="Auctions_products_cards text-center p-3">
                     <!-- Products Images -->
                     <img src="./assests/icons&images/image 21.png" alt="" class="img-fluid my-4" />
                     <!-- Products Images -->

                     <!-- content -->
                     <div class="Auction_Products_Cards_content">
                        <h3>White Solo 2 Wireless</h3>
                        <h5>Headphones</h5>

                        <!-- Instead price -->
                        <div class="Instead_Price_div d-flex align-items-center justify-content-center my-3">
                           <h3 class="me-2">instead of <strike>$1100</strike></h3>
                           <h4>$248</h4>
                        </div>
                        <!-- Instead price -->

                        <!-- Add to card -->
                        <!-- <button class="Add_to_cart mb-3">Add to Cart</button> -->
                        <!-- Add to card -->
                     </div>
                     <!-- content -->
                  </div>
                  <!-- Products Cards -->
               </div>

               <div
                  class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-4 mb-5 d-flex justify-content-center align-items-center">
                  <!-- Products Cards -->
                  <div class="Auctions_products_cards text-center p-3">
                     <!-- Products Images -->
                     <img src="./assests/icons&images/image 20.png" alt="" class="img-fluid my-4" />
                     <!-- Products Images -->

                     <!-- content -->
                     <div class="Auction_Products_Cards_content">
                        <h3>White Solo 2 Wireless</h3>
                        <h5>Headphones</h5>

                        <!-- Instead price -->
                        <div class="Instead_Price_div d-flex align-items-center justify-content-center my-3">
                           <h3 class="me-2">instead of <strike>$1100</strike></h3>
                           <h4>$248</h4>
                        </div>
                        <!-- Instead price -->

                        <!-- Add to card -->
                        <!-- <button class="Add_to_cart mb-3">Add to Cart</button> -->
                        <!-- Add to card -->
                     </div>
                     <!-- content -->
                  </div>
                  <!-- Products Cards -->
               </div>

               <div
                  class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-4 mb-5 d-flex justify-content-center align-items-center">
                  <!-- Products Cards -->
                  <div class="Auctions_products_cards text-center p-3">
                     <!-- Products Images -->
                     <img src="./assests/icons&images/image 60.png" alt="" class="img-fluid my-4" />
                     <!-- Products Images -->

                     <!-- content -->
                     <div class="Auction_Products_Cards_content">
                        <h3>White Solo 2 Wireless</h3>
                        <h5>Headphones</h5>

                        <!-- Instead price -->
                        <div class="Instead_Price_div d-flex align-items-center justify-content-center my-3">
                           <h3 class="me-2">instead of <strike>$1100</strike></h3>
                           <h4>$248</h4>
                        </div>
                        <!-- Instead price -->

                        <!-- Add to card -->
                        <!-- <button class="Add_to_cart mb-3">Add to Cart</button> -->
                        <!-- Add to card -->
                     </div>
                     <!-- content -->
                  </div>
                  <!-- Products Cards -->
               </div>

               <div
                  class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-4 mb-5 d-flex justify-content-center align-items-center">
                  <!-- Products Cards -->
                  <div class="Auctions_products_cards text-center p-3">
                     <!-- Products Images -->
                     <img src="./assests/icons&images/image 61.png" alt="" class="img-fluid my-4" />
                     <!-- Products Images -->

                     <!-- content -->
                     <div class="Auction_Products_Cards_content">
                        <h3>White Solo 2 Wireless</h3>
                        <h5>Headphones</h5>

                        <!-- Instead price -->
                        <div class="Instead_Price_div d-flex align-items-center justify-content-center my-3">
                           <h3 class="me-2">instead of <strike>$1100</strike></h3>
                           <h4>$248</h4>
                        </div>
                        <!-- Instead price -->

                        <!-- Add to card -->
                        <!-- <button class="Add_to_cart mb-3">Add to Cart</button> -->
                        <!-- Add to card -->
                     </div>
                     <!-- content -->
                  </div>
                  <!-- Products Cards -->
               </div>

               <div class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-4 mb-5 justify-content-center align-items-center">
                  <!-- Products Cards -->
                  <div class="Auctions_products_cards text-center p-3">
                     <!-- Products Images -->
                     <img src="./assests/icons&images/image 64.png" alt="" class="img-fluid my-4" />
                     <!-- Products Images -->

                     <!-- content -->
                     <div class="Auction_Products_Cards_content">
                        <h3>White Solo 2 Wireless</h3>
                        <h5>Headphones</h5>

                        <!-- Instead price -->
                        <div class="Instead_Price_div d-flex align-items-center justify-content-center my-3">
                           <h3 class="me-2">instead of <strike>$1100</strike></h3>
                           <h4>$248</h4>
                        </div>
                        <!-- Instead price -->

                        <!-- Add to card -->
                        <!-- <button class="Add_to_cart mb-3">Add to Cart</button> -->
                        <!-- Add to card -->
                     </div>
                     <!-- content -->
                  </div>
                  <!-- Products Cards -->
               </div>

               <div class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-4 mb-5 justify-content-center align-items-center">
                  <!-- Products Cards -->
                  <div class="Auctions_products_cards text-center p-3">
                     <!-- Products Images -->
                     <img src="./assests/icons&images/image 63.png" alt="" class="img-fluid my-4" />
                     <!-- Products Images -->

                     <!-- content -->
                     <div class="Auction_Products_Cards_content">
                        <h3>White Solo 2 Wireless</h3>
                        <h5>Headphones</h5>

                        <!-- Instead price -->
                        <div class="Instead_Price_div d-flex align-items-center justify-content-center my-3">
                           <h3 class="me-2">instead of <strike>$1100</strike></h3>
                           <h4>$248</h4>
                        </div>
                        <!-- Instead price -->

                        <!-- Add to card -->
                        <!-- <button class="Add_to_cart mb-3">Add to Cart</button> -->
                        <!-- Add to card -->
                     </div>
                     <!-- content -->
                  </div>
                  <!-- Products Cards -->
               </div>

               <div class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-4 mb-5 justify-content-center align-items-center">
                  <!-- Products Cards -->
                  <div class="Auctions_products_cards text-center p-3">
                     <!-- Products Images -->
                     <img src="./assests/icons&images/image 62.png" alt="" class="img-fluid my-4" />
                     <!-- Products Images -->

                     <!-- content -->
                     <div class="Auction_Products_Cards_content">
                        <h3>White Solo 2 Wireless</h3>
                        <h5>Headphones</h5>

                        <!-- Instead price -->
                        <div class="Instead_Price_div d-flex align-items-center justify-content-center my-3">
                           <h3 class="me-2">instead of <strike>$1100</strike></h3>
                           <h4>$248</h4>
                        </div>
                        <!-- Instead price -->

                        <!-- Add to card -->
                        <!-- <button class="Add_to_cart mb-3">Add to Cart</button> -->
                        <!-- Add to card -->
                     </div>
                     <!-- content -->
                  </div>
                  <!-- Products Cards -->
               </div>
            </div>

            <!-- Catalog section products -->

            <div class="row padding_one">
               <div class="col-12 d-flex align-items-center justify-content-center">
                  <!-- pagination -->
                  <div class="d-flex">
                     <div class="pagiantion_div activepagination">1</div>
                     <div class="pagiantion_div">2</div>
                     <div class="pagiantion_div">3</div>
                     <div class="pagiantion_div">4</div>
                     <div class="pagiantion_div">5</div>
                     <div class="pagiantion_div"><img src="./assests/icons&images/Vector (3).svg" alt="" /></div>
                  </div>
                  <!-- pagination -->
               </div>
            </div>
         </div>
      </div>
      <!-- Catelog section -->

      <!-- News Letter Section -->

      <section class="news_letter_sectionside_padding main_bg">
         <div class="container-fluid padding_one">
            <div class="row gx-0">
               <div class="col-12 d-flex align-items-center justify-content-center">
                  <!-- News letter div -->
                  <div class="news_letter_inner_div">
                     <div class="row px-3 align-items-center">
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                           <h1>Receive our newsletter:</h1>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-xl-7 col-xxl-8">
                           <div class="row align-items-center justify-content-center">
                              <div class="col-12 col-md-8 col-lg-9 my-4 my-md-0">
                                 <div class="input_group_div">
                                    <div class="inner_input d-flex">
                                       <input type="email" placeholder="Enter your Email" />
                                       <div class="news_icons">
                                          <img src="./assests/icons&images/Layer 2.svg" alt="" />
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-md-4 col-lg-2">
                                 <!-- News letter button -->
                                 <button class="send_button">Send</button>
                                 <!-- News letter button -->
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- News letter div -->
               </div>
            </div>
         </div>
      </section>
      <!-- News Letter Section -->
   </main>
   <!-- Main -->

   <!-- Footer -->
   <!-- Footer -->
   <footer class="footer side_padding">
      <!-- Footer -->
      <div class="container padding_one">
         <div class="row pt-4 justify-content-center">
            <div class="col-12 col-sm-6 col-md-4 col-lg-5">
               <h1 class="text-white my-3">SMART-AUCTION</h1>
               <p class="light_para">
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio <br />
                  voluptatem qui magnam aliquid cum atque tempore quia? Quis,<br />
                  doloribus commodi.
               </p>

               <!-- Footer icons -->
               <!-- <div class="footer_icons">
          <i class="fab fa-facebook-f"></i>
          <i class="fab fa-instagram"></i>
          <i class="fab fa-linkedin-in"></i>
          <i class="fab fa-twitter"></i>
        </div> -->
               <!-- Footer icons -->
            </div>

            <div class="col-12 col-sm-6 col-md-3 col-lg-2 mt-3 mt-md-0">
               <h1 class="text-white my-3">USEFUL LINKS</h1>
               <p class="light_para"><a href="./woWeare.html">Who are we?</a></p>
               <p class="light_para"><a href="./howItWorks.html">How it works?</a></p>
               <p class="light_para"><a href="./terms.html">Terms and Conditions</a></p>
               <p class="light_para"><a href="./legal.html">Legal</a></p>
            </div>

            <!-- <div class="col-12 col-sm-6 col-md-3 col-lg-3">
        <h1 class="text-white my-3">STAY IN TOUCH</h1>
        <div class="footer-icons_div d-flex align-items-center">
          <i class=" fas fa-map-marker-alt text-white"></i>
          <p class="light_para mb-0 ms-3"><a href="#">Residence les dunes tanisay, 2033 Akolk, UK City</a></p>
        </div>

        <div class="footer-icons_div my-3 d-flex align-items-center">
          <i class="fas fa-phone-alt text-white"></i>
          <p class="light_para mb-0 ms-3"><a href="#">7352-256-546-202</a></p>
        </div>

        <div class="footer-icons_div d-flex align-items-center">
          <i class="fas fa-mail-bulk text-white"></i>
          <p class="light_para mb-0 ms-3"><a href="#">contact@gami.com</a></p>
        </div>


      </div> -->

            <div class="col-12 col-sm-6 col-md-4 col-lg-4 ms-lg-5 ms-md-0">
               <h1 class="text-white my-3">NEWSLETTER</h1>
               <!-- <p class="light_para">Lorem ipsum dolor sit amet consectetur adipisicing.</p> -->

               <!-- News letter section -->
               <div class="newsLetter_search">
                  <input type="search" placeholder="Enter your email" />
                  <div class="newlettButton">SUBSCRIBE</div>
               </div>
               <!-- News letter section -->

               <!-- <p class="light_para"><a href="#">Payment Methods</a></p>
        <p class="light_para"><a href="#">Money-back gurantee</a></p>
        <p class="light_para"><a href="#">Return</a></p>
        <p class="light_para"><a href="#">Shipping</a></p>
        <p class="light_para"><a href="#">Terms and conditions</a></p>
        <p class="light_para"><a href="#">Privacy Prolicy</a></p> -->
            </div>
         </div>
      </div>
      <!-- Footer -->

      <!-- Footer Second -->
      <div class="container-fluid footer_second">
         <div class="row">
            <div class="d-flex justify-content-around py-3">
               <p class="light_para">Copyright © 2021. All Rights Reserved.</p>
               <p class="light_para">
                  <a href="./terms.html"> Terms of Use </a> and
                  <a href="./policy.html"> Privacy Policy </a>
               </p>
            </div>
         </div>
      </div>
      <!-- Footer Second -->
   </footer>

   <!-- Footer -->
   <!-- Footer -->

   <!-- Bootsrap 5 script CDN -->
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>