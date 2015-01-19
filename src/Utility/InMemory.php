<?php
namespace Qiscus\Utility;

/**
 * Simulate storage in memory
 */
class InMemory
{
    /**
     * key value based
     */
    private $map = [];

    /**
     * sequences values
     */
    private $list = [];

    /**
     * save key and their values
     * on map
     *
     * @return void
     */
    public function onMap($key, $value)
    {
        $this->map[$key] = $value;
    }   

    /**
     * check if given $key was saved in map
     *
     * @return boolean
     */
    public function inMap($key)
    {
        return array_key_exists($key, $this->map);
    } 

    /**
     * return value based on given $key
     * parameter
     */
    public function fromMap($key)
    {
        if ($this->inMap($key)) {
            return $this->map[$key];
        } else {
            return null;
        }
    }

    /**
     * remove data from map collection
     *
     * @return void
     */
    public function removeFromMap($key)
    {
        unset($this->map[$key]);
    }

    /**
     * save $value into a collection of values
     *
     * @return void
     */
    public function onList($value)
    {
        $this->list[] = $value;
    }

    /**
     * check if given $value
     * was existed inside list collectoins
     *
     * @return boolean
     */
    public function inList($value)
    {
        return in_array($value, $this->list);
    }

    /**
     * remove data from list collection
     *
     * @return void
     */
    public function removeFromList($value)
    {
        /*
         * filtering each value inside list collection
         * compare with given $value parameter         
         * only return a value that doesn't same
         * with $value
         */
        $filter = function($list) use($value) {
            return $list != $value;
        };

        $this->list = array_filter($this->list, $filter);
    }
}
