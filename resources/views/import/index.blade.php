@extends('layouts/layout')
@section('pageCss')
@endsection

@section('content')
<div class="container-fluid">
    <div class="title">
        <h1>申込データ連携</h1>
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
                    {{ Form::open(array('url' => 'data_import','id'=>'data_import' ,'class' => 'form-horizontal','method' => 'post','files' => true)) }}
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-4">
                        <input type="file" name="csv_file" id="csv_file" />
                      </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4 btn_group">
                            <button type="submit" id="login_btn" class="btn btn-primary">実行</button>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    
    <div class="content_list">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ログNo</th>
                    <th>連携日時</th>
                    <th>ファイル名</th>
                    <th>結果</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($results))
                @foreach($results as $r)
                <tr data-no=""  data-agency_cd="">
                    <td class="log_no"><p>{{$r->log_no}}</p></td>
                    <td class="import_dt"><p>{{$r->import_dt}}</p></td>
                    <td class="file_name"><p>{{$r->file_name}}</p></td>
                    <td class="result"><p>{{$r->log_content}}</p></td>                       
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    
</div>
@endsection
@section('pageJs')
<!-- <script type="text/javascript" src="public/js/highcharts.js"></script> -->
@endsection
