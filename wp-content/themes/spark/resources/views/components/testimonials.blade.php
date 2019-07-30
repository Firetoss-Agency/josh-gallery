<div class="uk-section testimonials-wrapper">
    <div class="uk-container uk-container-expand">
        <div class="uk-position-relative">
            <div class="uk-container">


                <img class="uk-position-top-left uk-text-primary"  uk-parallax="y:-100" src="/wp-content/themes/spark/public/img/quote_left.svg" alt="" uk-svg>

                <div class="uk-padding uk-padding-large uk-padding-remove-bottom">
                    <div class="uk-padding uk-padding-large uk-padding-remove-vertical"
                         uk-scrollspy="cls:uk-animation-fade;delay:500;offset-top:-100">

                        <div uk-slider="infinite: true; autoplay: true; do">
                            <ul class="uk-slider-items uk-child-width-1-1 uk-text-center ">

                                @if(get_sub_field('locations'))

                                    @php

                                        $terms = get_sub_field('locations');
                                        $order = get_sub_field('order');
                                        $orderby = get_sub_field('orderby');
                                        $termIDs = [];
                                        foreach ($terms as $term) {
                                            $termIDs[] = $term;
                                        }

                                    $args = [
                                        'post_type' => 'testimonial',
                                        'posts_per_page' => 5,
                                        'order' => $order,
                                        'orderby' => $orderby,
                                        'tax_query' => array(
                                            array(
                                            'taxonomy' => 'location',
                                            'field'    => 'id',
                                            'terms'    => $termIDs,
                                            ),
                                        ),
                                    ];
                                    @endphp
                                    @query($args)


                                    <li class="testimonial-slide uk-flex uk-flex-middle">
                                        <div class="uk-align-center">
                                        <p class="testimonial uk-h4" uk-slider-parallax=" opacity: 0,1,0">{{ the_field('content') }}</p>
                                        <p class="uk-text-right uk-text-small" uk-slider-parallax="x: 300,0,-300; opacity: 0,1,0">
                                           {{ the_field('author') }}</br>{{ the_field('date') }}</p>
                                        </div>
                                    </li>

                                    @endquery

                                @endif

                            </ul>

                            <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>

                        </div>
                    </div>
                </div>

                <img class="uk-position-bottom-right uk-text-primary"  uk-parallax="y:100" src="/wp-content/themes/spark/public/img/quote_right.svg" alt="" uk-svg>
            </div>
        </div>
    </div>
</div>

