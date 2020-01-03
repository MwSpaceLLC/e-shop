@extends('eshop::backend')

@section('title', 'Blade')

@section('css')
    <style>
        hr.endpoint::before {
            content: 'Blade\'s API';
            display: flex;
            align-items: center;
            zoom: 2;
            margin: -17px -17px -17px 17px;
            z-index: 999;
        }
    </style>
@endsection

@section('content')
    <div class="lime-container mt-5 mb-5">
        <div class="lime-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <hr class="option endpoint">

                        <div class="card">

                            <img src="https://image.flaticon.com/icons/svg/718/718064.svg"
                                 class="w-xs mr-3 option" alt="...">

                            <div class="card-body m-0">
                                <h5 class="card-title">Get Primary category (Placed in Home) </h5>
                                <pre><code class="language-php">&#64;foreach(eshop()->category()->primary()->get() as $category)
            &#123;{$category->image()}}
            &#123;{$category->payload()->name}}
            &#123;{$category->payload()->description}}
&#64;endforeach</code></pre>

                                <pre><b>es.</b> <code
                                        class="lang-json">{{json_encode(eshop()->category()->primary()->first(), JSON_PRETTY_PRINT)}}</code></pre>

                            </div>

                            <div class="card-body m-0">
                                <h5 class="card-title">Get Child category (recursive finder) </h5>
                                <pre><code class="language-php">eshop()->category()->primary()->get()</code></pre>
                            </div>

                            <div class="card-body m-0">
                                <h5 class="card-title">Get Parent category (recursive finder) </h5>
                                <pre><code class="language-php">eshop()->category()->primary()->get()</code></pre>
                            </div>


                            <div class="card-body m-0">
                                <h5 class="card-title">Get Product finder (paginate default) </h5>
                                <pre><code class="language-php">&#64;foreach(eshop()->product()->paginate() as $product)
        &#64;foreach($product->category() as $category)
            &#123;{$category->payload()->name}}
        &#64;endforeach

            &#123;{$product->image()}}
            &#123;{$product->payload()->name}}
            &#123;{$product->payload()->description}}
            &#123;{$product->payload()->price}} / &#123;{eshop()->config('SHOP_CURRENCY_SYMBOL')}}
&#64;endforeach</code></pre>

                                <pre><b>es.</b> <code
                                        class="lang-json">{{json_encode(eshop()->product()->first(), JSON_PRETTY_PRINT)}}</code></pre>

                            </div>

                        </div>
                    </div>

                    <div class="col-md-3">
                        @include('eshop::part.api.side')
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
