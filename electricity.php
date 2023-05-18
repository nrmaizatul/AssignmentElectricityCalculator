<!DOCTYPE html>
<html>
<head>
  <title>Electricity Charge Calculator</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<style>
td, th{
width:500px;
}
</style>
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
			<br><br>
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


<table id="tabell" border="1px" ></table>

<script>
function tabellOp() {
var data = [ [1,0.06156,0.01], [2,0.12312,0.03], [3,0.18468,0.04], [4,0.24624,0.05], [5,0.3078,0.07], [6,0.36936,0.08], [7,0.43092,0.09], [8,0.49248,0.11], [9,0.55404,0.12], [10,0.6156,0.13], [11,0.67716,0.15], [12,0.73872,0.16], [13,0.80028,0.17], [14,0.86184,0.19], [15,0.9234,0.2], [16,0.98496,0.21], [17,1.04652,0.23], [18,1.10808,0.24], [19,1.16964,0.25], [20,1.2312,0.27], [21,1.29276,0.28], [22,1.35432,0.3], [23,1.41588,0.31], [24,1.47744,0.32]];
var num = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24];
var info = ["hour", "Energy(kWh)", "Total(RM)"];
var tabellget = document.querySelector("#tabell");
var row = "<tr><th>#</th>";

for (var i = 0; i < info.length; i++) {
row += "<th>" + info[i] + "</th>";
}
row += "</tr>";

for (var i = 0; i < num.length; i++) {
row += "<tr><th>" + num[i] + "</th>";
for (var j = 0; j < data[i].length; j++) {
row += "<td>" + data[i][j] + "</td>";
}
row += "</tr>";
}
tabellget.innerHTML = row;
}
window.onload = tabellOp;
</script>
</div>
</body>
</html>

 
