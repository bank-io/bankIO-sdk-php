# # PeriodicPaymentInitiationWithStatusResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**end_to_end_identification** | **string** |  | [optional] 
**debtor_account** | [**\BankIO\Sdk\Model\AccountReference**](AccountReference.md) |  | 
**instructed_amount** | [**\BankIO\Sdk\Model\Amount**](Amount.md) |  | 
**creditor_account** | [**\BankIO\Sdk\Model\AccountReference**](AccountReference.md) |  | 
**creditor_agent** | **string** | BICFI | [optional] 
**creditor_name** | **string** | Creditor name. | 
**creditor_address** | [**\BankIO\Sdk\Model\Address**](Address.md) |  | [optional] 
**remittance_information_unstructured** | **string** | Unstructured remittance information. | [optional] 
**start_date** | [**\DateTime**](\DateTime.md) | The first applicable day of execution starting from this date is the first payment. | 
**end_date** | [**\DateTime**](\DateTime.md) | The last applicable day of execution. If not given, it is an infinite standing order. | [optional] 
**execution_rule** | [**\BankIO\Sdk\Model\ExecutionRule**](ExecutionRule.md) |  | [optional] 
**frequency** | [**\BankIO\Sdk\Model\FrequencyCode**](FrequencyCode.md) |  | 
**day_of_execution** | [**\BankIO\Sdk\Model\DayOfExecution**](DayOfExecution.md) |  | [optional] 
**transaction_status** | [**\BankIO\Sdk\Model\TransactionStatus**](TransactionStatus.md) |  | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


