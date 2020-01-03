<nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-separator-1">
        <li class="breadcrumb-item"><a
                href="{{route('eshop-models',['model'=>$m])}}">{{$m}}</a>
        </li>

        @if(request()->parent && $m === 'Category')
            @foreach(eshop()->category()->reverse() as $parent)
                <li class="breadcrumb-item">
                    <a href="{{route('eshop-models',['model'=>$m,'parent'=>$parent->id])}}">{{$parent->payload()->name}}</a>
                </li>
            @endforeach
            <li class="breadcrumb-item"
                aria-current="page">
                <a href="{{route('eshop-models',['model'=>$m,'parent'=>request()->parent? eshop()->blade()->current($model)->id: null])}}">{{request()->parent? eshop()->blade()->current($model)->payload()->name: null}}</a>
            </li>
        @endif

        <li class="breadcrumb-item active"
            aria-current="page">
            @if(isset($current))
                @lang('eshop::model.Update')
            @else
                @lang('eshop::model.Insert')
            @endif
        </li>
    </ol>
</nav>
