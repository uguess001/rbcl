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
                <?php echo anchor( base_url().'admin/'.$url.'/record/create' , '<i class="fa fa-plus"></i> Add', array('title' => 'Add', 'class'=>'btn btn-primary')); ?>
            </span>
        </h4>
    </div>
    <div class="clearfix"></div>
    <div class="box-body nopadding">
        <table class="table table-hover table-nomargin dataTable">
            <thead class="bg-primary">
                <tr>
                    <th width="10px" >S.No.</th>
                    <th>Title</th>
                    <th>Title (Nepali)</th>
                    <th>Links</th>
                    <th style="width: 50px">Link Section</th>
                    <th style="width: 50px">Status</th>
                    <th style="width: 80px">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 0;
                    if(!empty($list)) {
                        foreach($list as $li) { $i++; ?>
                            <tr>
                                <td><?php echo $i;  ?></td>
                                <td class="left-align"><?php echo $li->title_en; ?></td>
                                <td class="left-align"><?php echo $li->title_np; ?></td>
                                <td class="left-align"><?php echo character_limiter($li->link_url,15); ?></td>
                                <td class="left-align"><?php echo $li->linksection_name_en; ?></td>
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
    </div>
</div>