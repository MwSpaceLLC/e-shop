<form action="{{route('eshop-model-insert', 'Media')}}" method="post" enctype="multipart/form-data"> @csrf

    <div class="row">
        <div class="col-md-5">
            <div class="form-group" data-tippy-content="Aggiungi un file">
                <div class="input-group mb-3">
                    <div class="file-upload-wrapper" data-text="Scegli un File">
                        <input accept="image/*" required name="payload[path]" type="file"
                               class="file-upload-field input-mime">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="form-group" data-tippy-content="Tipo di File">
                <div class="input-group mb-3">
                    <select class="form-control select-mime" name="payload[type]">
                        @if(!$service->media()->where('type','cover')->first())
                            <option value="cover">Cover</option>
                        @endif
                        <option value="image">Immagine</option>
                        <option value="video">Video</option>
                        {{-- <option value="audio">Audio</option>--}}
                        {{-- <option value="text">Documento</option>--}}
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <button type="submit" class="btn btn-outline-success px-4">
                Aggiungi
            </button>
        </div>
    </div>

    <hr class="hr-light">

    <div class="form">

        <ul class="linked_account payloads">
            <li class="mt-2">
                <div class="row">
                    @if($cover = $service->media()->where('type','cover')->first())
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="blog-grid">
                                <div class="card">
                                    <img class="img-fluid contain" src="{{$cover->path()}}" alt="">
                                    <div class="card-body"></div>
                                    <div class="card-footer">
                                        <div class="meta-info">
                                            <span class="badge badge-dark">Tipo: {{$cover->type}}</span>
                                            <a href="{{backend("model/delete/Media/{$cover->id}")}}"
                                               class="post-date"><i class="la la-trash"></i>Rimuovi</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @foreach($service->media()->orderBy('created_at','desc')->get() as $media)

                        @if($media->type !== 'cover')
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="blog-grid">
                                    <div class="card">
                                        @if($media->type === 'image')
                                            <img class="img-fluid contain" src="{{$media->path()}}" alt="">
                                        @endif
                                        @if($media->type === 'video')
                                            <video playsinline autoplay muted loop>
                                                <source src="{{$media->path()}}"
                                                        type="video/{{pathinfo($media->path(), PATHINFO_EXTENSION)}}">
                                            </video>
                                        @endif
                                        <div class="card-body"></div>
                                        <div class="card-footer">
                                            <div class="meta-info">
                                                <span class="badge badge-light">Tipo: {{$media->type}}</span>
                                                <a href="{{backend("model/delete/Media/{$media->id}")}}"
                                                   class="post-date"><i class="la la-trash"></i>Rimuovi</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </li>
        </ul>

    </div>
    <input type="hidden" name="service_id" value="{{$service->id}}">
</form>
