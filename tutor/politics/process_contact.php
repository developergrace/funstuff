<?php include('header.php');

	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$age = $_POST['age'];
	$contribution = $_POST['contribution'];
	$comments = $_POST['comments'];
	
	if(!empty($first_name && $last_name && $email && $gender && $age)) {
		echo "<h1>Thank you $first_name $last_name!</h1>";
		echo "<p>You've indicated you are <span class=\"data\">$gender</span> between the ages of <span class=\"data\">$age</span>. We will send a confirmation to your email at <span class=\"data\">$email</span></p>";
        
        if(!empty($_POST['interests'])) {
        echo "<p>You indicated that you are interested in the following:</p>";
        echo "<ul>";
        foreach($_POST['interests'] as $interest) {
            echo "<li class=\"data\">$interest</li>";
        }
        echo "</ul>";
        } else {
        echo "<p>You did not indicate any interests.</p>"; 
        }
        
        if(!empty($_POST['contribution'])) {
            echo "<p>Thank you for your contribution amount of <span class=\"data\">$$contribution</span>! Every little bit helps Crunchy's Campaign.</p>";
            } else {
                echo "<p>You chose not to make a contribution at this time.</p>"; 
            }
            
            if(!empty($_POST['comments'])) {
                echo "<p>You left the following comment:</p>";
                echo "<ul><li class=\"data\" style=\"list-style-type: none\">$comments</li></ul>";
                echo "<p>We will send you a response once reviewed.</p>";
        } else {
            echo "<p>You did not leave any comments.</p>"; 
        }

        if(!empty($_POST['newsletter'])) {
            echo "<p>You have signed up to receive updates via our newsletter.</p>";
        } else {
            echo "<p>You have not signed up for our newsletter at this time.</p>"; 
        }
            
        echo "<div class=\"row\"><a href=\"contact.php\"><button>Share</button></a></div>";
	} else {
		echo "<p>You did not complete all required fields. Please <a href=\"contact.php\">go back</a> and complete the form.</p>";
	}

?>

		</main></div>
	</body>
</html>