# # CardTransaction

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**card_transaction_id** | **string** | Unique end to end identity. | [optional] 
**terminal_id** | **string** | Identification of the Terminal, where the card has been used. | [optional] 
**transaction_date** | [**\DateTime**](\DateTime.md) | Date of the actual card transaction. | [optional] 
**acceptor_transaction_date_time** | [**\DateTime**](\DateTime.md) | Timestamp of the actual card transaction within the acceptance system | [optional] 
**booking_date** | [**\DateTime**](\DateTime.md) | The date when an entry is posted to an account on the ASPSPs books. | [optional] 
**transaction_amount** | [**\BankIO\Sdk\Model\Amount**](Amount.md) |  | 
**currency_exchange** | [**\BankIO\Sdk\Model\ReportExchangeRate[]**](ReportExchangeRate.md) | Array of exchange rates. | [optional] 
**original_amount** | [**\BankIO\Sdk\Model\Amount**](Amount.md) |  | [optional] 
**markup_fee** | [**\BankIO\Sdk\Model\Amount**](Amount.md) |  | [optional] 
**markup_fee_percentage** | **string** |  | [optional] 
**card_acceptor_id** | **string** |  | [optional] 
**card_acceptor_address** | [**\BankIO\Sdk\Model\Address**](Address.md) |  | [optional] 
**card_acceptor_phone** | **string** | Merchant phone number It consists of a \&quot;+\&quot; followed by the country code (from 1 to 3 characters) then a \&quot;-\&quot; and finally, any combination of numbers, \&quot;(\&quot;, \&quot;)\&quot;, \&quot;+\&quot; and \&quot;-\&quot; (up to 30 characters). pattern according to ISO20022 \\+[0-9]{1,3}-[0-9()+\\-]{1,30} | [optional] 
**merchant_category_code** | **string** | Merchant category code. | [optional] 
**masked_pan** | **string** | Masked Primary Account Number. | [optional] 
**transaction_details** | **string** |  | [optional] 
**invoiced** | **bool** |  | [optional] 
**proprietary_bank_transaction_code** | **string** | Proprietary bank transaction code as used within a community or within an ASPSP e.g.  for MT94x based transaction reports. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


