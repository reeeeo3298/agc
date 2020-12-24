@extends('layouts/layout')
@section('pageCss')
<link rel="stylesheet" type="text/css" href="public/css/plugin/daterangepicker.css">
@endsection

@section('content')
<h1>代理店管理画面</h1>
    <!-- フラッシュメッセージ -->
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
    <div class="customer_manegement_block panel panel-default">
         <div class="panel-heading">代理店管理画面</div>
           <div class="panel-body"> 
             {{ Form::open(array('url' => '/agency_search','id'=>'agency_search_detail' ,'class' => 'form-horizontal','method' => 'get')) }}
             <div class="form-group">
                 <div class="col-sm-6 form_date">
                     <div class="col-sm-3">申込日</div>
                     <div class="col-sm-5 form-inline" style="padding: 3px;">
                       <input type="text" class="form-control upload_date" name="upload_date" id="upload_date" size="30" />
                     </div>
                 </div>

                  <div class="col-sm-6 form_payment">
                     <div class="col-sm-3">お支払い方法</div>
                     <div class="col-sm-5 form-inline dropdown" style="padding: 3px;">
                       <select id="select_payment" name="payment" class="form-control">
                         <option value="">すべて</option>
                         <option value="クレジット">クレジット</option>
                         <option value="口座振替">口座振替</option>
                       </select>
                     </div>
                 </div>
             </div>
             <div class="form-group">
                 <div class="col-sm-6 form_status">
                     <div class="col-sm-3">名前</div>
                     <div class="col-sm-4 form-inline name_form_width" style="padding: 3px;">
                        姓<input type="text" class="form-control last_name" name="first_name" id="first_name" placeholder="" />
                     </div>
                     <div class="col-sm-4 form-inline name_form_width" style="padding: 3px;">
                        名<input type="text" class="form-control first_name" name="last_name" id="last_name" placeholder="" />
                     </div>
                 </div>

                 <div class="col-sm-6 form_type">
                     <div class="col-sm-3">名前(カナ)</div>
                     <div class="col-sm-4 form-inline name_form_width" style="padding: 3px;">
                        姓<input type="text" class="form-control last_name_kana" name="first_name_kana" id="first_name_kana" placeholder="" />
                     </div>
                     <div class="col-sm-4 form-inline name_form_width" style="padding: 3px;">
                        名<input type="text" class="form-control first_name_kana" name="last_name_kana" id="last_name_kana" placeholder="" />
                     </div>
                 </div>
             </div>
             <div class="form-group">
                 <div class="col-sm-6 form_status">
                     <div class="col-sm-3">地点特定番号</div>
                     <div class="col-sm-5 form-inline dropdown" style="padding: 3px;">
                        <input type="text" class="form-control supply_no" name="supply_no" id="supply_no" size="22" placeholder="" />
                     </div>
                 </div>

                 <div class="col-sm-6 form_type">
                     <div class="col-sm-3">メールアドレス</div>
                     <div class="col-sm-5 form-inline dropdown" style="padding: 3px;">
                        <input type="text" class="form-control mail_address" name="mail_address" id="mail_address" placeholder="" />
                     </div>
                 </div>
             </div>
            
             <div class="btn_block">
                 <button type="submit" id="search_btn" class="btn btn-primary">検索</button>
                 <button type="reset" id="reset_btn" style="margin-left: 10px;" class="btn btn-default">リセット</button>
             </div>
             {{ Form::close() }}
           </div>
    </div>
    <div class="middle_block">
        <div class="add_agency">
                <button type="submit" class="btn btn-danger btn-xm agency_add_btn">代理店追加</button>
        </div>
    </div>
    <div class="content_list">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>代理店コード</th>
                    <th>代理店名</th>
                    <th>パスワード</th>
                    <th>登録日時</th>
                    <th>更新日時</th>
                    <th>処理</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($results))
                @foreach($results as $r)
                <tr data-no="{{$r->agency_cd}}">
                    <td class="agency_cd"><p>{{$r->agency_cd}}</p></td>
                    <td class="agency_name"><p>{{$r->agency_name}}</p></td>
                    <td class="password"><p>{{$r->password}}</p></td>
                    <td class="add_date"><p>{{$r->add_dt}}</p></td>
                    <td class="update_date"><p>{{$r->update_dt}}</p></td>
                    <td>
                        <div class="detail_btn_block">
                            <button type="button" class="btn btn-info btn-xs agency_detail_btn">詳細</button>
                        </div>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    
    <!--代理店情報詳細モーダル-->
    <div id="agency_detail_modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3>代理店情報内容確認</h3>
                {{Form::open(array('url' => '/agency_modal_data_edit','id'=>'agency_modal_data_edit' ,'class' => 'form-horizontal','method' => 'post')) }}
                <div class="btn btn-success btn-xm edit_btn"><span>編集モード</span></div>
                <button type="submit" class="btn btn-success btn-xm edit_btn_submit">編集完了</button>
                <input type="hidden" name="accept_no">
                <table class="table table-bordered table-striped modal_table">
                <tbody>
                <tr>
                    <th class="agency_th">項目</th>
                    <th>内容</th>
                </tr>
                <tr>
                    <th>代理店コード</th>
                    <td>
                        <span id="agency_cd_modal" class="detail_view"></span>
                        <input type="text" name="agency_cd_input" class="detail_edit" id="agency_cd_input">
                    </td>
                </tr>
                <tr>
                    <th>代理店名</th>
                    <td>
                        <span id="agency_name" class="detail_view"></span>
                        <input type="text" name="agency_name_input" class="detail_edit" id="agency_name_input">
                    </td>
                </tr>
                <tr>
                    <th>パスワード</th>
                    <td>
                        <span id="agency_password" class="detail_view"></span>
                        <input type="text" name="agency_password_input" class="detail_edit" id="agency_password_input">
                    </td>
                </tr>
                </tbody>
                </table>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    
    <!--代理店追加モーダル-->
    <div id="agency_add_modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3>代理店新規追加</h3>
                {{Form::open(array('url' => '/agency_modal_data_add','id'=>'agency_modal_data_add' ,'class' => 'form-horizontal','method' => 'post')) }}
                <button type="submit" class="btn btn-primary btn-xm agency_add_submit">登録</button>
                <table class="table table-bordered table-striped modal_table">
                <tbody>
                <tr>
                    <th class="agency_th">項目</th>
                    <th>内容</th>
                </tr>
                <tr>
                    <th>代理店コード</th>
                    <td>
                        <input type="text" name="agency_cd_input" class="detail_add" id="agency_cd_input">
                    </td>
                </tr>
                <tr>
                    <th>代理店名</th>
                    <td>
                        <input type="text" name="agency_name_input" class="detail_add" id="agency_name_input">
                    </td>
                </tr>
                <tr>
                    <th>パスワード</th>
                    <td>
                        <input type="text" name="agency_password_input" class="detail_add" id="agency_password_input">
                    </td>
                </tr>
                </tbody>
                </table>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection

@section('pageJs')

@endsection
