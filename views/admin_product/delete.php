<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">/Admin Panel</a></li>
                    <li><a href="/admin/product">/Product Managment</a></li>
                    <li class="active">/Delete product</li>
                </ol>
            </div>


            <h4>Delete product #<?php echo $id; ?></h4>


            <p>Are you sure you want to delete this product?</p>

            <form method="post">
                <input type="submit" class="btn app-btn-secondary" name="submit" value="Delete" />
                <a href="/admin/product/" class="btn app-btn-secondary"><i class="fa fa-arrow-left"></i> Back</a>
            </form>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

