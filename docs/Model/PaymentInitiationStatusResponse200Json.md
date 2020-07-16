# # PaymentInitiationStatusResponse200Json

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**transaction_status** | [**\BankIO\Sdk\Model\TransactionStatus**](TransactionStatus.md) |  | 
**funds_available** | **bool** | Equals true if sufficient funds are available at the time of the request, false otherwise.  This datalemenet is allways contained in a confirmation of funds response.  This data element is contained in a payment status response,  if supported by the ASPSP, if a funds check has been performed and  if the transactionStatus is \&quot;ACTC\&quot;, \&quot;ACWC\&quot; or \&quot;ACCP\&quot;. | [optional] 
**psu_message** | **string** | Text to be displayed to the PSU. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


