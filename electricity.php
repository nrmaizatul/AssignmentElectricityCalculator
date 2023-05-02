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
                <label for="currentrate">Current Rate</label>
                <input type="text" class="form-control" id="currentrate" name="currentrate">
            </div>
            <center><button type="submit" class="btn btn-primary">Calculate</button></center>
        </form>
	

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $voltage = $_POST['voltage'];
  $current = $_POST['current'];
  $hour = $_POST['hour'];
  $currentrate = $_POST['currentrate'];
  
  function calculateElectricityCharges($voltage, $current, $hour, $currentrate) {
    // Calculate power in watts
    $power = $voltage * $current;
	
    // Calculate energy in kWh 
    $energy_kwh = $power * $hour / 1000;
    
    // Calculate total charge based on current rate
    $totalcharge = $energy_kwh * ($currentrate/100);
    
    // Return results as an array
    return array(
	
        'energy_kwh' => $energy_kwh,
        'totalcharge' => $totalcharge
    );
}

// Call the function with inputs
$results = calculateElectricityCharges($voltage, $current, $hour, $currentrate);

// Print the results
echo '<p> Energy:  '. $results['energy_kwh'] . ' kWh</p>';
echo '<p> Total Charge: RM '. $results['totalcharge'].' </p>';
}
?>
</div>
</body>
</html>

 
