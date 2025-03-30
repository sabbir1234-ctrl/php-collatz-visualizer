<?php
// Parent class to handle Collatz sequence calculations
class Collatz {
    // Constants for defining limits
    protected const MIN_VALUE = 1;
    protected const MAX_VALUE = 1000;
    
    // Function to calculate the number of iterations needed to reach 1
    public function collatzIterations(int $num): int {
        if ($num < self::MIN_VALUE) {
            throw new InvalidArgumentException("Number must be at least " . self::MIN_VALUE);
        }
        
        $iterations = 0;
        while ($num > 1) {
            $num = ($num % 2 == 0) ? $num / 2 : (3 * $num + 1);
            $iterations++;
        }
        return $iterations;
    }
}

// Child class extending Collatz to include histogram calculations
class CollatzHistogram extends Collatz {
    // Method to calculate the histogram of iterations for numbers in range [n;m]
    public function generateHistogram(int $n, int $m): array {
        if ($n < self::MIN_VALUE || $m > self::MAX_VALUE || $n > $m) {
            throw new InvalidArgumentException("Invalid range. n should be >= " . self::MIN_VALUE . " and m should be <= " . self::MAX_VALUE);
        }
        
        $histogram = [];
        for ($i = $n; $i <= $m; $i++) {
            $iterations = $this->collatzIterations($i);
            if (!isset($histogram[$iterations])) {
                $histogram[$iterations] = 0;
            }
            $histogram[$iterations]++;
        }
        
        ksort($histogram); // Sorting for better visualization
        return $histogram;
    }
}
?>
