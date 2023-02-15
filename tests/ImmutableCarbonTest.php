<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Carbon\Carbon as MutableCarbon;
use ImmutableCarbon\Carbon as ImmutableCarbon;
use Carbon\CarbonInterval as MutableCarbonInterval;
use ImmutableCarbon\CarbonInterval as ImmutableCarbonInterval;

class ImmutableCarbonTest extends TestCase
{
    function test_proxies_isset()
    {
        $instance = new ImmutableCarbon();
        $this->assertTrue(isset($instance->day));

        $instance = new ImmutableCarbonInterval();
        $this->assertTrue(isset($instance->days));
    }

    function test_proxies_magic_get()
    {
        $instance = new ImmutableCarbon();
        $this->assertEquals(
            $instance->day,
            $instance->getMutableInstance()->day
        );

        $instance = new ImmutableCarbonInterval();
        $this->assertEquals(
            $instance->days,
            $instance->getMutableInstance()->days
        );
    }

    function test_proxies_static_methods_return_immutable_instance()
    {
        $instance = ImmutableCarbon::parse('2000-01-01 00:00:00');
        $this->assertInstanceOf(ImmutableCarbon::class, $instance);

        $instance = ImmutableCarbonInterval::create(1);
        $this->assertInstanceOf(ImmutableCarbonInterval::class, $instance);
    }

    function test_proxies_static_methods_pass_correct_data_to_mutable_method()
    {
        $expected = MutableCarbon::parse('2000-01-01 00:00:00');
        $instance = ImmutableCarbon::parse('2000-01-01 00:00:00');
        $this->assertEquals($expected, $instance->getMutableInstance());
        $this->assertInstanceOf(ImmutableCarbon::class, $instance);

        $expected = MutableCarbonInterval::create(1);
        $instance = ImmutableCarbonInterval::create(1);
        $this->assertEquals($expected, $instance->getMutableInstance());
        $this->assertInstanceOf(ImmutableCarbonInterval::class, $instance);
    }

    function test_mutable_method_call_does_not_change_instance()
    {
        $expected = ImmutableCarbon::parse('2000-01-01 00:00:00');
        $instance = ImmutableCarbon::parse('2000-01-01 00:00:00');
        $instance->addDay();
        $this->assertEquals($expected, $instance);

        $expected = ImmutableCarbonInterval::create(1);
        $instance = ImmutableCarbonInterval::create(1);
        $instance->weeksAndDays(1, 3);
        $this->assertEquals($expected, $instance);
    }

    function test_mutable_method_call_returns_changed_immutable_instance()
    {
        $expected = ImmutableCarbon::parse('2000-01-01 00:00:00');
        $instance = ImmutableCarbon::parse('2000-01-01 00:00:00')->addDay();
        $this->assertNotEquals($expected, $instance);
        $this->assertEquals(
            $instance->getMutableInstance(),
            MutableCarbon::parse('2000-01-02 00:00:00')
        );

        $expected = ImmutableCarbonInterval::create(1);
        $instance = ImmutableCarbonInterval::create(1)->weeksAndDays(1, 3);
        $this->assertNotEquals($expected, $instance);
        $this->assertEquals(
            $instance->getMutableInstance(),
            MutableCarbonInterval::create(1, 0, 1, 3)
        );
    }
}
