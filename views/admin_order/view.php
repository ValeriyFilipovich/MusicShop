<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">/Admin Panel</a></li>
                    <li><a href="/admin/order">/Order List</a></li>
                    <li class="active">/View order</li>
                </ol>
            </div>


            <h4>View order #<?php echo $order['id']; ?></h4>
            <br/>




            <h5>Info</h5>
            <div class="table-responsive">
            <table class="table-admin-small table-bordered table-striped table">
                <tr>
                    <td>Order number</td>
                    <td><?php echo $order['id']; ?></td>
                </tr>
                <tr>
                    <td>Customer name</td>
                    <td><?php echo $order['user_name']; ?></td>
                </tr>
                <tr>
                    <td>Customer phone</td>
                    <td><?php echo $order['user_phone']; ?></td>
                </tr>
                <tr>
                    <td>Comment</td>
                    <td><?php echo $order['user_comment']; ?></td>
                </tr>
                <?php if ($order['user_id'] != 0): ?>
                    <tr>
                        <td>ID</td>
                        <td><?php echo $order['user_id']; ?></td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td><b>Status</b></td>
                    <td><?php echo Order::getStatusText($order['status']); ?></td>
                </tr>
                <tr>
                    <td><b>Date order</b></td>
                    <td><?php echo $order['date']; ?></td>
                </tr>
            </table>
            </div>

            <h5>Products in order</h5>

            <div class="table-responsive">
            <table class="table-admin-medium table-bordered table-striped table ">
                <tr>
                    <th>Product ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td>$<?php echo $product['price']; ?></td>
                        <td><?php echo $productsQuantity[$product['id']]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            </div>
        </div>


        <a href="/admin/order/" class="btn app-btn-secondary"><i class="fa fa-arrow-left"></i> Back</a>

</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

