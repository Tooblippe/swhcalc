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
	<h2>Step 2 Congratulations! Here are the smart savings you have made</h2>
	<h2>by simply choosing a greener way to heat water</h2>
	<?php
		
		
		$town 	= $_POST['town'];
		$people = $_POST['people'];
		$system = $_POST['system'];
		$ckwh 	= $_POST['ckwh'];
		$water_cons  = 60;
		

			
		$daywater = $people * $water_cons;
		$energydayjoules = $daywater * 4200 * (70-20);
		$energykwh = $energydayjoules / 3600000;
		$savingspotential = 0.4;
		$energysavedperday = $savingspotential * $energykwh;
		$yearenergy = $energysavedperday * 356;
		$dayspermonth = 365/12;
		$monthenergy = $energysavedperday * $dayspermonth;
		$monthcost = $monthenergy * $ckwh;
		
		
		
		
		echo "<h3>Electricity saved per month</h3>";
		echo round($monthenergy,2) . " kWh</br>";
		echo round($monthcost,2) . " Rand";
		
		echo "<h3>Cost of system per month before</h3>";
		echo round(($monthenergy / $savingspotential),2) . " kWh</br>";
		echo round(($monthcost / $savingspotential),2) . " Rand</br>";
		
		echo "<h3>Months to break even</h3>";
		echo  round((($people * 1000) / $monthcost),2) . " months</br>";
		echo  round((($people * 1000) / $monthcost / 12),2) . " years";
		
		echo "<h3>Total return after:</h3>";
		echo "12 month: " .  round(($monthcost*12),2) . " Rand</br>";
		echo "24 months " .  round(($monthcost*24),2) . " Rand</br>";
		echo "48 months " .  round(($monthcost*48),2) . " Rand</br>";
		
		
		

	
	
	
	echo "<h3> Press submit to see your environmental benefits </h3>
		<form action='process2.php' method='get'>
			<input type='hidden' name='monthenergy' value=" . $monthenergy . ">
			<input type='submit' />
		</form>";
    ?>
	</body>
</html>