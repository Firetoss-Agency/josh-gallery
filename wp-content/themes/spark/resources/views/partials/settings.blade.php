
@if(get_sub_field('settings'))

    @foreach (get_sub_field('settings')  as $key => $value)

        @if($value)

            @set($layout_name = get_row_layout())

            {{ft_add_class('layout-', $layout_name)}}

            {{ft_class('uk-section')}}

            @set($layout = "partials.$key")
            @include($layout, ['value' => $value])

        @endif

    @endforeach

@endif

