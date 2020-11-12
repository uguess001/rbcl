      <div class="col-12 col-lg-3">
        <div class="row sidebar-area">
          <div class="list-s-insure">
            <div class="sidebar-title">
              Services
            </div>
            <div class="sidebar-content">
              <ul class="list-unstyled">
                <?php if(isset($services) && !empty($services)) :
                foreach ($services as $value) :
                ?>
                <li><a href="<?=base_url().'services/'.$value->slug?>"><?=$value->title?></a></li>
                <?php
                endforeach;
                endif;
                ?>
                
              </ul>
            </div>
          </div>

    <div class="list-s-gallery">
            <div class="sidebar-title">
              See our latest gallery
            </div>
           <div class="sidebar-content">

            <ul class="list-unstyled gallery-list-sidebar">

              <?php 
              if(isset($gallery) && !empty($gallery)):
                foreach ($gallery as $value) :
                  if($a<1):
              ?>
              <li style="width: 100%; overflow: hidden;"><a href="<?=base_url().'gallery/GetDetails/'.$this->Encryption->encode($value->id)?>"><img src="<?=base_url().'uploads/gallery/'.$value->featured?>" alt="Gallery 1"></a></li>

            <?php 
            $a++;
                endif;
              endforeach;
            endif;

            ?>

            </ul>

          </div>
          </div>

          
        </div>
      </div>