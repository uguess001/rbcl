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
 <h3 class="box-title"> Call Back Request List</h3> 
</div>


 
<div class=" box-body table-responsive"> 
 <table class="table table-hover table-bordered table-striped"> 
 <thead class="bg bg-primary"> 
    <tr>
        <th>S.N</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Address</th>
        <th>Message</th>
        <th>Date</th>
    </tr> 
</thead> 
<tbody>
<?php
$counter=1;
foreach ($records as $key => $value) { 
    ?>
    <tr>
        <td><?=$counter++ ?></td>
        <td><?=$value->name ?></td>
        <td><?=$value->phone ?></td>
        <td><?=$value->email ?></td>
        <td><?=$value->address ?></td>
        <td><?=$value->message ?></td>
        <td><?=$value->date ?></td>
        
        <?php } ?>

    </tbody>
</table>
</div>
</div>
</div>