<?php 
require_once("../includes/dbsmain.inc.php");
@extract($_REQUEST);

if($type=="reg_start"){

if(!empty($join_for) && !empty($join_mobile) && !empty($join_email) && !empty($join_pass) ){

/////////////  FOR ADD ////////////////
if($action=="add"){
$sql="SELECT * FROM  tbl_registration WHERE reg_email='$join_email'";
$dataJoin=db_query($sql);
$dataCount=mysqli_num_rows($dataJoin);

if($dataCount){
echo "no";	
}else{
$sql="INSERT INTO tbl_registration SET 
reg_for='$join_for',
reg_mobile_no='$join_mobile',
reg_email='$join_email',
reg_pass='$join_pass',
reg_add_date='$currDate'
";	

$res=db_query($sql);
$inserID=mysqli_insert_id($GLOBALS['dbcon']);

if($inserID){
$_SESSION['regIDadmin']=$inserID;	
echo "$inserID";	
}else{
echo "0";	
}

}	

}





if($action=="edit"){

$sql="SELECT * FROM  tbl_registration WHERE reg_email='$join_email'";
$dataJoin=db_query($sql);
$dataCount=mysqli_num_rows($dataJoin);

echo $sql="Update tbl_registration SET 
reg_for='$join_for',
reg_mobile_no='$join_mobile',
reg_email='$join_email',
reg_pass='$join_pass'
WHERE reg_id='$regIDadmin'
";	

$res=db_query($sql);

}

	
}else{
echo "0";	
}


}

//////////////////////////////// BASIC DETAIL UPDATE ///////////////////////////////////
if($type=="basic"){
$join_height=mysqli_real_escape_string($GLOBALS['dbcon'], $join_height);
$join_marital_status=mysqli_real_escape_string($GLOBALS['dbcon'], $join_marital_status);
$join_blood_group=mysqli_real_escape_string($GLOBALS['dbcon'], $join_blood_group);
$join_blood_group=addslashes($join_blood_group);

$sql="UPDATE tbl_registration SET 
reg_name='$join_name',
reg_gender='$join_gender',
reg_dob='$join_dob',
reg_age='$join_age',
reg_height='$join_height',
reg_marital_status='$join_marital_status',
reg_mother_tongue='$join_mother_tongue',
reg_is_any_disability='$join_is_any_disability',
reg_aadhar_number='$join_aadhar_number',
reg_profile_manage_by='$join_profile_manage_by',
reg_blood_group='$join_blood_group'
WHERE reg_id='$regIDadmin'
";	

$res=db_query($sql);
if($res){

echo "1";	
}else{
echo "0";	
}

}


//////////////////////////////// LOCATION DETAIL UPDATE ///////////////////////////////////
if($type=="location"){
$join_country_name=db_scalar("SELECT contName FROM tbl_country_master WHERE contId='$join_country'");
$join_state_name=db_scalar("SELECT state FROM tbl_state WHERE state_id='$join_state'");

$sql="UPDATE tbl_registration SET 
reg_country_name='$join_country_name',
reg_country_id='$join_country',
reg_state_name='$join_state_name',
reg_state_id='$join_state',
reg_city='$join_city'
WHERE reg_id='$regIDadmin'
";	

$res=db_query($sql);
if($res){
	
echo "1";	
}else{
echo "0";	
}

}


//////////////////////////////// FAMILY DETAIL UPDATE ///////////////////////////////////
if($type=="family"){
$join_country_name=db_scalar("SELECT contName FROM tbl_country_master WHERE contId='$join_country'");
$join_state_name=db_scalar("SELECT state FROM tbl_state WHERE state_id='$join_state'");
$join_siblings_marital_status=mysqli_real_escape_string($GLOBALS['dbcon'], $join_siblings_marital_status);


$sql="UPDATE tbl_registration SET 
reg_father_status='$join_father_status',
reg_mother_status='$join_mother_status',
reg_siblings='$join_siblings',
reg_siblings_marital_status='$join_siblings_marital_status',
reg_family_status='$join_family_status',
reg_family_type='$join_family_type',
reg_family_values='$join_family_values',
reg_annual_income='$join_annual_income',
reg_family_living_in='$join_family_living_in'
WHERE reg_id='$regIDadmin'
";	

$res=db_query($sql);
if($res){
	
echo "1";	
}else{
echo "0";	
}

}



//////////////////////////////// Education & Career UPDATE ///////////////////////////////////
if($type=="edu"){

$join_siblings_marital_status=mysqli_real_escape_string($GLOBALS['dbcon'], $join_siblings_marital_status);

$sql="UPDATE tbl_registration SET 
reg_highest_edu='$join_highest_edu',
reg_edu_detail='$join_edu_detail',
reg_occupation='$join_occupation',
reg_member_annual_income='$join_member_annual_income',
reg_organization_name='$join_organization_name',
reg_working_location='$join_working_location'
WHERE reg_id='$regIDadmin'
";	

$res=db_query($sql);
if($res){
	
echo "1";	
}else{
echo "0";	
}

}



//////////////////////////////// Religion UPDATE ///////////////////////////////////
if($type=="religion"){


$sql="UPDATE tbl_registration SET 
reg_religion='$join_religion',
reg_cast='$join_cast',
reg_sub_cast='$join_sub_cast',
reg_gotra='$join_gotra',
reg_namaz='$join_namaz',
reg_zakaat='$join_zakaat',
reg_fasting='$join_fasting'
WHERE reg_id='$regIDadmin'
";	

$res=db_query($sql);
if($res){
	
echo "1";	
}else{
echo "0";	
}

}


//////////////////////////////// Lifestyle And Habits UPDATE ///////////////////////////////////
if($type=="lifestyle"){


$sql="UPDATE tbl_registration SET 
reg_appearance='$join_appearance',
reg_living_status='$join_living_status',
reg_physical_status='$join_physical_status',
reg_eating_habits='$join_eating_habits',
reg_smoking_habits='$join_smoking_habits',
reg_drinking_habits='$join_drinking_habits'
WHERE reg_id='$regIDadmin'
";	

$res=db_query($sql);
if($res){
	
echo "1";	
}else{
echo "0";	
}

}



//////////////////////////////// LIKES UPDATE ///////////////////////////////////
if($type=="likes"){


$sql="UPDATE tbl_registration SET 
reg_hobbies='$join_hobbies',
reg_interests='$join_interests',
reg_favourite_music='$join_favourite_music',
reg_favourite_book='$join_favourite_book',
reg_dress_style='$join_dress_style',
reg_tv_shows='$join_tv_shows'
WHERE reg_id='$regIDadmin'
";	

$res=db_query($sql);
if($res){
	
echo "1";	
}else{
echo "0";	
}

}


//////////////////////////////// CONTACT UPDATE ///////////////////////////////////
if($type=="contact"){


$sql="UPDATE tbl_registration SET 
reg_member_mobile='$join_member_mobile',
reg_member_alt_mobile='$join_member_alt_mobile',
reg_member_email='$join_member_email',
reg_member_call_time='$join_member_call_time'
WHERE reg_id='$regIDadmin'
";	

$res=db_query($sql);
if($res){
	
echo "1";	
}else{
echo "0";	
}

}


//////////////////////////////// ABOUT MYSELF UPDATE ///////////////////////////////////
if($type=="myself"){


$sql="UPDATE tbl_registration SET 
reg_mem_myself='$join_mem_myself'
WHERE reg_id='$regIDadmin'
";	

$res=db_query($sql);
if($res){
	
echo "1";	
}else{
echo "0";	
}

}

////////////////////////////  UPLOAD PHOTO //////////////////////////////////////
 function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }
 
 
if($type=="photoUpload"){

$image =$_FILES['join_profile_photo']['name'];
$regIDadmin=$_REQUEST['regIDadmin'];
$imgToDel=db_scalar("SELECT reg_profile_photo FROM tbl_registration WHERE  reg_id='$regIDadmin'");

if($image){

@unlink("../upload_images/$imgToDel");

	
	$uploadedfile = $_FILES['join_profile_photo']['tmp_name']; 
    $filename = stripslashes($_FILES['join_profile_photo']['name']); 	
	$extension = getExtension($filename);
	$extension = strtolower($extension);		
	$imgNAME = substr(md5($category_url.time().rand(1,10)),0,14).".".$extension;	
	move_uploaded_file($_FILES['join_profile_photo']['tmp_name'],"../upload_images/$imgNAME");
    db_query("UPDATE tbl_registration SET reg_profile_photo='$imgNAME' WHERE  reg_id='$regIDadmin'");
	
	echo 1;
}else{
echo 0;	
}
}

////////////////////////////////  UPDATE VERIFIED MOBILE /////////////////////////////////////

if($type=="verified_mobile"){

$sql="UPDATE tbl_registration SET 
reg_member_verified_mobile='$join_member_verified_mobile'
WHERE reg_id='$regIDadmin'
";	

$res=db_query($sql);
if($res){
	
echo "1";	
}else{
echo "0";	
}

}

//////////////////////////////// PREFRENCE BASIC DETAIL UPDATE ///////////////////////////////////
if($type=="preference_basic"){
$join_preference_height=mysqli_real_escape_string($GLOBALS['dbcon'], $join_preference_height);
$join_preference_marital_status=mysqli_real_escape_string($GLOBALS['dbcon'], $join_preference_marital_status);

$sql="UPDATE tbl_registration SET 
reg_preference_marital_status='$join_preference_marital_status',
reg_preference_age='$join_preference_age',
reg_preference_height='$join_preference_height',
reg_preference_mother_tongue='$join_preference_mother_tongue',
reg_preference_religion='$join_preference_religion',
reg_preference_gotra='$join_preference_gotra',
reg_preference_namaz='$join_preference_namaz',
reg_preference_zakaat='$join_preference_zakaat',
reg_preference_fasting='$join_preference_fasting',
reg_preference_cast='$join_preference_cast',
reg_preference_sub_cast='$join_preference_sub_cast'
WHERE reg_id='$regIDadmin'
";	

$res=db_query($sql);
if($res){
	
echo "1";	
}else{
echo "0";	
}

}


//////////////////////////////// PREFRENCE BASIC DETAIL UPDATE ///////////////////////////////////
if($type=="preference_location"){

$join_preference_country_name=db_scalar("SELECT contName FROM tbl_country_master WHERE contId='$join_preference_country_id'");
$join_preference_state_name=db_scalar("SELECT state FROM tbl_state WHERE state_id='$join_preference_state_id'");

$sql="UPDATE tbl_registration SET 
reg_preference_country_id='$join_preference_country_id',
reg_preference_country_name='$join_preference_country_name',
reg_preference_state_id='$join_preference_state_id',
reg_preference_state_name='$join_preference_state_name',
reg_preference_city='$join_preference_city'
WHERE reg_id='$regIDadmin'
";	

$res=db_query($sql);
if($res){
	
echo "1";	
}else{
echo "0";	
}

}


//////////////////////////////// Professional DETAIL UPDATE ///////////////////////////////////
if($type=="preference_professional"){


$sql="UPDATE tbl_registration SET 
reg_preference_highest_edu='$join_preference_highest_edu',
reg_preference_occupation='$join_preference_occupation',
reg_preference_member_annual_income='$join_preference_member_annual_income',
reg_preference_working_location='$join_preference_working_location'
WHERE reg_id='$regIDadmin'
";	

$res=db_query($sql);
if($res){
	
echo "1";	
}else{
echo "0";	
}

}




//////////////////////////////// Lifestyle DETAIL UPDATE ///////////////////////////////////
if($type=="preference_lifestyle"){

$sql="UPDATE tbl_registration SET 
reg_preference_appearance='$join_preference_appearance',
reg_preference_living_status='$join_preference_living_status',
reg_preference_physical_status='$join_preference_physical_status'
WHERE reg_id='$regIDadmin'
";	

$res=db_query($sql);
if($res){
	
echo "1";	
}else{
echo "0";	
}

}



//////////////////////////////// HABITS DETAIL UPDATE ///////////////////////////////////
if($type=="preference_habits"){

$sql="UPDATE tbl_registration SET 
reg_preference_eating_habits='$join_preference_eating_habits',
reg_preference_smoking_habits='$join_preference_smoking_habits',
reg_preference_drinking_habits='$join_preference_drinking_habits'
WHERE reg_id='$regIDadmin'
";	

$res=db_query($sql);
if($res){
	
echo "1";	
}else{
echo "0";	
}

}



//////////////////////////////// HABITS DETAIL UPDATE ///////////////////////////////////
if($type=="preference_myself"){

$sql="UPDATE tbl_registration SET reg_preference_mem_myself='$join_preference_mem_myself' WHERE reg_id='$regIDadmin'";	

$res=db_query($sql);
if($res){
	
echo "1";	
}else{
echo "0";	
}

}
?>