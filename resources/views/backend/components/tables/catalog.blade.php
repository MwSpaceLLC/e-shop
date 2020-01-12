<table class="table mb-0 table-responsive-sm">
    <tbody id="sortableModels" data-model="Category" data-success="Posizione aggiornata"
           data-error="Errore durante l'aggiornamento delle posizioni">
    @foreach(eshop()->category()->get() as $category)
        <tr data-id="{{$category->id}}" class="sortableItem">
            <td>
                <h4 class="text-black-50">{{$category->name}}</h4>
            </td>
            <td>
                <span class="sold-thumb bg-dark"><i class="far fa-hdd"></i></span>
            </td>

            <td data-tippy-content="{{$category->enable?'Visibile':'Non visibile'}}"
                class="text-{{$category->enable?'success':'danger'}}"><i
                    class="fab fa-edge"></i>
            </td>

            <td>
                <span class="badge badge-info">{{$category->product()->count()}} Prodotti</span>
            </td>
            <td>
                <span class="badge badge-primary">{{$category->service()->count()}} Servizi</span>
            </td>
            <td>
                @if($tax = $category->tax()->first())
                    {{$tax->rate}}
                    {{$tax->name}}
                @else
                    Nessuna Tassa
                @endif
            </td>
            <td class="text-warning">{{$category->created_at}}</td>
            <td>
                <a class="draggable" href="#!" data-tippy-content="Scala Posizione">
                    <i class="fas fa-grip-lines"></i>
                </a>
            </td>
            <td>
                <a href="{{backend("category/{$category->id}/products")}}"
                   data-tippy-content="Prodotti">
                    <i class="fas fa-box-open"></i>
                </a>
            </td>
            <td>
                <a href="{{backend("category/{$category->id}/services")}}"
                   data-tippy-content="Servizi">
                    <i class="fas fa-people-carry"></i>
                </a>
            </td>
            <td>
                <a href="{{backend("category/{$category->id}")}}"
                   data-tippy-content="Modifica">
                    <i class="far fa-edit"></i>
                </a>
            </td>
            <td>
                <a href="{{backend("model/delete/Category/{$category->id}")}}"
                   data-tippy-content="Elimina">
                    <i class="fas fa-trash-alt text-danger"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
