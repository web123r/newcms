<?php
include("./header.php");
include("./database.php");
include("./functions.php");
logout();
editData($conn,$_SESSION['ID']);



[$displayname, $displayage, $displayjob, $displayexperience, $displaycountry, $displaylocation, $displaynumber, $displayemail, $displayfacebook, $displaytwitter, $displayinstagram, $displaylinkedin, $displayproj_work, $displayproj_done, $displayawards, $displayclients] = display($conn, $_SESSION['ID']);
?>

<div class="container mt-5">
    <div class="row justify-content center">
        <div class="col-md-6">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">




                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="name" class="form-control" name="edit_name" required
                        value="<?php echo $displayname; ?>" pattern=".*\S.*"
                        title="Field cannot be empty or just spaces." />
                    <label class="form-label" for="name">Whats your name 😊</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="number" id="form1Example1" class="form-control" name="edit_age"
                        value="<?php echo $displayage; ?>" required pattern=".*\S.*"
                        title="Field cannot be empty or just spaces." />
                    <label class="form-label" for="form1Example1">How old are you</label>
                </div>


                <div data-mdb-input-init class="form-outline mb-4">
                    <textarea id="form1Example2" name="edit_what">
    <?php echo $displayjob; ?>
</textarea>

                    <label class="form-label" for="form1Example2">What do you do?</label>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="experience" class="form-control" value="<?php echo $displayexperience; ?>"
                        name="edit_experience" required pattern=".*\S.*"
                        title="Field cannot be empty or just spaces." />
                    <label class="form-label" for="experience">Experience</label>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="country" class="form-control" name="edit_country" required
                        value="<?php echo $displaycountry; ?>" pattern=".*\S.*"
                        title="Field cannot be empty or just spaces." />
                    <label class="form-label" for="country">Country</label>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">

                    <input type="text" id="location" class="form-control" name="edit_location"
                        value="<?php echo $displaylocation; ?>" required pattern=".*\S.*"
                        title="Field cannot be empty or just spaces." />
                    <label class="form-label" for="location">Location</label>

                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="number" class="form-control" name="edit_number"
                        value="<?php echo $displaynumber; ?>" required pattern=".*\S.*"
                        title="Field cannot be empty or just spaces." />
                    <label class="form-label" for="number">Phone Number</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">

                    <input type="email" id="pmail" class="form-control" name="edit_email"
                        value="<?php echo $displayemail; ?>" required pattern=".*\S.*"
                        title="Field cannot be empty or just spaces." />
                    <label class="form-label" for="pmail">Email</label>

                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="facebook" class="form-control" name="edit_facebook" value="<?php echo htmlspecialchars($displayfacebook ?? ''); ?>" />
                    <label class="form-label" for="facebook">Facebook URL</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="twitter" class="form-control" name="edit_twitter" value="<?php echo htmlspecialchars($displaytwitter ?? ''); ?>" />
                    <label class="form-label" for="twitter">Twitter URL</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="instagram" class="form-control" name="edit_instagram" value="<?php echo htmlspecialchars($displayinstagram ?? ''); ?>" />
                    <label class="form-label" for="instagram">Instagram URL</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="linkedin" class="form-control" name="edit_linkedin" value="<?php echo htmlspecialchars($displaylinkedin ?? ''); ?>" />
                    <label class="form-label" for="linkedin">LinkedIn URL</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="number" id="proj_work" class="form-control" name="edit_proj_work" value="<?php echo htmlspecialchars($displayproj_work ?? 0); ?>" />
                    <label class="form-label" for="proj_work">Projects Working On</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="number" id="proj_done" class="form-control" name="edit_proj_done" value="<?php echo htmlspecialchars($displayproj_done ?? 0); ?>" />
                    <label class="form-label" for="proj_done">Projects Done</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="number" id="awards" class="form-control" name="edit_awards" value="<?php echo htmlspecialchars($displayawards ?? 0); ?>" />
                    <label class="form-label" for="awards">Awards Received</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="number" id="clients" class="form-control" name="edit_clients" value="<?php echo htmlspecialchars($displayclients ?? 0); ?>" />
                    <label class="form-label" for="clients">Happy Clients</label>
                </div>

                <!-- 2 column grid layout for inline styling -->


                <!-- Submit button -->
                <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Update</button>
            </form>
        </div>
    </div>
</div>
<script src="js/tinymce/tinymce.min.js"></script>

<script>
    tinymce.init({
        selector: '#form1Example2',
        license_key: 'gpl'
    });
</script>


<?php
include('./footer.php');

?>