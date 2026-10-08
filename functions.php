<?php
function updateData($conn)
{
    if (isset($_POST["user_name"])) {
        $username = cleanInput($_POST["user_name"]);
        $userage = cleanInput($_POST["user_age"]);
        $userwhat = cleanInput($_POST["user_what"]);
        $userexperience = cleanInput($_POST["user_experience"]);
        $usercountry = cleanInput($_POST["user_country"]);
        $userlocation = cleanInput($_POST["user_location"]);
        $usernumber = cleanInput($_POST["user_number"]);
        $useremail = cleanInput($_POST["user_email"]);
        //echo "".$username."".$userage."".$userwhat."".$userexperience."".$usercountry."".$userlocation."".$usernumber."".$useremail."";
        //die();
        $query = "INSERT INTO `info` (`NAME`, `AGE`, `JOB`, `EXPERIENCE`, `COUNTRY`, `LOCATION`, `NUMBER`, `EMAIL`) VALUES (?,?,?,?,?,?,?,?)";
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("sissssss", $username, $userage, $userwhat, $userexperience, $usercountry, $userlocation, $usernumber, $useremail);
            $stmt->execute();
            //unset($username,$userage,$userwhat,$userexperience,$usercountry,$userlocation,$useremail,$useremail);
            


        } else {
            die("Failed to Update Data" . $conn->error);
        }
        ;




    }
    ;

}
;
function set_message($message)
{
    $_SESSION["Message"] = $message;
}
;

function get_message()
{
        if (isSet($_SESSION["Message"])){
        
        
        
        echo "<script type = 'text/javascript'>showToast('" .$_SESSION['Message']." ', 'middle right', 'warning');</script>";
        unset($_SESSION["Message"]);
};
        
    

}
;

function addData($conn)
{
    
    if (isset($_POST["add_name"])) {
        $addname = cleanInput($_POST["add_name"]);
        $addpasssword = cleanInput($_POST["add_password"]);
        
        $query = "INSERT INTO `users`(`Username`,`Password`,`Date`) VALUES(?,?,current_timestamp())";
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("si", $addname, $addpasssword);
            $stmt->execute();
            set_message("Added User" .$addname);
            unset($addname, $addpasssword);
            
            $stmt->close();
            

            header("Location: index.php");
            

        } else {
            die("Failed to Add User" . $conn->error);
        }
        ;




    }
    ;

}
;
function editData($conn, $id)
{
    
    if (isset($_POST["edit_name"])) {
        $editname = cleanInput($_POST["edit_name"]);
        $editage = cleanInput($_POST["edit_age"]);
        $editwhat = cleanInput($_POST["edit_what"]);
        $editexperience = cleanInput($_POST["edit_experience"]);
        $editcountry = cleanInput($_POST["edit_country"]);
        $editlocation = cleanInput($_POST["edit_location"]);
        $editnumber = cleanInput($_POST["edit_number"]);
        $editemail = cleanInput($_POST["edit_email"]);
        
        $editfacebook = cleanInput($_POST["edit_facebook"] ?? '');
        $edittwitter = cleanInput($_POST["edit_twitter"] ?? '');
        $editinstagram = cleanInput($_POST["edit_instagram"] ?? '');
        $editlinkedin = cleanInput($_POST["edit_linkedin"] ?? '');
        
        $editproj_work = intval($_POST["edit_proj_work"] ?? 0);
        $editproj_done = intval($_POST["edit_proj_done"] ?? 0);
        $editawards = intval($_POST["edit_awards"] ?? 0);
        $editclients = intval($_POST["edit_clients"] ?? 0);

        //echo "".$editname."".$editage."".$editwhat."".$editexperience."".$editcountry."".$editlocation."".$editnumber."".$editemail."";
        //die();
        $query = "UPDATE `info` SET `NAME` = ?, `AGE` = ?, `JOB` = ?, `EXPERIENCE` = ?, `COUNTRY` = ?, `LOCATION` = ?, `NUMBER` = ?, `EMAIL` = ?, `FACEBOOK` = ?, `TWITTER` = ?, `INSTAGRAM` = ?, `LINKEDIN` = ?, `PROJ_WORK` = ?, `PROJ_DONE` = ?, `AWARDS` = ?, `CLIENTS` = ?  WHERE `info`.`ID` = ".$id;
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("sisssssssssssiii", $editname, $editage, $editwhat, $editexperience, $editcountry, $editlocation, $editnumber, $editemail, $editfacebook, $edittwitter, $editinstagram, $editlinkedin, $editproj_work, $editproj_done, $editawards, $editclients);
            $stmt->execute();
            //unset($editname,$editage,$editwhat,$editexperience,$editcountry,$editlocation,$editemail,$editemail);
            $stmt->close();
            set_message("Successfully Edited Data");

            header("Location: dashboard.php");
            

        } else {
            die("Failed to Update Data" . $conn->error);
        }
        ;




    }
    ;

}
;
function addinp($conn)
{
    
    if (isset($_POST["u_name"])) {
        $uname = cleanInput($_POST["u_name"]);
        $uage = cleanInput($_POST["u_age"]);
        $uwhat = cleanInput($_POST["u_what"]);
        $uexperience = cleanInput($_POST["u_experience"]);
        $ucountry = cleanInput($_POST["u_country"]);
        $ulocation = cleanInput($_POST["u_location"]);
        $unumber = cleanInput($_POST["u_number"]);
        $uemail = cleanInput($_POST["u_email"]);
        
        $ufacebook = cleanInput($_POST["u_facebook"] ?? '');
        $utwitter = cleanInput($_POST["u_twitter"] ?? '');
        $uinstagram = cleanInput($_POST["u_instagram"] ?? '');
        $ulinkedin = cleanInput($_POST["u_linkedin"] ?? '');
        
        $uproj_work = intval($_POST["u_proj_work"] ?? 0);
        $uproj_done = intval($_POST["u_proj_done"] ?? 0);
        $uawards = intval($_POST["u_awards"] ?? 0);
        $uclients = intval($_POST["u_clients"] ?? 0);

        $id = $_SESSION["ID"];
        //echo "".$uname."".$uage."".$uwhat."".$uexperience."".$ucountry."".$ulocation."".$unumber."".$uemail."";
        //die();
        $query = "INSERT INTO `info`(`ID`,`NAME`,`AGE`,`JOB`,`EXPERIENCE`,`COUNTRY`,`LOCATION`,`NUMBER`,`EMAIL`,`FACEBOOK`,`TWITTER`,`INSTAGRAM`,`LINKEDIN`,`PROJ_WORK`,`PROJ_DONE`,`AWARDS`,`CLIENTS`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("isisssssssssssiii",$id, $uname, $uage, $uwhat, $uexperience, $ucountry, $ulocation, $unumber, $uemail, $ufacebook, $utwitter, $uinstagram, $ulinkedin, $uproj_work, $uproj_done, $uawards, $uclients);
            $stmt->execute();
            //unset($uname,$uage,$uwhat,$uexperience,$ucountry,$ulocation,$uemail,$uemail);
            $stmt->close();
            set_message('Successfully Added data');

            header("Location: dashboard.php");
            

        } else {
            die("Failed to Update Data" . $conn->error);
        }
        ;




    }
    ;

}
;
function display($conn, $id)
{
    
    $dispQuery = "SELECT * FROM info WHERE ID= ?";
    if ($stmt = $conn->prepare($dispQuery)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $displayname = $displayage = $displayjob = $displayexperience = $displaycountry = $displaylocation = $displaynumber = $displayemail = $displayfacebook = $displaytwitter = $displayinstagram = $displaylinkedin = $displayproj_work = $displayproj_done = $displayawards = $displayclients = null;

        while ($row = $result->fetch_assoc()) {
            $displayname = $row["NAME"];
            $displayage = $row["AGE"];
            $displayjob = $row["JOB"];
            $displayexperience = $row["EXPERIENCE"];
            $displaycountry = $row["COUNTRY"];
            $displaylocation = $row["LOCATION"];
            $displaynumber = $row["NUMBER"];
            $displayemail = $row["EMAIL"];
            
            $displayfacebook = $row["FACEBOOK"];
            $displaytwitter = $row["TWITTER"];
            $displayinstagram = $row["INSTAGRAM"];
            $displaylinkedin = $row["LINKEDIN"];
            
            $displayproj_work = $row["PROJ_WORK"];
            $displayproj_done = $row["PROJ_DONE"];
            $displayawards = $row["AWARDS"];
            $displayclients = $row["CLIENTS"];
        }
        ;
        $stmt->close();
        return [$displayname, $displayage, $displayjob, $displayexperience, $displaycountry, $displaylocation, $displaynumber, $displayemail, $displayfacebook, $displaytwitter, $displayinstagram, $displaylinkedin, $displayproj_work, $displayproj_done, $displayawards, $displayclients];

    } else {
        echo "Unable to display data" . $conn->error;
    }
    ;


}
function login($conn)
{
    
    if (isset($_POST["login_name"]) && isset($_POST["login_password"])) {
        $username = $_POST["login_name"];
        $password = $_POST["login_password"];


        $query = 'SELECT * FROM users WHERE Username = ? AND Password =? ';
        if ($stmt = $conn->prepare($query)) {
            $username = cleanInput($username);
            $password = cleanInput($password);
            $stmt->bind_param('si', $username, $password);
            $stmt->execute();

            $results = $stmt->get_result();
            $row = $results->fetch_assoc();
            if ($row) {
                
                $_SESSION['ID'] = $row['ID'];
                $_SESSION['Name'] = $row['Username'];
               
                
                set_message("Logged in as " .$_SESSION["Name"]);
                header('Location: dashboard.php');
                
                
                
               
               
                
                
                
                


            } else {
                echo 'data not found <br>';
                echo 'Please check your username and password<br>';

            }
            ;
            $stmt->close();

        }
        ;


    }
    ;

}
;

function cleanInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
;
function logout()
{
    

if (isset($_POST['logout'])) {
    
    if (isset($_SESSION['ID']) && isset($_SESSION['Name'])) {
        
       
        set_message("You have logged out");
        
        header('Location: index.php');
        
        
        unset($_POST['logout']);
        session_destroy();
    }else{
        set_message('You have to be logged in lol');
        

    };
    


}
;
};

?>