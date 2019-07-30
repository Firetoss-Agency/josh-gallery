@php
    $args = ft_get_sub_fields(['cover_image','responsive']);
    $srcset = wp_get_attachment_image_srcset( $args->cover_image['id']);

@endphp

@if($args->responsive)
    <canvas width="{{ the_sub_field('width') }}" height="{{ the_sub_field('height') }}"></canvas>
@endif


<img src="{{ $args->cover_image['url'] }}" srcset="{{ $srcset }}" alt="{{ $args->cover_image['caption'] }}" uk-cover>


