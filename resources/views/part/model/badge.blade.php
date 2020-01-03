@switch($m)
    @case('Category')
    <span data-tippy-content="@lang('eshop::model.IndexProductCount')"
          class="badge loop_model badge-pill badge-primary">{{$row->product()->count()}}</span>
    @break
    @default
    <span></span>
    @break
@endswitch
