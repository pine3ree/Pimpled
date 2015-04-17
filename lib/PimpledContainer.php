<?php

/**
 * PimpledContainer
 *
 * @author maks feltrin - pine3ree <pine3ree(AT)gmail(DOT)com>
 */
class PimpledContainer extends Pimple\Container
{
    /**
     * @var WireData
     */
    protected $module;

    public function __construct(WireData $module, array $values = array())
    {
        parent::__construct($values);

        $this->module = $module;
    }

    public function set($key, $value)
    {
        $this->offsetSet($this->normalizeKey($key), $value);
    }

    public function get($key, $default = null)
    {
        $key = $this->normalizeKey($key);

        return $this->offsetExists($key) ? $this->offsetGet($key) : $default;
    }

    public function has($key)
    {
        return $this->offsetExists($this->normalizeKey($key));
    }

    public function wire($name, $value = null, $lock = false)
    {
        return $this->module->wire($name, $value, $lock);
    }

    public function __get($name)
    {
        return $this->get($name, $this->wire($name));
    }

    public function normalizeKey($key)
    {
        $key = trim($key);
        $key = preg_replace('/[^a-zA-Z0-9._]/', '.', $key);
        //$key = preg_replace('/([a-z])([A-Z])/', '$1_$2', $key);

        $key = strtolower($key);

        return $key;
    }
}
