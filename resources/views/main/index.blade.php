@extends('layouts/layout')
@section('pageCss')
<link href="public/css/main.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
    <h3 class="menu-txt">メニューを選択してください。</h3>
    <div class="menu-block">
        <ul class="menu-list">
            <li class="menu-item" id="customer"><a href="/Agc/customer"><span>顧客管理</span></a></li>
            <li class="menu-item" id="import"><a href="/Agc/import"><span>データ連携</span></a></li>
            <li class="menu-item" id="faq"><a href="/Agc/faq"><span>よくある質問</span></a></li>
        </ul>
        @if(Session::has('admin_flg'))
        <ul class="menu-list menu_second">
            <li class="menu-item" id="agency_master"><a href="/Agc/agency_master"><span>代理店マスタ</span></a></li>
            <li class="menu-item" id="update_menu"><a href="/Agc/update"><span>データ更新</span></a></li>
            <li class="menu-item" id="csv_download"><a href="/Agc/enesap"><span>ENESAP用</span></a></li>
        </ul>
        @endif
        <!-- <ul class="menu-list2">
            <li class="menu-item" id="question"><a href="/agency/faq"><span>Q&A</span></a></li>
            <li class="menu-item" id="kiyaku"><a href="public/pdf/affiliate.pdf" target="_blank"><span>規約確認</span></a></li>
            <li class="menu-item" id="contact"><a href="https://lpio.jp/electrical/inquiry/"><span>お問い合わせ</span></a></li>
        </ul> -->
    </div>
</div>

<input type="hidden" class="agency_cd" value="{{session('agency_cd')}}">
<input type="hidden" class="agency_name" value="{{session('agency_name')}}">
@endsection
@section('pageJs')
<script type="text/javascript" src="public/js/common.js"></script>
@endsection
