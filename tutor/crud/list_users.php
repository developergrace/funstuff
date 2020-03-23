<?php 
    include("header.php");
    require('db.php');

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
                $field_msg[4] = 'Your passwords did not match.';
            } else {
                $password = trim($_POST['pass1']);
            }
        } else {
            $field_msg[3] = 'You forgot to enter a password!';
        }

        if(empty($field_msg)) {
        $insert_query   = "INSERT INTO USER (first_name, last_name, email_address, password)
                            VALUES ('$first_name', '$last_name', '$email', '$password')";

            if($result = mysqli_query($connection, $insert_query)) {
                $enroll_msg[0] = 'You\'ve successfully enrolled!';
            } else {
                $enroll_msg[1] = 'There was an error in your enrollment, please try again.';
            }
        }
	}
		
?>
	
    <form action="" method="POST">
        <img src="shoe.svg" alt="cinder logo" class="logo_img">
        <h2>Start Matching</h2>
	  
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
                if(isset($field_msg[3])) {
                    echo '<p class="error">' . $field_msg[3] . '</p>';
                }
            ?>
        </div>
        
        <div class="field">
            <label for="pass2">Confirm Password</label>
            <input type="password" id="pass2" name="pass2">
            <?php
                if(isset($field_msg[4])) {
                    echo '<p class="error">' . $field_msg[4] . '</p>';
                }
            ?>
	    </div>
	
	  <button>Register</button>
	
	  <?php
	      if(isset($enroll_msg[0])) {
	          echo '<p class="success">' . $enroll_msg[0] . '</p>';
	      }
	      if(isset($enroll_msg[1])) {
	          echo '<p class="error">' . $enroll_msg[1] . '</p>';
	      }
	  ?>
	</form>
    
    <div class="subs">
        <h2>List of Users</h2>
        <?php
            $query = "SELECT * FROM USER";
            $result = mysqli_query($connection, $query);
            
            echo "<table><thead><td class='center'>ID</td><td>Email Address</td><td>First Name</td><td>Last Name</td></thead>";
            
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td class='center'>" . $row['user_id'] . "</td><td>" . $row['email_address'] . "</td><td>" . $row['first_name'] . "</td><td>" . $row['last_name'] . "</td></tr>";
            }
            
            echo "</table>";
        ?>
    </div>
    </main>
</body>
</html>