<div class="content-box-wrapper uk-position-relative">

    @php
        $args = get_field('pre_footer' ,'option');
        $image = get_field('footer_cta_image', $page_id) ? get_field('footer_cta_image', $page_id)  : $args['image']['id'];
        $srcset = wp_get_attachment_image_srcset( $image);
        $src = wp_get_attachment_image_url( $image, 'full');
    @endphp


    <img src="{{ $src }}" srcset="{{ $srcset }}, {{ $src }} 1200w" alt="{{  $args['title']  }}"
         class="overlay-image">

    <div class="content-box-content uk-padding-large uk-light uk-padding uk-width-xxlarge uk-position-top-left" uk-scrollspy="cls:uk-animation-fade uk-animation-slide-bottom-medium;delay:500">


        <div class="content-header">
            <h2 class="heading">{{ $args['title'] }}</h2>
            {!! $args['content'] !!}
            <div class="uk-button-group">
                <a class="uk-button uk-button-secondary"
                   href="{{ $args['button']['url'] }}" target="{{ $args['button']['target'] }}"
                >{{ $args['button']['title'] }}</a>
            </div>
        </div>


        <div class="background-frosted uk-background-image@l"
             style="background-image: url('{{ $src }}');"></div>

    </div>
</div>
