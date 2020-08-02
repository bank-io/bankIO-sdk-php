# BankIO\Sdk\AccountInformationServiceAISApi

All URIs are relative to *https://ob.bankio.ro*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createConsent**](AccountInformationServiceAISApi.md#createConsent) | **POST** /api/org/{organisation}/v1/consents | Create consent
[**deleteConsent**](AccountInformationServiceAISApi.md#deleteConsent) | **DELETE** /api/org/{organisation}/v1/consents/{consentId} | Delete consent
[**getAccountList**](AccountInformationServiceAISApi.md#getAccountList) | **GET** /api/org/{organisation}/v1/accounts | Read account list
[**getBalances**](AccountInformationServiceAISApi.md#getBalances) | **GET** /api/org/{organisation}/v1/accounts/{account-id}/balances | Read balance
[**getCardAccount**](AccountInformationServiceAISApi.md#getCardAccount) | **GET** /api/org/{organisation}/v1/card-accounts | Read a list of card accounts
[**getCardAccountBalances**](AccountInformationServiceAISApi.md#getCardAccountBalances) | **GET** /api/org/{organisation}/v1/card-accounts/{account-id}/balances | Read card account balances
[**getCardAccountTransactionList**](AccountInformationServiceAISApi.md#getCardAccountTransactionList) | **GET** /api/org/{organisation}/v1/card-accounts/{account-id}/transactions | Read transaction list of an account
[**getConsentAuthorisation**](AccountInformationServiceAISApi.md#getConsentAuthorisation) | **GET** /api/org/{organisation}/v1/consents/{consentId}/authorisations | Get consent authorisation sub-resources request
[**getConsentInformation**](AccountInformationServiceAISApi.md#getConsentInformation) | **GET** /api/org/{organisation}/v1/consents/{consentId} | Get consent request
[**getConsentScaStatus**](AccountInformationServiceAISApi.md#getConsentScaStatus) | **GET** /api/org/{organisation}/v1/consents/{consentId}/authorisations/{authorisationId} | Read the SCA status of the consent authorisation
[**getConsentStatus**](AccountInformationServiceAISApi.md#getConsentStatus) | **GET** /api/org/{organisation}/v1/consents/{consentId}/status | Consent status request
[**getTransactionDetails**](AccountInformationServiceAISApi.md#getTransactionDetails) | **GET** /api/org/{organisation}/v1/accounts/{account-id}/transactions/{transactionId} | Read transaction details
[**getTransactionList**](AccountInformationServiceAISApi.md#getTransactionList) | **GET** /api/org/{organisation}/v1/accounts/{account-id}/transactions | Read transaction list of an account
[**readAccountDetails**](AccountInformationServiceAISApi.md#readAccountDetails) | **GET** /api/org/{organisation}/v1/accounts/{account-id} | Read account details
[**readCardAccount**](AccountInformationServiceAISApi.md#readCardAccount) | **GET** /api/org/{organisation}/v1/card-accounts/{account-id} | Read details about a card account
[**startConsentAuthorisation**](AccountInformationServiceAISApi.md#startConsentAuthorisation) | **POST** /api/org/{organisation}/v1/consents/{consentId}/authorisations | Start the authorisation process for a consent
[**updateConsentsPsuData**](AccountInformationServiceAISApi.md#updateConsentsPsuData) | **PUT** /api/org/{organisation}/v1/consents/{consentId}/authorisations/{authorisationId} | Update PSU Data for consents



## createConsent

> \BankIO\Sdk\Model\ConsentsResponse201 createConsent($organisation, $x_request_id, $tpp_psu_id, $psu_ip_address, $digest, $signature, $tpp_signature_certificate, $psu_id, $psu_id_type, $psu_corporate_id, $psu_corporate_id_type, $tpp_redirect_preferred, $tpp_redirect_uri, $tpp_nok_redirect_uri, $tpp_explicit_authorisation_preferred, $tpp_brand_logging_information, $tpp_notification_uri, $tpp_notification_content_preferred, $psu_ip_port, $psu_accept, $psu_accept_charset, $psu_accept_encoding, $psu_accept_language, $psu_user_agent, $psu_http_method, $psu_device_id, $psu_geo_location, $consents)

Create consent

This method create a consent resource, defining access rights to dedicated accounts of  a given PSU-ID. These accounts are addressed explicitly in the method as  parameters as a core function.  **Side Effects** When this consent request is a request where the \"recurringIndicator\" equals \"true\", and if it exists already a former consent for recurring access on account information  for the addressed PSU, then the former consent automatically expires as soon as the new  consent request is authorised by the PSU.  Optional Extension: As an option, an ASPSP might optionally accept a specific access right on the access on all PSD2 related services for all available accounts.  As another option an ASPSP might optionally also accept a command, where only access rights are inserted without mentioning the addressed account.  The relation to accounts is then handled afterwards between PSU and ASPSP.  This option is not supported for the Embedded SCA Approach.  As a last option, an ASPSP might in addition accept a command with access rights   * to see the list of available payment accounts or   * to see the list of available payment accounts with balances.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oAuth2ClientCredentials
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$client = HttpClientDiscovery::find();
$apiInstance = new BankIO\Sdk\Api\AccountInformationServiceAISApi(
    // If you want use custom http client, pass your client which implements `Http\Client\HttpClient`.
    // This is optional, `HTTPlug` will be used as default.
    $client,
    $config
);
$associate_array['organisation'] = 'organisation_example'; // string | This identification is denoting the addressed bankIO organisation. The organisation is the \"name\" attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['x_request_id'] = '99391c7e-ad88-49ec-a2ad-99ddcb1f7721'; // string | ID of the request, unique to the call, as determined by the initiating party.
$associate_array['tpp_psu_id'] = 'PSU-1234'; // string | Client ID of the PSU in the TPP client interface.  It might be contained even if an OAuth2 based authentication was performed in a pre-step or an OAuth2 based SCA was performed in an preceding AIS service in the same session.
$associate_array['psu_ip_address'] = '192.168.8.78'; // string | The forwarded IP Address header field consists of the corresponding http request IP Address field between PSU and TPP. If not available, the TPP shall use the IP Address used by the TPP when submitting this request.
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
$associate_array['consents'] = new \BankIO\Sdk\Model\Consents(); // \BankIO\Sdk\Model\Consents | Request body for a consents request.

try {
    $result = $apiInstance->createConsent($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationServiceAISApi->createConsent: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **organisation** | **string**| This identification is denoting the addressed bankIO organisation. The organisation is the \&quot;name\&quot; attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **x_request_id** | [**string**](../Model/.md)| ID of the request, unique to the call, as determined by the initiating party. |
 **tpp_psu_id** | **string**| Client ID of the PSU in the TPP client interface.  It might be contained even if an OAuth2 based authentication was performed in a pre-step or an OAuth2 based SCA was performed in an preceding AIS service in the same session. |
 **psu_ip_address** | **string**| The forwarded IP Address header field consists of the corresponding http request IP Address field between PSU and TPP. If not available, the TPP shall use the IP Address used by the TPP when submitting this request. |
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
 **consents** | [**\BankIO\Sdk\Model\Consents**](../Model/Consents.md)| Request body for a consents request. | [optional]

### Return type

[**\BankIO\Sdk\Model\ConsentsResponse201**](../Model/ConsentsResponse201.md)

### Authorization

[oAuth2ClientCredentials](../../README.md#oAuth2ClientCredentials)

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json, application/problem+json, 

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## deleteConsent

> deleteConsent($organisation, $consent_id, $x_request_id, $digest, $signature, $tpp_signature_certificate, $psu_ip_address, $psu_ip_port, $psu_accept, $psu_accept_charset, $psu_accept_encoding, $psu_accept_language, $psu_user_agent, $psu_http_method, $psu_device_id, $psu_geo_location)

Delete consent

The TPP can delete an account information consent object if needed.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oAuth2AuthCode
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$client = HttpClientDiscovery::find();
$apiInstance = new BankIO\Sdk\Api\AccountInformationServiceAISApi(
    // If you want use custom http client, pass your client which implements `Http\Client\HttpClient`.
    // This is optional, `HTTPlug` will be used as default.
    $client,
    $config
);
$associate_array['organisation'] = 'organisation_example'; // string | This identification is denoting the addressed bankIO organisation. The organisation is the \"name\" attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['consent_id'] = 'consent_id_example'; // string | ID of the corresponding consent object as returned by an account information consent request.
$associate_array['x_request_id'] = '99391c7e-ad88-49ec-a2ad-99ddcb1f7721'; // string | ID of the request, unique to the call, as determined by the initiating party.
$associate_array['digest'] = 'SHA-256=hl1/Eps8BEQW58FJhDApwJXjGY4nr1ArGDHIT25vq6A='; // string | Is contained if and only if the \"Signature\" element is contained in the header of the request.
$associate_array['signature'] = 'keyId="SN=9FA1,CA=CN=D-TRUST%20CA%202-1%202015,O=D-Trust%20GmbH,C=DE",algorithm="rsa-sha256", headers="Digest X-Request-ID PSU-ID TPP-Redirect-URI Date", signature="Base64(RSA-SHA256(signing string))"'
; // string | A signature of the request by the TPP on application level. This might be mandated by ASPSP.
$associate_array['tpp_signature_certificate'] = 'tpp_signature_certificate_example'; // string | The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained.
$associate_array['psu_ip_address'] = '192.168.8.78'; // string | The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU.
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
    $apiInstance->deleteConsent($associate_array);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationServiceAISApi->deleteConsent: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **organisation** | **string**| This identification is denoting the addressed bankIO organisation. The organisation is the \&quot;name\&quot; attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **consent_id** | **string**| ID of the corresponding consent object as returned by an account information consent request. |
 **x_request_id** | [**string**](../Model/.md)| ID of the request, unique to the call, as determined by the initiating party. |
 **digest** | **string**| Is contained if and only if the \&quot;Signature\&quot; element is contained in the header of the request. | [optional]
 **signature** | **string**| A signature of the request by the TPP on application level. This might be mandated by ASPSP. | [optional]
 **tpp_signature_certificate** | **string**| The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained. | [optional]
 **psu_ip_address** | **string**| The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU. | [optional]
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

void (empty response body)

### Authorization

[oAuth2AuthCode](../../README.md#oAuth2AuthCode)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json, application/problem+json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getAccountList

> \BankIO\Sdk\Model\AccountList getAccountList($organisation, $x_request_id, $consent_id, $with_balance, $digest, $signature, $tpp_signature_certificate, $psu_ip_address, $psu_ip_port, $psu_accept, $psu_accept_charset, $psu_accept_encoding, $psu_accept_language, $psu_user_agent, $psu_http_method, $psu_device_id, $psu_geo_location)

Read account list

Read the identifiers of the available payment account together with  booking balance information, depending on the consent granted.  It is assumed that a consent of the PSU to this access is already given and stored on the ASPSP system.  The addressed list of accounts depends then on the PSU ID and the stored consent addressed by consentId,  respectively the OAuth2 access token.   Returns all identifiers of the accounts, to which an account access has been granted to through  the /consents endpoint by the PSU.  In addition, relevant information about the accounts and hyperlinks to corresponding account  information resources are provided if a related consent has been already granted.  Remark: Note that the /consents endpoint optionally offers to grant an access on all available  payment accounts of a PSU.  In this case, this endpoint will deliver the information about all available payment accounts  of the PSU at this ASPSP.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oAuth2AuthCode
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$client = HttpClientDiscovery::find();
$apiInstance = new BankIO\Sdk\Api\AccountInformationServiceAISApi(
    // If you want use custom http client, pass your client which implements `Http\Client\HttpClient`.
    // This is optional, `HTTPlug` will be used as default.
    $client,
    $config
);
$associate_array['organisation'] = 'organisation_example'; // string | This identification is denoting the addressed bankIO organisation. The organisation is the \"name\" attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['x_request_id'] = '99391c7e-ad88-49ec-a2ad-99ddcb1f7721'; // string | ID of the request, unique to the call, as determined by the initiating party.
$associate_array['consent_id'] = 'consent_id_example'; // string | This then contains the consentId of the related AIS consent, which was performed prior to this payment initiation.
$associate_array['with_balance'] = True; // bool | If contained, this function reads the list of accessible payment accounts including the booking balance,  if granted by the PSU in the related consent and available by the ASPSP.  This parameter might be ignored by the ASPSP.
$associate_array['digest'] = 'SHA-256=hl1/Eps8BEQW58FJhDApwJXjGY4nr1ArGDHIT25vq6A='; // string | Is contained if and only if the \"Signature\" element is contained in the header of the request.
$associate_array['signature'] = 'keyId="SN=9FA1,CA=CN=D-TRUST%20CA%202-1%202015,O=D-Trust%20GmbH,C=DE",algorithm="rsa-sha256", headers="Digest X-Request-ID PSU-ID TPP-Redirect-URI Date", signature="Base64(RSA-SHA256(signing string))"'
; // string | A signature of the request by the TPP on application level. This might be mandated by ASPSP.
$associate_array['tpp_signature_certificate'] = 'tpp_signature_certificate_example'; // string | The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained.
$associate_array['psu_ip_address'] = '192.168.8.78'; // string | The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU.
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
    $result = $apiInstance->getAccountList($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationServiceAISApi->getAccountList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **organisation** | **string**| This identification is denoting the addressed bankIO organisation. The organisation is the \&quot;name\&quot; attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **x_request_id** | [**string**](../Model/.md)| ID of the request, unique to the call, as determined by the initiating party. |
 **consent_id** | **string**| This then contains the consentId of the related AIS consent, which was performed prior to this payment initiation. |
 **with_balance** | **bool**| If contained, this function reads the list of accessible payment accounts including the booking balance,  if granted by the PSU in the related consent and available by the ASPSP.  This parameter might be ignored by the ASPSP. | [optional]
 **digest** | **string**| Is contained if and only if the \&quot;Signature\&quot; element is contained in the header of the request. | [optional]
 **signature** | **string**| A signature of the request by the TPP on application level. This might be mandated by ASPSP. | [optional]
 **tpp_signature_certificate** | **string**| The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained. | [optional]
 **psu_ip_address** | **string**| The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU. | [optional]
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

[**\BankIO\Sdk\Model\AccountList**](../Model/AccountList.md)

### Authorization

[oAuth2AuthCode](../../README.md#oAuth2AuthCode)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json, application/problem+json, 

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getBalances

> \BankIO\Sdk\Model\ReadAccountBalanceResponse200 getBalances($organisation, $account_id, $x_request_id, $consent_id, $digest, $signature, $tpp_signature_certificate, $psu_ip_address, $psu_ip_port, $psu_accept, $psu_accept_charset, $psu_accept_encoding, $psu_accept_language, $psu_user_agent, $psu_http_method, $psu_device_id, $psu_geo_location)

Read balance

Reads account data from a given account addressed by \"account-id\".   **Remark:** This account-id can be a tokenised identification due to data protection reason since the path  information might be logged on intermediary servers within the ASPSP sphere.  This account-id then can be retrieved by the \"Get account list\" call.  The account-id is constant at least throughout the lifecycle of a given consent.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oAuth2AuthCode
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$client = HttpClientDiscovery::find();
$apiInstance = new BankIO\Sdk\Api\AccountInformationServiceAISApi(
    // If you want use custom http client, pass your client which implements `Http\Client\HttpClient`.
    // This is optional, `HTTPlug` will be used as default.
    $client,
    $config
);
$associate_array['organisation'] = 'organisation_example'; // string | This identification is denoting the addressed bankIO organisation. The organisation is the \"name\" attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['account_id'] = 'account_id_example'; // string | This identification is denoting the addressed account.  The account-id is retrieved by using a \"Read account list\" call. The account-id is the \"id\" attribute of the account structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['x_request_id'] = '99391c7e-ad88-49ec-a2ad-99ddcb1f7721'; // string | ID of the request, unique to the call, as determined by the initiating party.
$associate_array['consent_id'] = 'consent_id_example'; // string | This then contains the consentId of the related AIS consent, which was performed prior to this payment initiation.
$associate_array['digest'] = 'SHA-256=hl1/Eps8BEQW58FJhDApwJXjGY4nr1ArGDHIT25vq6A='; // string | Is contained if and only if the \"Signature\" element is contained in the header of the request.
$associate_array['signature'] = 'keyId="SN=9FA1,CA=CN=D-TRUST%20CA%202-1%202015,O=D-Trust%20GmbH,C=DE",algorithm="rsa-sha256", headers="Digest X-Request-ID PSU-ID TPP-Redirect-URI Date", signature="Base64(RSA-SHA256(signing string))"'
; // string | A signature of the request by the TPP on application level. This might be mandated by ASPSP.
$associate_array['tpp_signature_certificate'] = 'tpp_signature_certificate_example'; // string | The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained.
$associate_array['psu_ip_address'] = '192.168.8.78'; // string | The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU.
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
    $result = $apiInstance->getBalances($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationServiceAISApi->getBalances: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **organisation** | **string**| This identification is denoting the addressed bankIO organisation. The organisation is the \&quot;name\&quot; attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **account_id** | **string**| This identification is denoting the addressed account.  The account-id is retrieved by using a \&quot;Read account list\&quot; call. The account-id is the \&quot;id\&quot; attribute of the account structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **x_request_id** | [**string**](../Model/.md)| ID of the request, unique to the call, as determined by the initiating party. |
 **consent_id** | **string**| This then contains the consentId of the related AIS consent, which was performed prior to this payment initiation. |
 **digest** | **string**| Is contained if and only if the \&quot;Signature\&quot; element is contained in the header of the request. | [optional]
 **signature** | **string**| A signature of the request by the TPP on application level. This might be mandated by ASPSP. | [optional]
 **tpp_signature_certificate** | **string**| The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained. | [optional]
 **psu_ip_address** | **string**| The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU. | [optional]
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

[**\BankIO\Sdk\Model\ReadAccountBalanceResponse200**](../Model/ReadAccountBalanceResponse200.md)

### Authorization

[oAuth2AuthCode](../../README.md#oAuth2AuthCode)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json, application/problem+json, 

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getCardAccount

> \BankIO\Sdk\Model\CardAccountList getCardAccount($organisation, $x_request_id, $consent_id, $digest, $signature, $tpp_signature_certificate, $psu_ip_address, $psu_ip_port, $psu_accept, $psu_accept_charset, $psu_accept_encoding, $psu_accept_language, $psu_user_agent, $psu_http_method, $psu_device_id, $psu_geo_location)

Read a list of card accounts

Reads a list of card accounts with additional information, e.g. balance information.  It is assumed that a consent of the PSU to this access is already given and stored on the ASPSP system.  The addressed list of card accounts depends then on the PSU ID and the stored consent addressed by consentId,  respectively the OAuth2 access token.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oAuth2AuthCode
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$client = HttpClientDiscovery::find();
$apiInstance = new BankIO\Sdk\Api\AccountInformationServiceAISApi(
    // If you want use custom http client, pass your client which implements `Http\Client\HttpClient`.
    // This is optional, `HTTPlug` will be used as default.
    $client,
    $config
);
$associate_array['organisation'] = 'organisation_example'; // string | This identification is denoting the addressed bankIO organisation. The organisation is the \"name\" attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['x_request_id'] = '99391c7e-ad88-49ec-a2ad-99ddcb1f7721'; // string | ID of the request, unique to the call, as determined by the initiating party.
$associate_array['consent_id'] = 'consent_id_example'; // string | This then contains the consentId of the related AIS consent, which was performed prior to this payment initiation.
$associate_array['digest'] = 'SHA-256=hl1/Eps8BEQW58FJhDApwJXjGY4nr1ArGDHIT25vq6A='; // string | Is contained if and only if the \"Signature\" element is contained in the header of the request.
$associate_array['signature'] = 'keyId="SN=9FA1,CA=CN=D-TRUST%20CA%202-1%202015,O=D-Trust%20GmbH,C=DE",algorithm="rsa-sha256", headers="Digest X-Request-ID PSU-ID TPP-Redirect-URI Date", signature="Base64(RSA-SHA256(signing string))"'
; // string | A signature of the request by the TPP on application level. This might be mandated by ASPSP.
$associate_array['tpp_signature_certificate'] = 'tpp_signature_certificate_example'; // string | The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained.
$associate_array['psu_ip_address'] = '192.168.8.78'; // string | The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU.
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
    $result = $apiInstance->getCardAccount($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationServiceAISApi->getCardAccount: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **organisation** | **string**| This identification is denoting the addressed bankIO organisation. The organisation is the \&quot;name\&quot; attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **x_request_id** | [**string**](../Model/.md)| ID of the request, unique to the call, as determined by the initiating party. |
 **consent_id** | **string**| This then contains the consentId of the related AIS consent, which was performed prior to this payment initiation. |
 **digest** | **string**| Is contained if and only if the \&quot;Signature\&quot; element is contained in the header of the request. | [optional]
 **signature** | **string**| A signature of the request by the TPP on application level. This might be mandated by ASPSP. | [optional]
 **tpp_signature_certificate** | **string**| The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained. | [optional]
 **psu_ip_address** | **string**| The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU. | [optional]
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

[**\BankIO\Sdk\Model\CardAccountList**](../Model/CardAccountList.md)

### Authorization

[oAuth2AuthCode](../../README.md#oAuth2AuthCode)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json, application/problem+json, 

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getCardAccountBalances

> \BankIO\Sdk\Model\ReadCardAccountBalanceResponse200 getCardAccountBalances($organisation, $account_id, $x_request_id, $consent_id, $digest, $signature, $tpp_signature_certificate, $psu_ip_address, $psu_ip_port, $psu_accept, $psu_accept_charset, $psu_accept_encoding, $psu_accept_language, $psu_user_agent, $psu_http_method, $psu_device_id, $psu_geo_location)

Read card account balances

Reads balance data from a given card account addressed by  \"account-id\".   Remark: This account-id can be a tokenised identification due  to data protection reason since the path information might be  logged on intermediary servers within the ASPSP sphere.  This account-id then can be retrieved by the  \"Get card account list\" call.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oAuth2AuthCode
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$client = HttpClientDiscovery::find();
$apiInstance = new BankIO\Sdk\Api\AccountInformationServiceAISApi(
    // If you want use custom http client, pass your client which implements `Http\Client\HttpClient`.
    // This is optional, `HTTPlug` will be used as default.
    $client,
    $config
);
$associate_array['organisation'] = 'organisation_example'; // string | This identification is denoting the addressed bankIO organisation. The organisation is the \"name\" attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['account_id'] = 'account_id_example'; // string | This identification is denoting the addressed account.  The account-id is retrieved by using a \"Read account list\" call. The account-id is the \"id\" attribute of the account structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['x_request_id'] = '99391c7e-ad88-49ec-a2ad-99ddcb1f7721'; // string | ID of the request, unique to the call, as determined by the initiating party.
$associate_array['consent_id'] = 'consent_id_example'; // string | This then contains the consentId of the related AIS consent, which was performed prior to this payment initiation.
$associate_array['digest'] = 'SHA-256=hl1/Eps8BEQW58FJhDApwJXjGY4nr1ArGDHIT25vq6A='; // string | Is contained if and only if the \"Signature\" element is contained in the header of the request.
$associate_array['signature'] = 'keyId="SN=9FA1,CA=CN=D-TRUST%20CA%202-1%202015,O=D-Trust%20GmbH,C=DE",algorithm="rsa-sha256", headers="Digest X-Request-ID PSU-ID TPP-Redirect-URI Date", signature="Base64(RSA-SHA256(signing string))"'
; // string | A signature of the request by the TPP on application level. This might be mandated by ASPSP.
$associate_array['tpp_signature_certificate'] = 'tpp_signature_certificate_example'; // string | The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained.
$associate_array['psu_ip_address'] = '192.168.8.78'; // string | The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU.
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
    $result = $apiInstance->getCardAccountBalances($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationServiceAISApi->getCardAccountBalances: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **organisation** | **string**| This identification is denoting the addressed bankIO organisation. The organisation is the \&quot;name\&quot; attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **account_id** | **string**| This identification is denoting the addressed account.  The account-id is retrieved by using a \&quot;Read account list\&quot; call. The account-id is the \&quot;id\&quot; attribute of the account structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **x_request_id** | [**string**](../Model/.md)| ID of the request, unique to the call, as determined by the initiating party. |
 **consent_id** | **string**| This then contains the consentId of the related AIS consent, which was performed prior to this payment initiation. |
 **digest** | **string**| Is contained if and only if the \&quot;Signature\&quot; element is contained in the header of the request. | [optional]
 **signature** | **string**| A signature of the request by the TPP on application level. This might be mandated by ASPSP. | [optional]
 **tpp_signature_certificate** | **string**| The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained. | [optional]
 **psu_ip_address** | **string**| The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU. | [optional]
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

[**\BankIO\Sdk\Model\ReadCardAccountBalanceResponse200**](../Model/ReadCardAccountBalanceResponse200.md)

### Authorization

[oAuth2AuthCode](../../README.md#oAuth2AuthCode)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json, application/problem+json, 

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getCardAccountTransactionList

> \BankIO\Sdk\Model\CardAccountsTransactionsResponse200 getCardAccountTransactionList($organisation, $account_id, $booking_status, $x_request_id, $consent_id, $date_from, $date_to, $entry_reference_from, $delta_list, $with_balance, $digest, $signature, $tpp_signature_certificate, $psu_ip_address, $psu_ip_port, $psu_accept, $psu_accept_charset, $psu_accept_encoding, $psu_accept_language, $psu_user_agent, $psu_http_method, $psu_device_id, $psu_geo_location)

Read transaction list of an account

Reads account data from a given card account addressed by \"account-id\".

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oAuth2AuthCode
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$client = HttpClientDiscovery::find();
$apiInstance = new BankIO\Sdk\Api\AccountInformationServiceAISApi(
    // If you want use custom http client, pass your client which implements `Http\Client\HttpClient`.
    // This is optional, `HTTPlug` will be used as default.
    $client,
    $config
);
$associate_array['organisation'] = 'organisation_example'; // string | This identification is denoting the addressed bankIO organisation. The organisation is the \"name\" attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['account_id'] = 'account_id_example'; // string | This identification is denoting the addressed account.  The account-id is retrieved by using a \"Read account list\" call. The account-id is the \"id\" attribute of the account structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['booking_status'] = 'booking_status_example'; // string | Permitted codes are    * \"information\",   * \"booked\",   * \"pending\", and    * \"both\" \"booked\" shall be supported by the ASPSP. To support the \"pending\" and \"both\" feature is optional for the ASPSP,  Error code if not supported in the online banking frontend
$associate_array['x_request_id'] = '99391c7e-ad88-49ec-a2ad-99ddcb1f7721'; // string | ID of the request, unique to the call, as determined by the initiating party.
$associate_array['consent_id'] = 'consent_id_example'; // string | This then contains the consentId of the related AIS consent, which was performed prior to this payment initiation.
$associate_array['date_from'] = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | Conditional: Starting date (inclusive the date dateFrom) of the transaction list, mandated if no delta access is required and if bookingStatus does not equal \"information.  For booked transactions, the relevant date is the booking date.   For pending transactions, the relevant date is the entry date, which may not be transparent  neither in this API nor other channels of the ASPSP.
$associate_array['date_to'] = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | End date (inclusive the data dateTo) of the transaction list, default is \"now\" if not given.   Might be ignored if a delta function is used.  For booked transactions, the relevant date is the booking date.   For pending transactions, the relevant date is the entry date, which may not be transparent  neither in this API nor other channels of the ASPSP.
$associate_array['entry_reference_from'] = 'entry_reference_from_example'; // string | This data attribute is indicating that the AISP is in favour to get all transactions after  the transaction with identification entryReferenceFrom alternatively to the above defined period.  This is a implementation of a delta access.  If this data element is contained, the entries \"dateFrom\" and \"dateTo\" might be ignored by the ASPSP  if a delta report is supported.  Optional if supported by API provider.
$associate_array['delta_list'] = True; // bool | This data attribute is indicating that the AISP is in favour to get all transactions after the last report access for this PSU on the addressed account. This is another implementation of a delta access-report. This delta indicator might be rejected by the ASPSP if this function is not supported. Optional if supported by API provider
$associate_array['with_balance'] = True; // bool | If contained, this function reads the list of accessible payment accounts including the booking balance,  if granted by the PSU in the related consent and available by the ASPSP.  This parameter might be ignored by the ASPSP.
$associate_array['digest'] = 'SHA-256=hl1/Eps8BEQW58FJhDApwJXjGY4nr1ArGDHIT25vq6A='; // string | Is contained if and only if the \"Signature\" element is contained in the header of the request.
$associate_array['signature'] = 'keyId="SN=9FA1,CA=CN=D-TRUST%20CA%202-1%202015,O=D-Trust%20GmbH,C=DE",algorithm="rsa-sha256", headers="Digest X-Request-ID PSU-ID TPP-Redirect-URI Date", signature="Base64(RSA-SHA256(signing string))"'
; // string | A signature of the request by the TPP on application level. This might be mandated by ASPSP.
$associate_array['tpp_signature_certificate'] = 'tpp_signature_certificate_example'; // string | The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained.
$associate_array['psu_ip_address'] = '192.168.8.78'; // string | The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU.
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
    $result = $apiInstance->getCardAccountTransactionList($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationServiceAISApi->getCardAccountTransactionList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **organisation** | **string**| This identification is denoting the addressed bankIO organisation. The organisation is the \&quot;name\&quot; attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **account_id** | **string**| This identification is denoting the addressed account.  The account-id is retrieved by using a \&quot;Read account list\&quot; call. The account-id is the \&quot;id\&quot; attribute of the account structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **booking_status** | **string**| Permitted codes are    * \&quot;information\&quot;,   * \&quot;booked\&quot;,   * \&quot;pending\&quot;, and    * \&quot;both\&quot; \&quot;booked\&quot; shall be supported by the ASPSP. To support the \&quot;pending\&quot; and \&quot;both\&quot; feature is optional for the ASPSP,  Error code if not supported in the online banking frontend |
 **x_request_id** | [**string**](../Model/.md)| ID of the request, unique to the call, as determined by the initiating party. |
 **consent_id** | **string**| This then contains the consentId of the related AIS consent, which was performed prior to this payment initiation. |
 **date_from** | **\DateTime**| Conditional: Starting date (inclusive the date dateFrom) of the transaction list, mandated if no delta access is required and if bookingStatus does not equal \&quot;information.  For booked transactions, the relevant date is the booking date.   For pending transactions, the relevant date is the entry date, which may not be transparent  neither in this API nor other channels of the ASPSP. | [optional]
 **date_to** | **\DateTime**| End date (inclusive the data dateTo) of the transaction list, default is \&quot;now\&quot; if not given.   Might be ignored if a delta function is used.  For booked transactions, the relevant date is the booking date.   For pending transactions, the relevant date is the entry date, which may not be transparent  neither in this API nor other channels of the ASPSP. | [optional]
 **entry_reference_from** | **string**| This data attribute is indicating that the AISP is in favour to get all transactions after  the transaction with identification entryReferenceFrom alternatively to the above defined period.  This is a implementation of a delta access.  If this data element is contained, the entries \&quot;dateFrom\&quot; and \&quot;dateTo\&quot; might be ignored by the ASPSP  if a delta report is supported.  Optional if supported by API provider. | [optional]
 **delta_list** | **bool**| This data attribute is indicating that the AISP is in favour to get all transactions after the last report access for this PSU on the addressed account. This is another implementation of a delta access-report. This delta indicator might be rejected by the ASPSP if this function is not supported. Optional if supported by API provider | [optional]
 **with_balance** | **bool**| If contained, this function reads the list of accessible payment accounts including the booking balance,  if granted by the PSU in the related consent and available by the ASPSP.  This parameter might be ignored by the ASPSP. | [optional]
 **digest** | **string**| Is contained if and only if the \&quot;Signature\&quot; element is contained in the header of the request. | [optional]
 **signature** | **string**| A signature of the request by the TPP on application level. This might be mandated by ASPSP. | [optional]
 **tpp_signature_certificate** | **string**| The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained. | [optional]
 **psu_ip_address** | **string**| The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU. | [optional]
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

[**\BankIO\Sdk\Model\CardAccountsTransactionsResponse200**](../Model/CardAccountsTransactionsResponse200.md)

### Authorization

[oAuth2AuthCode](../../README.md#oAuth2AuthCode)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json, application/problem+json, 

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getConsentAuthorisation

> \BankIO\Sdk\Model\Authorisations getConsentAuthorisation($organisation, $consent_id, $x_request_id, $digest, $signature, $tpp_signature_certificate, $psu_ip_address, $psu_ip_port, $psu_accept, $psu_accept_charset, $psu_accept_encoding, $psu_accept_language, $psu_user_agent, $psu_http_method, $psu_device_id, $psu_geo_location)

Get consent authorisation sub-resources request

Return a list of all authorisation subresources IDs which have been created.  This function returns an array of hyperlinks to all generated authorisation sub-resources.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oAuth2AuthCode
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$client = HttpClientDiscovery::find();
$apiInstance = new BankIO\Sdk\Api\AccountInformationServiceAISApi(
    // If you want use custom http client, pass your client which implements `Http\Client\HttpClient`.
    // This is optional, `HTTPlug` will be used as default.
    $client,
    $config
);
$associate_array['organisation'] = 'organisation_example'; // string | This identification is denoting the addressed bankIO organisation. The organisation is the \"name\" attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['consent_id'] = 'consent_id_example'; // string | ID of the corresponding consent object as returned by an account information consent request.
$associate_array['x_request_id'] = '99391c7e-ad88-49ec-a2ad-99ddcb1f7721'; // string | ID of the request, unique to the call, as determined by the initiating party.
$associate_array['digest'] = 'SHA-256=hl1/Eps8BEQW58FJhDApwJXjGY4nr1ArGDHIT25vq6A='; // string | Is contained if and only if the \"Signature\" element is contained in the header of the request.
$associate_array['signature'] = 'keyId="SN=9FA1,CA=CN=D-TRUST%20CA%202-1%202015,O=D-Trust%20GmbH,C=DE",algorithm="rsa-sha256", headers="Digest X-Request-ID PSU-ID TPP-Redirect-URI Date", signature="Base64(RSA-SHA256(signing string))"'
; // string | A signature of the request by the TPP on application level. This might be mandated by ASPSP.
$associate_array['tpp_signature_certificate'] = 'tpp_signature_certificate_example'; // string | The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained.
$associate_array['psu_ip_address'] = '192.168.8.78'; // string | The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU.
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
    $result = $apiInstance->getConsentAuthorisation($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationServiceAISApi->getConsentAuthorisation: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **organisation** | **string**| This identification is denoting the addressed bankIO organisation. The organisation is the \&quot;name\&quot; attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **consent_id** | **string**| ID of the corresponding consent object as returned by an account information consent request. |
 **x_request_id** | [**string**](../Model/.md)| ID of the request, unique to the call, as determined by the initiating party. |
 **digest** | **string**| Is contained if and only if the \&quot;Signature\&quot; element is contained in the header of the request. | [optional]
 **signature** | **string**| A signature of the request by the TPP on application level. This might be mandated by ASPSP. | [optional]
 **tpp_signature_certificate** | **string**| The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained. | [optional]
 **psu_ip_address** | **string**| The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU. | [optional]
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


## getConsentInformation

> \BankIO\Sdk\Model\ConsentInformationResponse200Json getConsentInformation($organisation, $consent_id, $x_request_id, $digest, $signature, $tpp_signature_certificate, $psu_ip_address, $psu_ip_port, $psu_accept, $psu_accept_charset, $psu_accept_encoding, $psu_accept_language, $psu_user_agent, $psu_http_method, $psu_device_id, $psu_geo_location)

Get consent request

Returns the content of an account information consent object.  This is returning the data for the TPP especially in cases,  where the consent was directly managed between ASPSP and PSU e.g. in a redirect SCA Approach.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oAuth2AuthCode
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$client = HttpClientDiscovery::find();
$apiInstance = new BankIO\Sdk\Api\AccountInformationServiceAISApi(
    // If you want use custom http client, pass your client which implements `Http\Client\HttpClient`.
    // This is optional, `HTTPlug` will be used as default.
    $client,
    $config
);
$associate_array['organisation'] = 'organisation_example'; // string | This identification is denoting the addressed bankIO organisation. The organisation is the \"name\" attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['consent_id'] = 'consent_id_example'; // string | ID of the corresponding consent object as returned by an account information consent request.
$associate_array['x_request_id'] = '99391c7e-ad88-49ec-a2ad-99ddcb1f7721'; // string | ID of the request, unique to the call, as determined by the initiating party.
$associate_array['digest'] = 'SHA-256=hl1/Eps8BEQW58FJhDApwJXjGY4nr1ArGDHIT25vq6A='; // string | Is contained if and only if the \"Signature\" element is contained in the header of the request.
$associate_array['signature'] = 'keyId="SN=9FA1,CA=CN=D-TRUST%20CA%202-1%202015,O=D-Trust%20GmbH,C=DE",algorithm="rsa-sha256", headers="Digest X-Request-ID PSU-ID TPP-Redirect-URI Date", signature="Base64(RSA-SHA256(signing string))"'
; // string | A signature of the request by the TPP on application level. This might be mandated by ASPSP.
$associate_array['tpp_signature_certificate'] = 'tpp_signature_certificate_example'; // string | The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained.
$associate_array['psu_ip_address'] = '192.168.8.78'; // string | The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU.
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
    $result = $apiInstance->getConsentInformation($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationServiceAISApi->getConsentInformation: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **organisation** | **string**| This identification is denoting the addressed bankIO organisation. The organisation is the \&quot;name\&quot; attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **consent_id** | **string**| ID of the corresponding consent object as returned by an account information consent request. |
 **x_request_id** | [**string**](../Model/.md)| ID of the request, unique to the call, as determined by the initiating party. |
 **digest** | **string**| Is contained if and only if the \&quot;Signature\&quot; element is contained in the header of the request. | [optional]
 **signature** | **string**| A signature of the request by the TPP on application level. This might be mandated by ASPSP. | [optional]
 **tpp_signature_certificate** | **string**| The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained. | [optional]
 **psu_ip_address** | **string**| The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU. | [optional]
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

[**\BankIO\Sdk\Model\ConsentInformationResponse200Json**](../Model/ConsentInformationResponse200Json.md)

### Authorization

[oAuth2AuthCode](../../README.md#oAuth2AuthCode)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json, application/problem+json, 

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getConsentScaStatus

> \BankIO\Sdk\Model\ScaStatusResponse getConsentScaStatus($organisation, $consent_id, $authorisation_id, $x_request_id, $digest, $signature, $tpp_signature_certificate, $psu_ip_address, $psu_ip_port, $psu_accept, $psu_accept_charset, $psu_accept_encoding, $psu_accept_language, $psu_user_agent, $psu_http_method, $psu_device_id, $psu_geo_location)

Read the SCA status of the consent authorisation

This method returns the SCA status of a consent initiation's authorisation sub-resource.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oAuth2AuthCode
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$client = HttpClientDiscovery::find();
$apiInstance = new BankIO\Sdk\Api\AccountInformationServiceAISApi(
    // If you want use custom http client, pass your client which implements `Http\Client\HttpClient`.
    // This is optional, `HTTPlug` will be used as default.
    $client,
    $config
);
$associate_array['organisation'] = 'organisation_example'; // string | This identification is denoting the addressed bankIO organisation. The organisation is the \"name\" attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['consent_id'] = 'consent_id_example'; // string | ID of the corresponding consent object as returned by an account information consent request.
$associate_array['authorisation_id'] = 'authorisation_id_example'; // string | Resource identification of the related SCA.
$associate_array['x_request_id'] = '99391c7e-ad88-49ec-a2ad-99ddcb1f7721'; // string | ID of the request, unique to the call, as determined by the initiating party.
$associate_array['digest'] = 'SHA-256=hl1/Eps8BEQW58FJhDApwJXjGY4nr1ArGDHIT25vq6A='; // string | Is contained if and only if the \"Signature\" element is contained in the header of the request.
$associate_array['signature'] = 'keyId="SN=9FA1,CA=CN=D-TRUST%20CA%202-1%202015,O=D-Trust%20GmbH,C=DE",algorithm="rsa-sha256", headers="Digest X-Request-ID PSU-ID TPP-Redirect-URI Date", signature="Base64(RSA-SHA256(signing string))"'
; // string | A signature of the request by the TPP on application level. This might be mandated by ASPSP.
$associate_array['tpp_signature_certificate'] = 'tpp_signature_certificate_example'; // string | The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained.
$associate_array['psu_ip_address'] = '192.168.8.78'; // string | The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU.
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
    $result = $apiInstance->getConsentScaStatus($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationServiceAISApi->getConsentScaStatus: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **organisation** | **string**| This identification is denoting the addressed bankIO organisation. The organisation is the \&quot;name\&quot; attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **consent_id** | **string**| ID of the corresponding consent object as returned by an account information consent request. |
 **authorisation_id** | **string**| Resource identification of the related SCA. |
 **x_request_id** | [**string**](../Model/.md)| ID of the request, unique to the call, as determined by the initiating party. |
 **digest** | **string**| Is contained if and only if the \&quot;Signature\&quot; element is contained in the header of the request. | [optional]
 **signature** | **string**| A signature of the request by the TPP on application level. This might be mandated by ASPSP. | [optional]
 **tpp_signature_certificate** | **string**| The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained. | [optional]
 **psu_ip_address** | **string**| The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU. | [optional]
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


## getConsentStatus

> \BankIO\Sdk\Model\ConsentStatusResponse200 getConsentStatus($organisation, $consent_id, $x_request_id, $digest, $signature, $tpp_signature_certificate, $psu_ip_address, $psu_ip_port, $psu_accept, $psu_accept_charset, $psu_accept_encoding, $psu_accept_language, $psu_user_agent, $psu_http_method, $psu_device_id, $psu_geo_location)

Consent status request

Read the status of an account information consent resource.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oAuth2AuthCode
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$client = HttpClientDiscovery::find();
$apiInstance = new BankIO\Sdk\Api\AccountInformationServiceAISApi(
    // If you want use custom http client, pass your client which implements `Http\Client\HttpClient`.
    // This is optional, `HTTPlug` will be used as default.
    $client,
    $config
);
$associate_array['organisation'] = 'organisation_example'; // string | This identification is denoting the addressed bankIO organisation. The organisation is the \"name\" attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['consent_id'] = 'consent_id_example'; // string | ID of the corresponding consent object as returned by an account information consent request.
$associate_array['x_request_id'] = '99391c7e-ad88-49ec-a2ad-99ddcb1f7721'; // string | ID of the request, unique to the call, as determined by the initiating party.
$associate_array['digest'] = 'SHA-256=hl1/Eps8BEQW58FJhDApwJXjGY4nr1ArGDHIT25vq6A='; // string | Is contained if and only if the \"Signature\" element is contained in the header of the request.
$associate_array['signature'] = 'keyId="SN=9FA1,CA=CN=D-TRUST%20CA%202-1%202015,O=D-Trust%20GmbH,C=DE",algorithm="rsa-sha256", headers="Digest X-Request-ID PSU-ID TPP-Redirect-URI Date", signature="Base64(RSA-SHA256(signing string))"'
; // string | A signature of the request by the TPP on application level. This might be mandated by ASPSP.
$associate_array['tpp_signature_certificate'] = 'tpp_signature_certificate_example'; // string | The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained.
$associate_array['psu_ip_address'] = '192.168.8.78'; // string | The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU.
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
    $result = $apiInstance->getConsentStatus($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationServiceAISApi->getConsentStatus: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **organisation** | **string**| This identification is denoting the addressed bankIO organisation. The organisation is the \&quot;name\&quot; attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **consent_id** | **string**| ID of the corresponding consent object as returned by an account information consent request. |
 **x_request_id** | [**string**](../Model/.md)| ID of the request, unique to the call, as determined by the initiating party. |
 **digest** | **string**| Is contained if and only if the \&quot;Signature\&quot; element is contained in the header of the request. | [optional]
 **signature** | **string**| A signature of the request by the TPP on application level. This might be mandated by ASPSP. | [optional]
 **tpp_signature_certificate** | **string**| The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained. | [optional]
 **psu_ip_address** | **string**| The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU. | [optional]
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

[**\BankIO\Sdk\Model\ConsentStatusResponse200**](../Model/ConsentStatusResponse200.md)

### Authorization

[oAuth2AuthCode](../../README.md#oAuth2AuthCode)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json, application/problem+json, 

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getTransactionDetails

> \BankIO\Sdk\Model\InlineResponse2001 getTransactionDetails($organisation, $account_id, $transaction_id, $x_request_id, $consent_id, $digest, $signature, $tpp_signature_certificate, $psu_ip_address, $psu_ip_port, $psu_accept, $psu_accept_charset, $psu_accept_encoding, $psu_accept_language, $psu_user_agent, $psu_http_method, $psu_device_id, $psu_geo_location)

Read transaction details

Reads transaction details from a given transaction addressed by \"transactionId\" on a given account addressed by \"account-id\".  This call is only available on transactions as reported in a JSON format.  **Remark:** Please note that the PATH might be already given in detail by the corresponding entry of the response of the  \"Read Transaction List\" call within the _links subfield.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oAuth2AuthCode
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$client = HttpClientDiscovery::find();
$apiInstance = new BankIO\Sdk\Api\AccountInformationServiceAISApi(
    // If you want use custom http client, pass your client which implements `Http\Client\HttpClient`.
    // This is optional, `HTTPlug` will be used as default.
    $client,
    $config
);
$associate_array['organisation'] = 'organisation_example'; // string | This identification is denoting the addressed bankIO organisation. The organisation is the \"name\" attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['account_id'] = 'account_id_example'; // string | This identification is denoting the addressed account.  The account-id is retrieved by using a \"Read account list\" call. The account-id is the \"id\" attribute of the account structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['transaction_id'] = 'transaction_id_example'; // string | This identification is given by the attribute transactionId of the corresponding entry of a transaction list.
$associate_array['x_request_id'] = '99391c7e-ad88-49ec-a2ad-99ddcb1f7721'; // string | ID of the request, unique to the call, as determined by the initiating party.
$associate_array['consent_id'] = 'consent_id_example'; // string | This then contains the consentId of the related AIS consent, which was performed prior to this payment initiation.
$associate_array['digest'] = 'SHA-256=hl1/Eps8BEQW58FJhDApwJXjGY4nr1ArGDHIT25vq6A='; // string | Is contained if and only if the \"Signature\" element is contained in the header of the request.
$associate_array['signature'] = 'keyId="SN=9FA1,CA=CN=D-TRUST%20CA%202-1%202015,O=D-Trust%20GmbH,C=DE",algorithm="rsa-sha256", headers="Digest X-Request-ID PSU-ID TPP-Redirect-URI Date", signature="Base64(RSA-SHA256(signing string))"'
; // string | A signature of the request by the TPP on application level. This might be mandated by ASPSP.
$associate_array['tpp_signature_certificate'] = 'tpp_signature_certificate_example'; // string | The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained.
$associate_array['psu_ip_address'] = '192.168.8.78'; // string | The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU.
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
    $result = $apiInstance->getTransactionDetails($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationServiceAISApi->getTransactionDetails: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **organisation** | **string**| This identification is denoting the addressed bankIO organisation. The organisation is the \&quot;name\&quot; attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **account_id** | **string**| This identification is denoting the addressed account.  The account-id is retrieved by using a \&quot;Read account list\&quot; call. The account-id is the \&quot;id\&quot; attribute of the account structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **transaction_id** | **string**| This identification is given by the attribute transactionId of the corresponding entry of a transaction list. |
 **x_request_id** | [**string**](../Model/.md)| ID of the request, unique to the call, as determined by the initiating party. |
 **consent_id** | **string**| This then contains the consentId of the related AIS consent, which was performed prior to this payment initiation. |
 **digest** | **string**| Is contained if and only if the \&quot;Signature\&quot; element is contained in the header of the request. | [optional]
 **signature** | **string**| A signature of the request by the TPP on application level. This might be mandated by ASPSP. | [optional]
 **tpp_signature_certificate** | **string**| The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained. | [optional]
 **psu_ip_address** | **string**| The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU. | [optional]
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

[**\BankIO\Sdk\Model\InlineResponse2001**](../Model/InlineResponse2001.md)

### Authorization

[oAuth2AuthCode](../../README.md#oAuth2AuthCode)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json, application/problem+json, 

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getTransactionList

> \BankIO\Sdk\Model\TransactionsResponse200Json getTransactionList($organisation, $account_id, $booking_status, $x_request_id, $consent_id, $date_from, $date_to, $entry_reference_from, $delta_list, $with_balance, $digest, $signature, $tpp_signature_certificate, $psu_ip_address, $psu_ip_port, $psu_accept, $psu_accept_charset, $psu_accept_encoding, $psu_accept_language, $psu_user_agent, $psu_http_method, $psu_device_id, $psu_geo_location)

Read transaction list of an account

Read transaction reports or transaction lists of a given account ddressed by \"account-id\", depending on the steering parameter  \"bookingStatus\" together with balances.  For a given account, additional parameters are e.g. the attributes \"dateFrom\" and \"dateTo\".  The ASPSP might add balance information, if transaction lists without balances are not supported.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oAuth2AuthCode
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$client = HttpClientDiscovery::find();
$apiInstance = new BankIO\Sdk\Api\AccountInformationServiceAISApi(
    // If you want use custom http client, pass your client which implements `Http\Client\HttpClient`.
    // This is optional, `HTTPlug` will be used as default.
    $client,
    $config
);
$associate_array['organisation'] = 'organisation_example'; // string | This identification is denoting the addressed bankIO organisation. The organisation is the \"name\" attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['account_id'] = 'account_id_example'; // string | This identification is denoting the addressed account.  The account-id is retrieved by using a \"Read account list\" call. The account-id is the \"id\" attribute of the account structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['booking_status'] = 'booking_status_example'; // string | Permitted codes are    * \"information\",   * \"booked\",   * \"pending\", and    * \"both\" \"booked\" shall be supported by the ASPSP. To support the \"pending\" and \"both\" feature is optional for the ASPSP,  Error code if not supported in the online banking frontend
$associate_array['x_request_id'] = '99391c7e-ad88-49ec-a2ad-99ddcb1f7721'; // string | ID of the request, unique to the call, as determined by the initiating party.
$associate_array['consent_id'] = 'consent_id_example'; // string | This then contains the consentId of the related AIS consent, which was performed prior to this payment initiation.
$associate_array['date_from'] = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | Conditional: Starting date (inclusive the date dateFrom) of the transaction list, mandated if no delta access is required and if bookingStatus does not equal \"information.  For booked transactions, the relevant date is the booking date.   For pending transactions, the relevant date is the entry date, which may not be transparent  neither in this API nor other channels of the ASPSP.
$associate_array['date_to'] = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | End date (inclusive the data dateTo) of the transaction list, default is \"now\" if not given.   Might be ignored if a delta function is used.  For booked transactions, the relevant date is the booking date.   For pending transactions, the relevant date is the entry date, which may not be transparent  neither in this API nor other channels of the ASPSP.
$associate_array['entry_reference_from'] = 'entry_reference_from_example'; // string | This data attribute is indicating that the AISP is in favour to get all transactions after  the transaction with identification entryReferenceFrom alternatively to the above defined period.  This is a implementation of a delta access.  If this data element is contained, the entries \"dateFrom\" and \"dateTo\" might be ignored by the ASPSP  if a delta report is supported.  Optional if supported by API provider.
$associate_array['delta_list'] = True; // bool | This data attribute is indicating that the AISP is in favour to get all transactions after the last report access for this PSU on the addressed account. This is another implementation of a delta access-report. This delta indicator might be rejected by the ASPSP if this function is not supported. Optional if supported by API provider
$associate_array['with_balance'] = True; // bool | If contained, this function reads the list of accessible payment accounts including the booking balance,  if granted by the PSU in the related consent and available by the ASPSP.  This parameter might be ignored by the ASPSP.
$associate_array['digest'] = 'SHA-256=hl1/Eps8BEQW58FJhDApwJXjGY4nr1ArGDHIT25vq6A='; // string | Is contained if and only if the \"Signature\" element is contained in the header of the request.
$associate_array['signature'] = 'keyId="SN=9FA1,CA=CN=D-TRUST%20CA%202-1%202015,O=D-Trust%20GmbH,C=DE",algorithm="rsa-sha256", headers="Digest X-Request-ID PSU-ID TPP-Redirect-URI Date", signature="Base64(RSA-SHA256(signing string))"'
; // string | A signature of the request by the TPP on application level. This might be mandated by ASPSP.
$associate_array['tpp_signature_certificate'] = 'tpp_signature_certificate_example'; // string | The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained.
$associate_array['psu_ip_address'] = '192.168.8.78'; // string | The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU.
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
    $result = $apiInstance->getTransactionList($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationServiceAISApi->getTransactionList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **organisation** | **string**| This identification is denoting the addressed bankIO organisation. The organisation is the \&quot;name\&quot; attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **account_id** | **string**| This identification is denoting the addressed account.  The account-id is retrieved by using a \&quot;Read account list\&quot; call. The account-id is the \&quot;id\&quot; attribute of the account structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **booking_status** | **string**| Permitted codes are    * \&quot;information\&quot;,   * \&quot;booked\&quot;,   * \&quot;pending\&quot;, and    * \&quot;both\&quot; \&quot;booked\&quot; shall be supported by the ASPSP. To support the \&quot;pending\&quot; and \&quot;both\&quot; feature is optional for the ASPSP,  Error code if not supported in the online banking frontend |
 **x_request_id** | [**string**](../Model/.md)| ID of the request, unique to the call, as determined by the initiating party. |
 **consent_id** | **string**| This then contains the consentId of the related AIS consent, which was performed prior to this payment initiation. |
 **date_from** | **\DateTime**| Conditional: Starting date (inclusive the date dateFrom) of the transaction list, mandated if no delta access is required and if bookingStatus does not equal \&quot;information.  For booked transactions, the relevant date is the booking date.   For pending transactions, the relevant date is the entry date, which may not be transparent  neither in this API nor other channels of the ASPSP. | [optional]
 **date_to** | **\DateTime**| End date (inclusive the data dateTo) of the transaction list, default is \&quot;now\&quot; if not given.   Might be ignored if a delta function is used.  For booked transactions, the relevant date is the booking date.   For pending transactions, the relevant date is the entry date, which may not be transparent  neither in this API nor other channels of the ASPSP. | [optional]
 **entry_reference_from** | **string**| This data attribute is indicating that the AISP is in favour to get all transactions after  the transaction with identification entryReferenceFrom alternatively to the above defined period.  This is a implementation of a delta access.  If this data element is contained, the entries \&quot;dateFrom\&quot; and \&quot;dateTo\&quot; might be ignored by the ASPSP  if a delta report is supported.  Optional if supported by API provider. | [optional]
 **delta_list** | **bool**| This data attribute is indicating that the AISP is in favour to get all transactions after the last report access for this PSU on the addressed account. This is another implementation of a delta access-report. This delta indicator might be rejected by the ASPSP if this function is not supported. Optional if supported by API provider | [optional]
 **with_balance** | **bool**| If contained, this function reads the list of accessible payment accounts including the booking balance,  if granted by the PSU in the related consent and available by the ASPSP.  This parameter might be ignored by the ASPSP. | [optional]
 **digest** | **string**| Is contained if and only if the \&quot;Signature\&quot; element is contained in the header of the request. | [optional]
 **signature** | **string**| A signature of the request by the TPP on application level. This might be mandated by ASPSP. | [optional]
 **tpp_signature_certificate** | **string**| The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained. | [optional]
 **psu_ip_address** | **string**| The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU. | [optional]
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

[**\BankIO\Sdk\Model\TransactionsResponse200Json**](../Model/TransactionsResponse200Json.md)

### Authorization

[oAuth2AuthCode](../../README.md#oAuth2AuthCode)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json, application/xml, text/plain, application/problem+json, 

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## readAccountDetails

> \BankIO\Sdk\Model\InlineResponse200 readAccountDetails($organisation, $account_id, $x_request_id, $consent_id, $with_balance, $digest, $signature, $tpp_signature_certificate, $psu_ip_address, $psu_ip_port, $psu_accept, $psu_accept_charset, $psu_accept_encoding, $psu_accept_language, $psu_user_agent, $psu_http_method, $psu_device_id, $psu_geo_location)

Read account details

Reads details about an account, with balances where required.  It is assumed that a consent of the PSU to  this access is already given and stored on the ASPSP system.  The addressed details of this account depends then on the stored consent addressed by consentId,  respectively the OAuth2 access token.  **NOTE:** The account-id can represent a multicurrency account.  In this case the currency code is set to \"XXX\".  Give detailed information about the addressed account.  Give detailed information about the addressed account together with balance information

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oAuth2AuthCode
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$client = HttpClientDiscovery::find();
$apiInstance = new BankIO\Sdk\Api\AccountInformationServiceAISApi(
    // If you want use custom http client, pass your client which implements `Http\Client\HttpClient`.
    // This is optional, `HTTPlug` will be used as default.
    $client,
    $config
);
$associate_array['organisation'] = 'organisation_example'; // string | This identification is denoting the addressed bankIO organisation. The organisation is the \"name\" attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['account_id'] = 'account_id_example'; // string | This identification is denoting the addressed account.  The account-id is retrieved by using a \"Read account list\" call. The account-id is the \"id\" attribute of the account structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['x_request_id'] = '99391c7e-ad88-49ec-a2ad-99ddcb1f7721'; // string | ID of the request, unique to the call, as determined by the initiating party.
$associate_array['consent_id'] = 'consent_id_example'; // string | This then contains the consentId of the related AIS consent, which was performed prior to this payment initiation.
$associate_array['with_balance'] = True; // bool | If contained, this function reads the list of accessible payment accounts including the booking balance,  if granted by the PSU in the related consent and available by the ASPSP.  This parameter might be ignored by the ASPSP.
$associate_array['digest'] = 'SHA-256=hl1/Eps8BEQW58FJhDApwJXjGY4nr1ArGDHIT25vq6A='; // string | Is contained if and only if the \"Signature\" element is contained in the header of the request.
$associate_array['signature'] = 'keyId="SN=9FA1,CA=CN=D-TRUST%20CA%202-1%202015,O=D-Trust%20GmbH,C=DE",algorithm="rsa-sha256", headers="Digest X-Request-ID PSU-ID TPP-Redirect-URI Date", signature="Base64(RSA-SHA256(signing string))"'
; // string | A signature of the request by the TPP on application level. This might be mandated by ASPSP.
$associate_array['tpp_signature_certificate'] = 'tpp_signature_certificate_example'; // string | The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained.
$associate_array['psu_ip_address'] = '192.168.8.78'; // string | The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU.
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
    $result = $apiInstance->readAccountDetails($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationServiceAISApi->readAccountDetails: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **organisation** | **string**| This identification is denoting the addressed bankIO organisation. The organisation is the \&quot;name\&quot; attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **account_id** | **string**| This identification is denoting the addressed account.  The account-id is retrieved by using a \&quot;Read account list\&quot; call. The account-id is the \&quot;id\&quot; attribute of the account structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **x_request_id** | [**string**](../Model/.md)| ID of the request, unique to the call, as determined by the initiating party. |
 **consent_id** | **string**| This then contains the consentId of the related AIS consent, which was performed prior to this payment initiation. |
 **with_balance** | **bool**| If contained, this function reads the list of accessible payment accounts including the booking balance,  if granted by the PSU in the related consent and available by the ASPSP.  This parameter might be ignored by the ASPSP. | [optional]
 **digest** | **string**| Is contained if and only if the \&quot;Signature\&quot; element is contained in the header of the request. | [optional]
 **signature** | **string**| A signature of the request by the TPP on application level. This might be mandated by ASPSP. | [optional]
 **tpp_signature_certificate** | **string**| The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained. | [optional]
 **psu_ip_address** | **string**| The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU. | [optional]
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

[**\BankIO\Sdk\Model\InlineResponse200**](../Model/InlineResponse200.md)

### Authorization

[oAuth2AuthCode](../../README.md#oAuth2AuthCode)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json, application/problem+json, 

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## readCardAccount

> \BankIO\Sdk\Model\InlineResponse2002 readCardAccount($organisation, $account_id, $x_request_id, $consent_id, $digest, $signature, $tpp_signature_certificate, $psu_ip_address, $psu_ip_port, $psu_accept, $psu_accept_charset, $psu_accept_encoding, $psu_accept_language, $psu_user_agent, $psu_http_method, $psu_device_id, $psu_geo_location)

Read details about a card account

Reads details about a card account.  It is assumed that a consent of the PSU to this access is already given  and stored on the ASPSP system. The addressed details of this account depends  then on the stored consent addressed by consentId, respectively the OAuth2  access token.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oAuth2AuthCode
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$client = HttpClientDiscovery::find();
$apiInstance = new BankIO\Sdk\Api\AccountInformationServiceAISApi(
    // If you want use custom http client, pass your client which implements `Http\Client\HttpClient`.
    // This is optional, `HTTPlug` will be used as default.
    $client,
    $config
);
$associate_array['organisation'] = 'organisation_example'; // string | This identification is denoting the addressed bankIO organisation. The organisation is the \"name\" attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['account_id'] = 'account_id_example'; // string | This identification is denoting the addressed account.  The account-id is retrieved by using a \"Read account list\" call. The account-id is the \"id\" attribute of the account structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['x_request_id'] = '99391c7e-ad88-49ec-a2ad-99ddcb1f7721'; // string | ID of the request, unique to the call, as determined by the initiating party.
$associate_array['consent_id'] = 'consent_id_example'; // string | This then contains the consentId of the related AIS consent, which was performed prior to this payment initiation.
$associate_array['digest'] = 'SHA-256=hl1/Eps8BEQW58FJhDApwJXjGY4nr1ArGDHIT25vq6A='; // string | Is contained if and only if the \"Signature\" element is contained in the header of the request.
$associate_array['signature'] = 'keyId="SN=9FA1,CA=CN=D-TRUST%20CA%202-1%202015,O=D-Trust%20GmbH,C=DE",algorithm="rsa-sha256", headers="Digest X-Request-ID PSU-ID TPP-Redirect-URI Date", signature="Base64(RSA-SHA256(signing string))"'
; // string | A signature of the request by the TPP on application level. This might be mandated by ASPSP.
$associate_array['tpp_signature_certificate'] = 'tpp_signature_certificate_example'; // string | The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained.
$associate_array['psu_ip_address'] = '192.168.8.78'; // string | The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU.
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
    $result = $apiInstance->readCardAccount($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationServiceAISApi->readCardAccount: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **organisation** | **string**| This identification is denoting the addressed bankIO organisation. The organisation is the \&quot;name\&quot; attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **account_id** | **string**| This identification is denoting the addressed account.  The account-id is retrieved by using a \&quot;Read account list\&quot; call. The account-id is the \&quot;id\&quot; attribute of the account structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **x_request_id** | [**string**](../Model/.md)| ID of the request, unique to the call, as determined by the initiating party. |
 **consent_id** | **string**| This then contains the consentId of the related AIS consent, which was performed prior to this payment initiation. |
 **digest** | **string**| Is contained if and only if the \&quot;Signature\&quot; element is contained in the header of the request. | [optional]
 **signature** | **string**| A signature of the request by the TPP on application level. This might be mandated by ASPSP. | [optional]
 **tpp_signature_certificate** | **string**| The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained. | [optional]
 **psu_ip_address** | **string**| The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU. | [optional]
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

[**\BankIO\Sdk\Model\InlineResponse2002**](../Model/InlineResponse2002.md)

### Authorization

[oAuth2AuthCode](../../README.md#oAuth2AuthCode)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json, application/problem+json, 

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## startConsentAuthorisation

> \BankIO\Sdk\Model\StartScaprocessResponse startConsentAuthorisation($organisation, $consent_id, $x_request_id, $digest, $signature, $tpp_signature_certificate, $psu_id, $psu_id_type, $psu_corporate_id, $psu_corporate_id_type, $tpp_redirect_preferred, $tpp_redirect_uri, $tpp_nok_redirect_uri, $tpp_notification_uri, $tpp_notification_content_preferred, $psu_ip_address, $psu_ip_port, $psu_accept, $psu_accept_charset, $psu_accept_encoding, $psu_accept_language, $psu_user_agent, $psu_http_method, $psu_device_id, $psu_geo_location, $unknown_base_type)

Start the authorisation process for a consent

Create an authorisation sub-resource and start the authorisation process of a consent.  The message might in addition transmit authentication and authorisation related data.  his method is iterated n times for a n times SCA authorisation in a  corporate context, each creating an own authorisation sub-endpoint for  the corresponding PSU authorising the consent.  The ASPSP might make the usage of this access method unnecessary,  since the related authorisation resource will be automatically created by  the ASPSP after the submission of the consent data with the first POST consents call.  The start authorisation process is a process which is needed for creating a new authorisation  or cancellation sub-resource.   This applies in the following scenarios:    * The ASPSP has indicated with an 'startAuthorisation' hyperlink in the preceding Payment      initiation response that an explicit start of the authorisation process is needed by the TPP.      The 'startAuthorisation' hyperlink can transport more information about data which needs to be      uploaded by using the extended forms:     * 'startAuthorisationWithPsuIdentfication',      * 'startAuthorisationWithPsuAuthentication'      * 'startAuthorisationWithEncryptedPsuAuthentication'     * 'startAuthorisationWithAuthentciationMethodSelection'    * The related payment initiation cannot yet be executed since a multilevel SCA is mandated.   * The ASPSP has indicated with an 'startAuthorisation' hyperlink in the preceding      payment cancellation response that an explicit start of the authorisation process is needed by the TPP.      The 'startAuthorisation' hyperlink can transport more information about data which needs to be uploaded      by using the extended forms as indicated above.   * The related payment cancellation request cannot be applied yet since a multilevel SCA is mandate for      executing the cancellation.   * The signing basket needs to be authorised yet.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oAuth2AuthCode
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$client = HttpClientDiscovery::find();
$apiInstance = new BankIO\Sdk\Api\AccountInformationServiceAISApi(
    // If you want use custom http client, pass your client which implements `Http\Client\HttpClient`.
    // This is optional, `HTTPlug` will be used as default.
    $client,
    $config
);
$associate_array['organisation'] = 'organisation_example'; // string | This identification is denoting the addressed bankIO organisation. The organisation is the \"name\" attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['consent_id'] = 'consent_id_example'; // string | ID of the corresponding consent object as returned by an account information consent request.
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
$associate_array['psu_ip_address'] = '192.168.8.78'; // string | The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU.
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
    $result = $apiInstance->startConsentAuthorisation($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationServiceAISApi->startConsentAuthorisation: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **organisation** | **string**| This identification is denoting the addressed bankIO organisation. The organisation is the \&quot;name\&quot; attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **consent_id** | **string**| ID of the corresponding consent object as returned by an account information consent request. |
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
 **psu_ip_address** | **string**| The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU. | [optional]
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


## updateConsentsPsuData

> OneOfUpdatePsuIdenticationResponseUpdatePsuAuthenticationResponseSelectPsuAuthenticationMethodResponseScaStatusResponseAuthorisationConfirmationResponse updateConsentsPsuData($organisation, $consent_id, $authorisation_id, $x_request_id, $digest, $signature, $tpp_signature_certificate, $psu_id, $psu_id_type, $psu_corporate_id, $psu_corporate_id_type, $psu_ip_address, $psu_ip_port, $psu_accept, $psu_accept_charset, $psu_accept_encoding, $psu_accept_language, $psu_user_agent, $psu_http_method, $psu_device_id, $psu_geo_location, $unknown_base_type)

Update PSU Data for consents

This method update PSU data on the consents  resource if needed.  It may authorise a consent within the Embedded SCA Approach where needed.  Independently from the SCA Approach it supports e.g. the selection of  the authentication method and a non-SCA PSU authentication.  This methods updates PSU data on the cancellation authorisation resource if needed.   There are several possible update PSU data requests in the context of a consent request if needed,  which depends on the SCA approach:  * Redirect SCA Approach:   A specific Update PSU data request is applicable for      * the selection of authentication methods, before choosing the actual SCA approach. * Decoupled SCA Approach:   A specific update PSU data request is only applicable for   * adding the PSU Identification, if not provided yet in the payment initiation request or the Account Information Consent Request, or if no OAuth2 access token is used, or   * the selection of authentication methods. * Embedded SCA Approach:    The Update PSU data request might be used    * to add credentials as a first factor authentication data of the PSU and   * to select the authentication method and   * transaction authorisation.  The SCA Approach might depend on the chosen SCA method.  For that reason, the following possible update PSU data request can apply to all SCA approaches:  * Select an SCA method in case of several SCA methods are available for the customer.  There are the following request types on this access path:   * Update PSU identification   * Update PSU authentication   * Select PSU autorization method      WARNING: This method needs a reduced header,      therefore many optional elements are not present.      Maybe in a later version the access path will change.   * Transaction Authorisation     WARNING: This method needs a reduced header,      therefore many optional elements are not present.      Maybe in a later version the access path will change.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oAuth2AuthCode
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$client = HttpClientDiscovery::find();
$apiInstance = new BankIO\Sdk\Api\AccountInformationServiceAISApi(
    // If you want use custom http client, pass your client which implements `Http\Client\HttpClient`.
    // This is optional, `HTTPlug` will be used as default.
    $client,
    $config
);
$associate_array['organisation'] = 'organisation_example'; // string | This identification is denoting the addressed bankIO organisation. The organisation is the \"name\" attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent.
$associate_array['consent_id'] = 'consent_id_example'; // string | ID of the corresponding consent object as returned by an account information consent request.
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
$associate_array['psu_ip_address'] = '192.168.8.78'; // string | The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU.
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
    $result = $apiInstance->updateConsentsPsuData($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationServiceAISApi->updateConsentsPsuData: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **organisation** | **string**| This identification is denoting the addressed bankIO organisation. The organisation is the \&quot;name\&quot; attribute of the organisation structure.  Its value is constant at least throughout the lifecycle of a given consent. |
 **consent_id** | **string**| ID of the corresponding consent object as returned by an account information consent request. |
 **authorisation_id** | **string**| Resource identification of the related SCA. |
 **x_request_id** | [**string**](../Model/.md)| ID of the request, unique to the call, as determined by the initiating party. |
 **digest** | **string**| Is contained if and only if the \&quot;Signature\&quot; element is contained in the header of the request. | [optional]
 **signature** | **string**| A signature of the request by the TPP on application level. This might be mandated by ASPSP. | [optional]
 **tpp_signature_certificate** | **string**| The certificate used for signing the request, in base64 encoding.  Must be contained if a signature is contained. | [optional]
 **psu_id** | **string**| Client ID of the PSU in the ASPSP client interface.   Might be mandated in the ASPSP&#39;s documentation.  It might be contained even if an OAuth2 based authentication was performed in a pre-step or an OAuth2 based SCA was performed in an preceding AIS service in the same session. In this case the ASPSP might check whether PSU-ID and token match,  according to ASPSP documentation. | [optional]
 **psu_id_type** | **string**| Type of the PSU-ID, needed in scenarios where PSUs have several PSU-IDs as access possibility.  In this case, the mean and use are then defined in the ASPSP’s documentation. | [optional]
 **psu_corporate_id** | **string**| Might be mandated in the ASPSP&#39;s documentation. Only used in a corporate context. | [optional]
 **psu_corporate_id_type** | **string**| Might be mandated in the ASPSP&#39;s documentation. Only used in a corporate context. | [optional]
 **psu_ip_address** | **string**| The forwarded IP Address header field consists of the corresponding HTTP request  IP Address field between PSU and TPP.  It shall be contained if and only if this request was actively initiated by the PSU. | [optional]
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

