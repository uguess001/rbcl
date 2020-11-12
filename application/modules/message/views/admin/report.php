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
                <li class="active"><a href="#"><i class="fa fa-inbox"></i> Inbox
                  <span class="label label-primary pull-right"><?php echo $inboxcount ?></span></a></li>
                <li>
                  <?php 
                    if ($this->session->userdata('user_type') == '1') {
                        echo anchor( base_url().'admin/'.$url.'/record/sent' , '<i class="fa fa-envelope-o"></i> Sent', array('title' => 'Sent')); 
                    }
                  ?>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $page_header; ?></h3>

              <div class="box-tools pull-right" style="display: none;">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search Mail">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
              </div>
              <div class="table-responsive mailbox-messages" style="padding: 10px;">
                <table class="table table-striped table-condensed">
                  <thead class="bg-primary">
                    <th width="10px">S.No.</th>
                    <th>Sender</th>
                    <th>Subject</th>
                    <th>Attachment</th>
                    <th>View</th>
                    <th>Status</th>
                  </thead>
                  <tbody>
                    <?php $i = $offset;
                    if(!empty($list)) {
                        foreach($list as $li) { $i++; ?>
                  <tr>
                    <td><?php echo $i;  ?></td>
                    <td class="mailbox-name">
                      <?php echo anchor( base_url().'admin/'.$url.'/view/'.$this->Encryption->encode($li->id), $li->username, array('title' => 'View')); ?>
                    <td class="mailbox-subject text-left"><?php echo word_limiter($li->title,15); ?></td>
                    <td class="mailbox-attachment">
                        <?php if (!empty($li->file)) {
                             echo anchor( $li->file, '<i class="fa fa-paperclip"></i>', array('title' => 'Image', 'target' => '_blank'));
                        } else { ?>
                            <img src="<?php echo base_url()?>application/resources/admin/img/icons/inactive.png?>">
                        <?php } ?></td>
                    <td>
                      <?php echo anchor( base_url().'admin/'.$url.'/view/'.$this->Encryption->encode($li->id), '<i class="fa fa-eye"></i>', array('title' => 'View')); ?>
                    </td>
                    <td><?php echo ($li->seenstatus == 1)?'<i class="fa fa-envelope-open" aria-hidden="true"></i>':'<i class="fa fa-envelope" aria-hidden="true"></i>'; ?></td>
                  </tr>
              <?php  } }
                    else { ?>
                        <tr>
                            <td colspan="8">No Records Found ! ! !</td>
                        </tr>
                <?php } ?>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>