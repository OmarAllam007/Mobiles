<div class="form-group {{$errors->has('pros')? 'has-error' : ''}}">
    <label for="pros">{{t('Pros')}}</label>
    <textarea class=" form-control" name="pros" id="pros">
        {{$mobile->pros ?? ''}}
    </textarea>
    @if ($errors->has('pros'))
        <div class="error-message">{{$errors->first('pros')}}</div>
    @endif

    <a tabindex="0" class="btn btn-sm btn-outline-info" role="button"
       data-toggle="popover" data-trigger="focus" title="hint"
       data-content="Make a comma between each one.">
        <i class="fa fa-question-circle"></i>
    </a>
</div>

<div class="form-group {{$errors->has('cons')? 'has-error' : ''}}">
    <label for="cons">{{t('Cons')}}</label>
    <textarea class=" form-control" name="cons" id="cons">
        {{$mobile->cons ?? ''}}
    </textarea>
    @if ($errors->has('cons'))
        <div class="error-message">{{$errors->first('cons')}}</div>
    @endif

    <a tabindex="0" class="btn btn-sm btn-outline-info" role="button"
       data-toggle="popover" data-trigger="focus" title="hint"
       data-content="Make a comma between each one.">
        <i class="fa fa-question-circle"></i>
    </a>
</div>

