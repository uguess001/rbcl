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
    <div class="box-header with-border">
        <h4 class="box-title"><?php echo $page_header; ?>
            <span class="pull-right">
                <?php echo anchor( base_url().'admin/'.$url.'/record/editprofile/'.$this->Encryption->encode($list->UserId) , '<i class="fa fa-pencil"></i> Edit', array('title' => 'Edit', 'class'=>'btn btn-primary')); ?>
            </span>
        </h4>
    </div>
    <div class="clearfix"></div>
    <div class="box-body nopadding">
        <div class="col-lg-10">
            <div class="form-data">
                <h5 class="col-md-3"><b>UserName :</b></h5>
                <h4 class="col-md-9"><?php echo $list->UserName ?></h4>
            </div>
            <div class="form-data">
                <h5 class="col-md-3"><b>Created On :</b></h5>
                <h4 class="col-md-9"><?php echo $list->CreatedOn; ?></h4>
            </div>
            <div class="form-data">
                <h5 class="col-md-3"><b>Status :</b></h5>
                <h4 class="col-md-9"><?php echo ($list->Status == '1')? 'Active' : 'InActive'; ?></h4>
            </div>
        </div>
    </div>
</div>