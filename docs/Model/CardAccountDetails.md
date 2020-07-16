# # CardAccountDetails

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**resource_id** | **string** | This is the data element to be used in the path when retrieving data from a dedicated account. This shall be filled, if addressable resource are created by the ASPSP on the /card-accounts endpoint. | [optional] 
**masked_pan** | **string** | Masked Primary Account Number. | 
**currency** | **string** | ISO 4217 Alpha 3 currency code. | 
**owner_name** | **string** | Name of the legal account owner.  If there is more than one owner, then e.g. two names might be noted here.  For a corporate account, the corporate name is used for this attribute. Even if supported by the ASPSP, the provision of this field might depend on the fact whether an explicit consent to this specific additional account information has been given by the PSU. | [optional] 
**name** | **string** | Name of the account, as assigned by the ASPSP,  in agreement with the account owner in order to provide an additional means of identification of the account. | [optional] 
**display_name** | **string** | Name of the account as defined by the PSU within online channels. | [optional] 
**product** | **string** | Product Name of the Bank for this account, proprietary definition. | [optional] 
**status** | [**\BankIO\Sdk\Model\AccountStatus**](AccountStatus.md) |  | [optional] 
**usage** | **string** | Specifies the usage of the account:   * PRIV: private personal account   * ORGA: professional account | [optional] 
**details** | **string** | Specifications that might be provided by the ASPSP:   - characteristics of the account   - characteristics of the relevant card | [optional] 
**credit_limit** | [**\BankIO\Sdk\Model\Amount**](Amount.md) |  | [optional] 
**balances** | [**\BankIO\Sdk\Model\Balance[]**](Balance.md) | A list of balances regarding this account, e.g. the current balance, the last booked balance. The list might be restricted to the current balance. | [optional] 
**_links** | [**\BankIO\Sdk\Model\LinksAccountDetails**](LinksAccountDetails.md) |  | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


