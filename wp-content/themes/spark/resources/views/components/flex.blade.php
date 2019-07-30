
@flexcontent('flexible_content', $page_id)
    @php
        $layout_name = get_row_layout();
        $layout = "components.$layout_name";
    @endphp


        @include('partials.settings')

        <div class="{{ft_classes()}}" style="{{ft_styles()}}">

            <div class="{{ft_containers()}}">

                @include($layout)

            </div>

        </div>

@endflexcontent

