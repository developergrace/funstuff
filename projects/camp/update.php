<?php
include('database.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    //if there is no id in the url, else will automatically redirect to crud.php
    header('Location: crud.php');
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $update_msg = [];

    if(empty($_POST['first_name'])) {
        $update_msg[0] = 'One or more fields were left empty, please try again.';
    } else {
        $first_name = trim($_POST['first_name']);
    }

    if(empty($_POST['last_name'])) {
        $update_msg[0] = 'One or more fields were left empty, please try again.';
    } else {
        $last_name = trim($_POST['last_name']);
    }

    if(empty($_POST['email'])) {
        $update_msg[0] = 'One or more fields were left empty, please try again.';
    } else {
        $email = trim($_POST['email']);
    }

    if(!empty($_POST['pass1'])) {
        if($_POST['pass1'] != $_POST['pass2']) {
            $update_msg[1] = 'Your passwords did not match, please try again.';
        } else {
            $password = trim($_POST['pass1']);
        }
    } else {
        $update_msg[0] = 'One or more fields were left empty, please try again.';
    }

    if(empty($update_msg)) {
        //for sql, need single quotes for data that will be strings, no single quotes on $id b/c it is number data
        $update_query = "UPDATE USER_PARK
                         SET first_name     = '$first_name',
                             last_name      = '$last_name',
                             email          = '$email',
                             password       = '$password'
                         WHERE user_id      =  $id";

        if($result = mysqli_query($connection, $update_query)) {
                header('Location: crud.php');
                exit;
        } else {
            echo 'There was an error updating your enrollment, please try again.'; 
        }
    }  
}

$query = "SELECT * FROM USER_PARK WHERE user_id = $id";

$result = mysqli_query($connection, $query);

if($result) {
    $user = mysqli_fetch_assoc($result);
    $first_name = $user['first_name'];
    $last_name = $user['last_name'];
    $email = $user['email'];
    $password = $user['password'];
} else {
    // Output an error
    echo '<p class="error">There was an error generating the user table.</p>';
    }

?>

<!doctype html>
<html>
<head>
    <title>CRUD Camp - Application</title>
    <link rel="stylesheet" href="crud_style.css">
</head>
<body>

    <header>
        <div class="hero">
            <h1>Adventure Awaits</h1>
            <video width="100%" autoplay loop>
                <source src="crudcamp.mp4" type="video/mp4">
                <img src="crudcamp.png" title="Your browser does not support the video tag" alt="Crud Camp Logo">
            </video>
        </div>
    </header>

    <main>
        <h2>Update Application</h2>
        <p class="blurb">Complete <strong>all</strong> fields below to edit your application. Once completed, click the Update button to submit and return to the home page.</p>

        <form action="update.php?id=<?php echo $id; ?>" method="POST">

            <div class="field">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" value="<?php echo $first_name; ?>">
            </div>

            <div class="field">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" value="<?php echo $last_name;  ?>">
            </div>

            <div class="field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo $email;  ?>">
            </div>

            <div class="field">
                <label for="pass1">Password</label>
                <input type="text" id="pass1" name="pass1" value="<?php echo $password;  ?>">
            </div>

            <div class="field">
                <label for="pass2">Confirm Password</label>
                <input type="text" id="pass2" name="pass2" value="<?php echo $password;  ?>">
            </div>

            <!--
            //Instead of changing the form action, you can use a hidden input as below:
            <input type="hidden" name="user_id" value="<?php echo $id; ?>">
            -->

            <button>Update</button>

            <?php
                if(isset($update_msg[0])) {
                    echo '<p class="error">' . $update_msg[0] . '</p>';
                }
                if(isset($update_msg[1])) {
                    echo '<p class="error">' . $update_msg[1] . '</p>';
                }
            ?>

        </form>
    </main>

    <footer>
        <p>&copy; 2019 Grace Park for COSW30</p>
    </footer>
</body>
</html>