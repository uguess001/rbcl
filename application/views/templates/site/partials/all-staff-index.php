<section class="top_innerpage">
    <div class="container-custom">
        <div class="ti-content ">
            <div class="breadcrums mtsmall">
                <ol class="list-unstyled list-inline">
                    <li class="list-inline-item breadcrumb-item"><a href="./"> <?php echo $this->lang->line('label_nav_home'); ?></a></li>
                    <li class="list-inline-item breadcrumb-item active">
                        <?php echo $this->lang->line('all_staffs'); ?>
                        </a>
                    </li>
                </ol>
            </div>
        </div>
    </div>

</section>
<div class="content-section listing-page-forall">
    <div class="container-custom">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-header mt-30  mb-15 section-base-color">
                     <?php echo $this->lang->line('all_staffs'); ?>
                </div>
                <div class="clearfix"></div>

                <table class="table-bordered table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th><?php echo $this->lang->line('sn'); ?></th>
                            <th><?php echo $this->lang->line('name'); ?></th>
                            <th><?php echo $this->lang->line('email'); ?></th>
                            <th><?php echo $this->lang->line('phone'); ?></th>
                            <th><?php echo $this->lang->line('post'); ?></th>
                            <th><?php echo $this->lang->line('more_information'); ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if(isset($list) &&!empty($list)) {
                            $count = 1;
                                foreach ($list as $k => $value) :
                                ?>

                        <tr>
                            <td>  
                                <?=$count++; ?>
                            </td>

                            <td>  
                                <?=$value->name?>
                            </td>

                            <td>  
                                <?=$value->email?>
                            </td>

                            <td>  
                                <?=$value->phone?>
                            </td>

                            <td>  
                                <?=$value->post?>
                            </td>

                            <td>  
                                <a href="<?=base_url().'staffs/staffdetails/'.$value->id?>" class="btn-link">
                                    <?php echo $this->lang->line('view_all'); ?>
                                </a>
                            </td>

                        </tr>
                        <?php endforeach;
            }
            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
