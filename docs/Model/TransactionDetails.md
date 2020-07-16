# # TransactionDetails

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**transaction_id** | **string** | This identification is given by the attribute transactionId of the corresponding entry of a transaction list. | [optional] 
**entry_reference** | **string** | Is the identification of the transaction as used e.g. for reference for deltafunction on application level. The same identification as for example used within camt.05x messages. | [optional] 
**end_to_end_id** | **string** | Unique end to end identity. | [optional] 
**mandate_id** | **string** | Identification of Mandates, e.g. a SEPA Mandate ID. | [optional] 
**check_id** | **string** | Identification of a Cheque. | [optional] 
**creditor_id** | **string** | Identification of Creditors, e.g. a SEPA Creditor ID. | [optional] 
**booking_date** | [**\DateTime**](\DateTime.md) | The date when an entry is posted to an account on the ASPSPs books. | [optional] 
**value_date** | [**\DateTime**](\DateTime.md) | The Date at which assets become available to the account owner in case of a credit. | [optional] 
**transaction_amount** | [**\BankIO\Sdk\Model\Amount**](Amount.md) |  | 
**currency_exchange** | [**\BankIO\Sdk\Model\ReportExchangeRate[]**](ReportExchangeRate.md) | Array of exchange rates. | [optional] 
**creditor_name** | **string** | Creditor name. | [optional] 
**creditor_account** | [**\BankIO\Sdk\Model\AccountReference**](AccountReference.md) |  | [optional] 
**creditor_agent** | **string** | BICFI | [optional] 
**ultimate_creditor** | **string** | Ultimate creditor. | [optional] 
**debtor_name** | **string** | Debtor name. | [optional] 
**debtor_account** | [**\BankIO\Sdk\Model\AccountReference**](AccountReference.md) |  | [optional] 
**debtor_agent** | **string** | BICFI | [optional] 
**ultimate_debtor** | **string** | Ultimate debtor. | [optional] 
**remittance_information_unstructured** | **string** | Unstructured remittance information. | [optional] 
**remittance_information_unstructured_array** | **string[]** | Array of unstructured remittance information. | [optional] 
**remittance_information_structured** | [**\BankIO\Sdk\Model\RemittanceInformationStructured**](RemittanceInformationStructured.md) |  | [optional] 
**remittance_information_structured_array** | [**\BankIO\Sdk\Model\RemittanceInformationStructured[]**](RemittanceInformationStructured.md) | Array of structured remittance information. | [optional] 
**additional_information** | **string** | Might be used by the ASPSP to transport additional transaction related information to the PSU | [optional] 
**additional_information_structured** | [**\BankIO\Sdk\Model\AdditionalInformationStructured**](AdditionalInformationStructured.md) |  | [optional] 
**purpose_code** | [**\BankIO\Sdk\Model\PurposeCode**](PurposeCode.md) |  | [optional] 
**bank_transaction_code** | **string** | Bank transaction code as used by the ASPSP and using the sub elements of this structured code defined by ISO 20022.   This code type is concatenating the three ISO20022 Codes    * Domain Code,    * Family Code, and    * SubFamiliy Code  by hyphens, resulting in &#39;DomainCode&#39;-&#39;FamilyCode&#39;-&#39;SubFamilyCode&#39;. For standing order reports the following codes are applicable:   * \&quot;PMNT-ICDT-STDO\&quot; for credit transfers,   * \&quot;PMNT-IRCT-STDO\&quot;  for instant credit transfers   * \&quot;PMNT-ICDT-XBST\&quot; for cross-border credit transfers   * \&quot;PMNT-IRCT-XBST\&quot; for cross-border real time credit transfers and   * \&quot;PMNT-MCOP-OTHR\&quot; for specific standing orders which have a dynamical amount to move left funds e.g. on month end to a saving account | [optional] 
**proprietary_bank_transaction_code** | **string** | Proprietary bank transaction code as used within a community or within an ASPSP e.g.  for MT94x based transaction reports. | [optional] 
**balance_after_transaction** | [**\BankIO\Sdk\Model\Balance**](Balance.md) |  | [optional] 
**_links** | [**\BankIO\Sdk\Model\LinksTransactionDetails**](LinksTransactionDetails.md) |  | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


