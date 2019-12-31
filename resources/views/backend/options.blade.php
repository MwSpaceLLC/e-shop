@extends('eshop::backend')

@section('title', 'Options')

@section('content')
    <div class="lime-container mt-5 mb-5">
        <div class="lime-body">
            <div class="container">

                <div class="row mt-2">
                    <div class="col-xl">
                        <div class="card">

                            <div class="card-body">
                                <h5 class="card-title">@lang('eshop::option.CompanyShop')</h5>
                                <img src="https://image.flaticon.com/icons/svg/1312/1312173.svg"
                                     class="w-xs mr-3 option" alt="...">

                                <form action="{{route('eshop-config-update')}}" method="post">
                                    @csrf
                                    <div class="row icon-list-row">
                                        <div class="col-sm-4">
                                            <input type="text" name="keys[SHOP_NAME]" class="form-control"
                                                   id="SHOP_NAME" required
                                                   aria-describedby="SHOP_NAME" placeholder="Enter Your SHOP_NAME"
                                                   value="{{eshop()->config('SHOP_NAME')}}">
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="text" name="keys[SHOP_ADDRESS]" class="form-control"
                                                   id="SHOP_ADDRESS" required
                                                   aria-describedby="SHOP_ADDRESS" placeholder="Enter Your SHOP_ADDRESS"
                                                   value="{{eshop()->config('SHOP_ADDRESS')}}">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="keys[SHOP_ZIP_CODE]" class="form-control"
                                                   id="SHOP_ZIP_CODE" required
                                                   aria-describedby="SHOP_ZIP_CODE"
                                                   placeholder="Enter Your SHOP_ZIP_CODE"
                                                   value="{{eshop()->config('SHOP_ZIP_CODE')}}">
                                        </div>
                                    </div>
                                    <div class="row icon-list-row">
                                        <div class="col-sm-3">
                                            <input type="text" name="keys[SHOP_COUNTRY]" class="form-control"
                                                   id="SHOP_COUNTRY" required
                                                   aria-describedby="SHOP_COUNTRY" placeholder="Enter Your SHOP_COUNTRY"
                                                   value="{{eshop()->config('SHOP_COUNTRY')}}">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="keys[SHOP_DISTRICT]" class="form-control"
                                                   id="SHOP_DISTRICT" required
                                                   aria-describedby="SHOP_DISTRICT"
                                                   placeholder="Enter Your SHOP_DISTRICT"
                                                   value="{{eshop()->config('SHOP_DISTRICT')}}">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="keys[SHOP_PHONE]"
                                                   data-tippy-content="@lang('eshop::option.TippyPhone')"
                                                   class="form-control phone" id="SHOP_PHONE" required
                                                   aria-describedby="SHOP_PHONE" placeholder="Enter Your SHOP_PHONE"
                                                   value="{{eshop()->config('SHOP_PHONE')}}">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="keys[SHOP_MOBILE]"
                                                   data-tippy-content="@lang('eshop::option.TippyPhone')"
                                                   class="form-control phone" id="SHOP_MOBILE" required
                                                   aria-describedby="SHOP_MOBILE" placeholder="Enter Your SHOP_MOBILE"
                                                   value="{{eshop()->config('SHOP_MOBILE')}}">
                                        </div>
                                    </div>
                                    <div class="row icon-list-row">
                                        <div class="col-sm-4">
                                            <input type="text" name="keys[SHOP_VAT]"
                                                   data-tippy-content="@lang('eshop::option.TippyVat')"
                                                   class="form-control vat" id="SHOP_VAT" required
                                                   aria-describedby="SHOP_VAT" placeholder="Enter Your SHOP_VAT"
                                                   value="{{eshop()->config('SHOP_VAT')}}">
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" name="keys[SHOP_IBAN]" class="form-control"
                                                   id="SHOP_IBAN" required
                                                   aria-describedby="SHOP_IBAN" placeholder="Enter Your SHOP_IBAN"
                                                   value="{{eshop()->config('SHOP_IBAN')}}">
                                        </div>
                                    </div>
                                    <button type="submit"
                                            class="btn btn-primary btn-xs fl-form">@lang('eshop::global.Save')</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <hr class="option payment">
                <!-- Stripe Payment -->
                <div class="row mt-2">
                    <div class="col-xl">
                        <div class="card">

                            <div class="card-body">
                                <h5 class="card-title">@lang('eshop::option.Payment')
                                    |
                                    <a class="chbox"
                                       href="{{route('eshop-options-toggle','payment')}}">@lang('eshop::option.PaymentButton')</a>
                                    <label
                                        class="switch">
                                        <input type="checkbox" {{eshop()->option('payment')?'checked':null}}>
                                        <span class="slider round"></span>
                                    </label>
                                </h5>
                                @if(eshop()->option('payment'))

                                    <img
                                        src="https://rapidapi-prod-apis.s3.amazonaws.com/b9/a91db0db6811e8a836e5f7c278dd03/stripe-logo-4039DEE4FE-seeklogo.com.png"
                                        class="w-xs mr-3 option" alt="...">

                                    <p>@lang('eshop::option.PaymentText')</p>

                                    <form action="{{route('eshop-config-update')}}" method="post">
                                        @csrf
                                        <div class="row icon-list-row">
                                            <div class="col-sm-2">
                                                <h3>@lang('eshop::option.PaymentPublicKey')</h3>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="keys[STRIPE_PK]" class="form-control" id="pk"
                                                       required
                                                       aria-describedby="pk" placeholder="Enter pk_live/pk_test"
                                                       value="{{eshop()->config('STRIPE_PK')}}">
                                            </div>
                                            <div class="col-sm-2">
                                                <h3>@lang('eshop::option.PaymentSecretKey')</h3>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="keys[STRIPE_SK]" class="form-control" id="sk"
                                                       required
                                                       aria-describedby="sk" placeholder="Enter sk_live/sk_test"
                                                       value="{{eshop()->config('STRIPE_SK')}}">
                                            </div>
                                        </div>
                                        <button type="submit"
                                                class="btn btn-primary btn-xs fl-form">@lang('eshop::global.Save')</button>
                                    </form>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>

                <hr class="option courier">
                <!-- Courier Shipping  -->
                <div class="row mt-2">
                    <div class="col-xl">
                        <div class="card">

                            <div class="card-body">
                                <h5 class="card-title">@lang('eshop::option.Courier')
                                    |
                                    <a class="chbox"
                                       href="{{route('eshop-options-toggle','courier')}}">@lang('eshop::option.CourierButton')</a>
                                    <label
                                        class="switch">
                                        <input type="checkbox" {{eshop()->option('courier')?'checked':null}}>
                                        <span class="slider round"></span>
                                    </label>
                                </h5>
                                @if(eshop()->option('courier'))

                                    <img
                                        src="https://rapidapi-prod-apis.s3.amazonaws.com/79/051210db6711e893cf935a06eb73a2/shippo.png"
                                        class="w-xs mr-3 option" alt="...">

                                    <p>@lang('eshop::option.CourierText')</p>

                                    <form action="{{route('eshop-config-update')}}" method="post">
                                        @csrf
                                        <div class="row icon-list-row">
                                            <div class="col-sm-3">
                                                <h3>@lang('eshop::option.CourierToken')</h3>
                                            </div>
                                            <div class="col-sm-7">
                                                <input type="text" name="keys[SHIPPO_TOKEN]" class="form-control"
                                                       id="tkn" required
                                                       aria-describedby="tkn"
                                                       placeholder="Enter Live Tokens/Test Tokens"
                                                       value="{{eshop()->config('SHIPPO_TOKEN')}}">
                                            </div>
                                        </div>
                                        <button type="submit"
                                                class="btn btn-primary btn-xs fl-form">@lang('eshop::global.Save')</button>
                                    </form>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>

                <hr class="option api">
                <!-- Google Merchant Shopping -->
                <div class="row mt-2">
                    <div class="col-xl">
                        <div class="card">

                            <div class="card-body">
                                <h5 class="card-title">@lang('eshop::option.Merchants')
                                    |
                                    <a class="chbox"
                                       href="{{route('eshop-options-toggle','merchants')}}">@lang('eshop::option.MerchantsButton')</a>
                                    <label
                                        class="switch">
                                        <input type="checkbox" {{eshop()->option('merchants')?'checked':null}}>
                                        <span class="slider round"></span>
                                    </label>
                                </h5>
                                @if(eshop()->option('merchants'))

                                    <img src="/vendor/eshop/assets/img/google-macket.png" class="w-xs mr-3 option"
                                         alt="...">

                                    <p>@lang('eshop::option.MerchantsText')</p>

                                    <form action="{{route('eshop-config-update')}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="row icon-list-row">
                                            <div class="col-sm-3">
                                                <h3>@lang('eshop::option.MerchantsToken')</h3>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="custom-file">
                                                    <input type="file" accept="application/json"
                                                           name="keys[GOOGLE_MERCHANT_JSON_TOKEN]"
                                                           class="custom-file-input form-control"
                                                           id="GOOGLE_MERCHANT_JSON_TOKEN">
                                                    <label class="custom-file-label" for="GOOGLE_MERCHANT_JSON_TOKEN">Choose</label>
                                                </div>
                                                @if($json = eshop()->config('GOOGLE_MERCHANT_JSON_TOKEN'))
                                                    <pre style="margin-top: 25px"><code class="lang-json">{{$json}}</code></pre>
                                                @endif
                                            </div>
                                        </div>
                                        <button type="submit"
                                                class="btn btn-primary btn-xs fl-form">@lang('eshop::global.Save')</button>
                                    </form>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>


                {{--                <div class="row mt-2">--}}
                {{--                    <div class="col-xl">--}}
                {{--                        <div class="card">--}}

                {{--                            <div class="card-body">--}}
                {{--                                <h5 class="card-title">@lang('eshop::option.Algolia')--}}
                {{--                                    |--}}
                {{--                                    <a class="chbox"--}}
                {{--                                       href="{{route('eshop-options-toggle','algolia')}}">@lang('eshop::option.AlgoliaButton')</a>--}}
                {{--                                    <label--}}
                {{--                                        class="switch">--}}
                {{--                                        <input type="checkbox" {{eshop()->option('algolia')?'checked':null}}>--}}
                {{--                                        <span class="slider round"></span>--}}
                {{--                                    </label>--}}
                {{--                                </h5>--}}
                {{--                                @if(eshop()->option('algolia'))--}}

                {{--                                    <img src="https://rapidapi-prod-apis.s3.amazonaws.com/54/c7d020dc2211e8bd5f8fa8781cb50f/algolia.png" class="w-xs mr-3 option" alt="...">--}}

                {{--                                    <p>@lang('eshop::option.AlgoliaText')</p>--}}

                {{--                                    <form action="{{route('eshop-config-update')}}" method="post">--}}
                {{--                                        @csrf--}}
                {{--                                        <div class="row icon-list-row">--}}
                {{--                                            <div class="col-sm-2">--}}
                {{--                                                <h3>@lang('eshop::option.AlgoliaId')</h3>--}}
                {{--                                            </div>--}}
                {{--                                            <div class="col-sm-4">--}}
                {{--                                                <input type="text" name="keys[ALGOLIA_APP_ID]" class="form-control" id="ALGOLIA_APP_ID" required--}}
                {{--                                                       aria-describedby="ALGOLIA_APP_ID" placeholder="Enter Your Application ID" value="{{eshop()->config('ALGOLIA_APP_ID')}}">--}}
                {{--                                            </div>--}}
                {{--                                            <div class="col-sm-2">--}}
                {{--                                                <h3>@lang('eshop::option.AlgoliaSecret')</h3>--}}
                {{--                                            </div>--}}
                {{--                                            <div class="col-sm-4">--}}
                {{--                                                <input type="text" name="keys[ALGOLIA_SECRET]" class="form-control" id="ALGOLIA_SECRET" required--}}
                {{--                                                       aria-describedby="ALGOLIA_SECRET" placeholder="Enter Your Admin API Key" value="{{eshop()->config('ALGOLIA_SECRET')}}">--}}
                {{--                                            </div>--}}
                {{--                                        </div>--}}
                {{--                                        <button type="submit"--}}
                {{--                                                class="btn btn-primary btn-xs fl-form">@lang('eshop::global.Save')</button>--}}
                {{--                                    </form>--}}
                {{--                                @endif--}}

                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}

            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
