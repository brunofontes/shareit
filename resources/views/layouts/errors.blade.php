@if (count($errors))
    <div class="form-group mt-2 ml-2 mr-2 mb-2">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif