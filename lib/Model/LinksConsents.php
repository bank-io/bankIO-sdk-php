<?php
/**
 * LinksConsents
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
 * LinksConsents Class Doc Comment
 *
 * @category Class
 * @description A list of hyperlinks to be recognised by the TPP.  Type of links admitted in this response (which might be extended by single ASPSPs as indicated in its XS2A  documentation):   * &#39;scaRedirect&#39;:      In case of an SCA Redirect Approach, the ASPSP is transmitting the link to which to redirect the      PSU browser.   * &#39;scaOAuth&#39;:      In case of an OAuth2 based Redirect Approach, the ASPSP is transmitting the link where the configuration      of the OAuth2 Server is defined.      The configuration follows the OAuth 2.0 Authorisation Server Metadata specification.  * &#39;confirmation&#39;:    Might be added by the ASPSP if either the \&quot;scaRedirect\&quot; or \&quot;scaOAuth\&quot; hyperlink is returned    in the same response message.    This hyperlink defines the URL to the resource which needs to be updated with      * a confirmation code as retrieved after the plain redirect authentication process with the ASPSP authentication server or     * an access token as retrieved by submitting an authorization code after the integrated OAuth based authentication process with the ASPSP authentication server.   * &#39;startAuthorisation&#39;:      In case, where an explicit start of the transaction authorisation is needed,      but no more data needs to be updated (no authentication method to be selected,      no PSU identification nor PSU authentication data to be uploaded).   * &#39;startAuthorisationWithPsuIdentification&#39;:      The link to the authorisation end-point, where the authorisation sub-resource has to be generated      while uploading the PSU identification data.   * &#39;startAuthorisationWithPsuAuthentication&#39;:     The link to the authorisation end-point, where the authorisation sub-resource has to be generated      while uploading the PSU authentication data.   * &#39;startAuthorisationWithEncryptedPsuAuthentication&#39;:     Same as startAuthorisactionWithPsuAuthentication where the authentication data need to be encrypted on      application layer in uploading.   * &#39;startAuthorisationWithAuthenticationMethodSelection&#39;:     The link to the authorisation end-point, where the authorisation sub-resource has to be generated      while selecting the authentication method. This link is contained under exactly the same conditions      as the data element &#39;scaMethods&#39;    * &#39;startAuthorisationWithTransactionAuthorisation&#39;:     The link to the authorisation end-point, where the authorisation sub-resource has to be generated      while authorising the transaction e.g. by uploading an OTP received by SMS.   * &#39;self&#39;:      The link to the Establish Account Information Consent resource created by this request.      This link can be used to retrieve the resource data.    * &#39;status&#39;:      The link to retrieve the status of the account information consent.   * &#39;scaStatus&#39;: The link to retrieve the scaStatus of the corresponding authorisation sub-resource.      This link is only contained, if an authorisation sub-resource has been already created.
 * @package  BankIO\Sdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class LinksConsents implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = '_linksConsents';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'sca_redirect' => '\BankIO\Sdk\Model\HrefType',
        'sca_o_auth' => '\BankIO\Sdk\Model\HrefType',
        'confirmation' => '\BankIO\Sdk\Model\HrefType',
        'start_authorisation' => '\BankIO\Sdk\Model\HrefType',
        'start_authorisation_with_psu_identification' => '\BankIO\Sdk\Model\HrefType',
        'start_authorisation_with_psu_authentication' => '\BankIO\Sdk\Model\HrefType',
        'start_authorisation_with_encrypted_psu_authentication' => '\BankIO\Sdk\Model\HrefType',
        'start_authorisation_with_authentication_method_selection' => '\BankIO\Sdk\Model\HrefType',
        'start_authorisation_with_transaction_authorisation' => '\BankIO\Sdk\Model\HrefType',
        'self' => '\BankIO\Sdk\Model\HrefType',
        'status' => '\BankIO\Sdk\Model\HrefType',
        'sca_status' => '\BankIO\Sdk\Model\HrefType'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'sca_redirect' => null,
        'sca_o_auth' => null,
        'confirmation' => null,
        'start_authorisation' => null,
        'start_authorisation_with_psu_identification' => null,
        'start_authorisation_with_psu_authentication' => null,
        'start_authorisation_with_encrypted_psu_authentication' => null,
        'start_authorisation_with_authentication_method_selection' => null,
        'start_authorisation_with_transaction_authorisation' => null,
        'self' => null,
        'status' => null,
        'sca_status' => null
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
        'sca_redirect' => 'scaRedirect',
        'sca_o_auth' => 'scaOAuth',
        'confirmation' => 'confirmation',
        'start_authorisation' => 'startAuthorisation',
        'start_authorisation_with_psu_identification' => 'startAuthorisationWithPsuIdentification',
        'start_authorisation_with_psu_authentication' => 'startAuthorisationWithPsuAuthentication',
        'start_authorisation_with_encrypted_psu_authentication' => 'startAuthorisationWithEncryptedPsuAuthentication',
        'start_authorisation_with_authentication_method_selection' => 'startAuthorisationWithAuthenticationMethodSelection',
        'start_authorisation_with_transaction_authorisation' => 'startAuthorisationWithTransactionAuthorisation',
        'self' => 'self',
        'status' => 'status',
        'sca_status' => 'scaStatus'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'sca_redirect' => 'setScaRedirect',
        'sca_o_auth' => 'setScaOAuth',
        'confirmation' => 'setConfirmation',
        'start_authorisation' => 'setStartAuthorisation',
        'start_authorisation_with_psu_identification' => 'setStartAuthorisationWithPsuIdentification',
        'start_authorisation_with_psu_authentication' => 'setStartAuthorisationWithPsuAuthentication',
        'start_authorisation_with_encrypted_psu_authentication' => 'setStartAuthorisationWithEncryptedPsuAuthentication',
        'start_authorisation_with_authentication_method_selection' => 'setStartAuthorisationWithAuthenticationMethodSelection',
        'start_authorisation_with_transaction_authorisation' => 'setStartAuthorisationWithTransactionAuthorisation',
        'self' => 'setSelf',
        'status' => 'setStatus',
        'sca_status' => 'setScaStatus'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'sca_redirect' => 'getScaRedirect',
        'sca_o_auth' => 'getScaOAuth',
        'confirmation' => 'getConfirmation',
        'start_authorisation' => 'getStartAuthorisation',
        'start_authorisation_with_psu_identification' => 'getStartAuthorisationWithPsuIdentification',
        'start_authorisation_with_psu_authentication' => 'getStartAuthorisationWithPsuAuthentication',
        'start_authorisation_with_encrypted_psu_authentication' => 'getStartAuthorisationWithEncryptedPsuAuthentication',
        'start_authorisation_with_authentication_method_selection' => 'getStartAuthorisationWithAuthenticationMethodSelection',
        'start_authorisation_with_transaction_authorisation' => 'getStartAuthorisationWithTransactionAuthorisation',
        'self' => 'getSelf',
        'status' => 'getStatus',
        'sca_status' => 'getScaStatus'
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
        $this->container['sca_redirect'] = isset($data['sca_redirect']) ? $data['sca_redirect'] : null;
        $this->container['sca_o_auth'] = isset($data['sca_o_auth']) ? $data['sca_o_auth'] : null;
        $this->container['confirmation'] = isset($data['confirmation']) ? $data['confirmation'] : null;
        $this->container['start_authorisation'] = isset($data['start_authorisation']) ? $data['start_authorisation'] : null;
        $this->container['start_authorisation_with_psu_identification'] = isset($data['start_authorisation_with_psu_identification']) ? $data['start_authorisation_with_psu_identification'] : null;
        $this->container['start_authorisation_with_psu_authentication'] = isset($data['start_authorisation_with_psu_authentication']) ? $data['start_authorisation_with_psu_authentication'] : null;
        $this->container['start_authorisation_with_encrypted_psu_authentication'] = isset($data['start_authorisation_with_encrypted_psu_authentication']) ? $data['start_authorisation_with_encrypted_psu_authentication'] : null;
        $this->container['start_authorisation_with_authentication_method_selection'] = isset($data['start_authorisation_with_authentication_method_selection']) ? $data['start_authorisation_with_authentication_method_selection'] : null;
        $this->container['start_authorisation_with_transaction_authorisation'] = isset($data['start_authorisation_with_transaction_authorisation']) ? $data['start_authorisation_with_transaction_authorisation'] : null;
        $this->container['self'] = isset($data['self']) ? $data['self'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['sca_status'] = isset($data['sca_status']) ? $data['sca_status'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = parent::listInvalidProperties();

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
     * Gets sca_redirect
     *
     * @return \BankIO\Sdk\Model\HrefType|null
     */
    public function getScaRedirect()
    {
        return $this->container['sca_redirect'];
    }

    /**
     * Sets sca_redirect
     *
     * @param \BankIO\Sdk\Model\HrefType|null $sca_redirect sca_redirect
     *
     * @return $this
     */
    public function setScaRedirect($sca_redirect)
    {
        $this->container['sca_redirect'] = $sca_redirect;

        return $this;
    }

    /**
     * Gets sca_o_auth
     *
     * @return \BankIO\Sdk\Model\HrefType|null
     */
    public function getScaOAuth()
    {
        return $this->container['sca_o_auth'];
    }

    /**
     * Sets sca_o_auth
     *
     * @param \BankIO\Sdk\Model\HrefType|null $sca_o_auth sca_o_auth
     *
     * @return $this
     */
    public function setScaOAuth($sca_o_auth)
    {
        $this->container['sca_o_auth'] = $sca_o_auth;

        return $this;
    }

    /**
     * Gets confirmation
     *
     * @return \BankIO\Sdk\Model\HrefType|null
     */
    public function getConfirmation()
    {
        return $this->container['confirmation'];
    }

    /**
     * Sets confirmation
     *
     * @param \BankIO\Sdk\Model\HrefType|null $confirmation confirmation
     *
     * @return $this
     */
    public function setConfirmation($confirmation)
    {
        $this->container['confirmation'] = $confirmation;

        return $this;
    }

    /**
     * Gets start_authorisation
     *
     * @return \BankIO\Sdk\Model\HrefType|null
     */
    public function getStartAuthorisation()
    {
        return $this->container['start_authorisation'];
    }

    /**
     * Sets start_authorisation
     *
     * @param \BankIO\Sdk\Model\HrefType|null $start_authorisation start_authorisation
     *
     * @return $this
     */
    public function setStartAuthorisation($start_authorisation)
    {
        $this->container['start_authorisation'] = $start_authorisation;

        return $this;
    }

    /**
     * Gets start_authorisation_with_psu_identification
     *
     * @return \BankIO\Sdk\Model\HrefType|null
     */
    public function getStartAuthorisationWithPsuIdentification()
    {
        return $this->container['start_authorisation_with_psu_identification'];
    }

    /**
     * Sets start_authorisation_with_psu_identification
     *
     * @param \BankIO\Sdk\Model\HrefType|null $start_authorisation_with_psu_identification start_authorisation_with_psu_identification
     *
     * @return $this
     */
    public function setStartAuthorisationWithPsuIdentification($start_authorisation_with_psu_identification)
    {
        $this->container['start_authorisation_with_psu_identification'] = $start_authorisation_with_psu_identification;

        return $this;
    }

    /**
     * Gets start_authorisation_with_psu_authentication
     *
     * @return \BankIO\Sdk\Model\HrefType|null
     */
    public function getStartAuthorisationWithPsuAuthentication()
    {
        return $this->container['start_authorisation_with_psu_authentication'];
    }

    /**
     * Sets start_authorisation_with_psu_authentication
     *
     * @param \BankIO\Sdk\Model\HrefType|null $start_authorisation_with_psu_authentication start_authorisation_with_psu_authentication
     *
     * @return $this
     */
    public function setStartAuthorisationWithPsuAuthentication($start_authorisation_with_psu_authentication)
    {
        $this->container['start_authorisation_with_psu_authentication'] = $start_authorisation_with_psu_authentication;

        return $this;
    }

    /**
     * Gets start_authorisation_with_encrypted_psu_authentication
     *
     * @return \BankIO\Sdk\Model\HrefType|null
     */
    public function getStartAuthorisationWithEncryptedPsuAuthentication()
    {
        return $this->container['start_authorisation_with_encrypted_psu_authentication'];
    }

    /**
     * Sets start_authorisation_with_encrypted_psu_authentication
     *
     * @param \BankIO\Sdk\Model\HrefType|null $start_authorisation_with_encrypted_psu_authentication start_authorisation_with_encrypted_psu_authentication
     *
     * @return $this
     */
    public function setStartAuthorisationWithEncryptedPsuAuthentication($start_authorisation_with_encrypted_psu_authentication)
    {
        $this->container['start_authorisation_with_encrypted_psu_authentication'] = $start_authorisation_with_encrypted_psu_authentication;

        return $this;
    }

    /**
     * Gets start_authorisation_with_authentication_method_selection
     *
     * @return \BankIO\Sdk\Model\HrefType|null
     */
    public function getStartAuthorisationWithAuthenticationMethodSelection()
    {
        return $this->container['start_authorisation_with_authentication_method_selection'];
    }

    /**
     * Sets start_authorisation_with_authentication_method_selection
     *
     * @param \BankIO\Sdk\Model\HrefType|null $start_authorisation_with_authentication_method_selection start_authorisation_with_authentication_method_selection
     *
     * @return $this
     */
    public function setStartAuthorisationWithAuthenticationMethodSelection($start_authorisation_with_authentication_method_selection)
    {
        $this->container['start_authorisation_with_authentication_method_selection'] = $start_authorisation_with_authentication_method_selection;

        return $this;
    }

    /**
     * Gets start_authorisation_with_transaction_authorisation
     *
     * @return \BankIO\Sdk\Model\HrefType|null
     */
    public function getStartAuthorisationWithTransactionAuthorisation()
    {
        return $this->container['start_authorisation_with_transaction_authorisation'];
    }

    /**
     * Sets start_authorisation_with_transaction_authorisation
     *
     * @param \BankIO\Sdk\Model\HrefType|null $start_authorisation_with_transaction_authorisation start_authorisation_with_transaction_authorisation
     *
     * @return $this
     */
    public function setStartAuthorisationWithTransactionAuthorisation($start_authorisation_with_transaction_authorisation)
    {
        $this->container['start_authorisation_with_transaction_authorisation'] = $start_authorisation_with_transaction_authorisation;

        return $this;
    }

    /**
     * Gets self
     *
     * @return \BankIO\Sdk\Model\HrefType|null
     */
    public function getSelf()
    {
        return $this->container['self'];
    }

    /**
     * Sets self
     *
     * @param \BankIO\Sdk\Model\HrefType|null $self self
     *
     * @return $this
     */
    public function setSelf($self)
    {
        $this->container['self'] = $self;

        return $this;
    }

    /**
     * Gets status
     *
     * @return \BankIO\Sdk\Model\HrefType|null
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param \BankIO\Sdk\Model\HrefType|null $status status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets sca_status
     *
     * @return \BankIO\Sdk\Model\HrefType|null
     */
    public function getScaStatus()
    {
        return $this->container['sca_status'];
    }

    /**
     * Sets sca_status
     *
     * @param \BankIO\Sdk\Model\HrefType|null $sca_status sca_status
     *
     * @return $this
     */
    public function setScaStatus($sca_status)
    {
        $this->container['sca_status'] = $sca_status;

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


