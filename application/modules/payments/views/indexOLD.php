<!-- <?php 
    echo "<pre>";
    print_r($list);
    
?> -->
<section class="top_innerpage">
    <div class="container-custom">
        <div class="ti-content ">
            <div class="title-ti pt15 fnt-bld txt-upp">
            <?php 
                        echo "Payment Lists";             
                    ?>
            </div>
            <div class="breadcrums mtsmall">
                <ol class="list-unstyled list-inline">
                    <li class="list-inline-item breadcrumb-item"><a href="<?= base_url() ?>">
                        <?php echo $this->lang->line('label_nav_home') ?>
                    </a></li>
                    <li class="list-inline-item breadcrumb-item active">
                        <?php 
                            echo "Payment Lists";            
                        ?>
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
            <div class="col-lg-3">
                <div class="mt-30">
                    <ul class="list-unstyled menu-list-sa">
                        <?php 
                            foreach ($list as $key => $value) {
                                if(!empty($value->title)){
                                ?>
                            <li>
                                <a href="<?=base_url('/payments/'.$value->slug);?>" class="<?php if($this->uri->segment(2) == $value->slug) { ?> active <?php } ?>">

                                    <?= $value->title; ?> 
                                </a>
                            </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>

            </div>
            <div class="col-lg-9">
                <div class="section-header mt-30  mb-15 section-base-color">
                    <?php 
                        echo $list[0]->title;            
                    ?>
                </div>
                <div class="clearfix"></div>

                <table class="table">

                    <tbody>
                        <?php 

                        if(isset($list) &&!empty($list)) {
                                foreach ($list as $value) :
                                ?>
                        <tr>
                            <td> <a href="<?php echo $value->link ?>" target="_blank"> <?=$value->title?> </a></td>

                            <td style="width:150px;">
                            <?php if(!empty($value->file)){?>
                            <a href="<?=$value->file?>" target="_blank" class="cs-btn"
                                    download>
                                    <i class="fa fa-download"></i> Download
                                </a>
                            <?php }?>
                            </td>
                        </tr>
                        <?php endforeach;
            }else{
            echo "<tr><td>No Record Found !!</td></tr>";
            }
            ?>
                    </tbody>
                </table>
            </div>
            

        </div>
    </div>
</div>