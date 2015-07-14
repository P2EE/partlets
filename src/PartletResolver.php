<?php
namespace p2ee\Partlets;

use p2ee\Preparables\Preparer;
use p2ee\Preparables\Requirement;
use p2ee\Preparables\Resolver;
use rg\injektor\DependencyInjectionContainer;

/**
 * @service
 */
class PartletResolver implements Resolver {

    /**
     * @var \rg\injektor\DependencyInjectionContainer
     */
    protected $dic;

    /**
     * @inject
     * @param DependencyInjectionContainer $dic
     */
    public function __construct(DependencyInjectionContainer $dic) {
        $this->dic = $dic;
    }

    /**
     * @param Requirement $requirement
     * @throws \Exception
     * @return Partlet
     */
    public function resolve(Requirement $requirement) {
        if (!($requirement instanceof PartletRequirement)) {
            throw new \Exception('invalid requirement type for PartletResolver');
        }

        /** @var Partlet $partlet */
        $partlet = $this->dic->getInstanceOfClass($requirement->getPartletClass());
        if (!($partlet instanceof Partlet)) {
            throw new \Exception('given class is not a Partlet');
        }
        return $partlet;
    }

    /**
     * @return string
     */
    public function getSupportedType() {
        return PartletRequirement::class;
    }
}
