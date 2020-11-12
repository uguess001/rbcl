<section class="content">
      <div class="row">
        <div class="col-md-3">
            <?php if ($this->session->userdata('user_type') == '1') {
              echo anchor( base_url().'admin/'.$url.'/record/create' , '<i class="fa fa-plus"></i> Compose', array('title' => 'Compose', 'class'=>'btn btn-primary btn-block margin-bottom'));
              } ?>
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Folders</h3>
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="<?php echo base_url().'admin/'.$url.'/record/list' ?>"><i class="fa fa-inbox"></i> Inbox
                  <span class="label label-primary pull-right"><?php echo $inboxcount ?></span></a></li>
                <li>
                  <?php if ($this->session->userdata('user_type') == '1') { 
                    echo anchor( base_url().'admin/'.$url.'/record/sent' , '<i class="fa fa-envelope-o"></i> Sent', array('title' => 'Sent')); 
                  } ?>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <?php if ($this->session->userdata('userid') == $record->created_by) { ?>
              <br>
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Seen Status</h3>
                  <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <?php if (!empty($viewlist)) {
                      foreach ($viewlist as $kl => $val) { ?>
                    <li><a href="<?php echo base_url().'admin/'.$url.'/record/list' ?>"><i class="fa fa-inbox"></i> <?php echo $val->username; ?>
                      <span class="label label-primary pull-right"><?php echo ($val->seenstatus == '1')?'Seen':'Not Seen'; ?></span></a></li>
                       <?php  } } ?>
                  </ul>
                </div>

                <!-- /.box-body -->
              </div>
          <?php } ?>
          <!-- /. box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $page_header; ?></h3>
            </div>
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3><?php echo $record->title; ?></h3>
                <br>
                <h5>From: <?php echo $record->username; ?>
                  <span class="mailbox-read-time pull-right"><?php echo $record->published_date; ?></span></h5>
              </div>
              <div class="mailbox-read-message">
                <?php echo $record->description; ?>
              </div>
              <!-- /.mailbox-read-message -->
              <div class="box-footer">
                <ul class="mailbox-attachments clearfix">
                  <li>
                      <a href="<?php echo $record->file; ?>" target='_blank'>
                          <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
                      </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>