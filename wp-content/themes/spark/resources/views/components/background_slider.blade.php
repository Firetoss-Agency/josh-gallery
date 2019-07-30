<div class="background-slider uk-inline uk-position-relative">

    <div class="background-slider-content uk-padding-large uk-section-primary uk-width-xxlarge"
         uk-scrollspy="cls:uk-animation-fade uk-animation-slide-bottom-medium;delay:150;offset-top:-100;">

        <ul class="uk-switcher featured-switch background-switcher">

            @set($i = 0)
            @repeater('slides')

            @set($args = ft_get_sub_fields(['image','title']))

            <li class="{{ $i === 0 ? "uk-active" : '' }}"
                style="background-image:url('{{ $args->image['url'] }}');"></li>


            @php
                $i++;
            @endphp
            @endrepeater


        </ul>


        @include('components.content_header')

        <ul class="uk-nav uk-hidden@xl" uk-switcher="connect: .background-images ;animation: uk-animation-fade"
            uk-scrollspy="cls:uk-animation-fade;delay:150;offset-top:-100;target:.feature-title">

            @set($i = 0)
            @repeater('slides')

            @set($args = ft_get_sub_fields(['title']))

            <li class="{{ $i === 0 ? "uk-active" : '' }}"><a class="feature-title " href="#"><span
                            uk-icon="icon: arrow-left; ratio: 3"></span>{{ $args->title }}</a></li>


            @php
                $i++;
            @endphp
            @endrepeater
        </ul>

        <ul class="uk-nav uk-visible@xl"
            uk-switcher="connect: .background-switcher, .background-images ;animation: uk-animation-fade"
            uk-scrollspy="cls:uk-animation-fade;delay:150;offset-top:-100;target:.feature-title">

            @set($i = 0)
            @repeater('slides')

            @set($args = ft_get_sub_fields(['title']))

            <li class="{{ $i === 0 ? "uk-active" : '' }}"><a class="feature-title " href="#"><span
                            uk-icon="icon: arrow-left; ratio: 3"></span>{{ $args->title }}</a></li>


            @php
                $i++;
            @endphp
            @endrepeater
        </ul>
    </div>
    <ul class="uk-switcher featured-switch background-images uk-position-relative">
        @set($i = 0)
        @repeater('slides')

        @set($args = ft_get_sub_fields(['title', 'image']))

        <li class="{{ $i === 0 ? "uk-active" : '' }}"><img src="{{ $args->image['url'] }}" alt="{{ $args->title }}">
        </li>


        @php
            $i++;
        @endphp
        @endrepeater

    </ul>


    <div class="contact-after uk-padding uk-padding-large uk-position-bottom-left uk-width-medium"
         uk-scrollspy="cls:uk-animation-fade uk-animation-slide-bottom-medium;delay:1000;offset: -200">
        <p class=" uk-light">Contact us to speak with our director and start planning your trip today!</p>
        <a class="uk-button uk-button-primary " href="/contact/" target="">Contact Us</a>
    </div>
</div>

