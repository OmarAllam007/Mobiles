<div id="images">
    <div class="row">
        <div class="col-12">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-information"
                       role="tab"
                       aria-controls="nav-home" aria-selected="true">{{t('Information')}}</a>
                    <a class="nav-item nav-link" id="nav-images-tab" data-toggle="tab" href="#nav-images" role="tab"
                       aria-controls="nav-images" aria-selected="false">{{t('Images')}}</a>
                </div>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-information" role="tabpanel"
                     aria-labelledby="nav-information-tab">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-3">
                            @include('mobile._partials.general_info')
                        </div>
                        <div class="col-3">
                            @include('mobile._partials.hardware_info')
                            @include('mobile._partials.memory_info')
                        </div>

                        <div class="col-3">
                            @include('mobile._partials.screen')
                        </div>

                        <div class="col-3">
                            @include('mobile._partials.camera')
                        </div>

                        <div class="col-3">
                            @include('mobile._partials.battery')
                        </div>

                        <div class="col-3">
                            @include('mobile._partials.communication')
                        </div>

                        <div class="col-3">
                            @include('mobile._partials.media')
                            @include('mobile._partials.others')
                        </div>

                        <div class="col-3">
                            @include('mobile._partials.purchase_info')
                            @include('mobile._partials.image')
                        </div>

                        <div class="col-12">
                            @include('mobile._partials.affiliate_urls')
                            @include('mobile._partials.pros_cons')

                            <div class="form-group {{$errors->has('keywords')? 'has-error' : ''}}">
                                <label for="keywords">{{t('Keywords')}}</label>
                                <input type="text" class=" form-control-sm form-control" name="keywords" id="keywords"
                                       value="{{$mobile->keywords ?? ''}}">
                                @if ($errors->has('keywords'))
                                    <div class="error-message">{{$errors->first('keywords')}}</div>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('available_in_egypt')? 'has-error' : ''}}">
                                <input type="checkbox" name="available_in_egypt" id="available_in_egypt"
                                       @if(isset($mobile) && $mobile->available_in_egypt) checked @endif>
                                <label for="available_in_egypt">{{t('Available in Egypt')}}
                                </label>
                                @if ($errors->has('available_in_egypt'))
                                    <div class="error-message">{{$errors->first('available_in_egypt')}}</div>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('is_online')? 'has-error' : ''}}">
                                <input type="checkbox" name="is_online" id="is_online"
                                       @if(isset($mobile) && $mobile->is_online) checked @endif>
                                <label for="is_online">{{t('Make It Online')}}
                                </label>
                                @if ($errors->has('is_online'))
                                    <div class="error-message">{{$errors->first('is_online')}}</div>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('main_ram_description')? 'has-error' : ''}}">
                                <label for="main_ram_description">{{t('Main Ram Description')}}</label>
                                <input type="text" class=" form-control-sm form-control" name="main_ram_description" id="main_ram_description"
                                       value="{{$mobile->main_ram_description ?? ''}}">
                                @if ($errors->has('main_ram_description'))
                                    <div class="error-message">{{$errors->first('main_ram_description')}}</div>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('main_battery_description')? 'has-error' : ''}}">
                                <label for="main_battery_description">{{t('Main Battery Description')}}</label>
                                <input type="text" class=" form-control-sm form-control" name="main_battery_description" id="main_battery_description"
                                       value="{{$mobile->main_battery_description ?? ''}}">
                                @if ($errors->has('main_battery_description'))
                                    <div class="error-message">{{$errors->first('main_battery_description')}}</div>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('main_price_description')? 'has-error' : ''}}">
                                <label for="main_price_description">{{t('Main Price Description')}}</label>
                                <input type="text" class=" form-control-sm form-control" name="main_price_description" id="main_price_description"
                                       value="{{$mobile->main_price_description ?? ''}}">
                                @if ($errors->has('main_price_description'))
                                    <div class="error-message">{{$errors->first('main_price_description')}}</div>
                                @endif
                            </div>
                            @include('mobile._partials.ads')
                        </div>
                    </div>


                </div>
                <div class="tab-pane fade" id="nav-images" role="tabpanel" aria-labelledby="nav-images-tab">
                    <div class="form-group">
                        <label for="image">{{t('Mobile Images')}}</label>
                        <input type="file" class="form-control-file" id="image" name="images[]" multiple>
                    </div>
                    <br>
                    @if(isset($mobile))
                        <div class="row">
                            @foreach($mobile->images as $mobile_image)
                                <div class="col-sm-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <button data-image="{{$mobile_image->id}}" data-token="{{ csrf_token() }}"
                                                    type="button" class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                        <img class="card-img-top" src="{{asset('storage'.$mobile_image->image_path)}}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <br>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <button class="btn btn-success"><i class="fa fa-save"></i> {{t('Save')}}</button>
        </div>
    </div>
</div>


@section('scripts')
    <script>
        $('button.btn-danger').on('click', function () {
            let token = $(this).data('token');
            $.ajax({
                url: '/mobile-image/' + $(this).data('image'),
                type: 'post',
                data: {_method: 'delete', _token: token},
                success: function (msg) {
                    parent.location.reload();
                }
            });
        })

    </script>
@endsection



