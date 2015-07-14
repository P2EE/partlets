<?php
namespace p2ee\Partlets;

use p2ee\Preparables\Requirement;

class PartletRequirement extends Requirement {

    protected $partletClass;

    protected $prefills = [];

    function __construct($key , $partletClass, $prefills = [], $required = self::MODE_REQUIRED) {
        $this->key = $key;
        $this->partletClass = $partletClass;
        $this->prefills = $prefills;
        $this->required = $required;
    }

    /**
     * @return mixed
     */
    public function getPartletClass() {
        return $this->partletClass;
    }

    /**
     * @return mixed
     */
    public function getPrefills() {
        return $this->prefills;
    }

    public function isCacheable() {
        return false;
    }

    public function getCacheKey() {
        return null;
    }
}
