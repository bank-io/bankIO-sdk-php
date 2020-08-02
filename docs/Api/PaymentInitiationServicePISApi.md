# BankIO\Sdk\PaymentInitiationServicePISApi

All URIs are relative to *https://ob.bankio.ro*

Method | HTTP request | Description
------------- | ------------- | -------------
[**cancelPayment**](PaymentInitiationServicePISApi.md#cancelPayment) | **DELETE** /api/org/{organisation}/v1/{payment-service}/{payment-product}/{paymentId} | Payment cancellation request
[**getPaymentCancellationScaStatus**](PaymentInitiationServicePISApi.md#getPaymentCancellationScaStatus) | **GET** /api/org/{organisation}/v1/{payment-service}/{payment-product}/{paymentId}/cancellation-authorisations/{authorisationId} | Read the SCA status of the payment cancellation&#39;s authorisation
[**getPaymentInformation**](PaymentInitiationServicePISApi.md#getPaymentInformation) | **GET** /api/org/{organisation}/v1/{payment-service}/{payment-product}/{paymentId} | Get payment information
[**getPaymentInitiationAuthorisation**](PaymentInitiationServicePISApi.md#getPaymentInitiationAuthorisation) | **GET** /api/org/{organisation}/v1/{payment-service}/{payment-product}/{paymentId}/authorisations | Get payment initiation authorisation sub-resources request
[**getPaymentInitiationCancellationAuthorisationInformation**](PaymentInitiationServicePISApi.md#getPaymentInitiationCancellationAuthorisationInformation) | **GET** /api/org/{organisation}/v1/{payment-service}/{payment-product}/{paymentId}/cancellation-authorisations | Will deliver an array of resource identifications to all generated cancellation authorisation sub-resources
[**getPaymentInitiationScaStatus**](PaymentInitiationServicePISApi.md#getPaymentInitiationScaStatus) | **GET** /api/org/{organisation}/v1/{payment-service}/{payment-product}/{paymentId}/authorisations/{authorisationId} | Read the SCA status of the payment authorisation
[**getPaymentInitiationStatus**](PaymentInitiationServicePISApi.md#getPaymentInitiationStatus) | **GET** /api/org/{organisation}/v1/{payment-service}/{payment-product}/{paymentId}/status | Payment initiation status request
[**initiatePayment**](PaymentInitiationServicePISApi.md#initiatePayment) | **POST** /api/org/{organisation}/v1/{payment-service}/{payment-product} | Payment initiation request
[**startPaymentAuthorisation**](PaymentInitiationServicePISApi.md#startPaymentAuthorisation) | **POST** /api/org/{organisation}/v1/{payment-service}/{payment-product}/{paymentId}/authorisations | Start the authorisation process for a payment initiation
[**startPaymentInitiationCancellationAuthorisation**](PaymentInitiationServicePISApi.md#startPaymentInitiationCancellationAuthorisation) | **POST** /api/org/{organisation}/v1/{payment-service}/{payment-product}/{paymentId}/cancellation-authorisations | Start the authorisation process for the cancellation of the addressed payment
[**updatePaymentCancellationPsuData**](PaymentInitiationServicePISApi.md#updatePaymentCancellationPsuData) | **PUT** /api/org/{organisation}/v1/{payment-service}/{payment-product}/{paymentId}/cancellation-authorisations/{authorisationId} | Update PSU data for payment initiation cancellation
[**updatePaymentPsuData**](PaymentInitiationServicePISApi.md#updatePaymentPsuData) | **PUT** /api/org/{organisation}/v1/{payment-service}/{payment-product}/{paymentId}/authorisations/{authorisationId} | Update PSU data for payment initiation



## cancelPayment

> \BankIO\Sdk\Model\PaymentInitiationCancelResponse202 cancelPayment($organisation, $payment_service, $payment_product, $payment_id, $x_request_id, $digest, $signature, $tpp_signature_certificate, $tpp_redirect_preferred, $tpp_nok_redirect_uri, $tpp_redirect_uri, $tpp_explicit_authorisation_preferred, $psu_ip_address, $psu_ip_port, $psu_accept, $psu_accept_charset, $psu_accept_encoding, $psu_accept_language, $psu_user_agent, $psu_http_method, $psu_device_id, $psu_geo_location)

Payment cancellation request

This method initiates the cancellation of a payment.  Depending on the payment-service, the payment-product and the ASPSP's implementation,  this TPP call might be sufficient to cancel a payment.  If an authorisation of the payment cancellation is mandated by the ASPSP,  a corresponding hyperlink will be contained in the response message.  Cancels the addressed payment with resource identification paymentId if applicable to the payment-service, payment-product and received in product related timelines (e.g. before end of business day for scheduled payments of the last business day before the scheduled execution day).   The response to this DELETE command will tell the TPP whether the   * access method was rejected,   * access method was successful, or   * access method is generally applicable, but further authorisation processes are needed.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oAuth2AuthCode
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$client = HttpClientDiscovery::find();
$apiInstance = new BankIO\Sdk\Api\PaymentInitiationServicePISApi(
    // If you want use custom http client, pass your client which implements `Http\Client\HttpClient`.
    // This is optional, `HTTPlug` will be used as default.
    $client,
    $config
);
$associate_array['organisation'] = 'organisation_example'; // string | This identification is denoting the addressed bankIO organisation. The organisation is the \"name\" attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['payment_service'] = 'payment_service_example'; // string | Payment service:  Possible values are: * payments * bulk-payments * periodic-payments
$associate_array['payment_product'] = 'payment_product_example'; // string | The addressed payment product endpoint, e.g. for SEPA Credit Transfers (SCT). The ASPSP will publish which of the payment products/endpoints will be supported.  The following payment products are supported:   - sepa-credit-transfers   - instant-sepa-credit-transfers   - target-2-payments   - cross-border-credit-transfers   - pain.001-sepa-credit-transfers   - pain.001-instant-sepa-credit-transfers   - pain.001-target-2-payments   - pain.001-cross-border-credit-transfers  **Remark:** For all SEPA Credit Transfer based endpoints which accept XML encoding,  the XML pain.001 schemes provided by EPC are supported by the ASPSP as a minimum for the body content.  Further XML schemes might be supported by some communities.  **Remark:** For cross-border and TARGET-2 payments only community wide pain.001 schemes do exist.  There are plenty of country specificic scheme variants.
$associate_array['payment_id'] = 'payment_id_example'; // string | Resource identification of the generated payment initiation resource.
$associate_array['x_request_id'] = '99391c7e-ad88-49ec-a2ad-99ddcb1f7721'; // string | ID of the request, unique to the call, as determined by the initiating party.
$associate_array['digest'] = 'SHA-256=hl1/Eps8BEQW58FJhDApwJXjGY4nr1ArGDHIT25vq6A='; // string | Is contained if and only if the \"Signature\" element is contained in the header of the request.
$associate_array['signature'] = 'keyId="SN=9FA1,CA=CN=D-TRUST%20CA%202-1%202015,O=D-Trust%20GmbH,C=DE",algorithm="rsa-sha256", headers="Digest X-Request-ID PSU-ID TPP-Redirect-URI Date", signature="Base64(RSA-SHA256(signing string))"'
; // string | A signature of the request by the TPP on application level. This might be mandated by ASPSP.
$associate_array['tpp_signature_certificate'] = 'tpp_signature_certificate_example'; // string | The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained.
$associate_array['tpp_redirect_preferred'] = True; // bool | If it equals \"true\", the TPP prefers a redirect over an embedded SCA approach. If it equals \"false\", the TPP prefers not to be redirected for SCA. The ASPSP will then choose between the Embedded or the Decoupled SCA approach, depending on the choice of the SCA procedure by the TPP/PSU. If the parameter is not used, the ASPSP will choose the SCA approach to be applied depending on the SCA method chosen by the TPP/PSU.
$associate_array['tpp_nok_redirect_uri'] = 'tpp_nok_redirect_uri_example'; // string | If this URI is contained, the TPP is asking to redirect the transaction flow to this address instead of the TPP-Redirect-URI in case of a negative result of the redirect SCA method. This might be ignored by the ASPSP.
$associate_array['tpp_redirect_uri'] = 'tpp_redirect_uri_example'; // string | URI of the TPP, where the transaction flow shall be redirected to after a Redirect.  Mandated for the Redirect SCA Approach, specifically  when TPP-Redirect-Preferred equals \"true\". It is recommended to always use this header field.  **Remark for Future:**  This field might be changed to mandatory in the next version of the specification.
$associate_array['tpp_explicit_authorisation_preferred'] = True; // bool | If it equals \"true\", the TPP prefers to start the authorisation process separately,  e.g. because of the usage of a signing basket.  This preference might be ignored by the ASPSP, if a signing basket is not supported as functionality.  If it equals \"false\" or if the parameter is not used, there is no preference of the TPP.  This especially indicates that the TPP assumes a direct authorisation of the transaction in the next step,  without using a signing basket.
$associate_array['psu_ip_address'] = '192.168.8.78'; // string | The forwarded IP Address header field consists of the corresponding http request IP Address field between PSU and TPP.
$associate_array['psu_ip_port'] = 1234; // string | The forwarded IP Port header field consists of the corresponding HTTP request IP Port field between PSU and TPP, if available.
$associate_array['psu_accept'] = 'psu_accept_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_charset'] = 'psu_accept_charset_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_encoding'] = 'psu_accept_encoding_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_language'] = 'psu_accept_language_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_user_agent'] = 'psu_user_agent_example'; // string | The forwarded Agent header field of the HTTP request between PSU and TPP, if available.
$associate_array['psu_http_method'] = 'psu_http_method_example'; // string | HTTP method used at the PSU ? TPP interface, if available. Valid values are: * GET * POST * PUT * PATCH * DELETE
$associate_array['psu_device_id'] = '99435c7e-ad88-49ec-a2ad-99ddcb1f5555'; // string | UUID (Universally Unique Identifier) for a device, which is used by the PSU, if available. UUID identifies either a device or a device dependant application installation. In case of an installation identification this ID needs to be unaltered until removal from device.
$associate_array['psu_geo_location'] = 'GEO:52.506931;13.144558'; // string | The forwarded Geo Location of the corresponding http request between PSU and TPP if available.

try {
    $result = $apiInstance->cancelPayment($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentInitiationServicePISApi->cancelPayment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **organisation** | **string**| This identification is denoting the addressed bankIO organisation. The organisation is the \&quot;name\&quot; attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **payment_service** | **string**| Payment service:  Possible values are: * payments * bulk-payments * periodic-payments |
 **payment_product** | **string**| The addressed payment product endpoint, e.g. for SEPA Credit Transfers (SCT). The ASPSP will publish which of the payment products/endpoints will be supported.  The following payment products are supported:   - sepa-credit-transfers   - instant-sepa-credit-transfers   - target-2-payments   - cross-border-credit-transfers   - pain.001-sepa-credit-transfers   - pain.001-instant-sepa-credit-transfers   - pain.001-target-2-payments   - pain.001-cross-border-credit-transfers  **Remark:** For all SEPA Credit Transfer based endpoints which accept XML encoding,  the XML pain.001 schemes provided by EPC are supported by the ASPSP as a minimum for the body content.  Further XML schemes might be supported by some communities.  **Remark:** For cross-border and TARGET-2 payments only community wide pain.001 schemes do exist.  There are plenty of country specificic scheme variants. |
 **payment_id** | **string**| Resource identification of the generated payment initiation resource. |
 **x_request_id** | [**string**](../Model/.md)| ID of the request, unique to the call, as determined by the initiating party. |
 **digest** | **string**| Is contained if and only if the \&quot;Signature\&quot; element is contained in the header of the request. | [optional]
 **signature** | **string**| A signature of the request by the TPP on application level. This might be mandated by ASPSP. | [optional]
 **tpp_signature_certificate** | **string**| The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained. | [optional]
 **tpp_redirect_preferred** | **bool**| If it equals \&quot;true\&quot;, the TPP prefers a redirect over an embedded SCA approach. If it equals \&quot;false\&quot;, the TPP prefers not to be redirected for SCA. The ASPSP will then choose between the Embedded or the Decoupled SCA approach, depending on the choice of the SCA procedure by the TPP/PSU. If the parameter is not used, the ASPSP will choose the SCA approach to be applied depending on the SCA method chosen by the TPP/PSU. | [optional]
 **tpp_nok_redirect_uri** | **string**| If this URI is contained, the TPP is asking to redirect the transaction flow to this address instead of the TPP-Redirect-URI in case of a negative result of the redirect SCA method. This might be ignored by the ASPSP. | [optional]
 **tpp_redirect_uri** | **string**| URI of the TPP, where the transaction flow shall be redirected to after a Redirect.  Mandated for the Redirect SCA Approach, specifically  when TPP-Redirect-Preferred equals \&quot;true\&quot;. It is recommended to always use this header field.  **Remark for Future:**  This field might be changed to mandatory in the next version of the specification. | [optional]
 **tpp_explicit_authorisation_preferred** | **bool**| If it equals \&quot;true\&quot;, the TPP prefers to start the authorisation process separately,  e.g. because of the usage of a signing basket.  This preference might be ignored by the ASPSP, if a signing basket is not supported as functionality.  If it equals \&quot;false\&quot; or if the parameter is not used, there is no preference of the TPP.  This especially indicates that the TPP assumes a direct authorisation of the transaction in the next step,  without using a signing basket. | [optional]
 **psu_ip_address** | **string**| The forwarded IP Address header field consists of the corresponding http request IP Address field between PSU and TPP. | [optional]
 **psu_ip_port** | **string**| The forwarded IP Port header field consists of the corresponding HTTP request IP Port field between PSU and TPP, if available. | [optional]
 **psu_accept** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_charset** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_encoding** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_language** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_user_agent** | **string**| The forwarded Agent header field of the HTTP request between PSU and TPP, if available. | [optional]
 **psu_http_method** | **string**| HTTP method used at the PSU ? TPP interface, if available. Valid values are: * GET * POST * PUT * PATCH * DELETE | [optional]
 **psu_device_id** | [**string**](../Model/.md)| UUID (Universally Unique Identifier) for a device, which is used by the PSU, if available. UUID identifies either a device or a device dependant application installation. In case of an installation identification this ID needs to be unaltered until removal from device. | [optional]
 **psu_geo_location** | **string**| The forwarded Geo Location of the corresponding http request between PSU and TPP if available. | [optional]

### Return type

[**\BankIO\Sdk\Model\PaymentInitiationCancelResponse202**](../Model/PaymentInitiationCancelResponse202.md)

### Authorization

[oAuth2AuthCode](../../README.md#oAuth2AuthCode)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json, application/problem+json, 

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getPaymentCancellationScaStatus

> \BankIO\Sdk\Model\ScaStatusResponse getPaymentCancellationScaStatus($organisation, $payment_service, $payment_product, $payment_id, $authorisation_id, $x_request_id, $digest, $signature, $tpp_signature_certificate, $psu_ip_address, $psu_ip_port, $psu_accept, $psu_accept_charset, $psu_accept_encoding, $psu_accept_language, $psu_user_agent, $psu_http_method, $psu_device_id, $psu_geo_location)

Read the SCA status of the payment cancellation's authorisation

This method returns the SCA status of a payment initiation's authorisation sub-resource.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oAuth2AuthCode
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$client = HttpClientDiscovery::find();
$apiInstance = new BankIO\Sdk\Api\PaymentInitiationServicePISApi(
    // If you want use custom http client, pass your client which implements `Http\Client\HttpClient`.
    // This is optional, `HTTPlug` will be used as default.
    $client,
    $config
);
$associate_array['organisation'] = 'organisation_example'; // string | This identification is denoting the addressed bankIO organisation. The organisation is the \"name\" attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['payment_service'] = 'payment_service_example'; // string | Payment service:  Possible values are: * payments * bulk-payments * periodic-payments
$associate_array['payment_product'] = 'payment_product_example'; // string | The addressed payment product endpoint, e.g. for SEPA Credit Transfers (SCT). The ASPSP will publish which of the payment products/endpoints will be supported.  The following payment products are supported:   - sepa-credit-transfers   - instant-sepa-credit-transfers   - target-2-payments   - cross-border-credit-transfers   - pain.001-sepa-credit-transfers   - pain.001-instant-sepa-credit-transfers   - pain.001-target-2-payments   - pain.001-cross-border-credit-transfers  **Remark:** For all SEPA Credit Transfer based endpoints which accept XML encoding,  the XML pain.001 schemes provided by EPC are supported by the ASPSP as a minimum for the body content.  Further XML schemes might be supported by some communities.  **Remark:** For cross-border and TARGET-2 payments only community wide pain.001 schemes do exist.  There are plenty of country specificic scheme variants.
$associate_array['payment_id'] = 'payment_id_example'; // string | Resource identification of the generated payment initiation resource.
$associate_array['authorisation_id'] = 'authorisation_id_example'; // string | Resource identification of the related SCA.
$associate_array['x_request_id'] = '99391c7e-ad88-49ec-a2ad-99ddcb1f7721'; // string | ID of the request, unique to the call, as determined by the initiating party.
$associate_array['digest'] = 'SHA-256=hl1/Eps8BEQW58FJhDApwJXjGY4nr1ArGDHIT25vq6A='; // string | Is contained if and only if the \"Signature\" element is contained in the header of the request.
$associate_array['signature'] = 'keyId="SN=9FA1,CA=CN=D-TRUST%20CA%202-1%202015,O=D-Trust%20GmbH,C=DE",algorithm="rsa-sha256", headers="Digest X-Request-ID PSU-ID TPP-Redirect-URI Date", signature="Base64(RSA-SHA256(signing string))"'
; // string | A signature of the request by the TPP on application level. This might be mandated by ASPSP.
$associate_array['tpp_signature_certificate'] = 'tpp_signature_certificate_example'; // string | The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained.
$associate_array['psu_ip_address'] = '192.168.8.78'; // string | The forwarded IP Address header field consists of the corresponding http request IP Address field between PSU and TPP.
$associate_array['psu_ip_port'] = 1234; // string | The forwarded IP Port header field consists of the corresponding HTTP request IP Port field between PSU and TPP, if available.
$associate_array['psu_accept'] = 'psu_accept_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_charset'] = 'psu_accept_charset_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_encoding'] = 'psu_accept_encoding_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_language'] = 'psu_accept_language_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_user_agent'] = 'psu_user_agent_example'; // string | The forwarded Agent header field of the HTTP request between PSU and TPP, if available.
$associate_array['psu_http_method'] = 'psu_http_method_example'; // string | HTTP method used at the PSU ? TPP interface, if available. Valid values are: * GET * POST * PUT * PATCH * DELETE
$associate_array['psu_device_id'] = '99435c7e-ad88-49ec-a2ad-99ddcb1f5555'; // string | UUID (Universally Unique Identifier) for a device, which is used by the PSU, if available. UUID identifies either a device or a device dependant application installation. In case of an installation identification this ID needs to be unaltered until removal from device.
$associate_array['psu_geo_location'] = 'GEO:52.506931;13.144558'; // string | The forwarded Geo Location of the corresponding http request between PSU and TPP if available.

try {
    $result = $apiInstance->getPaymentCancellationScaStatus($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentInitiationServicePISApi->getPaymentCancellationScaStatus: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **organisation** | **string**| This identification is denoting the addressed bankIO organisation. The organisation is the \&quot;name\&quot; attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **payment_service** | **string**| Payment service:  Possible values are: * payments * bulk-payments * periodic-payments |
 **payment_product** | **string**| The addressed payment product endpoint, e.g. for SEPA Credit Transfers (SCT). The ASPSP will publish which of the payment products/endpoints will be supported.  The following payment products are supported:   - sepa-credit-transfers   - instant-sepa-credit-transfers   - target-2-payments   - cross-border-credit-transfers   - pain.001-sepa-credit-transfers   - pain.001-instant-sepa-credit-transfers   - pain.001-target-2-payments   - pain.001-cross-border-credit-transfers  **Remark:** For all SEPA Credit Transfer based endpoints which accept XML encoding,  the XML pain.001 schemes provided by EPC are supported by the ASPSP as a minimum for the body content.  Further XML schemes might be supported by some communities.  **Remark:** For cross-border and TARGET-2 payments only community wide pain.001 schemes do exist.  There are plenty of country specificic scheme variants. |
 **payment_id** | **string**| Resource identification of the generated payment initiation resource. |
 **authorisation_id** | **string**| Resource identification of the related SCA. |
 **x_request_id** | [**string**](../Model/.md)| ID of the request, unique to the call, as determined by the initiating party. |
 **digest** | **string**| Is contained if and only if the \&quot;Signature\&quot; element is contained in the header of the request. | [optional]
 **signature** | **string**| A signature of the request by the TPP on application level. This might be mandated by ASPSP. | [optional]
 **tpp_signature_certificate** | **string**| The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained. | [optional]
 **psu_ip_address** | **string**| The forwarded IP Address header field consists of the corresponding http request IP Address field between PSU and TPP. | [optional]
 **psu_ip_port** | **string**| The forwarded IP Port header field consists of the corresponding HTTP request IP Port field between PSU and TPP, if available. | [optional]
 **psu_accept** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_charset** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_encoding** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_language** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_user_agent** | **string**| The forwarded Agent header field of the HTTP request between PSU and TPP, if available. | [optional]
 **psu_http_method** | **string**| HTTP method used at the PSU ? TPP interface, if available. Valid values are: * GET * POST * PUT * PATCH * DELETE | [optional]
 **psu_device_id** | [**string**](../Model/.md)| UUID (Universally Unique Identifier) for a device, which is used by the PSU, if available. UUID identifies either a device or a device dependant application installation. In case of an installation identification this ID needs to be unaltered until removal from device. | [optional]
 **psu_geo_location** | **string**| The forwarded Geo Location of the corresponding http request between PSU and TPP if available. | [optional]

### Return type

[**\BankIO\Sdk\Model\ScaStatusResponse**](../Model/ScaStatusResponse.md)

### Authorization

[oAuth2AuthCode](../../README.md#oAuth2AuthCode)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json, application/problem+json, 

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getPaymentInformation

> OneOfPaymentInitiationWithStatusResponsePeriodicPaymentInitiationWithStatusResponseBulkPaymentInitiationWithStatusResponse getPaymentInformation($organisation, $payment_service, $payment_product, $payment_id, $x_request_id, $digest, $signature, $tpp_signature_certificate, $psu_ip_address, $psu_ip_port, $psu_accept, $psu_accept_charset, $psu_accept_encoding, $psu_accept_language, $psu_user_agent, $psu_http_method, $psu_device_id, $psu_geo_location)

Get payment information

Returns the content of a payment object

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oAuth2AuthCode
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$client = HttpClientDiscovery::find();
$apiInstance = new BankIO\Sdk\Api\PaymentInitiationServicePISApi(
    // If you want use custom http client, pass your client which implements `Http\Client\HttpClient`.
    // This is optional, `HTTPlug` will be used as default.
    $client,
    $config
);
$associate_array['organisation'] = 'organisation_example'; // string | This identification is denoting the addressed bankIO organisation. The organisation is the \"name\" attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['payment_service'] = 'payment_service_example'; // string | Payment service:  Possible values are: * payments * bulk-payments * periodic-payments
$associate_array['payment_product'] = 'payment_product_example'; // string | The addressed payment product endpoint, e.g. for SEPA Credit Transfers (SCT). The ASPSP will publish which of the payment products/endpoints will be supported.  The following payment products are supported:   - sepa-credit-transfers   - instant-sepa-credit-transfers   - target-2-payments   - cross-border-credit-transfers   - pain.001-sepa-credit-transfers   - pain.001-instant-sepa-credit-transfers   - pain.001-target-2-payments   - pain.001-cross-border-credit-transfers  **Remark:** For all SEPA Credit Transfer based endpoints which accept XML encoding,  the XML pain.001 schemes provided by EPC are supported by the ASPSP as a minimum for the body content.  Further XML schemes might be supported by some communities.  **Remark:** For cross-border and TARGET-2 payments only community wide pain.001 schemes do exist.  There are plenty of country specificic scheme variants.
$associate_array['payment_id'] = 'payment_id_example'; // string | Resource identification of the generated payment initiation resource.
$associate_array['x_request_id'] = '99391c7e-ad88-49ec-a2ad-99ddcb1f7721'; // string | ID of the request, unique to the call, as determined by the initiating party.
$associate_array['digest'] = 'SHA-256=hl1/Eps8BEQW58FJhDApwJXjGY4nr1ArGDHIT25vq6A='; // string | Is contained if and only if the \"Signature\" element is contained in the header of the request.
$associate_array['signature'] = 'keyId="SN=9FA1,CA=CN=D-TRUST%20CA%202-1%202015,O=D-Trust%20GmbH,C=DE",algorithm="rsa-sha256", headers="Digest X-Request-ID PSU-ID TPP-Redirect-URI Date", signature="Base64(RSA-SHA256(signing string))"'
; // string | A signature of the request by the TPP on application level. This might be mandated by ASPSP.
$associate_array['tpp_signature_certificate'] = 'tpp_signature_certificate_example'; // string | The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained.
$associate_array['psu_ip_address'] = '192.168.8.78'; // string | The forwarded IP Address header field consists of the corresponding http request IP Address field between PSU and TPP.
$associate_array['psu_ip_port'] = 1234; // string | The forwarded IP Port header field consists of the corresponding HTTP request IP Port field between PSU and TPP, if available.
$associate_array['psu_accept'] = 'psu_accept_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_charset'] = 'psu_accept_charset_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_encoding'] = 'psu_accept_encoding_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_language'] = 'psu_accept_language_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_user_agent'] = 'psu_user_agent_example'; // string | The forwarded Agent header field of the HTTP request between PSU and TPP, if available.
$associate_array['psu_http_method'] = 'psu_http_method_example'; // string | HTTP method used at the PSU ? TPP interface, if available. Valid values are: * GET * POST * PUT * PATCH * DELETE
$associate_array['psu_device_id'] = '99435c7e-ad88-49ec-a2ad-99ddcb1f5555'; // string | UUID (Universally Unique Identifier) for a device, which is used by the PSU, if available. UUID identifies either a device or a device dependant application installation. In case of an installation identification this ID needs to be unaltered until removal from device.
$associate_array['psu_geo_location'] = 'GEO:52.506931;13.144558'; // string | The forwarded Geo Location of the corresponding http request between PSU and TPP if available.

try {
    $result = $apiInstance->getPaymentInformation($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentInitiationServicePISApi->getPaymentInformation: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **organisation** | **string**| This identification is denoting the addressed bankIO organisation. The organisation is the \&quot;name\&quot; attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **payment_service** | **string**| Payment service:  Possible values are: * payments * bulk-payments * periodic-payments |
 **payment_product** | **string**| The addressed payment product endpoint, e.g. for SEPA Credit Transfers (SCT). The ASPSP will publish which of the payment products/endpoints will be supported.  The following payment products are supported:   - sepa-credit-transfers   - instant-sepa-credit-transfers   - target-2-payments   - cross-border-credit-transfers   - pain.001-sepa-credit-transfers   - pain.001-instant-sepa-credit-transfers   - pain.001-target-2-payments   - pain.001-cross-border-credit-transfers  **Remark:** For all SEPA Credit Transfer based endpoints which accept XML encoding,  the XML pain.001 schemes provided by EPC are supported by the ASPSP as a minimum for the body content.  Further XML schemes might be supported by some communities.  **Remark:** For cross-border and TARGET-2 payments only community wide pain.001 schemes do exist.  There are plenty of country specificic scheme variants. |
 **payment_id** | **string**| Resource identification of the generated payment initiation resource. |
 **x_request_id** | [**string**](../Model/.md)| ID of the request, unique to the call, as determined by the initiating party. |
 **digest** | **string**| Is contained if and only if the \&quot;Signature\&quot; element is contained in the header of the request. | [optional]
 **signature** | **string**| A signature of the request by the TPP on application level. This might be mandated by ASPSP. | [optional]
 **tpp_signature_certificate** | **string**| The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained. | [optional]
 **psu_ip_address** | **string**| The forwarded IP Address header field consists of the corresponding http request IP Address field between PSU and TPP. | [optional]
 **psu_ip_port** | **string**| The forwarded IP Port header field consists of the corresponding HTTP request IP Port field between PSU and TPP, if available. | [optional]
 **psu_accept** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_charset** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_encoding** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_language** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_user_agent** | **string**| The forwarded Agent header field of the HTTP request between PSU and TPP, if available. | [optional]
 **psu_http_method** | **string**| HTTP method used at the PSU ? TPP interface, if available. Valid values are: * GET * POST * PUT * PATCH * DELETE | [optional]
 **psu_device_id** | [**string**](../Model/.md)| UUID (Universally Unique Identifier) for a device, which is used by the PSU, if available. UUID identifies either a device or a device dependant application installation. In case of an installation identification this ID needs to be unaltered until removal from device. | [optional]
 **psu_geo_location** | **string**| The forwarded Geo Location of the corresponding http request between PSU and TPP if available. | [optional]

### Return type

[**OneOfPaymentInitiationWithStatusResponsePeriodicPaymentInitiationWithStatusResponseBulkPaymentInitiationWithStatusResponse**](../Model/OneOfPaymentInitiationWithStatusResponsePeriodicPaymentInitiationWithStatusResponseBulkPaymentInitiationWithStatusResponse.md)

### Authorization

[oAuth2AuthCode](../../README.md#oAuth2AuthCode)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json, application/xml, multipart/form-data, application/problem+json, 

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getPaymentInitiationAuthorisation

> \BankIO\Sdk\Model\Authorisations getPaymentInitiationAuthorisation($organisation, $payment_service, $payment_product, $payment_id, $x_request_id, $digest, $signature, $tpp_signature_certificate, $psu_ip_address, $psu_ip_port, $psu_accept, $psu_accept_charset, $psu_accept_encoding, $psu_accept_language, $psu_user_agent, $psu_http_method, $psu_device_id, $psu_geo_location)

Get payment initiation authorisation sub-resources request

Read a list of all authorisation subresources IDs which have been created.  This function returns an array of hyperlinks to all generated authorisation sub-resources.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oAuth2AuthCode
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$client = HttpClientDiscovery::find();
$apiInstance = new BankIO\Sdk\Api\PaymentInitiationServicePISApi(
    // If you want use custom http client, pass your client which implements `Http\Client\HttpClient`.
    // This is optional, `HTTPlug` will be used as default.
    $client,
    $config
);
$associate_array['organisation'] = 'organisation_example'; // string | This identification is denoting the addressed bankIO organisation. The organisation is the \"name\" attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['payment_service'] = 'payment_service_example'; // string | Payment service:  Possible values are: * payments * bulk-payments * periodic-payments
$associate_array['payment_product'] = 'payment_product_example'; // string | The addressed payment product endpoint, e.g. for SEPA Credit Transfers (SCT). The ASPSP will publish which of the payment products/endpoints will be supported.  The following payment products are supported:   - sepa-credit-transfers   - instant-sepa-credit-transfers   - target-2-payments   - cross-border-credit-transfers   - pain.001-sepa-credit-transfers   - pain.001-instant-sepa-credit-transfers   - pain.001-target-2-payments   - pain.001-cross-border-credit-transfers  **Remark:** For all SEPA Credit Transfer based endpoints which accept XML encoding,  the XML pain.001 schemes provided by EPC are supported by the ASPSP as a minimum for the body content.  Further XML schemes might be supported by some communities.  **Remark:** For cross-border and TARGET-2 payments only community wide pain.001 schemes do exist.  There are plenty of country specificic scheme variants.
$associate_array['payment_id'] = 'payment_id_example'; // string | Resource identification of the generated payment initiation resource.
$associate_array['x_request_id'] = '99391c7e-ad88-49ec-a2ad-99ddcb1f7721'; // string | ID of the request, unique to the call, as determined by the initiating party.
$associate_array['digest'] = 'SHA-256=hl1/Eps8BEQW58FJhDApwJXjGY4nr1ArGDHIT25vq6A='; // string | Is contained if and only if the \"Signature\" element is contained in the header of the request.
$associate_array['signature'] = 'keyId="SN=9FA1,CA=CN=D-TRUST%20CA%202-1%202015,O=D-Trust%20GmbH,C=DE",algorithm="rsa-sha256", headers="Digest X-Request-ID PSU-ID TPP-Redirect-URI Date", signature="Base64(RSA-SHA256(signing string))"'
; // string | A signature of the request by the TPP on application level. This might be mandated by ASPSP.
$associate_array['tpp_signature_certificate'] = 'tpp_signature_certificate_example'; // string | The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained.
$associate_array['psu_ip_address'] = '192.168.8.78'; // string | The forwarded IP Address header field consists of the corresponding http request IP Address field between PSU and TPP.
$associate_array['psu_ip_port'] = 1234; // string | The forwarded IP Port header field consists of the corresponding HTTP request IP Port field between PSU and TPP, if available.
$associate_array['psu_accept'] = 'psu_accept_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_charset'] = 'psu_accept_charset_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_encoding'] = 'psu_accept_encoding_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_language'] = 'psu_accept_language_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_user_agent'] = 'psu_user_agent_example'; // string | The forwarded Agent header field of the HTTP request between PSU and TPP, if available.
$associate_array['psu_http_method'] = 'psu_http_method_example'; // string | HTTP method used at the PSU ? TPP interface, if available. Valid values are: * GET * POST * PUT * PATCH * DELETE
$associate_array['psu_device_id'] = '99435c7e-ad88-49ec-a2ad-99ddcb1f5555'; // string | UUID (Universally Unique Identifier) for a device, which is used by the PSU, if available. UUID identifies either a device or a device dependant application installation. In case of an installation identification this ID needs to be unaltered until removal from device.
$associate_array['psu_geo_location'] = 'GEO:52.506931;13.144558'; // string | The forwarded Geo Location of the corresponding http request between PSU and TPP if available.

try {
    $result = $apiInstance->getPaymentInitiationAuthorisation($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentInitiationServicePISApi->getPaymentInitiationAuthorisation: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **organisation** | **string**| This identification is denoting the addressed bankIO organisation. The organisation is the \&quot;name\&quot; attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **payment_service** | **string**| Payment service:  Possible values are: * payments * bulk-payments * periodic-payments |
 **payment_product** | **string**| The addressed payment product endpoint, e.g. for SEPA Credit Transfers (SCT). The ASPSP will publish which of the payment products/endpoints will be supported.  The following payment products are supported:   - sepa-credit-transfers   - instant-sepa-credit-transfers   - target-2-payments   - cross-border-credit-transfers   - pain.001-sepa-credit-transfers   - pain.001-instant-sepa-credit-transfers   - pain.001-target-2-payments   - pain.001-cross-border-credit-transfers  **Remark:** For all SEPA Credit Transfer based endpoints which accept XML encoding,  the XML pain.001 schemes provided by EPC are supported by the ASPSP as a minimum for the body content.  Further XML schemes might be supported by some communities.  **Remark:** For cross-border and TARGET-2 payments only community wide pain.001 schemes do exist.  There are plenty of country specificic scheme variants. |
 **payment_id** | **string**| Resource identification of the generated payment initiation resource. |
 **x_request_id** | [**string**](../Model/.md)| ID of the request, unique to the call, as determined by the initiating party. |
 **digest** | **string**| Is contained if and only if the \&quot;Signature\&quot; element is contained in the header of the request. | [optional]
 **signature** | **string**| A signature of the request by the TPP on application level. This might be mandated by ASPSP. | [optional]
 **tpp_signature_certificate** | **string**| The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained. | [optional]
 **psu_ip_address** | **string**| The forwarded IP Address header field consists of the corresponding http request IP Address field between PSU and TPP. | [optional]
 **psu_ip_port** | **string**| The forwarded IP Port header field consists of the corresponding HTTP request IP Port field between PSU and TPP, if available. | [optional]
 **psu_accept** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_charset** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_encoding** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_language** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_user_agent** | **string**| The forwarded Agent header field of the HTTP request between PSU and TPP, if available. | [optional]
 **psu_http_method** | **string**| HTTP method used at the PSU ? TPP interface, if available. Valid values are: * GET * POST * PUT * PATCH * DELETE | [optional]
 **psu_device_id** | [**string**](../Model/.md)| UUID (Universally Unique Identifier) for a device, which is used by the PSU, if available. UUID identifies either a device or a device dependant application installation. In case of an installation identification this ID needs to be unaltered until removal from device. | [optional]
 **psu_geo_location** | **string**| The forwarded Geo Location of the corresponding http request between PSU and TPP if available. | [optional]

### Return type

[**\BankIO\Sdk\Model\Authorisations**](../Model/Authorisations.md)

### Authorization

[oAuth2AuthCode](../../README.md#oAuth2AuthCode)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json, application/problem+json, 

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getPaymentInitiationCancellationAuthorisationInformation

> \BankIO\Sdk\Model\Authorisations getPaymentInitiationCancellationAuthorisationInformation($organisation, $payment_service, $payment_product, $payment_id, $x_request_id, $digest, $signature, $tpp_signature_certificate, $psu_ip_address, $psu_ip_port, $psu_accept, $psu_accept_charset, $psu_accept_encoding, $psu_accept_language, $psu_user_agent, $psu_http_method, $psu_device_id, $psu_geo_location)

Will deliver an array of resource identifications to all generated cancellation authorisation sub-resources

Retrieve a list of all created cancellation authorisation sub-resources.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oAuth2AuthCode
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$client = HttpClientDiscovery::find();
$apiInstance = new BankIO\Sdk\Api\PaymentInitiationServicePISApi(
    // If you want use custom http client, pass your client which implements `Http\Client\HttpClient`.
    // This is optional, `HTTPlug` will be used as default.
    $client,
    $config
);
$associate_array['organisation'] = 'organisation_example'; // string | This identification is denoting the addressed bankIO organisation. The organisation is the \"name\" attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['payment_service'] = 'payment_service_example'; // string | Payment service:  Possible values are: * payments * bulk-payments * periodic-payments
$associate_array['payment_product'] = 'payment_product_example'; // string | The addressed payment product endpoint, e.g. for SEPA Credit Transfers (SCT). The ASPSP will publish which of the payment products/endpoints will be supported.  The following payment products are supported:   - sepa-credit-transfers   - instant-sepa-credit-transfers   - target-2-payments   - cross-border-credit-transfers   - pain.001-sepa-credit-transfers   - pain.001-instant-sepa-credit-transfers   - pain.001-target-2-payments   - pain.001-cross-border-credit-transfers  **Remark:** For all SEPA Credit Transfer based endpoints which accept XML encoding,  the XML pain.001 schemes provided by EPC are supported by the ASPSP as a minimum for the body content.  Further XML schemes might be supported by some communities.  **Remark:** For cross-border and TARGET-2 payments only community wide pain.001 schemes do exist.  There are plenty of country specificic scheme variants.
$associate_array['payment_id'] = 'payment_id_example'; // string | Resource identification of the generated payment initiation resource.
$associate_array['x_request_id'] = '99391c7e-ad88-49ec-a2ad-99ddcb1f7721'; // string | ID of the request, unique to the call, as determined by the initiating party.
$associate_array['digest'] = 'SHA-256=hl1/Eps8BEQW58FJhDApwJXjGY4nr1ArGDHIT25vq6A='; // string | Is contained if and only if the \"Signature\" element is contained in the header of the request.
$associate_array['signature'] = 'keyId="SN=9FA1,CA=CN=D-TRUST%20CA%202-1%202015,O=D-Trust%20GmbH,C=DE",algorithm="rsa-sha256", headers="Digest X-Request-ID PSU-ID TPP-Redirect-URI Date", signature="Base64(RSA-SHA256(signing string))"'
; // string | A signature of the request by the TPP on application level. This might be mandated by ASPSP.
$associate_array['tpp_signature_certificate'] = 'tpp_signature_certificate_example'; // string | The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained.
$associate_array['psu_ip_address'] = '192.168.8.78'; // string | The forwarded IP Address header field consists of the corresponding http request IP Address field between PSU and TPP.
$associate_array['psu_ip_port'] = 1234; // string | The forwarded IP Port header field consists of the corresponding HTTP request IP Port field between PSU and TPP, if available.
$associate_array['psu_accept'] = 'psu_accept_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_charset'] = 'psu_accept_charset_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_encoding'] = 'psu_accept_encoding_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_language'] = 'psu_accept_language_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_user_agent'] = 'psu_user_agent_example'; // string | The forwarded Agent header field of the HTTP request between PSU and TPP, if available.
$associate_array['psu_http_method'] = 'psu_http_method_example'; // string | HTTP method used at the PSU ? TPP interface, if available. Valid values are: * GET * POST * PUT * PATCH * DELETE
$associate_array['psu_device_id'] = '99435c7e-ad88-49ec-a2ad-99ddcb1f5555'; // string | UUID (Universally Unique Identifier) for a device, which is used by the PSU, if available. UUID identifies either a device or a device dependant application installation. In case of an installation identification this ID needs to be unaltered until removal from device.
$associate_array['psu_geo_location'] = 'GEO:52.506931;13.144558'; // string | The forwarded Geo Location of the corresponding http request between PSU and TPP if available.

try {
    $result = $apiInstance->getPaymentInitiationCancellationAuthorisationInformation($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentInitiationServicePISApi->getPaymentInitiationCancellationAuthorisationInformation: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **organisation** | **string**| This identification is denoting the addressed bankIO organisation. The organisation is the \&quot;name\&quot; attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **payment_service** | **string**| Payment service:  Possible values are: * payments * bulk-payments * periodic-payments |
 **payment_product** | **string**| The addressed payment product endpoint, e.g. for SEPA Credit Transfers (SCT). The ASPSP will publish which of the payment products/endpoints will be supported.  The following payment products are supported:   - sepa-credit-transfers   - instant-sepa-credit-transfers   - target-2-payments   - cross-border-credit-transfers   - pain.001-sepa-credit-transfers   - pain.001-instant-sepa-credit-transfers   - pain.001-target-2-payments   - pain.001-cross-border-credit-transfers  **Remark:** For all SEPA Credit Transfer based endpoints which accept XML encoding,  the XML pain.001 schemes provided by EPC are supported by the ASPSP as a minimum for the body content.  Further XML schemes might be supported by some communities.  **Remark:** For cross-border and TARGET-2 payments only community wide pain.001 schemes do exist.  There are plenty of country specificic scheme variants. |
 **payment_id** | **string**| Resource identification of the generated payment initiation resource. |
 **x_request_id** | [**string**](../Model/.md)| ID of the request, unique to the call, as determined by the initiating party. |
 **digest** | **string**| Is contained if and only if the \&quot;Signature\&quot; element is contained in the header of the request. | [optional]
 **signature** | **string**| A signature of the request by the TPP on application level. This might be mandated by ASPSP. | [optional]
 **tpp_signature_certificate** | **string**| The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained. | [optional]
 **psu_ip_address** | **string**| The forwarded IP Address header field consists of the corresponding http request IP Address field between PSU and TPP. | [optional]
 **psu_ip_port** | **string**| The forwarded IP Port header field consists of the corresponding HTTP request IP Port field between PSU and TPP, if available. | [optional]
 **psu_accept** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_charset** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_encoding** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_language** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_user_agent** | **string**| The forwarded Agent header field of the HTTP request between PSU and TPP, if available. | [optional]
 **psu_http_method** | **string**| HTTP method used at the PSU ? TPP interface, if available. Valid values are: * GET * POST * PUT * PATCH * DELETE | [optional]
 **psu_device_id** | [**string**](../Model/.md)| UUID (Universally Unique Identifier) for a device, which is used by the PSU, if available. UUID identifies either a device or a device dependant application installation. In case of an installation identification this ID needs to be unaltered until removal from device. | [optional]
 **psu_geo_location** | **string**| The forwarded Geo Location of the corresponding http request between PSU and TPP if available. | [optional]

### Return type

[**\BankIO\Sdk\Model\Authorisations**](../Model/Authorisations.md)

### Authorization

[oAuth2AuthCode](../../README.md#oAuth2AuthCode)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json, application/problem+json, 

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getPaymentInitiationScaStatus

> \BankIO\Sdk\Model\ScaStatusResponse getPaymentInitiationScaStatus($organisation, $payment_service, $payment_product, $payment_id, $authorisation_id, $x_request_id, $digest, $signature, $tpp_signature_certificate, $psu_ip_address, $psu_ip_port, $psu_accept, $psu_accept_charset, $psu_accept_encoding, $psu_accept_language, $psu_user_agent, $psu_http_method, $psu_device_id, $psu_geo_location)

Read the SCA status of the payment authorisation

This method returns the SCA status of a payment initiation's authorisation sub-resource.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oAuth2AuthCode
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$client = HttpClientDiscovery::find();
$apiInstance = new BankIO\Sdk\Api\PaymentInitiationServicePISApi(
    // If you want use custom http client, pass your client which implements `Http\Client\HttpClient`.
    // This is optional, `HTTPlug` will be used as default.
    $client,
    $config
);
$associate_array['organisation'] = 'organisation_example'; // string | This identification is denoting the addressed bankIO organisation. The organisation is the \"name\" attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['payment_service'] = 'payment_service_example'; // string | Payment service:  Possible values are: * payments * bulk-payments * periodic-payments
$associate_array['payment_product'] = 'payment_product_example'; // string | The addressed payment product endpoint, e.g. for SEPA Credit Transfers (SCT). The ASPSP will publish which of the payment products/endpoints will be supported.  The following payment products are supported:   - sepa-credit-transfers   - instant-sepa-credit-transfers   - target-2-payments   - cross-border-credit-transfers   - pain.001-sepa-credit-transfers   - pain.001-instant-sepa-credit-transfers   - pain.001-target-2-payments   - pain.001-cross-border-credit-transfers  **Remark:** For all SEPA Credit Transfer based endpoints which accept XML encoding,  the XML pain.001 schemes provided by EPC are supported by the ASPSP as a minimum for the body content.  Further XML schemes might be supported by some communities.  **Remark:** For cross-border and TARGET-2 payments only community wide pain.001 schemes do exist.  There are plenty of country specificic scheme variants.
$associate_array['payment_id'] = 'payment_id_example'; // string | Resource identification of the generated payment initiation resource.
$associate_array['authorisation_id'] = 'authorisation_id_example'; // string | Resource identification of the related SCA.
$associate_array['x_request_id'] = '99391c7e-ad88-49ec-a2ad-99ddcb1f7721'; // string | ID of the request, unique to the call, as determined by the initiating party.
$associate_array['digest'] = 'SHA-256=hl1/Eps8BEQW58FJhDApwJXjGY4nr1ArGDHIT25vq6A='; // string | Is contained if and only if the \"Signature\" element is contained in the header of the request.
$associate_array['signature'] = 'keyId="SN=9FA1,CA=CN=D-TRUST%20CA%202-1%202015,O=D-Trust%20GmbH,C=DE",algorithm="rsa-sha256", headers="Digest X-Request-ID PSU-ID TPP-Redirect-URI Date", signature="Base64(RSA-SHA256(signing string))"'
; // string | A signature of the request by the TPP on application level. This might be mandated by ASPSP.
$associate_array['tpp_signature_certificate'] = 'tpp_signature_certificate_example'; // string | The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained.
$associate_array['psu_ip_address'] = '192.168.8.78'; // string | The forwarded IP Address header field consists of the corresponding http request IP Address field between PSU and TPP.
$associate_array['psu_ip_port'] = 1234; // string | The forwarded IP Port header field consists of the corresponding HTTP request IP Port field between PSU and TPP, if available.
$associate_array['psu_accept'] = 'psu_accept_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_charset'] = 'psu_accept_charset_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_encoding'] = 'psu_accept_encoding_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_language'] = 'psu_accept_language_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_user_agent'] = 'psu_user_agent_example'; // string | The forwarded Agent header field of the HTTP request between PSU and TPP, if available.
$associate_array['psu_http_method'] = 'psu_http_method_example'; // string | HTTP method used at the PSU ? TPP interface, if available. Valid values are: * GET * POST * PUT * PATCH * DELETE
$associate_array['psu_device_id'] = '99435c7e-ad88-49ec-a2ad-99ddcb1f5555'; // string | UUID (Universally Unique Identifier) for a device, which is used by the PSU, if available. UUID identifies either a device or a device dependant application installation. In case of an installation identification this ID needs to be unaltered until removal from device.
$associate_array['psu_geo_location'] = 'GEO:52.506931;13.144558'; // string | The forwarded Geo Location of the corresponding http request between PSU and TPP if available.

try {
    $result = $apiInstance->getPaymentInitiationScaStatus($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentInitiationServicePISApi->getPaymentInitiationScaStatus: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **organisation** | **string**| This identification is denoting the addressed bankIO organisation. The organisation is the \&quot;name\&quot; attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **payment_service** | **string**| Payment service:  Possible values are: * payments * bulk-payments * periodic-payments |
 **payment_product** | **string**| The addressed payment product endpoint, e.g. for SEPA Credit Transfers (SCT). The ASPSP will publish which of the payment products/endpoints will be supported.  The following payment products are supported:   - sepa-credit-transfers   - instant-sepa-credit-transfers   - target-2-payments   - cross-border-credit-transfers   - pain.001-sepa-credit-transfers   - pain.001-instant-sepa-credit-transfers   - pain.001-target-2-payments   - pain.001-cross-border-credit-transfers  **Remark:** For all SEPA Credit Transfer based endpoints which accept XML encoding,  the XML pain.001 schemes provided by EPC are supported by the ASPSP as a minimum for the body content.  Further XML schemes might be supported by some communities.  **Remark:** For cross-border and TARGET-2 payments only community wide pain.001 schemes do exist.  There are plenty of country specificic scheme variants. |
 **payment_id** | **string**| Resource identification of the generated payment initiation resource. |
 **authorisation_id** | **string**| Resource identification of the related SCA. |
 **x_request_id** | [**string**](../Model/.md)| ID of the request, unique to the call, as determined by the initiating party. |
 **digest** | **string**| Is contained if and only if the \&quot;Signature\&quot; element is contained in the header of the request. | [optional]
 **signature** | **string**| A signature of the request by the TPP on application level. This might be mandated by ASPSP. | [optional]
 **tpp_signature_certificate** | **string**| The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained. | [optional]
 **psu_ip_address** | **string**| The forwarded IP Address header field consists of the corresponding http request IP Address field between PSU and TPP. | [optional]
 **psu_ip_port** | **string**| The forwarded IP Port header field consists of the corresponding HTTP request IP Port field between PSU and TPP, if available. | [optional]
 **psu_accept** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_charset** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_encoding** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_language** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_user_agent** | **string**| The forwarded Agent header field of the HTTP request between PSU and TPP, if available. | [optional]
 **psu_http_method** | **string**| HTTP method used at the PSU ? TPP interface, if available. Valid values are: * GET * POST * PUT * PATCH * DELETE | [optional]
 **psu_device_id** | [**string**](../Model/.md)| UUID (Universally Unique Identifier) for a device, which is used by the PSU, if available. UUID identifies either a device or a device dependant application installation. In case of an installation identification this ID needs to be unaltered until removal from device. | [optional]
 **psu_geo_location** | **string**| The forwarded Geo Location of the corresponding http request between PSU and TPP if available. | [optional]

### Return type

[**\BankIO\Sdk\Model\ScaStatusResponse**](../Model/ScaStatusResponse.md)

### Authorization

[oAuth2AuthCode](../../README.md#oAuth2AuthCode)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json, application/problem+json, 

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getPaymentInitiationStatus

> \BankIO\Sdk\Model\PaymentInitiationStatusResponse200Json getPaymentInitiationStatus($organisation, $payment_service, $payment_product, $payment_id, $x_request_id, $digest, $signature, $tpp_signature_certificate, $psu_ip_address, $psu_ip_port, $psu_accept, $psu_accept_charset, $psu_accept_encoding, $psu_accept_language, $psu_user_agent, $psu_http_method, $psu_device_id, $psu_geo_location)

Payment initiation status request

Check the transaction status of a payment initiation.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oAuth2AuthCode
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$client = HttpClientDiscovery::find();
$apiInstance = new BankIO\Sdk\Api\PaymentInitiationServicePISApi(
    // If you want use custom http client, pass your client which implements `Http\Client\HttpClient`.
    // This is optional, `HTTPlug` will be used as default.
    $client,
    $config
);
$associate_array['organisation'] = 'organisation_example'; // string | This identification is denoting the addressed bankIO organisation. The organisation is the \"name\" attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['payment_service'] = 'payment_service_example'; // string | Payment service:  Possible values are: * payments * bulk-payments * periodic-payments
$associate_array['payment_product'] = 'payment_product_example'; // string | The addressed payment product endpoint, e.g. for SEPA Credit Transfers (SCT). The ASPSP will publish which of the payment products/endpoints will be supported.  The following payment products are supported:   - sepa-credit-transfers   - instant-sepa-credit-transfers   - target-2-payments   - cross-border-credit-transfers   - pain.001-sepa-credit-transfers   - pain.001-instant-sepa-credit-transfers   - pain.001-target-2-payments   - pain.001-cross-border-credit-transfers  **Remark:** For all SEPA Credit Transfer based endpoints which accept XML encoding,  the XML pain.001 schemes provided by EPC are supported by the ASPSP as a minimum for the body content.  Further XML schemes might be supported by some communities.  **Remark:** For cross-border and TARGET-2 payments only community wide pain.001 schemes do exist.  There are plenty of country specificic scheme variants.
$associate_array['payment_id'] = 'payment_id_example'; // string | Resource identification of the generated payment initiation resource.
$associate_array['x_request_id'] = '99391c7e-ad88-49ec-a2ad-99ddcb1f7721'; // string | ID of the request, unique to the call, as determined by the initiating party.
$associate_array['digest'] = 'SHA-256=hl1/Eps8BEQW58FJhDApwJXjGY4nr1ArGDHIT25vq6A='; // string | Is contained if and only if the \"Signature\" element is contained in the header of the request.
$associate_array['signature'] = 'keyId="SN=9FA1,CA=CN=D-TRUST%20CA%202-1%202015,O=D-Trust%20GmbH,C=DE",algorithm="rsa-sha256", headers="Digest X-Request-ID PSU-ID TPP-Redirect-URI Date", signature="Base64(RSA-SHA256(signing string))"'
; // string | A signature of the request by the TPP on application level. This might be mandated by ASPSP.
$associate_array['tpp_signature_certificate'] = 'tpp_signature_certificate_example'; // string | The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained.
$associate_array['psu_ip_address'] = '192.168.8.78'; // string | The forwarded IP Address header field consists of the corresponding http request IP Address field between PSU and TPP.
$associate_array['psu_ip_port'] = 1234; // string | The forwarded IP Port header field consists of the corresponding HTTP request IP Port field between PSU and TPP, if available.
$associate_array['psu_accept'] = 'psu_accept_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_charset'] = 'psu_accept_charset_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_encoding'] = 'psu_accept_encoding_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_language'] = 'psu_accept_language_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_user_agent'] = 'psu_user_agent_example'; // string | The forwarded Agent header field of the HTTP request between PSU and TPP, if available.
$associate_array['psu_http_method'] = 'psu_http_method_example'; // string | HTTP method used at the PSU ? TPP interface, if available. Valid values are: * GET * POST * PUT * PATCH * DELETE
$associate_array['psu_device_id'] = '99435c7e-ad88-49ec-a2ad-99ddcb1f5555'; // string | UUID (Universally Unique Identifier) for a device, which is used by the PSU, if available. UUID identifies either a device or a device dependant application installation. In case of an installation identification this ID needs to be unaltered until removal from device.
$associate_array['psu_geo_location'] = 'GEO:52.506931;13.144558'; // string | The forwarded Geo Location of the corresponding http request between PSU and TPP if available.

try {
    $result = $apiInstance->getPaymentInitiationStatus($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentInitiationServicePISApi->getPaymentInitiationStatus: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **organisation** | **string**| This identification is denoting the addressed bankIO organisation. The organisation is the \&quot;name\&quot; attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **payment_service** | **string**| Payment service:  Possible values are: * payments * bulk-payments * periodic-payments |
 **payment_product** | **string**| The addressed payment product endpoint, e.g. for SEPA Credit Transfers (SCT). The ASPSP will publish which of the payment products/endpoints will be supported.  The following payment products are supported:   - sepa-credit-transfers   - instant-sepa-credit-transfers   - target-2-payments   - cross-border-credit-transfers   - pain.001-sepa-credit-transfers   - pain.001-instant-sepa-credit-transfers   - pain.001-target-2-payments   - pain.001-cross-border-credit-transfers  **Remark:** For all SEPA Credit Transfer based endpoints which accept XML encoding,  the XML pain.001 schemes provided by EPC are supported by the ASPSP as a minimum for the body content.  Further XML schemes might be supported by some communities.  **Remark:** For cross-border and TARGET-2 payments only community wide pain.001 schemes do exist.  There are plenty of country specificic scheme variants. |
 **payment_id** | **string**| Resource identification of the generated payment initiation resource. |
 **x_request_id** | [**string**](../Model/.md)| ID of the request, unique to the call, as determined by the initiating party. |
 **digest** | **string**| Is contained if and only if the \&quot;Signature\&quot; element is contained in the header of the request. | [optional]
 **signature** | **string**| A signature of the request by the TPP on application level. This might be mandated by ASPSP. | [optional]
 **tpp_signature_certificate** | **string**| The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained. | [optional]
 **psu_ip_address** | **string**| The forwarded IP Address header field consists of the corresponding http request IP Address field between PSU and TPP. | [optional]
 **psu_ip_port** | **string**| The forwarded IP Port header field consists of the corresponding HTTP request IP Port field between PSU and TPP, if available. | [optional]
 **psu_accept** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_charset** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_encoding** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_language** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_user_agent** | **string**| The forwarded Agent header field of the HTTP request between PSU and TPP, if available. | [optional]
 **psu_http_method** | **string**| HTTP method used at the PSU ? TPP interface, if available. Valid values are: * GET * POST * PUT * PATCH * DELETE | [optional]
 **psu_device_id** | [**string**](../Model/.md)| UUID (Universally Unique Identifier) for a device, which is used by the PSU, if available. UUID identifies either a device or a device dependant application installation. In case of an installation identification this ID needs to be unaltered until removal from device. | [optional]
 **psu_geo_location** | **string**| The forwarded Geo Location of the corresponding http request between PSU and TPP if available. | [optional]

### Return type

[**\BankIO\Sdk\Model\PaymentInitiationStatusResponse200Json**](../Model/PaymentInitiationStatusResponse200Json.md)

### Authorization

[oAuth2AuthCode](../../README.md#oAuth2AuthCode)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json, application/xml, application/problem+json, 

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## initiatePayment

> \BankIO\Sdk\Model\PaymentInitationRequestResponse201 initiatePayment($organisation, $payment_service, $payment_product, $x_request_id, $tpp_psu_id, $psu_ip_address, $payment_initiation_body_json, $digest, $signature, $tpp_signature_certificate, $psu_id, $psu_id_type, $psu_corporate_id, $psu_corporate_id_type, $tpp_redirect_preferred, $tpp_redirect_uri, $tpp_nok_redirect_uri, $tpp_explicit_authorisation_preferred, $tpp_rejection_no_funds_preferred, $tpp_brand_logging_information, $tpp_notification_uri, $tpp_notification_content_preferred, $psu_ip_port, $psu_accept, $psu_accept_charset, $psu_accept_encoding, $psu_accept_language, $psu_user_agent, $psu_http_method, $psu_device_id, $psu_geo_location)

Payment initiation request

This method is used to initiate a payment at the ASPSP.  ## Variants of payment initiation requests  This method to initiate a payment initiation at the ASPSP can be sent with either a JSON body or an pain.001 body depending on the payment product in the path.  There are the following **payment products**:    - Payment products with payment information in *JSON* format:     - ***sepa-credit-transfers***     - ***instant-sepa-credit-transfers***     - ***target-2-payments***     - ***cross-border-credit-transfers***   - Payment products with payment information in *pain.001* XML format:     - ***pain.001-sepa-credit-transfers***     - ***pain.001-instant-sepa-credit-transfers***     - ***pain.001-target-2-payments***     - ***pain.001-cross-border-credit-transfers***  Furthermore the request body depends on the **payment-service**:   * ***payments***: A single payment initiation request.   * ***bulk-payments***: A collection of several payment initiation requests.        In case of a *pain.001* message there are more than one payments contained in the *pain.001 message.          In case of a *JSON* there are several JSON payment blocks contained in a joining list.   * ***periodic-payments***:      Create a standing order initiation resource for recurrent i.e. periodic payments addressable under {paymentId}       with all data relevant for the corresponding payment product and the execution of the standing order contained in a JSON body.   This is the first step in the API to initiate the related recurring/periodic payment.    ## Single and mulitilevel SCA Processes  The payment initiation requests are independent from the need of one or multilevel  SCA processing, i.e. independent from the number of authorisations needed for the execution of payments.   But the response messages are specific to either one SCA processing or multilevel SCA processing.   For payment initiation with multilevel SCA, this specification requires an explicit start of the authorisation,  i.e. links directly associated with SCA processing like 'scaRedirect' or 'scaOAuth' cannot be contained in the  response message of a Payment Initation Request for a payment, where multiple authorisations are needed.  Also if any data is needed for the next action, like selecting an SCA method is not supported in the response,  since all starts of the multiple authorisations are fully equal.  In these cases, first an authorisation sub-resource has to be generated following the 'startAuthorisation' link.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oAuth2ClientCredentials
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$client = HttpClientDiscovery::find();
$apiInstance = new BankIO\Sdk\Api\PaymentInitiationServicePISApi(
    // If you want use custom http client, pass your client which implements `Http\Client\HttpClient`.
    // This is optional, `HTTPlug` will be used as default.
    $client,
    $config
);
$associate_array['organisation'] = 'organisation_example'; // string | This identification is denoting the addressed bankIO organisation. The organisation is the \"name\" attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['payment_service'] = 'payment_service_example'; // string | Payment service:  Possible values are: * payments * bulk-payments * periodic-payments
$associate_array['payment_product'] = 'payment_product_example'; // string | The addressed payment product endpoint, e.g. for SEPA Credit Transfers (SCT). The ASPSP will publish which of the payment products/endpoints will be supported.  The following payment products are supported:   - sepa-credit-transfers   - instant-sepa-credit-transfers   - target-2-payments   - cross-border-credit-transfers   - pain.001-sepa-credit-transfers   - pain.001-instant-sepa-credit-transfers   - pain.001-target-2-payments   - pain.001-cross-border-credit-transfers  **Remark:** For all SEPA Credit Transfer based endpoints which accept XML encoding,  the XML pain.001 schemes provided by EPC are supported by the ASPSP as a minimum for the body content.  Further XML schemes might be supported by some communities.  **Remark:** For cross-border and TARGET-2 payments only community wide pain.001 schemes do exist.  There are plenty of country specificic scheme variants.
$associate_array['x_request_id'] = '99391c7e-ad88-49ec-a2ad-99ddcb1f7721'; // string | ID of the request, unique to the call, as determined by the initiating party.
$associate_array['tpp_psu_id'] = 'PSU-1234'; // string | Client ID of the PSU in the TPP client interface.  It might be contained even if an OAuth2 based authentication was performed in a pre-step or an OAuth2 based SCA was performed in an preceding AIS service in the same session.
$associate_array['psu_ip_address'] = '192.168.8.78'; // string | The forwarded IP Address header field consists of the corresponding http request IP Address field between PSU and TPP. If not available, the TPP shall use the IP Address used by the TPP when submitting this request.
$associate_array['payment_initiation_body_json'] = new \BankIO\Sdk\Model\PaymentInitiationBodyJson(); // \BankIO\Sdk\Model\PaymentInitiationBodyJson | JSON request body for a payment inition request message.  There are the following payment-products supported:   * \"sepa-credit-transfers\" with JSON-Body   * \"instant-sepa-credit-transfers\" with JSON-Body   * \"target-2-payments\" with JSON-Body   * \"cross-border-credit-transfers\" with JSON-Body   * \"pain.001-sepa-credit-transfers\" with XML pain.001.001.03 body for SCT scheme   * \"pain.001-instant-sepa-credit-transfers\" with XML pain.001.001.03 body for SCT INST scheme   * \"pain.001-target-2-payments\" with pain.001 body.      Only country specific schemes are currently available   * \"pain.001-cross-border-credit-transfers\" with pain.001 body.      Only country specific schemes are currently available    There are the following payment-services supported:   * \"payments\"   * \"periodic-payments\"   * \"bulk-paments\"  All optional, conditional and predefined but not yet used fields are defined.
$associate_array['digest'] = 'SHA-256=hl1/Eps8BEQW58FJhDApwJXjGY4nr1ArGDHIT25vq6A='; // string | Is contained if and only if the \"Signature\" element is contained in the header of the request.
$associate_array['signature'] = 'keyId="SN=9FA1,CA=CN=D-TRUST%20CA%202-1%202015,O=D-Trust%20GmbH,C=DE",algorithm="rsa-sha256", headers="Digest X-Request-ID PSU-ID TPP-Redirect-URI Date", signature="Base64(RSA-SHA256(signing string))"'
; // string | A signature of the request by the TPP on application level. This might be mandated by ASPSP.
$associate_array['tpp_signature_certificate'] = 'tpp_signature_certificate_example'; // string | The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained.
$associate_array['psu_id'] = 'PSU-1234'; // string | Client ID of the PSU in the ASPSP client interface.   Might be mandated in the ASPSP's documentation.  It might be contained even if an OAuth2 based authentication was performed in a pre-step or an OAuth2 based SCA was performed in an preceding AIS service in the same session. In this case the ASPSP might check whether PSU-ID and token match,  according to ASPSP documentation.
$associate_array['psu_id_type'] = 'psu_id_type_example'; // string | Type of the PSU-ID, needed in scenarios where PSUs have several PSU-IDs as access possibility.  In this case, the mean and use are then defined in the ASPSP’s documentation.
$associate_array['psu_corporate_id'] = 'psu_corporate_id_example'; // string | Might be mandated in the ASPSP's documentation. Only used in a corporate context.
$associate_array['psu_corporate_id_type'] = 'psu_corporate_id_type_example'; // string | Might be mandated in the ASPSP's documentation. Only used in a corporate context.
$associate_array['tpp_redirect_preferred'] = True; // bool | If it equals \"true\", the TPP prefers a redirect over an embedded SCA approach. If it equals \"false\", the TPP prefers not to be redirected for SCA. The ASPSP will then choose between the Embedded or the Decoupled SCA approach, depending on the choice of the SCA procedure by the TPP/PSU. If the parameter is not used, the ASPSP will choose the SCA approach to be applied depending on the SCA method chosen by the TPP/PSU.
$associate_array['tpp_redirect_uri'] = 'tpp_redirect_uri_example'; // string | URI of the TPP, where the transaction flow shall be redirected to after a Redirect.  Mandated for the Redirect SCA Approach, specifically  when TPP-Redirect-Preferred equals \"true\". It is recommended to always use this header field.  **Remark for Future:**  This field might be changed to mandatory in the next version of the specification.
$associate_array['tpp_nok_redirect_uri'] = 'tpp_nok_redirect_uri_example'; // string | If this URI is contained, the TPP is asking to redirect the transaction flow to this address instead of the TPP-Redirect-URI in case of a negative result of the redirect SCA method. This might be ignored by the ASPSP.
$associate_array['tpp_explicit_authorisation_preferred'] = True; // bool | If it equals \"true\", the TPP prefers to start the authorisation process separately,  e.g. because of the usage of a signing basket.  This preference might be ignored by the ASPSP, if a signing basket is not supported as functionality.  If it equals \"false\" or if the parameter is not used, there is no preference of the TPP.  This especially indicates that the TPP assumes a direct authorisation of the transaction in the next step,  without using a signing basket.
$associate_array['tpp_rejection_no_funds_preferred'] = True; // bool | If it equals \"true\" then the TPP prefers a rejection of the payment initiation in case the ASPSP is  providing an integrated confirmation of funds request an the result of this is that not sufficient  funds are available.  If it equals \"false\" then the TPP prefers that the ASPSP is dealing with the payment initiation like  in the ASPSPs online channel, potentially waiting for a certain time period for funds to arrive to initiate the payment.  This parameter might be ignored by the ASPSP.
$associate_array['tpp_brand_logging_information'] = 'tpp_brand_logging_information_example'; // string | This header might be used by TPPs to inform the ASPSP about the brand used by the TPP towards the PSU.  This information is meant for logging entries to enhance communication between ASPSP and PSU or ASPSP and TPP.  This header might be ignored by the ASPSP.
$associate_array['tpp_notification_uri'] = 'tpp_notification_uri_example'; // string | URI for the Endpoint of the TPP-API to which the status of the payment initiation should be sent. This header field may by ignored by the ASPSP.  For security reasons, it shall be ensured that the TPP-Notification-URI as introduced above is secured by the TPP eIDAS QWAC used for identification of the TPP. The following applies:  URIs which are provided by TPPs in TPP-Notification-URI shall comply with the domain secured by the eIDAS QWAC certificate of the TPP in the field CN or SubjectAltName of the certificate. Please note that in case of example-TPP.com as certificate entry TPP- Notification-URI like www.example-TPP.com/xs2a-client/v1/ASPSPidentifcation/mytransaction- id/notifications or notifications.example-TPP.com/xs2a-client/v1/ASPSPidentifcation/mytransaction- id/notifications would be compliant.  Wildcard definitions shall be taken into account for compliance checks by the ASPSP.  ASPSPs may respond with ASPSP-Notification-Support set to false, if the provided URIs do not comply.
$associate_array['tpp_notification_content_preferred'] = 'tpp_notification_content_preferred_example'; // string | The string has the form   status=X1, ..., Xn  where Xi is one of the constants SCA, PROCESS, LAST and where constants are not repeated. The usage of the constants supports the of following semantics:    SCA: A notification on every change of the scaStatus attribute for all related authorisation processes is preferred by the TPP.    PROCESS: A notification on all changes of consentStatus or transactionStatus attributes is preferred by the TPP.   LAST: Only a notification on the last consentStatus or transactionStatus as available in the XS2A interface is preferred by the TPP.  This header field may be ignored, if the ASPSP does not support resource notification services for the related TPP.
$associate_array['psu_ip_port'] = 1234; // string | The forwarded IP Port header field consists of the corresponding HTTP request IP Port field between PSU and TPP, if available.
$associate_array['psu_accept'] = 'psu_accept_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_charset'] = 'psu_accept_charset_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_encoding'] = 'psu_accept_encoding_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_language'] = 'psu_accept_language_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_user_agent'] = 'psu_user_agent_example'; // string | The forwarded Agent header field of the HTTP request between PSU and TPP, if available.
$associate_array['psu_http_method'] = 'psu_http_method_example'; // string | HTTP method used at the PSU ? TPP interface, if available. Valid values are: * GET * POST * PUT * PATCH * DELETE
$associate_array['psu_device_id'] = '99435c7e-ad88-49ec-a2ad-99ddcb1f5555'; // string | UUID (Universally Unique Identifier) for a device, which is used by the PSU, if available. UUID identifies either a device or a device dependant application installation. In case of an installation identification this ID needs to be unaltered until removal from device.
$associate_array['psu_geo_location'] = 'GEO:52.506931;13.144558'; // string | The forwarded Geo Location of the corresponding http request between PSU and TPP if available.

try {
    $result = $apiInstance->initiatePayment($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentInitiationServicePISApi->initiatePayment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **organisation** | **string**| This identification is denoting the addressed bankIO organisation. The organisation is the \&quot;name\&quot; attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **payment_service** | **string**| Payment service:  Possible values are: * payments * bulk-payments * periodic-payments |
 **payment_product** | **string**| The addressed payment product endpoint, e.g. for SEPA Credit Transfers (SCT). The ASPSP will publish which of the payment products/endpoints will be supported.  The following payment products are supported:   - sepa-credit-transfers   - instant-sepa-credit-transfers   - target-2-payments   - cross-border-credit-transfers   - pain.001-sepa-credit-transfers   - pain.001-instant-sepa-credit-transfers   - pain.001-target-2-payments   - pain.001-cross-border-credit-transfers  **Remark:** For all SEPA Credit Transfer based endpoints which accept XML encoding,  the XML pain.001 schemes provided by EPC are supported by the ASPSP as a minimum for the body content.  Further XML schemes might be supported by some communities.  **Remark:** For cross-border and TARGET-2 payments only community wide pain.001 schemes do exist.  There are plenty of country specificic scheme variants. |
 **x_request_id** | [**string**](../Model/.md)| ID of the request, unique to the call, as determined by the initiating party. |
 **tpp_psu_id** | **string**| Client ID of the PSU in the TPP client interface.  It might be contained even if an OAuth2 based authentication was performed in a pre-step or an OAuth2 based SCA was performed in an preceding AIS service in the same session. |
 **psu_ip_address** | **string**| The forwarded IP Address header field consists of the corresponding http request IP Address field between PSU and TPP. If not available, the TPP shall use the IP Address used by the TPP when submitting this request. |
 **payment_initiation_body_json** | [**\BankIO\Sdk\Model\PaymentInitiationBodyJson**](../Model/PaymentInitiationBodyJson.md)| JSON request body for a payment inition request message.  There are the following payment-products supported:   * \&quot;sepa-credit-transfers\&quot; with JSON-Body   * \&quot;instant-sepa-credit-transfers\&quot; with JSON-Body   * \&quot;target-2-payments\&quot; with JSON-Body   * \&quot;cross-border-credit-transfers\&quot; with JSON-Body   * \&quot;pain.001-sepa-credit-transfers\&quot; with XML pain.001.001.03 body for SCT scheme   * \&quot;pain.001-instant-sepa-credit-transfers\&quot; with XML pain.001.001.03 body for SCT INST scheme   * \&quot;pain.001-target-2-payments\&quot; with pain.001 body.      Only country specific schemes are currently available   * \&quot;pain.001-cross-border-credit-transfers\&quot; with pain.001 body.      Only country specific schemes are currently available    There are the following payment-services supported:   * \&quot;payments\&quot;   * \&quot;periodic-payments\&quot;   * \&quot;bulk-paments\&quot;  All optional, conditional and predefined but not yet used fields are defined. |
 **digest** | **string**| Is contained if and only if the \&quot;Signature\&quot; element is contained in the header of the request. | [optional]
 **signature** | **string**| A signature of the request by the TPP on application level. This might be mandated by ASPSP. | [optional]
 **tpp_signature_certificate** | **string**| The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained. | [optional]
 **psu_id** | **string**| Client ID of the PSU in the ASPSP client interface.   Might be mandated in the ASPSP&#39;s documentation.  It might be contained even if an OAuth2 based authentication was performed in a pre-step or an OAuth2 based SCA was performed in an preceding AIS service in the same session. In this case the ASPSP might check whether PSU-ID and token match,  according to ASPSP documentation. | [optional]
 **psu_id_type** | **string**| Type of the PSU-ID, needed in scenarios where PSUs have several PSU-IDs as access possibility.  In this case, the mean and use are then defined in the ASPSP’s documentation. | [optional]
 **psu_corporate_id** | **string**| Might be mandated in the ASPSP&#39;s documentation. Only used in a corporate context. | [optional]
 **psu_corporate_id_type** | **string**| Might be mandated in the ASPSP&#39;s documentation. Only used in a corporate context. | [optional]
 **tpp_redirect_preferred** | **bool**| If it equals \&quot;true\&quot;, the TPP prefers a redirect over an embedded SCA approach. If it equals \&quot;false\&quot;, the TPP prefers not to be redirected for SCA. The ASPSP will then choose between the Embedded or the Decoupled SCA approach, depending on the choice of the SCA procedure by the TPP/PSU. If the parameter is not used, the ASPSP will choose the SCA approach to be applied depending on the SCA method chosen by the TPP/PSU. | [optional]
 **tpp_redirect_uri** | **string**| URI of the TPP, where the transaction flow shall be redirected to after a Redirect.  Mandated for the Redirect SCA Approach, specifically  when TPP-Redirect-Preferred equals \&quot;true\&quot;. It is recommended to always use this header field.  **Remark for Future:**  This field might be changed to mandatory in the next version of the specification. | [optional]
 **tpp_nok_redirect_uri** | **string**| If this URI is contained, the TPP is asking to redirect the transaction flow to this address instead of the TPP-Redirect-URI in case of a negative result of the redirect SCA method. This might be ignored by the ASPSP. | [optional]
 **tpp_explicit_authorisation_preferred** | **bool**| If it equals \&quot;true\&quot;, the TPP prefers to start the authorisation process separately,  e.g. because of the usage of a signing basket.  This preference might be ignored by the ASPSP, if a signing basket is not supported as functionality.  If it equals \&quot;false\&quot; or if the parameter is not used, there is no preference of the TPP.  This especially indicates that the TPP assumes a direct authorisation of the transaction in the next step,  without using a signing basket. | [optional]
 **tpp_rejection_no_funds_preferred** | **bool**| If it equals \&quot;true\&quot; then the TPP prefers a rejection of the payment initiation in case the ASPSP is  providing an integrated confirmation of funds request an the result of this is that not sufficient  funds are available.  If it equals \&quot;false\&quot; then the TPP prefers that the ASPSP is dealing with the payment initiation like  in the ASPSPs online channel, potentially waiting for a certain time period for funds to arrive to initiate the payment.  This parameter might be ignored by the ASPSP. | [optional]
 **tpp_brand_logging_information** | **string**| This header might be used by TPPs to inform the ASPSP about the brand used by the TPP towards the PSU.  This information is meant for logging entries to enhance communication between ASPSP and PSU or ASPSP and TPP.  This header might be ignored by the ASPSP. | [optional]
 **tpp_notification_uri** | **string**| URI for the Endpoint of the TPP-API to which the status of the payment initiation should be sent. This header field may by ignored by the ASPSP.  For security reasons, it shall be ensured that the TPP-Notification-URI as introduced above is secured by the TPP eIDAS QWAC used for identification of the TPP. The following applies:  URIs which are provided by TPPs in TPP-Notification-URI shall comply with the domain secured by the eIDAS QWAC certificate of the TPP in the field CN or SubjectAltName of the certificate. Please note that in case of example-TPP.com as certificate entry TPP- Notification-URI like www.example-TPP.com/xs2a-client/v1/ASPSPidentifcation/mytransaction- id/notifications or notifications.example-TPP.com/xs2a-client/v1/ASPSPidentifcation/mytransaction- id/notifications would be compliant.  Wildcard definitions shall be taken into account for compliance checks by the ASPSP.  ASPSPs may respond with ASPSP-Notification-Support set to false, if the provided URIs do not comply. | [optional]
 **tpp_notification_content_preferred** | **string**| The string has the form   status&#x3D;X1, ..., Xn  where Xi is one of the constants SCA, PROCESS, LAST and where constants are not repeated. The usage of the constants supports the of following semantics:    SCA: A notification on every change of the scaStatus attribute for all related authorisation processes is preferred by the TPP.    PROCESS: A notification on all changes of consentStatus or transactionStatus attributes is preferred by the TPP.   LAST: Only a notification on the last consentStatus or transactionStatus as available in the XS2A interface is preferred by the TPP.  This header field may be ignored, if the ASPSP does not support resource notification services for the related TPP. | [optional]
 **psu_ip_port** | **string**| The forwarded IP Port header field consists of the corresponding HTTP request IP Port field between PSU and TPP, if available. | [optional]
 **psu_accept** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_charset** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_encoding** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_language** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_user_agent** | **string**| The forwarded Agent header field of the HTTP request between PSU and TPP, if available. | [optional]
 **psu_http_method** | **string**| HTTP method used at the PSU ? TPP interface, if available. Valid values are: * GET * POST * PUT * PATCH * DELETE | [optional]
 **psu_device_id** | [**string**](../Model/.md)| UUID (Universally Unique Identifier) for a device, which is used by the PSU, if available. UUID identifies either a device or a device dependant application installation. In case of an installation identification this ID needs to be unaltered until removal from device. | [optional]
 **psu_geo_location** | **string**| The forwarded Geo Location of the corresponding http request between PSU and TPP if available. | [optional]

### Return type

[**\BankIO\Sdk\Model\PaymentInitationRequestResponse201**](../Model/PaymentInitationRequestResponse201.md)

### Authorization

[oAuth2ClientCredentials](../../README.md#oAuth2ClientCredentials)

### HTTP request headers

- **Content-Type**: application/json, application/xml, multipart/form-data
- **Accept**: application/json, application/problem+json, 

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## startPaymentAuthorisation

> \BankIO\Sdk\Model\StartScaprocessResponse startPaymentAuthorisation($organisation, $payment_service, $payment_product, $payment_id, $x_request_id, $psu_id, $psu_id_type, $psu_corporate_id, $psu_corporate_id_type, $tpp_redirect_preferred, $tpp_redirect_uri, $tpp_nok_redirect_uri, $tpp_notification_uri, $tpp_notification_content_preferred, $digest, $signature, $tpp_signature_certificate, $psu_ip_address, $psu_ip_port, $psu_accept, $psu_accept_charset, $psu_accept_encoding, $psu_accept_language, $psu_user_agent, $psu_http_method, $psu_device_id, $psu_geo_location, $unknown_base_type)

Start the authorisation process for a payment initiation

Create an authorisation sub-resource and start the authorisation process.  The message might in addition transmit authentication and authorisation related data.   This method is iterated n times for a n times SCA authorisation in a  corporate context, each creating an own authorisation sub-endpoint for  the corresponding PSU authorising the transaction.  The ASPSP might make the usage of this access method unnecessary in case  of only one SCA process needed, since the related authorisation resource  might be automatically created by the ASPSP after the submission of the  payment data with the first POST payments/{payment-product} call.  The start authorisation process is a process which is needed for creating a new authorisation  or cancellation sub-resource.   This applies in the following scenarios:    * The ASPSP has indicated with a 'startAuthorisation' hyperlink in the preceding Payment      initiation response that an explicit start of the authorisation process is needed by the TPP.      The 'startAuthorisation' hyperlink can transport more information about data which needs to be      uploaded by using the extended forms:     * 'startAuthorisationWithPsuIdentfication'     * 'startAuthorisationWithPsuAuthentication'     * 'startAuthorisationWithEncryptedPsuAuthentication'     * 'startAuthorisationWithAuthentciationMethodSelection'   * The related payment initiation cannot yet be executed since a multilevel SCA is mandated.   * The ASPSP has indicated with a 'startAuthorisation' hyperlink in the preceding      Payment cancellation response that an explicit start of the authorisation process is needed by the TPP.      The 'startAuthorisation' hyperlink can transport more information about data which needs to be uploaded      by using the extended forms as indicated above.   * The related payment cancellation request cannot be applied yet since a multilevel SCA is mandate for      executing the cancellation.   * The signing basket needs to be authorised yet.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oAuth2AuthCode
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$client = HttpClientDiscovery::find();
$apiInstance = new BankIO\Sdk\Api\PaymentInitiationServicePISApi(
    // If you want use custom http client, pass your client which implements `Http\Client\HttpClient`.
    // This is optional, `HTTPlug` will be used as default.
    $client,
    $config
);
$associate_array['organisation'] = 'organisation_example'; // string | This identification is denoting the addressed bankIO organisation. The organisation is the \"name\" attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['payment_service'] = 'payment_service_example'; // string | Payment service:  Possible values are: * payments * bulk-payments * periodic-payments
$associate_array['payment_product'] = 'payment_product_example'; // string | The addressed payment product endpoint, e.g. for SEPA Credit Transfers (SCT). The ASPSP will publish which of the payment products/endpoints will be supported.  The following payment products are supported:   - sepa-credit-transfers   - instant-sepa-credit-transfers   - target-2-payments   - cross-border-credit-transfers   - pain.001-sepa-credit-transfers   - pain.001-instant-sepa-credit-transfers   - pain.001-target-2-payments   - pain.001-cross-border-credit-transfers  **Remark:** For all SEPA Credit Transfer based endpoints which accept XML encoding,  the XML pain.001 schemes provided by EPC are supported by the ASPSP as a minimum for the body content.  Further XML schemes might be supported by some communities.  **Remark:** For cross-border and TARGET-2 payments only community wide pain.001 schemes do exist.  There are plenty of country specificic scheme variants.
$associate_array['payment_id'] = 'payment_id_example'; // string | Resource identification of the generated payment initiation resource.
$associate_array['x_request_id'] = '99391c7e-ad88-49ec-a2ad-99ddcb1f7721'; // string | ID of the request, unique to the call, as determined by the initiating party.
$associate_array['psu_id'] = 'PSU-1234'; // string | Client ID of the PSU in the ASPSP client interface.   Might be mandated in the ASPSP's documentation.  It might be contained even if an OAuth2 based authentication was performed in a pre-step or an OAuth2 based SCA was performed in an preceding AIS service in the same session. In this case the ASPSP might check whether PSU-ID and token match,  according to ASPSP documentation.
$associate_array['psu_id_type'] = 'psu_id_type_example'; // string | Type of the PSU-ID, needed in scenarios where PSUs have several PSU-IDs as access possibility.  In this case, the mean and use are then defined in the ASPSP’s documentation.
$associate_array['psu_corporate_id'] = 'psu_corporate_id_example'; // string | Might be mandated in the ASPSP's documentation. Only used in a corporate context.
$associate_array['psu_corporate_id_type'] = 'psu_corporate_id_type_example'; // string | Might be mandated in the ASPSP's documentation. Only used in a corporate context.
$associate_array['tpp_redirect_preferred'] = True; // bool | If it equals \"true\", the TPP prefers a redirect over an embedded SCA approach. If it equals \"false\", the TPP prefers not to be redirected for SCA. The ASPSP will then choose between the Embedded or the Decoupled SCA approach, depending on the choice of the SCA procedure by the TPP/PSU. If the parameter is not used, the ASPSP will choose the SCA approach to be applied depending on the SCA method chosen by the TPP/PSU.
$associate_array['tpp_redirect_uri'] = 'tpp_redirect_uri_example'; // string | URI of the TPP, where the transaction flow shall be redirected to after a Redirect.  Mandated for the Redirect SCA Approach, specifically  when TPP-Redirect-Preferred equals \"true\". It is recommended to always use this header field.  **Remark for Future:**  This field might be changed to mandatory in the next version of the specification.
$associate_array['tpp_nok_redirect_uri'] = 'tpp_nok_redirect_uri_example'; // string | If this URI is contained, the TPP is asking to redirect the transaction flow to this address instead of the TPP-Redirect-URI in case of a negative result of the redirect SCA method. This might be ignored by the ASPSP.
$associate_array['tpp_notification_uri'] = 'tpp_notification_uri_example'; // string | URI for the Endpoint of the TPP-API to which the status of the payment initiation should be sent. This header field may by ignored by the ASPSP.  For security reasons, it shall be ensured that the TPP-Notification-URI as introduced above is secured by the TPP eIDAS QWAC used for identification of the TPP. The following applies:  URIs which are provided by TPPs in TPP-Notification-URI shall comply with the domain secured by the eIDAS QWAC certificate of the TPP in the field CN or SubjectAltName of the certificate. Please note that in case of example-TPP.com as certificate entry TPP- Notification-URI like www.example-TPP.com/xs2a-client/v1/ASPSPidentifcation/mytransaction- id/notifications or notifications.example-TPP.com/xs2a-client/v1/ASPSPidentifcation/mytransaction- id/notifications would be compliant.  Wildcard definitions shall be taken into account for compliance checks by the ASPSP.  ASPSPs may respond with ASPSP-Notification-Support set to false, if the provided URIs do not comply.
$associate_array['tpp_notification_content_preferred'] = 'tpp_notification_content_preferred_example'; // string | The string has the form   status=X1, ..., Xn  where Xi is one of the constants SCA, PROCESS, LAST and where constants are not repeated. The usage of the constants supports the of following semantics:    SCA: A notification on every change of the scaStatus attribute for all related authorisation processes is preferred by the TPP.    PROCESS: A notification on all changes of consentStatus or transactionStatus attributes is preferred by the TPP.   LAST: Only a notification on the last consentStatus or transactionStatus as available in the XS2A interface is preferred by the TPP.  This header field may be ignored, if the ASPSP does not support resource notification services for the related TPP.
$associate_array['digest'] = 'SHA-256=hl1/Eps8BEQW58FJhDApwJXjGY4nr1ArGDHIT25vq6A='; // string | Is contained if and only if the \"Signature\" element is contained in the header of the request.
$associate_array['signature'] = 'keyId="SN=9FA1,CA=CN=D-TRUST%20CA%202-1%202015,O=D-Trust%20GmbH,C=DE",algorithm="rsa-sha256", headers="Digest X-Request-ID PSU-ID TPP-Redirect-URI Date", signature="Base64(RSA-SHA256(signing string))"'
; // string | A signature of the request by the TPP on application level. This might be mandated by ASPSP.
$associate_array['tpp_signature_certificate'] = 'tpp_signature_certificate_example'; // string | The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained.
$associate_array['psu_ip_address'] = '192.168.8.78'; // string | The forwarded IP Address header field consists of the corresponding http request IP Address field between PSU and TPP.
$associate_array['psu_ip_port'] = 1234; // string | The forwarded IP Port header field consists of the corresponding HTTP request IP Port field between PSU and TPP, if available.
$associate_array['psu_accept'] = 'psu_accept_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_charset'] = 'psu_accept_charset_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_encoding'] = 'psu_accept_encoding_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_language'] = 'psu_accept_language_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_user_agent'] = 'psu_user_agent_example'; // string | The forwarded Agent header field of the HTTP request between PSU and TPP, if available.
$associate_array['psu_http_method'] = 'psu_http_method_example'; // string | HTTP method used at the PSU ? TPP interface, if available. Valid values are: * GET * POST * PUT * PATCH * DELETE
$associate_array['psu_device_id'] = '99435c7e-ad88-49ec-a2ad-99ddcb1f5555'; // string | UUID (Universally Unique Identifier) for a device, which is used by the PSU, if available. UUID identifies either a device or a device dependant application installation. In case of an installation identification this ID needs to be unaltered until removal from device.
$associate_array['psu_geo_location'] = 'GEO:52.506931;13.144558'; // string | The forwarded Geo Location of the corresponding http request between PSU and TPP if available.
$associate_array['unknown_base_type'] = new \BankIO\Sdk\Model\UNKNOWN_BASE_TYPE(); // \BankIO\Sdk\Model\UNKNOWN_BASE_TYPE | 

try {
    $result = $apiInstance->startPaymentAuthorisation($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentInitiationServicePISApi->startPaymentAuthorisation: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **organisation** | **string**| This identification is denoting the addressed bankIO organisation. The organisation is the \&quot;name\&quot; attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **payment_service** | **string**| Payment service:  Possible values are: * payments * bulk-payments * periodic-payments |
 **payment_product** | **string**| The addressed payment product endpoint, e.g. for SEPA Credit Transfers (SCT). The ASPSP will publish which of the payment products/endpoints will be supported.  The following payment products are supported:   - sepa-credit-transfers   - instant-sepa-credit-transfers   - target-2-payments   - cross-border-credit-transfers   - pain.001-sepa-credit-transfers   - pain.001-instant-sepa-credit-transfers   - pain.001-target-2-payments   - pain.001-cross-border-credit-transfers  **Remark:** For all SEPA Credit Transfer based endpoints which accept XML encoding,  the XML pain.001 schemes provided by EPC are supported by the ASPSP as a minimum for the body content.  Further XML schemes might be supported by some communities.  **Remark:** For cross-border and TARGET-2 payments only community wide pain.001 schemes do exist.  There are plenty of country specificic scheme variants. |
 **payment_id** | **string**| Resource identification of the generated payment initiation resource. |
 **x_request_id** | [**string**](../Model/.md)| ID of the request, unique to the call, as determined by the initiating party. |
 **psu_id** | **string**| Client ID of the PSU in the ASPSP client interface.   Might be mandated in the ASPSP&#39;s documentation.  It might be contained even if an OAuth2 based authentication was performed in a pre-step or an OAuth2 based SCA was performed in an preceding AIS service in the same session. In this case the ASPSP might check whether PSU-ID and token match,  according to ASPSP documentation. | [optional]
 **psu_id_type** | **string**| Type of the PSU-ID, needed in scenarios where PSUs have several PSU-IDs as access possibility.  In this case, the mean and use are then defined in the ASPSP’s documentation. | [optional]
 **psu_corporate_id** | **string**| Might be mandated in the ASPSP&#39;s documentation. Only used in a corporate context. | [optional]
 **psu_corporate_id_type** | **string**| Might be mandated in the ASPSP&#39;s documentation. Only used in a corporate context. | [optional]
 **tpp_redirect_preferred** | **bool**| If it equals \&quot;true\&quot;, the TPP prefers a redirect over an embedded SCA approach. If it equals \&quot;false\&quot;, the TPP prefers not to be redirected for SCA. The ASPSP will then choose between the Embedded or the Decoupled SCA approach, depending on the choice of the SCA procedure by the TPP/PSU. If the parameter is not used, the ASPSP will choose the SCA approach to be applied depending on the SCA method chosen by the TPP/PSU. | [optional]
 **tpp_redirect_uri** | **string**| URI of the TPP, where the transaction flow shall be redirected to after a Redirect.  Mandated for the Redirect SCA Approach, specifically  when TPP-Redirect-Preferred equals \&quot;true\&quot;. It is recommended to always use this header field.  **Remark for Future:**  This field might be changed to mandatory in the next version of the specification. | [optional]
 **tpp_nok_redirect_uri** | **string**| If this URI is contained, the TPP is asking to redirect the transaction flow to this address instead of the TPP-Redirect-URI in case of a negative result of the redirect SCA method. This might be ignored by the ASPSP. | [optional]
 **tpp_notification_uri** | **string**| URI for the Endpoint of the TPP-API to which the status of the payment initiation should be sent. This header field may by ignored by the ASPSP.  For security reasons, it shall be ensured that the TPP-Notification-URI as introduced above is secured by the TPP eIDAS QWAC used for identification of the TPP. The following applies:  URIs which are provided by TPPs in TPP-Notification-URI shall comply with the domain secured by the eIDAS QWAC certificate of the TPP in the field CN or SubjectAltName of the certificate. Please note that in case of example-TPP.com as certificate entry TPP- Notification-URI like www.example-TPP.com/xs2a-client/v1/ASPSPidentifcation/mytransaction- id/notifications or notifications.example-TPP.com/xs2a-client/v1/ASPSPidentifcation/mytransaction- id/notifications would be compliant.  Wildcard definitions shall be taken into account for compliance checks by the ASPSP.  ASPSPs may respond with ASPSP-Notification-Support set to false, if the provided URIs do not comply. | [optional]
 **tpp_notification_content_preferred** | **string**| The string has the form   status&#x3D;X1, ..., Xn  where Xi is one of the constants SCA, PROCESS, LAST and where constants are not repeated. The usage of the constants supports the of following semantics:    SCA: A notification on every change of the scaStatus attribute for all related authorisation processes is preferred by the TPP.    PROCESS: A notification on all changes of consentStatus or transactionStatus attributes is preferred by the TPP.   LAST: Only a notification on the last consentStatus or transactionStatus as available in the XS2A interface is preferred by the TPP.  This header field may be ignored, if the ASPSP does not support resource notification services for the related TPP. | [optional]
 **digest** | **string**| Is contained if and only if the \&quot;Signature\&quot; element is contained in the header of the request. | [optional]
 **signature** | **string**| A signature of the request by the TPP on application level. This might be mandated by ASPSP. | [optional]
 **tpp_signature_certificate** | **string**| The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained. | [optional]
 **psu_ip_address** | **string**| The forwarded IP Address header field consists of the corresponding http request IP Address field between PSU and TPP. | [optional]
 **psu_ip_port** | **string**| The forwarded IP Port header field consists of the corresponding HTTP request IP Port field between PSU and TPP, if available. | [optional]
 **psu_accept** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_charset** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_encoding** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_language** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_user_agent** | **string**| The forwarded Agent header field of the HTTP request between PSU and TPP, if available. | [optional]
 **psu_http_method** | **string**| HTTP method used at the PSU ? TPP interface, if available. Valid values are: * GET * POST * PUT * PATCH * DELETE | [optional]
 **psu_device_id** | [**string**](../Model/.md)| UUID (Universally Unique Identifier) for a device, which is used by the PSU, if available. UUID identifies either a device or a device dependant application installation. In case of an installation identification this ID needs to be unaltered until removal from device. | [optional]
 **psu_geo_location** | **string**| The forwarded Geo Location of the corresponding http request between PSU and TPP if available. | [optional]
 **unknown_base_type** | [**\BankIO\Sdk\Model\UNKNOWN_BASE_TYPE**](../Model/UNKNOWN_BASE_TYPE.md)|  | [optional]

### Return type

[**\BankIO\Sdk\Model\StartScaprocessResponse**](../Model/StartScaprocessResponse.md)

### Authorization

[oAuth2AuthCode](../../README.md#oAuth2AuthCode)

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json, application/problem+json, 

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## startPaymentInitiationCancellationAuthorisation

> \BankIO\Sdk\Model\StartScaprocessResponse startPaymentInitiationCancellationAuthorisation($organisation, $payment_service, $payment_product, $payment_id, $x_request_id, $digest, $signature, $tpp_signature_certificate, $psu_id, $psu_id_type, $psu_corporate_id, $psu_corporate_id_type, $tpp_redirect_preferred, $tpp_redirect_uri, $tpp_nok_redirect_uri, $tpp_notification_uri, $tpp_notification_content_preferred, $psu_ip_address, $psu_ip_port, $psu_accept, $psu_accept_charset, $psu_accept_encoding, $psu_accept_language, $psu_user_agent, $psu_http_method, $psu_device_id, $psu_geo_location, $unknown_base_type)

Start the authorisation process for the cancellation of the addressed payment

Creates an authorisation sub-resource and start the authorisation process of the cancellation of the addressed payment.  The message might in addition transmit authentication and authorisation related data.  This method is iterated n times for a n times SCA authorisation in a  corporate context, each creating an own authorisation sub-endpoint for  the corresponding PSU authorising the cancellation-authorisation.  The ASPSP might make the usage of this access method unnecessary in case  of only one SCA process needed, since the related authorisation resource  might be automatically created by the ASPSP after the submission of the  payment data with the first POST payments/{payment-product} call.  The start authorisation process is a process which is needed for creating a new authorisation  or cancellation sub-resource.   This applies in the following scenarios:    * The ASPSP has indicated with a 'startAuthorisation' hyperlink in the preceding payment      initiation response that an explicit start of the authorisation process is needed by the TPP.      The 'startAuthorisation' hyperlink can transport more information about data which needs to be      uploaded by using the extended forms:     * 'startAuthorisationWithPsuIdentfication'     * 'startAuthorisationWithPsuAuthentication'     * 'startAuthorisationWithAuthentciationMethodSelection'    * The related payment initiation cannot yet be executed since a multilevel SCA is mandated.   * The ASPSP has indicated with a 'startAuthorisation' hyperlink in the preceding      payment cancellation response that an explicit start of the authorisation process is needed by the TPP.      The 'startAuthorisation' hyperlink can transport more information about data which needs to be uploaded      by using the extended forms as indicated above.   * The related payment cancellation request cannot be applied yet since a multilevel SCA is mandate for      executing the cancellation.   * The signing basket needs to be authorised yet.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oAuth2AuthCode
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$client = HttpClientDiscovery::find();
$apiInstance = new BankIO\Sdk\Api\PaymentInitiationServicePISApi(
    // If you want use custom http client, pass your client which implements `Http\Client\HttpClient`.
    // This is optional, `HTTPlug` will be used as default.
    $client,
    $config
);
$associate_array['organisation'] = 'organisation_example'; // string | This identification is denoting the addressed bankIO organisation. The organisation is the \"name\" attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['payment_service'] = 'payment_service_example'; // string | Payment service:  Possible values are: * payments * bulk-payments * periodic-payments
$associate_array['payment_product'] = 'payment_product_example'; // string | The addressed payment product endpoint, e.g. for SEPA Credit Transfers (SCT). The ASPSP will publish which of the payment products/endpoints will be supported.  The following payment products are supported:   - sepa-credit-transfers   - instant-sepa-credit-transfers   - target-2-payments   - cross-border-credit-transfers   - pain.001-sepa-credit-transfers   - pain.001-instant-sepa-credit-transfers   - pain.001-target-2-payments   - pain.001-cross-border-credit-transfers  **Remark:** For all SEPA Credit Transfer based endpoints which accept XML encoding,  the XML pain.001 schemes provided by EPC are supported by the ASPSP as a minimum for the body content.  Further XML schemes might be supported by some communities.  **Remark:** For cross-border and TARGET-2 payments only community wide pain.001 schemes do exist.  There are plenty of country specificic scheme variants.
$associate_array['payment_id'] = 'payment_id_example'; // string | Resource identification of the generated payment initiation resource.
$associate_array['x_request_id'] = '99391c7e-ad88-49ec-a2ad-99ddcb1f7721'; // string | ID of the request, unique to the call, as determined by the initiating party.
$associate_array['digest'] = 'SHA-256=hl1/Eps8BEQW58FJhDApwJXjGY4nr1ArGDHIT25vq6A='; // string | Is contained if and only if the \"Signature\" element is contained in the header of the request.
$associate_array['signature'] = 'keyId="SN=9FA1,CA=CN=D-TRUST%20CA%202-1%202015,O=D-Trust%20GmbH,C=DE",algorithm="rsa-sha256", headers="Digest X-Request-ID PSU-ID TPP-Redirect-URI Date", signature="Base64(RSA-SHA256(signing string))"'
; // string | A signature of the request by the TPP on application level. This might be mandated by ASPSP.
$associate_array['tpp_signature_certificate'] = 'tpp_signature_certificate_example'; // string | The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained.
$associate_array['psu_id'] = 'PSU-1234'; // string | Client ID of the PSU in the ASPSP client interface.   Might be mandated in the ASPSP's documentation.  It might be contained even if an OAuth2 based authentication was performed in a pre-step or an OAuth2 based SCA was performed in an preceding AIS service in the same session. In this case the ASPSP might check whether PSU-ID and token match,  according to ASPSP documentation.
$associate_array['psu_id_type'] = 'psu_id_type_example'; // string | Type of the PSU-ID, needed in scenarios where PSUs have several PSU-IDs as access possibility.  In this case, the mean and use are then defined in the ASPSP’s documentation.
$associate_array['psu_corporate_id'] = 'psu_corporate_id_example'; // string | Might be mandated in the ASPSP's documentation. Only used in a corporate context.
$associate_array['psu_corporate_id_type'] = 'psu_corporate_id_type_example'; // string | Might be mandated in the ASPSP's documentation. Only used in a corporate context.
$associate_array['tpp_redirect_preferred'] = True; // bool | If it equals \"true\", the TPP prefers a redirect over an embedded SCA approach. If it equals \"false\", the TPP prefers not to be redirected for SCA. The ASPSP will then choose between the Embedded or the Decoupled SCA approach, depending on the choice of the SCA procedure by the TPP/PSU. If the parameter is not used, the ASPSP will choose the SCA approach to be applied depending on the SCA method chosen by the TPP/PSU.
$associate_array['tpp_redirect_uri'] = 'tpp_redirect_uri_example'; // string | URI of the TPP, where the transaction flow shall be redirected to after a Redirect.  Mandated for the Redirect SCA Approach, specifically  when TPP-Redirect-Preferred equals \"true\". It is recommended to always use this header field.  **Remark for Future:**  This field might be changed to mandatory in the next version of the specification.
$associate_array['tpp_nok_redirect_uri'] = 'tpp_nok_redirect_uri_example'; // string | If this URI is contained, the TPP is asking to redirect the transaction flow to this address instead of the TPP-Redirect-URI in case of a negative result of the redirect SCA method. This might be ignored by the ASPSP.
$associate_array['tpp_notification_uri'] = 'tpp_notification_uri_example'; // string | URI for the Endpoint of the TPP-API to which the status of the payment initiation should be sent. This header field may by ignored by the ASPSP.  For security reasons, it shall be ensured that the TPP-Notification-URI as introduced above is secured by the TPP eIDAS QWAC used for identification of the TPP. The following applies:  URIs which are provided by TPPs in TPP-Notification-URI shall comply with the domain secured by the eIDAS QWAC certificate of the TPP in the field CN or SubjectAltName of the certificate. Please note that in case of example-TPP.com as certificate entry TPP- Notification-URI like www.example-TPP.com/xs2a-client/v1/ASPSPidentifcation/mytransaction- id/notifications or notifications.example-TPP.com/xs2a-client/v1/ASPSPidentifcation/mytransaction- id/notifications would be compliant.  Wildcard definitions shall be taken into account for compliance checks by the ASPSP.  ASPSPs may respond with ASPSP-Notification-Support set to false, if the provided URIs do not comply.
$associate_array['tpp_notification_content_preferred'] = 'tpp_notification_content_preferred_example'; // string | The string has the form   status=X1, ..., Xn  where Xi is one of the constants SCA, PROCESS, LAST and where constants are not repeated. The usage of the constants supports the of following semantics:    SCA: A notification on every change of the scaStatus attribute for all related authorisation processes is preferred by the TPP.    PROCESS: A notification on all changes of consentStatus or transactionStatus attributes is preferred by the TPP.   LAST: Only a notification on the last consentStatus or transactionStatus as available in the XS2A interface is preferred by the TPP.  This header field may be ignored, if the ASPSP does not support resource notification services for the related TPP.
$associate_array['psu_ip_address'] = '192.168.8.78'; // string | The forwarded IP Address header field consists of the corresponding http request IP Address field between PSU and TPP.
$associate_array['psu_ip_port'] = 1234; // string | The forwarded IP Port header field consists of the corresponding HTTP request IP Port field between PSU and TPP, if available.
$associate_array['psu_accept'] = 'psu_accept_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_charset'] = 'psu_accept_charset_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_encoding'] = 'psu_accept_encoding_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_language'] = 'psu_accept_language_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_user_agent'] = 'psu_user_agent_example'; // string | The forwarded Agent header field of the HTTP request between PSU and TPP, if available.
$associate_array['psu_http_method'] = 'psu_http_method_example'; // string | HTTP method used at the PSU ? TPP interface, if available. Valid values are: * GET * POST * PUT * PATCH * DELETE
$associate_array['psu_device_id'] = '99435c7e-ad88-49ec-a2ad-99ddcb1f5555'; // string | UUID (Universally Unique Identifier) for a device, which is used by the PSU, if available. UUID identifies either a device or a device dependant application installation. In case of an installation identification this ID needs to be unaltered until removal from device.
$associate_array['psu_geo_location'] = 'GEO:52.506931;13.144558'; // string | The forwarded Geo Location of the corresponding http request between PSU and TPP if available.
$associate_array['unknown_base_type'] = new \BankIO\Sdk\Model\UNKNOWN_BASE_TYPE(); // \BankIO\Sdk\Model\UNKNOWN_BASE_TYPE | 

try {
    $result = $apiInstance->startPaymentInitiationCancellationAuthorisation($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentInitiationServicePISApi->startPaymentInitiationCancellationAuthorisation: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **organisation** | **string**| This identification is denoting the addressed bankIO organisation. The organisation is the \&quot;name\&quot; attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **payment_service** | **string**| Payment service:  Possible values are: * payments * bulk-payments * periodic-payments |
 **payment_product** | **string**| The addressed payment product endpoint, e.g. for SEPA Credit Transfers (SCT). The ASPSP will publish which of the payment products/endpoints will be supported.  The following payment products are supported:   - sepa-credit-transfers   - instant-sepa-credit-transfers   - target-2-payments   - cross-border-credit-transfers   - pain.001-sepa-credit-transfers   - pain.001-instant-sepa-credit-transfers   - pain.001-target-2-payments   - pain.001-cross-border-credit-transfers  **Remark:** For all SEPA Credit Transfer based endpoints which accept XML encoding,  the XML pain.001 schemes provided by EPC are supported by the ASPSP as a minimum for the body content.  Further XML schemes might be supported by some communities.  **Remark:** For cross-border and TARGET-2 payments only community wide pain.001 schemes do exist.  There are plenty of country specificic scheme variants. |
 **payment_id** | **string**| Resource identification of the generated payment initiation resource. |
 **x_request_id** | [**string**](../Model/.md)| ID of the request, unique to the call, as determined by the initiating party. |
 **digest** | **string**| Is contained if and only if the \&quot;Signature\&quot; element is contained in the header of the request. | [optional]
 **signature** | **string**| A signature of the request by the TPP on application level. This might be mandated by ASPSP. | [optional]
 **tpp_signature_certificate** | **string**| The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained. | [optional]
 **psu_id** | **string**| Client ID of the PSU in the ASPSP client interface.   Might be mandated in the ASPSP&#39;s documentation.  It might be contained even if an OAuth2 based authentication was performed in a pre-step or an OAuth2 based SCA was performed in an preceding AIS service in the same session. In this case the ASPSP might check whether PSU-ID and token match,  according to ASPSP documentation. | [optional]
 **psu_id_type** | **string**| Type of the PSU-ID, needed in scenarios where PSUs have several PSU-IDs as access possibility.  In this case, the mean and use are then defined in the ASPSP’s documentation. | [optional]
 **psu_corporate_id** | **string**| Might be mandated in the ASPSP&#39;s documentation. Only used in a corporate context. | [optional]
 **psu_corporate_id_type** | **string**| Might be mandated in the ASPSP&#39;s documentation. Only used in a corporate context. | [optional]
 **tpp_redirect_preferred** | **bool**| If it equals \&quot;true\&quot;, the TPP prefers a redirect over an embedded SCA approach. If it equals \&quot;false\&quot;, the TPP prefers not to be redirected for SCA. The ASPSP will then choose between the Embedded or the Decoupled SCA approach, depending on the choice of the SCA procedure by the TPP/PSU. If the parameter is not used, the ASPSP will choose the SCA approach to be applied depending on the SCA method chosen by the TPP/PSU. | [optional]
 **tpp_redirect_uri** | **string**| URI of the TPP, where the transaction flow shall be redirected to after a Redirect.  Mandated for the Redirect SCA Approach, specifically  when TPP-Redirect-Preferred equals \&quot;true\&quot;. It is recommended to always use this header field.  **Remark for Future:**  This field might be changed to mandatory in the next version of the specification. | [optional]
 **tpp_nok_redirect_uri** | **string**| If this URI is contained, the TPP is asking to redirect the transaction flow to this address instead of the TPP-Redirect-URI in case of a negative result of the redirect SCA method. This might be ignored by the ASPSP. | [optional]
 **tpp_notification_uri** | **string**| URI for the Endpoint of the TPP-API to which the status of the payment initiation should be sent. This header field may by ignored by the ASPSP.  For security reasons, it shall be ensured that the TPP-Notification-URI as introduced above is secured by the TPP eIDAS QWAC used for identification of the TPP. The following applies:  URIs which are provided by TPPs in TPP-Notification-URI shall comply with the domain secured by the eIDAS QWAC certificate of the TPP in the field CN or SubjectAltName of the certificate. Please note that in case of example-TPP.com as certificate entry TPP- Notification-URI like www.example-TPP.com/xs2a-client/v1/ASPSPidentifcation/mytransaction- id/notifications or notifications.example-TPP.com/xs2a-client/v1/ASPSPidentifcation/mytransaction- id/notifications would be compliant.  Wildcard definitions shall be taken into account for compliance checks by the ASPSP.  ASPSPs may respond with ASPSP-Notification-Support set to false, if the provided URIs do not comply. | [optional]
 **tpp_notification_content_preferred** | **string**| The string has the form   status&#x3D;X1, ..., Xn  where Xi is one of the constants SCA, PROCESS, LAST and where constants are not repeated. The usage of the constants supports the of following semantics:    SCA: A notification on every change of the scaStatus attribute for all related authorisation processes is preferred by the TPP.    PROCESS: A notification on all changes of consentStatus or transactionStatus attributes is preferred by the TPP.   LAST: Only a notification on the last consentStatus or transactionStatus as available in the XS2A interface is preferred by the TPP.  This header field may be ignored, if the ASPSP does not support resource notification services for the related TPP. | [optional]
 **psu_ip_address** | **string**| The forwarded IP Address header field consists of the corresponding http request IP Address field between PSU and TPP. | [optional]
 **psu_ip_port** | **string**| The forwarded IP Port header field consists of the corresponding HTTP request IP Port field between PSU and TPP, if available. | [optional]
 **psu_accept** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_charset** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_encoding** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_language** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_user_agent** | **string**| The forwarded Agent header field of the HTTP request between PSU and TPP, if available. | [optional]
 **psu_http_method** | **string**| HTTP method used at the PSU ? TPP interface, if available. Valid values are: * GET * POST * PUT * PATCH * DELETE | [optional]
 **psu_device_id** | [**string**](../Model/.md)| UUID (Universally Unique Identifier) for a device, which is used by the PSU, if available. UUID identifies either a device or a device dependant application installation. In case of an installation identification this ID needs to be unaltered until removal from device. | [optional]
 **psu_geo_location** | **string**| The forwarded Geo Location of the corresponding http request between PSU and TPP if available. | [optional]
 **unknown_base_type** | [**\BankIO\Sdk\Model\UNKNOWN_BASE_TYPE**](../Model/UNKNOWN_BASE_TYPE.md)|  | [optional]

### Return type

[**\BankIO\Sdk\Model\StartScaprocessResponse**](../Model/StartScaprocessResponse.md)

### Authorization

[oAuth2AuthCode](../../README.md#oAuth2AuthCode)

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json, application/problem+json, 

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## updatePaymentCancellationPsuData

> OneOfUpdatePsuIdenticationResponseUpdatePsuAuthenticationResponseSelectPsuAuthenticationMethodResponseScaStatusResponseAuthorisationConfirmationResponse updatePaymentCancellationPsuData($organisation, $payment_service, $payment_product, $payment_id, $authorisation_id, $x_request_id, $digest, $signature, $tpp_signature_certificate, $psu_id, $psu_id_type, $psu_corporate_id, $psu_corporate_id_type, $psu_ip_address, $psu_ip_port, $psu_accept, $psu_accept_charset, $psu_accept_encoding, $psu_accept_language, $psu_user_agent, $psu_http_method, $psu_device_id, $psu_geo_location, $unknown_base_type)

Update PSU data for payment initiation cancellation

This method updates PSU data on the cancellation authorisation resource if needed.  It may authorise a cancellation of the payment within the Embedded SCA Approach where needed.  Independently from the SCA Approach it supports e.g. the selection of  the authentication method and a non-SCA PSU authentication.  This methods updates PSU data on the cancellation authorisation resource if needed.   There are several possible update PSU data requests in the context of a cancellation authorisation within the payment initiation services needed,  which depends on the SCA approach:  * Redirect SCA Approach:   A specific Update PSU data request is applicable for      * the selection of authentication methods, before choosing the actual SCA approach. * Decoupled SCA Approach:   A specific Update PSU data request is only applicable for   * adding the PSU Identification, if not provided yet in the payment initiation request or the Account Information Consent Request, or if no OAuth2 access token is used, or   * the selection of authentication methods. * Embedded SCA Approach:    The Update PSU data request might be used    * to add credentials as a first factor authentication data of the PSU and   * to select the authentication method and   * transaction authorisation.  The SCA approach might depend on the chosen SCA method.  For that reason, the following possible update PSU data request can apply to all SCA approaches:  * Select an SCA method in case of several SCA methods are available for the customer.  There are the following request types on this access path:   * Update PSU identification   * Update PSU authentication   * Select PSU autorization method      WARNING: This method needs a reduced header,      therefore many optional elements are not present.      Maybe in a later version the access path will change.   * Transaction Authorisation     WARNING: This method needs a reduced header,      therefore many optional elements are not present.      Maybe in a later version the access path will change.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oAuth2AuthCode
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$client = HttpClientDiscovery::find();
$apiInstance = new BankIO\Sdk\Api\PaymentInitiationServicePISApi(
    // If you want use custom http client, pass your client which implements `Http\Client\HttpClient`.
    // This is optional, `HTTPlug` will be used as default.
    $client,
    $config
);
$associate_array['organisation'] = 'organisation_example'; // string | This identification is denoting the addressed bankIO organisation. The organisation is the \"name\" attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['payment_service'] = 'payment_service_example'; // string | Payment service:  Possible values are: * payments * bulk-payments * periodic-payments
$associate_array['payment_product'] = 'payment_product_example'; // string | The addressed payment product endpoint, e.g. for SEPA Credit Transfers (SCT). The ASPSP will publish which of the payment products/endpoints will be supported.  The following payment products are supported:   - sepa-credit-transfers   - instant-sepa-credit-transfers   - target-2-payments   - cross-border-credit-transfers   - pain.001-sepa-credit-transfers   - pain.001-instant-sepa-credit-transfers   - pain.001-target-2-payments   - pain.001-cross-border-credit-transfers  **Remark:** For all SEPA Credit Transfer based endpoints which accept XML encoding,  the XML pain.001 schemes provided by EPC are supported by the ASPSP as a minimum for the body content.  Further XML schemes might be supported by some communities.  **Remark:** For cross-border and TARGET-2 payments only community wide pain.001 schemes do exist.  There are plenty of country specificic scheme variants.
$associate_array['payment_id'] = 'payment_id_example'; // string | Resource identification of the generated payment initiation resource.
$associate_array['authorisation_id'] = 'authorisation_id_example'; // string | Resource identification of the related SCA.
$associate_array['x_request_id'] = '99391c7e-ad88-49ec-a2ad-99ddcb1f7721'; // string | ID of the request, unique to the call, as determined by the initiating party.
$associate_array['digest'] = 'SHA-256=hl1/Eps8BEQW58FJhDApwJXjGY4nr1ArGDHIT25vq6A='; // string | Is contained if and only if the \"Signature\" element is contained in the header of the request.
$associate_array['signature'] = 'keyId="SN=9FA1,CA=CN=D-TRUST%20CA%202-1%202015,O=D-Trust%20GmbH,C=DE",algorithm="rsa-sha256", headers="Digest X-Request-ID PSU-ID TPP-Redirect-URI Date", signature="Base64(RSA-SHA256(signing string))"'
; // string | A signature of the request by the TPP on application level. This might be mandated by ASPSP.
$associate_array['tpp_signature_certificate'] = 'tpp_signature_certificate_example'; // string | The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained.
$associate_array['psu_id'] = 'PSU-1234'; // string | Client ID of the PSU in the ASPSP client interface.   Might be mandated in the ASPSP's documentation.  It might be contained even if an OAuth2 based authentication was performed in a pre-step or an OAuth2 based SCA was performed in an preceding AIS service in the same session. In this case the ASPSP might check whether PSU-ID and token match,  according to ASPSP documentation.
$associate_array['psu_id_type'] = 'psu_id_type_example'; // string | Type of the PSU-ID, needed in scenarios where PSUs have several PSU-IDs as access possibility.  In this case, the mean and use are then defined in the ASPSP’s documentation.
$associate_array['psu_corporate_id'] = 'psu_corporate_id_example'; // string | Might be mandated in the ASPSP's documentation. Only used in a corporate context.
$associate_array['psu_corporate_id_type'] = 'psu_corporate_id_type_example'; // string | Might be mandated in the ASPSP's documentation. Only used in a corporate context.
$associate_array['psu_ip_address'] = '192.168.8.78'; // string | The forwarded IP Address header field consists of the corresponding http request IP Address field between PSU and TPP.
$associate_array['psu_ip_port'] = 1234; // string | The forwarded IP Port header field consists of the corresponding HTTP request IP Port field between PSU and TPP, if available.
$associate_array['psu_accept'] = 'psu_accept_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_charset'] = 'psu_accept_charset_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_encoding'] = 'psu_accept_encoding_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_language'] = 'psu_accept_language_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_user_agent'] = 'psu_user_agent_example'; // string | The forwarded Agent header field of the HTTP request between PSU and TPP, if available.
$associate_array['psu_http_method'] = 'psu_http_method_example'; // string | HTTP method used at the PSU ? TPP interface, if available. Valid values are: * GET * POST * PUT * PATCH * DELETE
$associate_array['psu_device_id'] = '99435c7e-ad88-49ec-a2ad-99ddcb1f5555'; // string | UUID (Universally Unique Identifier) for a device, which is used by the PSU, if available. UUID identifies either a device or a device dependant application installation. In case of an installation identification this ID needs to be unaltered until removal from device.
$associate_array['psu_geo_location'] = 'GEO:52.506931;13.144558'; // string | The forwarded Geo Location of the corresponding http request between PSU and TPP if available.
$associate_array['unknown_base_type'] = {}; // \BankIO\Sdk\Model\UNKNOWN_BASE_TYPE | 

try {
    $result = $apiInstance->updatePaymentCancellationPsuData($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentInitiationServicePISApi->updatePaymentCancellationPsuData: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **organisation** | **string**| This identification is denoting the addressed bankIO organisation. The organisation is the \&quot;name\&quot; attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **payment_service** | **string**| Payment service:  Possible values are: * payments * bulk-payments * periodic-payments |
 **payment_product** | **string**| The addressed payment product endpoint, e.g. for SEPA Credit Transfers (SCT). The ASPSP will publish which of the payment products/endpoints will be supported.  The following payment products are supported:   - sepa-credit-transfers   - instant-sepa-credit-transfers   - target-2-payments   - cross-border-credit-transfers   - pain.001-sepa-credit-transfers   - pain.001-instant-sepa-credit-transfers   - pain.001-target-2-payments   - pain.001-cross-border-credit-transfers  **Remark:** For all SEPA Credit Transfer based endpoints which accept XML encoding,  the XML pain.001 schemes provided by EPC are supported by the ASPSP as a minimum for the body content.  Further XML schemes might be supported by some communities.  **Remark:** For cross-border and TARGET-2 payments only community wide pain.001 schemes do exist.  There are plenty of country specificic scheme variants. |
 **payment_id** | **string**| Resource identification of the generated payment initiation resource. |
 **authorisation_id** | **string**| Resource identification of the related SCA. |
 **x_request_id** | [**string**](../Model/.md)| ID of the request, unique to the call, as determined by the initiating party. |
 **digest** | **string**| Is contained if and only if the \&quot;Signature\&quot; element is contained in the header of the request. | [optional]
 **signature** | **string**| A signature of the request by the TPP on application level. This might be mandated by ASPSP. | [optional]
 **tpp_signature_certificate** | **string**| The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained. | [optional]
 **psu_id** | **string**| Client ID of the PSU in the ASPSP client interface.   Might be mandated in the ASPSP&#39;s documentation.  It might be contained even if an OAuth2 based authentication was performed in a pre-step or an OAuth2 based SCA was performed in an preceding AIS service in the same session. In this case the ASPSP might check whether PSU-ID and token match,  according to ASPSP documentation. | [optional]
 **psu_id_type** | **string**| Type of the PSU-ID, needed in scenarios where PSUs have several PSU-IDs as access possibility.  In this case, the mean and use are then defined in the ASPSP’s documentation. | [optional]
 **psu_corporate_id** | **string**| Might be mandated in the ASPSP&#39;s documentation. Only used in a corporate context. | [optional]
 **psu_corporate_id_type** | **string**| Might be mandated in the ASPSP&#39;s documentation. Only used in a corporate context. | [optional]
 **psu_ip_address** | **string**| The forwarded IP Address header field consists of the corresponding http request IP Address field between PSU and TPP. | [optional]
 **psu_ip_port** | **string**| The forwarded IP Port header field consists of the corresponding HTTP request IP Port field between PSU and TPP, if available. | [optional]
 **psu_accept** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_charset** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_encoding** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_language** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_user_agent** | **string**| The forwarded Agent header field of the HTTP request between PSU and TPP, if available. | [optional]
 **psu_http_method** | **string**| HTTP method used at the PSU ? TPP interface, if available. Valid values are: * GET * POST * PUT * PATCH * DELETE | [optional]
 **psu_device_id** | [**string**](../Model/.md)| UUID (Universally Unique Identifier) for a device, which is used by the PSU, if available. UUID identifies either a device or a device dependant application installation. In case of an installation identification this ID needs to be unaltered until removal from device. | [optional]
 **psu_geo_location** | **string**| The forwarded Geo Location of the corresponding http request between PSU and TPP if available. | [optional]
 **unknown_base_type** | [**\BankIO\Sdk\Model\UNKNOWN_BASE_TYPE**](../Model/UNKNOWN_BASE_TYPE.md)|  | [optional]

### Return type

[**OneOfUpdatePsuIdenticationResponseUpdatePsuAuthenticationResponseSelectPsuAuthenticationMethodResponseScaStatusResponseAuthorisationConfirmationResponse**](../Model/OneOfUpdatePsuIdenticationResponseUpdatePsuAuthenticationResponseSelectPsuAuthenticationMethodResponseScaStatusResponseAuthorisationConfirmationResponse.md)

### Authorization

[oAuth2AuthCode](../../README.md#oAuth2AuthCode)

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json, application/problem+json, 

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## updatePaymentPsuData

> OneOfUpdatePsuIdenticationResponseUpdatePsuAuthenticationResponseSelectPsuAuthenticationMethodResponseScaStatusResponseAuthorisationConfirmationResponse updatePaymentPsuData($organisation, $payment_service, $payment_product, $payment_id, $authorisation_id, $x_request_id, $digest, $signature, $tpp_signature_certificate, $psu_id, $psu_id_type, $psu_corporate_id, $psu_corporate_id_type, $psu_ip_address, $psu_ip_port, $psu_accept, $psu_accept_charset, $psu_accept_encoding, $psu_accept_language, $psu_user_agent, $psu_http_method, $psu_device_id, $psu_geo_location, $unknown_base_type)

Update PSU data for payment initiation

This methods updates PSU data on the authorisation resource if needed.  It may authorise a payment within the Embedded SCA Approach where needed.  Independently from the SCA Approach it supports e.g. the selection of  the authentication method and a non-SCA PSU authentication.  There are several possible update PSU data requests in the context of payment initiation services needed,  which depends on the SCA approach:  * Redirect SCA Approach:   A specific update PSU data request is applicable for      * the selection of authentication methods, before choosing the actual SCA approach. * Decoupled SCA Approach:   A specific update PSU data request is only applicable for   * adding the PSU identification, if not provided yet in the payment initiation request or the account information consent request, or if no OAuth2 access token is used, or   * the selection of authentication methods. * Embedded SCA Approach:    The Update PSU Data request might be used    * to add credentials as a first factor authentication data of the PSU and   * to select the authentication method and   * transaction authorisation.  The SCA Approach might depend on the chosen SCA method.  For that reason, the following possible Update PSU data request can apply to all SCA approaches:  * Select an SCA method in case of several SCA methods are available for the customer.  There are the following request types on this access path:   * Update PSU identification   * Update PSU authentication   * Select PSU autorization method      WARNING: This method needs a reduced header,      therefore many optional elements are not present.      Maybe in a later version the access path will change.   * Transaction authorisation     WARNING: This method needs a reduced header,      therefore many optional elements are not present.      Maybe in a later version the access path will change.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oAuth2AuthCode
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$client = HttpClientDiscovery::find();
$apiInstance = new BankIO\Sdk\Api\PaymentInitiationServicePISApi(
    // If you want use custom http client, pass your client which implements `Http\Client\HttpClient`.
    // This is optional, `HTTPlug` will be used as default.
    $client,
    $config
);
$associate_array['organisation'] = 'organisation_example'; // string | This identification is denoting the addressed bankIO organisation. The organisation is the \"name\" attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['payment_service'] = 'payment_service_example'; // string | Payment service:  Possible values are: * payments * bulk-payments * periodic-payments
$associate_array['payment_product'] = 'payment_product_example'; // string | The addressed payment product endpoint, e.g. for SEPA Credit Transfers (SCT). The ASPSP will publish which of the payment products/endpoints will be supported.  The following payment products are supported:   - sepa-credit-transfers   - instant-sepa-credit-transfers   - target-2-payments   - cross-border-credit-transfers   - pain.001-sepa-credit-transfers   - pain.001-instant-sepa-credit-transfers   - pain.001-target-2-payments   - pain.001-cross-border-credit-transfers  **Remark:** For all SEPA Credit Transfer based endpoints which accept XML encoding,  the XML pain.001 schemes provided by EPC are supported by the ASPSP as a minimum for the body content.  Further XML schemes might be supported by some communities.  **Remark:** For cross-border and TARGET-2 payments only community wide pain.001 schemes do exist.  There are plenty of country specificic scheme variants.
$associate_array['payment_id'] = 'payment_id_example'; // string | Resource identification of the generated payment initiation resource.
$associate_array['authorisation_id'] = 'authorisation_id_example'; // string | Resource identification of the related SCA.
$associate_array['x_request_id'] = '99391c7e-ad88-49ec-a2ad-99ddcb1f7721'; // string | ID of the request, unique to the call, as determined by the initiating party.
$associate_array['digest'] = 'SHA-256=hl1/Eps8BEQW58FJhDApwJXjGY4nr1ArGDHIT25vq6A='; // string | Is contained if and only if the \"Signature\" element is contained in the header of the request.
$associate_array['signature'] = 'keyId="SN=9FA1,CA=CN=D-TRUST%20CA%202-1%202015,O=D-Trust%20GmbH,C=DE",algorithm="rsa-sha256", headers="Digest X-Request-ID PSU-ID TPP-Redirect-URI Date", signature="Base64(RSA-SHA256(signing string))"'
; // string | A signature of the request by the TPP on application level. This might be mandated by ASPSP.
$associate_array['tpp_signature_certificate'] = 'tpp_signature_certificate_example'; // string | The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained.
$associate_array['psu_id'] = 'PSU-1234'; // string | Client ID of the PSU in the ASPSP client interface.   Might be mandated in the ASPSP's documentation.  It might be contained even if an OAuth2 based authentication was performed in a pre-step or an OAuth2 based SCA was performed in an preceding AIS service in the same session. In this case the ASPSP might check whether PSU-ID and token match,  according to ASPSP documentation.
$associate_array['psu_id_type'] = 'psu_id_type_example'; // string | Type of the PSU-ID, needed in scenarios where PSUs have several PSU-IDs as access possibility.  In this case, the mean and use are then defined in the ASPSP’s documentation.
$associate_array['psu_corporate_id'] = 'psu_corporate_id_example'; // string | Might be mandated in the ASPSP's documentation. Only used in a corporate context.
$associate_array['psu_corporate_id_type'] = 'psu_corporate_id_type_example'; // string | Might be mandated in the ASPSP's documentation. Only used in a corporate context.
$associate_array['psu_ip_address'] = '192.168.8.78'; // string | The forwarded IP Address header field consists of the corresponding http request IP Address field between PSU and TPP.
$associate_array['psu_ip_port'] = 1234; // string | The forwarded IP Port header field consists of the corresponding HTTP request IP Port field between PSU and TPP, if available.
$associate_array['psu_accept'] = 'psu_accept_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_charset'] = 'psu_accept_charset_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_encoding'] = 'psu_accept_encoding_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_accept_language'] = 'psu_accept_language_example'; // string | The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available.
$associate_array['psu_user_agent'] = 'psu_user_agent_example'; // string | The forwarded Agent header field of the HTTP request between PSU and TPP, if available.
$associate_array['psu_http_method'] = 'psu_http_method_example'; // string | HTTP method used at the PSU ? TPP interface, if available. Valid values are: * GET * POST * PUT * PATCH * DELETE
$associate_array['psu_device_id'] = '99435c7e-ad88-49ec-a2ad-99ddcb1f5555'; // string | UUID (Universally Unique Identifier) for a device, which is used by the PSU, if available. UUID identifies either a device or a device dependant application installation. In case of an installation identification this ID needs to be unaltered until removal from device.
$associate_array['psu_geo_location'] = 'GEO:52.506931;13.144558'; // string | The forwarded Geo Location of the corresponding http request between PSU and TPP if available.
$associate_array['unknown_base_type'] = {}; // \BankIO\Sdk\Model\UNKNOWN_BASE_TYPE | 

try {
    $result = $apiInstance->updatePaymentPsuData($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentInitiationServicePISApi->updatePaymentPsuData: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **organisation** | **string**| This identification is denoting the addressed bankIO organisation. The organisation is the \&quot;name\&quot; attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **payment_service** | **string**| Payment service:  Possible values are: * payments * bulk-payments * periodic-payments |
 **payment_product** | **string**| The addressed payment product endpoint, e.g. for SEPA Credit Transfers (SCT). The ASPSP will publish which of the payment products/endpoints will be supported.  The following payment products are supported:   - sepa-credit-transfers   - instant-sepa-credit-transfers   - target-2-payments   - cross-border-credit-transfers   - pain.001-sepa-credit-transfers   - pain.001-instant-sepa-credit-transfers   - pain.001-target-2-payments   - pain.001-cross-border-credit-transfers  **Remark:** For all SEPA Credit Transfer based endpoints which accept XML encoding,  the XML pain.001 schemes provided by EPC are supported by the ASPSP as a minimum for the body content.  Further XML schemes might be supported by some communities.  **Remark:** For cross-border and TARGET-2 payments only community wide pain.001 schemes do exist.  There are plenty of country specificic scheme variants. |
 **payment_id** | **string**| Resource identification of the generated payment initiation resource. |
 **authorisation_id** | **string**| Resource identification of the related SCA. |
 **x_request_id** | [**string**](../Model/.md)| ID of the request, unique to the call, as determined by the initiating party. |
 **digest** | **string**| Is contained if and only if the \&quot;Signature\&quot; element is contained in the header of the request. | [optional]
 **signature** | **string**| A signature of the request by the TPP on application level. This might be mandated by ASPSP. | [optional]
 **tpp_signature_certificate** | **string**| The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained. | [optional]
 **psu_id** | **string**| Client ID of the PSU in the ASPSP client interface.   Might be mandated in the ASPSP&#39;s documentation.  It might be contained even if an OAuth2 based authentication was performed in a pre-step or an OAuth2 based SCA was performed in an preceding AIS service in the same session. In this case the ASPSP might check whether PSU-ID and token match,  according to ASPSP documentation. | [optional]
 **psu_id_type** | **string**| Type of the PSU-ID, needed in scenarios where PSUs have several PSU-IDs as access possibility.  In this case, the mean and use are then defined in the ASPSP’s documentation. | [optional]
 **psu_corporate_id** | **string**| Might be mandated in the ASPSP&#39;s documentation. Only used in a corporate context. | [optional]
 **psu_corporate_id_type** | **string**| Might be mandated in the ASPSP&#39;s documentation. Only used in a corporate context. | [optional]
 **psu_ip_address** | **string**| The forwarded IP Address header field consists of the corresponding http request IP Address field between PSU and TPP. | [optional]
 **psu_ip_port** | **string**| The forwarded IP Port header field consists of the corresponding HTTP request IP Port field between PSU and TPP, if available. | [optional]
 **psu_accept** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_charset** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_encoding** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_accept_language** | **string**| The forwarded IP Accept header fields consist of the corresponding HTTP request Accept header fields between PSU and TPP, if available. | [optional]
 **psu_user_agent** | **string**| The forwarded Agent header field of the HTTP request between PSU and TPP, if available. | [optional]
 **psu_http_method** | **string**| HTTP method used at the PSU ? TPP interface, if available. Valid values are: * GET * POST * PUT * PATCH * DELETE | [optional]
 **psu_device_id** | [**string**](../Model/.md)| UUID (Universally Unique Identifier) for a device, which is used by the PSU, if available. UUID identifies either a device or a device dependant application installation. In case of an installation identification this ID needs to be unaltered until removal from device. | [optional]
 **psu_geo_location** | **string**| The forwarded Geo Location of the corresponding http request between PSU and TPP if available. | [optional]
 **unknown_base_type** | [**\BankIO\Sdk\Model\UNKNOWN_BASE_TYPE**](../Model/UNKNOWN_BASE_TYPE.md)|  | [optional]

### Return type

[**OneOfUpdatePsuIdenticationResponseUpdatePsuAuthenticationResponseSelectPsuAuthenticationMethodResponseScaStatusResponseAuthorisationConfirmationResponse**](../Model/OneOfUpdatePsuIdenticationResponseUpdatePsuAuthenticationResponseSelectPsuAuthenticationMethodResponseScaStatusResponseAuthorisationConfirmationResponse.md)

### Authorization

[oAuth2AuthCode](../../README.md#oAuth2AuthCode)

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json, application/problem+json, 

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)

