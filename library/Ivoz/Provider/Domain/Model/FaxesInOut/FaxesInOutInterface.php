<?php

namespace Ivoz\Provider\Domain\Model\FaxesInOut;

use Ivoz\Core\Domain\Service\FileContainerInterface;
use Ivoz\Core\Domain\Model\LoggableEntityInterface;

interface FaxesInOutInterface extends FileContainerInterface, LoggableEntityInterface
{
    /**
     * @codeCoverageIgnore
     * @return array
     */
    public function getChangeSet();

    /**
     * @return array
     */
    public function getFileObjects();

    /**
     * Set calldate
     *
     * @param \DateTime $calldate
     *
     * @return self
     */
    public function setCalldate($calldate);

    /**
     * Get the numberValue in E.164 format when routing to 'number'
     *
     * @return string
     */
    public function getDstE164();

    /**
     * Get calldate
     *
     * @return \DateTime
     */
    public function getCalldate();

    /**
     * @deprecated
     * Set src
     *
     * @param string $src
     *
     * @return self
     */
    public function setSrc($src = null);

    /**
     * Get src
     *
     * @return string
     */
    public function getSrc();

    /**
     * @deprecated
     * Set dst
     *
     * @param string $dst
     *
     * @return self
     */
    public function setDst($dst = null);

    /**
     * Get dst
     *
     * @return string
     */
    public function getDst();

    /**
     * @deprecated
     * Set type
     *
     * @param string $type
     *
     * @return self
     */
    public function setType($type = null);

    /**
     * Get type
     *
     * @return string
     */
    public function getType();

    /**
     * @deprecated
     * Set pages
     *
     * @param string $pages
     *
     * @return self
     */
    public function setPages($pages = null);

    /**
     * Get pages
     *
     * @return string
     */
    public function getPages();

    /**
     * @deprecated
     * Set status
     *
     * @param string $status
     *
     * @return self
     */
    public function setStatus($status = null);

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus();

    /**
     * Set fax
     *
     * @param \Ivoz\Provider\Domain\Model\Fax\FaxInterface $fax
     *
     * @return self
     */
    public function setFax(\Ivoz\Provider\Domain\Model\Fax\FaxInterface $fax);

    /**
     * Get fax
     *
     * @return \Ivoz\Provider\Domain\Model\Fax\FaxInterface
     */
    public function getFax();

    /**
     * Set dstCountry
     *
     * @param \Ivoz\Provider\Domain\Model\Country\CountryInterface $dstCountry
     *
     * @return self
     */
    public function setDstCountry(\Ivoz\Provider\Domain\Model\Country\CountryInterface $dstCountry = null);

    /**
     * Get dstCountry
     *
     * @return \Ivoz\Provider\Domain\Model\Country\CountryInterface
     */
    public function getDstCountry();

    /**
     * Set file
     *
     * @param \Ivoz\Provider\Domain\Model\FaxesInOut\File $file
     *
     * @return self
     */
    public function setFile(\Ivoz\Provider\Domain\Model\FaxesInOut\File $file);

    /**
     * Get file
     *
     * @return \Ivoz\Provider\Domain\Model\FaxesInOut\File
     */
    public function getFile();

    /**
     * @param $fldName
     * @param TempFile $file
     */
    public function addTmpFile($fldName, \Ivoz\Core\Domain\Service\TempFile $file);

    /**
     * @param TempFile $file
     * @throws \Exception
     */
    public function removeTmpFile(\Ivoz\Core\Domain\Service\TempFile $file);

    /**
     * @return TempFile[]
     */
    public function getTempFiles();

    /**
     * @var string $fldName
     * @return null | TempFile
     */
    public function getTempFileByFieldName($fldName);
}
