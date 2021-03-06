<?php

namespace Ivoz\Provider\Domain\Service\DestinationRateGroup;

use Ivoz\Core\Domain\Service\EntityPersisterInterface;
use Ivoz\Core\Infrastructure\Domain\Service\Gearman\Jobs\RatesImporter;
use Ivoz\Provider\Domain\Model\DestinationRateGroup\DestinationRateGroupInterface;

/**
 * Class SendImporterOrder
 *
 * @package namespace Ivoz\Cgr\Domain\Service\DestinationRateGroup
 * @lifecycle on_commit
 */
class SendImporterOrder implements DestinationRateGroupLifecycleEventHandlerInterface
{
    /**
     * @var RatesImporter
     */
    protected $importer;

    /**
     * @var EntityPersisterInterface
     */
    protected $entityPersister;

    /**
     * SendImporterOrder constructor.
     *
     * @param RatesImporter $importer
     * @param EntityPersisterInterface $entityPersister
     */
    public function __construct(
        RatesImporter $importer,
        EntityPersisterInterface $entityPersister
    ) {
        $this->importer = $importer;
        $this->entityPersister = $entityPersister;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            self::EVENT_ON_COMMIT => 10
        ];
    }

    /**
     * @param DestinationRateGroupInterface $entity
     */
    public function execute(DestinationRateGroupInterface $entity)
    {
        $pendingStatus = $entity->getStatus() === 'waiting';
        $statusHasChanged = $entity->hasChanged('status');

        if ($pendingStatus && $statusHasChanged) {
            $this->importer
                ->setParams(['id' => $entity->getId()])
                ->send();
        }
    }
}
