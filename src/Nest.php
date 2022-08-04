<?php

declare(strict_types=1);

namespace Ozzie\Nest;

use Closure;

class Nest
{
  /**
   * @var array<int, string>
   */
  public static array $prefixes = [];

  public static function describe(string $description, Closure $callback): void
  {
    static::$prefixes[] = $description;

    $callback();

    array_pop(static::$prefixes);
  }

  public static function when(string $description, Closure $callback): void
  {
    static::describe("when $description", $callback);
  }

  /**
   * @return mixed|\Pest\PendingObjects\TestCall|\Pest\Support\HigherOrderTapProxy|\PHPUnit\Framework\TestCase
   */
  public static function it(
    string $description = null,
    Closure $callback = null
  ) {
    $testName = implode(' - ', [...static::$prefixes, "it $description"]);

    return static::nativePestTest($testName, $callback);
  }

  /**
   * @return mixed|\Pest\PendingObjects\TestCall|\Pest\Support\HigherOrderTapProxy|\PHPUnit\Framework\TestCase
   */
  public static function test(
    string $description = null,
    Closure $callback = null
  ) {
    $testName = implode(' - ', [...static::$prefixes, $description]);

    return static::nativePestTest($testName, $callback);
  }

  /**
   * @return mixed|\Pest\PendingObjects\TestCall|\Pest\Support\HigherOrderTapProxy|\PHPUnit\Framework\TestCase
   */
  public static function nativePestTest(
    string $description = null,
    Closure $callback = null
  ) {
    return \test($description, $callback);
  }
}
