# # BulkPaymentInitiationJson

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**batch_booking_preferred** | **bool** | If this element equals &#39;true&#39;, the PSU prefers only one booking entry.  If this element equals &#39;false&#39;, the PSU prefers individual booking of all contained individual transactions.   The ASPSP will follow this preference according to contracts agreed on with the PSU. | [optional] 
**debtor_account** | [**\BankIO\Sdk\Model\AccountReference**](AccountReference.md) |  | 
**requested_execution_date** | [**\DateTime**](\DateTime.md) |  | [optional] 
**requested_execution_time** | [**\DateTime**](\DateTime.md) |  | [optional] 
**payments** | [**\BankIO\Sdk\Model\PaymentInitiationBulkElementJson[]**](PaymentInitiationBulkElementJson.md) | A list of generic JSON bodies payment initations for bulk payments via JSON.  Note: Some fields from single payments do not occcur in a bulk payment element | 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


