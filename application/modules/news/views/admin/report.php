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
         <h3 class="box-title"> NEWS</h3> 
         <span class="pull-right"><a href="<?php echo base_url(); ?>admin/news/record/create" class="btn btn-primary"><i class="fa fa-plus"></i> Add </a> </span>
    </div>

    <div class=" box-body table-responsive"> 
        <table class="table table-hover table-bordered table-condensed table-striped dataTable" id="example"> 
            <thead class="bg-primary">
                <tr>
                    <th>S.N</th>
                    <th>English Title</th>
                    <th>Nepali Title</th>
                    <th>Type</th>
                    <th>In front page</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead> 
            <tbody>
                <?php

                $counter=1;

                foreach ($records as $key => $value) { 
                    
                    if($value->type=='1'){
                        $type="News";

                    }if($value->type=='2'){
                        $type="Notice";
                        
                    }if($value->type==NULL){
                        $type="";
                        
                    }


                	$status = $value->status;

                        switch ($status):

                            case(1):

                                $status_style = 'label-success';

                                $status       = 'Active';

                                break;

                            default :

                                $status_style = 'label-danger';

                                $status       = 'Inactive';

                                break;

                        endswitch;

                	?>
                    <tr>
                        <td><?=$counter++ ?></td>

                <td><?=$value->title_en?></td>

                <td><?=$value->title_np ?></td>
                <td><?=$type?></td>
                <td>
                    <?php 
                    if(isset($value->shownews) && !empty($value->shownews)){?>
                       <i class="fa fa-check-circle"></i>
                    <?php }
                    else{ ?>
                        <i class="fa fa-times-circle"></i>
                    <?php }?>
                </td>
                <td><?=$status ?></td>
                <td> 
                	<a href = "<?=base_url()."admin/news/record/".$this->Encryption->encode($value->id )?>"><i class="fa fa-edit"></i></a> |
                	<a onClick="return confirm('Are you sure you want to delete')" href = "<?=base_url()."admin/news/delete/".$this->Encryption->encode($value->id )?>"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
