<form action="{{route('eshop-model-insert', 'Product')}}" method="post"> @csrf

    <div class="form-group" data-tippy-content="Prezzo di vendita">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text"><i class="fas fa-euro-sign"></i></label>
            </div>
            <input type="text" name="payload[price]" class="form-control price"
                   required placeholder="23.00">
        </div>
    </div>

    <div class="form-group" data-tippy-content="Nome del Prodotto">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text"><i class="fas fa-italic"></i></label>
            </div>
            <input type="text" name="payload[name]" class="form-control"
                   required placeholder="Apple AirPods Pro">
        </div>
    </div>

    <div class="form-group" data-tippy-content="Breve descrizione">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text"><i class="fas fa-quote-right"></i></label>
            </div>
            <textarea type="text" rows="3" name="payload[info]"
                      class="form-control">Nuovo prodotto</textarea>
        </div>
    </div>

    <input type="hidden" name="category_id" value="{{$category->id}}">
    <input type="hidden" name="payload[description]" value="">
    <button class="btn btn-primary btn-block">Aggiungi</button>
</form>
