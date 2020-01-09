<table class="table mb-0 table-responsive-sm">
    <tbody id="sortableModels" data-model="Product">
    @foreach($category->product()->get() as $product)
        <tr data-id="{{$product->id}}">
            <td>
                <span class="sold-thumb bg-dark"><i class="fas fa-box"></i></span>
            </td>

            @if(eshop()->option('amazon'))
                <td data-tippy-content="{{isset($product->payload()->publish['amazon'])?'Pubblicato':'Non pubblicato'}}"
                    class="text-{{isset($product->payload()->publish['amazon'])?'success':'danger'}}"><i
                        class="fab fa-amazon"></i>
                </td>
            @endif
            @if(eshop()->option('amazon'))
                <td data-tippy-content="{{isset($product->payload()->publish['ebay'])?'Pubblicato':'Non pubblicato'}}"
                    class="text-{{isset($product->payload()->publish['ebay'])?'success':'danger'}}"><i
                        class="fab fa-ebay"></i>
                </td>
            @endif
            @if(eshop()->option('amazon'))
                <td data-tippy-content="{{isset($product->payload()->publish['merchant'])?'Pubblicato':'Non pubblicato'}}"
                    class="text-{{isset($product->payload()->publish['merchant'])?'success':'danger'}}"><i
                        class="fab fa-google"></i>
                </td>
            @endif
            @if(eshop()->option('amazon'))
                <td data-tippy-content="{{isset($product->payload()->publish['facebook'])?'Pubblicato':'Non pubblicato'}}"
                    class="text-{{isset($product->payload()->publish['facebook'])?'success':'danger'}}"><i
                        class="fab fa-facebook"></i>
                </td>
            @endif
            <td data-tippy-content="{{isset($product->payload()->publish['www'])?'Pubblicato':'Non pubblicato'}}"
                class="text-{{isset($product->payload()->publish['www'])?'success':'danger'}}"><i
                    class="fab fa-edge"></i>
            </td>
            @if(eshop()->option('amazon'))
                <td data-tippy-content="{{isset($product->payload()->publish['alibaba'])?'Pubblicato':'Non pubblicato'}}">
                    <svg style="margin: unset" t="1578448004054" class="icon" viewBox="0 0 1041 1024" version="1.1"
                         xmlns="http://www.w3.org/2000/svg" p-id="1136" xmlns:xlink="http://www.w3.org/1999/xlink"
                         width="28" height="28">
                        <defs>
                            <style type="text/css"></style>
                        </defs>
                        <path
                            d="M624.601486 692.342857c-42.514286 2.971429-38.4-19.771429-13.142857-52.8 57.6-76.8 164.228571-181.142857 169.028571-257.371428 6.628571-98.971429-92.914286-129.6-195.428571-129.6-71.314286 1.828571-145.142857 21.6-195.428572 39.542857-173.257143 61.142857-281.828571 157.142857-350.742857 265.142857-71.314286 106.742857-49.142857 209.371429 104.914286 212.342857 116.342857-4.8 194.857143-37.142857 273.942857-77.942857 0.571429 0-220 62.971429-301.6 16.8-9.028571-4.8-17.942857-11.428571-20.342857-29.942857 0-37.828571 62.4-77.371429 98.971428-89.942857v-64.8c73.714286 25.828571 160.685714 18.628571 235.085715-36.571429 2.4 6.628571 4.8 14.971429 4.228571 24h12.571429c2.971429-25.828571-14.4-50.971429-43.2-52.8 8.342857 6.628571 14.4 12 17.371428 16.8l-1.142857 1.142857-0.571429 0.571429c-95.885714 67.2-188.914286 36-197.828571 34.171428l53.371429-52.228571-14.971429-37.828572c106.171429-37.142857 193.714286-64.228571 339.314286-89.942857l-32.571429-26.285714 16.8-10.171429c86.285714 24 144.457143 41.942857 141.485714 87.542858-1.142857 7.771429-4.228571 16.8-9.028571 26.4C689.972914 459.542857 614.430057 541.714286 583.801486 577.142857c-19.771429 23.428571-39.542857 45.028571-53.371429 66.628572-15.542857 22.171429-23.428571 42.628571-24 61.142857 2.971429 150.628571 447.314286-70.742857 534.857143-129.028572-127.657143 54.628571-266.171429 106.857143-416.685714 116.457143z m97.142857-346.171428c3.2 5.942857 4.685714 13.257143 4.685714 21.828571-0.114286-7.771429-1.6-15.2-4.685714-21.828571z"
                            p-id="1137"
                            fill="#{{isset($product->payload()->publish['alibaba'])?'0F9D58':'FF788E'}}"></path>
                    </svg>
                </td>
            @endif

            <td>
                <h4 class="text-black-50">{{$product->getPayload('name')}}</h4>
            </td>

            <td>
                <span class="badge badge-info">{{$product->media()->count()}} Media</span>
            </td>

            <td>
                <h3>{{$product->getPayload('price')}} <i class="fas fa-euro-sign"></i></h3>
            </td>

            <td class="text-warning">{{$product->created_at}}</td>

            <td class="draggable">
                <a href="#!" style="cursor: move"
                   data-tippy-content="Scala Posizione">
                    <i class="fas fa-grip-lines"></i>
                </a>
            </td>

            <td><a href="{{backend("category/{$category->id}/product/{$product->id}")}}"
                   data-tippy-content="Gestione">
                    <i class="far fa-edit"></i>
                </a>
            </td>
            <td><a href="{{backend("model/delete/Product/{$product->id}")}}"
                   data-tippy-content="Elimina">
                    <i class="fas fa-trash-alt text-danger"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
