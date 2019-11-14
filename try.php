/**
 * Get All Post Categories Drop Down
 * 
 *
 */
if( !function_exists('eb_show_categories') ) :
    function eb_show_categories($atts, $content=null) {
        $terms = get_categories(array(
            'orderby'   => 'name',
            'parent'    => 0
        ));
        ?>
        <div class="row">
        <select name="categories_drop_down" onchange="javascript:handleSelect(this)">
        <option value ="">Select Category</option>
                <?php
                    foreach( $terms as $term ) {
                        ?>
                             <option value ="<?php echo get_category_link($term->term_id); ?>"><a href="<?php echo get_category_link($term->term_id); ?>"><?php echo $term->name; ?></a> </option>
                        <?php
                    }
                ?>
            <select>
        </div>
            <script type="text/javascript">
                function handleSelect(elm)
                {
                    window.location = elm.value;
                }
            </script>
        <?php
        }
        add_shortcode('eb-post-categories', 'eb_show_categories');
        endif;
