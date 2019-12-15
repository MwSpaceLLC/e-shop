// Write your custom JS here

function addPayload() {
    var li = document.createElement("li");
    li.innerHTML = `
             <li class="m-1 bg-light p-2">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="key[]" class="form-control"
                               placeholder="payload_key">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="data[]" class="form-control"
                               placeholder="String Content">
                    </div>
                </div>
            </li>
            `;
    payload.appendChild(li);
}
