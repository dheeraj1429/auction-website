<?php
?>
<footer class="footer ">
    <!-- Footer -->
    <div class="container padding_one">
        <div class="row pt-4">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                <h1 class="text-white my-3">OUT STORE</h1>
                <p class="light_para">Lorem ipsum, dolor sit amet consectetur adipisicing <br> elit. Optio
                    voluptatem qui
                    magnam
                    aliquid cum atque
                    tempore quia? Quis, doloribus commodi.</p>

                <!-- Footer icons -->
                <div class="footer_icons">
                    <a href="<?php echo getValuesByName("facebook") ?>">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="<?php echo getValuesByName("instagram") ?>">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="<?php echo getValuesByName("linkedin") ?>">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="<?php echo getValuesByName("twitter") ?>">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
                <!-- Footer icons -->

            </div>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                <h1 class="text-white my-3">My Account</h1>
                <p class="light_para"><a href="#">Sign In</a></p>
                <p class="light_para"><a href="#">View Cart</a></p>
                <p class="light_para"><a href="#">My Wishlist</a></p>
                <p class="light_para"><a href="#">Track My Order</a></p>
                <p class="light_para"><a href="#">Help</a></p>

            </div>

            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                <h1 class="text-white my-3">Information</h1>
                <p class="light_para"><a href="#">About Me</a></p>
                <p class="light_para"><a href="#">How to shop ?</a></p>
                <p class="light_para"><a href="#">FAQ</a></p>
                <p class="light_para"><a href="#">Contact Us</a></p>
                <p class="light_para"><a href="#">Log in</a></p>
            </div>

            <div class="col-12 col-sm-12 col-md-2 col-lg-2">
                <h1 class="text-white my-3">Customer Service</h1>
                <p class="light_para"><a href="#">Payment Methods</a></p>
                <p class="light_para"><a href="#">Money-back gurantee</a></p>
                <p class="light_para"><a href="#">Return</a></p>
                <p class="light_para"><a href="#">Shipping</a></p>
                <p class="light_para"><a href="#">Terms and conditions</a></p>
                <p class="light_para"><a href="#">Privacy Prolicy</a></p>
            </div>

        </div>

    </div>
    <!-- Footer -->


    <!-- Footer Second -->
    <div class="container-fluid footer_second">
        <div class="row">
            <div class="d-flex justify-content-around py-3">
                <p class="light_para">Copyright © 2021 Molla Store. All Rights Reserved.</p>
                <p class="light_para">Terms Of Use Privacy Policy</p>
            </div>
        </div>
    </div>
    <!-- Footer Second -->
</footer>

<!-- Footer -->

<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- slick -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Bootsrap 5 script CDN -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

<!-- Script File CDN -->
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