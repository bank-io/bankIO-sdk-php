# # CardAccountsTransactionsResponse200

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**card_account** | [**\BankIO\Sdk\Model\AccountReference**](AccountReference.md) |  | [optional] 
**card_transactions** | [**\BankIO\Sdk\Model\CardAccountReport**](CardAccountReport.md) |  | [optional] 
**balances** | [**\BankIO\Sdk\Model\Balance[]**](Balance.md) | A list of balances regarding this account, e.g. the current balance, the last booked balance. The list might be restricted to the current balance. | [optional] 
**_links** | [**\BankIO\Sdk\Model\LinksDownload**](LinksDownload.md) |  | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


