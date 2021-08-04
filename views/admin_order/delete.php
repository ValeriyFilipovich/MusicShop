<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">/Admin Panel</a></li>
                    <li><a href="/admin/order">/Order List</a></li>
                    <li class="active">/Delete order</li>
                </ol>
            </div>


            <h4>Delete order #<?php echo $id; ?></h4>


            <p>Are you sure you want to delete this order?</p>

            <form method="post">
                <input type="submit" class="btn app-btn-secondary" name="submit" value="Delete" />
                <a href="/admin/order" class="btn app-btn-secondary"><i class="fa fa-arrow-left"></i> Back</a>
            </form>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

