<?php

namespace ImmutableCarbon;

abstract class Immutable
{
    protected $instance;

    const MUTABLE_CLASS = '';

    public function __construct(...$arguments)
    {
        $instance = $arguments[0] ?? null;

        if (static::isMutableClass($instance)) {
            $this->instance = $instance;
            return;
        }

        $class = static::MUTABLE_CLASS;
        $this->instance = new $class(...$arguments);
    }

    public static function __callStatic($method, $arguments)
    {
        $class = static::MUTABLE_CLASS;

        return static::parseReturnValue(
            $class::{$method}(...$arguments)
        );
    }

    public function __call($method, $arguments)
    {
        return static::parseReturnValue(
            $this->copyInstance()->{$method}(...$arguments)
        );
    }

    public function __get($property)
    {
        return static::parseReturnValue(
            $this->copyInstance()->{$property}
        );
    }

    public function __isset($name)
    {
        return isset($this->instance->{$name});
    }

    public function __toString()
    {
        return (string) $this->instance;
    }

    public function getMutableInstance()
    {
        return $this->instance;
    }

    protected static function parseReturnValue($value)
    {
        if (static::isMutableClass($value)) {
            return new static($value);
        }

        return $value;
    }

    protected static function isMutableClass($instance)
    {
        $class = static::MUTABLE_CLASS;

        return $instance instanceof $class;
    }

    abstract protected function copyInstance();
}
