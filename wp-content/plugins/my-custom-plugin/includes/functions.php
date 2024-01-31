<?php
/**
 * change the post archive title to Games instead of Archive: games
 */
function custom_game_archive_title( $title ) {
    if ( is_post_type_archive( 'game' ) ) {
        $title = 'Games';
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'custom_game_archive_title' );

?>