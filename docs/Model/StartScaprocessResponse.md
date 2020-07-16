# # StartScaprocessResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**sca_status** | [**\BankIO\Sdk\Model\ScaStatus**](ScaStatus.md) |  | 
**authorisation_id** | **string** | Resource identification of the related SCA. | 
**sca_methods** | [**\BankIO\Sdk\Model\AuthenticationObject[]**](AuthenticationObject.md) | This data element might be contained, if SCA is required and if the PSU has a choice between different authentication methods.  Depending on the risk management of the ASPSP this choice might be offered before or after the PSU has been identified with the first relevant factor, or if an access token is transported.  If this data element is contained, then there is also a hyperlink of type &#39;startAuthorisationWithAuthenticationMethodSelection&#39; contained in the response body.  These methods shall be presented towards the PSU for selection by the TPP. | [optional] 
**chosen_sca_method** | [**\BankIO\Sdk\Model\AuthenticationObject**](AuthenticationObject.md) |  | [optional] 
**challenge_data** | [**\BankIO\Sdk\Model\ChallengeData**](ChallengeData.md) |  | [optional] 
**_links** | [**\BankIO\Sdk\Model\LinksStartScaProcess**](LinksStartScaProcess.md) |  | 
**psu_message** | **string** | Text to be displayed to the PSU. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


