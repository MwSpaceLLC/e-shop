<table class="table mb-0 table-responsive-sm">
    <tbody>
    @foreach(eshop()->category()->all() as $category)
        <tr>
            <td>
                <h4 class="text-black-50">{{$category->getPayload('name')}}</h4>
            </td>
            <td>
                <span class="sold-thumb bg-dark"><i class="far fa-hdd"></i></span>
            </td>

            <td>
                <span class="badge badge-info">{{$category->product()->count()}} Prodotti</span>
            </td>
            <td>
                @if($tax = $category->tax()->first())
                    {{$tax->payload()->rate}}
                    {{$tax->payload()->name}}
                    ({{$tax->payload()->position}})
                @else
                    Nessuna Tassa
                @endif
            </td>
            <td>
                {{\Illuminate\Support\Str::limit($category->getPayload('info'))}}
            </td>
            <td class="text-warning">{{$category->created_at}}</td>
            <td><a href="{{backend("category/{$category->id}/products")}}"
                   data-tippy-content="Gestione">
                    <i class="fas fa-tasks"></i>
                </a>
            </td>
            <td><a href="{{backend("category/{$category->id}")}}"
                   data-tippy-content="Modifica">
                    <i class="far fa-edit"></i>
                </a>
            </td>
            <td><a href="{{backend("model/delete/Category/{$category->id}")}}"
                   data-tippy-content="Elimina">
                    <i class="fas fa-trash-alt text-danger"></i>
                </a></td>
        </tr>
    @endforeach
    </tbody>
</table>
