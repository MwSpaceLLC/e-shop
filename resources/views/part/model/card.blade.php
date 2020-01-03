<div class="folder-icon">
    @switch($m)
        @case('Category')
        <img src="{{$row->image()}}" width="50" height="50">
        @break
        @case('Product')
        <img src="{{$row->image()}}" width="50" height="50">
        @break
        @case('Service')
        <img src="{{$row->image()}}" width="50" height="50">
        @break
        @case('Tax')
        <i class="material-icons"> money </i>
        @break
        @case('User')
        <i class="material-icons"> sentiment_satisfied </i>
        @break
        @default
        <i class="material-icons"> sd_card </i>
        @break
    @endswitch
</div>

<div class="folder-info">
    @switch($m)
        @case('Category')
        <a href="{{route('eshop-parent-models',['model'=>$m,'parent'=>$row->id])}}">{{$row->payload()->name}} {{$row->child()->first()?'('.$row->child()->count(). ')':null}}</a>
        @break
        @case('Tax')
        <a style="pointer-events: none">{{$row->payload()->name}}
            | {{$row->payload()->percentage}} ({{$row->payload()->change}})</a>
        @break
        @case('Product')
        <a style="pointer-events: none">{{$row->payload()->name}}</a>
        @break
        @case('Service')
        <a style="pointer-events: auto">{{$row->payload()->name}}</a>

        <span style="color: white"
              class="badge badge-pill badge-info">{{$row->payload()->price}} {{eshop()->config('SHOP_CURRENCY_SYMBOL')}}</span>

        @if($row->tax()->first())
            <span style="color: white"
                  class="badge badge-pill badge-warning">{{$row->tax()->first()->payload()->change}} {{$row->tax()->first()->payload()->name}} </span>
        @endif

        @break
        @case('User')
        <a style="pointer-events: none">{{$row->payload()->email}}</a>
        @break
        @default
        <a style="pointer-events: none">ID: {{$row->id??''}}</a>
        @break
    @endswitch

    <span class="created">{{$row->created_at}} | <{{$row->id}}></span>

</div>
