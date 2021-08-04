<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">/Admin Panel</a></li>
                    <li class="active">/Product managment</li>
                </ol>
            </div>

            <a href="/admin/product/create" class="btn app-btn-secondary"><i class="fa fa-plus"></i> Add product</a>

            <h4>Product list</h4>

            <br/>
            <div class="table-responsive">
            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID product</th>
                    <th>Product name</th>
                    <th>Price</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($productsList as $product): ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo $product['price']; ?></td>
                        <td><a href="/admin/product/update/<?php echo $product['id']; ?>" title="Edit"><i class="fas fa-edit"></i></a></td>
                        <td><a href="/admin/product/delete/<?php echo $product['id']; ?>" title="Delete"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            </div>
        </div>
        <a href="/admin/" class="btn app-btn-secondary"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

