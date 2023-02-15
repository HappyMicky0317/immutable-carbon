<?php

namespace ImmutableCarbon;

use Carbon\CarbonInterval as MutableCarbonInterval;

class CarbonInterval extends Immutable
{
    const MUTABLE_CLASS = MutableCarbonInterval::class;

    protected function copyInstance()
    {
        $class = static::MUTABLE_CLASS;

        return new $class(
            $this->instance->years,
            $this->instance->months,
            $this->instance->weeks,
            $this->instance->days,
            $this->instance->hours,
            $this->instance->minutes,
            $this->instance->seconds
        );
    }
}
