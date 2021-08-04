<?php include ROOT . '/views/layouts/header.php'; ?>


<!-- Open Content -->
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-3">

                <div class="card mb-3">
                    <div class="product-view">
                        <a href="/product/<?php echo $product['id']; ?>"><img
                                    src="<?php echo Product::getImage($product['id']); ?>" alt=""></a>
                    </div>
                </div>

            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2"><?php echo $product['name']; ?></h1>
                        <p class="h3 py-2">$<?php echo $product['price']; ?></p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h5>Code:</h5>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong><?php echo $product['id']; ?></strong></p>
                            </li>
                        </ul>

                        <h5>Specification:</h5>
                        <ul class="list-unstyled pb-3">
                            <?php Product::getProductProductProperties($product['category_id'], $product['id']); ?>
                        </ul>

                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h5>In stock :</h5>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong>
                                        <?php if ($product['availability'] == 1) echo '<p class="text-success">Yes';
                                        else echo '<p class="text-danger">No' ?>
                                    </strong></p>
                            </li>
                        </ul>


                        <form action="" method="GET">
                            <input type="hidden" name="product-title" value="Activewear">
                            <div class="row pb-3">
                                <div class="col d-grid">
                                    <a href="/cart/add/<?php echo $product['id']; ?>"
                                       class="btn btn-success <?php if ($product['availability'] == 0) echo 'disabled'; ?>
                                               btn-lg add-to-cart" data-id="<?php echo $product['id']; ?>">
                                        <i class="fa fa-shopping-cart"></i> Add To Cart
                                    </a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Close Content -->

<!-- Start Article -->
<section class="py-5">
    <div class="container">
        <div class="row text-left p-2 pb-3">
            <h4>Recommended products</h4>
        </div>

        <!--Start Carousel Wrapper-->
        <div id="carousel-related-product">

            <?php foreach ($sliderProducts as $sliderItem): ?>
                <div class="col-md-4">
                    <div class="ibox">
                        <div class="ibox-content product-box">
                            <div class="product-imitation">
                                <a href="/product/<?php echo $sliderItem['id']; ?>"><img
                                            src="<?php echo Product::getImage($sliderItem['id']); ?>" alt=""></a>
                            </div>
                            <div class="product-desc">
                                  <span class="product-price">
                                    $<?php echo $sliderItem['price']; ?>
                                  </span>
                                <small class="text-muted">Category</small>
                                <a href="/product/<?php echo $sliderItem['id']; ?>"
                                   class="product-name text-uppercase"><?php echo $sliderItem['name']; ?></a>

                                <!--   <div class="small m-t-xs">
                                    Many desktop publishing packages and web page editors now.
                                  </div> -->
                                <div class="m-t text-center mt-5">
                                    <a href="/cart/add/<?php echo $sliderItem['id']; ?>"
                                       class="btn btn-xs btn-outline btn-primary add-to-cart"
                                       data-id="<?php echo $sliderItem['id']; ?>">Add to cart <i
                                                class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>


    </div>
</section>
<!-- End Article -->

<?php include ROOT . '/views/layouts/footer.php'; ?>
<!-- Start Slider Script -->
<script src="/assets/js/slick.min.js"></script>
<script>
    $('#carousel-related-product').slick({
        infinite: true,
        arrows: false,
        slidesToShow: 4,
        slidesToScroll: 3,
        dots: true,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 3
                }
            }
        ]
    });
</script>
<!-- End Slider Script -->
