# BankIO\Sdk\AuthenticationApi

All URIs are relative to *https://ob.bankio.ro*

Method | HTTP request | Description
------------- | ------------- | -------------
[**authorize**](AuthenticationApi.md#authorize) | **GET** /api/auth/authorize | Authenticate a user
[**token**](AuthenticationApi.md#token) | **POST** /api/auth/token | Request Access Tokens
[**userInfo**](AuthenticationApi.md#userInfo) | **GET** /api/auth/me | Retrieve user profile



## authorize

> authorize($client_id, $response_type, $scope, $redirect_uri, $state, $response_mode, $nonce, $display, $prompt, $max_age, $ui_locales)

Authenticate a user

Start a session with bankIO Connect and authenticate a user.  Example:  ``` GET /api/auth/authorize?client_id=<your-client-id>&response_type=code+id_token&scope=openid+email&redirect_uri=<your-redirect-uri>&state=0123456789 ```  This endpoint is compatible with OpenID Connect and also supports the POST method, in which case the parameters are passed as a form post.  See also:   - [OAuth 2.0 Authorization Endpoint](http://tools.ietf.org/html/rfc6749#section-3.1)   - [OIDC Authentication request](http://openid.net/specs/openid-connect-core-1_0.html#AuthRequest)   - [OIDC Successful Authentication response](http://openid.net/specs/openid-connect-core-1_0.html#AuthResponse)   - [OIDC Error Authentication response](http://openid.net/specs/openid-connect-core-1_0.html#AuthError)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new BankIO\Sdk\Api\AuthenticationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$client_id = 'client_id_example'; // string | A client ID obtained from the [Dashboard](https://dashboard.bankio.com/).
$response_type = 'response_type_example'; // string | The OIDC response type to use for this authentication flow. Valid choices are `code`, `id_token`, `token`, `token id_token`, `code id_token` `code token` and `code token id_token`, but a client can be configured with a more restricted set.
$scope = 'scope_example'; // string | The space-separated identity claims to request from the end-user. Always include `openid` as a scope for compatibility with OIDC.
$redirect_uri = 'redirect_uri_example'; // string | The location to redirect to after (un)successful authentication. See OIDC for the parameters passed in the query string (`response_mode=query`) or as fragments (`response_mode=fragment`). Unless the client is in test-mode this must be one of the registered redirect URLs.
$state = 'state_example'; // string | An opaque string that will be passed back to the redirect URL and therefore can be used to communicate client side state and prevent CSRF attacks.
$response_mode = 'response_mode_example'; // string | Whether to append parameters to the redirect URL in the query string (`query`) or as fragments (`fragment`). This option usually has a sensible default for each of the response types.
$nonce = 'nonce_example'; // string | An nonce provided by the client (and opaque to bankIO Connect) that will be included in any ID Token generated for this session. Clients should use the nonce to mitigate replay attacks.
$display = 'page'; // string | The authentication display mode, which can be one of `page`, `popup` or `modal`. Defaults to `page`.
$prompt = 'login'; // string | Space-delimited, case sensitive list of ASCII string values that specifies whether the Authorization Server prompts the End-User for reauthentication and consent. The supported values are: `none`, `login`, `consent`. If `consent` the end-user is asked to (re)confirm what claims they share. Use `none` to check for an active session.
$max_age = 0; // int | Specifies the allowable elapsed time in seconds since the last time the end-user was actively authenticated.
$ui_locales = 'ui_locales_example'; // string | Specifies the preferred language to use on the authorization page, as a space-separated list of BCP47 language tags. Ignored at the moment.

try {
    $apiInstance->authorize($client_id, $response_type, $scope, $redirect_uri, $state, $response_mode, $nonce, $display, $prompt, $max_age, $ui_locales);
} catch (Exception $e) {
    echo 'Exception when calling AuthenticationApi->authorize: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **client_id** | **string**| A client ID obtained from the [Dashboard](https://dashboard.bankio.com/). |
 **response_type** | **string**| The OIDC response type to use for this authentication flow. Valid choices are &#x60;code&#x60;, &#x60;id_token&#x60;, &#x60;token&#x60;, &#x60;token id_token&#x60;, &#x60;code id_token&#x60; &#x60;code token&#x60; and &#x60;code token id_token&#x60;, but a client can be configured with a more restricted set. |
 **scope** | **string**| The space-separated identity claims to request from the end-user. Always include &#x60;openid&#x60; as a scope for compatibility with OIDC. |
 **redirect_uri** | **string**| The location to redirect to after (un)successful authentication. See OIDC for the parameters passed in the query string (&#x60;response_mode&#x3D;query&#x60;) or as fragments (&#x60;response_mode&#x3D;fragment&#x60;). Unless the client is in test-mode this must be one of the registered redirect URLs. |
 **state** | **string**| An opaque string that will be passed back to the redirect URL and therefore can be used to communicate client side state and prevent CSRF attacks. |
 **response_mode** | **string**| Whether to append parameters to the redirect URL in the query string (&#x60;query&#x60;) or as fragments (&#x60;fragment&#x60;). This option usually has a sensible default for each of the response types. | [optional]
 **nonce** | **string**| An nonce provided by the client (and opaque to bankIO Connect) that will be included in any ID Token generated for this session. Clients should use the nonce to mitigate replay attacks. | [optional]
 **display** | **string**| The authentication display mode, which can be one of &#x60;page&#x60;, &#x60;popup&#x60; or &#x60;modal&#x60;. Defaults to &#x60;page&#x60;. | [optional] [default to &#39;page&#39;]
 **prompt** | **string**| Space-delimited, case sensitive list of ASCII string values that specifies whether the Authorization Server prompts the End-User for reauthentication and consent. The supported values are: &#x60;none&#x60;, &#x60;login&#x60;, &#x60;consent&#x60;. If &#x60;consent&#x60; the end-user is asked to (re)confirm what claims they share. Use &#x60;none&#x60; to check for an active session. | [optional] [default to &#39;login&#39;]
 **max_age** | **int**| Specifies the allowable elapsed time in seconds since the last time the end-user was actively authenticated. | [optional] [default to 0]
 **ui_locales** | **string**| Specifies the preferred language to use on the authorization page, as a space-separated list of BCP47 language tags. Ignored at the moment. | [optional]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## token

> \BankIO\Sdk\Model\Token token($grant_type, $client_id, $client_secret, $code, $redirect_uri, $scope, $refresh_token)

Request Access Tokens

This endpoint allows requesting an access token following one of the flows below:- Authorization Code (exchange code for access token)- Client Credentials (2-legged, there is no resource owner information)- Resource Owner Password Credentials (2-legged, client provides resource owner name and password)- Refresh Token (exchange refresh token for a new access code). The table below indicates the required parameters for each specific grant_type options. Empty cells indicate a parameter is ignored for that specific grant type. Client authentication:- Confidential clients should authenticate using HTTP Basic Authentication. Alternatively, they may post  their client_id and client_secret information as a formData parameter. - Public clients should send their client_id as formData parameter.| grant_type           | code       | client_credentials | password    | refresh_token ||----------------------|------------|--------------------|-------------|---------------|| client_id            | required*  | required*          | required*   | required*     || client_secret        | required*  | required*          | required*   | required*     || code                 | required   |                    |             |               || redirect_uri         | required   |                    |             |               || scope                |            | optional           | optional    |               || refresh_token        |            |                    |             | required      |The implicit grant requests, see /oauth2/authorize. See also:   - [OIDC Token Endpoint](http://openid.net/specs/openid-connect-core-1_0.html#TokenRequest)   - [OIDC Successful Token response](http://openid.net/specs/openid-connect-core-1_0.html#TokenResponse)   - [OIDC Token Error response](http://openid.net/specs/openid-connect-core-1_0.html#TokenError)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new BankIO\Sdk\Api\AuthenticationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$grant_type = 'grant_type_example'; // string | Type of grant.
$client_id = 'client_id_example'; // string | Application client ID, may be provided either within formData or using HTTP Basic Authentication.
$client_secret = 'client_secret_example'; // string | Application secret, may be provided either within formData or using HTTP Basic Authentication.
$code = 'code_example'; // string | Authorization code provided by the /oauth2/authorize endpoint.
$redirect_uri = 'redirect_uri_example'; // string | Required only if the redirect_uri parameter was included in the authorization request /oauth2/authorize. Their values MUST be identical.
$scope = 'scope_example'; // string | Scope being requested.
$refresh_token = 'refresh_token_example'; // string | The refresh token that the client wants to exchange for a new access token (refresh_token grant_type).

try {
    $result = $apiInstance->token($grant_type, $client_id, $client_secret, $code, $redirect_uri, $scope, $refresh_token);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuthenticationApi->token: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **grant_type** | **string**| Type of grant. |
 **client_id** | **string**| Application client ID, may be provided either within formData or using HTTP Basic Authentication. | [optional]
 **client_secret** | **string**| Application secret, may be provided either within formData or using HTTP Basic Authentication. | [optional]
 **code** | **string**| Authorization code provided by the /oauth2/authorize endpoint. | [optional]
 **redirect_uri** | **string**| Required only if the redirect_uri parameter was included in the authorization request /oauth2/authorize. Their values MUST be identical. | [optional]
 **scope** | **string**| Scope being requested. | [optional]
 **refresh_token** | **string**| The refresh token that the client wants to exchange for a new access token (refresh_token grant_type). | [optional]

### Return type

[**\BankIO\Sdk\Model\Token**](../Model/Token.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: application/x-www-form-urlencoded
- **Accept**: application/x-www-form-urlencoded, application/json, application/problem+json, text/html

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## userInfo

> \BankIO\Sdk\Model\UserInfo userInfo()

Retrieve user profile

Use this endpoint to retrieve a user's profile in case you've not already obtained enough details from the ID Token via the Token Endpoint.  See also:  - [OIDC UserInfo endpoint](http://openid.net/specs/openid-connect-core-1_0.html#UserInfo)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: oAuth2SSO
$config = BankIO\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new BankIO\Sdk\Api\AuthenticationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->userInfo();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuthenticationApi->userInfo: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BankIO\Sdk\Model\UserInfo**](../Model/UserInfo.md)

### Authorization

[oAuth2SSO](../../README.md#oAuth2SSO)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/x-www-form-urlencoded, application/json, application/problem+json, text/html

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)

