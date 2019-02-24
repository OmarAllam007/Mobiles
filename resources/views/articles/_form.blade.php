<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item gallery">
        <a class="nav-link  active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="true">{{t('Review')}}</a>
    </li>
    <li class="nav-item gallery">
        <a class="nav-link" id="gallery-tab" data-toggle="tab" href="#gallery" role="tab" aria-controls="gallery" aria-selected="false">{{t('Gallery')}}</a>
    </li>

</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
        <div class="form-group col-md-6 {{$errors->has('titke')? 'has-error' : ''}}">
            <label for="title">{{t('Title')}}</label>
            <input type="text" class="form-control" name="title" id="title" value="{{$article->title ?? ''}}">
            @if ($errors->has('title'))
                <div class="error-message">{{$errors->first('title')}}</div>
            @endif
        </div>

        <div class="form-group col-md-6 {{$errors->has('cover_image')? 'has-error' : ''}}">
            <label for="cover_image" class="control-label">{{t('Cover Image')}}</label>
            <input type="file" name="cover_image" class="form-control" id="cover_image">
            @if ($errors->has('cover_image'))
                <div class="error-message">{{$errors->first('cover_image')}}</div>
            @endif
        </div>

        @if(isset($article))
            <div style="width: 18rem;" class="col-md-12">
                <div class="form-group  {{$errors->has('image_path')? 'has-error' : ''}}">
                    <img class="card-img-top" src="{{asset('storage'.$article->cover_image)}}" alt="Cover Image">
                </div>
            </div>
        @endif

        <div class="form-group col-md-12 {{$errors->has('content')? 'has-error' : ''}}">
            <label for="mytextarea" class="control-label">{{t('Content')}}</label>
            <textarea name="content"  cols="30" rows="30" class="form-control richeditor">{{$article->content ?? ''}}
            </textarea>
            @if ($errors->has('content'))
                <div class="error-message">{{$errors->first('content')}}</div>
            @endif
        </div>


        <div class="form-group col-md-12">
            <button class="btn btn-success"><i class="fa fa-save"></i> {{t('Save')}}</button>
        </div>

    </div>
    <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
        <div class="row" style="margin-top: 10px">
            <gallery></gallery>
        </div>
    </div>
</div>

{{csrf_field()}}

