<div class="card-body">
    <ul>
        <li class="nav-item">
            <a href="{{backend("category/{$category->id}/product/{$product->id}")}}"
               class="nav-link {{$current =='update'?'active': ''}}">
                <i class="fas fa-paragraph"></i>
                <span>Dati Generali</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{backend("category/{$category->id}/product/{$product->id}/preference")}}"
               class="nav-link {{$current =='preference'?'active': ''}}">
                <i class="fas fa-sliders-h"></i>
                <span>Preferenze</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{backend("category/{$category->id}/product/{$product->id}/shipping")}}"
               class="nav-link {{$current =='shipping'?'active': ''}}">
                <i class="fas fa-dolly"></i>
                <span>Spedizione</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{backend("category/{$category->id}/product/{$product->id}/security")}}"
               class="nav-link {{$current =='security'?'active': ''}}">
                <i class="fas fa-shield-alt"></i>
                <span>Sicurezza</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{backend("category/{$category->id}/product/{$product->id}/media")}}"
               class="nav-link {{$current =='media'?'active': ''}}">
                <i class="fas fa-photo-video"></i>
                <span>Libreria Media</span>
            </a>
        </li>
    </ul>
</div>
