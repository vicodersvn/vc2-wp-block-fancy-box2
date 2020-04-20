<?php
    $id = 'fancybox-' . $block['id'];
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    // Create class attribute allowing for custom "className" and "align" values.
    $className = 'fancybox';
    if( !empty($block['className']) ) {
        $className .= ' ' . $block['className'];
    }
    if( !empty($block['align']) ) {
        $className .= ' align' . $block['align'];
    }
    if( $is_preview ) {
        $className .= ' is-admin';
    }

    $vc_column = get_field('vc_column');
    $border_color = get_field('border_color');
    $fancy_style = get_field('fancy_style');
    $justify_content = get_field('justify_content');

?>
    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> {{ $fancy_style }}">
        <div class="container">  
            @if ($fancy_style == 'style1')
                <?php if( have_rows('fancy_items') ): ?>
                    <div class="fancy-items fancy-row row">
                        <?php while( have_rows('fancy_items') ): the_row(); 
                            $fancy_icon = get_sub_field('fancy_icon');
                            $fancy_title = get_sub_field('fancy_title');
                            $fancy_description = get_sub_field('fancy_description');
                        ?>
                            <div class="fancy-item vc-col-<?php echo $vc_column; ?>">  
                                <div class="fancy-content">
                                    <div class="fancy-icon">
                                        <img src="{{$fancy_icon}}" alt="image">
                                    </div>
                                    <div class="content-wrap">
                                        <?php if (!empty($fancy_title) ): ?>
                                            <h3 class="fancy-title" style="border-color: {{ $border_color }}"> <?php echo $fancy_title; ?> </h3>
                                        <?php endif ?>
                                        <?php if (!empty($fancy_description)): ?>
                                            <div class="fancy-description">
                                                <?php echo $fancy_description; ?>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <p>Please add some box.</p>
                <?php endif; ?>
            @else    
                <?php if( have_rows('fancy_2_items') ): ?>
                    <div class="fancy-items" style="justify-content: {{$justify_content}}">
                        <?php while( have_rows('fancy_2_items') ): the_row(); 
                            $fancy_title = get_sub_field('fancy_title');
                            $fancy_description = get_sub_field('fancy_description');
                        ?>
                            <div class="fancy-item">  
                                <div class="fancy-content">
                                    <div class="content-wrap">
                                        <?php if (!empty($fancy_title) ): ?>
                                            <h3 class="fancy-title"> <?php echo $fancy_title; ?> </h3>
                                        <?php endif ?>
                                        <?php if (!empty($fancy_description)): ?>
                                            <div class="fancy-description">
                                                <?php echo $fancy_description; ?>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <p>Please add some box.</p>
                <?php endif; ?>
            @endif      
            
        </div>
    </div>
<?php    