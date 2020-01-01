<div class="card">
    <div class="card-body">
        <h5 class="card-title">Api Category</h5>
        <div class="help-menu">
            <ul class="list-unstyled">
                <li><a href="{{backend('api/user')}}">User Api</a></li>
                <li><a href="#">Basic Usage</a></li>
                <li><a href="#">Payments</a></li>
                <hr>
                <li><a href="{{backend('api/static/blade')}}">Blade Api</a></li>
                <li><a href="#">Plugins</a></li>
                <li><a href="#">Control Panel</a></li>
                <li><a href="#">Uploading Files</a></li>

                <button type="button" class="btn btn-primary m-t-sm" data-toggle="modal"
                        data-target="#exampleModal">
                    Subimt Request
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Help Request</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <input type="email" class="form-control"
                                               id="exampleInputEmail1"
                                               aria-describedby="emailHelp"
                                               placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="topic"
                                               placeholder="Enter topic">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="account"
                                               placeholder="Account link">
                                    </div>
                                    <div class="form-group">
                                                                <textarea class="form-control"
                                                                          placeholder="Ask a question" id="question"
                                                                          rows="3"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Cancel
                                </button>
                                <button type="button" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </ul>
        </div>
    </div>
</div>
