<?php

namespace ByTIC\Records\Behaviors\Tests;

use Mockery as m;
use PHPUnit\Framework\TestCase;

/**
 * Class AbstractTest
 * @package ByTIC\Records\Behaviors\Tests
 */
abstract class AbstractTest extends TestCase
{
    protected function tearDown(): void
    {
        parent::tearDown();
        m::close();
    }
}
