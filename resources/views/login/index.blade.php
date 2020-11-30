@extends('layouts/layout')
@section('pageCss')
<style>
  header{display: none;}
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="title">
        <h1>エルピオ代理店ポータルサイト</h1>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ログイン</div>
                <div class="panel-body">
                  @if(session()->has('message'))
                     <div class="alert alert-danger mb-3">
                         {{session('message')}}
                     </div>
                   @endif
                    {{ Form::open(array('url' => 'login','id'=>'login_submit' ,'class' => 'form-horizontal','method' => 'get')) }}
                    <div class="form-group">
                        <label class="col-md-4 control-label">代理店コード</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="agency_cd">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">パスワード</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4 btn_group">
                            <button type="submit" id="login_btn" class="btn btn-primary">ログイン</button>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('pageJs')

@endsection
