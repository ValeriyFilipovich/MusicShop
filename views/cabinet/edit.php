<?php include ROOT . '/views/layouts/header.php'; ?>


    <div class="content">

        <div class="container">
            <div class="row align-items-stretch justify-content-center no-gutters">
                <div class="col-md-7">
                    <div class="form h-100 contact-wrap p-5">

                        <?php if ($result): ?>
                            <div id="form-message-success">
                                <h2 class="text-center">Success</h2>
                            </div>
                        <?php else: ?>
                            <?php if (isset($errors) && is_array($errors)): ?>
                                <ul>
                                    <?php foreach ($errors as $error): ?>
                                        <li class="text-danger"> - <?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>

                            <h3 class="text-center">Editing user data</h3>
                            <form class="mb-5" method="post" id="contactForm" name="contactForm" action="#">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="" class="col-form-label">Name</label>
                                        <input class="form-control" name="name"
                                               placeholder="Your name" value="<?php echo $name; ?>">
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="" class="col-form-label ">Email</label>
                                        <input type="password" class="form-control" name="password"
                                               placeholder="Password" value="<?php echo $password; ?>">
                                    </div>
                                </div>

                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-6 form-group mb-3">
                                        <input type="submit" name="submit" value="Save"
                                               class="btn btn-success" style="width: 100%" >
                                        <span class="submitting"></span>
                                    </div>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>