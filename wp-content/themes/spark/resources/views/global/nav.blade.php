@php
  $breakpoint = '@l';
  $logo = get_field('logo_url' , 'option') ?: get_field('logo' , 'option');
  $altlogo = get_field('alt_logo' , 'option') ?: get_field('alt_logo_url' , 'option');

@endphp


<header id="site-header"  uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent; top: 500; duration: 100">
  {{--<div class="uk-container">--}}
  <nav class="uk-navbar-container uk-navbar-transparent uk-navbar" uk-navbar="offset: 0; delay-hide: 500;">
    <div class="uk-navbar-left">
      {{--<div class="uk-navbar-item">--}}
        {{--<a class="uk-logo sticky" href="{{ home_url() }}">--}}
          {{--<h2>Allison & Joshua Green</h2>--}}
        {{--</a>--}}
      {{--</div>--}}
    </div>
    @if(has_nav_menu('primary_navigation'))
      <div class="uk-navbar-right uk-flex-top">
        <ul class="uk-navbar-nav uk-visible{{ $breakpoint }}">
          @php
            wp_nav_menu([
              'items_wrap'     => '%3$s',
              'theme_location' => 'primary_navigation',
              'walker'         => new UIkitNavigation()
            ]);
          @endphp
        </ul>
        <a class="uk-navbar-toggle uk-hidden{{ $breakpoint }}" uk-toggle uk-navbar-toggle-icon href="#offcanvas-nav"></a>
      </div>
    @endif
  </nav>
  {{--</div>--}}
</header>


@if(has_nav_menu('primary_navigation'))
  <nav id="offcanvas-nav" uk-offcanvas="flip: true; overlay: true;">
    <div class="uk-offcanvas-bar">

      <button class="uk-offcanvas-close" type="button" uk-close></button>

      <ul class="uk-nav-primary uk-nav-parent-icon" uk-nav="multiple: true">
        @php
          wp_nav_menu([
            'items_wrap'     => '%3$s',
            'theme_location' => 'primary_navigation',
            'walker'         => new UIkitMobileNavigation()
          ]);
        @endphp
      </ul>

    </div>
  </nav>
@endif
