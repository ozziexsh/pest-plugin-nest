<?php

declare(strict_types=1);

namespace Ozzie\Nest;

use Closure;

function describe(string $description, Closure $callback)
{
  Nest::describe($description, $callback);
}

function when(string $description, Closure $callback)
{
  Nest::when($description, $callback);
}

/**
 * @return mixed|\Pest\PendingObjects\TestCall|\Pest\Support\HigherOrderTapProxy|\PHPUnit\Framework\TestCase
 */
function itt(string $description, ?Closure $callback = null)
{
  return Nest::it($description, $callback);
}

/**
 * @return mixed|\Pest\PendingObjects\TestCall|\Pest\Support\HigherOrderTapProxy|\PHPUnit\Framework\TestCase
 */
function testt(string $description, ?Closure $callback = null)
{
  return Nest::test($description, $callback);
}
