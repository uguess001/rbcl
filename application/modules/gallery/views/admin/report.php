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
         <h3 class="box-title">   <?php echo $page_header; ?></h3> 
         <span class="pull-right header-btn"> <?php echo anchor( base_url().'admin/'.$url.'/record/create' , '<i class="fa fa-plus"></i> Add', array('title' => 'Add', 'class'=>'btn btn-primary')); ?> </span>
    </div>

    <div class="clearfix"></div>

    <div class="box-body table-responsive">
        <table class="table table-hover table-nomargin dataTable">
            <thead class="bg-primary">
                <tr>
                    <th>S.No.</th>
                    <th>Title</th>
                    <th>Title (Nepali)</th>
                    <th>Feature Image</th>
                    <th>Published Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = $offset;
                    if(!empty($list)) {
                        foreach($list as $li) { $i++; ?>
                            <tr>
                                <td><?php echo $i;  ?></td>
                                <td class="left-align"><?php echo word_limiter($li->title_en,15); ?></td>
                                <td class="left-align"><?php echo word_limiter($li->title_np,15); ?></td>
                                <td>
                                    <?php if (!empty($li->image)) {
                                        echo anchor($li->image, '<i class="fa fa-picture-o"></i>', array('title' => 'Image', 'target' => '_blank'));
                                    } else { ?>
                                        <img src="<?php echo base_url()?>application/resources/admin/img/icons/inactive.png?>">
                                    <?php } ?>
                                </td>
                                <td style="width: 90px" class="left-align"><?php echo $li->published_date; ?></td>
                                <?php if ($li->status == 0) { ?>
                                    <td><img src="<?php echo base_url()?>application/resources/admin/img/icons/inactive.png?>"></td>
                                <?php } else { ?>
                                    <td><img src="<?php echo base_url()?>application/resources/admin/img/icons/active.png?>"></td>
                                <?php } ?>
                                <td>
                                    <?php echo anchor( base_url().'admin/'.$url.'/record/'.$this->Encryption->encode($li->id), '<i class="fa fa-edit"></i>', array('title' => 'Edit')); ?> &nbsp;|&nbsp;
                                    <?php echo anchor( base_url().'admin/'.$url.'/record/deactivate/'.$this->Encryption->encode($li->id), '<i class="fa fa-trash"></i>', array("title" => "Delete", "onclick" => "return confirm('Are You Sure ???');")); ?>

                                    
                                </td>
                            </tr>
                <?php   } }
                    else { ?>
                        <tr>
                            <td colspan="8">No Records Found ! ! !</td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php echo $pages; ?>
    </div>
</div>