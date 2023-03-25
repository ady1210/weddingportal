<?php require_once("header.php");?>
<?php require_once("left-nav.php");?>
<?php
$memID=$_REQUEST['id'];



if(is_post_back()){
//*************** UPDATE EXISTING CATEGORY START ************************//

if($_REQUEST['id']!='0') {

////////////****************** IMAGE RESIZING END HERE *****************************//

$sql = "update tbl_membership set        
				mem_name='$mem_name',
				mem_tag_line='$mem_tag_line',
				mem_status='$mem_status'				
				where mem_id = '$memID' ";

db_query($sql);


$_SESSION["msg"]="Membership Updated Successfully !";
header("Location:addedit-membership.php?id=$_REQUEST[id]");
exit;
//*************** UPDATE EXISTING CATEGORY END ************************//
}else{

////////////****************** IMAGE RESIZING END HERE *****************************//
$sql = "insert into tbl_membership set 
				mem_name='$mem_name',
				mem_tag_line='$mem_tag_line',
				mem_status='$mem_status'				
				";
				
db_query($sql);
$_SESSION["msg"]="Membership added successfully !";
header("Location:addedit-membership.php?id=$_REQUEST[id]");
exit;
//*************** INSERT NEW CATEGORY END ************************//
 }
}

if($memID!='') {
	
    $sql="select * from tbl_membership where mem_id = '$memID'";
	$result = db_query($sql);
	if ($line_raw = mysqli_fetch_array($result)) {
	 @extract($line_raw);
	}
}
?>



         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>

               </div>
               <div class="header-title">
                  <h1>Add/Edit Membership</h1>
                  <small>Add/Edit Membership</small>
                  
                  
<a href="membership-list.php"><button id="btn-go-back" type="button" class="btn btn-labeled btn-inverse m-b-5 pull-right">
<span class="btn-label" ><i class="fa fa-chevron-circle-left"></i></span>Go Back
</button></a>

                  
               </div>
               
               
            </section>
            <!-- Main content -->
<!--<script src="../ckeditor/ckeditor.js"></script>-->            
            <section class="content">
            
            <?php if($_SESSION["msg"]!=""){?>               
<div class="alert alert-success alert-dismissable fade in text-center" style="background-color:#dff0d8;border:none; color:#000;margin:10px 0 10px 0">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!&nbsp;&nbsp;&nbsp;</strong> <?=$_SESSION["msg"]?>
  </div>
<?php 
unset($_SESSION["msg"]);
}?>     

               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag" data-edit-title='false' data-close='false' data-reload='false'>
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              
                                 <h4 class="font-black">General Information</h4>
                              
                           </div>
                        </div>
                        <div class="panel-body">
<form name="form1" method="post" onsubmit="return formValidation()" enctype="multipart/form-data" class="col-sm-12" >


<div class="form-group col-lg-6">
<label>Membership Name</label>
<input type="text" class="form-control" placeholder="Enter Membership Name" name="mem_name" id="mem_name"  value="<?=$mem_name?>">
</div>
                                         
                                         
<div class="form-group col-lg-6">
<label>Membership Tag Line</label>
<input type="text" class="form-control" placeholder="Enter Membership Tag Line" name="mem_tag_line" id="mem_tag_line"  value="<?=$mem_tag_line?>">
</div>
                                        

                             
                            
                           
                           
<div class="form-group col-lg-3">
<label>Status</label>

<select name="mem_status" id="mem_status" class="form-control" >
<option value="Active" <?php if($mem_status=='Active'){ ?> selected="selected" <? } ?>>Active</option>
<option value="Inactive" <?php if($mem_status=='Inactive'){ ?> selected="selected" <? } ?>>Inactive</option>
</select>

</div>                             



                             
                              <div class="col-lg-12 reset-button">
                                                                 
                                 <button type="submit" class="btn btn-add">Submit</button>
                                
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
<?php require_once("footer.php"); ?>
 