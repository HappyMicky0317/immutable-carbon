<?php

namespace ImmutableCarbon;

use Carbon\Carbon as MutableCarbon;

class Carbon extends Immutable
{
    const MUTABLE_CLASS = MutableCarbon::class;

    protected function copyInstance()
    {
        return $this->instance->copy();
    }
}
