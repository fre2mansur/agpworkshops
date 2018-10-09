<?php
/**
 * The template for displaying search forms in Underscores.me
 *
 * @package understrap
 */

?>


                    <form class="form-inline my-2 my-lg-0"  method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">

                    <input class="form-control mr-sm-2 field form-control" id="s" name="s" type="text"	
					placeholder="<?php esc_attr_e( 'Search &hellip;', 'understrap' ); ?>" value="<?php the_search_query(); ?>">

                    <button class="btn btn-outline-primary my-2 my-sm-0 submit" id="searchsubmit" name="submit" type="submit"
					value="<?php esc_attr_e( 'Search', 'understrap' ); ?>">Search</button>

                    </form>