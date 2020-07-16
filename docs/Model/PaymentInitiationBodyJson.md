# # PaymentInitiationBodyJson

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**end_to_end_identification** | **string** |  | [optional] 
**debtor_account** | [**\BankIO\Sdk\Model\AccountReference**](AccountReference.md) |  | 
**instructed_amount** | [**\BankIO\Sdk\Model\Amount**](Amount.md) |  | 
**creditor_account** | [**\BankIO\Sdk\Model\AccountReference**](AccountReference.md) |  | 
**creditor_agent** | **string** | BICFI | [optional] 
**creditor_agent_name** | **string** | Creditor agent name. | [optional] 
**creditor_name** | **string** | Creditor name. | 
**creditor_address** | [**\BankIO\Sdk\Model\Address**](Address.md) |  | [optional] 
**remittance_information_unstructured** | **string** | Unstructured remittance information. | [optional] 
**start_date** | [**\DateTime**](\DateTime.md) | The first applicable day of execution starting from this date is the first payment. | 
**end_date** | [**\DateTime**](\DateTime.md) | The last applicable day of execution. If not given, it is an infinite standing order. | [optional] 
**execution_rule** | [**\BankIO\Sdk\Model\ExecutionRule**](ExecutionRule.md) |  | [optional] 
**frequency** | [**\BankIO\Sdk\Model\FrequencyCode**](FrequencyCode.md) |  | 
**day_of_execution** | [**\BankIO\Sdk\Model\DayOfExecution**](DayOfExecution.md) |  | [optional] 
**batch_booking_preferred** | **bool** | If this element equals &#39;true&#39;, the PSU prefers only one booking entry.  If this element equals &#39;false&#39;, the PSU prefers individual booking of all contained individual transactions.   The ASPSP will follow this preference according to contracts agreed on with the PSU. | [optional] 
**requested_execution_date** | [**\DateTime**](\DateTime.md) |  | [optional] 
**requested_execution_time** | [**\DateTime**](\DateTime.md) |  | [optional] 
**payments** | [**\BankIO\Sdk\Model\PaymentInitiationBulkElementJson[]**](PaymentInitiationBulkElementJson.md) | A list of generic JSON bodies payment initations for bulk payments via JSON.  Note: Some fields from single payments do not occcur in a bulk payment element | 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


