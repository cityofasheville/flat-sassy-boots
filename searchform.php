<form role="search" method="get" class="form-horizontal search-form" action="<?php echo home_url( '/' ); ?>">
  <fieldset>
    <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
     <div class="input-group">
      <input type="search" class="form-control search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
      <span class="input-group-btn">
        <button class="btn btn-primary" type="submit" value = ""><i class="fa fa-search"></i></button>
      </span>
    </div><!-- /input-group -->
  </fieldset>
</form>