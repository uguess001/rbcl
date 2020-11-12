<section class="top_innerpage">
    <div class="container-custom">
        <div class="ti-content ">
            <div class="title-ti pt15 fnt-bld txt-upp">
                <?php echo $this->lang->line('contact_us'); ?>
            </div>
            <div class="breadcrums mtsmall">
                <ol class="list-unstyled list-inline">
                    <li class="list-inline-item breadcrumb-item"><a href="#">
                        <?php echo $this->lang->line('label_nav_home'); ?>
                    </a></li>
                    <li class="list-inline-item breadcrumb-item active" aria-current="page">
                        <?php echo $this->lang->line('contact_us'); ?>
                    </li>
                </ol>
            </div>
        </div>
    </div>

</section>
<div class="map">
     <div class="container-custom">
    <iframe src="<?=$contactus->map?>" width="100%" height="450" frameborder="1" style="border:0">
    </iframe>
</div></div>
<div class="content-section">
    <div class="container-custom">

        <div class="row">
            <div class="col-lg-5">
                <div class="insurance-contact">
                    <ul class="list-unstyled">
                        <li>
                            <div class="i-d-contents">
                                <div class="i-d-icon-holder">
                                    <span class="fa fa-map-marker"></span>
                                </div>
                                <div class="i-d-content">
                                    <?php echo $this->lang->line('visit_us');?>
                                    <span><?php echo $this->lang->line('come_visit');?>
                                        <a href=""><?=isset($contactus->address)?$contactus->address:'';?></a>
                                        ,</span>
                                    <span><?php echo ($lang=='np')?'काठमाडौं':'Kathmandu';?></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="i-d-contents">
                                <div class="i-d-icon-holder">
                                    <span class="fa fa-phone"></span>
                                </div>
                                <div class="i-d-content">
                                    <?php echo $this->lang->line('call_us');?>
                                    <span><?php echo $this->lang->line('feel_free'); ?> <a
                                            href="tel:<?=$contactus->phone?>"><?php echo ($lang=='np')?changeNumberUnicode($contactus->phone):$contactus->phone?></a>,</span>
                                    <span><?php echo $this->lang->line('sunday');?></span>
                                    <span><?php echo $this->lang->line('friday');?></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="i-d-contents">
                                <div class="i-d-icon-holder">
                                    <span class="fas fa-envelope"></span>
                                </div>
                                <div class="i-d-content">
                                    <?php echo $this->lang->line('send_feedback');?>
                                    <span><?php echo $this->lang->line('drop_email'); ?><a
                                            href="mailto:<?=$contactus->email?>"><?=$contactus->email?></a>,</span>
                                    <span><?php echo $this->lang->line('get_back'); ?>.</span>
                                </div>
                            </div>
						</li>
						<li>
                            <div class="i-d-contents">
                                <div class="i-d-icon-holder">
                                    <span class="fas fa-home"></span>
                                </div>
                                <div class="i-d-content">
                                    <?php echo $this->lang->line('our_branches'); ?>
                                    <span>Find your nearest barnch on <a
                                            href="<?=base_url('/branches');?>">here</a></span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-7">
                <form id="modalform" method="post" action="#">
                    <div class="form-row form-group">
                        <div class="col">
                            <select name="department" class="form-control selectoption" required>
                                <option value=""><?php echo ($lang=='np')?'विभाग चयन गर्नुहोस्':'Select Services';?>
                                </option>
                                <?php if(!empty($services)) {
										foreach ($services as $val) { ?>
                                <option value="<?= $val->id; ?>"><?=$val->title?></option>
                                <?php } } ?>
                            </select>
                            <span class="text-danger" id="department-error"></span>
                        </div>
                    </div>
                    <div class="form-row form-group">
                        <div class="col">
                            <input type="text" class="form-control"
                                placeholder="<?php echo ($lang=='np')?'पहिलो नाम':'First Name';?>" name="firstname">
                            <span class="text-danger" id="firstname-error"></span>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control"
                                placeholder="<?php echo ($lang=='np')?'थर':'Last Name';?>" name="lastname">
                            <span class="text-danger" id="lastname-error"></span>
                        </div>
                    </div>
                    <div class="form-row form-group">
                        <div class="col">
                            <input type="email" class="form-control"
                                placeholder="<?php echo ($lang=='np')?'इमेल':'Email';?>" name="email">
                            <span class="text-danger" id="email-error"></span>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control"
                                placeholder="<?php echo ($lang=='np')?'फोन':'Phone';?>" name="phone">
                            <span class="text-danger" id="phone-error"></span>
                        </div>
                    </div>
                    <div class="form-row form-group">
                        <div class="col">
                            <textarea class="form-control" rows="6"
                                placeholder="<?php echo ($lang=='np')?'सन्देश....':'Message....';?>"
                                name="message"></textarea>
                            <span class="text-danger" id="message-error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="checkprocess" value="true">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                            value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <button type="button" class="btn btn-primary btn-sendre" id="btn-contactus">
                            <?php echo ($lang=='np')?'पठाउनुहोस्':'Send Request';?>
                        </button>
                        <h6 class="loading-ajax d-none">Loading...</h6>
                        <h4 id="message-area" class="text-success"></h4>
                    </div>
                </form>
            </div>

        </div>
    </div>
    