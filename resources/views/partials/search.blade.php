<form action="/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="search-input search-home">
        <label class="hidden" aria-label="Search">Search</label>
        <input type="text" class="search-input" name="q" placeholder="Search Rahway businesses, organizations, freelancers, places of worship..." value="{{ $q ?? '' }}"> <span class="input-group-btn">
        <button aria-label="Search" type="submit" class="btn btn-default">
            <i class="icon-search"></i>
        </button>
        </span>
    </div>
</form>