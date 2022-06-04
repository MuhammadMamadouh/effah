@extends('admin.layouts.layout')

@section('header')
    <link rel="stylesheet" href="{{asset('admin/plugins/dropify/dist/css/dropify.min.css')}}">

@endsection


@section('page-title')
    {{-- عنوان الصفحة --}}
    الأسئلة
@endsection


@section('page-create')
    {{-- اضافة زرار--}}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <form class="form" method="post" action="{{route('question.store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group m-t-40 row @error('en_title') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">التصنيف<span
                                    class="text-danger">*</span></label>
                            <div class="col-10">
                                <select name="category_id"  class="form-control">
                                    <option selected disabled value="">  إختر التصنيف</option>
                                    @foreach($categories as $country)
                                        <option value=" {{$country->id}}">  {{$country->name}}</option>
                                    @endforeach
                                </select>
                                @error('en_title') <small class="form-control-feedback"> </small> @enderror
                            </div>
                        </div> <div class="form-group m-t-40 row @error('en_title') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">طبيغه السؤال<span
                                    class="text-danger">*</span></label>
                            <div class="col-10">
                                <select name="level" id="selectId" class="form-control">
                                    <option selected disabled value=""> اختر طبيعه السؤال</option>
                                        <option value="0">مستقل</option>
                                        <option  value="1">متعلق باجابة غيره تم تحديد الاسئله التي تقبل اختيار واحد فقط </option>
                                </select>
                                @error('en_title') <small class="form-control-feedback"> </small> @enderror
                            </div>
                        </div>
                        <div id="eet" style="display: none"  >
                            <div  class="form-group m-t-40 row @error('en_title') has-danger @enderror">
                                <label for="name-ar" class="col-2 col-form-label">السؤال الرئيسي<span
                                        class="text-danger">*</span></label>
                                <div class="col-10">
                                    <select id="qu_id" name="qu_id"  class="form-control">
                                        <option selected disabled value="">  إختر السؤال</option>
                                        @foreach($questions as $qu)
                                            <option value=" {{$qu->id}}">  {{$qu->content}}</option>
                                        @endforeach
                                    </select>
                                    @error('en_title') <small class="form-control-feedback"> </small> @enderror
                                </div>
                            </div>
                            <div  class="form-group m-t-40 row @error('en_title') has-danger @enderror">
                                <label for="name-ar" class="col-2 col-form-label"> الاجابة المتعلق بها<span
                                        class="text-danger">*</span></label>
                                <div class="col-10">
                                    <select name="ans_id" id="ans_id"  class="form-control">
                                        <option selected disabled value="">  إختر الاجابة</option>

                                    </select>
                                    @error('en_title') <small class="form-control-feedback"> </small> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-t-40 row @error('en_title') has-danger @enderror">
                            <label for="name-ar" class="col-2 col-form-label">الجنس <span
                                    class="text-danger">*</span></label>
                            <div class="col-10">
                                <select name="gender"  class="form-control">
                                    <option selected disabled value="">   إختر الجنس الموجه اليه </option>
                                        <option  value="0">  الجنسين</option>
                                        <option  value="1"> الذكور</option>
                                        <option  value="2">  الإيناث</option>
                                </select>
                                @error('en_title') <small class="form-control-feedback"> </small> @enderror
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>نص السؤال</label>
                                    <input data-validation="required" type="text"  name="ar_title" id="ar_title" value="{{old('ar_title')}}" class="form-control"/>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="cc" class="form-group">
                                    <div class="col-lg-3">
                                        نوع الاجابة
                                    </div>
                                    <div class="col-lg-2 form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type" id="inlineRadio1" checked value="1">
                                        <label class="form-check-label" for="inlineRadio1">إجابة نصية</label>
                                    </div> <div class="col-lg-2 form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type" id="inlineRadio4"  value="4">
                                        <label class="form-check-label" for="inlineRadio1">إجابة رقميه</label>
                                    </div>
                                    <div class="col-lg-2 form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type" id="inlineRadio2"  value="2">
                                        <label class="form-check-label" for="inlineRadio2">إختيار أجابات</label>
                                    </div>
                                    <div class="col-lg-2 form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type" id="inlineRadio3" value="3" >
                                        <label class="form-check-label" for="inlineRadio3">إختيار اجابات من متعدد</label>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div  id="e" style="display:none" class="form-group row">
                            <table  class="table ">
                                <thead>
                                <tr>

                                    <th  class="col-sm-11">الاجابة</th>

                                    <th  class="col-sm-1">حذف</th>

                                </tr>
                                </thead>
                                <tbody id="mytable">


                                <tr>

                                    <td  class="col-sm-11"> <input  class="col-sm-12" type="text" name="answers[]" id="priceone"></td>

                                </tr>

                                </tbody>
                            </table>
                            <d class="btn addprice">
                                <i class="fa fa-plus"></i> {{trans('main.Add')}}
                            </d>
                        </div>


                        <div class="form-group m-t-40 row">
                            <div class="col-10 offset-md-2">
                                <input type="submit" class="btn btn-success form-control" value="{{trans('main.Create')}}" name="submut"
                                       style="color:#fff; font-weight: 400; font-size: 20px">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script src="{{asset('admin/plugins/dropify/dist/js/dropify.min.js')}}"></script>

    <script>
        $(document).ready(function (event) {
            $('.dropify').dropify();
            event.preventDefault();

        });
    </script>
    <script>
        $(document).ready(function () {
            $( '#cc').on('change', function (e) {

                if ($('#inlineRadio1').is(':checked') === false  && $('#inlineRadio4').is(':checked') === false) {

                    $("#e").slideDown(1500);
                } else {
                    $("#e").slideUp(1500);
                }
        });
        });
    </script>  <script>
        $(document).ready(function () {
            $('#selectId').on('change', function () {
                var selectVal = $("#selectId option:selected").val();
               if(selectVal==1){
                   $("#eet").slideDown(1500);

               }else {
                   $("#eet").slideUp(1500);

               }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(() => {

            $('.addprice').on('click', function() {
                $('#mytable').append('<tr >' +
                    '<td  class=" col-sm-11" ><input  class="col-sm-12" type="text"  name="answers[]" value=""  ></td>' +




                    '<td  class=" col-sm-1" >' +
                    '<button class="btn btn-sm btn-danger">' +
                    '<i class="fa fa-trash-o"></i>' +
                    '</button>' +
                    '</td>' +
                    '</tr>');

            });
            $(document).on('click', '.btn', function() {
                $(this).parent().parent('tr').remove();
            });
        });
    </script>
    <script type="text/javascript">
        $('#qu_id').change(function() {
            var value = jQuery('#qu_id').val();
            // return sub cat&#45;&#45;}}
            var url = '{{url('admin/question/get_all_answers')}}';
            var _token = ' <?php echo csrf_token() ?>';
            $.ajax({
                type: 'POST',
                url: url,
                data: {'_token': _token,'id':value},
                success: function (data) {
                    // Add Options&#45;&#45;}}

                    $('#ans_id').html(data);
                }// Success function&#45;&#45;}}
            });// End ajax&#45;&#45;}}
        });// End function&#45;&#45;}}
    </script>
@endsection

