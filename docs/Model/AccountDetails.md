# # AccountDetails

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**resource_id** | **string** | This shall be filled, if addressable resource are created by the ASPSP on the /accounts or /card-accounts endpoint. | [optional] 
**iban** | **string** | IBAN of an account. | [optional] 
**bban** | **string** | Basic Bank Account Number (BBAN) Identifier.  This data element can be used in the body of the consent request.   Message for retrieving account access consent from this account. This   data elements is used for payment accounts which have no IBAN.   ISO20022: Basic Bank Account Number (BBAN).       Identifier used nationally by financial institutions, i.e., in individual countries,    generally as part of a National Account Numbering Scheme(s),    which uniquely identifies the account of a customer. | [optional] 
**msisdn** | **string** | Mobile phone number. | [optional] 
**currency** | **string** | ISO 4217 Alpha 3 currency code. | 
**name** | **string** | Name of the account, as assigned by the ASPSP, in agreement with the account owner in order to provide an additional means of identification of the account. | [optional] 
**display_name** | **string** | Name of the account as defined by the PSU within online channels. | [optional] 
**product** | **string** | Product name of the bank for this account, proprietary definition. | [optional] 
**cash_account_type** | **string** | ExternalCashAccountType1Code from ISO 20022. | [optional] 
**status** | [**\BankIO\Sdk\Model\AccountStatus**](AccountStatus.md) |  | [optional] 
**bic** | **string** | BICFI | [optional] 
**linked_accounts** | **string** | Case of a set of pending card transactions, the APSP will provide the relevant cash account the card is set up on. | [optional] 
**usage** | **string** | Specifies the usage of the account:   * PRIV: private personal account   * ORGA: professional account | [optional] 
**details** | **string** | Specifications that might be provided by the ASPSP:   - characteristics of the account   - characteristics of the relevant card | [optional] 
**balances** | [**\BankIO\Sdk\Model\Balance[]**](Balance.md) | A list of balances regarding this account, e.g. the current balance, the last booked balance. The list might be restricted to the current balance. | [optional] 
**_links** | [**\BankIO\Sdk\Model\LinksAccountDetails**](LinksAccountDetails.md) |  | [optional] 
**owner_name** | **string** | Name of the legal account owner.  If there is more than one owner, then e.g. two names might be noted here.  For a corporate account, the corporate name is used for this attribute. Even if supported by the ASPSP, the provision of this field might depend on the fact whether an explicit consent to this specific additional account information has been given by the PSU. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


