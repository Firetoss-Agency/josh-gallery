@if(get_sub_field('title') || get_sub_field('body'))


    @set($heading = $heading ? $heading : 'h2')
    <div class="content-header {{ $classes }}">
        <{{$heading}} class
        ="heading">{{the_sub_field('title')}}</{{$heading}}>
    {{the_sub_field('body')}}

    @include('components.buttons')
    </div>


@endif
