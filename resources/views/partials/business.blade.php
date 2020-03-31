<section class="standard-box">

@if ($business->logo )
    <div class="business-list-grid">

    <div class="business-list-information">
@endif

<h3 class="business-list-name">{{ $business->name }}</h3>

@if ( $business->description )
    <section class="business-description">
        {!! nl2br(e($business->description)) !!}
    </section>
@endif

@if ( $business->phone || $business->store )
    <section class="business-contact">
        @if ( $business->phone )
            <section class="phone">
                <a class="button business-list-button" href="tel:{{ \App\Http\Controllers\BusinessController::formatPhoneForDialing($business->phone) }}"><i class="icon-phone mr-1"></i> {{ \App\Http\Controllers\BusinessController::formatPhone($business->phone) }}</a>
            </section>
        @endif

        @if ( $business->store )
            <section class="store">
                <a target="_blank" rel="noopener" class="button business-list-button" href="{{ $business->store }}"><i class="icon-shopping-cart mr-1"></i> Visit &amp; Shop</a>
            </section>
        @endif
        
        @if ( $business->address )
            <section class="business-location">
                <a class="button business-list-button" href="https://www.google.com/maps/search/{{ $business->address }}" target="_blank" rel="noopener"><i class="icon-map-marker mr-1"></i> {{ $business->address }}</a>
            </section>
        @endif

    </section>
@endif

@if ( $business->hours )
    <section class="business-hours">
        <h3 class="business-hours-header">Special Hours &amp; Procedures</h3>
        {!! nl2br(e($business->hours)) !!}
    </section>
@endif

@if ($business->logo )
    </div> <!-- flex class for business with logo -->
@endif

@if ($business->logo )
    <div class="flex-left business-logo-wrapper">
        <a target="_blank" rel="noopener" class="modal-open" href="/storage/{{ $business->logo }} "><span class="screen-reader-text">{{$business->name}}</span><img alt="{{$business->name}}" class="business-logo-image" src="/storage/{{ $business->logo }}" /></a>
    </div>

    <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
        
        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        
        <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
            <span class="text-sm">(Esc)</span>
        </div>

        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content py-4 text-left px-6">
            <!--Title-->
            <div class="flex justify-between items-center pb-3 text-right">
            <div class="modal-close cursor-pointer z-50">
                <i class="icon-times"></i>
            </div>
            </div>

            <!--Body-->
            <img src="/storage/{{ $business->logo }}" />

            <!--Footer-->
            <div class="flex justify-end pt-2">
            <button aria-label="close" class="modal-close button bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Close</button>
            </div>
            
        </div>
        </div>
    </div>
@endif

@if ($business->logo )
    </div> <!-- flex wrapper class for business with logo -->
@endif

@guest        
    @if ( $business->user_id === 1 ) 
        <p class="business-claim-link"><a href="/register/">Own this organization? Register to claim it.</a></p>
    @endif
@endguest
@auth
    @if ( $business->user_id === 1 ) 
        <p class="business-claim-link"><a href="/claim/{{$business->id}}" class="js-form-business-claim-open">Claim this organization</a></p>
    @endif
@endauth
</section>