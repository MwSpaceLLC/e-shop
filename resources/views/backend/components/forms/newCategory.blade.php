<form action="{{route('eshop-model-insert', 'Category')}}" method="post"> @csrf

    <div class="form-group" data-tippy-content="Nome della Categoria">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text">
                    <i class="fas fa-box-open"></i>
                </label>
            </div>
            <input type="text" name="payload[name]" class="form-control"
                   required placeholder="iPhone">
        </div>
    </div>

    <div class="form-group" data-tippy-content="Tassa (es. 22% IVA)">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text">
                    <i class="fas fa-comment-dollar"></i>
                </label>
            </div>
            <select class="form-control" name="tax_id">
                @forelse(eshop()->tax()->all() as $tax)
                    <option value="{{$tax->id}}">
                        {{$tax->name}} | {{$tax->rate}} ({{$tax->excluding?'Esclusa':'Inclusa'}})
                    </option>
                @empty
                    <option selected disabled>--- nessuna ---</option>
                @endforelse
            </select>
        </div>
    </div>

    <div class="form-group" data-tippy-content="Breve descrizione">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text">
                    <i class="fas fa-info-circle"></i>
                </label>
            </div>
            <textarea type="text" rows="3" name="payload[info]"
                      class="form-control">Nuova Categoria</textarea>
        </div>
    </div>

    <input type="hidden" name="payload[description]" value="">
    <button class="btn btn-primary btn-block">Aggiungi</button>
</form>
