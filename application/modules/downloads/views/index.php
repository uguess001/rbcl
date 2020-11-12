<!-- <?php 
    echo "<pre>";
    print_r($list);
    
?> -->
<section class="top_innerpage">
    <div class="container-custom">
        <div class="ti-content ">
           
            <div class="breadcrums mtsmall">
                <ol class="list-unstyled list-inline">
                    <li class="list-inline-item breadcrumb-item"><a href="#">
                        <?php echo $this->lang->line('label_nav_home'); ?>
                    </a></li>
                    <li class="list-inline-item breadcrumb-item active">
                        <?php 
                            echo $content[0]->cat_title;            
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
	<div class="section-header mt-30 fnt-a2 section-base-color fnt-bld">
	 <?php 
                        echo $content[0]->cat_title;            
                    ?>    </div>
<div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-3">
                <div class="mt-30">
                    <ul class="list-unstyled menu-list-sa">
                        <?php 
                            foreach ($list as $key => $value) {
                                if(!empty($value->title)){
                                ?>
                            <li>
                                <a href="<?=base_url('/downloads/documents/'.$value->id);?>" class="<?php if($this->uri->segment(3) == $value->id) { ?> active <?php } ?>">

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
                
                <div class="clearfix"></div>
    <div class="mt-15">
        <table class="table">

                    <tbody>
                        <?php if(isset($content) &&!empty($content)) {
                                foreach ($content as $value) :
                                ?>
                        <tr>
                            <td> <a href="<?=$value->file?>" target="_blank"> <?=$value->title?> </a> <span
                                    class="date-">
                                    <?php
                                        $createdOn= date('Y-m-d', strtotime($value->CreatedOn));
                                        echo ($lang=='np')?changeNumberUnicode(convert2nepali($createdOn)):$createdOn;
                                    ?>
                                </span></td>

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
            <div class="col-lg-9 d-none">
                <div class="mt-30">

                    <div class="row">

                    </div>
                    


                    <ul class="list-unstyled row re-list-rbcl">
                        <?php if(!isset($content) && empty($content)) {
                            foreach ($list as $value) :
                        ?>
                        <li class="col-12 col-lg-12">
                            <div class="box-area-li">
                                <div class="row">
                                    <?php if (isset($value->file) && !empty($value->file)){?>

                                    <div class="col-1">
                                        <div class="dow-b-icon">
                                            <a href="<?=$value->file?>" target="_blank" download>
                                                <i class="fa fa-download fa-2x"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-11">
                                        
                                        <div class="d-title">
                                            <?=$value->title?>
                                        </div>
                                        <div class="p-date-r">
                                            <?php
                                                $createdOn= date('Y-m-d', strtotime($value->CreatedOn));
                                                echo ($lang=='np')?changeNumberUnicode(convert2nepali($createdOn)):$createdOn;
                                            ?>
                                        </div>

                                    </div>
                                    <?php } else{} ?>
                                    <div class="col-12">

                                    </div>

                                </div>
                            </div>

                        </li>
                        <?php
            endforeach;
            }else{
            echo "<div class='inner-page-title'><p style='padding-left: 15px;'>No Record Found !!</p></div>";
            }
            ?>
                    </ul>
                    <div class="clearfix"></div>
                    <div class="page-s">
                        <?php echo $pages;?>
                    </div>
                </div>

            </div>
            <div class="col-lg-3 d-none">
                <div class="list-s-insure">
                    <div class="sidebar-title">
                        <?php echo $this->lang->line('innder_content_news'); ?>
                    </div>
                    <div class="sidebar-content">
                        <ul class="list-unstyled">
                            <?php if(isset($news) && !empty($news)) :
              foreach ($news as $value) :
              ?>
                            <li>
                                <a href="<?=base_url().'news/'.$value->slug?>">
                                    <div class="title-area" style="padding-left: 10px;">
                                        <?=$value->title?>
                                    </div>
                                    <div class="title-area">
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