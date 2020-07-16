# BankIO\Sdk\ConfirmationOfFundsServicePIISApi

All URIs are relative to *https://ob.bankio.ro*

Method | HTTP request | Description
------------- | ------------- | -------------
[**checkAvailabilityOfFunds**](ConfirmationOfFundsServicePIISApi.md#checkAvailabilityOfFunds) | **POST** /api/org/{organisation}/v1/funds-confirmations | Confirmation of funds request



## checkAvailabilityOfFunds

> \BankIO\Sdk\Model\InlineResponse2003 checkAvailabilityOfFunds($organisation, $x_request_id, $confirmation_of_funds, $authorization, $digest, $signature, $tpp_signature_certificate)

Confirmation of funds request

Creates a confirmation of funds request at the ASPSP. Checks whether a specific amount is available at point of time of the request on an account linked to a given tuple card issuer(TPP)/card number, or addressed by IBAN and TPP respectively. If the related extended services are used a conditional Consent-ID is contained in the header. This field is contained but commented out in this specification.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new BankIO\Sdk\Api\ConfirmationOfFundsServicePIISApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$organisation = 'organisation_example'; // string | This identification is denoting the addressed bankIO organisation. The organisation is the \"name\" attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent.
$x_request_id = '99391c7e-ad88-49ec-a2ad-99ddcb1f7721'; // string | ID of the request, unique to the call, as determined by the initiating party.
$confirmation_of_funds = new \BankIO\Sdk\Model\ConfirmationOfFunds(); // \BankIO\Sdk\Model\ConfirmationOfFunds | Request body for a confirmation of funds request.
$authorization = 'authorization_example'; // string | This field  might be used in case where a consent was agreed between ASPSP and PSU through an OAuth2 based protocol,  facilitated by the TPP.
$digest = 'SHA-256=hl1/Eps8BEQW58FJhDApwJXjGY4nr1ArGDHIT25vq6A='; // string | Is contained if and only if the \"Signature\" element is contained in the header of the request.
$signature = 'keyId="SN=9FA1,CA=CN=D-TRUST%20CA%202-1%202015,O=D-Trust%20GmbH,C=DE",algorithm="rsa-sha256", headers="Digest X-Request-ID PSU-ID TPP-Redirect-URI Date", signature="Base64(RSA-SHA256(signing string))"'
; // string | A signature of the request by the TPP on application level. This might be mandated by ASPSP.
$tpp_signature_certificate = 'tpp_signature_certificate_example'; // string | The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained.

try {
    $result = $apiInstance->checkAvailabilityOfFunds($organisation, $x_request_id, $confirmation_of_funds, $authorization, $digest, $signature, $tpp_signature_certificate);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConfirmationOfFundsServicePIISApi->checkAvailabilityOfFunds: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **organisation** | **string**| This identification is denoting the addressed bankIO organisation. The organisation is the \&quot;name\&quot; attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **x_request_id** | [**string**](../Model/.md)| ID of the request, unique to the call, as determined by the initiating party. |
 **confirmation_of_funds** | [**\BankIO\Sdk\Model\ConfirmationOfFunds**](../Model/ConfirmationOfFunds.md)| Request body for a confirmation of funds request. |
 **authorization** | **string**| This field  might be used in case where a consent was agreed between ASPSP and PSU through an OAuth2 based protocol,  facilitated by the TPP. | [optional]
 **digest** | **string**| Is contained if and only if the \&quot;Signature\&quot; element is contained in the header of the request. | [optional]
 **signature** | **string**| A signature of the request by the TPP on application level. This might be mandated by ASPSP. | [optional]
 **tpp_signature_certificate** | **string**| The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained. | [optional]

### Return type

[**\BankIO\Sdk\Model\InlineResponse2003**](../Model/InlineResponse2003.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json, application/problem+json, 

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)

