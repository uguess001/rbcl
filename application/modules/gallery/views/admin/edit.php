    <!-- THIS IS FILE UPLOAD PART  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/dropzone.css">

    <base href="<?php echo base_url()?>">
    <!-- blueimp Gallery styles -->
    <link rel="stylesheet" href="https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="<?php echo base_url().'application/third_party/Fileupload/css/jquery.fileupload.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'application/third_party/Fileupload/css/jquery.fileupload-ui.css' ?>">
    <!-- CSS adjustments for browsers with JavaScript disabled -->
    <noscript><link rel="stylesheet" href="<?php echo base_url().'application/third_party/Fileupload/css/jquery.fileupload-noscript.css' ?>"></noscript>
    <noscript><link rel="stylesheet" href="<?php echo base_url().'application/third_party/Fileupload/css/jquery.fileupload-ui-noscript.css' ?>"></noscript>


    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo $page_header; ?> </h3>
            <span class="pull-right">
                    <?php echo anchor( base_url().'admin/'.$url.'/record/list' , '<i class="fa fa-chevron-left"></i> View All', array('title' => 'View All', 'class'=>'btn btn-primary')); ?>
            </span>
        </div>
        <div class="box-body">
            <div class="row">
            <form action="" method="POST" class='form-validate' id="officefrm" name="officefrm" enctype="multipart/form-data">

                <div class="col-md-9 col-lg-9">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="title_en" class="control-label" >Title English</label>

                                <input class="small-input valid form-control" type="text" required name="title_en" id="title_en"  value="<?php echo (isset($record->title_en)?$record->title_en : ''); ?>">
                            </div>
                            <div class="form-group">
                                <label for="published_date" class="control-label" >Published Date</label>
                                <input class="small-input valid form-control datepicker" type="text" required name="published_date" id="published_date"  value="<?php echo (isset($record->published_date)?$record->published_date : $date); ?>">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="title_np" class="control-label" >Title Nepali</label>
                                <input class="small-input valid form-control" type="text" required name="title_np" id="title_np"  value="<?php echo (isset($record->title_np) ? $record->title_np : ''); ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Status</label>
                                <div class="controls">
                                    <select class="small-input valid form-control" name="status" id="status_id">
                                        <option value="1" <?php echo ((isset($record->status) && $record->status == '1') ? 'selected' : ''); ?>>Active</option>
                                        <option value="0" <?php echo ((isset($record->status) && $record->status == '0') ? 'selected' : '') ?>>InActive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <table class="table table-striped">
                            <thead class="bg-primary">
                                <tr>
                                    <th>S.No</th>
                                    <th>Preview</th>
                                    <th>Image Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; if(!empty($picturelist)) {
                                    foreach ($picturelist as $key => $picture) { ?>
                                    <tr>
                                        <td width="20px"><?php echo $i++; ?></td>
                                        <td>
                                            <span class="preview">
                                                <img src="<?php echo isset($picture->image)?base_url().'uploads/gallery/'.$picture->image:'' ?>" class="" style="max-height: 150px; float: left;" width="150px">
                                                <input type="hidden" name="img_name[]"  value="<?php echo isset($picture->image)?$picture->image:''?>" >
                                            </span>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Enter Image Title" name="img_title[]"  value="<?php echo isset($picture->title_en)?$picture->title_en:''?>"/>
                                            </div>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger remove_uploded"  >
                                                <i class="glyphicon glyphicon-trash"></i>
                                                <span>Delete</span>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php } } else { ?>
                                    <tr>
                                        <td colspan="4"> No Images</td>                               
                                    </tr>
                                    <?php } ?>
                            </tbody>
                            </table>
                            <div class="form-group">
                                <label>Upload Gallery Images</label>
                                <span style="color: red" class="pull-right"><p >Please select or drag file to upload in gallery and save the changes </p></span>
                            </div>
                             <div style="background-color:#ecf0f5" id="upload-widget" action="<?=base_url().'admin/gallery/do_upload'?>" class="dropzone" enctype="     multipart/form-data">

                            <div class="fallback">
                                <input name="file" type="file" />
                            </div>
                        </div>
                         <div class="form-actions "style="margin-top:10px;">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <input type="hidden" name="process" value="true">
                            <input type="hidden" name="id" value="<?php echo (isset($record->id) ? $record->id : ''); ?>">
                            <button type="button" class="btn" onclick="history.go(-1)">Cancel</button>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3">
                    <div class="form-group">              
                        <label for="textfield" class="control-label">Image Size: 600px×600px <p style="color: red">(Please upload gif,png,jpeg,jpg file only)</p></label>
                         <div class="col-md-12" >

                            <a href="<?php echo ADMIN_RESOURCE_PATH.'assets/filemanager/dialog.php?type=1&field_id=image' ?>" data-fancybox-type="iframe" class="btn btn-info fancy"> Insert Image</a>
                                   
                                    <?php if (isset($record->image) && strlen($record->image)>0) { ?>
                                <img src="<?php echo $record->image ?>" id="prev_img">
                                <?php }else{?>
                                <img src="<?php echo ADMIN_RESOURCE_PATH.'img/no-image.png' ?>" id="prev_img" alt="No-Image">
                             <?php   } ?>

                               <?php if (isset($record->image) && strlen($record->image)>0) { ?>
                                    <button class="btn btn-danger" id="img-remove" type="button"> Remove Image</button>
                                    <?php } ?><!-- 
                                    <img src="assets/img/download.png" alt="" title="" id="prev_img" /> -->
                                    <input type="hidden" value="<?=isset($record->image)?$record->image:''?>" class="form-control" name="image" id="image">
                                </div>

                        <div class="fileupload fileupload-new" data-provides="fileupload" style="display: none">

                            <div class="fileupload-new thumbnail" style="width: 200px; height: 80px;">

                            <!-- <img src="<?php echo isset($record->image) ? base_url() . 'uploads/news/' . $record->image: base_url()."application/resources/admin/img/noimage.png"; ?>" /> -->
                             <?php if (isset($record->image) && strlen($record->image)>0) { ?>
                                <img src="<?php echo base_url().'uploads/news/'.$record->image ?>" id="img_src">
                                <?php } else { ?>
                                <img src="<?php echo ADMIN_RESOURCE_PATH.'img/no-image.png' ?>" alt="No-Image">
                                <?php } ?>

                            </div>

                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">         
                            </div>             

                            <div>

                            </div>                              

                        </div>

                            <input type="hidden" class="form-control" name="image_file" id="old_document1" value="<?php echo isset($record->image) ? $record->image: ''; ?>" />

                        </div>

                       
                                    
                     </div>
                    
                        <!-- The file upload form used as target for the file upload widget -->


                    <div  style="margin-bottom: 20px">

                        

                    </div>


                    <!-- The template to display files available for upload -->
                    <!--  -->
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
                    <div class="clearfix"></div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">


                       
                    </div>
                </form>
            </div>
            </div>
        </div>









        <script type="text/javascript">
                var _URL = window.URL || window.webkitURL;
                 $("#image_file_id").change(function (e) {

                     var file = $(this)[0].files[0];
                    
                     if(file){

                        if ($.inArray(file["type"], ["image/gif", "image/jpeg", "image/png"]) < 0) {

                            alert('Only image files are allowed');
                           $(this).val('');
                              
                           
                             return;

                            }
                            
     
                        
                          img = new Image();
                          var imgwidth = 0;
                          var imgheight = 0;
                          var maxwidth = 250;
                          var maxheight = 250;

                          img.src = _URL.createObjectURL(file);
                          img.onload = function() {
                           imgwidth = this.width;
                           imgheight = this.height;

                           // $("#width").text(imgwidth);
                           // $("#height").text(imgheight);
                           if(imgwidth < maxwidth && imgheight < maxheight){
                            alert('Height and Width of featured image should be minimum 250px ');
                            $('.fileinput-preview.fileinput-exists.thumbnail img').attr({'src':'<?php echo ADMIN_RESOURCE_PATH.'img/no-image.png' ?>','height':'150px','width':'200px'});

                           }
                            }
                    }

                 
                });

            $(document).ready(function() {
                $('#document-remove').click(function(event) {
                    $('#documentfiletext').hide();
                    $('#document_file').val('');
                });
            });

            $(function () {
                 


                  var serverresponse={};
                  Dropzone.options.uploadWidget = {
                      paramName: 'file',
                      maxFilesize:10, // MB
                      maxFiles: 100,
                      dictDefaultMessage: 'Drag an image here to upload in gallery, or click to select one',

                      acceptedFiles: 'image/*',


                      init: function() {

                        
                        this.on('success', function( file, resp ){
                            resp=JSON.parse(resp);
                            // console.log( file );
                          console.log( resp );
                          // alert(typeof(resp.status));
                          if(resp.status=='success'){

                            console.log(resp.message.file_name);
                            $('.form-actions').append("<input type='hidden' name='img_name[]' value="+resp.message.file_name+" ><input type='hidden' name='img_title[]' value="+resp.message.raw_name+">" );
                           // alert(resp.message.client_name);
                       }
                           //file.previewTemplate.appendChild(document.createTextNode('ss'));
                          //  file.previewTemplate='div.dz-preview.dz-processing.dz-error';

                           // this.emit('thumbnail', file, serverResponse.imageUrl);

                            // if(!(resp.status=='success')){
                            //     //done(resp.message);
                            //     // file.rejectDimensions

                            // } 
                            //  else{

                            //    // done('File Uploaded Successfully');
                            // }     

                        });
                    //     this.on('thumbnail', function(file) {
                    //       // if ( file.width < 640 || file.height < 480 ) {
                    //       //   file.rejectDimensions();
                    //       // }
                    //       // else {
                    //       //   file.acceptDimensions();
                    //       // }alert()
                    // //       alert(as);
                    // //       alert(assaas);
                    // //       alert(file);
                    // // alert(serverresponse.status);
                    //      if(serverresponse.status=='success'){

                    //             file.acceptDimensions();
                    //      }else{

                    //          file.rejectDimensions();
                    //      }

                    //      // file.acceptDimensions();
                    //     });
                }
                      //,
                      // accept: function(file, done) {
                      //   file.acceptDimensions = done;
                      //   file.rejectDimensions = function() {
                      //     done('error')
                      //   };
                      // }
                  };

              });

            var loadFeatured = function(event) {
                var output = document.getElementById('featured_img');
                output.src = URL.createObjectURL(event.target.files[0]);
            };

            $(".remove_uploded").click(function(e) {
                e.preventDefault();
                if(confirm('Are you sure you want to delete the file???'))
                $(this).parent().parent().remove();
            });
        </script>
        <style type="text/css">
        .fileupload-process{
            display: none !important;
        }
    </style>

    <!-- script for image preview -->
    <script type="text/javascript">
        $(document).ready(function() {
            var noimagepath = "<?php echo ADMIN_RESOURCE_PATH.'img/no-image.png'; ?>";
            $('#img-remove').click(function(event) {
                $('#image_file').val('');
                $('#img-remove').hide();
                $('#img_src').prop('src', noimagepath);
            });

            $('.fileinput-new').click(function(event) {
                $('#img-remove').hide();
            });
        });
    </script>
    <style type="text/css" media="screen">
    /*!
 * Jasny Bootstrap v3.1.3 (http://jasny.github.io/bootstrap)
 * Copyright 2012-2014 Arnold Daniels
 * Licensed under Apache-2.0 (https://github.com/jasny/bootstrap/blob/master/LICENSE)
 */

.container-smooth{max-width:1170px}@media (min-width:1px){.container-smooth{width:auto}}.btn-labeled{padding-top:0;padding-bottom:0}.btn-label{position:relative;background:0 0;background:rgba(0,0,0,.15);display:inline-block;padding:6px 12px;left:-12px;border-radius:3px 0 0 3px}.btn-label.btn-label-right{left:auto;right:-12px;border-radius:0 3px 3px 0}.btn-lg .btn-label{padding:10px 16px;left:-16px;border-radius:5px 0 0 5px}.btn-lg .btn-label.btn-label-right{left:auto;right:-16px;border-radius:0 5px 5px 0}.btn-sm .btn-label{padding:5px 10px;left:-10px;border-radius:2px 0 0 2px}.btn-sm .btn-label.btn-label-right{left:auto;right:-10px;border-radius:0 2px 2px 0}.btn-xs .btn-label{padding:1px 5px;left:-5px;border-radius:2px 0 0 2px}.btn-xs .btn-label.btn-label-right{left:auto;right:-5px;border-radius:0 2px 2px 0}.nav-tabs-bottom{border-bottom:0;border-top:1px solid #ddd}.nav-tabs-bottom>li{margin-bottom:0;margin-top:-1px}.nav-tabs-bottom>li>a{border-radius:0 0 4px 4px}.nav-tabs-bottom>li>a:hover,.nav-tabs-bottom>li>a:focus,.nav-tabs-bottom>li.active>a,.nav-tabs-bottom>li.active>a:hover,.nav-tabs-bottom>li.active>a:focus{border:1px solid #ddd;border-top-color:transparent}.nav-tabs-left{border-bottom:0;border-right:1px solid #ddd}.nav-tabs-left>li{margin-bottom:0;margin-right:-1px;float:none}.nav-tabs-left>li>a{border-radius:4px 0 0 4px;margin-right:0;margin-bottom:2px}.nav-tabs-left>li>a:hover,.nav-tabs-left>li>a:focus,.nav-tabs-left>li.active>a,.nav-tabs-left>li.active>a:hover,.nav-tabs-left>li.active>a:focus{border:1px solid #ddd;border-right-color:transparent}.row>.nav-tabs-left{padding-right:0;padding-left:15px;margin-right:-1px;position:relative;z-index:1}.row>.nav-tabs-left+.tab-content{border-left:1px solid #ddd}.nav-tabs-right{border-bottom:0;border-left:1px solid #ddd}.nav-tabs-right>li{margin-bottom:0;margin-left:-1px;float:none}.nav-tabs-right>li>a{border-radius:0 4px 4px 0;margin-left:0;margin-bottom:2px}.nav-tabs-right>li>a:hover,.nav-tabs-right>li>a:focus,.nav-tabs-right>li.active>a,.nav-tabs-right>li.active>a:hover,.nav-tabs-right>li.active>a:focus{border:1px solid #ddd;border-left-color:transparent}.row>.nav-tabs-right{padding-left:0;padding-right:15px}.navmenu,.navbar-offcanvas{width:300px;height:auto;border-width:1px;border-style:solid;border-radius:4px}.navmenu-fixed-left,.navmenu-fixed-right,.navbar-offcanvas{position:fixed;z-index:1050;top:0;bottom:0;overflow-y:auto;border-radius:0}.navmenu-fixed-left,.navbar-offcanvas.navmenu-fixed-left{left:0;right:auto;border-width:0 1px 0 0}.navmenu-fixed-right,.navbar-offcanvas{left:auto;right:0;border-width:0 0 0 1px}.navmenu-nav{margin-bottom:10px}.navmenu-nav.dropdown-menu{position:static;margin:0;padding-top:0;float:none;border:none;-webkit-box-shadow:none;box-shadow:none;border-radius:0}.navbar-offcanvas .navbar-nav{margin:0}@media (min-width:768px){.navbar-offcanvas{width:auto;border-top:0;box-shadow:none}.navbar-offcanvas.offcanvas{position:static;display:block!important;height:auto!important;padding-bottom:0;overflow:visible!important}.navbar-offcanvas .navbar-nav.navbar-left:first-child{margin-left:-15px}.navbar-offcanvas .navbar-nav.navbar-right:last-child{margin-right:-15px}.navbar-offcanvas .navmenu-brand{display:none}}.navmenu-brand{display:block;font-size:18px;line-height:20px;padding:10px 15px;margin:10px 0}.navmenu-brand:hover,.navmenu-brand:focus{text-decoration:none}.navmenu-default,.navbar-default .navbar-offcanvas{background-color:#f8f8f8;border-color:#e7e7e7}.navmenu-default .navmenu-brand,.navbar-default .navbar-offcanvas .navmenu-brand{color:#777}.navmenu-default .navmenu-brand:hover,.navbar-default .navbar-offcanvas .navmenu-brand:hover,.navmenu-default .navmenu-brand:focus,.navbar-default .navbar-offcanvas .navmenu-brand:focus{color:#5e5e5e;background-color:transparent}.navmenu-default .navmenu-text,.navbar-default .navbar-offcanvas .navmenu-text{color:#777}.navmenu-default .navmenu-nav>.dropdown>a:hover .caret,.navbar-default .navbar-offcanvas .navmenu-nav>.dropdown>a:hover .caret,.navmenu-default .navmenu-nav>.dropdown>a:focus .caret,.navbar-default .navbar-offcanvas .navmenu-nav>.dropdown>a:focus .caret{border-top-color:#333;border-bottom-color:#333}.navmenu-default .navmenu-nav>.open>a,.navbar-default .navbar-offcanvas .navmenu-nav>.open>a,.navmenu-default .navmenu-nav>.open>a:hover,.navbar-default .navbar-offcanvas .navmenu-nav>.open>a:hover,.navmenu-default .navmenu-nav>.open>a:focus,.navbar-default .navbar-offcanvas .navmenu-nav>.open>a:focus{background-color:#e7e7e7;color:#555}.navmenu-default .navmenu-nav>.open>a .caret,.navbar-default .navbar-offcanvas .navmenu-nav>.open>a .caret,.navmenu-default .navmenu-nav>.open>a:hover .caret,.navbar-default .navbar-offcanvas .navmenu-nav>.open>a:hover .caret,.navmenu-default .navmenu-nav>.open>a:focus .caret,.navbar-default .navbar-offcanvas .navmenu-nav>.open>a:focus .caret{border-top-color:#555;border-bottom-color:#555}.navmenu-default .navmenu-nav>.dropdown>a .caret,.navbar-default .navbar-offcanvas .navmenu-nav>.dropdown>a .caret{border-top-color:#777;border-bottom-color:#777}.navmenu-default .navmenu-nav.dropdown-menu,.navbar-default .navbar-offcanvas .navmenu-nav.dropdown-menu{background-color:#e7e7e7}.navmenu-default .navmenu-nav.dropdown-menu>.divider,.navbar-default .navbar-offcanvas .navmenu-nav.dropdown-menu>.divider{background-color:#f8f8f8}.navmenu-default .navmenu-nav.dropdown-menu>.active>a,.navbar-default .navbar-offcanvas .navmenu-nav.dropdown-menu>.active>a,.navmenu-default .navmenu-nav.dropdown-menu>.active>a:hover,.navbar-default .navbar-offcanvas .navmenu-nav.dropdown-menu>.active>a:hover,.navmenu-default .navmenu-nav.dropdown-menu>.active>a:focus,.navbar-default .navbar-offcanvas .navmenu-nav.dropdown-menu>.active>a:focus{background-color:#d7d7d7}.navmenu-default .navmenu-nav>li>a,.navbar-default .navbar-offcanvas .navmenu-nav>li>a{color:#777}.navmenu-default .navmenu-nav>li>a:hover,.navbar-default .navbar-offcanvas .navmenu-nav>li>a:hover,.navmenu-default .navmenu-nav>li>a:focus,.navbar-default .navbar-offcanvas .navmenu-nav>li>a:focus{color:#333;background-color:transparent}.navmenu-default .navmenu-nav>.active>a,.navbar-default .navbar-offcanvas .navmenu-nav>.active>a,.navmenu-default .navmenu-nav>.active>a:hover,.navbar-default .navbar-offcanvas .navmenu-nav>.active>a:hover,.navmenu-default .navmenu-nav>.active>a:focus,.navbar-default .navbar-offcanvas .navmenu-nav>.active>a:focus{color:#555;background-color:#e7e7e7}.navmenu-default .navmenu-nav>.disabled>a,.navbar-default .navbar-offcanvas .navmenu-nav>.disabled>a,.navmenu-default .navmenu-nav>.disabled>a:hover,.navbar-default .navbar-offcanvas .navmenu-nav>.disabled>a:hover,.navmenu-default .navmenu-nav>.disabled>a:focus,.navbar-default .navbar-offcanvas .navmenu-nav>.disabled>a:focus{color:#ccc;background-color:transparent}.navmenu-inverse,.navbar-inverse .navbar-offcanvas{background-color:#222;border-color:#080808}.navmenu-inverse .navmenu-brand,.navbar-inverse .navbar-offcanvas .navmenu-brand{color:#999}.navmenu-inverse .navmenu-brand:hover,.navbar-inverse .navbar-offcanvas .navmenu-brand:hover,.navmenu-inverse .navmenu-brand:focus,.navbar-inverse .navbar-offcanvas .navmenu-brand:focus{color:#fff;background-color:transparent}.navmenu-inverse .navmenu-text,.navbar-inverse .navbar-offcanvas .navmenu-text{color:#999}.navmenu-inverse .navmenu-nav>.dropdown>a:hover .caret,.navbar-inverse .navbar-offcanvas .navmenu-nav>.dropdown>a:hover .caret,.navmenu-inverse .navmenu-nav>.dropdown>a:focus .caret,.navbar-inverse .navbar-offcanvas .navmenu-nav>.dropdown>a:focus .caret{border-top-color:#fff;border-bottom-color:#fff}.navmenu-inverse .navmenu-nav>.open>a,.navbar-inverse .navbar-offcanvas .navmenu-nav>.open>a,.navmenu-inverse .navmenu-nav>.open>a:hover,.navbar-inverse .navbar-offcanvas .navmenu-nav>.open>a:hover,.navmenu-inverse .navmenu-nav>.open>a:focus,.navbar-inverse .navbar-offcanvas .navmenu-nav>.open>a:focus{background-color:#080808;color:#fff}.navmenu-inverse .navmenu-nav>.open>a .caret,.navbar-inverse .navbar-offcanvas .navmenu-nav>.open>a .caret,.navmenu-inverse .navmenu-nav>.open>a:hover .caret,.navbar-inverse .navbar-offcanvas .navmenu-nav>.open>a:hover .caret,.navmenu-inverse .navmenu-nav>.open>a:focus .caret,.navbar-inverse .navbar-offcanvas .navmenu-nav>.open>a:focus .caret{border-top-color:#fff;border-bottom-color:#fff}.navmenu-inverse .navmenu-nav>.dropdown>a .caret,.navbar-inverse .navbar-offcanvas .navmenu-nav>.dropdown>a .caret{border-top-color:#999;border-bottom-color:#999}.navmenu-inverse .navmenu-nav.dropdown-menu,.navbar-inverse .navbar-offcanvas .navmenu-nav.dropdown-menu{background-color:#080808}.navmenu-inverse .navmenu-nav.dropdown-menu>.divider,.navbar-inverse .navbar-offcanvas .navmenu-nav.dropdown-menu>.divider{background-color:#222}.navmenu-inverse .navmenu-nav.dropdown-menu>.active>a,.navbar-inverse .navbar-offcanvas .navmenu-nav.dropdown-menu>.active>a,.navmenu-inverse .navmenu-nav.dropdown-menu>.active>a:hover,.navbar-inverse .navbar-offcanvas .navmenu-nav.dropdown-menu>.active>a:hover,.navmenu-inverse .navmenu-nav.dropdown-menu>.active>a:focus,.navbar-inverse .navbar-offcanvas .navmenu-nav.dropdown-menu>.active>a:focus{background-color:#000}.navmenu-inverse .navmenu-nav>li>a,.navbar-inverse .navbar-offcanvas .navmenu-nav>li>a{color:#999}.navmenu-inverse .navmenu-nav>li>a:hover,.navbar-inverse .navbar-offcanvas .navmenu-nav>li>a:hover,.navmenu-inverse .navmenu-nav>li>a:focus,.navbar-inverse .navbar-offcanvas .navmenu-nav>li>a:focus{color:#fff;background-color:transparent}.navmenu-inverse .navmenu-nav>.active>a,.navbar-inverse .navbar-offcanvas .navmenu-nav>.active>a,.navmenu-inverse .navmenu-nav>.active>a:hover,.navbar-inverse .navbar-offcanvas .navmenu-nav>.active>a:hover,.navmenu-inverse .navmenu-nav>.active>a:focus,.navbar-inverse .navbar-offcanvas .navmenu-nav>.active>a:focus{color:#fff;background-color:#080808}.navmenu-inverse .navmenu-nav>.disabled>a,.navbar-inverse .navbar-offcanvas .navmenu-nav>.disabled>a,.navmenu-inverse .navmenu-nav>.disabled>a:hover,.navbar-inverse .navbar-offcanvas .navmenu-nav>.disabled>a:hover,.navmenu-inverse .navmenu-nav>.disabled>a:focus,.navbar-inverse .navbar-offcanvas .navmenu-nav>.disabled>a:focus{color:#444;background-color:transparent}.alert-fixed-top,.alert-fixed-bottom{position:fixed;width:100%;z-index:1035;border-radius:0;margin:0;left:0}@media (min-width:992px){.alert-fixed-top,.alert-fixed-bottom{width:992px;left:50%;margin-left:-496px}}.alert-fixed-top{top:0;border-width:0 0 1px}@media (min-width:992px){.alert-fixed-top{border-bottom-right-radius:4px;border-bottom-left-radius:4px;border-width:0 1px 1px}}.alert-fixed-bottom{bottom:0;border-width:1px 0 0}@media (min-width:992px){.alert-fixed-bottom{border-top-right-radius:4px;border-top-left-radius:4px;border-width:1px 1px 0}}.offcanvas{display:none}.offcanvas.in{display:block}@media (max-width:767px){.offcanvas-xs{display:none}.offcanvas-xs.in{display:block}}@media (max-width:991px){.offcanvas-sm{display:none}.offcanvas-sm.in{display:block}}@media (max-width:1199px){.offcanvas-md{display:none}.offcanvas-md.in{display:block}}.offcanvas-lg{display:none}.offcanvas-lg.in{display:block}.canvas-sliding{-webkit-transition:top .35s,left .35s,bottom .35s,right .35s;transition:top .35s,left .35s,bottom .35s,right .35s}.offcanvas-clone{height:0!important;width:0!important;overflow:hidden!important;border:none!important;margin:0!important;padding:0!important;position:absolute!important;top:auto!important;left:auto!important;bottom:0!important;right:0!important;opacity:0!important}.table.rowlink td:not(.rowlink-skip),.table .rowlink td:not(.rowlink-skip){cursor:pointer}.table.rowlink td:not(.rowlink-skip) a,.table .rowlink td:not(.rowlink-skip) a{color:inherit;font:inherit;text-decoration:inherit}.table-hover.rowlink tr:hover td,.table-hover .rowlink tr:hover td{background-color:#cfcfcf}.btn-file{overflow:hidden;position:relative;vertical-align:middle}.btn-file>input{position:absolute;top:0;right:0;margin:0;opacity:0;filter:alpha(opacity=0);font-size:23px;height:100%;width:100%;direction:ltr;cursor:pointer}.fileinput{margin-bottom:9px;display:inline-block}.fileinput .form-control{padding-top:7px;padding-bottom:5px;display:inline-block;margin-bottom:0;vertical-align:middle;cursor:text}.fileinput .thumbnail{overflow:hidden;display:inline-block;margin-bottom:5px;vertical-align:middle;text-align:center}.fileinput .thumbnail>img{max-height:100%}.fileinput .btn{vertical-align:middle}.fileinput-exists .fileinput-new,.fileinput-new .fileinput-exists{display:none}.fileinput-inline .fileinput-controls{display:inline}.fileinput-filename{vertical-align:middle;display:inline-block;overflow:hidden}.form-control .fileinput-filename{vertical-align:bottom}.fileinput.input-group{display:table}.fileinput.input-group>*{position:relative;z-index:2}.fileinput.input-group>.btn-file{z-index:1}.fileinput-new.input-group .btn-file,.fileinput-new .input-group .btn-file{border-radius:0 4px 4px 0}.fileinput-new.input-group .btn-file.btn-xs,.fileinput-new .input-group .btn-file.btn-xs,.fileinput-new.input-group .btn-file.btn-sm,.fileinput-new .input-group .btn-file.btn-sm{border-radius:0 3px 3px 0}.fileinput-new.input-group .btn-file.btn-lg,.fileinput-new .input-group .btn-file.btn-lg{border-radius:0 6px 6px 0}.form-group.has-warning .fileinput .fileinput-preview{color:#8a6d3b}.form-group.has-warning .fileinput .thumbnail{border-color:#faebcc}.form-group.has-error .fileinput .fileinput-preview{color:#a94442}.form-group.has-error .fileinput .thumbnail{border-color:#ebccd1}.form-group.has-success .fileinput .fileinput-preview{color:#3c763d}.form-group.has-success .fileinput .thumbnail{border-color:#d6e9c6}.input-group-addon:not(:first-child){border-left:0}   

    table span.preview{
        width: 150px;
        float: left;
    } 
    </style>



    <script src="<?=ADMIN_RESOURCE_PATH?>js/jasny-bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
     <script type="text/javascript">
    $(document).ready(function() {
        var noimagepath = "<?php echo ADMIN_RESOURCE_PATH.'img/no-image.png'; ?>";
        $('#img-remove').click(function(event) {
            $('#image').val('');
            $('#img-remove').hide();
            $('#prev_img').prop('src', noimagepath);
        });


        $('.fileupload-new').click(function(event) {
            $('#img-remove').hide();
        });
    });    
</script>
<style>
    .top{
    margin: 100px;

}
img{
    margin: 20px 0;
    border: 8px double #CCC;
    width: 100%;
}

.fancybox-inner{
    min-height: 500px !important;
}
</style>