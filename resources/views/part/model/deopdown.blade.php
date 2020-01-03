@switch($m)
    @case('Category')
    <a class="dropdown-item text-info"
       href="{{route('eshop-update-model',['model'=>$m,'parent'=>$row->id])}}">@lang('eshop::model.Edit')</a>

    <a class="dropdown-item text-danger"
       href="{{route('eshop-delete-model',['model'=>$m,'id'=>$row->id])}}"
       onclick="return confirm('{{trans('eshop::model.DeleteAlert')}}')">@lang('eshop::model.Delete')</a>
    @break
    @case('Product')
    <a class="dropdown-item text-info"
       href="{{route('eshop-update-model',['model'=>$m,'parent'=>$row->id])}}">@lang('eshop::model.Edit')</a>

    <a class="dropdown-item text-danger"
       href="{{route('eshop-delete-model',['model'=>$m,'id'=>$row->id])}}"
       onclick="return confirm('{{trans('eshop::model.DeleteAlert')}}')">@lang('eshop::model.Delete')</a>
    @break
    @case('Service')
    <a class="dropdown-item text-info"
       href="{{route('eshop-update-model',['model'=>$m,'parent'=>$row->id])}}">@lang('eshop::model.Edit')</a>

    <a class="dropdown-item text-danger"
       href="{{route('eshop-delete-model',['model'=>$m,'id'=>$row->id])}}"
       onclick="return confirm('{{trans('eshop::model.DeleteAlert')}}')">@lang('eshop::model.Delete')</a>
    @break
    @case('Tax')
    <a class="dropdown-item text-info"
       href="{{route('eshop-update-model',['model'=>$m,'parent'=>$row->id])}}">@lang('eshop::model.Edit')</a>

    <a class="dropdown-item text-danger"
       href="{{route('eshop-delete-model',['model'=>$m,'id'=>$row->id])}}"
       onclick="return confirm('{{trans('eshop::model.DeleteAlert')}}')">@lang('eshop::model.Delete')</a>
    @break
    @default
    <a class="dropdown-item text-info"
       href="{{route('eshop-info-model',['model'=>$m,'parent'=>$row->id])}}">@lang('eshop::model.Info')</a>
    @break
@endswitch
