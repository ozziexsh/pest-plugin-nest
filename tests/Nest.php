<?php


use Ozzie\Nest\Nest;

test('describe sets prefixes', function () {
  Nest::describe('one', function () {
    Nest::describe('two', function() {
      expect(Nest::$prefixes)->toEqual(['one', 'two']);
    });
  });
});

test('when sets prefixes with "when"', function () {
  Nest::when('one', function () {
    Nest::when('two', function() {
      expect(Nest::$prefixes)->toEqual(['when one', 'when two']);
    });
  });
});

//test('test runs the native pest test"', function () {
//  mock(Nest::class)->makePartial()->shouldReceive('nativePestTest')->once();
//
//  Nest::test('something');
//});

Nest::test('it runs the test func')->expect(true)->toBeTrue();
Nest::test('it runs the test func with callback', function () {
  expect(true)->toBeTrue();
});

Nest::it('runs the it func')->expect(true)->toBeTrue();

Nest::it('runs the it func with callback', function () {
  expect(true)->toBeTrue();
});

Nest::describe('describe', function () {
  Nest::test('described test')->expect(true)->toBeTrue();

  Nest::it('described it')->expect(true)->toBeTrue();
});

Nest::when('when', function () {
  Nest::test('when test')->expect(true)->toBeTrue();

  Nest::it('when it')->expect(true)->toBeTrue();
});
