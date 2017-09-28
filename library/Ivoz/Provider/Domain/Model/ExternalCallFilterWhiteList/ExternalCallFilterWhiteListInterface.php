<?php

namespace Ivoz\Provider\Domain\Model\ExternalCallFilterWhiteList;

use Ivoz\Core\Domain\Model\EntityInterface;

interface ExternalCallFilterWhiteListInterface extends EntityInterface
{
    /**
     * Set filter
     *
     * @param \Ivoz\Provider\Domain\Model\ExternalCallFilter\ExternalCallFilterInterface $filter
     *
     * @return self
     */
    public function setFilter(\Ivoz\Provider\Domain\Model\ExternalCallFilter\ExternalCallFilterInterface $filter = null);

    /**
     * Get filter
     *
     * @return \Ivoz\Provider\Domain\Model\ExternalCallFilter\ExternalCallFilterInterface
     */
    public function getFilter();

    /**
     * Set matchlist
     *
     * @param \Ivoz\Provider\Domain\Model\MatchList\MatchListInterface $matchlist
     *
     * @return self
     */
    public function setMatchlist(\Ivoz\Provider\Domain\Model\MatchList\MatchListInterface $matchlist);

    /**
     * Get matchlist
     *
     * @return \Ivoz\Provider\Domain\Model\MatchList\MatchListInterface
     */
    public function getMatchlist();

}
