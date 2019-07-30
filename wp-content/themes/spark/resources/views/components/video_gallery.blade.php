@include('components.content_header',
['classes' => 'uk-container uk-padding uk-padding-large uk-padding-remove-top uk-text-center', 'btn_classes' => 'uk-button-primary'])


    {{--<div class="gallery-wrap uk-grid-collapse" uk-grid>--}}
    <div class="ft-slider ft-video-slider uk-position-relative" uk-slider="infinite: true; autoplay: true;" >

        <div class="ft-prev uk-position-left uk-width-1-3 uk-height-1-1"  uk-slider-item="previous"></div>
        <div class="arrow-cursor">
            <img style="opacity: 0" class="arrow-cursor__icon" src="/wp-content/themes/spark/public/img/left_shadow.svg" uk-svg>
            <img  class="arrow-cursor__icon_center video" src="/wp-content/themes/spark/public/img/plus_shadow.svg" uk-svg>
        </div>

        <ul class="uk-slider-items uk-child-width-1-2@s uk-child-width-1-3" uk-scrollspy="target: > .slide-item; cls:uk-animation-fade; delay: 250; offset-top:-100" uk-lightbox>
            {{--{{ sizeof($images) }}--}}
            @repeater('videos')
            @php
                $iframe = get_sub_field('youtube_url');
                preg_match('/src="(.+?)"/', $iframe, $matches);
                $src = $matches[1];
                $params = array(
                    'rel'    => 0,
                    'showinfo'    => 0,
                    'controls'    => 1,
                    'hd'        => 1,
                    'autohide'    => 1
                );
                $new_src = add_query_arg($params, $src);
                $iframe = str_replace($src, $new_src, $iframe);
                $attributes = 'frameborder="0"  uk-video="automute: true;autoplay: inview" class="uk-position-center"';
                $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);


                preg_match('/src="(.+?)"/', $iframe, $matches);
                $src = $matches[1];

            @endphp

            <div class="slide-item uk-width-1-3@l uk-width-1-2@m uk-width-1-1 uk-cover-container">
                <a class="uk-display-block" href="{{ $src }}">
                    <canvas width="640" height="360"></canvas>
                    {!! $iframe !!}
                </a>
            </div>
            @endrepeater
        </ul>

        <div class="ft-next uk-position-right uk-width-1-3 uk-height-1-1"  uk-slider-item="next"></div>
    </div>
