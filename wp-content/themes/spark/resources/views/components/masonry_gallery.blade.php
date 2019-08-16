@include('components.content_header',
['classes' => 'uk-container uk-padding uk-padding-large uk-padding-remove-top uk-text-center', 'btn_classes' => 'uk-button-primary'])

@if(get_sub_field('gallery_type') === 'folder')

    @php
      $folder = get_sub_field('gallery_folder');

        $args = array(
        'post_type' => 'attachment',
        'numberposts' => -1,
        'post_status' => 'any',
        'orderby' => 'date',
        'order' => 'ASC',
        'tax_query' => array(
        array(
            'taxonomy' => 'nt_wmc_folder',
            'field' => 'term_id',
            'terms' => $folder
                )
            )
        );

        $images = get_posts( $args );
    @endphp
{{--<div class="gallery-wrap uk-grid-collapse" uk-grid>--}}
    <div class="ft-masonry uk-position-relative">


        <ul class=" uk-grid-collapse" uk-grid="masonry: true"
            uk-scrollspy="target: > .slide-item; cls:uk-animation-fade; delay: 250; offset-top:-100" uk-lightbox>
            {{--{{ sizeof($images) }}--}}
            @foreach($images as $key=>$image)

                @php
                    $med_url = wp_get_attachment_image_src($image->ID, 'medium');
                    $large_url = wp_get_attachment_image_src($image->ID, 'large');
                    $url = wp_get_attachment_image_src($image->ID, 'full');
                @endphp

                <div class="gallery-item">
                    <a class="uk-display-block" href="{{ $large_url[0] }}"
                       data-alt="{{ $image->alt }}"
                       data-caption="<a href='{{ $url[0] }}' target='_blank'>Download</a>">
                        <img data-src="{{ $med_url[0] }}" alt="{{ $image->alt }}"
                             uk-img="target: !* -*, !* +*" />
                    </a>
                </div>

            @endforeach
        </ul>

    </div>
@else
    @php
        $images = get_sub_field('gallery');
    @endphp
    {{--<div class="gallery-wrap uk-grid-collapse" uk-grid>--}}
    <div class="ft-masonry uk-position-relative">


        <ul class=" uk-grid-collapse" uk-grid="masonry: true"
            uk-scrollspy="target: > .slide-item; cls:uk-animation-fade; delay: 250; offset-top:-100" uk-lightbox>
            {{--{{ sizeof($images) }}--}}

            @foreach($images as $key=>$image)

                <div class="gallery-item">
                    <a class="uk-display-block uk-cover-container uk-height-medium" href="{{ $image['sizes']['large'] }}"
                       data-alt="{{ $image['alt'] }}"
                       data-caption="<a href='{{ $image['url'] }}' target='_blank'>Download</a>">
                        <img data-src="{{ $image['sizes']['medium_large'] }}" alt="{{ $image['alt'] }}"
                             uk-img="target: !* -*, !* +*"/>
                    </a>
                </div>

            @endforeach
        </ul>

    </div>
@endif
