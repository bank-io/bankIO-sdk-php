<?php
/**
 * CardTransaction
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
 * CardTransaction Class Doc Comment
 *
 * @category Class
 * @description Card transaction information.
 * @package  BankIO\Sdk
 * @author   bankIO
 * @link     https://bankio.co.uk/bankio-link/
 */
class CardTransaction implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'cardTransaction';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'card_transaction_id' => 'string',
        'terminal_id' => 'string',
        'transaction_date' => '\DateTime',
        'acceptor_transaction_date_time' => '\DateTime',
        'booking_date' => '\DateTime',
        'transaction_amount' => '\BankIO\Sdk\Model\Amount',
        'currency_exchange' => '\BankIO\Sdk\Model\ReportExchangeRate[]',
        'original_amount' => '\BankIO\Sdk\Model\Amount',
        'markup_fee' => '\BankIO\Sdk\Model\Amount',
        'markup_fee_percentage' => 'string',
        'card_acceptor_id' => 'string',
        'card_acceptor_address' => '\BankIO\Sdk\Model\Address',
        'card_acceptor_phone' => 'string',
        'merchant_category_code' => 'string',
        'masked_pan' => 'string',
        'transaction_details' => 'string',
        'invoiced' => 'bool',
        'proprietary_bank_transaction_code' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'card_transaction_id' => null,
        'terminal_id' => null,
        'transaction_date' => 'date',
        'acceptor_transaction_date_time' => 'date-time',
        'booking_date' => 'date',
        'transaction_amount' => null,
        'currency_exchange' => null,
        'original_amount' => null,
        'markup_fee' => null,
        'markup_fee_percentage' => null,
        'card_acceptor_id' => null,
        'card_acceptor_address' => null,
        'card_acceptor_phone' => null,
        'merchant_category_code' => null,
        'masked_pan' => null,
        'transaction_details' => null,
        'invoiced' => null,
        'proprietary_bank_transaction_code' => null
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
        'card_transaction_id' => 'cardTransactionId',
        'terminal_id' => 'terminalId',
        'transaction_date' => 'transactionDate',
        'acceptor_transaction_date_time' => 'acceptorTransactionDateTime',
        'booking_date' => 'bookingDate',
        'transaction_amount' => 'transactionAmount',
        'currency_exchange' => 'currencyExchange',
        'original_amount' => 'originalAmount',
        'markup_fee' => 'markupFee',
        'markup_fee_percentage' => 'markupFeePercentage',
        'card_acceptor_id' => 'cardAcceptorId',
        'card_acceptor_address' => 'cardAcceptorAddress',
        'card_acceptor_phone' => 'cardAcceptorPhone',
        'merchant_category_code' => 'merchantCategoryCode',
        'masked_pan' => 'maskedPAN',
        'transaction_details' => 'transactionDetails',
        'invoiced' => 'invoiced',
        'proprietary_bank_transaction_code' => 'proprietaryBankTransactionCode'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'card_transaction_id' => 'setCardTransactionId',
        'terminal_id' => 'setTerminalId',
        'transaction_date' => 'setTransactionDate',
        'acceptor_transaction_date_time' => 'setAcceptorTransactionDateTime',
        'booking_date' => 'setBookingDate',
        'transaction_amount' => 'setTransactionAmount',
        'currency_exchange' => 'setCurrencyExchange',
        'original_amount' => 'setOriginalAmount',
        'markup_fee' => 'setMarkupFee',
        'markup_fee_percentage' => 'setMarkupFeePercentage',
        'card_acceptor_id' => 'setCardAcceptorId',
        'card_acceptor_address' => 'setCardAcceptorAddress',
        'card_acceptor_phone' => 'setCardAcceptorPhone',
        'merchant_category_code' => 'setMerchantCategoryCode',
        'masked_pan' => 'setMaskedPan',
        'transaction_details' => 'setTransactionDetails',
        'invoiced' => 'setInvoiced',
        'proprietary_bank_transaction_code' => 'setProprietaryBankTransactionCode'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'card_transaction_id' => 'getCardTransactionId',
        'terminal_id' => 'getTerminalId',
        'transaction_date' => 'getTransactionDate',
        'acceptor_transaction_date_time' => 'getAcceptorTransactionDateTime',
        'booking_date' => 'getBookingDate',
        'transaction_amount' => 'getTransactionAmount',
        'currency_exchange' => 'getCurrencyExchange',
        'original_amount' => 'getOriginalAmount',
        'markup_fee' => 'getMarkupFee',
        'markup_fee_percentage' => 'getMarkupFeePercentage',
        'card_acceptor_id' => 'getCardAcceptorId',
        'card_acceptor_address' => 'getCardAcceptorAddress',
        'card_acceptor_phone' => 'getCardAcceptorPhone',
        'merchant_category_code' => 'getMerchantCategoryCode',
        'masked_pan' => 'getMaskedPan',
        'transaction_details' => 'getTransactionDetails',
        'invoiced' => 'getInvoiced',
        'proprietary_bank_transaction_code' => 'getProprietaryBankTransactionCode'
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
        $this->container['card_transaction_id'] = isset($data['card_transaction_id']) ? $data['card_transaction_id'] : null;
        $this->container['terminal_id'] = isset($data['terminal_id']) ? $data['terminal_id'] : null;
        $this->container['transaction_date'] = isset($data['transaction_date']) ? $data['transaction_date'] : null;
        $this->container['acceptor_transaction_date_time'] = isset($data['acceptor_transaction_date_time']) ? $data['acceptor_transaction_date_time'] : null;
        $this->container['booking_date'] = isset($data['booking_date']) ? $data['booking_date'] : null;
        $this->container['transaction_amount'] = isset($data['transaction_amount']) ? $data['transaction_amount'] : null;
        $this->container['currency_exchange'] = isset($data['currency_exchange']) ? $data['currency_exchange'] : null;
        $this->container['original_amount'] = isset($data['original_amount']) ? $data['original_amount'] : null;
        $this->container['markup_fee'] = isset($data['markup_fee']) ? $data['markup_fee'] : null;
        $this->container['markup_fee_percentage'] = isset($data['markup_fee_percentage']) ? $data['markup_fee_percentage'] : null;
        $this->container['card_acceptor_id'] = isset($data['card_acceptor_id']) ? $data['card_acceptor_id'] : null;
        $this->container['card_acceptor_address'] = isset($data['card_acceptor_address']) ? $data['card_acceptor_address'] : null;
        $this->container['card_acceptor_phone'] = isset($data['card_acceptor_phone']) ? $data['card_acceptor_phone'] : null;
        $this->container['merchant_category_code'] = isset($data['merchant_category_code']) ? $data['merchant_category_code'] : null;
        $this->container['masked_pan'] = isset($data['masked_pan']) ? $data['masked_pan'] : null;
        $this->container['transaction_details'] = isset($data['transaction_details']) ? $data['transaction_details'] : null;
        $this->container['invoiced'] = isset($data['invoiced']) ? $data['invoiced'] : null;
        $this->container['proprietary_bank_transaction_code'] = isset($data['proprietary_bank_transaction_code']) ? $data['proprietary_bank_transaction_code'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['card_transaction_id']) && (mb_strlen($this->container['card_transaction_id']) > 35)) {
            $invalidProperties[] = "invalid value for 'card_transaction_id', the character length must be smaller than or equal to 35.";
        }

        if (!is_null($this->container['terminal_id']) && (mb_strlen($this->container['terminal_id']) > 35)) {
            $invalidProperties[] = "invalid value for 'terminal_id', the character length must be smaller than or equal to 35.";
        }

        if ($this->container['transaction_amount'] === null) {
            $invalidProperties[] = "'transaction_amount' can't be null";
        }
        if (!is_null($this->container['card_acceptor_id']) && (mb_strlen($this->container['card_acceptor_id']) > 35)) {
            $invalidProperties[] = "invalid value for 'card_acceptor_id', the character length must be smaller than or equal to 35.";
        }

        if (!is_null($this->container['card_acceptor_phone']) && !preg_match("/\\+[0-9]{1,3}\\-[0-9()+\\-]{1,30}/", $this->container['card_acceptor_phone'])) {
            $invalidProperties[] = "invalid value for 'card_acceptor_phone', must be conform to the pattern /\\+[0-9]{1,3}\\-[0-9()+\\-]{1,30}/.";
        }

        if (!is_null($this->container['merchant_category_code']) && (mb_strlen($this->container['merchant_category_code']) > 4)) {
            $invalidProperties[] = "invalid value for 'merchant_category_code', the character length must be smaller than or equal to 4.";
        }

        if (!is_null($this->container['merchant_category_code']) && (mb_strlen($this->container['merchant_category_code']) < 4)) {
            $invalidProperties[] = "invalid value for 'merchant_category_code', the character length must be bigger than or equal to 4.";
        }

        if (!is_null($this->container['masked_pan']) && (mb_strlen($this->container['masked_pan']) > 35)) {
            $invalidProperties[] = "invalid value for 'masked_pan', the character length must be smaller than or equal to 35.";
        }

        if (!is_null($this->container['transaction_details']) && (mb_strlen($this->container['transaction_details']) > 140)) {
            $invalidProperties[] = "invalid value for 'transaction_details', the character length must be smaller than or equal to 140.";
        }

        if (!is_null($this->container['proprietary_bank_transaction_code']) && (mb_strlen($this->container['proprietary_bank_transaction_code']) > 35)) {
            $invalidProperties[] = "invalid value for 'proprietary_bank_transaction_code', the character length must be smaller than or equal to 35.";
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
     * Gets card_transaction_id
     *
     * @return string|null
     */
    public function getCardTransactionId()
    {
        return $this->container['card_transaction_id'];
    }

    /**
     * Sets card_transaction_id
     *
     * @param string|null $card_transaction_id Unique end to end identity.
     *
     * @return $this
     */
    public function setCardTransactionId($card_transaction_id)
    {
        if (!is_null($card_transaction_id) && (mb_strlen($card_transaction_id) > 35)) {
            throw new \InvalidArgumentException('invalid length for $card_transaction_id when calling CardTransaction., must be smaller than or equal to 35.');
        }

        $this->container['card_transaction_id'] = $card_transaction_id;

        return $this;
    }

    /**
     * Gets terminal_id
     *
     * @return string|null
     */
    public function getTerminalId()
    {
        return $this->container['terminal_id'];
    }

    /**
     * Sets terminal_id
     *
     * @param string|null $terminal_id Identification of the Terminal, where the card has been used.
     *
     * @return $this
     */
    public function setTerminalId($terminal_id)
    {
        if (!is_null($terminal_id) && (mb_strlen($terminal_id) > 35)) {
            throw new \InvalidArgumentException('invalid length for $terminal_id when calling CardTransaction., must be smaller than or equal to 35.');
        }

        $this->container['terminal_id'] = $terminal_id;

        return $this;
    }

    /**
     * Gets transaction_date
     *
     * @return \DateTime|null
     */
    public function getTransactionDate()
    {
        return $this->container['transaction_date'];
    }

    /**
     * Sets transaction_date
     *
     * @param \DateTime|null $transaction_date Date of the actual card transaction.
     *
     * @return $this
     */
    public function setTransactionDate($transaction_date)
    {
        $this->container['transaction_date'] = $transaction_date;

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
     * @param \DateTime|null $acceptor_transaction_date_time Timestamp of the actual card transaction within the acceptance system
     *
     * @return $this
     */
    public function setAcceptorTransactionDateTime($acceptor_transaction_date_time)
    {
        $this->container['acceptor_transaction_date_time'] = $acceptor_transaction_date_time;

        return $this;
    }

    /**
     * Gets booking_date
     *
     * @return \DateTime|null
     */
    public function getBookingDate()
    {
        return $this->container['booking_date'];
    }

    /**
     * Sets booking_date
     *
     * @param \DateTime|null $booking_date The date when an entry is posted to an account on the ASPSPs books.
     *
     * @return $this
     */
    public function setBookingDate($booking_date)
    {
        $this->container['booking_date'] = $booking_date;

        return $this;
    }

    /**
     * Gets transaction_amount
     *
     * @return \BankIO\Sdk\Model\Amount
     */
    public function getTransactionAmount()
    {
        return $this->container['transaction_amount'];
    }

    /**
     * Sets transaction_amount
     *
     * @param \BankIO\Sdk\Model\Amount $transaction_amount transaction_amount
     *
     * @return $this
     */
    public function setTransactionAmount($transaction_amount)
    {
        $this->container['transaction_amount'] = $transaction_amount;

        return $this;
    }

    /**
     * Gets currency_exchange
     *
     * @return \BankIO\Sdk\Model\ReportExchangeRate[]|null
     */
    public function getCurrencyExchange()
    {
        return $this->container['currency_exchange'];
    }

    /**
     * Sets currency_exchange
     *
     * @param \BankIO\Sdk\Model\ReportExchangeRate[]|null $currency_exchange Array of exchange rates.
     *
     * @return $this
     */
    public function setCurrencyExchange($currency_exchange)
    {
        $this->container['currency_exchange'] = $currency_exchange;

        return $this;
    }

    /**
     * Gets original_amount
     *
     * @return \BankIO\Sdk\Model\Amount|null
     */
    public function getOriginalAmount()
    {
        return $this->container['original_amount'];
    }

    /**
     * Sets original_amount
     *
     * @param \BankIO\Sdk\Model\Amount|null $original_amount original_amount
     *
     * @return $this
     */
    public function setOriginalAmount($original_amount)
    {
        $this->container['original_amount'] = $original_amount;

        return $this;
    }

    /**
     * Gets markup_fee
     *
     * @return \BankIO\Sdk\Model\Amount|null
     */
    public function getMarkupFee()
    {
        return $this->container['markup_fee'];
    }

    /**
     * Sets markup_fee
     *
     * @param \BankIO\Sdk\Model\Amount|null $markup_fee markup_fee
     *
     * @return $this
     */
    public function setMarkupFee($markup_fee)
    {
        $this->container['markup_fee'] = $markup_fee;

        return $this;
    }

    /**
     * Gets markup_fee_percentage
     *
     * @return string|null
     */
    public function getMarkupFeePercentage()
    {
        return $this->container['markup_fee_percentage'];
    }

    /**
     * Sets markup_fee_percentage
     *
     * @param string|null $markup_fee_percentage markup_fee_percentage
     *
     * @return $this
     */
    public function setMarkupFeePercentage($markup_fee_percentage)
    {
        $this->container['markup_fee_percentage'] = $markup_fee_percentage;

        return $this;
    }

    /**
     * Gets card_acceptor_id
     *
     * @return string|null
     */
    public function getCardAcceptorId()
    {
        return $this->container['card_acceptor_id'];
    }

    /**
     * Sets card_acceptor_id
     *
     * @param string|null $card_acceptor_id card_acceptor_id
     *
     * @return $this
     */
    public function setCardAcceptorId($card_acceptor_id)
    {
        if (!is_null($card_acceptor_id) && (mb_strlen($card_acceptor_id) > 35)) {
            throw new \InvalidArgumentException('invalid length for $card_acceptor_id when calling CardTransaction., must be smaller than or equal to 35.');
        }

        $this->container['card_acceptor_id'] = $card_acceptor_id;

        return $this;
    }

    /**
     * Gets card_acceptor_address
     *
     * @return \BankIO\Sdk\Model\Address|null
     */
    public function getCardAcceptorAddress()
    {
        return $this->container['card_acceptor_address'];
    }

    /**
     * Sets card_acceptor_address
     *
     * @param \BankIO\Sdk\Model\Address|null $card_acceptor_address card_acceptor_address
     *
     * @return $this
     */
    public function setCardAcceptorAddress($card_acceptor_address)
    {
        $this->container['card_acceptor_address'] = $card_acceptor_address;

        return $this;
    }

    /**
     * Gets card_acceptor_phone
     *
     * @return string|null
     */
    public function getCardAcceptorPhone()
    {
        return $this->container['card_acceptor_phone'];
    }

    /**
     * Sets card_acceptor_phone
     *
     * @param string|null $card_acceptor_phone Merchant phone number It consists of a \"+\" followed by the country code (from 1 to 3 characters) then a \"-\" and finally, any combination of numbers, \"(\", \")\", \"+\" and \"-\" (up to 30 characters). pattern according to ISO20022 \\+[0-9]{1,3}-[0-9()+\\-]{1,30}
     *
     * @return $this
     */
    public function setCardAcceptorPhone($card_acceptor_phone)
    {

        if (!is_null($card_acceptor_phone) && (!preg_match("/\\+[0-9]{1,3}\\-[0-9()+\\-]{1,30}/", $card_acceptor_phone))) {
            throw new \InvalidArgumentException("invalid value for $card_acceptor_phone when calling CardTransaction., must conform to the pattern /\\+[0-9]{1,3}\\-[0-9()+\\-]{1,30}/.");
        }

        $this->container['card_acceptor_phone'] = $card_acceptor_phone;

        return $this;
    }

    /**
     * Gets merchant_category_code
     *
     * @return string|null
     */
    public function getMerchantCategoryCode()
    {
        return $this->container['merchant_category_code'];
    }

    /**
     * Sets merchant_category_code
     *
     * @param string|null $merchant_category_code Merchant category code.
     *
     * @return $this
     */
    public function setMerchantCategoryCode($merchant_category_code)
    {
        if (!is_null($merchant_category_code) && (mb_strlen($merchant_category_code) > 4)) {
            throw new \InvalidArgumentException('invalid length for $merchant_category_code when calling CardTransaction., must be smaller than or equal to 4.');
        }
        if (!is_null($merchant_category_code) && (mb_strlen($merchant_category_code) < 4)) {
            throw new \InvalidArgumentException('invalid length for $merchant_category_code when calling CardTransaction., must be bigger than or equal to 4.');
        }

        $this->container['merchant_category_code'] = $merchant_category_code;

        return $this;
    }

    /**
     * Gets masked_pan
     *
     * @return string|null
     */
    public function getMaskedPan()
    {
        return $this->container['masked_pan'];
    }

    /**
     * Sets masked_pan
     *
     * @param string|null $masked_pan Masked Primary Account Number.
     *
     * @return $this
     */
    public function setMaskedPan($masked_pan)
    {
        if (!is_null($masked_pan) && (mb_strlen($masked_pan) > 35)) {
            throw new \InvalidArgumentException('invalid length for $masked_pan when calling CardTransaction., must be smaller than or equal to 35.');
        }

        $this->container['masked_pan'] = $masked_pan;

        return $this;
    }

    /**
     * Gets transaction_details
     *
     * @return string|null
     */
    public function getTransactionDetails()
    {
        return $this->container['transaction_details'];
    }

    /**
     * Sets transaction_details
     *
     * @param string|null $transaction_details transaction_details
     *
     * @return $this
     */
    public function setTransactionDetails($transaction_details)
    {
        if (!is_null($transaction_details) && (mb_strlen($transaction_details) > 140)) {
            throw new \InvalidArgumentException('invalid length for $transaction_details when calling CardTransaction., must be smaller than or equal to 140.');
        }

        $this->container['transaction_details'] = $transaction_details;

        return $this;
    }

    /**
     * Gets invoiced
     *
     * @return bool|null
     */
    public function getInvoiced()
    {
        return $this->container['invoiced'];
    }

    /**
     * Sets invoiced
     *
     * @param bool|null $invoiced invoiced
     *
     * @return $this
     */
    public function setInvoiced($invoiced)
    {
        $this->container['invoiced'] = $invoiced;

        return $this;
    }

    /**
     * Gets proprietary_bank_transaction_code
     *
     * @return string|null
     */
    public function getProprietaryBankTransactionCode()
    {
        return $this->container['proprietary_bank_transaction_code'];
    }

    /**
     * Sets proprietary_bank_transaction_code
     *
     * @param string|null $proprietary_bank_transaction_code Proprietary bank transaction code as used within a community or within an ASPSP e.g.  for MT94x based transaction reports.
     *
     * @return $this
     */
    public function setProprietaryBankTransactionCode($proprietary_bank_transaction_code)
    {
        if (!is_null($proprietary_bank_transaction_code) && (mb_strlen($proprietary_bank_transaction_code) > 35)) {
            throw new \InvalidArgumentException('invalid length for $proprietary_bank_transaction_code when calling CardTransaction., must be smaller than or equal to 35.');
        }

        $this->container['proprietary_bank_transaction_code'] = $proprietary_bank_transaction_code;

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


