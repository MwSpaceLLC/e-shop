<table class="table mb-0 table-responsive-sm">
    <tbody>
    @foreach(eshop()->category()->all() as $category)
        <tr>
            <td>
                <span class="sold-thumb"><i class="la la-arrow-down"></i></span>
            </td>

            <td>
                <span class="badge badge-danger">{{$category->product()->count()}} Prodotti</span>
            </td>
            <td>
                {{$category->payload()->name}}
            </td>
            <td>
                @if($tax = $category->tax()->first())
                    {{$tax->payload()->name}}
                @else
                    Nessuna Tassa
                @endif
            </td>
            <td>
                {{\Illuminate\Support\Str::limit($category->payload()->info)}}
            </td>
            <td class="text-warning">{{$category->created_at}}</td>
            <td><a href="{{backend("category/{$category->id}")}}"
                   data-tippy-content="Gestione">
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
