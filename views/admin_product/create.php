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


            <h4>Add new product</h4>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Name</p>
                        <input class="form-control" type="text" name="name" placeholder="" value="">

                        <br/>

                        <p>Code</p>
                        <input class="form-control" type="text" name="id" placeholder="" value="">

                        <br/>

                        <p>Price, $</p>
                        <input class="form-control" type="text" name="price" placeholder="" value="">

                        <br/>

                        <p>Category</p>
                        <select class="form-control" name="category_id">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <br/>

                        <p>Image</p>
                        <input class="form-control" type="file" name="image" placeholder="" value="">

                        <br/>

                        <p>Description</p>
                        <textarea class="form-control" name="description"></textarea>

                        <br/>

                        <p>In stock</p>
                        <select class="form-control" name="availability">
                            <option value="1" selected="selected">Yes</option>
                            <option value="0">No</option>
                        </select>

                        <br/>

                        <p>New</p>
                        <select class="form-control" name="is_new">
                            <option value="1" selected="selected">Yes</option>
                            <option value="0">No</option>
                        </select>

                        <br/>

                        <p>Is recommended</p>
                        <select class="form-control" name="is_recommended">
                            <option value="1" selected="selected">Yes</option>
                            <option value="0">No</option>
                        </select>

                        <br/>

                        <p>Status</p>
                        <select class="form-control" name="status">
                            <option value="1" selected="selected">Visible</option>
                            <option value="0">Hidden</option>
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

