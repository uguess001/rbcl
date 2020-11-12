<?php

if (!defined("BASEPATH"))
    exit("No direct script access allowed");
/*
User Information Details
*/

function GetSelectUserType($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'usertype';
	$value_member = 'UserTypeId';
	$display_member = 'Description';
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	
}

function GetSelectInstitution($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'institutions';
	$value_member = 'InstitutionID';
	$display_member = 'Description';
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	
}

function GetSelectDistrict($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'district';
	$value_member = 'id';
	$display_member = 'district_name';
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	
}



function GetSelectHerdType($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'herdtype';
	$value_member = 'HerdTypeId';
	$display_member = 'Description';
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	
}

function GetSelectConceivedProducedType($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'conceivedproducedtype';
	$value_member = 'ConceivedProducedTypeId';
	$display_member = 'Description';
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	
}


function OldGetSelectEntrepreneur($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'dairyentrepreneur';
	$value_member = 'DairyEntrepreneurID';
	$display_member = 'Title';
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	
}





function GetSelectLiveStockName($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'livestock';
	$value_member = 'LiveStockID';
	$display_member = 'CommercialName';
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	
}

function GetSelectNurseryFooder($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'nurseryfooder';
	$value_member = 'NurseryfooderId';
	$display_member = 'CommercialName';
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	
}

function GetSelectTransactionType($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'transactiontype';
	$value_member = 'TransactionId';
	$display_member = 'Description';
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	
}

function GetSelectVaccinationType($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'vaccinationtype';
	$value_member = 'VaccinationTypeId';
	$display_member = 'Description';
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	
}
function GetSelectOrganizationName($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'organizationregistration';
	$value_member = 'OrganizationRegistrationID';
	$display_member = 'GroupCoopCompanyAgroVetName';
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	
}

function GetOrganizationName($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'organizationregistration';
	$value_member = 'OrganizationRegistrationID';
	$display_member = 'GroupCoopCompanyAgroVetName';
	return GetDescription($loop_data,$select_name,$selected_data,$display_member,$value_member);	
}



function GetSelectSubProjects($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'sectiontwotwopointone';
	$value_member = 'ExperienceOfTheGrantGrantRecipientsId';
	$display_member = 'NameOfTheSubProject';

/*	$table_name = 'organizationregistration';
	$value_member = 'OrganizationRegistrationID';
	$display_member = 'GroupCoopCompanyAgroVetName';*/
		
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	
	//GetSelectOrganizationName($loop_data,$select_name,$selected_data);
}
function GetSelectSubregistration($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'Morganizationregistration';
	$value_member = 'OrganizationRegistrationID';
	$display_member = 'RegistrationNo';
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	
}


function GetSelectOtherServicesAndTreatment($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'otherservicesandtreatment';
	$value_member = 'OtherServicesAndTreatmentId';
	$display_member = 'Description';
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	
}

function GetSelectVaccinationTypeForGoat($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'vaccinationtype';
	$value_member = 'VaccinationTypeId';
	$display_member = 'Description';
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	
}


function GetSelecttypeofparticpants($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'typeofparticpants';
	$value_member = 'TypeOfParticpantsId';
	$display_member = 'Description';
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	
}
function GetSelectFacilitator($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'typeoffacilitator';
	$value_member = 'TypeOfFacilitatorID';
	$display_member = 'Description';
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	
}


//Calling Way: GetSubProjectDescription($SubProject,null,$value->SubprojectId)
function GetSubProjectDescription($loop_data=null,$select_name=null,$selected_data=null) {
				
		$table_name = 'sectiontwotwopointone';
		$value_member = 'ExperienceOfTheGrantGrantRecipientsId';
		$display_member = 'NameOfTheSubProject';
		return GetDescription($loop_data,$select_name=null,$selected_data,$display_member,$value_member);
}

function GetSubProjectregistration($loop_data=null,$select_name=null,$selected_data=null) {

		$table_name = 'Morganizationregistration';
		$value_member = 'OrganizationRegistrationID';
		$display_member = 'RegistrationNo';
		return GetDescription($loop_data,$select_name=null,$selected_data,$display_member,$value_member);
}
function GetstatusDescription($loop_data=null,$select_name=null,$selected_data=null) {
				
		$table_name = 'status';
		$value_member = 'StatusID';
		$display_member = 'Description';
		return GetDescription($loop_data,$select_name=null,$selected_data,$display_member,$value_member);
}
function GetDistrictDescription($loop_data=null,$select_name=null,$selected_data=null) {
				
		$table_name = 'district';
		$value_member = 'id';
		$display_member = 'district_name';
		return GetDescription($loop_data,$select_name=null,$selected_data,$display_member,$value_member);
}
function GettypeofparticpantsDescription($loop_data=null,$select_name=null,$selected_data=null) {
				
		$table_name = 'typeofparticpants';
		$value_member = 'TypeOfParticpantsId';
		$display_member = 'Description';
		return GetDescription($loop_data,$select_name=null,$selected_data,$display_member,$value_member);
}

function GetSelectOrganizationTypeOptionAny($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'organizationtype';
	$value_member = 'OrganizationTypeID';
	$display_member = 'Description';
	return GetSelectOpitonAny($loop_data,$select_name,$selected_data,$display_member,$value_member);	
}

function GetSelectOpitonAny( $loop_data,$select_name=null,$selected_data=null,$display_member,$value_member) {
   	$div= '<select  class = "form-control" name="'.$select_name.'" id="'.$select_name.'" ><option value ="0">---Select Any---</option>';

	$option = null;
	if(count($loop_data)>0) {
	$counter = 0;

	foreach($loop_data as $l) {
		
		$option.= '<option value ="'.$loop_data[$counter++]->$value_member.'" ';
		$option.= (($selected_data) && ($l->$value_member==$selected_data)) ? "selected>" : ">";
		$option.= $l->$display_member.'</option>';
	}
}
$div_close= '</select>';
return $div.$option.$div_close;
}










function GetSelectOrganizationType($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'organizationtype';
	$value_member = 'OrganizationTypeID';
	$display_member = 'Description';
	return GetSelectOpitonAny($loop_data,$select_name,$selected_data,$display_member,$value_member);	
}

function GetSelectUser($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'user';
	$value_member = 'UserId';
	$display_member = 'Status';
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	
}



function GetSelectYesNO($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'trainingparticipantsentryformyesno';
	$value_member = 'TrainingParticipantsEntryFormYesNoId';
	$display_member = 'Description';
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	
}
function GetSelectPosition($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'position';
	$value_member = 'PositionID';
	$display_member = 'Description';
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	
}
function GetSelectTrainingType($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'trainingtype';
	$value_member = 'TrainingTypeId';
	$display_member = 'Description';
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	
}
function GetSelectTypeofTraining($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'typeoftraining';
	$value_member = 'TypeOfTrainingId';
	$display_member = 'Description';
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	
}
function GetSelectTrainingSubType($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'trainingsubtype';
	$value_member = 'TrainingSubTypeId';
	$display_member = 'Description';
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	
}
function GetSelectEthnicity($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'ethnicity';
	$value_member = 'EthnicityId';
	$display_member = 'Description';
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	      
}
function GetSelectmstvaluechain($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'mstvaluechain';
	$value_member = 'ValueChainID';
	$display_member = 'Description';
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	      
}
function GetSelectCategory($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'categoryofapplicant';
	$value_member = 'CategoryOfApplicantId';
	$display_member = 'Description';
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	      
}
function GetSelectcomponent($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'subprojectcomponent';
	$value_member = 'SubProjectComponentId';
	$display_member = 'Description';
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	      
}
	

function GetSelectWindow($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'window';
		$value_member = 'WindowId';
	$display_member = 'Description';
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	      
}

function GetSelectGender($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'gender';
	$value_member = 'GenderID';
	$display_member = 'Description';
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	
}

function GetSelectStatus($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'status';
	$value_member = 'StatusID';
	$display_member = 'Description';
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	
}
function GetSelectCrop($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'crop';
	$value_member = 'CropId';
	$display_member = 'Description';
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	
}

function GetSelectDemonstartionPlot($loop_data=null,$select_name=null,$selected_data=null) {
	$table_name = 'typeofdemonstartionplot';
	$value_member = 'TypeOfDemonstartionPlotId';
	$display_member = 'Description';
	return GetSelect($loop_data,$select_name,$selected_data,$display_member,$value_member);	
}
function GetGenderDescription($loop_data=null,$select_name=null,$selected_data=null) {
				
		$table_name = 'gender';
		$value_member = 'GenderID';
		$display_member = 'Description';
		return GetDescription($loop_data,$select_name=null,$selected_data,$display_member,$value_member);
}
function GetYesNoDescription($loop_data=null,$select_name=null,$selected_data=null) {
				
		$table_name = 'trainingparticipantsentryformyesno';
		$value_member = 'TrainingParticipantsEntryFormYesNoId';
		$display_member = 'Description';
		return GetDescription($loop_data,$select_name=null,$selected_data,$display_member,$value_member);
}

function GetTrainingTypeDescription($loop_data=null,$select_name=null,$selected_data=null) {
				
		$table_name = 'trainingtype';
		$value_member = 'TrainingTypeId';
		$display_member = 'Description';
		return GetDescription($loop_data,$select_name=null,$selected_data,$display_member,$value_member);
}
function GetFacilitatorDescription($loop_data=null,$select_name=null,$selected_data=null) {
				
		$table_name = 'typeoffacilitator';
		$value_member = 'TypeOfFacilitatorID';
		$display_member = 'Description';
		return GetDescription($loop_data,$select_name=null,$selected_data,$display_member,$value_member);
}
function GetDemonstartionPlotDescription($loop_data=null,$select_name=null,$selected_data=null) {
				
		$table_name = 'typeofdemonstartionplot';
		$value_member = 'TypeOfDemonstartionPlotId';
		$display_member = 'Description';
		return GetDescription($loop_data,$select_name=null,$selected_data,$display_member,$value_member);
}


function GetTypeOfTrainingDescription($loop_data=null,$select_name=null,$selected_data=null) {
				
		$table_name = 'typeoftraining';
		$value_member = 'TypeOfTrainingId';
		$display_member = 'Description';
		return GetDescription($loop_data,$select_name=null,$selected_data,$display_member,$value_member);
}

function GetTrainingSubTypeDescription($loop_data=null,$select_name=null,$selected_data=null) {
				
		$table_name = 'trainingsubtype';
		$value_member = 'TrainingSubTypeId';
		$display_member = 'Description';
		return GetDescription($loop_data,$select_name=null,$selected_data,$display_member,$value_member);
}
function GetEthnicityDescription($loop_data=null,$select_name=null,$selected_data=null) {
				
		$table_name = 'ethnicity';
		$value_member = 'EthnicityId';
		$display_member = 'Description';
		return GetDescription($loop_data,$select_name=null,$selected_data,$display_member,$value_member);
}
function GetCatgoryDescription($loop_data=null,$select_name=null,$selected_data=null) {
				
		$table_name = 'categoryofapplicant';
		$value_member = 'CategoryOfApplicantId';
		$display_member = 'Description';
		return GetDescription($loop_data,$select_name=null,$selected_data,$display_member,$value_member);
}
function GetComponentDescription($loop_data=null,$select_name=null,$selected_data=null) {
				
		$table_name = 'subprojectcomponent';
		$value_member = 'SubProjectComponentId';
		$display_member = 'Description';
		return GetDescription($loop_data,$select_name=null,$selected_data,$display_member,$value_member);
}
function GetWindowDescription($loop_data=null,$select_name=null,$selected_data=null) {
				
		$table_name = 'window';
		$value_member = 'WindowId';
		$display_member = 'Description';
		return GetDescription($loop_data,$select_name=null,$selected_data,$display_member,$value_member);
}
// function GetYesNoDescription($loop_data=null,$select_name=null,$selected_data=null) {
				
// 		$table_name = 'trainingparticipantsentryformyesno';
// 		$value_member = 'TrainingParticipantsEntryFormYesNoId';
// 		$display_member = 'Description';
// 		return GetDescription($loop_data,$select_name=null,$selected_data,$display_member,$value_member);
// }
function GetCropDescription($loop_data=null,$select_name=null,$selected_data=null) {
				
		$table_name = 'crop';
		$value_member = 'CropId';
		$display_member = 'Description';
		return GetDescription($loop_data,$select_name=null,$selected_data,$display_member,$value_member);
}
function GetPositionDescription($loop_data=null,$select_name=null,$selected_data=null) {
				
		$table_name = 'position';
		$value_member = 'PositionID';
		$display_member = 'Description';
		return GetDescription($loop_data,$select_name=null,$selected_data,$display_member,$value_member);
}
function GetOrganizationTypeDescription($loop_data=null,$select_name=null,$selected_data=null) {
				
		$table_name = 'organizationtype';
		$value_member = 'OrganizationTypeID';
		$display_member = 'Description';
		return GetDescription($loop_data,$select_name=null,$selected_data,$display_member,$value_member);
}
function GetUsertypeDescription($loop_data=null,$select_name=null,$selected_data=null) {
				
		$table_name = 'usertype';
		$value_member = 'UserTypeId';
		$display_member = 'Description';
		return GetDescription($loop_data,$select_name=null,$selected_data,$display_member,$value_member);
}


function GetUserDescription($loop_data=null,$select_name=null,$selected_data=null) {
				
		$table_name = 'user';
		$value_member = 'UserId';
		$display_member = 'UserName';
		return GetDescription($loop_data,$select_name=null,$selected_data,$display_member,$value_member);
}

function GetDescription($loop_data,$select_name=null,$selected_data=null,$display_member,$value_member) {
	$string = "";
	if(count($loop_data)>0) {
	$counter = 0;
		foreach($loop_data as $l) {
			if(($selected_data) && ($l->$value_member==$selected_data)) {
				$string = $l->$display_member;
				break;
			}
			$counter++;
		}
	}
	return $string;
}


function GetSelectdstatus( $loop_data,$select_name=null,$selected_data=null,$display_member,$value_member) {
   	$div= '<select  class = "form-control" name="'.$select_name.'" id="'.$select_name.'" >';
	$option = null;
	if(count($loop_data)>0) {
	$counter = 0;

	foreach($loop_data as $l) {
		$option.= '<option value ="'.$loop_data[$counter++]->$value_member.'" ';
		$option.= (($selected_data) && ($l->$value_member==$selected_data)) ? "selected>" : ">";
		$option.= $l->$display_member.'</option>';
	}
}
$div_close= '</select>';
return $div.$option.$div_close;
}




function GetSelect( $loop_data,$select_name=null,$selected_data=null,$display_member,$value_member) {
   	$div= '<select  class = "form-control" name="'.$select_name.'" id="'.$select_name.'" >';
	$option = null;
	if(count($loop_data)>0) {
	$counter = 0;

	foreach($loop_data as $l) {
		$option.= '<option value ="'.$loop_data[$counter++]->$value_member.'" ';
		$option.= (($selected_data) && ($l->$value_member==$selected_data)) ? "selected>" : ">";
		$option.= $l->$display_member.'</option>';
	}
}
$div_close= '</select>';
return $div.$option.$div_close;
}
