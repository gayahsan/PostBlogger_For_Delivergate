@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Post') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="{{route('posts.store') }}">
                        @csrf
                        <div class="form-group">
                            <label>Item Title*</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Item Title" required>
                        </div>

                        <div class="form-group">
                            <label>Item Description*</label>
                            <textarea class="form-control" name="description" rows="10" placeholder="Enter Item Description" required></textarea>
                            
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
