<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>
                        
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">/Admin Panel</a></li>
                    <li class="active" >/Order List</li>
                </ol>
            </div>

            <h4>Order list</h4>

            <br/>

            <div class="table-responsive">
            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID</th>
                    <th>Сustomer name</th>
                    <th>Сustomer phone</th>
                    <th>Order date </th>
                    <th>Status</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($ordersList as $order): ?>
                    <tr>
                        <td>
                            <a href="/admin/order/view/<?php echo $order['id']; ?>">
                                <?php echo $order['id']; ?>
                            </a>
                        </td>
                        <td><?php echo $order['user_name']; ?></td>
                        <td><?php echo $order['user_phone']; ?></td>
                        <td><?php echo $order['date']; ?></td>
                        <td><?php echo Order::getStatusText($order['status']); ?></td>    
                        <td><a href="/admin/order/view/<?php echo $order['id']; ?>" title="Смотреть"><i class="fa fa-eye"></i></a></td>
                        <td><a href="/admin/order/update/<?php echo $order['id']; ?>" title="Редактировать"><i class="fas fa-edit"></i></a></td>
                        <td><a href="/admin/order/delete/<?php echo $order['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            </div>
        </div>
        <a href="/admin/" class="btn app-btn-secondary"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

