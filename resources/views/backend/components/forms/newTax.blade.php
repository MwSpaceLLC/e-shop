<form action="{{route('eshop-model-insert', 'Tax')}}" method="post">
    @csrf
    <div class="form-group" data-tippy-content="Percentuale (es. 22.00%)">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text">
                    <i class="fas fa-comment-dollar"></i>
                </label>
            </div>
            <input type="text" name="payload[rate]" class="form-control percent"
                   required
                   value="10.00">
        </div>
    </div>

    <div class="form-group" data-tippy-content="Nome Tassa (es. IVA)">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text">
                    <i class="fas fa-paragraph"></i>
                </label>
            </div>
            <input type="text" name="payload[name]" class="form-control"
                   required
                   placeholder="Nome">
        </div>
    </div>

    <div class="form-group" data-tippy-content="Posizione della tassa">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text">
                    <i class="fas fa-crosshairs"></i>
                </label>
            </div>
            <select class="form-control" name="payload[excluding]">
                <option selected disabled>Esclusa</option>
                <option value="1">Inclusa</option>
            </select>
        </div>
    </div>

    <button class="btn btn-primary btn-block">Aggiungi</button>
</form>
