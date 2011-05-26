<!-- 
	 This file was produced for SESSA by tobie nortje
	 It is a mockup of a potential online calcualtor.
	 The copyright of the information herein lies with the author
	 contact the author at tobie.nortje@navitas.co.za
	 IT is meant for demonstration purposes and not for commercial intent
-->

<html>
	<body>
	<h1>Solar Water Heating Savings Calculator</h1>
	<h2>Step 3 Congratulations! You have earned the following eco-credentials</h2>
	<h2>These benefits are calculator over 10 years.</h2>
	
	<?php
		$monthenergy = $_GET['monthenergy'];
		$WaterC = 1.26;
		$CoalC = .5;
		$AshC = 0.28;
		$So2C = 8.70;
		$NOX = 3.87;
		$CO2 = 0.96;
		$months = 120;
		
		echo "<h3>Electricity saved per month</h3>";
		echo $monthenergy . " kWh</br>";
		
		echo "<h3>Water</h3>";
		echo ($monthenergy * $WaterC * $months );
		
		echo "<h3>Coal</h3>";
		echo $monthenergy * $CoalC * $months. " kg</br>";
		
		echo "<h3>Ash</h3>";
		echo $monthenergy * $AshC /1000 * $months. " kg</br>";
		
		echo "<h3>SO2</h3>";
		echo $monthenergy * $So2C /1000 * $months. " kg</br>";
		
		echo "<h3>NOX</h3>";
		echo $monthenergy * $NOX /1000 * $months. " kg</br>";
		
		echo "<h3>CO2</h3>";
		echo $monthenergy * $CO2 * $months . " kg</br>";

		
		
	?>
	
	</body>
</html>