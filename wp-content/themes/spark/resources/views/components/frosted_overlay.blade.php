@set($args = ft_get_sub_fields(['overlay_image']);)

    <div class="background-frosted uk-background-image@l" style="background-image: url('{{ $args->overlay_image['url'] }}');"></div>
