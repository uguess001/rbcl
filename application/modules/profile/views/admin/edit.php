<div class="box">
    <div class="box-header with-border">
        <h4 class="box-title"><?php echo $page_header; ?>
            <span class="pull-right">
                <?php echo anchor( base_url().'admin/'.$url.'/record/list' , '<i class="fa fa-chevron-left"></i> View All', array('title' => 'View All', 'class'=>'btn btn-primary')); ?>
            </span>
        </h4>
    </div>
    <div class="box-body">
        <form action="#" method="POST" class='form-validate' id="officefrm" name="officefrm" enctype="multipart/form-data">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="title_en" class="control-label" >Title English</label>                    
                    <input class="small-input valid form-control" type="text" name="title_en" id="title_en" required value="<?php echo isset($record->title_en) ? $record->title_en : ''; ?>">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="title_np" class="control-label" >Title Nepali</label>
                    <input class="small-input valid form-control" type="text" name="title_np" id="title_np"  value="<?php echo isset($record->title_np) ? $record->title_np : ''; ?>">
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="link_url" class="control-label" >Links</label>
                    <input class="small-input valid form-control" type="text" name="link_url" id="link_url" required  value="<?php echo isset($record->link_url) ? $record->link_url : ''; ?>">
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label">Link Section</label>
                    <div class="controls">
                        <select class="small-input valid form-control" name="linksection_id" id="linksection_id">
                            <?php foreach ($sectionlist as $list) { ?>
                                <option value="<?php echo $list->id ?>" <?php echo ((isset($record->linksection_id) && $record->linksection_id == $list->id) ? 'selected' : ''); ?> ><?php echo $list->linksection_name_en  ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label">Status</label>
                    <div class="controls">
                        <select class="small-input valid form-control" name="status" id="status_id">
                            <option value="1" <?php echo ((isset($record->status) && $record->status == '1') ? 'selected' : ''); ?>>Active</option>
                            <option value="0" <?php echo ((isset($record->status) && $record->status == '0') ? 'selected' : ''); ?>>InActive</option>
                        </select>
                    </div>
                </div>
            </div>

            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="clearfix"></div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
               
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <input type="hidden" name="process" value="true">
                        <input type="hidden" name="id" value="<?php echo (isset($record->id) ? $record->id : ''); ?>">
                        <button type="button" class="btn" onclick="history.go(-1)">Cancel</button>
                    </div>
            </div>
        </form>
    </div>
</div>