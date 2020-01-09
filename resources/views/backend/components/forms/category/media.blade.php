<form action="{{route('eshop-model-insert', 'Media')}}" method="post" enctype="multipart/form-data"> @csrf

    <div class="row">
        <div class="col-md-5">
            <div class="form-group" data-tippy-content="Aggiungi un file">
                <div class="input-group mb-3">
                    <div class="file-upload-wrapper" data-text="Scegli un File">
                        <input required name="payload[path]" type="file" class="file-upload-field">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="form-group" data-tippy-content="Tipo di File">
                <div class="input-group mb-3">
                    <select class="form-control" name="payload[type]">
                        @if(!$category->media()->where('payload->type','cover')->first())
                            <option value="cover">Cover</option>
                        @endif
                        <option value="image">Immagine</option>
                        <option value="video">Video</option>
                        <option value="file">File</option>
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
                    @if($cover = $category->media()->where('payload->type','cover')->first())
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="blog-grid">
                                <div class="card">
                                    <img class="img-fluid contain" src="{{$cover->image()}}" alt="">
                                    <div class="card-body"></div>
                                    <div class="card-footer">
                                        <div class="meta-info">
                                            <span class="badge badge-dark">Tipo: {{$cover->payload()->type}}</span>
                                            <a href="{{backend("model/delete/Media/{$cover->id}")}}"
                                               class="post-date"><i class="la la-trash"></i>Rimuovi</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @foreach($category->media()->orderBy('created_at','desc')->get() as $media)

                        @if($media->payload()->type !== 'cover')
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="blog-grid">
                                    <div class="card">
                                        <img class="img-fluid contain" src="{{$media->image()}}" alt="">
                                        <div class="card-body"></div>
                                        <div class="card-footer">
                                            <div class="meta-info">
                                                <span class="badge badge-light">Tipo: {{$media->payload()->type}}</span>
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
    <input type="hidden" name="category_id" value="{{$category->id}}">
</form>
