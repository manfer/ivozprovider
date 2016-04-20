<?php

/**
 * Application Model
 *
 * @package IvozProvider\Model\Raw
 * @subpackage Model
 * @author Luis Felipe Garcia
 * @copyright ZF model generator
 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */

/**
 * [entity]
 *
 * @package IvozProvider\Model
 * @subpackage Model
 * @author Luis Felipe Garcia
 */

namespace IvozProvider\Model\Raw;
class LcrRules extends ModelAbstract
{


    /**
     * Database var type int
     *
     * @var int
     */
    protected $_id;

    /**
     * Database var type int
     *
     * @var int
     */
    protected $_brandId;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_prefix;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_fromUri;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_requestUri;

    /**
     * Database var type int
     *
     * @var int
     */
    protected $_stopper;

    /**
     * Database var type int
     *
     * @var int
     */
    protected $_enabled;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_tag;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_description;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_targetPatternId;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_outgoingRoutingId;


    /**
     * Parent relation LcrRules_ibfk_3
     *
     * @var \IvozProvider\Model\Raw\OutgoingRouting
     */
    protected $_OutgoingRouting;

    /**
     * Parent relation LcrRules_ibfk_1
     *
     * @var \IvozProvider\Model\Raw\Brands
     */
    protected $_Brand;

    /**
     * Parent relation LcrRules_ibfk_2
     *
     * @var \IvozProvider\Model\Raw\TargetPatterns
     */
    protected $_TargetPattern;


    /**
     * Dependent relation LcrRuleTarget_ibfk_4
     * Type: One-to-Many relationship
     *
     * @var \IvozProvider\Model\Raw\LcrRuleTarget[]
     */
    protected $_LcrRuleTarget;

    protected $_columnsList = array(
        'id'=>'id',
        'brandId'=>'brandId',
        'prefix'=>'prefix',
        'from_uri'=>'fromUri',
        'request_uri'=>'requestUri',
        'stopper'=>'stopper',
        'enabled'=>'enabled',
        'tag'=>'tag',
        'description'=>'description',
        'targetPatternId'=>'targetPatternId',
        'outgoingRoutingId'=>'outgoingRoutingId',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('es', 'en'));

        $this->setParentList(array(
            'LcrRulesIbfk3'=> array(
                    'property' => 'OutgoingRouting',
                    'table_name' => 'OutgoingRouting',
                ),
            'LcrRulesIbfk1'=> array(
                    'property' => 'Brand',
                    'table_name' => 'Brands',
                ),
            'LcrRulesIbfk2'=> array(
                    'property' => 'TargetPattern',
                    'table_name' => 'TargetPatterns',
                ),
        ));

        $this->setDependentList(array(
            'LcrRuleTargetIbfk4' => array(
                    'property' => 'LcrRuleTarget',
                    'table_name' => 'LcrRuleTarget',
                ),
        ));

        $this->setOnDeleteCascadeRelationships(array(
            'LcrRuleTarget_ibfk_4'
        ));



        $this->_defaultValues = array(
            'stopper' => '0',
            'enabled' => '1',
            'description' => '',
        );

        $this->_initFileObjects();
        parent::__construct();
    }

    /**
     * This method is called just after parent's constructor
     */
    public function init()
    {
    }
    /**************************************************************************
    ************************** File System Object (FSO)************************
    ***************************************************************************/

    protected function _initFileObjects()
    {

        return $this;
    }

    public function getFileObjects()
    {

        return array();
    }


    /**************************************************************************
    *********************************** /FSO ***********************************
    ***************************************************************************/

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \IvozProvider\Model\Raw\LcrRules
     */
    public function setId($data)
    {

        if ($this->_id != $data) {
            $this->_logChange('id');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_id = $data;

        } else if (!is_null($data)) {
            $this->_id = (int) $data;

        } else {
            $this->_id = $data;
        }
        return $this;
    }

    /**
     * Gets column id
     *
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \IvozProvider\Model\Raw\LcrRules
     */
    public function setBrandId($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_brandId != $data) {
            $this->_logChange('brandId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_brandId = $data;

        } else if (!is_null($data)) {
            $this->_brandId = (int) $data;

        } else {
            $this->_brandId = $data;
        }
        return $this;
    }

    /**
     * Gets column brandId
     *
     * @return int
     */
    public function getBrandId()
    {
        return $this->_brandId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \IvozProvider\Model\Raw\LcrRules
     */
    public function setPrefix($data)
    {

        if ($this->_prefix != $data) {
            $this->_logChange('prefix');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_prefix = $data;

        } else if (!is_null($data)) {
            $this->_prefix = (string) $data;

        } else {
            $this->_prefix = $data;
        }
        return $this;
    }

    /**
     * Gets column prefix
     *
     * @return string
     */
    public function getPrefix()
    {
        return $this->_prefix;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \IvozProvider\Model\Raw\LcrRules
     */
    public function setFromUri($data)
    {

        if ($this->_fromUri != $data) {
            $this->_logChange('fromUri');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_fromUri = $data;

        } else if (!is_null($data)) {
            $this->_fromUri = (string) $data;

        } else {
            $this->_fromUri = $data;
        }
        return $this;
    }

    /**
     * Gets column from_uri
     *
     * @return string
     */
    public function getFromUri()
    {
        return $this->_fromUri;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \IvozProvider\Model\Raw\LcrRules
     */
    public function setRequestUri($data)
    {

        if ($this->_requestUri != $data) {
            $this->_logChange('requestUri');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_requestUri = $data;

        } else if (!is_null($data)) {
            $this->_requestUri = (string) $data;

        } else {
            $this->_requestUri = $data;
        }
        return $this;
    }

    /**
     * Gets column request_uri
     *
     * @return string
     */
    public function getRequestUri()
    {
        return $this->_requestUri;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \IvozProvider\Model\Raw\LcrRules
     */
    public function setStopper($data)
    {

        if ($this->_stopper != $data) {
            $this->_logChange('stopper');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_stopper = $data;

        } else if (!is_null($data)) {
            $this->_stopper = (int) $data;

        } else {
            $this->_stopper = $data;
        }
        return $this;
    }

    /**
     * Gets column stopper
     *
     * @return int
     */
    public function getStopper()
    {
        return $this->_stopper;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \IvozProvider\Model\Raw\LcrRules
     */
    public function setEnabled($data)
    {

        if ($this->_enabled != $data) {
            $this->_logChange('enabled');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_enabled = $data;

        } else if (!is_null($data)) {
            $this->_enabled = (int) $data;

        } else {
            $this->_enabled = $data;
        }
        return $this;
    }

    /**
     * Gets column enabled
     *
     * @return int
     */
    public function getEnabled()
    {
        return $this->_enabled;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \IvozProvider\Model\Raw\LcrRules
     */
    public function setTag($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_tag != $data) {
            $this->_logChange('tag');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_tag = $data;

        } else if (!is_null($data)) {
            $this->_tag = (string) $data;

        } else {
            $this->_tag = $data;
        }
        return $this;
    }

    /**
     * Gets column tag
     *
     * @return string
     */
    public function getTag()
    {
        return $this->_tag;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \IvozProvider\Model\Raw\LcrRules
     */
    public function setDescription($data)
    {

        if ($this->_description != $data) {
            $this->_logChange('description');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_description = $data;

        } else if (!is_null($data)) {
            $this->_description = (string) $data;

        } else {
            $this->_description = $data;
        }
        return $this;
    }

    /**
     * Gets column description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \IvozProvider\Model\Raw\LcrRules
     */
    public function setTargetPatternId($data)
    {

        if ($this->_targetPatternId != $data) {
            $this->_logChange('targetPatternId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_targetPatternId = $data;

        } else if (!is_null($data)) {
            $this->_targetPatternId = (int) $data;

        } else {
            $this->_targetPatternId = $data;
        }
        return $this;
    }

    /**
     * Gets column targetPatternId
     *
     * @return int
     */
    public function getTargetPatternId()
    {
        return $this->_targetPatternId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \IvozProvider\Model\Raw\LcrRules
     */
    public function setOutgoingRoutingId($data)
    {

        if ($this->_outgoingRoutingId != $data) {
            $this->_logChange('outgoingRoutingId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_outgoingRoutingId = $data;

        } else if (!is_null($data)) {
            $this->_outgoingRoutingId = (int) $data;

        } else {
            $this->_outgoingRoutingId = $data;
        }
        return $this;
    }

    /**
     * Gets column outgoingRoutingId
     *
     * @return int
     */
    public function getOutgoingRoutingId()
    {
        return $this->_outgoingRoutingId;
    }

    /**
     * Sets parent relation OutgoingRouting
     *
     * @param \IvozProvider\Model\Raw\OutgoingRouting $data
     * @return \IvozProvider\Model\Raw\LcrRules
     */
    public function setOutgoingRouting(\IvozProvider\Model\Raw\OutgoingRouting $data)
    {
        $this->_OutgoingRouting = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setOutgoingRoutingId($primaryKey);
        }

        $this->_setLoaded('LcrRulesIbfk3');
        return $this;
    }

    /**
     * Gets parent OutgoingRouting
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \IvozProvider\Model\Raw\OutgoingRouting
     */
    public function getOutgoingRouting($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'LcrRulesIbfk3';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_OutgoingRouting = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_OutgoingRouting;
    }

    /**
     * Sets parent relation Brand
     *
     * @param \IvozProvider\Model\Raw\Brands $data
     * @return \IvozProvider\Model\Raw\LcrRules
     */
    public function setBrand(\IvozProvider\Model\Raw\Brands $data)
    {
        $this->_Brand = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setBrandId($primaryKey);
        }

        $this->_setLoaded('LcrRulesIbfk1');
        return $this;
    }

    /**
     * Gets parent Brand
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \IvozProvider\Model\Raw\Brands
     */
    public function getBrand($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'LcrRulesIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Brand = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_Brand;
    }

    /**
     * Sets parent relation TargetPattern
     *
     * @param \IvozProvider\Model\Raw\TargetPatterns $data
     * @return \IvozProvider\Model\Raw\LcrRules
     */
    public function setTargetPattern(\IvozProvider\Model\Raw\TargetPatterns $data)
    {
        $this->_TargetPattern = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setTargetPatternId($primaryKey);
        }

        $this->_setLoaded('LcrRulesIbfk2');
        return $this;
    }

    /**
     * Gets parent TargetPattern
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \IvozProvider\Model\Raw\TargetPatterns
     */
    public function getTargetPattern($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'LcrRulesIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_TargetPattern = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_TargetPattern;
    }

    /**
     * Sets dependent relations LcrRuleTarget_ibfk_4
     *
     * @param array $data An array of \IvozProvider\Model\Raw\LcrRuleTarget
     * @return \IvozProvider\Model\Raw\LcrRules
     */
    public function setLcrRuleTarget(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_LcrRuleTarget === null) {

                $this->getLcrRuleTarget();
            }

            $oldRelations = $this->_LcrRuleTarget;

            if (is_array($oldRelations)) {

                $dataPKs = array();

                foreach ($data as $newItem) {

                    $pk = $newItem->getPrimaryKey();
                    if (!empty($pk)) {
                        $dataPKs[] = $pk;
                    }
                }

                foreach ($oldRelations as $oldItem) {

                    if (!in_array($oldItem->getPrimaryKey(), $dataPKs)) {

                        $this->_orphans[] = $oldItem;
                    }
                }
            }
        }

        $this->_LcrRuleTarget = array();

        foreach ($data as $object) {
            $this->addLcrRuleTarget($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations LcrRuleTarget_ibfk_4
     *
     * @param \IvozProvider\Model\Raw\LcrRuleTarget $data
     * @return \IvozProvider\Model\Raw\LcrRules
     */
    public function addLcrRuleTarget(\IvozProvider\Model\Raw\LcrRuleTarget $data)
    {
        $this->_LcrRuleTarget[] = $data;
        $this->_setLoaded('LcrRuleTargetIbfk4');
        return $this;
    }

    /**
     * Gets dependent LcrRuleTarget_ibfk_4
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \IvozProvider\Model\Raw\LcrRuleTarget
     */
    public function getLcrRuleTarget($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'LcrRuleTargetIbfk4';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_LcrRuleTarget = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_LcrRuleTarget;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return IvozProvider\Mapper\Sql\LcrRules
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\IvozProvider\Mapper\Sql\LcrRules')) {

                $this->setMapper(new \IvozProvider\Mapper\Sql\LcrRules);

            } else {

                 new \Exception("Not a valid mapper class found");
            }

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(false);
        }

        return $this->_mapper;
    }

    /**
     * Returns the validator class for this model
     *
     * @return null | \IvozProvider\Model\Validator\LcrRules
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\IvozProvider\\Validator\LcrRules')) {

                $this->setValidator(new \IvozProvider\Validator\LcrRules);
            }
        }

        return $this->_validator;
    }

    public function setFromArray($data)
    {
        return $this->getMapper()->loadModel($data, $this);
    }

    /**
     * Deletes current row by deleting the row that matches the primary key
     *
     * @see \Mapper\Sql\LcrRules::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        if ($this->getId() === null) {
            $this->_logger->log('The value for Id cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'id = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getId())
        );
    }

    public function mustUpdateEtag()
    {
        return true;
    }

}