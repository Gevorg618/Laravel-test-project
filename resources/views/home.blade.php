@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   <div class="p-4  ">
                       Welcome {{ Auth::user()->name }}
                   </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
