<?php
/**
 * Template for displaying search forms
 */

?>
<form class="searchForm" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="search" name="s" id="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr_x( 'Search your keyword', 'placeholder', 'ulina' ); ?>">
    <button type="submit"><i class="ulina-magnifying-glass"></i></button>
</form>
