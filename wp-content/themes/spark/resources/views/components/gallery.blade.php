@include('components.content_header',
['classes' => 'uk-container uk-padding uk-padding-large uk-padding-remove-top uk-text-center', 'btn_classes' => 'uk-button-primary'])


@php
    $type = get_sub_field('gallery_type');

    if($type === 'upload'):

        $images = get_sub_field('gallery');

    elseif($type === 'category'):

        $cats = get_sub_field('gallery_category');
        $args = array(
            'post_type' => 'attachment',
            'posts_per_page' => -1,
            'post_status' => 'any',
            'tax_query' => array(
                array(
                    'taxonomy' => 'attachment_category',
                    'field'    => 'id',
                    'terms'    => $cats,
                ),
            ),

        );
        $images =  get_posts( $args);
    elseif($type === 'tag'):

        $tag = get_sub_field('gallery_tag');
        $args = array(
            'post_type' => 'attachment',
            'posts_per_page' => -1,
            'post_status' => 'any',
            'tax_query' => array(
                array(
                    'taxonomy' => 'attachment_tag',
                    'field'    => 'id',
                    'terms'    => $tag,
                ),
            ),

        );
        $images =  get_posts( $args);

    endif;

@endphp


@if($images)

    {{--<div class="gallery-wrap uk-grid-collapse" uk-grid>--}}
    <div class="ft-slider uk-position-relative" uk-slider="infinite: true; autoplay: true;">

        <div class="ft-prev uk-position-left uk-width-1-3 uk-height-1-1" uk-slider-item="previous"></div>
        <div class="arrow-cursor">
            <img style="opacity: 0" class="arrow-cursor__icon" src="/wp-content/themes/spark/public/img/left_shadow.svg"
                 uk-svg>
            <img style="opacity: 0" class="arrow-cursor__icon_center"
                 src="/wp-content/themes/spark/public/img/plus_shadow.svg" uk-svg>
        </div>

        <ul class="uk-slider-items uk-child-width-1-2@s uk-child-width-1-3"
            uk-scrollspy="target: > .slide-item; cls:uk-animation-fade; delay: 250; offset-top:-100" uk-lightbox>
            @foreach($images as $image)
                @if($type === 'upload')
                    <div class="slide-item uk-width-1-3@l uk-width-1-2@m uk-width-1-1 uk-height-medium uk-cover-container">
                        <a class="uk-display-block" href="{{ $image['url'] }}" data-alt="{{ $image['alt'] }}"
                           data-caption="{{ $image['caption'] }}">
                            <canvas class="uk-hidden@m" width="600" height="600"></canvas>
                            <canvas class="uk-visible@m" width="600" height="390"></canvas>
                            <img data-src="{{ $image['sizes']['medium_large'] }}" alt="{{ $image['alt'] }}"
                                 data-caption="{{ $image['caption']}}" uk-cover uk-img="target: !* -*, !* +*"/>
                        </a>
                    </div>
                @else
                    @php
                        $meta = get_post_meta($image->ID);
                        $med = wp_get_attachment_image_src($image->ID, 'medium_large');
                    @endphp
                    <div class="slide-item uk-width-1-3@l uk-width-1-2@m uk-width-1-1 uk-height-medium uk-cover-container">
                        <a class="uk-display-block" href="{{ $image->guid  }}" data-alt="{{ $image->post_title  }}"
                           data-caption="{{ $image->post_excerpt  }}">
                            <canvas class="uk-hidden@m" width="600" height="600"></canvas>
                            <canvas class="uk-visible@m" width="600" height="390"></canvas>
                            <img data-src="{{ $med[0] }}" alt="{{ $image->post_title  }}"
                                 data-caption="{{ $image->post_excerpt }}" uk-cover uk-img="target: !* -*, !* +*"/>
                        </a>
                    </div>
                @endif
            @endforeach

        </ul>

        <div class="ft-next uk-position-right uk-width-1-3 uk-height-1-1" uk-slider-item="next"></div>
    </div>

@endif
