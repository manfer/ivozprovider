<?php

namespace Ivoz\Provider\Domain\Model\User;
use Ivoz\Provider\Domain\Model\PickUpRelUser\PickUpRelUserInterface;

/**
 * User
 */
class User extends UserAbstract implements UserInterface
{
    use UserTrait;

    /**
     * @return array
     */
    public function getChangeSet()
    {
        $changeSet = parent::getChangeSet();
        if (isset($changeSet['pass'])) {
            $changeSet['pass'] = '****';
        }

        return $changeSet;
    }

    /**
     * Get id
     * @codeCoverageIgnore
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * return associated endpoint with the user
     *
     * @return \Ivoz\Ast\Domain\Model\PsEndpoint\PsEndpointInterface
     */
    public function getEndpoint()
    {
        $terminal = $this->getTerminal();
        if (!$terminal) {
            return null;
        }

        $endpoints = $terminal->getAstPsEndpoints();
        return array_shift($endpoints);
    }

    /**
     * @return string or null
     */
    public function getUserTerminalInterface()
    {
        $terminal = $this->getTerminal();
        if (empty($terminal)) {
            return null;
        }

        return $terminal->getName();
    }

    /**
     * @return string with the voicemail
     */
    public function getVoiceMail()
    {
        if (!is_null($this->getVoiceMailUser())) {

            return sprintf("%s@%s",
                $this->getVoiceMailUser(),
                $this->getVoiceMailContext()
            );
        }

        return '';
    }

    /**
     * @return string with the voicemail user
     */
    public function getVoiceMailUser()
    {
        return $this->getExtensionNumber();
    }

    /**
     * @return string with the voicemail context
     */
    public function getVoiceMailContext()
    {
        return
            'company'
            . $this->getCompany()->getId();
    }

    /**
     * @return string
     */
    public function getOutgoingDdiNumber()
    {
        $ddi = $this->getOutgoingDdi();
        if ($ddi) {

            return $ddi->getDdiE164();
        }

        return null;
    }


    /**
     * Get User outgoingDdi
     * If no Ddi is assigned, retrieve company's default Ddi
     * @return \Ivoz\Provider\Domain\Model\Ddi\DdiInterface
     */
    public function getOutgoingDdi()
    {
        $ddi = parent::getOutgoingDdi();
        if ($ddi) {

            return $ddi;
        }

        return $this
            ->getCompany()
            ->getOutgoingDdi();
    }

    /**
     * Get User outgoingDdiRule
     * If no OutgoingDdiRule is assigned, retrieve company's default OutgoingDdiRule
     * @return \Ivoz\Provider\Domain\Model\OutgoingDdiRule\OutgoingDdiRuleInterface or null
     */
    public function getOutgoingDdiRule()
    {
        $outgoingDdiRule = parent::getOutgoingDdiRule();
        if ($outgoingDdiRule) {

            return $outgoingDdiRule;
        }

        return $this
            ->getCompany()
            ->getOutgoingDdiRule();
    }


    /**
     * @return string
     */
    public function getExtensionNumber()
    {
        $extension = $this->getExtension();
        if ($extension) {

            return $extension
                ->getNumber();
        }

        return '';
    }

    /**
     * @param string $exten
     * @return bool canCall
     */
    public function isAllowedToCall($exten)
    {
        $callAcl = $this->getCallAcl();
        if (empty($callAcl)) {

            return true;
        }

        return $callAcl
            ->dstIsCallable($exten);
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\PickUpGroup\PickUpGroupInterface[]
     */
    public function getPickUpGroups()
    {
        $pickUpGroups = array();

        /**
         * @var PickUpRelUserInterface[] $pickUpRelUsers
         */
        $pickUpRelUsers = $this->getPickUpRelUsers();
        if (!empty($pickUpRelUsers)) {

            foreach ($pickUpRelUsers as $key => $pickUpRelUser) {

                $pickUpGroups[$key] = $pickUpRelUser->getPickUpGroup();
            }
        }

        return $pickUpGroups;
    }

    /**
     * @return string comma separated pickup group ids
     */
    public function getPickUpGroupsIds()
    {
        $pickUpGroupIds = array();

        /**
         * @var PickUpRelUserInterface[] $pickUpRelUsers
         */
        $pickUpRelUsers = $this->getPickUpRelUsers();
        if (!empty($pickUpRelUsers)) {
            foreach ($pickUpRelUsers as $pickUpRel) {
                array_push($pickUpGroupIds, $pickUpRel->getPickUpGroup()->getId());
            }
        }

        return join(',', $pickUpGroupIds);
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return
            $this->getName()
            . ' '
            . $this->getLastname();
    }

    /**
     * @return array
     */
    public function toArrayPortalForm()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getFullName()
        ];
    }

    /**
     * @return bool
     */
    public function canBeCalled()
    {
        // Check if user is valid to be called
        if (!$this->getActive()) {
            return false;
        }

        // Check if user has terminal configured
        if (empty($this->getTerminal())) {
            return false;
        }

        // Check if user has extension configured
        if (empty($this->getExtension())) {
            return false;
        }

        // Looks like a complete user
        return true;
    }

    /**
     * Get user language
     * returns company language if wmpty
     * @return \Ivoz\Provider\Domain\Model\Language\LanguageInterface
     */
    public function getLanguage()
    {
        $language = parent::getLanguage();
        if ($language) {

            return $language;
        }

        return $this->getCompany()->getLanguage();
    }

    /**
     * Get User language code.
     * If not set, get the company language code
     * @return string
     */
    public function getLanguageCode()
    {
        return $this
            ->getLanguage()
            ->getIden();
    }

}
