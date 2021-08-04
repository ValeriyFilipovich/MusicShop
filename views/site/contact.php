<?php include ROOT . '/views/layouts/header.php'; ?>


<div class="content">

    <div class="container">
        <div class="row align-items-stretch justify-content-center no-gutters">
            <div class="col-md-7">
                <div class="form h-100 contact-wrap p-5">

                    <?php if ($result): ?>
                        <div id="form-message-success">
                            <h3 class="text-center">Your message was sent, thank you!</h3>
                        </div>
                    <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li class="text-danger"> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <h3 class="text-center">Contact us</h3>
                    <form class="mb-5" method="post" id="contactForm" name="contactForm" action="#">
                        <div class="row">
                            <div class="col-md-6 form-group mb-3 form-contact-name">
                                <label for="" class="col-form-label">Name *</label>
                                <input class="form-control" name="userName"
                                       placeholder="Your name" value="<?php echo $userName; ?>">
                            </div>
                            <div class="col-md-6 form-group mb-3 form-contact-email">
                                <label for="" class="col-form-label ">Email *</label>
                                <input type="email" class="form-control" name="userEmail"
                                       placeholder="Your email" value="<?php echo $userEmail; ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group mb-3">
                                <label for="budget" class="col-form-label">Subject</label>
                                <input type="text" class="form-control" name="userSubject"
                                       placeholder="Your subject" value="<?php echo $userSubject; ?>">
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-12 form-group mb-3">
                                <label for="message" class="col-form-label">Message *</label>
                                <textarea class="form-control" name="userText" cols="30" rows="4"
                                          placeholder="Write your message" maxlength="1000" style="resize:none;"><?php echo $userText; ?></textarea>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-5 form-group text-center">
                                <input type="submit" name="submit" value="Send Message"
                                       class="btn btn-success">
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
