@extends('layouts.admin-app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <!--form method="POST" action="{{route('activate.admin', ['code'=>$code])}}"-->
                    <form method="POST" action="{{action('Admin\AdminAuth\AdminActivationController@activateAdmin', ['code'=>$code])}}">
                        @csrf
                        <input type="hidden" value={{$code}} name="activation_code">
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Activate') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection('content')
