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
                                <i class="fas fa-signature"></i>
                            </span>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">Nome del negozio</h5>
                                <input type="text" class="form-control" required
                                       name="payload[SHOP_NAME]"
                                       value="{{eshop()->config('SHOP_NAME')}}">
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
                                <i class="fas fa-briefcase"></i>
                            </span>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">Ragione Sociale del negozio</h5>
                                <input type="text" class="form-control" required
                                       name="payload[SHOP_BUSINESS_NAME]"
                                       value="{{eshop()->config('SHOP_BUSINESS_NAME')}}">
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
                                <i class="fas fa-map-marked-alt"></i>
                            </span>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">Indirizzo</h5>
                                <input type="text" class="form-control" required
                                       name="payload[SHOP_ADDRESS]"
                                       value="{{eshop()->config('SHOP_ADDRESS')}}">
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
                                <i class="fas fa-mail-bulk"></i>
                            </span>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">Codice Postale</h5>
                                <input type="text" class="form-control" required
                                       name="payload[SHOP_ZIP_CODE]"
                                       value="{{eshop()->config('SHOP_ZIP_CODE')}}">
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
                                <i class="fas fa-globe"></i>
                            </span>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">Codice Paese</h5>
                                <input type="text" class="form-control" required
                                       name="payload[SHOP_COUNTRY_CODE]"
                                       value="{{eshop()->config('SHOP_COUNTRY_CODE')}}">
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
                                <i class="fas fa-city"></i>
                            </span>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">Città</h5>
                                <input type="text" class="form-control" required
                                       name="payload[SHOP_CITY]"
                                       value="{{eshop()->config('SHOP_CITY')}}">
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
                                <i class="fas fa-globe-africa"></i>
                            </span>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">Nazione</h5>
                                <input type="text" class="form-control" required
                                       name="payload[SHOP_COUNTRY]"
                                       value="{{eshop()->config('SHOP_COUNTRY')}}">
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
                                <i class="fas fa-map-signs"></i>
                            </span>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">Provincia</h5>
                                <input type="text" class="form-control" required
                                       name="payload[SHOP_DISTRICT]"
                                       value="{{eshop()->config('SHOP_DISTRICT')}}">
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
                                <i class="fas fa-phone"></i>
                            </span>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">Telefono
                                    <i data-tippy-content="Inserire il codice paese (+39)"
                                       class="fas fa-info-circle"></i>
                                </h5>
                                <input type="text" class="form-control" required
                                       name="payload[SHOP_PHONE]"
                                       value="{{eshop()->config('SHOP_PHONE')}}">
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
                                <i class="fas fa-mobile"></i>
                            </span>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">Cellulare
                                    <i data-tippy-content="Inserire il codice paese (+39)"
                                       class="fas fa-info-circle"></i>
                                </h5>
                                <input type="text" class="form-control"
                                       name="payload[SHOP_MOBILE]"
                                       value="{{eshop()->config('SHOP_MOBILE')}}">
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
                                <i class="fas fa-sort-numeric-down"></i>
                            </span>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">P. IVA</h5>
                                <input type="text" class="form-control"
                                       name="payload[SHOP_VAT]"
                                       value="{{eshop()->config('SHOP_VAT')}}">
                            </div>
                        </div>
                    </div>
                </div>
            </li>

        </ul>

    </div>
</form>
