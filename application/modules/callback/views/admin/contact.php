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
 <h3 class="box-title"> Contact Request List</h3> 
</div>


 
<div class=" box-body table-responsive"> 
 <table class="table table-hover table-bordered table-striped"> 
 <thead class="bg bg-primary"> 
    <tr>
        <th>S.N</th>
        <th>Name</th>
        <th>Department</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Message</th>
        <th>Date</th>
    </tr> 
</thead> 
<tbody>
<?php
$counter=1;
foreach ($records as $key => $value) { 
    $department =  $value->department;

    switch ($department) {
        case '1':
            $department = 'Aviation Insurance';
            break;
        case '2':
            $department = 'Motor Insurance';
            break;
        case '3':
            $department = 'Property Insurance';
            break;
        case '4':
            $department = 'Marine Insurance';
            break;
        case '5':
            $department = 'Engineering Insurance';
            break;
        case '6':
            $department = 'Medical Aid Insurance';
            break;
        case '7':
            $department = 'Miscallaneous Insurance';
            break;
        case '8':
            $department = 'Travel Medical Insurance';
            break;
        case '9':
            $department = 'Professional Indemnity Insurance';
            break;
        case '11':
            $department = 'Micro-insurance';
            break;

        
        default:
            $department = 'Others';
            break;
    }
    ?>
    <tr>
        <td><?=$counter++ ?></td>
        <td><?=$value->firstname.' '.$value->lastname ?></td>
        <td><?=$department ?></td>
        <td><?=$value->phone ?></td>
        <td><?=$value->email ?></td>
        <td><?=$value->message ?></td>
        <td><?=$value->date ?></td>
        
        <?php } ?>

    </tbody>
</table>
</div>
</div>
</div>