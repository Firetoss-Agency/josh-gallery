
@php
    $iframe = $iframe ? $iframe : get_sub_field('video_url');
    preg_match('/src="(.+?)"/', $iframe, $matches);
    $src = $matches[1];
    $params = array(
        'rel'       => 0,
        'showinfo'  => 0,
        'loop'      => 1,
        'autoplay'  => 1,
        'controls'  => 0,
        'hd'        => 1,
        'autohide'  => 1
    );
    $new_src = add_query_arg($params, $src);
    $iframe = str_replace($src, $new_src, $iframe);
    $attributes = 'frameborder="0"  uk-video="autoplay: true; automute: true;" class="uk-position-center"';
    $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);


    preg_match('/src="(.+?)"/', $iframe, $matches);
    $src = $matches[1];

@endphp

<div class="iframe-wrap uk-position-center uk-width-1-1">
    {!! $iframe !!}
</div>
