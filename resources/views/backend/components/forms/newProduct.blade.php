<form action="{{route('eshop-model-insert', 'Product')}}" method="post">
    @csrf
    <input type="hidden" name="category_id" value="{{$category->id}}">

    <div class="form-group" data-tippy-content="Nome del Prodotto">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text"><i
                        class="fa fa-money"></i></label>
            </div>
            <input type="text" name="payload[name]" class="form-control"
                   required placeholder="Apple AirPods Pro">
        </div>
    </div>

    <div class="form-group" data-tippy-content="Breve descrizione">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text"><i
                        class="fa fa-money"></i></label>
            </div>
            <textarea type="text" rows="3" name="payload[info]"
                      class="form-control">Nuovo prodotto</textarea>
        </div>
    </div>

    <button class="btn btn-primary btn-block">Aggiungi</button>
</form>
