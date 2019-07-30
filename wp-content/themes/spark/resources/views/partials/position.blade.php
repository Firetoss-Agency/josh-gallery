
@php
    $image = $value['image'] ? 'url('.$value['image'].')' : '';
    $position = $value['position'] ? $value['position'] : "";
    $size = ($value['image'] && $value['size']) ? '/'.$value['size'] : '';
    $color = $value['color'] ? ft_rgba($value['color'], $value['opacity']) : '';
    $repeat = $value['repeat'] ? 'repeat' : 'no-repeat';

@endphp


{{--{{ ft_add_style('background',  $image . $position . $value['size'] .' '. $color.' '.$repeat)}}--}}
{{ ft_add_style('background-color',  $color)}}

