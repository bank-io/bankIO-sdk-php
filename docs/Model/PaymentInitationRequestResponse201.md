# # PaymentInitationRequestResponse201

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**transaction_status** | [**\BankIO\Sdk\Model\TransactionStatus**](TransactionStatus.md) |  | 
**payment_id** | **string** | Resource identification of the generated payment initiation resource. | 
**transaction_fees** | [**\BankIO\Sdk\Model\Amount**](Amount.md) |  | [optional] 
**currency_conversion_fee** | [**\BankIO\Sdk\Model\Amount**](Amount.md) |  | [optional] 
**estimated_total_amount** | [**\BankIO\Sdk\Model\Amount**](Amount.md) |  | [optional] 
**estimated_interbank_settlement_amount** | [**\BankIO\Sdk\Model\Amount**](Amount.md) |  | [optional] 
**transaction_fee_indicator** | **bool** | If equals &#39;true&#39;, the transaction will involve specific transaction cost as shown by the ASPSP in their public price list or as agreed between ASPSP and PSU. If equals &#39;false&#39;, the transaction will not involve additional specific transaction costs to the PSU unless the fee amount is given specifically in the data elements transactionFees and/or currencyConversionFees. If this data element is not used, there is no information about transaction fees unless the fee amount is given explicitly in the data element transactionFees and/or currencyConversionFees. | [optional] 
**sca_methods** | [**\BankIO\Sdk\Model\AuthenticationObject[]**](AuthenticationObject.md) | This data element might be contained, if SCA is required and if the PSU has a choice between different authentication methods.  Depending on the risk management of the ASPSP this choice might be offered before or after the PSU has been identified with the first relevant factor, or if an access token is transported.  If this data element is contained, then there is also a hyperlink of type &#39;startAuthorisationWithAuthenticationMethodSelection&#39; contained in the response body.  These methods shall be presented towards the PSU for selection by the TPP. | [optional] 
**chosen_sca_method** | [**\BankIO\Sdk\Model\AuthenticationObject**](AuthenticationObject.md) |  | [optional] 
**challenge_data** | [**\BankIO\Sdk\Model\ChallengeData**](ChallengeData.md) |  | [optional] 
**_links** | [**\BankIO\Sdk\Model\LinksPaymentInitiation**](LinksPaymentInitiation.md) |  | 
**psu_message** | **string** | Text to be displayed to the PSU. | [optional] 
**tpp_messages** | [**\BankIO\Sdk\Model\TppMessage2XX[]**](TppMessage2XX.md) |  | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


