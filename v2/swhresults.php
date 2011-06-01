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
	<h2>Step 2 Congratulations! <br> Here are the smart savings you have made by simply choosing a greener way to heat water</h2>
	
	<?php
	
		/* Scrip to handle the inputs fe rom the input page
			 Inputs are:
				town 	- the town selected from the dropdown box, 
				people 	- the number of people in the household
				system  - system selected
				c/kwh 	- cost of energy 
		*/
			
		// System data here, contains the system cost , q factor //
		// ----------------------------------------------------- //
		$systemdata = 
		array(
			
			"System1" => array("cost" =>  9000, "q" => 0.4),				//confirm if these costs include or exclude eskom subsidy
			"System2" => array("cost" => 10000, "q" => 0.45),
			"System3" => array("cost" => 11000, "q" => 0.5),
			"System4" => array("cost" => 14000, "q" => 0.55),
		);
		
		// Town data here, contains the MJ/m2 in the horisontal plane average per year //
		// --------------------------------------------------------------------------- //
		$towndata = 
		array(
			
			"Johannesburg" => 30,
			"Durban" => 20 
		);
		
		// Read the variable input from the landing page, index.html //
		// --------------------------------------------------------- //
		$town 	= $_POST['town'];		//selected town
		$people = $_POST['people'];		//selected how many poeple on your house
		$system = $_POST['system'];		//system choice
		$ckwh 	= $_POST['ckwh'];		//energy cost
		
		
		//constants//
		//----------------------------------------------------------//
		$cp = 4200;			 //spesific heat of water
		$tset = 70;			 //geyser setpoint in degrees celcius
		$tin = 20;			 //inlet water temperature in degrees celcius
		$mjperkwh = 3600000; //convert mj to kwh by deviding by this constant
		$water_const  = 60;	 //hot water use per person in litres
		$daysperyear = 365;	 //how many days per year, duh!
		$dayspermonth = $daysperyear / 12;

		
		//energy calculation model //	
		//------------------------------------------------------------//
		$daywater = $people * $water_const;								//how much water do you use a day
		$energydayjoules = $daywater * $cp* ( $tset -$tin );			//how much energy is used in joules, q = m.c.deltaT
		$energykwh = $energydayjoules / $mjperkwh;						//how much energy in kWh is this?
		
		$savingspotential = $systemdata[$system]["q"];					//how much can we save - look up based on system choise in the systemdata array
		$energysavedperday = $savingspotential * $energykwh;			//now work this out as energy savings per dat
		
		$yearenergy = $energysavedperday * $daysperyear;				//energy saved per year
		$monthenergy = $energysavedperday * $dayspermonth;				//energy saved per month
		
		$monthcost = $monthenergy * $ckwh;								//what do you pay now
		
		$systemcost = $systemdata[$system]["cost"];						//obtain the system cost from the array
		echo "system cost" . $systemcost;
		
		//Create the outputs//
		//-------------------------------------------------------------
						
		echo "<h3>Electricity saved per month</h3>";
			echo round($monthenergy,2) . " kWh</br>";
			echo round($monthcost,2) . " Rand";
		
		echo "<h3>Cost of system per month before</h3>";
			echo round(($monthenergy / $savingspotential),2) . " kWh</br>";
			echo round(($monthcost / $savingspotential),2) . " Rand</br>";
		
		echo "<h3>Months to break even</h3>";
			echo  round(($systemcost / $monthcost),2) . " months</br>";
			echo  round(($systemcost / $monthcost / 12),2) . " years";
		
		echo "<h3>Total return after:</h3>";
			echo "12 month: " .  round(($monthcost*12),2) . " Rand</br>";
			echo "24 months " .  round(($monthcost*24),2) . " Rand</br>";
			echo "48 months " .  round(($monthcost*48),2) . " Rand</br>";
		
		echo "<h3> Press submit to see your environmental benefits </h3>
			<form action='environ.php' method='get'>
				<input type='hidden' name='monthenergy' value=" . $monthenergy . ">
				<input type='submit' />
			</form>";
    ?>
	</body>
</html>