<?php
namespace Choval;

class Damm {


  /**
   * Quasigroup table
   */
  const TABLE = [
    '0317598642',
    '7092154863',
    '4206871359',
    '1750983426',
    '6123045978',
    '3674209581',
    '5869720134',
    '8945362017',
    '9438617205',
    '2581436790',
  ];


  /**
   * Calculates the check digit
   */
  public static function digit(string $number) : int {
    if(!is_numeric($number)) {
      throw new \Exception("Non valid number ($number)");
    }
    $len = strlen($number);
    $row = 0;
    for($i=0;$i<$len;$i++) {
      $row = static::TABLE[$row][ $number[$i] ];
    }
    return $row;
  }


  /**
   * Validates a check digit
   */
  public static function valid(string $number, int $digit=NULL) : bool {
    if(!is_null($digit)) {
      if(strlen($digit) != 1) {
        throw new \Exception("Non valid digit ($digit)");
      }
      $number .= $digit;
    }
    return !(static::digit($number));
  }


}


