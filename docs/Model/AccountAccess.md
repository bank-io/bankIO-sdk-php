# # AccountAccess

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**accounts** | [**\BankIO\Sdk\Model\AccountReference[]**](AccountReference.md) | Is asking for detailed account information.   If the array is empty in a request, the TPP is asking for an accessible account list.  This may be restricted in a PSU/ASPSP authorization dialogue.  If the array is empty, also the arrays for balances, additionalInformation sub attributes or transactions shall be empty, if used. | [optional] 
**balances** | [**\BankIO\Sdk\Model\AccountReference[]**](AccountReference.md) | Is asking for balances of the addressed accounts.  If the array is empty in the request, the TPP is asking for the balances of all accessible account lists.  This may be restricted in a PSU/ASPSP authorization dialogue.  If the array is empty, also the arrays for accounts, additionalInformation sub attributes or transactions shall be empty, if used. | [optional] 
**transactions** | [**\BankIO\Sdk\Model\AccountReference[]**](AccountReference.md) | Is asking for transactions of the addressed accounts.   If the array is empty in the request, the TPP is asking for the transactions of all accessible account lists.  This may be restricted in a PSU/ASPSP authorization dialogue.  If the array is empty, also the arrays for accounts, additionalInformation sub attributes or balances shall be empty, if used. | [optional] 
**additional_information** | [**\BankIO\Sdk\Model\AdditionalInformationAccess**](AdditionalInformationAccess.md) |  | [optional] 
**available_accounts** | **string** | Optional if supported by API provider.  The values \&quot;allAccounts\&quot; and \&quot;allAccountsWithOwnerName\&quot; are admitted.  The support of the \&quot;allAccountsWithOwnerName\&quot; value by the ASPSP is optional. | [optional] 
**available_accounts_with_balance** | **string** | Optional if supported by API provider.  The values \&quot;allAccounts\&quot; and \&quot;allAccountsWithOwnerName\&quot; are admitted.  The support of the \&quot;allAccountsWithOwnerName\&quot; value by the ASPSP is optional. | [optional] 
**all_psd2** | **string** | Optional if supported by API provider.  The values \&quot;allAccounts\&quot; and \&quot;allAccountsWithOwnerName\&quot; are admitted.  The support of the \&quot;allAccountsWithOwnerName\&quot; value by the ASPSP is optional. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


