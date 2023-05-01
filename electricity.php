<!DOCTYPE html>
<html>
<head>
  <title>Electricity Charge Calculator</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <center><h1>Electricity Charge Calculator</h1></center>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="voltage">Voltage (V)</label>
                <input type="text" class="form-control" id="voltage" name="voltage">
            </div>
            <div class="form-group">
                <label for="current">Current (A)</label>
                <input type="text" class="form-control" id="current" name="current">
            </div>
			<div class="form-group">
                <label for="hour">Hour</label>
                <input type="hour" class="form-control" id="hour" name="hour">
            </div>
            <div class="form-group">
                <label for="rate">Current Rate</label>
                <input type="text" class="form-control" id="rate" name="rate">
            </div>
            <center><button type="submit" class="btn btn-primary">Calculate</button></center>
        </form>


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $voltage = $_POST['voltage'];
  $current = $_POST['current'];
  $hour = $_POST['hour'];
  $rate = $_POST['rate'];
  
  function calculateElectricityCharges($voltage, $current, $hour, $rate) {
    // Calculate power in watts
    $power = $voltage * $current;
    
	//calculate energy in watt-hours assuming 1 hour of usage
	//$energy = $power * 1; 
	
    // Calculate energy in kWh 
    $energy_kwh = $power * $hour / 1000;
    
    // Calculate rate per hour based on current rate
    $totalcharge = $energy_kwh * ($rate/100);
	
	// Calculate rate per day based on current rate
	
    
    // Return results as an array
    return array(
        
        'energy_kwh' => $energy_kwh,
        'totalcharge' => $totalcharge
    );
}

// Call the function with inputs
$results = calculateElectricityCharges($voltage, $current, $hour, $rate);

// Print the results

echo '<p> Energy:  '. $results['energy_kwh'] . ' kWh</p>';
echo '<p> Total Charge: RM '. $results['totalcharge'].' </p>';
}
?>

</body>
</html>

 