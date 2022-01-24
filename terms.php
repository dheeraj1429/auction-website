<?php
require_once "./session.php";
require_once "./getValuesByName.php";

$pageName = "terms";
?>
<?php require_once './header.php' ?>
<!-- Header -->

<main>
    <!-- Banner section -->
    <section class="Banner_Section_div">
        <h1 class="text-white banner_heading">TERMS <span>CONDITIONS</span></h1>
    </section>
    <!-- Banner section -->

    <!-- Content -->
    <section class="Policy_section py-5">
        <div class="container">
            <h1 class="mb-4">TERMS</h1>
            <p class="light_para mt-2">
                <?php echo htmlspecialchars_decode(getValuesByName("terms")) ?>
            </p>
            <h3>Policy</h3>
            <p class="light_para">
                <?php echo htmlspecialchars_decode(getValuesByName("privacy")) ?>
            </p>
            <p class="light_para mt-2">Telephone number: <?php getValuesByName("phone_number") ?></p>
            <p class="light_para mt-2">Email address: <?php echo getValuesByName("email") ?></p>
            <p class="light_para mt-2">Legal representative: Iheb Souilem, in his capacity as Chairman of Global bid</p>
            <p class="light_para mt-2">Responsible for publication: Iheb Souilem</p>
        </div>
    </section>
    <!-- Content -->
</main>

<!-- Footer -->
<?php require_once "./footer2.php" ?>