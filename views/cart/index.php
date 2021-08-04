<?php include ROOT . '/views/layouts/header.php'; ?>


<div class="container pb-5 mt-n2 mt-md-n3">
    <div class="row">
        <div class="col-xl-9 col-md-8">
            <h2 class="h6 d-flex flex-wrap justify-content-between align-items-center px-4 py-3">
                <span>Products</span>
                <a class="font-size-sm cart-continue" href="/catalog/">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-chevron-left" style="width: 1rem; height: 1rem;">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                    Continue shopping</a>
            </h2>

            <?php if ($productsInCart): ?>
            <!-- Item-->
            <?php foreach ($products as $product): ?>
                <div class="d-sm-flex justify-content-between my-4 pb-4 border-bottom">
                    <div class="media d-block d-sm-flex text-left">
                        <a class="cart-item-thumb mx-auto me-4" href="/product/<?php echo $product['id']; ?>"><img
                                    src="<?php echo Product::getImage($product['id']); ?>" alt="Product"></a>
                        <div class="media-body pt-3">
                            <h3 class="product-card-title font-weight-semibold border-0 pb-0">
                                <a href="/product/<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a>
                            </h3>
                            <div class="font-size-sm">
                                <span class="text-muted mr-2">Code:</span>
                                <?php echo $product['code']; ?>
                            </div>
                            <div class="font-size-lg text-primary pt-2">$<?php echo $product['price']; ?></div>
                        </div>
                    </div>
                    <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-sm-start" style="max-width: 10rem;">
                        <div class="form-group mb-2">
                            <label for="quantity1">Quantity</label>
                            <input class="form-control form-control-sm" type="number" id="quantity1"
                                   value="<?php echo $productsInCart[$product['id']]; ?>" readonly>
                        </div>
                        <a class="btn btn-cart btn-outline-danger btn-sm btn-block mb-2"
                           href="/cart/delete/<?php echo $product['id']; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-trash-2 mr-1">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                <line x1="14" y1="11" x2="14" y2="17"></line>
                            </svg>Remove</a>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php else: ?>
            <div class="empty-cart">
                <p>Cart is empty</p>
            </div>
            <?php endif; ?>
        </div>

        <!-- Item-->

        <?php if ($productsInCart): ?>
        <!-- Sidebar-->
        <div class="col-xl-3 col-md-4 cart-md-4 pt-3 pt-md-0 px-2">
            <h2 class="h5 px-4 py-3 text-center">Subtotal</h2>
            <div class="h2 font-weight-semibold text-center py-3">$<?php echo $totalPrice; ?></div>
            <hr>
            <div class="text-center">
                <a class="btn btn-cart btn-primary btn-block " href="/cart/checkout">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-credit-card mr-2">
                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                        <line x1="1" y1="10" x2="23" y2="10"></line>
                    </svg>
                    Checkout</a>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>
