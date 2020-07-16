# # AccountReference

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**iban** | **string** | IBAN of an account. | [optional] 
**bban** | **string** | Basic Bank Account Number (BBAN) Identifier.  This data element can be used in the body of the consent request.   Message for retrieving account access consent from this account. This   data elements is used for payment accounts which have no IBAN.   ISO20022: Basic Bank Account Number (BBAN).       Identifier used nationally by financial institutions, i.e., in individual countries,    generally as part of a National Account Numbering Scheme(s),    which uniquely identifies the account of a customer. | [optional] 
**pan** | **string** | Primary Account Number according to ISO/IEC 7812. | [optional] 
**masked_pan** | **string** | Masked Primary Account Number. | [optional] 
**msisdn** | **string** | Mobile phone number. | [optional] 
**currency** | **string** | ISO 4217 Alpha 3 currency code. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


