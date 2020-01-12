<form action="{{backend("model/update/Service/{$service->id}")}}" method="post"> @csrf
    <div class="row">
        <div class="col-md-4 offset-md-8">
            <button type="submit" class="btn btn-outline-success px-4">
                Aggiorna impostazioni
            </button>
        </div>
    </div>

    <hr class="hr-light">

    <div class="form">
        <ul class="linked_account payloads">
            <li class="mt-2">
                <div class="row">
                    <div class="col-9">
                        <div class="media">
                            <span class="mr-3">
                                <i class="fas fa-user-tag"></i>
                            </span>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">Ciclo ricorrente dei pagamenti</h5>
                                <select data-selected="{{$service->interval}}" class="form-control"
                                        name="payload[interval]">
                                    <option value="unless"> Non Ricorrente</option>
                                    <option value="month"> Mensile</option>
                                    <option value="year"> Annuale</option>
                                    <option value="week"> Settimanale</option>
                                    <option value="day"> Giornaliero</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>

    </div>
</form>
