<?php include ROOT . '/views/layouts/header.php'; ?>

    <div class="content">

        <div class="container">
            <div class="row align-items-stretch justify-content-center no-gutters">
                <div class="col-md-7">
                    <div class="form h-100 contact-wrap p-5">
                        <h2 class="text-center">User account</h2>
                        <div class="row justify-content-center">
                            <div class="col-md-5 form-group text-center">
                                <ul>
                                    <li style="list-style-type: none;"> <a class="btn btn-success my-3" href="/cabinet/edit">Edit data</a></li>
                                    <?php if(User::isAdmin()): ?>
                                    <li style="list-style-type: none;"> <a class="btn btn-success my-3" href="/admin">Admin Panel</a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


<?php include ROOT . '/views/layouts/footer.php'; ?>