@extends('site.layouts.app')


@section('content')
<br /> <br /><br /> <br />


<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" id="CodeTest" >
            <form action="{{route('contribute.code.verify')}}" method="post">
                @csrf
                <div class="Check" style="padding: 35px;">
                    <div class="form-group">
                        <label class="Label-AddADS" for="ProductName" style=" float: right;font-family: 'Cairo', sans-serif;">   ادخل الكود السري  </label>
                        <input type="text" name="code" class="form-control inputs-AddADS ProductName DefaultForm" id="ProductName" placeholder="أدخل الكود المكون من 5 ارقام " style="direction: rtl;font-family: 'Cairo', sans-serif;">
                        @error('code')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">

                        <button type="submit" class="btn btn-default"  style="color: #fff; font-weight: 500;background-color: #580707;">فحص</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
