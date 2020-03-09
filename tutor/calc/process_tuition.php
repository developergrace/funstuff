<?php
    include('header.php'); 
    $resident = $_POST['resident'];
    $units = $_POST['units'];
    $services = $_POST['services'];
    $parking = $_POST['parking'];
    $health = 20;

    $tuition = $resident * $units;
    $subtotal = $tuition + $services + $parking + $health;
    $scholarship = rand(0, $subtotal);
    $total = $subtotal - $scholarship;

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "<table class=\"table table-striped\"><thead><tr class=\"bg-danger\"><th scope=\"col\">Category</th><th scope=\"col\">Cost</th></tr></thead><tbody>";
        echo "<tr><td>Tuition</td><td>$$tuition ($units units x $$resident)</td></tr><tr><td>Health</td><td>$$health</td></tr>";
        if($services > 0) {
            echo "<tr><td>College Services</td><td>$$services</td></tr>";
        }
        if($parking > 0) {
            echo "<tr><td>Parking</td><td>$$parking</td></tr>";
        }
        echo "<tr><td>Scholarship</td><td>$$scholarship</td></tr>";
        echo "<tr><td>Total</td><td>$$total</td></tr>";
        echo "</tbody></table>";
    }
?>

            </main>
        </div>
	</body>
</html>