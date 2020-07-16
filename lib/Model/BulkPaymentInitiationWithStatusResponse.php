<?php
/**
 * BulkPaymentInitiationWithStatusResponse
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
 * BulkPaymentInitiationWithStatusResponse Class Doc Comment
 *
 * @category Class
 * @description Generic JSON response body consistion of the corresponding bulk payment initation JSON body together with an optional transaction status field.
 * @package  BankIO\Sdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class BulkPaymentInitiationWithStatusResponse implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'bulkPaymentInitiationWithStatusResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'batch_booking_preferred' => 'bool',
        'requested_execution_date' => '\DateTime',
        'acceptor_transaction_date_time' => '\DateTime',
        'debtor_account' => '\BankIO\Sdk\Model\AccountReference',
        'payment_information_id' => 'string',
        'payments' => '\BankIO\Sdk\Model\PaymentInitiationBulkElementJson[]',
        'transaction_status' => '\BankIO\Sdk\Model\TransactionStatus'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'batch_booking_preferred' => null,
        'requested_execution_date' => 'date',
        'acceptor_transaction_date_time' => 'date-time',
        'debtor_account' => null,
        'payment_information_id' => null,
        'payments' => null,
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
        'batch_booking_preferred' => 'batchBookingPreferred',
        'requested_execution_date' => 'requestedExecutionDate',
        'acceptor_transaction_date_time' => 'acceptorTransactionDateTime',
        'debtor_account' => 'debtorAccount',
        'payment_information_id' => 'paymentInformationId',
        'payments' => 'payments',
        'transaction_status' => 'transactionStatus'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'batch_booking_preferred' => 'setBatchBookingPreferred',
        'requested_execution_date' => 'setRequestedExecutionDate',
        'acceptor_transaction_date_time' => 'setAcceptorTransactionDateTime',
        'debtor_account' => 'setDebtorAccount',
        'payment_information_id' => 'setPaymentInformationId',
        'payments' => 'setPayments',
        'transaction_status' => 'setTransactionStatus'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'batch_booking_preferred' => 'getBatchBookingPreferred',
        'requested_execution_date' => 'getRequestedExecutionDate',
        'acceptor_transaction_date_time' => 'getAcceptorTransactionDateTime',
        'debtor_account' => 'getDebtorAccount',
        'payment_information_id' => 'getPaymentInformationId',
        'payments' => 'getPayments',
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
        $this->container['batch_booking_preferred'] = isset($data['batch_booking_preferred']) ? $data['batch_booking_preferred'] : null;
        $this->container['requested_execution_date'] = isset($data['requested_execution_date']) ? $data['requested_execution_date'] : null;
        $this->container['acceptor_transaction_date_time'] = isset($data['acceptor_transaction_date_time']) ? $data['acceptor_transaction_date_time'] : null;
        $this->container['debtor_account'] = isset($data['debtor_account']) ? $data['debtor_account'] : null;
        $this->container['payment_information_id'] = isset($data['payment_information_id']) ? $data['payment_information_id'] : null;
        $this->container['payments'] = isset($data['payments']) ? $data['payments'] : null;
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

        if ($this->container['debtor_account'] === null) {
            $invalidProperties[] = "'debtor_account' can't be null";
        }
        if (!is_null($this->container['payment_information_id']) && (mb_strlen($this->container['payment_information_id']) > 35)) {
            $invalidProperties[] = "invalid value for 'payment_information_id', the character length must be smaller than or equal to 35.";
        }

        if ($this->container['payments'] === null) {
            $invalidProperties[] = "'payments' can't be null";
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
     * Gets batch_booking_preferred
     *
     * @return bool|null
     */
    public function getBatchBookingPreferred()
    {
        return $this->container['batch_booking_preferred'];
    }

    /**
     * Sets batch_booking_preferred
     *
     * @param bool|null $batch_booking_preferred If this element equals 'true', the PSU prefers only one booking entry.  If this element equals 'false', the PSU prefers individual booking of all contained individual transactions.   The ASPSP will follow this preference according to contracts agreed on with the PSU.
     *
     * @return $this
     */
    public function setBatchBookingPreferred($batch_booking_preferred)
    {
        $this->container['batch_booking_preferred'] = $batch_booking_preferred;

        return $this;
    }

    /**
     * Gets requested_execution_date
     *
     * @return \DateTime|null
     */
    public function getRequestedExecutionDate()
    {
        return $this->container['requested_execution_date'];
    }

    /**
     * Sets requested_execution_date
     *
     * @param \DateTime|null $requested_execution_date requested_execution_date
     *
     * @return $this
     */
    public function setRequestedExecutionDate($requested_execution_date)
    {
        $this->container['requested_execution_date'] = $requested_execution_date;

        return $this;
    }

    /**
     * Gets acceptor_transaction_date_time
     *
     * @return \DateTime|null
     */
    public function getAcceptorTransactionDateTime()
    {
        return $this->container['acceptor_transaction_date_time'];
    }

    /**
     * Sets acceptor_transaction_date_time
     *
     * @param \DateTime|null $acceptor_transaction_date_time acceptor_transaction_date_time
     *
     * @return $this
     */
    public function setAcceptorTransactionDateTime($acceptor_transaction_date_time)
    {
        $this->container['acceptor_transaction_date_time'] = $acceptor_transaction_date_time;

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
     * Gets payment_information_id
     *
     * @return string|null
     */
    public function getPaymentInformationId()
    {
        return $this->container['payment_information_id'];
    }

    /**
     * Sets payment_information_id
     *
     * @param string|null $payment_information_id payment_information_id
     *
     * @return $this
     */
    public function setPaymentInformationId($payment_information_id)
    {
        if (!is_null($payment_information_id) && (mb_strlen($payment_information_id) > 35)) {
            throw new \InvalidArgumentException('invalid length for $payment_information_id when calling BulkPaymentInitiationWithStatusResponse., must be smaller than or equal to 35.');
        }

        $this->container['payment_information_id'] = $payment_information_id;

        return $this;
    }

    /**
     * Gets payments
     *
     * @return \BankIO\Sdk\Model\PaymentInitiationBulkElementJson[]
     */
    public function getPayments()
    {
        return $this->container['payments'];
    }

    /**
     * Sets payments
     *
     * @param \BankIO\Sdk\Model\PaymentInitiationBulkElementJson[] $payments A list of generic JSON bodies payment initations for bulk payments via JSON.  Note: Some fields from single payments do not occcur in a bulk payment element
     *
     * @return $this
     */
    public function setPayments($payments)
    {
        $this->container['payments'] = $payments;

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


