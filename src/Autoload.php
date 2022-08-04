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

function it(?string $description = null, ?Closure $callback = null)
{
  return Nest::it($description, $callback);
}

function test(?string $description = null, ?Closure $callback = null)
{
  return Nest::test($description, $callback);
}
