<div class=" sidebar-area">
          <div class="list-s-insure">
            <div class="sidebar-title">
              NEWS
            </div>
            <div class="sidebar-content">
              <ul class="list-unstyled">
                <?php if(isset($news) && !empty($news)) :
                foreach ($news as $value) :
                ?>
                <li>
                  <a href="<?=base_url().'news/'.$value->slug?>">
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
          <div class="list-s-insure">
            <div class="sidebar-title">
              Services
            </div>
            <div class="sidebar-content">
              <ul class="list-unstyled">
                <?php if(isset($services) && !empty($services)) :
                foreach ($services as $value) :
                ?>
                <li class="nav-item <?=($this->uri->segment(2)==$value->slug)?'active':''?>">
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