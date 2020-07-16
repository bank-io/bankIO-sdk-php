<?php
/**
 * StandingOrderDetails
 *
 * PHP version 7.2
 *
 * @category Class
 * @package  BankIO\Sdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * bankIO NextGenPSD2 XS2A Framework
 *
 * # Summary The **NextGenPSD2** *Framework Version 1.3.6* (with errata) offers a modern, open, harmonised and interoperable set of Application Programming Interfaces (APIs) as the safest and most efficient way to provide data securely. The NextGenPSD2 Framework reduces XS2A complexity and costs, addresses the problem of multiple competing standards  in Europe and, aligned with the goals of the Euro Retail Payments Board, enables European banking customers to benefit from innovative products and services ('Banking as a Service') by granting TPPs safe and secure (authenticated and authorised) access to their bank accounts and financial data.  The possible Approaches are:   * Redirect SCA Approach   * OAuth SCA Approach   * Decoupled SCA Approach   * Embedded SCA Approach without SCA method   * Embedded SCA Approach with only one SCA method available   * Embedded SCA Approach with Selection of a SCA method    Not every message defined in this API definition is necessary for all approaches.    Furthermore this API definition does not differ between methods which are mandatory, conditional, or optional.   Therefore for a particular implementation of a Berlin Group PSD2 compliant API it is only necessary to support    a certain subset of the methods defined in this API definition.    **Please have a look at the implementation guidelines if you are not sure    which message has to be used for the approach you are going to use.**  ## Some General Remarks Related to this version of the OpenAPI Specification: * **This API definition is based on the Implementation Guidelines of the Berlin Group PSD2 API.**    It is not a replacement in any sense.   The main specification is (at the moment) always the Implementation Guidelines of the Berlin Group PSD2 API. * **This API definition contains the REST-API for requests from the PISP to the ASPSP.** * **This API definition contains the messages for all different approaches defined in the Implementation Guidelines.** * According to the OpenAPI-Specification [https://github.com/OAI/OpenAPI-Specification/blob/master/versions/3.0.1.md]        \"If in is \"header\" and the name field is \"Accept\", \"Content-Type\" or \"Authorization\", the parameter definition SHALL be ignored.\"      The element \"Accept\" will not be defined in this file at any place.      The elements \"Content-Type\" and \"Authorization\" are implicitly defined by the OpenApi tags \"content\" and \"security\".    * There are several predefined types which might occur in payment initiation messages,    but are not used in the standard JSON messages in the Implementation Guidelines.   Therefore they are not used in the corresponding messages in this file either.   We added them for the convenience of the user.   If there is a payment product, which needs these fields, one can easily use the predefined types.   But the ASPSP need not to accept them in general.    * **We omit the definition of all standard HTTP header elements (mandatory/optional/conditional)    except they are mentioned in the Implementation Guidelines.**   Therefore the implementer might add these in his own realisation of a PSD2 comlient API in addition to the elements defined in this file.     ## General Remarks on Data Types  The Berlin Group definition of UTF-8 strings in context of the PSD2 API has to support at least the following characters  a b c d e f g h i j k l m n o p q r s t u v w x y z  A B C D E F G H I J K L M N O P Q R S T U V W X Y Z  0 1 2 3 4 5 6 7 8 9  / - ? : ( ) . , ' +  Space
 *
 * The version of the OpenAPI document: 1.3.6_2020-05-28
 * Contact: info@berlin-group.org
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.0.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace BankIO\Sdk\Model;

use \ArrayAccess;
use \BankIO\Sdk\ObjectSerializer;

/**
 * StandingOrderDetails Class Doc Comment
 *
 * @category Class
 * @description Details of underlying standing orders.
 * @package  BankIO\Sdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class StandingOrderDetails implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'standingOrderDetails';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'start_date' => '\DateTime',
        'frequency' => '\BankIO\Sdk\Model\FrequencyCode',
        'end_date' => '\DateTime',
        'execution_rule' => '\BankIO\Sdk\Model\ExecutionRule',
        'within_a_month_flag' => 'bool',
        'months_of_execution' => 'string[]',
        'multiplicator' => 'int',
        'day_of_execution' => '\BankIO\Sdk\Model\DayOfExecution',
        'limit_amount' => '\BankIO\Sdk\Model\Amount'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'start_date' => 'date',
        'frequency' => null,
        'end_date' => 'date',
        'execution_rule' => null,
        'within_a_month_flag' => null,
        'months_of_execution' => null,
        'multiplicator' => null,
        'day_of_execution' => null,
        'limit_amount' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'start_date' => 'startDate',
        'frequency' => 'frequency',
        'end_date' => 'endDate',
        'execution_rule' => 'executionRule',
        'within_a_month_flag' => 'withinAMonthFlag',
        'months_of_execution' => 'monthsOfExecution',
        'multiplicator' => 'multiplicator',
        'day_of_execution' => 'dayOfExecution',
        'limit_amount' => 'limitAmount'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'start_date' => 'setStartDate',
        'frequency' => 'setFrequency',
        'end_date' => 'setEndDate',
        'execution_rule' => 'setExecutionRule',
        'within_a_month_flag' => 'setWithinAMonthFlag',
        'months_of_execution' => 'setMonthsOfExecution',
        'multiplicator' => 'setMultiplicator',
        'day_of_execution' => 'setDayOfExecution',
        'limit_amount' => 'setLimitAmount'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'start_date' => 'getStartDate',
        'frequency' => 'getFrequency',
        'end_date' => 'getEndDate',
        'execution_rule' => 'getExecutionRule',
        'within_a_month_flag' => 'getWithinAMonthFlag',
        'months_of_execution' => 'getMonthsOfExecution',
        'multiplicator' => 'getMultiplicator',
        'day_of_execution' => 'getDayOfExecution',
        'limit_amount' => 'getLimitAmount'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    const MONTHS_OF_EXECUTION__1 = '1';
    const MONTHS_OF_EXECUTION__2 = '2';
    const MONTHS_OF_EXECUTION__3 = '3';
    const MONTHS_OF_EXECUTION__4 = '4';
    const MONTHS_OF_EXECUTION__5 = '5';
    const MONTHS_OF_EXECUTION__6 = '6';
    const MONTHS_OF_EXECUTION__7 = '7';
    const MONTHS_OF_EXECUTION__8 = '8';
    const MONTHS_OF_EXECUTION__9 = '9';
    const MONTHS_OF_EXECUTION__10 = '10';
    const MONTHS_OF_EXECUTION__11 = '11';
    const MONTHS_OF_EXECUTION__12 = '12';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getMonthsOfExecutionAllowableValues()
    {
        return [
            self::MONTHS_OF_EXECUTION__1,
            self::MONTHS_OF_EXECUTION__2,
            self::MONTHS_OF_EXECUTION__3,
            self::MONTHS_OF_EXECUTION__4,
            self::MONTHS_OF_EXECUTION__5,
            self::MONTHS_OF_EXECUTION__6,
            self::MONTHS_OF_EXECUTION__7,
            self::MONTHS_OF_EXECUTION__8,
            self::MONTHS_OF_EXECUTION__9,
            self::MONTHS_OF_EXECUTION__10,
            self::MONTHS_OF_EXECUTION__11,
            self::MONTHS_OF_EXECUTION__12,
        ];
    }
    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['start_date'] = isset($data['start_date']) ? $data['start_date'] : null;
        $this->container['frequency'] = isset($data['frequency']) ? $data['frequency'] : null;
        $this->container['end_date'] = isset($data['end_date']) ? $data['end_date'] : null;
        $this->container['execution_rule'] = isset($data['execution_rule']) ? $data['execution_rule'] : null;
        $this->container['within_a_month_flag'] = isset($data['within_a_month_flag']) ? $data['within_a_month_flag'] : null;
        $this->container['months_of_execution'] = isset($data['months_of_execution']) ? $data['months_of_execution'] : null;
        $this->container['multiplicator'] = isset($data['multiplicator']) ? $data['multiplicator'] : null;
        $this->container['day_of_execution'] = isset($data['day_of_execution']) ? $data['day_of_execution'] : null;
        $this->container['limit_amount'] = isset($data['limit_amount']) ? $data['limit_amount'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['start_date'] === null) {
            $invalidProperties[] = "'start_date' can't be null";
        }
        if ($this->container['frequency'] === null) {
            $invalidProperties[] = "'frequency' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets start_date
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->container['start_date'];
    }

    /**
     * Sets start_date
     *
     * @param \DateTime $start_date The first applicable day of execution starting from this date is the first payment.
     *
     * @return $this
     */
    public function setStartDate($start_date)
    {
        $this->container['start_date'] = $start_date;

        return $this;
    }

    /**
     * Gets frequency
     *
     * @return \BankIO\Sdk\Model\FrequencyCode
     */
    public function getFrequency()
    {
        return $this->container['frequency'];
    }

    /**
     * Sets frequency
     *
     * @param \BankIO\Sdk\Model\FrequencyCode $frequency frequency
     *
     * @return $this
     */
    public function setFrequency($frequency)
    {
        $this->container['frequency'] = $frequency;

        return $this;
    }

    /**
     * Gets end_date
     *
     * @return \DateTime|null
     */
    public function getEndDate()
    {
        return $this->container['end_date'];
    }

    /**
     * Sets end_date
     *
     * @param \DateTime|null $end_date The last applicable day of execution. If not given, it is an infinite standing order.
     *
     * @return $this
     */
    public function setEndDate($end_date)
    {
        $this->container['end_date'] = $end_date;

        return $this;
    }

    /**
     * Gets execution_rule
     *
     * @return \BankIO\Sdk\Model\ExecutionRule|null
     */
    public function getExecutionRule()
    {
        return $this->container['execution_rule'];
    }

    /**
     * Sets execution_rule
     *
     * @param \BankIO\Sdk\Model\ExecutionRule|null $execution_rule execution_rule
     *
     * @return $this
     */
    public function setExecutionRule($execution_rule)
    {
        $this->container['execution_rule'] = $execution_rule;

        return $this;
    }

    /**
     * Gets within_a_month_flag
     *
     * @return bool|null
     */
    public function getWithinAMonthFlag()
    {
        return $this->container['within_a_month_flag'];
    }

    /**
     * Sets within_a_month_flag
     *
     * @param bool|null $within_a_month_flag This element is only used in case of frequency equals \"monthly\".  If this element equals false it has no effect. If this element equals true, then the execution rule is overruled if the day of execution would fall into a different month using the execution rule.  Example: executionRule equals \"preceding\", dayOfExecution equals \"02\" and the second of a month is a Sunday.  In this case, the transaction date would be on the last day of the month before.  This would be overruled if withinAMonthFlag equals true and the payment is processed on Monday the third of the Month. Remark: This attribute is rarely supported in the market.
     *
     * @return $this
     */
    public function setWithinAMonthFlag($within_a_month_flag)
    {
        $this->container['within_a_month_flag'] = $within_a_month_flag;

        return $this;
    }

    /**
     * Gets months_of_execution
     *
     * @return string[]|null
     */
    public function getMonthsOfExecution()
    {
        return $this->container['months_of_execution'];
    }

    /**
     * Sets months_of_execution
     *
     * @param string[]|null $months_of_execution The format is following the regular expression \\d{1,2}.  The array is restricted to 11 entries.  The values contained in the array entries shall all be different and the maximum value of one entry is 12. This attribute is contained if and only if the frequency equals \"MonthlyVariable\". Example: An execution on January, April and October each year is addressed by [\"1\", \"4\", \"10\"].
     *
     * @return $this
     */
    public function setMonthsOfExecution($months_of_execution)
    {
        $allowedValues = $this->getMonthsOfExecutionAllowableValues();
        if (!is_null($months_of_execution) && array_diff($months_of_execution, $allowedValues)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'months_of_execution', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['months_of_execution'] = $months_of_execution;

        return $this;
    }

    /**
     * Gets multiplicator
     *
     * @return int|null
     */
    public function getMultiplicator()
    {
        return $this->container['multiplicator'];
    }

    /**
     * Sets multiplicator
     *
     * @param int|null $multiplicator This is multiplying the given frequency resulting the exact frequency, e.g. Frequency=weekly and multiplicator=3 means every 3 weeks. Remark: This attribute is rarely supported in the market.
     *
     * @return $this
     */
    public function setMultiplicator($multiplicator)
    {
        $this->container['multiplicator'] = $multiplicator;

        return $this;
    }

    /**
     * Gets day_of_execution
     *
     * @return \BankIO\Sdk\Model\DayOfExecution|null
     */
    public function getDayOfExecution()
    {
        return $this->container['day_of_execution'];
    }

    /**
     * Sets day_of_execution
     *
     * @param \BankIO\Sdk\Model\DayOfExecution|null $day_of_execution day_of_execution
     *
     * @return $this
     */
    public function setDayOfExecution($day_of_execution)
    {
        $this->container['day_of_execution'] = $day_of_execution;

        return $this;
    }

    /**
     * Gets limit_amount
     *
     * @return \BankIO\Sdk\Model\Amount|null
     */
    public function getLimitAmount()
    {
        return $this->container['limit_amount'];
    }

    /**
     * Sets limit_amount
     *
     * @param \BankIO\Sdk\Model\Amount|null $limit_amount limit_amount
     *
     * @return $this
     */
    public function setLimitAmount($limit_amount)
    {
        $this->container['limit_amount'] = $limit_amount;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}

