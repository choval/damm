# Choval/damm


**Damm algorithm** functions.

> In error detection, the Damm algorithm is a check digit algorithm that detects all single-digit errors and adjacent transposition errors. It was presented by H. Michael Damm in 2004.
> 
> -- <cite>[Wikipedia](https://en.wikipedia.org/wiki/Damm_algorithm)</cite>

## Install

```
composer require choval/damm
```

## Usage

```php
damm_digit(string $number) : int
damm_valid(string $number[, string $digit]) : bool
```

Both functions take a string as parameter to allow numbers larger than `PHP_INT_MAX`.  
They still have to be numeric.

Examples:

```php
echo damm_digit(572);
// 4

echo damm_digit('572');
// 4

echo damm_digit('0000572');
// 4

echo damm_valid(572, 4);
// true

echo damm_valid(572, 3);
// false

echo damm_valid(5724);
// true

echo damm_valid('000005724');
// true
```

## License

MIT, see LICENSE

