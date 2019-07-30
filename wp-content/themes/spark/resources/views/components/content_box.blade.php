<div class="content-box-wrapper uk-position-relative ">


    @include('components.overlay_image')


    @if(get_sub_field('video_url'))
    <div class="content-box-iframe">
        @include('components.background_video')
    </div>

    @endif

    <div class="content-box-content uk-padding-large uk-light uk-padding uk-width-xxlarge uk-position-{{ the_sub_field('vertical') }}-{{ the_sub_field('horizontal') }} {{ get_sub_field('video_url') ? 'video-content-box' : '' }}" uk-scrollspy="cls:uk-animation-fade uk-animation-slide-{{ get_sub_field('vertical') === 'top' ? 'bottom' : 'top' }}-medium;delay:500;offset-top:-100"  >

        @include('components.content_header', ['btn_classes' => 'uk-button-secondary'])


        @include('components.frosted_overlay')
    </div>
</div>



