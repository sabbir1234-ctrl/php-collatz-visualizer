# PHP Collatz Visualizer

A PHP app that explores the **Collatz conjecture** (if *n* is even, halve it; if odd, take 3*n* + 1; repeat until 1) over a range of numbers, and shows the results as statistics and a **histogram**.

![PHP](https://img.shields.io/badge/PHP-OOP-777BB4?logo=php&logoColor=white)

## What it calculates

For every number in a range `[n, m]`:
- the **number of steps** needed to reach 1
- the **highest value** reached along the way

Over the whole range it reports:
- the number with the **most** and **fewest** steps
- the number that reaches the **highest value**
- a **histogram** of how many numbers needed each step count, shown as an HTML table

## Design

- `Collatz` class: sequence calculation (`collatzIterations`), range processing and statistics
- `CollatzHistogram extends Collatz`: adds `generateHistogram()` and validates the range limits (inheritance plus class constants)

## Files

| File | Purpose |
|------|---------|
| `collatz.php (Combined Collatz 1 & 2).php` | Final combined version of the `Collatz` and `CollatzHistogram` classes |
| `index.php (Updated to Display Collatz 1 & 2 + Histogram).php` | Final page: statistics and histogram table |
| `collatz.php`, `collatz 2.php`, `index.php` | Earlier step-by-step versions (part 1 and part 2 of the task) |

## Run

```bash
php -S localhost:8000
```

Then open the final `index.php (Updated to Display Collatz 1 & 2 + Histogram).php` file in the browser.
