<section class="top_innerpage">
    <div class="container-custom">
        <div class="ti-content ">
            <div class="breadcrums mtsmall">
                <ol class="list-unstyled list-inline">
                    <li class="list-inline-item breadcrumb-item"><a href="<?= base_url() ?>"> <?php echo $this->lang->line('label_nav_home'); ?></a></li>
                    <li class="list-inline-item breadcrumb-item active">
                        <?php echo ($lang == 'np') ? 'क्यारियर' : 'Career' ?>
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
            <div class="col-lg-9">
                <div class="section-header mt-30  mb-15 section-base-color">
                     <?php echo ($lang == 'np') ? 'क्यारियर' : 'Career' ?>
                </div>
                <div class="clearfix"></div>

                <table id="myTable">
                    <thead>
                        <tr>
                            <th><?php echo $this->lang->line('sn'); ?></th>
                            <th><?php echo $this->lang->line('label_nav_Download_title'); ?></th>
                            <th><?php echo $this->lang->line('label_nav_acts_DOWNLOADS'); ?></th>
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
                                <?=$value->title?>
                            </td>

                            
                            <td>
                            <?php if(!empty($value->file)){?>
                            <a href="<?=$value->file?>" target="_blank" class="cs-btn"
                                    download>
                                    <i class="fa fa-download"></i> Download
                                </a>
                            <?php }?>
                            </td>

                        </tr>
                        <?php endforeach;
            }
            ?>
                    </tbody>
                </table>
            </div>
            
            	<div class="col-lg-3">
			<div class="list-s-insure">
                    <div class="sidebar-title">
                        <?php echo $this->lang->line('label_nav_SERVICES'); ?>
                    </div>
                    <div class="sidebar-content">
                        <ul class="list-unstyled">
                            <?php if(isset($services) && !empty($services)) :
								  foreach ($services as $value) :
								  ?>
                            <li class="ser-item <?=($this->uri->segment(2)==$value->slug)?'active':''?>">
                                <a href="<?=base_url().'services/'.$value->slug?>">
                                    <div class="icon_area">
                                        <span class="<?=$value->icon?>"></span>
                                    </div>
                                    <div class="title-area">
                                        <?=$value->title?>
                                    </div>
                                </a>
                            </li>
                            <?php
								  endforeach;
								  endif;
								  ?>

                        </ul>
                    </div>
                </div>
			</div>
			
        </div>
    </div>
</div>
