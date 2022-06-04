@extends('admin.layouts.layout')

@section('header')
    <link rel="stylesheet" href="{{asset('admin/plugins/dropify/dist/css/dropify.min.css')}}">

@endsection


@section('page-title')

    إختر الدين
@endsection


@section('page-create')
    {{-- اضافة زرار--}}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <form class="form" method="post" action="{{route('choseCountry.updatee')}}" enctype="multipart/form-data">
                        @method('put')
                        @csrf



                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                     <button class="col-md-12 btn btn-success text-black-50" type="submit">
                                    <label> كل الاديان</label>
                                    <input data-validation="required" type="hidden"  name="re" id="country_id" value="0" class="form-control"/>
                                     </button>
                                </div>
                            </div>

                        </div>
                    </form>
                    <form class="form" method="post" action="{{route('choseCountry.updatee')}}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                     <button class="col-md-12 btn btn-info text-black-50" type="submit">
                                    <label> الإسلام </label>
                                    <input data-validation="required" type="hidden"  name="re"  value="1" class="form-control"/>
                                     </button>
                                </div>
                            </div>

                        </div>
                    </form>
                    <form class="form" method="post" action="{{route('choseCountry.updatee')}}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                     <button class="col-md-12 btn btn-danger text-black-50" type="submit">
                                    <label> المسيحية</label>
                                    <input data-validation="required" type="hidden"  name="re"  value="2" class="form-control"/>
                                     </button>
                                </div>
                            </div>

                        </div>
                 {{--          @if($countries->count()>0)
                               @foreach( $countries as  $country)

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="col-md-12 btn btn-info text-black-50" type="submit">
                                                <label>
                                                        {{$country->name}}
                                                      </label>
                                                <input data-validation="required" type="hidden"  name="re" id="country_id" value="{{$country->id}}" class="form-control"/>
                                            </button>
                                        </div>
                                    </div>
                                </div>


                            @endforeach
                                   {{$countries->links()}}

                        @endif--}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script src="{{asset('admin/plugins/dropify/dist/js/dropify.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('.dropify').dropify();

        });
    </script>
    <script>
        $(document).ready(function () {


        });
    </script>
@endsection

