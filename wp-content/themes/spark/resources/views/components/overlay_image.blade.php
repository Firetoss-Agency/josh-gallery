@php
    $args = ft_get_sub_fields(['overlay_image']);
    $srcset = wp_get_attachment_image_srcset( $args->overlay_image['id']);
@endphp


<img src="{{ $args->overlay_image['url'] }}" srcset="{{ $srcset }}, {{ $args->overlay_image['url'] }} 1200w" alt="{{ $args->overlay_image['caption'] }}" class="overlay-image" uk-img>



