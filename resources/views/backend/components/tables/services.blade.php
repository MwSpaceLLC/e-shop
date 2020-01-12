<table class="table mb-0 table-responsive-sm">
    <tbody id="sortableModels" data-model="Service" data-success="Posizione aggiornata"
           data-error="Errore durante l'aggiornamento delle posizioni">
    @foreach($category->service()->get() as $service)
        <tr data-id="{{$service->id}}" class="sortableItem">
            <td>
                <span class="sold-thumb bg-dark"><i class="fas fa-box"></i></span>
            </td>

            <td data-tippy-content="{{$service->enable?'Pubblicato':'Non pubblicato'}}"
                class="text-{{$service->enable?'success':'danger'}}"><i
                    class="fab fa-edge"></i>
            </td>

            <td>
                <h4 class="text-black-50">{{$service->name}}</h4>
            </td>

            <td>
                <span class="badge badge-primary">Intervallo: <b>{{$service->interval??'Nessuno'}}</b> </span>
            </td>

            <td>
                <span class="badge badge-info">{{$service->media()->count()}} Media</span>
            </td>

            <td>
                <h3>{{$service->price}} <i class="fas fa-euro-sign"></i></h3>
            </td>

            <td class="text-warning">{{$service->created_at}}</td>

            <td class="draggable">
                <a href="#!" style="cursor: move"
                   data-tippy-content="Scala Posizione">
                    <i class="fas fa-grip-lines"></i>
                </a>
            </td>

            <td><a href="{{backend("category/{$category->id}/service/{$service->id}")}}"
                   data-tippy-content="Gestione">
                    <i class="far fa-edit"></i>
                </a>
            </td>
            <td><a href="{{backend("model/delete/Service/{$service->id}")}}"
                   data-tippy-content="Elimina">
                    <i class="fas fa-trash-alt text-danger"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
