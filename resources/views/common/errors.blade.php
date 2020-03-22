@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger border-red-600 background-red-200 color-red-800">
        <strong>Whoops! Something went wrong!</strong>

        <br><br>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif