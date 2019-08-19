@set($size = $size ? $size :  get_sub_field('hero_size'))

<div class="hero-wrapper uk-inline uk-cover-container uk-width-1-1"  uk-height-viewport >

    @include('components.cover_image')



    <div class="hero-content uk-align-right uk-overflow-hidden uk-overlay uk-padding uk-padding-medium uk-position-medium uk-position-top-right  uk-box-shadow hero-{{ $size }} {{ get_sub_field('video_url') ? 'video-hero' : '' }}"
    >
        {{--@include('components.countdown')--}}

        @include('components.content_header', ['heading' => 'h1'])


        {{--@include('components.frosted_cover')--}}

    </div>


</div>



