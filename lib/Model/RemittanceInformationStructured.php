<?php
/**
 * RemittanceInformationStructured
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
 * RemittanceInformationStructured Class Doc Comment
 *
 * @category Class
 * @description Structured remittance information.
 * @package  BankIO\Sdk
 * @author   bankIO
 * @link     https://bankio.co.uk/bankio-link/
 */
class RemittanceInformationStructured implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'remittanceInformationStructured';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'reference' => 'string',
        'reference_type' => 'string',
        'reference_issuer' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'reference' => null,
        'reference_type' => null,
        'reference_issuer' => null
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
        'reference' => 'reference',
        'reference_type' => 'referenceType',
        'reference_issuer' => 'referenceIssuer'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'reference' => 'setReference',
        'reference_type' => 'setReferenceType',
        'reference_issuer' => 'setReferenceIssuer'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'reference' => 'getReference',
        'reference_type' => 'getReferenceType',
        'reference_issuer' => 'getReferenceIssuer'
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
        $this->container['reference'] = isset($data['reference']) ? $data['reference'] : null;
        $this->container['reference_type'] = isset($data['reference_type']) ? $data['reference_type'] : null;
        $this->container['reference_issuer'] = isset($data['reference_issuer']) ? $data['reference_issuer'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['reference'] === null) {
            $invalidProperties[] = "'reference' can't be null";
        }
        if ((mb_strlen($this->container['reference']) > 35)) {
            $invalidProperties[] = "invalid value for 'reference', the character length must be smaller than or equal to 35.";
        }

        if (!is_null($this->container['reference_type']) && (mb_strlen($this->container['reference_type']) > 35)) {
            $invalidProperties[] = "invalid value for 'reference_type', the character length must be smaller than or equal to 35.";
        }

        if (!is_null($this->container['reference_issuer']) && (mb_strlen($this->container['reference_issuer']) > 35)) {
            $invalidProperties[] = "invalid value for 'reference_issuer', the character length must be smaller than or equal to 35.";
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
     * Gets reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->container['reference'];
    }

    /**
     * Sets reference
     *
     * @param string $reference reference
     *
     * @return $this
     */
    public function setReference($reference)
    {
        if ((mb_strlen($reference) > 35)) {
            throw new \InvalidArgumentException('invalid length for $reference when calling RemittanceInformationStructured., must be smaller than or equal to 35.');
        }

        $this->container['reference'] = $reference;

        return $this;
    }

    /**
     * Gets reference_type
     *
     * @return string|null
     */
    public function getReferenceType()
    {
        return $this->container['reference_type'];
    }

    /**
     * Sets reference_type
     *
     * @param string|null $reference_type reference_type
     *
     * @return $this
     */
    public function setReferenceType($reference_type)
    {
        if (!is_null($reference_type) && (mb_strlen($reference_type) > 35)) {
            throw new \InvalidArgumentException('invalid length for $reference_type when calling RemittanceInformationStructured., must be smaller than or equal to 35.');
        }

        $this->container['reference_type'] = $reference_type;

        return $this;
    }

    /**
     * Gets reference_issuer
     *
     * @return string|null
     */
    public function getReferenceIssuer()
    {
        return $this->container['reference_issuer'];
    }

    /**
     * Sets reference_issuer
     *
     * @param string|null $reference_issuer reference_issuer
     *
     * @return $this
     */
    public function setReferenceIssuer($reference_issuer)
    {
        if (!is_null($reference_issuer) && (mb_strlen($reference_issuer) > 35)) {
            throw new \InvalidArgumentException('invalid length for $reference_issuer when calling RemittanceInformationStructured., must be smaller than or equal to 35.');
        }

        $this->container['reference_issuer'] = $reference_issuer;

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


