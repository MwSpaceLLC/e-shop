<div class="avatar-wrapper">
    <label class="pic" for="profile-pic">

        @if(isset($current) && isset($current->payload()->image))
            <img class="profile-pic" alt="pic"
                 src="{{$current->image()}}"/>
            <input name="payload[image]" type="hidden"
                   value="{{$current->payload()->image}}"/>
        @else
            <img class="profile-pic" alt="pic"
                 src="{{asset('/vendor/eshop/assets/img/file.png')}}"/>
        @endif

    </label>
    <input name="payload[image]" id="profile-pic" class="file-upload"
           type="file" accept="image/*"/>
</div>

@if(isset($current) && isset($current->payload()->image))
    <a href="{{route('eshop-remove-image-model', ['model'=>$m,'current'=>$current->id])}}"
       onclick="return confirm('@lang('eshop::model.RemoveImage')')"
       class="btn btn-danger btn-block btn-sm"
       type="submit">
        @lang('eshop::model.RemoveImage')
    </a>
@endif
