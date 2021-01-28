@extends('layouts/layout')
@section('pageCss')
@endsection

@section('content')
<div class="container-fluid">
    <div class="title">
        <h1>ENESAP用データダウンロード</h1>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            {{ Form::open(array('url' => '/agency_view','id'=>'agency_view_btn' ,'class' => 'form-horizontal','method' => 'get')) }}
                <div class="panel-heading">代理店を選択してください。</div>
                <div class="panel-body">
                    <div class="form-group">
                         <div class="col-sm-6 form_type">
                             <div class="col-sm-5 form-inline dropdown" style="padding: 3px;">
                               <select id="select_type" name="agency_type" class="form-control">
                                 <option value="">すべて</option>
                               </select>
                             </div>
                         </div>
                     </div>
                </div>
                <div class="btn_block">
                 <button type="submit" id="search_btn" class="btn btn-primary">表示</button>
                </div>
            {{ Form::close() }}
            </div>
        </div>
    </div>
    
    <div class="content_list">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>代理店コード</th>
                    <th>連携日時</th>
                    <th>ファイル名</th>
                    <th>ダウンロード日時</th>
                    <th>処理</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($results))
                @foreach($results as $r)
                <tr data-no=""  data-agency_cd="">
                    <td class="agency_cd"><p>{{$r->agency_cd}}</p></td>
                    <td class="upload_dt"><p>{{$r->upload_dt}}</p></td>
                    <td class="file_name"><p>{{$r->file_name}}.csv</p></td>
                    <td class="download_dt"><p>{{$r->download_dt}}</p></td>
                    <td>
                        <div class="download_btn_block">
                            {{Form::open(array('url' => '/download','id'=>'csv_download' ,'class' => 'form-horizontal','method' => 'post')) }}
                                <input type="hidden" name="download_file" id="download_file" value="{{$r->file_name}}.csv">
                                <input type="hidden" name="file_name" id="file_name" value="{{$r->file_name}}">
                                <input type="hidden" name="csv_agency_cd" id="csv_agency_cd" value="{{$r->agency_cd}}">
                                <button type="submit" class="btn btn-success btn-xm download_btn">ダウンロード</button>
                            {{ Form::close() }}
                        </div>
                    </td>
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
