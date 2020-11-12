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
            <h3 class="box-title"> STAFFS</h3>
            <span class="pull-right">

                <a href="<?php echo base_url(); ?>admin/staffs/record/sorting" class="btn btn-info header-btn"><i class=""></i> Sorting Staff</a>
                <a href="<?php echo base_url(); ?>admin/staffs/record/create" class="btn btn-primary add"><i class="fa fa-plus"></i> Add </a>

                
                
            </span>
        </div>
        <div class="clearfix"></div>
        <div class=" box-body table-responsive">
            <table class="table table-condensed table-hover table-striped" id="example">
                <thead class="bg-primary">
                    <tr>
                        <th>S.No</th>
                        <th>Name (Eng)</th>
                        <th>Name (Nepali)</th>
                        <th>Posistion</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1;
                        if (!empty($records)) {
                            foreach ($records as $k => $val) { ?>
                                <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $val->name_en ?></td>
                                    <td><?php echo $val->name_np ?></td>
                                    <td><?php 
                                        if($val->designation_en ==1 ){
                                            echo 'Chaiman';
                                        } elseif ($val->designation_en ==2) {
                                            echo 'Board Member';
                                        }elseif ($val->designation_en ==3) {
                                            echo 'Management Team';
                                        }else{
                                            echo 'Section Chief & Branch Manager';
                                        }
                                    ?></td>
                                    <td><?php echo ($val->status == '1')?'Active':'Inactive'; ?></td>
                                    <td>
                                        <a href = "<?= base_url()."admin/staffs/record/".$this->Encryption->encode($val->id )?>"><i class="fa fa-edit"></i></a> |
                                        <a onClick="return confirm('Are you sure you want to delete')" href = "<?= base_url()."admin/staffs/delete/".$this->Encryption->encode($val->id )?>"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                        <?php }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>