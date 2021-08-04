<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">/Admin Panel</a></li>
                    <li><a href="/admin/product">/Product managment</a></li>
                    <li class="active">/Edit product</li>
                </ol>
            </div>


            <h4>Edit product #<?php echo $id; ?></h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Product name</p>
                        <input class="form-control" type="text" name="name" placeholder="" value="<?php echo $product['name']; ?>">

                        <br/>

                        <p>Price, $</p>
                        <input class="form-control" type="text" name="price" placeholder="" value="<?php echo $product['price']; ?>">

                        <br/>

                        <p>Category</p>
                        <select class="form-control" name="category_id">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['id']; ?>" 
                                        <?php if ($product['category_id'] == $category['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <p>Image</p>
                        <img src="<?php echo Product::getImage($product['id']); ?>" width="200" alt="" />
                        <input class="form-control" type="file" name="image" placeholder="" value="<?php echo $product['image']; ?>">

                        <p>Decriptioin</p>
                        <textarea class="form-control" name="description"><?php echo $product['description']; ?></textarea>
                        
                        <br/>

                        <p>In stock</p>
                        <select class="form-control" name="availability">
                            <option value="1" <?php if ($product['availability'] == 1) echo ' selected="selected"'; ?>>Yes</option>
                            <option value="0" <?php if ($product['availability'] == 0) echo ' selected="selected"'; ?>>No</option>
                        </select>
                        
                        <br/>
                        
                        <p>New</p>
                        <select class="form-control" name="is_new">
                            <option value="1" <?php if ($product['is_new'] == 1) echo ' selected="selected"'; ?>>Yes</option>
                            <option value="0" <?php if ($product['is_new'] == 0) echo ' selected="selected"'; ?>>No</option>
                        </select>
                        
                        <br/>

                        <p>Is recommended</p>
                        <select class="form-control" name="is_recommended">
                            <option value="1" <?php if ($product['is_recommended'] == 1) echo ' selected="selected"'; ?>>Yes</option>
                            <option value="0" <?php if ($product['is_recommended'] == 0) echo ' selected="selected"'; ?>>No</option>
                        </select>
                        
                        <br/>

                        <p>Status</p>
                        <select class="form-control" name="status">
                            <option value="1" <?php if ($product['status'] == 1) echo ' selected="selected"'; ?>>Visible</option>
                            <option value="0" <?php if ($product['status'] == 0) echo ' selected="selected"'; ?>>Hidden</option>
                        </select>
                        
                        <br/>
                        
                        <input type="submit" name="submit" class="btn app-btn-secondary" value="Save">
                        <a href="/admin/product/" class="btn app-btn-secondary"><i class="fa fa-arrow-left"></i> Back</a>
                        
                        <br/>
                        
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

