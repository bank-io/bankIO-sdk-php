# BankIO\Sdk\ClientManagementApi

All URIs are relative to *https://ob.bankio.ro*

Method | HTTP request | Description
------------- | ------------- | -------------
[**clientClientId**](ClientManagementApi.md#clientClientId) | **DELETE** /api/auth/register/{client_id} | Delete a client
[**getClient**](ClientManagementApi.md#getClient) | **GET** /api/auth/register/{client_id} | View a client
[**updateClient**](ClientManagementApi.md#updateClient) | **PUT** /api/auth/register/{client_id} | Update a client



## clientClientId

> clientClientId($client_id)

Delete a client

Delete a previously registered client.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: client_registration_token
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new BankIO\Sdk\Api\ClientManagementApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$client_id = 'client_id_example'; // string | Client identifier

try {
    $apiInstance->clientClientId($client_id);
} catch (Exception $e) {
    echo 'Exception when calling ClientManagementApi->clientClientId: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **client_id** | **string**| Client identifier |

### Return type

void (empty response body)

### Authorization

[client_registration_token](../../README.md#client_registration_token)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/x-www-form-urlencoded, application/json, application/problem+json, text/html

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getClient

> \BankIO\Sdk\Model\Client getClient($client_id)

View a client

Retrieve the configuration of a previously registered client.  See also: - [OIDC Client Configuration Endpoint](http://openid.net/specs/openid-connect-registration-1_0.html#ClientConfigurationEndpoint)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: client_registration_token
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new BankIO\Sdk\Api\ClientManagementApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$client_id = 'client_id_example'; // string | Client identifier

try {
    $result = $apiInstance->getClient($client_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ClientManagementApi->getClient: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **client_id** | **string**| Client identifier |

### Return type

[**\BankIO\Sdk\Model\Client**](../Model/Client.md)

### Authorization

[client_registration_token](../../README.md#client_registration_token)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json, application/x-www-form-urlencoded, application/problem+json, text/html

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## updateClient

> \BankIO\Sdk\Model\Client updateClient($client_id, $client)

Update a client

Update the configuration of a previously registered client.  See also: - [OIDC Client Configuration Endpoint](http://openid.net/specs/openid-connect-registration-1_0.html#ClientConfigurationEndpoint)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: client_registration_token
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new BankIO\Sdk\Api\ClientManagementApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$client_id = 'client_id_example'; // string | Client identifier
$client = new \BankIO\Sdk\Model\Client(); // \BankIO\Sdk\Model\Client | Client Object

try {
    $result = $apiInstance->updateClient($client_id, $client);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ClientManagementApi->updateClient: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **client_id** | **string**| Client identifier |
 **client** | [**\BankIO\Sdk\Model\Client**](../Model/Client.md)| Client Object | [optional]

### Return type

[**\BankIO\Sdk\Model\Client**](../Model/Client.md)

### Authorization

[client_registration_token](../../README.md#client_registration_token)

### HTTP request headers

- **Content-Type**: application/json, multipart/form-data, application/x-www-form-urlencoded
- **Accept**: application/json, application/x-www-form-urlencoded, application/problem+json, text/html

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)

