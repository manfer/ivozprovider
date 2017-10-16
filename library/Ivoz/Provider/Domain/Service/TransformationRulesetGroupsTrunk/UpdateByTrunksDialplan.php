<?php

namespace Ivoz\Provider\Domain\Service\TransformationRulesetGroupsTrunk;

use Ivoz\Kam\Domain\Model\TrunksDialplan\TrunksDialplanInterface;
use Ivoz\Kam\Domain\Service\TrunksDialplan\TrunksDialplanLifecycleEventHandlerInterface;
use Ivoz\Core\Domain\Service\EntityPersisterInterface;

class UpdateByTrunksDialplan implements TrunksDialplanLifecycleEventHandlerInterface
{
    /**
     * @var EntityPersisterInterface
     */
    protected $entityPersister;

    public function __construct(
        EntityPersisterInterface $entityPersister
    ) {
        $this->entityPersister = $entityPersister;
    }

    public function execute(TrunksDialplanInterface $entity)
    {
        $parentField = $entity->getParentReferenceField();
        if (is_null($parentField)) {
            return;
        }

        $setter =  'set' . ucFirst($parentField);
        $transformationRulesetGroupsTrunk = $entity->getTransformationRulesetGroupsTrunk();
        $dpid = $entity->getDpid();
        $transformationRulesetGroupsTrunk->{$setter}(
            $dpid
        );

        $this->entityPersister->persist(
            $transformationRulesetGroupsTrunk,
            true
        );
    }
}