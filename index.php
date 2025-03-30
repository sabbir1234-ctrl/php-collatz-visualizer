<?php

require_once 'Collatz.php';

// Create an instance of Collatz with an initial number (not used in range calculations)
$collatz = new Collatz(1);

$start = 25;
$end = 24658;

$stats = $collatz->statistics($start, $end);

echo "Number with Max Iterations: " . $stats['maxIterations']['number'] . " (" . $stats['maxIterations']['iterations'] . " steps)\n";
echo "Number with Min Iterations: " . $stats['minIterations']['number'] . " (" . $stats['minIterations']['iterations'] . " steps)\n";
echo "Number with Max Reached Value: " . $stats['maxValue']['number'] . " (Max Value: " . $stats['maxValue']['value'] . ")\n";
