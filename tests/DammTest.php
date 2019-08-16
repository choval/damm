<?php

use PHPUnit\Framework\TestCase;
use React\EventLoop\Factory;
use React\Promise\Deferred;
use React\Promise;

use Choval\Damm;
use function Choval\damm_digit;
use function Choval\damm_valid;

class DammTest extends TestCase {

  
  /**
   * Providers
   */
  public function randomNumber($max=65536) {
    return random_int( 0, $max);
  }
  public function randomSetLarge() {
    $out = [];
    for($i=0;$i<5;$i++) {
      $out[] = [ $this->randomNumber(PHP_INT_MAX) ];
    }
    $out[] = [PHP_INT_MAX];
    return $out;
  }
  public function randomSetSmall() {
    $out = [];
    $out[] = [ 0 ];
    $out[] = [ 16 ];
    $out[] = [ 572 ];
    for($i=0;$i<3;$i++) {
      $out[] = [ $this->randomNumber() ];
    }
    return $out;
  }



  /**
   * @dataProvider randomSetSmall
   */
  public function testClass($number) {
    $digit = Damm::digit($number);
    $this->assertInternalType('int', $digit);
    $this->assertEquals(1, strlen($digit) );

    $valid = Damm::valid($number, $digit);
    $this->assertTrue($valid);

    $valid = Damm::valid($number.$digit);
    $this->assertTrue($valid);

    $valid = Damm::valid('00'.$number.$digit);
    $this->assertTrue($valid);

    $valid = Damm::valid('00'.$number, $digit);
    $this->assertTrue($valid);
  }



  /**
   * @dataProvider randomSetLarge
   */
  public function testProcedure($number) {
    $digit = damm_digit($number);
    $valid = damm_valid($number, $digit);
    $this->assertTrue($valid);

    $valid = damm_valid($number.$digit);
    $this->assertTrue($valid);

    $valid = damm_valid('0000'.$number.$digit);
    $this->assertTrue($valid);

    $valid = damm_valid('0000'.$number, $digit);
    $this->assertTrue($valid);
  }





}

