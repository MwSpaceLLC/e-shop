<form action="{{route('eshop-model-insert', 'Service')}}" method="post"> @csrf

    <div class="form-group" data-tippy-content="Prezzo di vendita">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text"><i class="fas fa-euro-sign"></i></label>
            </div>
            <input type="text" name="payload[price]" class="form-control price"
                   required placeholder="85.00">
        </div>
    </div>

    <div class="form-group" data-tippy-content="Nome del Servizio">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text"><i class="fas fa-italic"></i></label>
            </div>
            <input type="text" name="payload[name]" class="form-control"
                   required placeholder="Consulenza su andamento economico">
        </div>
    </div>

    <div class="form-group" data-tippy-content="Fatturazione Ricorrente">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                </label>
            </div>
            <select class="form-control" name="payload[interval]">
                <option value="unless"> Non Ricorrente</option>
                <option value="month"> Mensile</option>
                <option value="year"> Annuale</option>
                <option value="week"> Settimanale</option>
                <option value="day"> Giornaliero</option>
            </select>
        </div>
    </div>

    <div class="form-group" data-tippy-content="Breve descrizione">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text"><i class="fas fa-quote-right"></i></label>
            </div>
            <textarea type="text" name="payload[info]"
                      class="form-control">Nuovo servizio</textarea>
        </div>
    </div>

    <input type="hidden" name="category_id" value="{{$category->id}}">
    <input type="hidden" name="payload[description]" value="">
    <button class="btn btn-primary btn-block">Aggiungi</button>
</form>
