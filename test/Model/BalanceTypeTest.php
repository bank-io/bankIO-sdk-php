<?php
/**
 * BalanceTypeTest
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
 * Please update the test case below to test the model.
 */

namespace BankIO\Sdk;

use PHPUnit\Framework\TestCase;

/**
 * BalanceTypeTest Class Doc Comment
 *
 * @category    Class
 * @description The following balance types are defined:   - \&quot;closingBooked\&quot;:      Balance of the account at the end of the pre-agreed account reporting period.      It is the sum of the opening booked balance at the beginning of the period and all entries booked      to the account during the pre-agreed account reporting period.          For card-accounts, this is composed of            - invoiced, but not yet paid entries        - \&quot;expected\&quot;:     Balance composed of booked entries and pending items known at the time of calculation,      which projects the end of day balance if everything is booked on the account and no other entry is posted.          For card accounts, this is composed of:       - invoiced, but not yet paid entries       - not yet invoiced but already booked entries and       - pending items (not yet booked)          For card-accounts:          \&quot;money to spend with the value of a pre-approved credit limit on the card account\&quot;        - \&quot;openingBooked\&quot;:     Book balance of the account at the beginning of the account reporting period.      It always equals the closing book balance from the previous report.   - \&quot;interimAvailable\&quot;:     Available balance calculated in the course of the account ?servicer?s business day,      at the time specified, and subject to further changes during the business day.      The interim balance is calculated on the basis of booked credit and debit items during the calculation      time/period specified.          For card-accounts, this is composed of:       - invoiced, but not yet paid entries       - not yet invoiced but already booked entries   - \&quot;interimBooked\&quot;:     Balance calculated in the course of the account servicer&#39;s business day, at the time specified,      and subject to further changes during the business day.      The interim balance is calculated on the basis of booked credit and debit items during the calculation time/period      specified.   - \&quot;forwardAvailable\&quot;:     Forward available balance of money that is at the disposal of the account owner on the date specified.   - \&quot;nonInvoiced\&quot;:      Only for card accounts, to be checked yet.
 * @package     BankIO\Sdk
 * @author      OpenAPI Generator team
 * @link        https://openapi-generator.tech
 */
class BalanceTypeTest extends TestCase
{

    /**
     * Setup before running any test case
     */
    public static function setUpBeforeClass(): void
    {
    }

    /**
     * Setup before running each test case
     */
    public function setUp(): void
    {
    }

    /**
     * Clean up after running each test case
     */
    public function tearDown(): void
    {
    }

    /**
     * Clean up after running all test cases
     */
    public static function tearDownAfterClass(): void
    {
    }

    /**
     * Test "BalanceType"
     */
    public function testBalanceType()
    {
    }
}
