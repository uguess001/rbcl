<?php
/**  Show Flash Data  */
$_flash_msg = $this->session->flashdata('_flash_msg');
if (!empty($_flash_msg)) { ?>
<div class="alert alert-<?php echo $_flash_msg['_css_cls']; ?>">
    <a class="close" data-dismiss="alert">×</a>
    <?php echo $_flash_msg['_message']; ?>
</div>
<?php } ?>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"> CONTACT US</h3> 
        <span class="pull-right">
            <a href="<?php echo base_url(); ?>admin/contactus/record/create" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
        </span>
    </div>
    <div class="">
        <div class=" box-body table-responsive">
            <table class="table table-hover table-bordered table-striped table-condensed compact" id="example">
                <thead class="bg bg-primary">
                    <tr>
                        <th>S.No</th>
                        <th>Address</th>
                        <th>Phone No</th>
                        <th>Email</th>
                        <th>Branch Type</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1; if (!empty($records)) {
                        foreach ($records as $kl => $val) { ?>
                            <tr>
                                <td><?php echo $counter++ ?></td>
                                <td class="text-left"><?php echo $val->address_en ?></td>
                                <td class="text-left"><?php echo $val->phone ?></td>
                                <td class="text-left"><?php echo $val->email ?></td>
                                <td class="text-left"><?php echo $val->name ?></td>
                                <td><?php echo ($val->status == '1')?'Active':'Inactive' ?></td>
                                <td>
                                    <a href = "<?php echo base_url()."admin/contactus/record/".$this->Encryption->encode($val->id )?>"><i class="fa fa-edit"></i></a> | 
                                    <a href = "<?php echo base_url()."admin/contactus/record/delete/".$this->Encryption->encode($val->id )?>"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                    <?php } } else{ ?>
                        <tr><td>No Record Found...</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>