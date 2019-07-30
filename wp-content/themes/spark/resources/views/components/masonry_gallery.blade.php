@include('components.content_header',
['classes' => 'uk-container uk-padding uk-padding-large uk-padding-remove-top uk-text-center', 'btn_classes' => 'uk-button-primary'])

@set($images = get_sub_field('gallery'))

@if($images)

    {{--<div class="gallery-wrap uk-grid-collapse" uk-grid>--}}
    <div class="ft-masonry uk-position-relative">

        <div class="masonry-cursor">
            <img  class="masonry-cursor__icon_center" src="/wp-content/themes/spark/public/img/plus_shadow.svg" uk-svg>
        </div>

        <ul class=" uk-grid-collapse" uk-grid="masonry: true" uk-scrollspy="target: > .slide-item; cls:uk-animation-fade; delay: 250; offset-top:-100" uk-lightbox>
            {{--{{ sizeof($images) }}--}}
           @php
               shuffle($images);
           @endphp
            @foreach($images as $key=>$image)

                <div class="gallery-item">
                    <a class="uk-display-block uk-cover-container uk-height-medium" href="{{ $image['url'] }}" data-alt="{{ $image['alt'] }}"  data-caption="<a href='{{ $image['url'] }}' download>Download</a>">
                        <img data-src="{{ $image['sizes']['medium_large'] }}" alt="{{ $image['alt'] }}"  uk-img="target: !* -*, !* +*" uk-cover/>
                    </a>
                </div>

            @endforeach
        </ul>

    </div>

@endif
