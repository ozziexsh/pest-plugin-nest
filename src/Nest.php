<?php

namespace Ozzie\Nest;

use Closure;

class Nest
{
  public static array $prefixes = [];

  public static function describe($description, $callback)
  {
    static::$prefixes[] = $description;

    $callback();

    array_pop(static::$prefixes);
  }

  public static function when($description, $callback)
  {
    static::describe("when $description", $callback);
  }

  public static function it(?string $description = null, ?Closure $callback = null)
  {
    $testName = implode(' - ', [...static::$prefixes, "it $description"]);

    return static::nativePestTest($testName, $callback);
  }

  public static function test(?string $description = null, ?Closure $callback = null)
  {
    $testName = implode(' - ', [...static::$prefixes, $description]);

    return static::nativePestTest($testName, $callback);
  }

  public static function nativePestTest(?string $description = null, ?Closure $callback = null)
  {
    return test($description, $callback);
  }
}
