<!-- <section class="top_innerpage" style="background: url(<?=RESOURCE_PATH;?>img/slide1.jpg);background-position: 70% 0;">
  <div class="ti-content text-center"> -->
<!-- <div class="title-ti"> <?php echo $this->lang->line('nav_header_report'); ?> </div> -->
<!--  <div class="breadcrums">
      <ol class="list-unstyled list-inline">
        <li class="list-inline-item breadcrumb-item"><a href="<?=base_url();?>"><?php echo $this->lang->line('label_nav_home'); ?></a></li>
        <li class="list-inline-item breadcrumb-item active" aria-current="page"><?php echo $this->lang->line('nav_header_report'); ?></li>
      </ol>
    </div>
  </div>
</section> -->


<section class="top_innerpage">
    <div class="container-custom">
        <div class="ti-content ">
            <div class="title-ti pt15 fnt-bld txt-upp">
                <?php echo $this->lang->line('nav_header_report'); ?>
            </div>
            <div class="breadcrums mtsmall">
                <ol class="list-unstyled list-inline">
                    <li class="list-inline-item breadcrumb-item"><a
                            href="#"><?php echo $this->lang->line('label_nav_home'); ?></a></li>
                    <li class="list-inline-item breadcrumb-item active"><a
                            href="#"><?php echo $this->lang->line('nav_header_report'); ?></a></li>
                </ol>
            </div>
        </div>
    </div>

</section>
<div class="content-section listing-page-forall">
    <div class="container-custom">
        <div class="row">
            <div class="col-lg-9">
                <div class="filter-section">
                    <div class="row">
                        <div class="col-lg-3">
                            <a href="#" class="back-button"><i class="fas fa-arrow-left"></i> back</a>
                            <!-- <div class="form-group">
                                <label for="">Year</label>
                                <select name="" id="" class="form-control form-control-sm ">
                                    <option value="">Select Year</option>
                                    <option value="">2077</option>
                                    <option value="">2076</option>
                                    <option value="">2075</option>
                                </select>
                            </div> -->
                        </div>
                        <div class="col-lg-3">
                            <!-- <div class="form-group">
                                <label for="">Period</label>
                                <select name="" id="" class="form-control form-control-sm">
                                    <option value="">1st Quatarly</option>
                                    <option value="">2nd Quatarly</option>
                                    <option value="">3rd Quatarly</option>
                                    <option value="">4th Quatarly</option>
                                </select>
                            </div> -->
                        </div>
                        <div class="col-lg-1">
                            <!-- <div class="form-group no-label">
                               
                               <button class="btn btn-primary btn-sm btn-block">Search</button>
                            </div> -->
                        </div>
                        <div class="col-lg-5">
                        <div class="form-group no-label">
                            <select name="" class="form-control" id="slect-s">
                                <option value="">Select Fiscal Year</option>
                                <?php 
                        		if(!empty($list)){
                        			foreach($list as $k => $item){
                        				?>
                                <option class="fnt-bld mb-15" value="ficial<?php echo $item->fis_id ?>">
                                    <?=$item->year; ?>
                                </option>
                                <?php
                        			}
                        		}
                        	 ?>
                            </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="mt-30 mb-30">
                    <div class="fis-ls">
                        <ul>
                            <?php 
                        		if(!empty($list)){
                        			foreach($list as $k => $item){
                        				?>
                            <li class="fs-list fs-year-list">
                                <a href="javascript:void(0)" class="fnt-bld mb-15"
                                    data-tag="ficial<?php echo $item->fis_id ?>">
                                    <?=$item->year; ?>
                                </a>
                            </li>
                            <?php
                        			}
                        		}
                        	 ?>
                            <!-- <li class="fs-list fs-year-list"><a href="javascript:void(0)" class="fnt-bld mb-15" data-tag="ficial1">2071/72</a>  </li>
                            <li class="fs-list fs-year-list"><a href="javascript:void(0)" class="fnt-bld mb-15" data-tag="ficial2">2072/72</a>  </li> -->
                        </ul>
                    </div>
                    <div class="cleafix"></div>
                    <div class="fis-details">
                       

                        <?php 
						if(!empty($content)){
							foreach($content as $k=>$value){
								?>
                        <div class="fis-details">
                            <div class="cata-list" id="ficial<?php echo $value->fis_id ?>">
                                <div class="section-header mt-30 section-base-color">
                                    Fiscal Year <?php echo $value->year ?>
                                </div>

                                <div class="content">
                                    <table class="table">

                                        <tbody>


                                            <tr>
                                                <td>
                                                    <a href="<?php echo $value->file ?>" target="_blank">
                                                        <?php echo $value->title ?>
                                                    </a>
                                                    <span class="date-">
                                                        २०७४-९-७
                                                    </span>
                                                </td>

                                                <td style="width:150px;">
                                                    <a href="<?php echo $value->file ?>" target="_blank" class="cs-btn"
                                                        download="">
                                                        <i class="fa fa-download"></i> Download
                                                    </a>
                                                </td>
                                            </tr>





                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <?php

							}
						}
					 ?>



                        <div class="cata-list" id="ficial100">test three</div>
                    </div>

                </div>












                <ul class="list-unstyled row re-list-rbcl d-none" id="myDiv">
                    <?php if(isset($list) &&!empty($list)) :
            foreach ($list as $value) :
            ?>
                    <li class="col-12 col-lg-4 s-data-s">
                        <div class="box-area-li">

                            <div class="row">
                                <?php if (isset($value->file) && !empty($value->file)){ ?>

                                <div class="col-6">
                                    <div class="dow-b-icon">
                                        <a target="_blank" href="<?=$value->file?>" download>
                                            <i class="fa fa-download fa-2x"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <a target="_blank" href="<?=$value->file?>">
                                        <span class=""><?php echo $this->lang->line('nav_header_report'); ?></span>
                                    </a>
                                </div>
                                <?php } else{} ?>

                                <div class="col-12">
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

                            </div>
                        </div>

                    </li>
                    <?php
            endforeach;
            endif;
            ?>
                </ul>
                <div class="d-none">
                    <?php echo $pages;?>
                </div>
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
                            <li class="ser-item<?=($this->uri->segment(2)==$value->slug)?'active':''?>">
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
<style>
.no-label-form {
    margin-top: 31px;
    float: left;
    width: 100%;
}

.no-label-form input {
    width: 100%;
    background: no-repeat;
    border: 1px solid #ccc;
    font-size: 13px;
    height: 31px;
    padding: 5px 7px;
    border-radius: 4px;
}
</style>