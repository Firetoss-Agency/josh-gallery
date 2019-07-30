<div class="uk-flex uk-flex-wrap">

    <div class="trip-content uk-width-large@xl uk-width-medium@l uk-width-1-1 ">

        @include('components.content_header', ['classes' => 'uk-padding uk-padding-small uk-padding-large@l margin-bottom'])




    </div>
<div class="trips-wrapper uk-width-expand@l uk-padding-remove uk-grid-collapse uk-width-1-1 trip-hover " uk-grid>

    @repeater('trips')

    @set($post_object = get_sub_field('trip'))

    @if( $post_object )

        @php
            global $post;
            $post = $post_object;
            setup_postdata( $post );
            $srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id());
        @endphp



        <div class="single-trip uk-width-1-4@m uk-width-1-2  uk-cover-container uk-light ">

                <div class="ft-fade-dark"></div>

                <img src="{{ the_post_thumbnail_url() }}" srcset="{{ $srcset }}" alt="{{ the_title() }}" uk-cover uk-scrollspy="cls:uk-animation-fade">

                <h3 class="uk-h4 uk-padding uk-text-center uk-position-bottom-center uk-width-1-1  uk-padding-remove-bottom">{{ the_title() }}<a class="uk-button uk-button-primary" href="{{  the_permalink() }}">Explore</a></h3>
        </div>

        @php wp_reset_postdata()
        @endphp

    @endif

    @endrepeater

</div>
</div>
