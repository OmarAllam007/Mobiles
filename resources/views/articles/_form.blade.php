<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="true">{{t('Review')}}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="gallery-tab" data-toggle="tab" href="#gallery" role="tab" aria-controls="gallery" aria-selected="false">{{t('Gallery')}}</a>
    </li>

</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
        <div class="form-group col-md-6 {{$errors->has('subject')? 'has-error' : ''}}">
            <label for="subject">{{t('Subject')}}</label>
            <input type="text" class="form-control" name="subject" id="subject" value="{{$review->subject ?? ''}}">
            @if ($errors->has('subject'))
                <div class="error-message">{{$errors->first('subject')}}</div>
            @endif
        </div>

        <div class="form-group col-md-6 {{$errors->has('cover_image')? 'has-error' : ''}}">
            <label for="cover_image" class="control-label">{{t('Cover Image')}}</label>
            <input type="file" name="cover_image" class="form-control" id="cover_image">
            @if ($errors->has('cover_image'))
                <div class="error-message">{{$errors->first('cover_image')}}</div>
            @endif
        </div>

        @if(isset($review))
            <div style="width: 18rem;" class="col-md-12">
                <div class="form-group  {{$errors->has('image_path')? 'has-error' : ''}}">
                    <img class="card-img-top" src="{{asset('storage'.$review->cover_image)}}" alt="Cover Image">
                </div>
            </div>
        @endif

        <div class="form-group col-md-12 {{$errors->has('content')? 'has-error' : ''}}">
            <label for="content" class="control-label">{{t('Content')}}</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control textarea">
                {{$review->content ?? ''}}
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
        <gallery-component :review_id="{{$review->id ?? ''}}"></gallery-component>

    </div>
</div>

{{csrf_field()}}

