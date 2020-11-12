<section class="top_innerpage">
    <div class="container-custom">
        <div class="ti-content ">
            <div class="breadcrums mtsmall">
                <ol class="list-unstyled list-inline">
                    <li class="list-inline-item breadcrumb-item"><a href="./"><?php echo $this->lang->line('label_nav_home'); ?></a></li>
                    <li class="list-inline-item breadcrumb-item active">
                        <?php echo $this->lang->line('surveyor_list'); ?>
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
                    <?php echo $this->lang->line('surveyor_list'); ?>
                </div>
                <div class="clearfix"></div>

                <table  id="myTable">
                    <thead class="thead-dark">
                        <tr>
                            <th><?php echo $this->lang->line('sn'); ?></th>
                            <th><?php echo $this->lang->line('surveyor_name'); ?> </th>
                            <th><?php echo $this->lang->line('surveyor_code'); ?> </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if(isset($list) &&!empty($list)) {
                                $count = 1;
                                foreach ($list as $k => $value) :
                                ?>

                        <tr>
                            <td>  
                                <?=$count++ ?>
                            </td>

                            <td>  
                                <?=$value->title?>
                            </td>

                            <td>  
                                <?=$value->code?>
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
