<div id="myModal" class="modal">
    <span class="close cursor" onclick="closeModal()">&times;</span>
    <span style="color: #fff;">{{$mobile->name}}</span>
    <div class="modal-content " style="background-color: black">
        @foreach($mobile->images as $key=>$image)
            <div class="mySlides text-center">
                <img src="{{asset('storage'.$image->image_path)}}" style="width: 350px;height:450px;">
                <div class="numbertext">{{$key+1}} / {{$mobile->images->count()}} </div>
            </div>
    @endforeach

    <!-- Next/previous controls -->
        <a class="prev" style="color: white" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" style="color: white" onclick="plusSlides(1)">&#10095;</a>

        <div class="column">
            @foreach($mobile->images as $key=>$image)
                <img class="demo" style="width: 60px;height: 60px" src="{{asset('storage/'.$image->image_path)}}" onclick="currentSlide({{$key+1}})">
            @endforeach
        </div>
    </div>
</div>