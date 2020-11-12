<?php
/**  Show Flash Data  */
$_flash_msg = $this->session->flashdata('_flash_msg');
if (!empty($_flash_msg)) { ?>
    <div class="alert alert-<?php echo $_flash_msg['_css_cls']; ?>">
        <a class="close" data-dismiss="alert">×</a>
        <?php echo $_flash_msg['_message']; ?>
    </div>
<?php  }  ?>
<div class="col-md-8">
    <div id="status_messagediv" class="alert alert-success" style="display: none;">
        <a class="close" data-dismiss="alert">×</a>
        <h5 id="status_message"></h5>
    </div>
</div>
<div class="clearfix"></div>
<div class="box">
    <div class="box-body">
        <div class="box-header">
            <h3 class="box-title"> STAFFS</h3>
            <span class="pull-right header-btn">
                <a href="<?php echo base_url(); ?>admin/staffs/record/sorting" class="btn btn-primary add"><i class=""></i> Sorting Staff</a> | 
                <a href="<?php echo base_url(); ?>admin/staffs/record/create" class="btn btn-primary add"><i class=""></i> Add </a>
            </span>
        </div>
        <div class="clearfix"></div>
        <form class="form-inline" method="POST">
            <div class="col-md-4">
                <div class="form-group">
                    <select name="designation_en" id="designation_en" class="form-control">
                        <option value="">Select Designation</option>
                        <option value="1" <?php echo (isset($_POST['designation_en']) && $_POST['designation_en'] == '1')?'selected':'' ?> >Chairman</option>
                        <option value="2" <?php echo (isset($_POST['designation_en']) && $_POST['designation_en'] == '2')?'selected':'' ?> >Board Member</option>
                        <option value="3" <?php echo (isset($_POST['designation_en']) && $_POST['designation_en'] == '3')?'selected':'' ?> >Management Team</option>
                        <option value="4" <?php echo (isset($_POST['designation_en']) && $_POST['designation_en'] == '4')?'selected':'' ?> >Section Chief & Branch Manager</option>                       
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="hidden" name="checkprocess" value="true">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <button class="btn btn-success" type="submit"> Search</button>
                </div>
            </div>
        </form>
        <div class="clearfix"></div>
        <ul class="list-unstyled" id="page_list">
           <?php $i = 1; 
                if (!empty($records)) { 
                foreach ($records as $value) {
                     if($value->designation_en ==1 ){
                            $designationx = 'Chaiman';
                        } elseif ($value->designation_en ==2) {
                            $designationx = 'Board Member';
                        }elseif ($value->designation_en ==3) {
                            $designationx = 'Management Team';
                        }else{
                            $designationx = 'Section Chief & Branch Manager';
                        }
            ?>
                <li id="<?php echo $value->id ?>"><?php echo $value->name_en.' | '.$value->name_np.' | '.$designationx ?>
                    <span class="pull-right">
                        Status : <?php echo ($value->status == '1')?'Active':'Inactive'; ?> &nbsp;|&nbsp; 
                        <a href = "<?= base_url()."admin/staffs/record/".$this->Encryption->encode($value->id )?>"><i class="fa fa-edit"></i></a> |
                        <a onClick="return confirm('Are you sure you want to delete')" href = "<?= base_url()."admin/staffs/delete/".$this->Encryption->encode($value->id )?>"><i class="fa fa-trash"></i></a>
                    </span>
                </li>
           <?php } } ?>
        </ul>
    </div>
</div>
<style type="text/css">
   .box {
    width:90%;
    padding:10px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:25px;
   }
   #page_list li {
    padding:10px;
    background-color:#f9f9f9;
    border:1px dotted #ccc;
    cursor:move;
    margin-top:12px;
   }
   #page_list li.ui-state-highlight {
    padding:24px;
    background-color:#ffffcc;
    border:1px dotted #ccc;
    cursor:move;
    margin-top:12px;
   }
</style>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $( "#page_list" ).sortable({
            placeholder : "ui-state-highlight",
            update  : function(event, ui) {
                var page_id_array = new Array();
                $('#page_list li').each(function(){
                    page_id_array.push($(this).attr("id"));
                });
                $.ajax({
                   url:"<?php echo base_url().'admin/staffs/record/sorting'; ?>",
                    method:"POST",
                    data:{
                        page_id_array:page_id_array,
                        designation_en:<?php echo isset($_POST['designation_en'])?$_POST['designation_en']:''; ?>,
                        <?php echo $this->security->get_csrf_token_name(); ?> : '<?php echo $this->security->get_csrf_hash(); ?>'
                    },
                })
                .always(function(data) { 
                    $('#status_messagediv').show();
                    $('#status_message').html(data);
                    console.log(data);
                });
            }
        });
    });
</script>