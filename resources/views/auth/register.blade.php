@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body ">
                        <div class=" row  " style='margin:auto'>
                            <form action="{{ URL::to('registerShop') }}" class="" style="margin-">
                                <button type="submit" class="btn btn-primary">
                                    Register as a shop
                                </button>
                            </form>
                            or
                            <form action='{{ URL::to("registerUser")}}' class=''>
                                <button type='submit' class='btn btn-primary'>
                                    Register as a user
                                </button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
