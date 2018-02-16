<?php

namespace Agi\Action;
use Agi\ChannelInfo;
use Agi\Wrapper;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @class ExternalRetailCallAction
 *
 * @brief Manage outgoing external calls generated by a retail account
 *
 */
class ExternalRetailCallAction extends ExternalCallAction
{
    /**
     * Destination number in E.164 format
     *
     * @var string
     */
    protected $number;

    /**
     * ExternalRetailCallAction constructor.
     *
     * @param Wrapper $agi
     * @param ChannelInfo $channelInfo
     * @param EntityManagerInterface $em
     */
    public function __construct(
        Wrapper $agi,
        ChannelInfo $channelInfo,
        EntityManagerInterface $em
    )
    {
        parent::__construct($agi, $channelInfo, $em);
    }

    /**
     * @param string|null $number
     * @return $this
     */
    public function setDestination(string $number = null)
    {
        $this->number = $number;
        return $this;
    }

    public function process()
    {
        /** @var \Ivoz\Provider\Domain\Model\RetailAccount\RetailAccountInterface $retail */
        $retail = $this->channelInfo->getChannelCaller();
        $number = $this->number;

        // Check if the diversion header contains a valid number
        if ($this->agi->getRedirecting('count')) {
            $diversionNum = $this->agi->getRedirecting('from-num');
            $ddi = $retail->getDDI($diversionNum);
            if (empty($ddi)) {
                // Not a Retail Account DDI. Remove it.
                $this->agi->error("Removing invalid diversion header from %s", $diversionNum);
                $this->agi->setRedirecting('count', 0);
            } else {
                $this->agi->verbose("Allowing valid diversion header from %s", $diversionNum);
            }
        } else {
            // Allow identification from any Retail Account DDI
            $callerIdNum = $this->agi->getCallerIdNum();
            $ddi = $retail->getDDI($callerIdNum);

            if (!empty($ddi)) {
                $this->agi->notice("Account %s presented origin matches account DDI %s", $retail, $ddi);
            }
        }

        // Update caller displayed number
        if (!isset($ddi)) {
            $ddi = $retail->getOutgoingDDI();
            if ($ddi) {
                $callerIdNum = $this->agi->getCallerIdNum();
                $this->agi->notice("Using fallback DDI %s for retail %s because %s does not match any DDI.",$ddi, $retail, $callerIdNum);
                $this->agi->setCallerIdNum($ddi->getDdie164());
            } else {
                $this->agi->error("Retail Account %s has not OutgoingDDI configured", $retail);
                $this->agi->decline();
                return;
            }
        }

        // Check if DDI has recordings enabled
        $this->checkDDIRecording($ddi);
        // Check if DDI belong to platform
        $this->checkDDIBounced($number);

        // Call the PSJIP endpoint
        $this->agi->setVariable("DIAL_DST", "PJSIP/" . $number . '@proxytrunks');
        $this->agi->setVariable("DIAL_OPTS", "");
        $this->agi->setVariable("DIAL_TIMEOUT", "");
        $this->agi->redirect('call-retail', $number);
    }
}
