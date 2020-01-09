<form action="{{backend("model/update/Category/{$category->id}")}}" method="post"> @csrf
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
                                <i class="fas fa-eye"></i>
                            </span>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">Stato</h5>
                                <select class="form-control" name="payload[status]">
                                    <option
                                        {{$category->getPayload('status') == 'enable'?:''}} value="enable">
                                        Abilitata
                                    </option>
                                    <option
                                        {{$category->getPayload('status') == 'disable'?'selected':''}} value="disable">
                                        Disabilitata
                                    </option>
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
                                <i class="fas fa-comment-dollar"></i>
                            </span>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">Tassa Categoria</h5>
                                <select class="form-control" name="tax_id">
                                    @forelse(eshop()->tax()->all() as $tax)
                                        <option {{$tax->id == $category->tax_id?'selected':null}} value="{{$tax->id}}">
                                            {{$tax->payload()->name}} | {{$tax->payload()->rate}}
                                            ({{$tax->payload()->position}})
                                        </option>
                                    @empty
                                        <option selected disabled>--- nessuna ---</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>

    </div>
</form>
