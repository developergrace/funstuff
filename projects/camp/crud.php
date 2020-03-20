<?php
// Add the database connection to the top of a page so that elements in the bottom of the page can access them
include('database.php');

// CHECK IF THE FORM HAS BEEN SUBMITTED AND INSERT NEW USER INTO THE DATABASE
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $field_msg = [];
    $enroll_msg = [];
    $table_msg = [];

    if(empty($_POST['first_name'])) {
        $field_msg[0] = 'You forgot to enter your first name!';
    } else {
        $first_name = trim($_POST['first_name']);
    }

    if(empty($_POST['last_name'])) {
        $field_msg[1] = 'You forgot to enter your last name!';
    } else {
        $last_name = trim($_POST['last_name']);
    }

    if(empty($_POST['email'])) {
        $field_msg[2] = 'You forgot to enter your email!';
    } else {
        $email = trim($_POST['email']);
    }

    if(!empty($_POST['pass1'])) {
        if($_POST['pass1'] != $_POST['pass2']) {
            $field_msg[3] = 'Your passwords did not match.';
        } else {
            $password = trim($_POST['pass1']);
        }
    } else {
        $field_msg[4] = 'You forgot to enter a password!';
    }

    if(empty($field_msg)) {
        $insert_query   = "INSERT INTO USER_PARK (first_name, last_name, email, password)
                            VALUES ('$first_name', '$last_name', '$email', '$password')";

        if($result = mysqli_query($connection, $insert_query)) {
            $enroll_msg[0] = 'You\'ve successfully enrolled!';
        } else {
            $enroll_msg[1] = 'There was an error in your enrollment, please try again.';
        }
    }
}

 //QUERY THE DATABASE AND STORE ALL USERS INTO A VARIABLE

// Create your query
$query = 'SELECT * FROM USER_PARK';

// Run your query
$result = mysqli_query($connection, $query);


// Check if the database returned anything
if($result) {
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);   //mysqli_assoc changes array key to column name
    //print_r($rows); //this is a function you can use to see if information is being accepted properly

    // Output the results

} else {
    // Output an error
    $table_msg[0] = 'There was an error generating the user table.';
    }

?>

<!doctype html>
<html>
<head>
    <title>CRUD Camp</title>
    <link rel="stylesheet" href="crud_style.css">
    <script src="https://kit.fontawesome.com/b25da52a36.js" crossorigin="anonymous"></script>
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
        <h2>CRUD Camp</h2>
        <p class="blurb">The adventure of a lifetime awaits at CRUD Camp, a sleep-away camp focusing on tech for kids ages 10-17.
        Each camper's experience is unique: from coding, to robotics, animation, and more. CRUD Camp has all the resources
        and tools your tech-loving kid needs to succeed in the future. Not only will campers learn about tech fields and get
        hands-on experience creating and designing, they will have plenty of opportunities to swim, hike, and have outdoor
        adventures. </p>
        <p class="blurb">CRUD campers develop new skills, form lifelong friendships, and create lasting memories.
        Don't miss out, enroll your kid(s) today!</p>

        <h2>Application</h2>
        <form action="crud.php" method="POST">

            <div class="field">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name'];  ?>">
                <?php
                    if(isset($field_msg[0])) {
                        echo '<p class="error">' . $field_msg[0] . '</p>';
                    }
                ?>
            </div>

            <div class="field">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name'];  ?>">
                <?php
                    if(isset($field_msg[1])) {
                        echo '<p class="error">' . $field_msg[1] . '</p>';
                    }
                ?>
            </div>

            <div class="field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];  ?>">
                <?php
                    if(isset($field_msg[2])) {
                        echo '<p class="error">' . $field_msg[2] . '</p>';
                    }
                ?>
            </div>

            <div class="field">
                <label for="pass1">Password</label>
                <input type="password" id="pass1" name="pass1">
                <?php
                    if(isset($field_msg[4])) {
                        echo '<p class="error">' . $field_msg[4] . '</p>';
                    }
                ?>
            </div>

            <div class="field">
                <label for="pass2">Confirm Password</label>
                <input type="password" id="pass2" name="pass2">
                <?php
                    if(isset($field_msg[3])) {
                        echo '<p class="error">' . $field_msg[3] . '</p>';
                    }
                ?>
            </div>

            <button>Enroll</button>

            <?php
                if(isset($enroll_msg[0])) {
                    echo '<p class="success">' . $enroll_msg[0] . '</p>';
                }
                if(isset($enroll_msg[1])) {
                    echo '<p class="error">' . $enroll_msg[1] . '</p>';
                }
            ?>
        </form>

        <h2>Join These Campers!</h2>
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Edit</th>
                </tr>
            </thead>

            <tbody>
            <?php
            foreach($rows as $row) {
                echo '<tr>
                    <td>' . $row['first_name'] . '</td>
                    <td>' . $row['last_name'] . '</td>
                    <td>' . $row['email'] . '</td>
                    <td>' . $row['password'] . '</td>
                    <td><a href="update.php?id=' . $row['user_id'] . '"><i class="fas fa-edit"></i></a></td>
                </tr>';
            }
            ?>
            </tbody>
        </table>
        <?php
            if(isset($table_msg[0])) {
                echo '<p class="error">' . $table_msg[0] . '</p>';
            }
        ?>
    </main>

    <footer>
        <p>&copy; 2019 Grace Park for COSW30</p>
    </footer>
</body>
</html>