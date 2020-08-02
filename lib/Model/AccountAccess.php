<?php
/**
 * AccountAccess
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
 * AccountAccess Class Doc Comment
 *
 * @category Class
 * @description Requested access services for a consent.
 * @package  BankIO\Sdk
 * @author   bankIO
 * @link     https://bankio.co.uk/bankio-link/
 */
class AccountAccess implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'accountAccess';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'accounts' => '\BankIO\Sdk\Model\AccountReference[]',
        'balances' => '\BankIO\Sdk\Model\AccountReference[]',
        'transactions' => '\BankIO\Sdk\Model\AccountReference[]',
        'additional_information' => '\BankIO\Sdk\Model\AdditionalInformationAccess',
        'available_accounts' => 'string',
        'available_accounts_with_balance' => 'string',
        'all_psd2' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'accounts' => null,
        'balances' => null,
        'transactions' => null,
        'additional_information' => null,
        'available_accounts' => null,
        'available_accounts_with_balance' => null,
        'all_psd2' => null
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
        'accounts' => 'accounts',
        'balances' => 'balances',
        'transactions' => 'transactions',
        'additional_information' => 'additionalInformation',
        'available_accounts' => 'availableAccounts',
        'available_accounts_with_balance' => 'availableAccountsWithBalance',
        'all_psd2' => 'allPsd2'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'accounts' => 'setAccounts',
        'balances' => 'setBalances',
        'transactions' => 'setTransactions',
        'additional_information' => 'setAdditionalInformation',
        'available_accounts' => 'setAvailableAccounts',
        'available_accounts_with_balance' => 'setAvailableAccountsWithBalance',
        'all_psd2' => 'setAllPsd2'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'accounts' => 'getAccounts',
        'balances' => 'getBalances',
        'transactions' => 'getTransactions',
        'additional_information' => 'getAdditionalInformation',
        'available_accounts' => 'getAvailableAccounts',
        'available_accounts_with_balance' => 'getAvailableAccountsWithBalance',
        'all_psd2' => 'getAllPsd2'
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

    const AVAILABLE_ACCOUNTS_ALL_ACCOUNTS = 'allAccounts';
    const AVAILABLE_ACCOUNTS_ALL_ACCOUNTS_WITH_OWNER_NAME = 'allAccountsWithOwnerName';
    const AVAILABLE_ACCOUNTS_WITH_BALANCE_ALL_ACCOUNTS = 'allAccounts';
    const AVAILABLE_ACCOUNTS_WITH_BALANCE_ALL_ACCOUNTS_WITH_OWNER_NAME = 'allAccountsWithOwnerName';
    const ALL_PSD2_ALL_ACCOUNTS = 'allAccounts';
    const ALL_PSD2_ALL_ACCOUNTS_WITH_OWNER_NAME = 'allAccountsWithOwnerName';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getAvailableAccountsAllowableValues()
    {
        return [
            self::AVAILABLE_ACCOUNTS_ALL_ACCOUNTS,
            self::AVAILABLE_ACCOUNTS_ALL_ACCOUNTS_WITH_OWNER_NAME,
        ];
    }
    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getAvailableAccountsWithBalanceAllowableValues()
    {
        return [
            self::AVAILABLE_ACCOUNTS_WITH_BALANCE_ALL_ACCOUNTS,
            self::AVAILABLE_ACCOUNTS_WITH_BALANCE_ALL_ACCOUNTS_WITH_OWNER_NAME,
        ];
    }
    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getAllPsd2AllowableValues()
    {
        return [
            self::ALL_PSD2_ALL_ACCOUNTS,
            self::ALL_PSD2_ALL_ACCOUNTS_WITH_OWNER_NAME,
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
        $this->container['accounts'] = isset($data['accounts']) ? $data['accounts'] : null;
        $this->container['balances'] = isset($data['balances']) ? $data['balances'] : null;
        $this->container['transactions'] = isset($data['transactions']) ? $data['transactions'] : null;
        $this->container['additional_information'] = isset($data['additional_information']) ? $data['additional_information'] : null;
        $this->container['available_accounts'] = isset($data['available_accounts']) ? $data['available_accounts'] : null;
        $this->container['available_accounts_with_balance'] = isset($data['available_accounts_with_balance']) ? $data['available_accounts_with_balance'] : null;
        $this->container['all_psd2'] = isset($data['all_psd2']) ? $data['all_psd2'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getAvailableAccountsAllowableValues();
        if (!is_null($this->container['available_accounts']) && !in_array($this->container['available_accounts'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'available_accounts', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getAvailableAccountsWithBalanceAllowableValues();
        if (!is_null($this->container['available_accounts_with_balance']) && !in_array($this->container['available_accounts_with_balance'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'available_accounts_with_balance', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getAllPsd2AllowableValues();
        if (!is_null($this->container['all_psd2']) && !in_array($this->container['all_psd2'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'all_psd2', must be one of '%s'",
                implode("', '", $allowedValues)
            );
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
     * Gets accounts
     *
     * @return \BankIO\Sdk\Model\AccountReference[]|null
     */
    public function getAccounts()
    {
        return $this->container['accounts'];
    }

    /**
     * Sets accounts
     *
     * @param \BankIO\Sdk\Model\AccountReference[]|null $accounts Is asking for detailed account information.   If the array is empty in a request, the TPP is asking for an accessible account list.  This may be restricted in a PSU/ASPSP authorization dialogue.  If the array is empty, also the arrays for balances, additionalInformation sub attributes or transactions shall be empty, if used.
     *
     * @return $this
     */
    public function setAccounts($accounts)
    {
        $this->container['accounts'] = $accounts;

        return $this;
    }

    /**
     * Gets balances
     *
     * @return \BankIO\Sdk\Model\AccountReference[]|null
     */
    public function getBalances()
    {
        return $this->container['balances'];
    }

    /**
     * Sets balances
     *
     * @param \BankIO\Sdk\Model\AccountReference[]|null $balances Is asking for balances of the addressed accounts.  If the array is empty in the request, the TPP is asking for the balances of all accessible account lists.  This may be restricted in a PSU/ASPSP authorization dialogue.  If the array is empty, also the arrays for accounts, additionalInformation sub attributes or transactions shall be empty, if used.
     *
     * @return $this
     */
    public function setBalances($balances)
    {
        $this->container['balances'] = $balances;

        return $this;
    }

    /**
     * Gets transactions
     *
     * @return \BankIO\Sdk\Model\AccountReference[]|null
     */
    public function getTransactions()
    {
        return $this->container['transactions'];
    }

    /**
     * Sets transactions
     *
     * @param \BankIO\Sdk\Model\AccountReference[]|null $transactions Is asking for transactions of the addressed accounts.   If the array is empty in the request, the TPP is asking for the transactions of all accessible account lists.  This may be restricted in a PSU/ASPSP authorization dialogue.  If the array is empty, also the arrays for accounts, additionalInformation sub attributes or balances shall be empty, if used.
     *
     * @return $this
     */
    public function setTransactions($transactions)
    {
        $this->container['transactions'] = $transactions;

        return $this;
    }

    /**
     * Gets additional_information
     *
     * @return \BankIO\Sdk\Model\AdditionalInformationAccess|null
     */
    public function getAdditionalInformation()
    {
        return $this->container['additional_information'];
    }

    /**
     * Sets additional_information
     *
     * @param \BankIO\Sdk\Model\AdditionalInformationAccess|null $additional_information additional_information
     *
     * @return $this
     */
    public function setAdditionalInformation($additional_information)
    {
        $this->container['additional_information'] = $additional_information;

        return $this;
    }

    /**
     * Gets available_accounts
     *
     * @return string|null
     */
    public function getAvailableAccounts()
    {
        return $this->container['available_accounts'];
    }

    /**
     * Sets available_accounts
     *
     * @param string|null $available_accounts Optional if supported by API provider.  The values \"allAccounts\" and \"allAccountsWithOwnerName\" are admitted.  The support of the \"allAccountsWithOwnerName\" value by the ASPSP is optional.
     *
     * @return $this
     */
    public function setAvailableAccounts($available_accounts)
    {
        $allowedValues = $this->getAvailableAccountsAllowableValues();
        if (!is_null($available_accounts) && !in_array($available_accounts, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'available_accounts', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['available_accounts'] = $available_accounts;

        return $this;
    }

    /**
     * Gets available_accounts_with_balance
     *
     * @return string|null
     */
    public function getAvailableAccountsWithBalance()
    {
        return $this->container['available_accounts_with_balance'];
    }

    /**
     * Sets available_accounts_with_balance
     *
     * @param string|null $available_accounts_with_balance Optional if supported by API provider.  The values \"allAccounts\" and \"allAccountsWithOwnerName\" are admitted.  The support of the \"allAccountsWithOwnerName\" value by the ASPSP is optional.
     *
     * @return $this
     */
    public function setAvailableAccountsWithBalance($available_accounts_with_balance)
    {
        $allowedValues = $this->getAvailableAccountsWithBalanceAllowableValues();
        if (!is_null($available_accounts_with_balance) && !in_array($available_accounts_with_balance, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'available_accounts_with_balance', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['available_accounts_with_balance'] = $available_accounts_with_balance;

        return $this;
    }

    /**
     * Gets all_psd2
     *
     * @return string|null
     */
    public function getAllPsd2()
    {
        return $this->container['all_psd2'];
    }

    /**
     * Sets all_psd2
     *
     * @param string|null $all_psd2 Optional if supported by API provider.  The values \"allAccounts\" and \"allAccountsWithOwnerName\" are admitted.  The support of the \"allAccountsWithOwnerName\" value by the ASPSP is optional.
     *
     * @return $this
     */
    public function setAllPsd2($all_psd2)
    {
        $allowedValues = $this->getAllPsd2AllowableValues();
        if (!is_null($all_psd2) && !in_array($all_psd2, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'all_psd2', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['all_psd2'] = $all_psd2;

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


