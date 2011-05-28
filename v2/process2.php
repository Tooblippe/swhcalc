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
		
		//only needs one variable from the previous sheet
		//use the energy saved per month in the calculations
		//----------------------------------------------------------------------
		$monthenergy = $_GET['monthenergy'];
		
		//environmental constants to use in calculations
		//source - Eskom anual report - insert reference
		//----------------------------------------------------------------------
		$WaterC 	= 1.26;		//l/kwh
		$CoalC 		= .5;		//kg/kwh
		$AshC 		= 0.28;		//g/kwh
		$So2C 		= 8.70;		//g/kwh
		$NOX 		= 3.87;		//g/kwh
		$CO2 		= 0.96;		//kg/kwh
		$months 	= 120;		//study time period, chosen as 10 years
		
		
		//generate the outpurs
		//----------------------------------------------------------------------
		
		echo "<h3>Electricity saved per month</h3>" . round($monthenergy,2) . " kWh</br>";
		
		echo "<h3>Water</h3>" 	. round($monthenergy * $WaterC * $months,2 ) . " litres</br>";
		
		echo "<h3>Coal</h3>" 	. round($monthenergy * $CoalC * $months,2) . " kg</br>";
		
		echo "<h3>Ash</h3>" 	. round($monthenergy * $AshC /1000 * $months,2) . " kg</br>";
		
		echo "<h3>SO2</h3>" 	. round($monthenergy * $So2C /1000 * $months,2) . " kg</br>";
		
		echo "<h3>NOX</h3>"		. round($monthenergy * $NOX /1000 * $months,2). " kg</br>";
		
		echo "<h3>CO2</h3>"		. round($monthenergy * $CO2 * $months ,2). " kg</br>";
		//----------------------------------------------------------------------
		// end of engine
		
	?>
	
	</body>
</html>