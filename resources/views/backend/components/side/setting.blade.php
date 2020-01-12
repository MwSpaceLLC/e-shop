<div class="card-body">
    <ul>
        <li class="nav-item">
            <a href="{{backend("settings")}}"
               class="nav-link {{$current =='global'?'active': ''}}">
                <i class="fas fa-paragraph"></i>
                <span>Generali</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{backend("settings/payment")}}"
               class="nav-link {{$current =='payment'?'active': ''}}">
                <i class="fas fa-credit-card"></i>
                <span>Pagamenti</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{backend("settings/shipping")}}"
               class="nav-link {{$current =='shipping'?'active': ''}}">
                <i class="fas fa-shipping-fast"></i>
                <span>Spedizioni</span>
            </a>
        </li>
    </ul>
</div>
