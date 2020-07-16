# # Balance

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**balance_amount** | [**\BankIO\Sdk\Model\Amount**](Amount.md) |  | 
**balance_type** | [**\BankIO\Sdk\Model\BalanceType**](BalanceType.md) |  | 
**credit_limit_included** | **bool** | A flag indicating if the credit limit of the corresponding account  is included in the calculation of the balance, where applicable. | [optional] 
**last_change_date_time** | [**\DateTime**](\DateTime.md) | This data element might be used to indicate e.g. with the expected or booked balance that no action is known  on the account, which is not yet booked. | [optional] 
**reference_date** | [**\DateTime**](\DateTime.md) | Reference date of the balance. | [optional] 
**last_committed_transaction** | **string** | \&quot;entryReference\&quot; of the last commited transaction to support the TPP in identifying whether all  PSU transactions are already known. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


