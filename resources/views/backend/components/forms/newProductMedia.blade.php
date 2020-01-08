<form action="{{route('eshop-model-insert', 'Media')}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group" data-tippy-content="Allega Media">
        <div class="input-group mb-3">
            <div class="file-upload-wrapper" data-text="Cerca dal dispositivo">
                <input name="payload[path]" type="file" class="file-upload-field">
            </div>
        </div>
    </div>

    <div class="form-group" data-tippy-content="Tipo Media">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text"><i
                        class="fa fa-bank"></i></label>
            </div>
            <select class="form-control" name="payload[type]">
                <option selected value="cover">Cover</option>
                <option value="image">Immagine</option>
                <option value="video">Video</option>
                <option value="file">File</option>
            </select>
        </div>
    </div>

    <div class="form-group" data-tippy-content="Associazione visiva">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text"><i
                        class="fa fa-bank"></i></label>
            </div>
            <select class="form-control" name="product_id">
                @foreach(eshop()->product()->where('category_id',$category->id)->get() as $product)
                    <option value="{{$product->id}}">
                        {{$product->payload()->name}}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <button class="btn btn-primary btn-block">Aggiungi</button>
</form>
