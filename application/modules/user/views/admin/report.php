<div class="row"> <div class="col-md-12"> <div class="box"> <div class="box-header with-border"> <h3 class="box-title">User's List</h3> <span class="pull-right header-btn"><a href="<?php echo base_url(); ?>admin/user/record/create" class="btn btn-primary"><i class="fa fa-plus"></i> Add </a> </span> </div> 
<div class="box-body">
    <div class="table-responsive"> 
        <table class="table table-hover kubk_bordered_table table-striped" id="example"> 
            <thead class="bg-primary"> <tr>
                <th style="width:1%;">SN</th>
                <th style="width:9%;">UserType</th>
                <th style="width:10%;">UserName</th>
                <th style="width: 60%;">Full Name</th>
                <th style="width: 10%;">Status</th> 
<!-- <th>CreatedOn</th>
<th>ModifiedOn</th> 
<th>ModifiedBy</th>
<th>CreatedBy</th> -->
<th  style="width: 1%;">Action</th> </tr> </thead> <tbody> 
    <?php 
    $counter=1;
    if(isset($records) && $records>0){
        foreach ($records as $key => $value) { 
         $status = $value->Status;
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
        ?><tr><td><?=$counter++ ?></td>

            <td>
                <?=GetUserTypeDescription($usertype,null,$value->UserType) ?>

            </td>


            <td style="text-align: left;"><?=$value->UserName ?></td>
            <!-- <td><?=$value->Password ?></td> -->
            <td style="text-align: left;"><?=$value->name ?></td>
            <td style="text-align: left;"> 
                <?=$status?>
            </td>
<!-- <td><?=$value->CreatedOn ?></td>
<td><?=$value->ModifiedOn ?></td>
<td><?=$value->ModifiedBy ?></td>
<td><?=$value->CreatedBy ?></td> -->
<td>
    <a href = "<?=base_url()."admin/user/record/".$this->Encryption->encode($value->UserId )?>" class="btn btn-success btn-xs"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
    <?php if ($value->UserId != '1') { ?>
        <a onClick="return confirm('Are you sure you want to delete')" class="btn btn-danger btn-xs" href = "<?=base_url()."admin/user/delete/".$this->Encryption->encode($value->UserId )?>"><i class="fa fa-trash"></i></a>
    <?php } ?>
    </td><?php }}else{ ?>
        <td colspan="6">No Records Available</td>
    <?php }?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
