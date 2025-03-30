<?php

class Collatz {
    private int $startNumber;
    
    public function __construct(int $startNumber) {
        $this->startNumber = $startNumber;
    }

    public function collatzIterations(int $n): array {
        $steps = 0;
        $maxValue = $n;

        while ($n !== 1) {
            if ($n % 2 === 0) {
                $n /= 2;
            } else {
                $n = 3 * $n + 1;
            }
            $steps++;
            if ($n > $maxValue) {
                $maxValue = $n;
            }
        }

        return ['steps' => $steps, 'maxValue' => $maxValue];
    }

    public function calculateRange(int $start, int $end): array {
        $results = [];
        
        for ($i = $start; $i <= $end; $i++) {
            $results[$i] = $this->collatzIterations($i);
        }

        return $results;
    }

    public function statistics(int $start, int $end): array {
        $data = $this->calculateRange($start, $end);
        
        $maxStepsNum = $minStepsNum = $maxValueNum = 0;
        $maxSteps = $minSteps = PHP_INT_MAX;
        $maxValue = 0;

        foreach ($data as $num => $info) {
            if ($info['steps'] > $maxSteps) {
                $maxSteps = $info['steps'];
                $maxStepsNum = $num;
            }

            if ($info['steps'] < $minSteps) {
                $minSteps = $info['steps'];
                $minStepsNum = $num;
            }

            if ($info['maxValue'] > $maxValue) {
                $maxValue = $info['maxValue'];
                $maxValueNum = $num;
            }
        }

        return [
            'maxIterations' => ['number' => $maxStepsNum, 'iterations' => $maxSteps],
            'minIterations' => ['number' => $minStepsNum, 'iterations' => $minSteps],
            'maxValue' => ['number' => $maxValueNum, 'value' => $maxValue]
        ];
    }
}

// Child class extending Collatz to include histogram calculations
class CollatzHistogram extends Collatz {
    public function generateHistogram(int $n, int $m): array {
        if ($n > $m) {
            throw new InvalidArgumentException("Invalid range. Ensure n <= m.");
        }
        
        $histogram = [];
        for ($i = $n; $i <= $m; $i++) {
            $iterations = $this->collatzIterations($i)['steps'];
            if (!isset($histogram[$iterations])) {
                $histogram[$iterations] = 0;
            }
            $histogram[$iterations]++;
        }
        
        ksort($histogram);
        return $histogram;
    }
}
?>
