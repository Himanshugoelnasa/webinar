<div class="dropdown-custom-button {{isset($classes) ? $classes : null}}">
   <a href="javascript:void(0)" class="toggle-contact-info btn-custom w-100">
      Contact Details
   </a>
   <article class="contact-info">
      <p>Posted By : Builder<br/>
         {{$property->user ? $property->user->name : null}}
      </p>
         
      @if($property->phone)
      <div class="countrypicker f16">
         <i class="glyphicon inline-flag flag {{\App\Helpers\Helper::get_flag_code($property->phone_country_code)}}"></i> +{{$property->phone_country_code}}-{{$property->phone}}
      </div>
      @endif
      @if($property->alt_phone)
      <div class="countrypicker f16">
         <i class="glyphicon inline-flag flag {{\App\Helpers\Helper::get_flag_code($property->alt_phone_country_code)}}"></i> +{{$property->alt_phone_country_code}}-{{$property->alt_phone}}
      </div>
      @endif
      <div class="countrypicker f16">
         <i class="fa fa-envelope inline-flag envelope-icon"></i> {{$property->email}}
      </div>
   </article>
</div>