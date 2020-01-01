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
