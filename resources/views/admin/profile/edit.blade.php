{{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')


{{-- profile.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'プロフィールの新規作成')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィールの新規作成</h2>
                <!--Laravel013課題4【応用】 resources/views/admin/profile/create.blade.php を編集して、
                氏名(name)、性別(gender)、趣味(hobby)、自己紹介欄(introduction)を入力するフォームを作成してください。
                また、formの送信先(<form action=”この部分”>)を、 Admin\ProfileController の create Action に指定してください。
                (ヒント: resources/views/admin/news/create.blade.php)-->
                <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">氏名</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="name" value="{{ old('name', $profile_form->name) }}">
                        </div>
                        <div class="col-md-5">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">性別</label>
                        <div class="col-md-10">
                            <div class="form-check form-check-inline">
                              <!--<input class="form-check-input" type="radio" name="gender" id="radio1a" value="male" {{ old('gender', 'male') == 'male' ? 'checked' : '' }} >-->
                              <!--<input class="form-check-input" type="radio" name="gender" id="radio1a" value="male" checked >-->
                              <input class="form-check-input" type="radio" name="gender" id="radio1a" value="{{ old('gender', 'male') }}" @if ($profile_form->gender == 'male') checked @endif >
                              <label class="form-check-label" for="radio1a">男性</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <!--<input class="form-check-input" type="radio" name="gender" id="radio1b" value="female" {{ old('gender', 'female') == 'female' ? 'checked' : '' }} >-->
                              <input class="form-check-input" type="radio" name="gender" id="radio1b" value="{{ old('gender', 'female') }}" @if ($profile_form->gender == 'female') checked @endif>
                              <label class="form-check-label" for="radio1b">女性</label>
                            </div>
                        </div>
                       
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">趣味</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="hobby" value="{{ old('hobby', $profile_form->hobby) }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">自己紹介欄</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="20">{{ old('introduction', $profile_form->introduction) }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $profile_form->id }}" />
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection