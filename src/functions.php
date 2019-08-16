<?php
namespace Choval;
use Choval\Damm;

function damm_digit(string $number) : int {
  return Damm::digit($number);
}
 
function damm_valid(string $number, int $digit=NULL) : bool {
  return Damm::valid($number, $digit);
}

