<?php
/**
 * PeriodicPaymentInitiationWithStatusResponse
 *
 * PHP version 7.2
 *
 * @category Class
 * @package  BankIO\Sdk
 * @author   bankIO
 * @link     https://bankio.co.uk/bankio-link/
 */

/**
 * bankIO NextGenPSD2 XS2A Framework
 *
 * # Summary The **NextGenPSD2** *Framework Version 1.3.6* (with errata) offers a modern, open, harmonised and interoperable set of Application Programming Interfaces (APIs) as the safest and most efficient way to provide data securely. The NextGenPSD2 Framework reduces XS2A complexity and costs, addresses the problem of multiple competing standards  in Europe and, aligned with the goals of the Euro Retail Payments Board, enables European banking customers to benefit from innovative products and services ('Banking as a Service') by granting TPPs safe and secure (authenticated and authorised) access to their bank accounts and financial data.  The possible Approaches are:   * Redirect SCA Approach   * OAuth SCA Approach   * Decoupled SCA Approach   * Embedded SCA Approach without SCA method   * Embedded SCA Approach with only one SCA method available   * Embedded SCA Approach with Selection of a SCA method    Not every message defined in this API definition is necessary for all approaches.    Furthermore this API definition does not differ between methods which are mandatory, conditional, or optional.   Therefore for a particular implementation of a Berlin Group PSD2 compliant API it is only necessary to support    a certain subset of the methods defined in this API definition.    **Please have a look at the implementation guidelines if you are not sure    which message has to be used for the approach you are going to use.**  ## Some General Remarks Related to this version of the OpenAPI Specification: * **This API definition is based on the Implementation Guidelines of the Berlin Group PSD2 API.**    It is not a replacement in any sense.   The main specification is (at the moment) always the Implementation Guidelines of the Berlin Group PSD2 API. * **This API definition contains the REST-API for requests from the PISP to the ASPSP.** * **This API definition contains the messages for all different approaches defined in the Implementation Guidelines.** * According to the OpenAPI-Specification [https://github.com/OAI/OpenAPI-Specification/blob/master/versions/3.0.1.md]        \"If in is \"header\" and the name field is \"Accept\", \"Content-Type\" or \"Authorization\", the parameter definition SHALL be ignored.\"      The element \"Accept\" will not be defined in this file at any place.      The elements \"Content-Type\" and \"Authorization\" are implicitly defined by the OpenApi tags \"content\" and \"security\".    * There are several predefined types which might occur in payment initiation messages,    but are not used in the standard JSON messages in the Implementation Guidelines.   Therefore they are not used in the corresponding messages in this file either.   We added them for the convenience of the user.   If there is a payment product, which needs these fields, one can easily use the predefined types.   But the ASPSP need not to accept them in general.    * **We omit the definition of all standard HTTP header elements (mandatory/optional/conditional)    except they are mentioned in the Implementation Guidelines.**   Therefore the implementer might add these in his own realisation of a PSD2 comlient API in addition to the elements defined in this file.     ## General Remarks on Data Types  The Berlin Group definition of UTF-8 strings in context of the PSD2 API has to support at least the following characters  a b c d e f g h i j k l m n o p q r s t u v w x y z  A B C D E F G H I J K L M N O P Q R S T U V W X Y Z  0 1 2 3 4 5 6 7 8 9  / - ? : ( ) . , ' +  Space
 *
 * The version of the OpenAPI document: 1.3.6_2020-05-28
 * Contact: hello@bankio.co.uk
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
 * PeriodicPaymentInitiationWithStatusResponse Class Doc Comment
 *
 * @category Class
 * @description Generic JSON response body consistion of the corresponding periodic payment initation JSON body together with an optional transaction status field.
 * @package  BankIO\Sdk
 * @author   bankIO
 * @link     https://bankio.co.uk/bankio-link/
 */
class PeriodicPaymentInitiationWithStatusResponse implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'periodicPaymentInitiationWithStatusResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'end_to_end_identification' => 'string',
        'debtor_account' => '\BankIO\Sdk\Model\AccountReference',
        'instructed_amount' => '\BankIO\Sdk\Model\Amount',
        'creditor_account' => '\BankIO\Sdk\Model\AccountReference',
        'creditor_agent' => 'string',
        'creditor_name' => 'string',
        'creditor_address' => '\BankIO\Sdk\Model\Address',
        'remittance_information_unstructured' => 'string',
        'start_date' => '\DateTime',
        'end_date' => '\DateTime',
        'execution_rule' => '\BankIO\Sdk\Model\ExecutionRule',
        'frequency' => '\BankIO\Sdk\Model\FrequencyCode',
        'day_of_execution' => '\BankIO\Sdk\Model\DayOfExecution',
        'transaction_status' => '\BankIO\Sdk\Model\TransactionStatus'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'end_to_end_identification' => null,
        'debtor_account' => null,
        'instructed_amount' => null,
        'creditor_account' => null,
        'creditor_agent' => null,
        'creditor_name' => null,
        'creditor_address' => null,
        'remittance_information_unstructured' => null,
        'start_date' => 'date',
        'end_date' => 'date',
        'execution_rule' => null,
        'frequency' => null,
        'day_of_execution' => null,
        'transaction_status' => null
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
        'end_to_end_identification' => 'endToEndIdentification',
        'debtor_account' => 'debtorAccount',
        'instructed_amount' => 'instructedAmount',
        'creditor_account' => 'creditorAccount',
        'creditor_agent' => 'creditorAgent',
        'creditor_name' => 'creditorName',
        'creditor_address' => 'creditorAddress',
        'remittance_information_unstructured' => 'remittanceInformationUnstructured',
        'start_date' => 'startDate',
        'end_date' => 'endDate',
        'execution_rule' => 'executionRule',
        'frequency' => 'frequency',
        'day_of_execution' => 'dayOfExecution',
        'transaction_status' => 'transactionStatus'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'end_to_end_identification' => 'setEndToEndIdentification',
        'debtor_account' => 'setDebtorAccount',
        'instructed_amount' => 'setInstructedAmount',
        'creditor_account' => 'setCreditorAccount',
        'creditor_agent' => 'setCreditorAgent',
        'creditor_name' => 'setCreditorName',
        'creditor_address' => 'setCreditorAddress',
        'remittance_information_unstructured' => 'setRemittanceInformationUnstructured',
        'start_date' => 'setStartDate',
        'end_date' => 'setEndDate',
        'execution_rule' => 'setExecutionRule',
        'frequency' => 'setFrequency',
        'day_of_execution' => 'setDayOfExecution',
        'transaction_status' => 'setTransactionStatus'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'end_to_end_identification' => 'getEndToEndIdentification',
        'debtor_account' => 'getDebtorAccount',
        'instructed_amount' => 'getInstructedAmount',
        'creditor_account' => 'getCreditorAccount',
        'creditor_agent' => 'getCreditorAgent',
        'creditor_name' => 'getCreditorName',
        'creditor_address' => 'getCreditorAddress',
        'remittance_information_unstructured' => 'getRemittanceInformationUnstructured',
        'start_date' => 'getStartDate',
        'end_date' => 'getEndDate',
        'execution_rule' => 'getExecutionRule',
        'frequency' => 'getFrequency',
        'day_of_execution' => 'getDayOfExecution',
        'transaction_status' => 'getTransactionStatus'
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
        $this->container['end_to_end_identification'] = isset($data['end_to_end_identification']) ? $data['end_to_end_identification'] : null;
        $this->container['debtor_account'] = isset($data['debtor_account']) ? $data['debtor_account'] : null;
        $this->container['instructed_amount'] = isset($data['instructed_amount']) ? $data['instructed_amount'] : null;
        $this->container['creditor_account'] = isset($data['creditor_account']) ? $data['creditor_account'] : null;
        $this->container['creditor_agent'] = isset($data['creditor_agent']) ? $data['creditor_agent'] : null;
        $this->container['creditor_name'] = isset($data['creditor_name']) ? $data['creditor_name'] : null;
        $this->container['creditor_address'] = isset($data['creditor_address']) ? $data['creditor_address'] : null;
        $this->container['remittance_information_unstructured'] = isset($data['remittance_information_unstructured']) ? $data['remittance_information_unstructured'] : null;
        $this->container['start_date'] = isset($data['start_date']) ? $data['start_date'] : null;
        $this->container['end_date'] = isset($data['end_date']) ? $data['end_date'] : null;
        $this->container['execution_rule'] = isset($data['execution_rule']) ? $data['execution_rule'] : null;
        $this->container['frequency'] = isset($data['frequency']) ? $data['frequency'] : null;
        $this->container['day_of_execution'] = isset($data['day_of_execution']) ? $data['day_of_execution'] : null;
        $this->container['transaction_status'] = isset($data['transaction_status']) ? $data['transaction_status'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['end_to_end_identification']) && (mb_strlen($this->container['end_to_end_identification']) > 35)) {
            $invalidProperties[] = "invalid value for 'end_to_end_identification', the character length must be smaller than or equal to 35.";
        }

        if ($this->container['debtor_account'] === null) {
            $invalidProperties[] = "'debtor_account' can't be null";
        }
        if ($this->container['instructed_amount'] === null) {
            $invalidProperties[] = "'instructed_amount' can't be null";
        }
        if ($this->container['creditor_account'] === null) {
            $invalidProperties[] = "'creditor_account' can't be null";
        }
        if (!is_null($this->container['creditor_agent']) && !preg_match("/[A-Z]{6,6}[A-Z2-9][A-NP-Z0-9]([A-Z0-9]{3,3}){0,1}/", $this->container['creditor_agent'])) {
            $invalidProperties[] = "invalid value for 'creditor_agent', must be conform to the pattern /[A-Z]{6,6}[A-Z2-9][A-NP-Z0-9]([A-Z0-9]{3,3}){0,1}/.";
        }

        if ($this->container['creditor_name'] === null) {
            $invalidProperties[] = "'creditor_name' can't be null";
        }
        if ((mb_strlen($this->container['creditor_name']) > 70)) {
            $invalidProperties[] = "invalid value for 'creditor_name', the character length must be smaller than or equal to 70.";
        }

        if (!is_null($this->container['remittance_information_unstructured']) && (mb_strlen($this->container['remittance_information_unstructured']) > 140)) {
            $invalidProperties[] = "invalid value for 'remittance_information_unstructured', the character length must be smaller than or equal to 140.";
        }

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
     * Gets end_to_end_identification
     *
     * @return string|null
     */
    public function getEndToEndIdentification()
    {
        return $this->container['end_to_end_identification'];
    }

    /**
     * Sets end_to_end_identification
     *
     * @param string|null $end_to_end_identification end_to_end_identification
     *
     * @return $this
     */
    public function setEndToEndIdentification($end_to_end_identification)
    {
        if (!is_null($end_to_end_identification) && (mb_strlen($end_to_end_identification) > 35)) {
            throw new \InvalidArgumentException('invalid length for $end_to_end_identification when calling PeriodicPaymentInitiationWithStatusResponse., must be smaller than or equal to 35.');
        }

        $this->container['end_to_end_identification'] = $end_to_end_identification;

        return $this;
    }

    /**
     * Gets debtor_account
     *
     * @return \BankIO\Sdk\Model\AccountReference
     */
    public function getDebtorAccount()
    {
        return $this->container['debtor_account'];
    }

    /**
     * Sets debtor_account
     *
     * @param \BankIO\Sdk\Model\AccountReference $debtor_account debtor_account
     *
     * @return $this
     */
    public function setDebtorAccount($debtor_account)
    {
        $this->container['debtor_account'] = $debtor_account;

        return $this;
    }

    /**
     * Gets instructed_amount
     *
     * @return \BankIO\Sdk\Model\Amount
     */
    public function getInstructedAmount()
    {
        return $this->container['instructed_amount'];
    }

    /**
     * Sets instructed_amount
     *
     * @param \BankIO\Sdk\Model\Amount $instructed_amount instructed_amount
     *
     * @return $this
     */
    public function setInstructedAmount($instructed_amount)
    {
        $this->container['instructed_amount'] = $instructed_amount;

        return $this;
    }

    /**
     * Gets creditor_account
     *
     * @return \BankIO\Sdk\Model\AccountReference
     */
    public function getCreditorAccount()
    {
        return $this->container['creditor_account'];
    }

    /**
     * Sets creditor_account
     *
     * @param \BankIO\Sdk\Model\AccountReference $creditor_account creditor_account
     *
     * @return $this
     */
    public function setCreditorAccount($creditor_account)
    {
        $this->container['creditor_account'] = $creditor_account;

        return $this;
    }

    /**
     * Gets creditor_agent
     *
     * @return string|null
     */
    public function getCreditorAgent()
    {
        return $this->container['creditor_agent'];
    }

    /**
     * Sets creditor_agent
     *
     * @param string|null $creditor_agent BICFI
     *
     * @return $this
     */
    public function setCreditorAgent($creditor_agent)
    {

        if (!is_null($creditor_agent) && (!preg_match("/[A-Z]{6,6}[A-Z2-9][A-NP-Z0-9]([A-Z0-9]{3,3}){0,1}/", $creditor_agent))) {
            throw new \InvalidArgumentException("invalid value for $creditor_agent when calling PeriodicPaymentInitiationWithStatusResponse., must conform to the pattern /[A-Z]{6,6}[A-Z2-9][A-NP-Z0-9]([A-Z0-9]{3,3}){0,1}/.");
        }

        $this->container['creditor_agent'] = $creditor_agent;

        return $this;
    }

    /**
     * Gets creditor_name
     *
     * @return string
     */
    public function getCreditorName()
    {
        return $this->container['creditor_name'];
    }

    /**
     * Sets creditor_name
     *
     * @param string $creditor_name Creditor name.
     *
     * @return $this
     */
    public function setCreditorName($creditor_name)
    {
        if ((mb_strlen($creditor_name) > 70)) {
            throw new \InvalidArgumentException('invalid length for $creditor_name when calling PeriodicPaymentInitiationWithStatusResponse., must be smaller than or equal to 70.');
        }

        $this->container['creditor_name'] = $creditor_name;

        return $this;
    }

    /**
     * Gets creditor_address
     *
     * @return \BankIO\Sdk\Model\Address|null
     */
    public function getCreditorAddress()
    {
        return $this->container['creditor_address'];
    }

    /**
     * Sets creditor_address
     *
     * @param \BankIO\Sdk\Model\Address|null $creditor_address creditor_address
     *
     * @return $this
     */
    public function setCreditorAddress($creditor_address)
    {
        $this->container['creditor_address'] = $creditor_address;

        return $this;
    }

    /**
     * Gets remittance_information_unstructured
     *
     * @return string|null
     */
    public function getRemittanceInformationUnstructured()
    {
        return $this->container['remittance_information_unstructured'];
    }

    /**
     * Sets remittance_information_unstructured
     *
     * @param string|null $remittance_information_unstructured Unstructured remittance information.
     *
     * @return $this
     */
    public function setRemittanceInformationUnstructured($remittance_information_unstructured)
    {
        if (!is_null($remittance_information_unstructured) && (mb_strlen($remittance_information_unstructured) > 140)) {
            throw new \InvalidArgumentException('invalid length for $remittance_information_unstructured when calling PeriodicPaymentInitiationWithStatusResponse., must be smaller than or equal to 140.');
        }

        $this->container['remittance_information_unstructured'] = $remittance_information_unstructured;

        return $this;
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
     * Gets transaction_status
     *
     * @return \BankIO\Sdk\Model\TransactionStatus|null
     */
    public function getTransactionStatus()
    {
        return $this->container['transaction_status'];
    }

    /**
     * Sets transaction_status
     *
     * @param \BankIO\Sdk\Model\TransactionStatus|null $transaction_status transaction_status
     *
     * @return $this
     */
    public function setTransactionStatus($transaction_status)
    {
        $this->container['transaction_status'] = $transaction_status;

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


