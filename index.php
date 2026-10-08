<?php
include("./functions.php");
include("./header.php");
include("./database.php");



if(isset($_SESSION["ID"])){
    header("Location: dashboard.php");
};




login($conn);

logout();
?>

<div class="container mt-5">
    <div class="row justify-content center">
        <div class="col-md-6">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">



                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="form1Example1" class="form-control" name="login_name" />
                    <label class="form-label" for="form1Example1">Username</label>
                </div>

                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" id="form1Example" class="form-control" name="login_password" />
                    <label class="form-label" for="form1Example">Password</label>
                </div>

                <!-- 2 column grid layout for inline styling -->
               

                <!-- Submit button -->
                <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Log in</button>
                <a class="data-mdb-ripple-init" href="add.php">Sign Up</a>
            </form>
        </div>
    </div>
</div>



<?php
include ('./footer.php');

?>