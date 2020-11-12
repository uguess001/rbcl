<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo $page_header ?></h3>
        <span class="pull-right">
            <a href="<?php echo base_url().'admin/payments/record/create'; ?>" class="btn btn-primary"><i class="fa fa-plus"></i> ADD</a>
        </span>
    </div>

    <div class="box-body table-responsive">
        <table class="table table-hover table-bordered table-condensed table-striped dataTable">
            <thead class="bg-primary">
                <tr>
                    <th width="10px">S.N</th>
                    <th>English Title</th>
                    <th>Nepali Title</th>
                    <th class="text-center" width="120px">Published Date</th>
                    <th class="text-center">Open</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 1;
                if(!empty($records)){
                    foreach ($records as $key => $value) { ?>
                        <tr>
                            <td><?php echo $count++ ?></td>
                            <td><?php echo $value->title_en ?></td>
                            <td><?php echo $value->title_np ?></td>
                            <td class="text-center"><?php echo $value->published_date ?></td>
                            <td class="text-center">
                                <a href="<?php echo base_url().'payments/'.$value->slug; ?>" target="_blank"><?php echo LINK_ICON; ?></a>
                            </td>
                            <td class="text-center"><?php echo ($value->status == '1')?ACTIVE_STATUS:INACTIVE_STATUS ?></td>
                            <td class="text-center">
                                <a href = "<?=base_url()."admin/payments/record/".$this->Encryption->encode($value->id )?>"><i class="fa fa-edit"></i></a> |
                                <a onClick="return confirm('Are you sure you want to delete')" href = "<?=base_url()."admin/payments/delete/".$this->Encryption->encode($value->id )?>"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } } ?>
            </tbody>
        </table>
    </div>
</div>