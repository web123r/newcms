<?php
include("./header.php");
include("./database.php");
include("./functions.php");
logout();
addinp($conn);




?>

<div class="container mt-5">
    <div class="row justify-content center">
        <div class="col-md-6">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">




                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="name" class="form-control" name="u_name" required
                         pattern=".*\S.*"
                        title="Field cannot be empty or just spaces." />
                    <label class="form-label" for="name">Whats your name 😊</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="number" id="form1Example1" class="form-control" name="u_age"
                         required pattern=".*\S.*"
                        title="Field cannot be empty or just spaces." />
                    <label class="form-label" for="form1Example1">How old are you</label>
                </div>


                <div data-mdb-input-init class="form-outline mb-4">
                    <textarea id="form1Example2" name="u_what">
   
</textarea>

                    <label class="form-label" for="form1Example2">What do you do?</label>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="experience" class="form-control" 
                        name="u_experience" required pattern=".*\S.*"
                        title="Field cannot be empty or just spaces." />
                    <label class="form-label" for="experience">Experience</label>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="country" class="form-control" name="u_country" required
                       pattern=".*\S.*"
                        title="Field cannot be empty or just spaces." />
                    <label class="form-label" for="country">Country</label>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">

                    <input type="text" id="location" class="form-control" name="u_location"
                         required pattern=".*\S.*"
                        title="Field cannot be empty or just spaces." />
                    <label class="form-label" for="location">Location</label>

                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="number" class="form-control" name="u_number"
                        required pattern=".*\S.*"
                        title="Field cannot be empty or just spaces." />
                    <label class="form-label" for="number">Phone Number</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">

                    <input type="email" id="pmail" class="form-control" name="u_email"
                       required pattern=".*\S.*"
                        title="Field cannot be empty or just spaces." />
                    <label class="form-label" for="pmail">Email</label>

                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="facebook" class="form-control" name="u_facebook" />
                    <label class="form-label" for="facebook">Facebook URL</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="twitter" class="form-control" name="u_twitter" />
                    <label class="form-label" for="twitter">Twitter URL</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="instagram" class="form-control" name="u_instagram" />
                    <label class="form-label" for="instagram">Instagram URL</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="linkedin" class="form-control" name="u_linkedin" />
                    <label class="form-label" for="linkedin">LinkedIn URL</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="number" id="proj_work" class="form-control" name="u_proj_work" />
                    <label class="form-label" for="proj_work">Projects Working On</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="number" id="proj_done" class="form-control" name="u_proj_done" />
                    <label class="form-label" for="proj_done">Projects Done</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="number" id="awards" class="form-control" name="u_awards" />
                    <label class="form-label" for="awards">Awards Received</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="number" id="clients" class="form-control" name="u_clients" />
                    <label class="form-label" for="clients">Happy Clients</label>
                </div>

                <!-- 2 column grid layout for inline styling -->


                <!-- Submit button -->
                <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Add</button>
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