 <style>
            #sortable li.box-title img {
    max-width: 100%;
}
#sortable li.box-title {
    background: #368EE0;
    color: #fefefe;
    box-shadow: 5px 5px 0 #00345F;
    padding: 10px;
    margin: 10px;
    display: block;
    width: 35%;
}
            #sortable li.box-title:hover{
                cursor: move;
            }
        </style>
<script type="text/javascript">
$(function() {
    $(".box ol").sortable({ opacity: 0.6, cursor: 'move', update: function() {
        var order = $(this).sortable("toArray").toString();
            $.ajax({
                    url: '<?php echo base_url();?>'+'admin/slider/ajax_save_order',
                    type: 'post',
                    contentType:"application/x-www-form-urlencoded",
                    data: {
                        order : order,
                        '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                    },
                    success: function(data) {
                        if(data){
                            $(".notification").css('display','block');
                            $(".notification span").html(data);
                            return;
                        }
                    }
            });
        }
    });
});
</script>

<div class="row-fluid">
    <div class="span12">
        
        <div class="alert alert-success notification" style="display: none;">
            <button data-dismiss="alert" class="close" type="button">×</button>
            <span></span>
        </div>
        
    </div>
</div>

<div class="box"> 
<div class="box-body"> 
<div class="box-header"> 
 <h3 class="box-title">Manage Slider Hierarchy (Drag to order)</h3> 
 </div>
                 <ol id="sortable" style="list-style: none;">
                    <?php if(isset($group_list) && (!empty($group_list))){
                        foreach($group_list as $gl){
                    ?>
                    <li id="<?php echo $gl->id; ?>" class="box-title">
                        <img src = "<?=$gl->image?>" style="">                      
                    </li>
                    <?php        
                        }
                    } else{
                        echo '<h2>No Record Found</h2>';
                    } ?>

                </ol>
</div>
</div>
