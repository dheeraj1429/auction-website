<footer class="footer side_padding second_footer">
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


            </div>

            <div class="col-12 col-sm-6 col-md-3 col-lg-2 mt-3 mt-md-0">
                <h1 class="text-white my-3">USEFUL LINKS</h1>
                <p class="light_para"><a href="./woWeare.php">Who are we?</a></p>
                <p class="light_para"><a href="./howItWorks.php">How it works?</a></p>
                <p class="light_para"><a href="./terms.php">Terms and Conditions</a></p>
                <p class="light_para"><a href="./legal.php">Legal</a></p>
            </div>



            <div class="col-12 col-sm-6 col-md-4 col-lg-4 ms-lg-5 ms-md-0">
                <h1 class="text-white my-3">NEWSLETTER</h1>

                <!-- News letter section -->
                <form action="./addNewsLetter.php" method="post">
                    <div class="newsLetter_search">
                        <input type="email" autocomplete="off" required name="email" placeholder="Enter your email" />
                        <button style="border: none" type="submit" name="submit"
                            class="newlettButton">SUBSCRIBE</button>
                    </div>
                </form>
                <!-- News letter section -->


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

<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- slick -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<!-- Bootsrap 5 script CDN -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="./assests/js/main.js"></script>
<script>
$('.slider').slick({
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 2,
    responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});
$('.slider2').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 2,
    slidesToScroll: 3,
    responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});
</script>
</body>

</html>