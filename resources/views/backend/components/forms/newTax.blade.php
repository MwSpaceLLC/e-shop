<form action="{{route('eshop-model-insert', 'Tax')}}" method="post">
    @csrf
    <div class="form-group" data-tippy-content="Percentuale (es. 22.00%)">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text"><i
                        class="fa fa-money"></i></label>
            </div>
            <input type="text" name="payload[rate]" class="form-control percent"
                   required
                   value="10.00">
        </div>
    </div>

    <div class="form-group" data-tippy-content="Nome Tassa (es. IVA)">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text"><i
                        class="fa fa-money"></i></label>
            </div>
            <input type="text" name="payload[name]" class="form-control"
                   required
                   placeholder="Nome">
        </div>
    </div>

    <div class="form-group" data-tippy-content="Posizione della tassa">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text"><i
                        class="fa fa-bank"></i></label>
            </div>
            <select class="form-control" name="payload[position]">
                <option value="inclusa">Inclusa</option>
                <option value="esclusa">Esclusa</option>
            </select>
        </div>
    </div>

    <button class="btn btn-primary btn-block">Aggiungi</button>
</form>
