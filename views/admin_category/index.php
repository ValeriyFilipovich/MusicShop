<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">/Admin Panel</a></li>
                    <li class="active">/Category managment</li>
                </ol>
            </div>

            <a href="/admin/category/create" class="btn app-btn-secondary"><i class="fa fa-plus"></i> Add category</a>

            <h4>Category list</h4>

            <br/>
            <div class="table-responsive">
            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID category</th>
                    <th>Category name</th>
                    <th>Category number</th>
                    <th>Status</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($categoriesList as $category): ?>
                    <tr>
                        <td><?php echo $category['id']; ?></td>
                        <td><?php echo $category['name']; ?></td>
                        <td><?php echo $category['sort_order']; ?></td>
                        <td><?php echo Category::getStatusText($category['status']); ?></td>
                        <td><a href="/admin/category/update/<?php echo $category['id']; ?>" title="Редактировать"><i class="fas fa-edit"></i></a></td>
                        <td><a href="/admin/category/delete/<?php echo $category['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            </div>

        </div>
        <a href="/admin/" class="btn app-btn-secondary"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

