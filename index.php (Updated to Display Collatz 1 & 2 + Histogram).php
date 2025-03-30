<?php
require_once 'collatz.php (Combined Collatz 1 & 2).php';

// Define range
$n = 1;
$m = 20;

// Create an instance of CollatzHistogram
$collatzHistogram = new CollatzHistogram(1);

try {
    // Generate histogram for the given range
    $histogram = $collatzHistogram->generateHistogram($n, $m);

    // Get statistics
    $statistics = $collatzHistogram->statistics($n, $m);

    // Display histogram in HTML
    echo "<h2>Collatz Sequence Histogram for range [$n, $m]</h2>";
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>Iterations</th><th>Count</th></tr>";

    foreach ($histogram as $iterations => $count) {
        echo "<tr><td>$iterations</td><td>$count</td></tr>";
    }
    echo "</table>";

    // Display statistics
    echo "<h2>Statistics</h2>";
    echo "<p><strong>Number with max iterations:</strong> {$statistics['maxIterations']['number']} ({$statistics['maxIterations']['iterations']} iterations)</p>";
    echo "<p><strong>Number with min iterations:</strong> {$statistics['minIterations']['number']} ({$statistics['minIterations']['iterations']} iterations)</p>";
    echo "<p><strong>Number with highest value reached:</strong> {$statistics['maxValue']['number']} (Max Value: {$statistics['maxValue']['value']})</p>";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
