<nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-separator-1">
        <li class="breadcrumb-item"><a
                href="{{route('eshop-models',['model'=>$m])}}">{{$m}}</a>
        </li>

        @if(request()->parent && $m == 'Category')
            @foreach(recursive_parent() as $parent)
                <li class="breadcrumb-item">
                    <a href="{{route('eshop-models',['model'=>$m,'parent'=>$parent->id])}}">{{$parent->payload()->name}}</a>
                </li>
            @endforeach
            <li class="breadcrumb-item"
                aria-current="page">
                <a href="{{route('eshop-models',['model'=>$m,'parent'=>get_current()->id])}}">{{get_current()->payload()->name}}</a>
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
