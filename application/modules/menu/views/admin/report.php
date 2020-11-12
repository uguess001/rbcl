<link rel="stylesheet" href="<?php echo ADMIN_RESOURCE_PATH.'css/menustyle.css'; ?>">
<?php
/**  Show Flash Data  */
$_flash_msg = $this->session->flashdata('_flash_msg');
if (!empty($_flash_msg)) { ?>
<div class="alert alert-<?php echo $_flash_msg['_css_cls']; ?>">
    <a class="close" data-dismiss="alert">×</a>
    <?php echo $_flash_msg['_message']; ?>
</div>
<?php  }  ?>
<div class="col-md-4">
    <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title"><?php echo $page_header; ?></h4>
        </div>
        <div class="clearfix"></div>
        <div class="box-body nopadding">
            <div class="col-md-12">
                <div id="load"></div>
                <menu id="nestable-menu">
                    <button type="button" class="btn btn-warning" data-action="expand-all">Expand</button>
                    <button type="button" class="btn btn-success" data-action="collapse-all">Collapse</button>
                </menu>
                <form class="form-horizontal" action='' method="POST" id="frm_menu">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Label (English) *</label>
                            <input type="text" id="label_en" class="form-control" name="label_en"
                                placeholder="Fill English label" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Label (Nepali) *</label>
                            <input type="text" id="label_np" class="form-control" name="label_np"
                                placeholder="Fill Nepali label" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Link *</label>
                            <input type="text" id="link" class="form-control" name="link" placeholder="Fill link"
                                required>
                            <button type="button" id="" onclick="myFunction()" class="btn btn-info" style="margin-top: 8px">URL</button>
                        </div>
                    </div>
                    <div id="myDIV" style="display: none">
                        <div class="form-group">
                            <select name="module" id="module" class="form-control">
                                <option value="">Select Module</option>
                                <option value="pages">Pages</option>
                                <option value="services">Services</option>
                            </select>
                        </div>
                        <div id="details" class="">
                            <!-- <input type='radio' class="radio" id="modulelink" class="" name='modulellink' value=""> -->
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Status *</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="process" id="process" value="true">
                            <br>
                            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                            <button type="button" class="btn btn-danger" id="reset">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-md-8">
    <div class="box">
        <div class="box-body nopadding">
            <div class="col-md-12">
                <div class="cf nestable-lists">
                    <div class="dd" id="nestable">
                        <?php
                        $ref   = [];
                        $items = [];
                        if (!empty($list)) {
                        foreach ($list as $key => $val) {
                        $thisRef = &$ref[$val->id];
                        $thisRef['parent'] = $val->parent;
                        $thisRef['label_en'] = $val->label_en;
                        $thisRef['label_np'] = $val->label_np;
                        $thisRef['link'] = $val->link;
                        $thisRef['status'] = $val->status;
                        $thisRef['id'] = $val->id;
                        if($val->parent == 0) {
                        $items[$val->id] = &$thisRef;
                        } else {
                        $ref[$val->parent]['child'][$val->id] = &$thisRef;
                        }
                        }
                        }
                        function get_menu($items,$class = 'dd-list') {
                        $html = "<ol class=\"".$class."\" id=\"menu-id\">";
                            foreach($items as $key => $value) {
                            $html.= '<li class="dd-item dd3-item" data-id="'.$value['id'].'" >
                                <div class="dd-handle dd3-handle"></div>
                                <div class="dd3-content"><span id="label_show'.$value['id'].'">'.$value['label_en'].' / '.$value['label_np'].'</span>
                                <span class="span-right">
                                <a class="edit-button" id="'.$value['id'].' " label_en="'.$value['label_en'].'" " label_np="'.$value['label_np'].'" link="'.$value['link'].'" status="'.$value['status'].'" ><i class="fa fa-pencil"></i></a>
                                <a class="del-button" id="'.$value['id'].'"><i class="fa fa-trash"></i></a></span>
                            </div>';
                            if(array_key_exists('child',$value)) {
                            $html .= get_menu($value['child'],'child');
                            }
                        $html .= "</li>";
                        }
                    $html .= "</ol>";
                    return $html;
                    }
                    print get_menu($items);
                    ?>
                    </div>
                    <div class="clearfix"></div>
                    <input type="hidden" id="nestable-output">
                    <br>
                    <button type="button" class="btn btn-success" id="save">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<script type="text/javascript" src="<?php echo ADMIN_RESOURCE_PATH.'js/jquery.nestable.js'; ?>"></script>
<script type="text/javascript">
$(document).ready(function() {
    var updateOutput = function(event) {
        var list = event.length ? event : $(event.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };
    // activate Nestable for list 1
    $('#nestable').nestable({
            group: 1
        })
        .on('change', updateOutput);
    // output initial serialised data
    updateOutput($('#nestable').data('output', $('#nestable-output')));
    $('#nestable-menu').click(function(event) {
        var target = $(event.target),
            action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#load").hide();
    $('#submit').click(function(event) {
        var labelen = $("#label_en").val();
        var labelnp = $("#label_np").val();
        var link = $("#link").val();
        var status = $("#status").val();
        if (labelen != '' && labelnp != '' && link != '') {
            $("#load").show();
            var formData = $("#frm_menu").serialize();
            $.ajax({
                    url: "<?php echo base_url().'admin/menu/savemenu'; ?>",
                    type: 'POST',
                    data: formData,
                })
                .done(function(response) {
                    var data = JSON.parse(response);
                    if (data.type == 'add') {
                        $("#menu-id").append(data.menu);
                    } else if (data.type == 'edit') {
                        $('#label_show' + data.id).html(data.label_en + ' / ' + data.label_np);
                        $('#link_show' + data.id).html(data.link);
                    }
                    $('#label_en').val('');
                    $('#label_np').val('');
                    $('#link').val('');
                    $('#status').val('');
                    $('#id').val('');
                    $("#load").hide();
                })
                .fail(function(response) {
                    alert(error);
                });
        } else {
            alert('Please Fill All Required Feild..');
        }
    });
    $('.dd').change(function(event) {
        $("#load").show();
        var dataString = {
            data: $("#nestable-output").val(),
        };
        $.ajax({
            url: "<?php echo base_url().'admin/menu/updateDataList'; ?>",
            type: "POST",
            data: dataString,
            cache: false,
            success: function(data) {
                $("#load").hide();
            },
            error: function(xhr, status, error) {
                alert(error);
            },
        });
    });
    $('#save').click(function(event) {
        $("#load").show();
        var dataString = {
            data: $("#nestable-output").val(),
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url().'admin/menu/updateDataList'; ?>",
            data: dataString,
            cache: false,
            success: function(data) {
                $("#load").hide();
                alert('Data has been saved');
                window.location.reload();
            },
            error: function(xhr, status, error) {
                alert(error);
            },
        });
    });
    $('.del-button').click(function(event) {
        var x = confirm('Delete this menu?');
        var id = $(this).attr('id');
        if (x) {
            $("#load").show();
            $.ajax({
                    url: "<?php echo base_url().'admin/menu/deleteMenu'; ?>",
                    type: 'POST',
                    data: {
                        id: id
                    },
                })
                .done(function(response) {
                    $("#load").hide();
                    var data = JSON.parse(response);
                    if (data.error == 'false') {
                        $("li[data-id='" + id + "']").remove();
                    } else if (data.error == 'false') {
                        alert('Error');
                    }
                });
        }
    });
    $('.edit-button').click(function(event) {
        var id = $(this).attr('id');
        var label_en = $(this).attr('label_en');
        var label_np = $(this).attr('label_np');
        var link = $(this).attr('link');
        var status = $(this).attr('status');
        $("#id").val(id);
        $("#label_en").val(label_en);
        $("#label_np").val(label_np);
        $("#link").val(link);
        $("#status").val(status);
    });
    $('#reset').click(function(event) {
        $('#label_en').val('');
        $('#label_np').val('');
        $('#link').val('');
        $('#status').val('');
        $('#id').val('');
    });
});
</script>
<script>
function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        //x.style.display = "none";
    }
}
</script>
<script type="text/javascript">
$(document).on("change", "#module", function() {
    var module = $('#module').val();
    $.ajax({
        type: 'POST',
        url: '<?=base_url()?>' + 'admin/menu/getLink',
        data: {
            module: module
        },
        success: function(response) {
            // console.log(response);
            var dataObject = JSON.parse(response);
            var link = (dataObject.list);
            console.log(link);
            $('#details').html("");
            $.each(link, function(index, item) {
                // console.log(item.slug);
                $('#details').append(
                    '<label><input type="radio" class="radio1" name="modulelink" onclick="doSomething(\'' +
                    item.slug + '\')" value="' + item.slug + '"/>' + item.title_en +
                    '</label>');
            })
        }
    });
});
</script>
<script>
function doSomething(value) {
    value = '<?=base_url()?>' + $("#module").val() + '/' + value;
    $("#link").val(value);
}
</script>

<style>
div#details label {
    float: left;
    width: 100%;
    text-transform: uppercase;
    font-size: 12px;
    line-height: 1;
}

div#details label input {
    margin-right: 10px;
}
</style>

<!-- menu setting backup -->
<!-- <li class="dd-item dd3-item" data-id="'.$value['id'].'" >
                                <div class="dd-handle dd3-handle">Drag</div>
                                <div class="dd3-content"><span id="label_show'.$value['id'].'">'.$value['label_en'].' / '.$value['label_np'].'</span>
                                <span class="span-right">/<span id="link_show'.$value['id'].'">'.$value['link'].'</span> &nbsp;&nbsp;
                                <a class="edit-button" id="'.$value['id'].' " label_en="'.$value['label_en'].'" " label_np="'.$value['label_np'].'" link="'.$value['link'].'" status="'.$value['status'].'" ><i class="fa fa-pencil"></i></a>
                                <a class="del-button" id="'.$value['id'].'"><i class="fa fa-trash"></i></a></span>
                            </div> -->