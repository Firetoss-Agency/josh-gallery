@set($args = ft_get_sub_fields(['phone_number','contact_form_id']))

<div class="contact-us-wrapper uk-padding-large uk-padding-remove-horizontal uk-background-contain uk-overflow-hidden uk-position-relative">

    @include('components.cover_image')

    <div class="contact-us-content uk-padding-large uk-light uk-padding uk-align-right" style="width: 1000px;max-width: 100%;box-sizing: border-box;">

        @include('components.content_header')

        @if($args->phone_number)

            <div class="contact-phone content-header">

                <p>Call us at:</p>

                <a href="mailto:{{ $args->phone_number }}"><i uk-icon="icon: mail; ratio:2"></i>{{ $args->phone_number }}</a>

            </div>

        @endif

        @if($args->contact_form_id)

            <div class="contact-gform content-header">

                <p>Or, fill in the fields below and we'll contact you:</p>

                {{ gravity_form( $args->contact_form_id, false, false) }}
            </div>

        @endif

    </div>

</div>




