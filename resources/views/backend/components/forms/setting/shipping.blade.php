<form action="{{backend("config/update")}}" method="post"> @csrf
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
                                <i class="fas fa-plug"></i>
                            </span>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">Tipo delle chiamate API</h5>
                                <select data-selected="{{eshop()->config('SHIPPO_STATUS')}}"
                                        class="form-control"
                                        name="payload[SHIPPO_STATUS]">
                                    <option value="">Test</option>
                                    <option value="prod">Produzione</option>
                                </select>

                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li class="mt-2 test">
                <div class="row">
                    <div class="col-9">
                        <div class="media">
                            <span class="mr-3">
                                <i class="fas fa-hippo"></i>
                            </span>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">(test) Tokens Shippo</h5>
                                <input type="text" class="form-control" required
                                       name="payload[SHIPPO_TOKEN_TEST]"
                                       value="{{eshop()->config('SHIPPO_TOKEN_TEST')}}">
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
                                <i class="fas fa-hippo"></i>
                            </span>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">Live Tokens Shippo</h5>
                                <input type="text" class="form-control"
                                       name="payload[SHIPPO_TOKEN]"
                                       value="{{eshop()->config('SHIPPO_TOKEN')}}">
                            </div>
                        </div>
                    </div>
                </div>
            </li>

        </ul>

    </div>
</form>
