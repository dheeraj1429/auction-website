<?php
require_once "./session.php";
require_once "./model/blog.php";

$pageName = "Blogs";
$blog = new Blog();
$blogs = $blog->getLatestBlog();
?>

<?php require_once "header.php" ?>
<section class="Banner_Section_div">
    <h1 class="text-white"><?php echo $pageName; ?></h1>
</section>
<div class="container-fluid padding_side" style="margin: 30px 0px">
    <div class="row py-3">
        <?php foreach ($blogs as $b) : ?>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
            <!-- Posts -->
            <div class="post_div">
                <!-- Post Previwe -->
                <div class="post_img_div">
                    <img src="./media/img/blog/<?php echo $b["img"] ?>" alt="">
                    <div class="post_date_div">
                        <h3 class="text-white"><?php echo date_format(date_create($b["post_date"]), "d M") ?>
                        </h3>
                    </div>
                </div>
                <!-- Post Previwe -->
                <!-- Post Details -->
                <div class="my-3 d-flex align-items-center">
                    <img src="./assests/icons&images/Group 4.svg" alt="">
                </div>

                <h1><?php echo $b["name"] ?></h1>

                <p class="post_discription light_para">
                    <?php echo htmlspecialchars_decode($b["short_desc"]) ?>
                </p>

                <a href="./blog.php?id=<?php echo $b["id"] ?>" target="_blank" class=" Read_more_button
                            my-3">Read More <img src="./assests/icons&images/Vector (2).svg" alt=""></a>
                <!-- Post Details -->
            </div>
            <!-- Posts -->
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require_once "footer2.php" ?>
<?php require_once "footer2.php" ?>