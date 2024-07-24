<?php 
// PPC Table
$pageID = ( isset( $args['page_id'] ) && !empty( $args['page_id'] ) ) ? $args['page_id'] : 0;
$ppcTbl = get_field('ppc-ptable');
if( isset( $ppcTbl['enable'] ) && ($ppcTbl['enable'] == "yes") ) :

$gsLink = 'https://calendly.com/pixelcrayons/project-discovery';

$clmFor     = $ppcTbl['tc-4'];  
$hasAllClm  = ( $clmFor ) ? true : false;
$flexClm    = ( $hasAllClm === true ) ? 'flex-5' : 'flex-4';
?>
<section id="pxl-ppc-table" class="table-list-section show-all bg-light padding-t-120 padding-b-120">
<div class="container">
<div class="heading text-center"><?php echo $ppcTbl['sec-content']; ?></div>
<div class="table-wrap">
  <div class="dis-flex col-box-outer margin-t-100">
    <div class="<?php echo $flexClm; ?> table-list">
      <ul>
        <?php 
        $tblClm = $ppcTbl['fld-clm'];
        if( $tblClm ){
          $cl = 0;
          foreach( $tblClm as $row ){ $cl++;
          $class = "";
          if( $cl == 1 ){
            $class = "title clr-white";  
          }elseif( $cl == 2 ){
            //echo '<li class="opacity-0 more-txt"><p>Ideal for building a digital presence and generating initial leads.</p></li>';
          }elseif( $cl > 6 ){
            $class = "m-hdn";
          }
          $isInt_row = __pxl_int_block( $row['data'] );
            if( $isInt_row !== false ){
              //echo '<li class="'.$lClass.' on-inter">'.$isInt_row.'</li>';
              echo '<li class="'.$class.' on-inter">'.$isInt_row.'</li>';
            }else{
              echo '<li class="'.$class.'">'.$row['data'].'</li>';
            }
          }
        } 
        ?>
        <li class="more-spc">Need more information?<br>
          <a href="<?php echo site_url('/contact-us'); ?>" class="ts">Talk to Sales</a>
        </li>
      </ul>
    </div>
    <div class="<?php echo $flexClm; ?> table-list">
      <ul>
        <?php 
        $clmOne     = $ppcTbl['tc-1'];
        $oneLink    = end( $clmOne );
        $oneLink    = $oneLink['data'];
        array_pop( $clmOne );
        if( $clmOne ){
          $i = 0;
          foreach( $clmOne as $row ){ $i++;
            $lClass = "";
            if( $i == 1 ){
            $lClass = "title";  
            }elseif( $i == 2 ){
            $lClass = "more-txt";
            }elseif( $i > 6 ){
            $lClass = "m-hdn";
            }
            $isInt_row = __pxl_int_block( $row['data'] );
            if( $isInt_row !== false ){
              echo '<li class="'.$lClass.' on-inter">'.$isInt_row.'</li>';
            }else{
              echo '<li class="'.$lClass.'">'.__pxl_pricing($row['data']).'</li>';  
            }
            
          }
        }
        ?>
        <li class="more-spc">
          <div class="btn-sec">
            <a href="<?php echo $gsLink; ?>" class="btn rounded"><span class="text-white">Get Started</span></a>
          </div>
        </li>
      </ul>
    </div>
    <div class="<?php echo $flexClm; ?> table-list">
      <ul>
        <?php 
        $clmTwo     = $ppcTbl['tc-2'];
        $twoLink    = end( $clmTwo );
        $twoLink    = $twoLink['data'];
        array_pop( $clmTwo );
        if( $clmTwo ){
          $i =0;
          foreach( $clmTwo as $row ){ $i++;
            $lClass = "";
            if( $i == 1 ){
            $lClass = "title";  
            }elseif( $i == 2 ){
            $lClass = "more-txt";
            }elseif( $i > 6 ){
            $lClass = "m-hdn";
            }
            $isInt_row = __pxl_int_block( $row['data'] );
            if( $isInt_row !== false ){
              echo '<li class="'.$lClass.' on-inter">'.$isInt_row.'</li>';
            }else{
              echo '<li class="'.$lClass.'">'.__pxl_pricing($row['data']).'</li>';  
            }
            //echo '<li class="'.$lClass.'">'.__pxl_pricing($row['data']).'</li>';
          }
        }
        ?>
        <li class="more-spc">
          <div class="btn-sec">
            <a href="<?php echo $gsLink; ?>" class="btn rounded"><span class="text-white">Get Started</span></a>
          </div>
        </li>
      </ul>
    </div>
    <div class="<?php echo $flexClm; ?> table-list">
      <ul>
        <?php 
        $clmThree   = $ppcTbl['tc-3'];
        $thrLink    = end( $clmThree );
        $thrLink    = $thrLink['data'];
        array_pop( $clmThree );
        if( $clmThree ){
          $i =0;
          foreach( $clmThree as $row ){ $i++;
            $lClass = "";
            if( $i == 1 ){
            $lClass = "title";  
            }elseif( $i == 2 ){
            $lClass = "more-txt";
            }elseif( $i > 6 ){
            $lClass = "m-hdn";
            }
            $isInt_row = __pxl_int_block( $row['data'] );
            if( $isInt_row !== false ){
              echo '<li class="'.$lClass.' on-inter">'.$isInt_row.'</li>';
            }else{
              echo '<li class="'.$lClass.'">'.__pxl_pricing($row['data']).'</li>';  
            }
            //echo '<li class="'.$lClass.'">'.__pxl_pricing($row['data']).'</li>';
          }
        }
        ?>
        <li class="more-spc">
          <div class="btn-sec">
            <a href="<?php echo $gsLink; ?>" class="btn rounded"><span class="text-white">Get Started</span></a>
          </div>
        </li>
      </ul>
    </div>

    <?php if( $hasAllClm ) : ?>
    <div class="flex-5 table-list">
      <ul>
        <?php         
        $forLink    = end( $clmFor );
        $forLink    = $forLink['data'];
        array_pop( $clmFor );
        if( $clmFor ){
          $i =0;
          foreach( $clmFor as $row ){ $i++;
            $lClass = "";
            if( $i == 1 ){
            $lClass = "title";  
            }elseif( $i == 2 ){
            $lClass = "more-txt";
            }elseif( $i > 6 ){
            $lClass = "m-hdn";
            }
            $isInt_row = __pxl_int_block( $row['data'] );
            if( $isInt_row !== false ){
              echo '<li class="'.$lClass.' on-inter">'.$isInt_row.'</li>';
            }else{
              echo '<li class="'.$lClass.'">'.__pxl_pricing($row['data']).'</li>';  
            }
          }
        }
        ?>
        <li class="more-spc">
          <div class="btn-sec">
            <a href="<?php echo $gsLink; ?>" class="btn rounded"><span class="text-white">Get Started</span></a>
          </div>
        </li>
      </ul>
    </div>
    <?php endif; ?>
  </div>
</div>
<div class="view-more margin-t-50 text-center">
  <a href="javascript:void(0);" onclick="_morePPCTable();" class="active">
    <img loading="lazy" class="gt-dwn" src="<?php bloginfo('template_url'); ?>/dev-img/scroll-img.png" alt="Pixelcrayons" width="34" 
    height="34">
    <img loading="lazy" class="gt-up" src="<?php bloginfo('template_url'); ?>/dev-img/scroll-img-up.png" alt="Pixelcrayons" width="34" 
    height="34">
  </a>
</div>
</div>
</section>
<?php endif; ?>