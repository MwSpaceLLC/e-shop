<div class="sidebar">
    <div class="menu">
        <ul>
            <li>
                <a class="{{request()->is(backend())?'active':''}}" href="{{backend()}}" data-tippy-content="Home">
                    <span><i class="la la-igloo"></i></span>
                </a>
            </li>
            <li>
                <a class="{{request()->is(backend('catalogo'))?'active':''}}" href="{{backend('catalogo')}}"
                   data-tippy-content="Catalogo">
                    <span><i class="fas fa-server"></i></span>
                </a>
            </li>
            <li>
                <a class="{{request()->is(backend('utenti'))?'active':''}}" href="{{backend('utenti')}}"
                   data-tippy-content="Utenti">
                    <span><i class="la la-user"></i></span>
                </a>
            </li>
            <li>
                <a class="{{request()->is(backend('portafoglio'))?'active':''}}" href="{{backend('portafoglio')}}"
                   data-tippy-content="Portafoglio">
                    <span><i class="fas fa-coins"></i></span>
                </a>
            </li>
            <li>
                <a class="{{request()->is(backend('impostazioni'))?'active':''}}" href="{{backend('impostazioni')}}"
                   data-tippy-content="Impostazioni">
                    <span><i class="la la-tools"></i></span>
                </a>
            </li>
        </ul>
    </div>
</div>
