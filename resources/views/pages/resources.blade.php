@extends('./layouts.app')
@section('title', 'Breeder Resources')
@section('content')

<div class="container">
    <h2 class="page-title text-center">RESOURCES</h2>
    <div class="page-description mb-5 rounded">
        <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
        </p>
    </div>
</div>

<div class="">
    <div class="container-fluid">
        <div class="resources-flex-area d-lg-flex justify-content-center">

            @include('components/adds-area')
            <?php
                $allBreeders = app('App\Http\Controllers\BreederController')->getAllBreeders();
//                dd($allBreeders);
                ?>

            <div class="resources-content-area container bg-white rounded p-3 mx-3">
                <div class="resources-cards row mx-1">
                    @if(isset($allBreeders))
                        @foreach($allBreeders as $bs)
                            <div onclick="singleBreeder({{$bs->getId()}})" class="col-xl-4 col-md-6 breeder-resource-card rounded p-3">
                                <div class="resource-card-image text-center">
                                    <img src="{{asset_file_url($bs->logo)}}" alt="kennel logo" width="100px">
                                </div>
                                <div class="resource-card-details my-3 d-flex flex-column">
                                    <h5><a href="" title="Breeder">{{$bs->username}}</a></h5>
                                    <a href="" title="kennel"><i class="fa fa-igloo"></i> &nbsp;{{$bs->kennelName}}</a>
                                    <span title="location"><i class="fas fa-map-marker-alt"></i> &nbsp;{{$bs->city}}</span>
                                </div>
                                <div class="resource-card-contact d-flex justify-content-around py-2">
                                    <a href="{{$bs->phone}}" title="call"><i class="fas fa-phone-alt"></i></a>
                                    <a href="{{$bs->email->asString()}}" title="Email"><i class="far fa-envelope"></i></a>
                                    <a href="{{$bs->website->asString()}}"><i class="fas fa-globe" title="Website"></i></a>
                                </div>
                            </div>
                        @endforeach
                    @endif



                </div>
            </div>




            @include('components/adds-area')
        </div>

    </div>
</div>

@endsection
<script type="text/javascript">
    function singleBreeder($id) {
        // console.log($slug);
        window.location = "http://frenchbulldog.test/show-kennel/"+$id;
    }
</script>
