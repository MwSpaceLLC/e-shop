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
                                <i class="fas fa-ruler-vertical"></i>
                            </span>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">Lunghezza</h5>
                                <input type="text" class="form-control"
                                       name="payload[length]"
                                       placeholder="30"
                                       value="{{$product->getPayload('length')}}">
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
                                <i class="fas fa-ruler-horizontal"></i>
                            </span>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">Larghezza</h5>
                                <input type="text" class="form-control"
                                       name="payload[width]"
                                       placeholder="30"
                                       value="{{$product->getPayload('width')}}">
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
                                <i class="fas fa-ruler-combined"></i>
                            </span>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">Altezza</h5>
                                <input type="text" class="form-control"
                                       name="payload[height]"
                                       placeholder="30"
                                       value="{{$product->getPayload('height')}}">
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
                                <i class="fas fa-calculator"></i>
                            </span>
                            <div class="media-body" data-tippy-content='"cm""in""ft""mm""m""yd"'>
                                <h5 class="mt-0 mb-1">Unità di misura delle grandezze</h5>
                                <select class="form-control" name="payload[distance_unit]">
                                    <option value="cm"> Centimetri</option>
                                    <option value="in"> Pollici</option>
                                    <option value="mm"> Millimetri</option>
                                    <option value="m"> Metri</option>
                                    <option value="yd"> Iard</option>
                                </select>
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
                                <i class="fas fa-weight-hanging"></i>
                            </span>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">Peso</h5>
                                <input type="text" class="form-control"
                                       name="payload[weight]"
                                       placeholder="30"
                                       value="{{$product->getPayload('weight')}}">
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
                                <i class="fas fa-calculator"></i>
                            </span>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">Unità di misura del peso</h5>
                                <select class="form-control" name="payload[mass_unit]">
                                    <option value="g"> Grammi</option>
                                    <option value="oz"> Once</option>
                                    <option value="lb"> Libre</option>
                                    <option value="kg"> Kili</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>

    </div>
</form>
