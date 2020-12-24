@extends('layouts/layout')
@section('pageCss')
@endsection

@section('content')
<div class="container-fluid">
    <div class="title">
        <h1>データ更新</h1>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">csvファイルを選択してください。</div>
                <div class="panel-body">
                  @if(session()->has('flash_message_success'))
                     <div class="alert alert-success mb-3">
                         {{session('flash_message_success')}}
                     </div>
                   @endif
                   @if(session()->has('flash_message_danger'))
                      <div class="alert alert-danger mb-3">
                          {{session('flash_message_danger')}}
                      </div>
                    @endif
                    {{ Form::open(array('url' => 'data_update','id'=>'data_update' ,'class' => 'form-horizontal','method' => 'post','files' => true)) }}
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-4">
                        <input type="file" name="csv_update_file" id="csv_update_file" />
                      </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4 btn_group">
                            <button type="submit" id="update_btn" class="btn btn-primary">実行</button>
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
<!-- <script type="text/javascript" src="public/js/highcharts.js"></script> -->
@endsection
