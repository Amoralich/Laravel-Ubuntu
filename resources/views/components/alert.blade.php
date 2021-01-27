@if(session()->has("message"))
    @slot()
    <div class="alert-success">{{session()->get("message")}}</div>
    @slot()
@elseif(session()->has("error"))
    <div class="alert alert-danger">{{}}</div>
@endif
