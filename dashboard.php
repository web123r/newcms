<?php
include("./database.php");
include("./functions.php");
include("./header.php");

logout();

if(!isset($_SESSION["ID"])){
    header("Location: index.php");
    exit();
}

$displaydata = display($conn, $_SESSION["ID"]);
if ($displaydata && isset($displaydata[0])) {
    [$displayname, $displayage, $displayjob, $displayexperience, $displaycountry, $displaylocation, $displaynumber, $displayemail, $displayfacebook, $displaytwitter, $displayinstagram, $displaylinkedin, $displayproj_work, $displayproj_done, $displayawards, $displayclients] = $displaydata;
} else {
    $displayname = null;
}
?>

<div class="container mt-5 pt-5">
    <h2>Welcome to your Dashboard, <?php echo htmlspecialchars($_SESSION['Name'] ?? 'User'); ?>!</h2>
    <hr>
    <?php if(empty($displayname)): ?>
        <div class="alert alert-warning">
            You haven't set up your portfolio profile yet.
        </div>
        <a href="adddata.php" class="btn btn-primary">Add Profile Data</a>
    <?php else: ?>
        <div class="alert alert-success">
            Your portfolio profile is set up!
        </div>
        <a href="edit.php" class="btn btn-primary">Edit Profile Data</a>
        <a href="site.php?id=<?php echo $_SESSION['ID']; ?>" target="_blank" class="btn btn-success">View My Public Site</a>
    <?php endif; ?>
    
    <form method="post" class="mt-4">
        <button type="submit" name="logout" class="btn btn-danger">Log Out</button>
    </form>
</div>

<?php 
include("./footer.php");
?>
