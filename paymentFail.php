<?php
require_once "session.php";
?>
<?php require_once "./header.php" ?>

<!-- main -->
<main>
    <section class="payment_successful">
        <div class="container padding_Two">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-md-6 d-flex align-items-center justify-content-center">
                    <div class="paymentCard failedCard text-center px-4">
                        <img src="https://cdn.dribbble.com/users/251873/screenshots/9388228/error-img.gif"
                            class="img-fluid" alt="">

                        <h3>Sorry, payment Failed!</h3>

                        <div class="failed_content py-4">
                            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, ut
                                numquam? Explicabo
                                ducimus
                                dolores iure placeat ad fugit rem nihil quo iste ullam aliquam fugiat assumenda
                                accusantium commodi
                                optio quidem reiciendis exercitationem dolor dolorem tempora at, sint ipsam, accusamus
                                ut? Quod
                                reprehenderit, quisquam tenetur voluptatibus error voluptatem? Fugit, perspiciatis unde!
                            </p>

                            <a href="./home.html"><i class="fas fa-chevron-right"></i> Back to "My Orders"</a>

                            <p class="my-3">Having trouble? <a href="./home.html">Submit a ticket</a> and we will get
                                back to you.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- main -->


<!-- Footer -->
<?php require_once "./footer2.php" ?>