<?php
include("./functions.php");
include("./header.php");
include("./database.php");






addData($conn);

?>

<div class="container mt-5">
    <div class="row justify-content center">
        <div class="col-md-6">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">



                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="form1Example1" class="form-control" name="add_name" />
                    <label class="form-label" for="form1Example1"> Create A Username</label>
                </div>

                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" id="form1Example2" class="form-control" name="add_password" />
                    <label class="form-label" for="form1Example2">Create A Password</label>
                </div>

                <!-- 2 column grid layout for inline styling -->
               

                <!-- Submit button -->
                <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Add User</button>
            </form>
        </div>
    </div>
</div>



<?php


?>