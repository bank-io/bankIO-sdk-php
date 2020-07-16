# # Error405AIS

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **string** | A URI reference [RFC3986] that identifies the problem type.  Remark For Future: These URI will be provided by NextGenPSD2 in future. | 
**title** | **string** | Short human readable description of error type.  Could be in local language.  To be provided by ASPSPs. | [optional] 
**detail** | **string** | Detailed human readable text specific to this instance of the error.  XPath might be used to point to the issue generating the error in addition. Remark for Future: In future, a dedicated field might be introduced for the XPath. | [optional] 
**code** | [**\BankIO\Sdk\Model\MessageCode405AIS**](MessageCode405AIS.md) |  | 
**additional_errors** | [**\BankIO\Sdk\Model\Error405AISAdditionalErrors[]**](Error405AISAdditionalErrors.md) | Array of Error Information Blocks.  Might be used if more than one error is to be communicated | [optional] 
**_links** | [**\BankIO\Sdk\Model\LinksAll**](LinksAll.md) |  | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


