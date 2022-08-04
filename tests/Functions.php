<?php

use function Ozzie\Nest\describe;
use function Ozzie\Nest\it;
use function Ozzie\Nest\test;
use function Ozzie\Nest\when;

test('it runs the test func')
  ->expect(true)
  ->toBeTrue();

test('it runs the test func with callback', function () {
  expect(true)->toBeTrue();
});

it('runs the it func')
  ->expect(true)
  ->toBeTrue();

it('runs the it func with callback', function () {
  expect(true)->toBeTrue();
});

describe('describe', function () {
  test('described test')
    ->expect(true)
    ->toBeTrue();

  it('described it')
    ->expect(true)
    ->toBeTrue();
});

when('when', function () {
  test('when test')
    ->expect(true)
    ->toBeTrue();

  it('when it')
    ->expect(true)
    ->toBeTrue();
});
