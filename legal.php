<?php
require_once "./session.php";
require_once "./getValuesByName.php";

$pageName = "legal";
?>
<?php require_once "./header.php" ?>
<!-- Header -->

<main>
    <!-- Banner section -->
    <section class="Banner_Section_div">
        <h1 class="text-white banner_heading">LEGAL <span>NOTICE</span></h1>
    </section>
    <!-- Banner section -->

    <!-- Content -->
    <section class="Policy_section py-5">
        <div class="container">
            <h1 class="mb-4">PREAMBLE</h1>
            <p class="light_para mt-2">
                <?php echo getValuesByName("condition") ?>
            </p>
            <p class="light_para mt-2">Telephone number: <?php echo getValuesByName("phone_number"); ?></p>
            <p class="light_para mt-2">Email address: <?php echo getValuesByName("email"); ?></p>
            <p class="light_para mt-2">Legal representative: Iheb Souilem, in his capacity as Chairman of Global bid</p>
            <p class="light_para mt-2">Responsible for publication: Iheb Souilem</p>
        </div>
    </section>
    <!-- Content -->
</main>

<!-- Footer -->
<?php require_once "footer2.php" ?>
<!-- Footer -->

<!-- Bootsrap 5 script CDN -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>