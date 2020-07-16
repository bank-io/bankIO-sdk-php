# # SelectPsuAuthenticationMethodResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**transaction_fees** | [**\BankIO\Sdk\Model\Amount**](Amount.md) |  | [optional] 
**currency_conversion_fees** | [**\BankIO\Sdk\Model\Amount**](Amount.md) |  | [optional] 
**estimated_total_amount** | [**\BankIO\Sdk\Model\Amount**](Amount.md) |  | [optional] 
**estimated_interbank_settlement_amount** | [**\BankIO\Sdk\Model\Amount**](Amount.md) |  | [optional] 
**chosen_sca_method** | [**\BankIO\Sdk\Model\AuthenticationObject**](AuthenticationObject.md) |  | [optional] 
**challenge_data** | [**\BankIO\Sdk\Model\ChallengeData**](ChallengeData.md) |  | [optional] 
**_links** | [**\BankIO\Sdk\Model\LinksSelectPsuAuthenticationMethod**](LinksSelectPsuAuthenticationMethod.md) |  | [optional] 
**sca_status** | [**\BankIO\Sdk\Model\ScaStatus**](ScaStatus.md) |  | 
**psu_message** | **string** | Text to be displayed to the PSU. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


