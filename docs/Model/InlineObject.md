# # InlineObject

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**grant_type** | **string** | Type of grant. | 
**client_id** | **string** | Application client ID, may be provided either within formData or using HTTP Basic Authentication. | [optional] 
**client_secret** | **string** | Application secret, may be provided either within formData or using HTTP Basic Authentication. | [optional] 
**code** | **string** | Authorization code provided by the /oauth2/authorize endpoint. | [optional] 
**redirect_uri** | **string** | Required only if the redirect_uri parameter was included in the authorization request /oauth2/authorize. Their values MUST be identical. | [optional] 
**scope** | **string** | Scope being requested. | [optional] 
**refresh_token** | **string** | The refresh token that the client wants to exchange for a new access token (refresh_token grant_type). | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


