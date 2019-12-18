@if($message = session()->get('success'))
    <div class="toast fade show alert-success" style=" position: absolute; width: 300px; top: 10px; right: 10px; "
         role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="mr-auto">Notification</strong>
            <small>11 mins ago</small>
            <button type="button" onclick="this.closest('.toast').remove()" class="ml-2 mb-1 close" data-dismiss="toast"
                    aria-label="Close">
                <i class="material-icons">close</i>
            </button>
        </div>
        <div class="toast-body">
            {{ $message }}
        </div>
    </div>
@endif
