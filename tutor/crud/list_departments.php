	<?php 
		include("header.php");
		require('db.php');
    ?>
    
        <div class="subs">
            <h2>List of Subsidiaries</h2>
            <?php	
                $query = "SELECT * FROM DEPARTMENT ORDER BY department_name ASC";
                $result = mysqli_query($connection, $query);
                
                echo "<table><thead><td class='center'>ID</td><td>Subsidiary Name</td><td>Number of Employees</td><td>Building Number</td></thead>";
                
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td class='center'>" . $row['department_id'] . "</td><td>" . $row['department_name'] . "</td><td>" . $row['num_of_employees'] . "</td><td>" . $row['building_number'] . "</td></tr>";
                }
                
                echo "</table>";
            ?>
        </div>
    </main>
</body>
</html>