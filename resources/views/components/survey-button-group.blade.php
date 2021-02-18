<div class="btn-group btn-block btn-group-justified btn-group-toggle" data-toggle="buttons">
    <label class="btn btn-outline-primary w-100">
        <input type="radio" name="{{$radioName}}" id="opt-{{$optNumber}}-y" value="true"> Sì
    </label>
    <label class="btn btn-outline-primary w-100">
        <input type="radio" name="{{$radioName}}" id="opt-{{$optNumber}}-n" value="false"> No
    </label>
    <label class="btn btn-outline-primary w-100 active">
        <input type="radio" name="{{$radioName}}" id="opt-{{$optNumber}}-d" value="null" checked> Non so
    </label>
</div>