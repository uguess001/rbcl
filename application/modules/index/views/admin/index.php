<?php
/**  Show Flash Data  */
$_flash_msg = $this->session->flashdata('_flash_msg');
if (!empty($_flash_msg)) { ?>
    <div class="alert alert-<?php echo $_flash_msg['_css_cls']; ?>">
        <a class="close" data-dismiss="alert">×</a>
        <?php echo $_flash_msg['_message']; ?>
    </div>
<?php  }  ?>
<div class="box"> 
<div class=""> 
<div class="box-header with-border"> 
 <h3 class="box-title"> Index of Reports</h3> 


 <!-- <span class="pull-right header-btn"><a href="<?php echo base_url(); ?>admin/agent/record/create" class="btn btn-primary add"><i class="fa fa-plus"></i> Add </a> </span> </div> -->







<div class="row container-fluid">

    <form action="index/uploadExcel" method="POST" enctype="multipart/form-data">
        <div class="col-lg-9">
            <div class="offset-lg-6 pull-right">
             <span class="text-bold text-danger">
             Sample Excel Format <a href="<?php echo base_url().'/application/resources/admin/sampleformForbPremiumCollectionBasedOnPortfolio.xlsx' ?>" target="_blank">here</a>
             <p>Please name your Excel sheet as Sheet1</p>
         </span>
         </div>
        </div>
      <div class=" col-lg-3 form-group pull-right">
        <label for="file">Select Excel File</label>
        <input type="file" accept=".xls,.xlsx"  name="userfile" class="form-control-file" id="file" onchange="return fileValidation()" required><br>
         <button type="submit" class="btn btn-primary">Upload</button>

        
      </div>
      <div class="clearfix"></div>
    </form>
</div>

</div>
</div>
</div>