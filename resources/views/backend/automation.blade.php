@extends('eshop::backend')

@section('title', 'Automation')

@section('content')
    <div class="lime-container mt-5 mb-5">
        <div class="lime-body">
            <div class="container">

                <hr class="option automation">
                <!-- Stripe endpoint -->
                <div class="row mt-2">
                    <div class="col-xl">
                        <div class="card">

                            <div class="card-body">
                                <h5 class="card-title">@lang('eshop::option.Automation')</h5>
                                <img src="https://image.flaticon.com/icons/svg/2152/2152497.svg"
                                     class="w-xs mr-3 option" alt="...">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
