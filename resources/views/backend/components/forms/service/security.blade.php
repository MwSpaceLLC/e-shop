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
                                <h5 class="mt-0 mb-1">Accesso alla categoria</h5>
                                <select data-selected="{{$service->role}}" class="form-control" name="payload[role]">
                                    <option value="public">
                                        Pubblica
                                    </option>
                                    <option value="user">
                                        Utenti
                                    </option>
                                    <option value="admin">
                                        Admin
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>

    </div>
</form>
