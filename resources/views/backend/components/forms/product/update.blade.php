<form action="{{backend("model/update/Product/{$product->id}")}}" method="post"> @csrf
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
                                <i class="fas fa-font"></i>
                            </span>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">Nome</h5>
                                <input type="text" class="form-control"
                                       name="payload[name]"
                                       value="{{$product->name}}">
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="mt-2">
                <div class="row">
                    <div class="col-9">
                        <div class="media">
                            <span class="mr-3">
                                <i class="fas fa-euro-sign"></i>
                            </span>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">Prezzo</h5>
                                <input type="text" class="form-control price"
                                       name="payload[price]"
                                       value="{{$product->price}}">
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="mt-2">
                <div class="row">
                    <div class="col-9">
                        <div class="media">
                            <span class="mr-3">
                                <i class="fas fa-underline"></i>
                            </span>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">Descrizione Breve</h5>
                                <textarea class="form-control"
                                          name="payload[info]">{{$product->info}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="mt-2">
                <div class="row">
                    <div class="col-9">
                        <div class="media">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">Descrizione Dettagliata</h5>
                                <textarea class="form-control tiny"
                                          name="payload[description]">{{$product->description}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>

    </div>
</form>
