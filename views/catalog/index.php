<?php include ROOT . '/views/layouts/header.php'; ?>

<!-- Start Content -->
<div class="container py-5">
  <div class="row">

      <?php include ROOT . '/views/layouts/categories.php'; ?>

    <div class="col-lg-9">
      <div class="row">
        <div class="col-md-6 pb-4">
          <div class="d-flex">
              <h3>Random products</h3>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <?php foreach ($latestProducts as $product): ?>
          <div class="col-md-4">
            <div class="ibox">
              <div class="ibox-content product-box">
                <div class="product-imitation">
                  <a href="/product/<?php echo $product['id'];?>"><img src="<?php echo Product::getImage($product['id']); ?>" alt=""></a>
                </div>
                <div class="product-desc">
                  <span class="product-price">
                    $<?php echo $product['price'];?>
                  </span>
                    <small class="category-product"><a class="text-muted" href="/category/<?php echo $product['category_name'];?>/"><?php echo $product['category_name'];?></a></small>
                  <a href="/product/<?php echo $product['id'];?>" class="product-name text-uppercase"><?php echo $product['name'];?></a>

                    <!--   <div class="small m-t-xs">
                        Many desktop publishing packages and web page editors now.
                      </div> -->
                  <div class="m-t text-center mt-5">
                    <a href="/cart/add/<?php echo $product['id']; ?>" class="btn btn-xs btn-outline btn-primary add-to-cart" data-id="<?php echo $product['id']; ?>">Add to cart <i class="fa fa-long-arrow-right"></i> </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach;?>
        </div>
      </div>

    </div>

  </div>

</div>
</div>
<!-- End Content -->

<?php include ROOT . '/views/layouts/footer.php'; ?>
