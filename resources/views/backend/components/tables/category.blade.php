<table class="table mb-0 table-responsive-sm">
    <tbody>
    @foreach($category->product()->get() as $product)
        <tr>
            <td>
                <span class="sold-thumb"><i class="la la-arrow-down"></i></span>
            </td>

            <td>
                <span class="badge badge-danger">{{$product->media()->count()}} Media</span>
            </td>
            <td>
                {{$product->payload()->name}}
            </td>
            <td>
                @if($tax = $category->tax()->first())
                    {{$tax->payload()->name}}
                @else
                    Nessuna Tassa
                @endif
            </td>
            <td>
                {{\Illuminate\Support\Str::limit($product->payload()->info)}}
            </td>
            <td class="text-warning">{{$product->created_at}}</td>
            <td><a href="{{backend("model/Product/{$product->id}")}}"
                   data-tippy-content="Gestione">
                    <i class="far fa-edit"></i>
                </a>
            </td>
            <td><a href="{{backend("model/delete/Product/{$product->id}")}}"
                   data-tippy-content="Elimina">
                    <i class="fas fa-trash-alt text-danger"></i>
                </a></td>
        </tr>
    @endforeach
    </tbody>
</table>
