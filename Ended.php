<?php
require_once "./session.php";
require_once "./model/auction.php";
require_once "./model/auctionCategory.php";
require_once "./functions.php";
require_once "./model/bids.php";


function getCategory($categoryId)
{
    $auctionCategory = new AuctionCategory();
    $data = $auctionCategory->read($id = $categoryId)[0];
    return $data;
}

$auction = new Auction();
$pageName = "Ended";
$completedAuctions = $auction->getCompleteAuction();
?>

<?php require_once "./header.php" ?>
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
                        <h1>CATALOG OF COMPLETED&nbsp;<span class="span_color_2">AUCTIONS</span></h1>
                        <div class="line_div my-4"></div>
                    </div>
                </div>
            </div>
            <!-- Catelog section heading -->

            <!-- Catalog section products -->
            <div class="row mt-5 justify-content-center">
                <?php foreach ($completedAuctions as $completedAuction) : ?>
                    <div class="col-12 col-sm-9 col-md-6 col-xl-5 col-xxl-4 mb-5 d-flex justify-content-center align-items-center">
                        <!-- Products Cards -->
                        <div class="Auctions_products_cards text-center p-3">
                            <!-- Products Images -->
                            <img src="./media/img/product/<?php echo $completedAuction["product_img"] ?>" alt="<?php echo $completedAuction["product_name"] ?>" class="img-fluid my-4" />
                            <!-- Products Images -->

                            <!-- content -->
                            <div class="Auction_Products_Cards_content">
                                <h3><?php echo $completedAuction["product_name"] ?></h3>
                                <h5><?php echo getCategory($completedAuction["category"])["name"] ?></h5>
                                <h3 style="color: lightseagreen">
                                    Won By <?php echo getAuctionWinner($completedAuction["id"])["username"] ?>
                                </h3>
                                <!-- Instead price -->
                                <div class="Instead_Price_div d-flex align-items-center justify-content-center my-3">
                                    <h3 class="me-2">instead of
                                        <strike>$<?php echo $completedAuction["store_price"] ?></strike>
                                    </h3>
                                    <h4>$<?php echo $completedAuction["starting_price"] ?></h4>
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
                <?php endforeach; ?>
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

</main>
<!-- Main -->

<!-- Footer -->
<!-- Footer -->
<?php require_once "./footer2.php" ?>