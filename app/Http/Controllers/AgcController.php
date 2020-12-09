<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\LexerConfig;
use Exception;
use Carbon\Carbon;

class AgcController extends Controller
{
    /**
     * ログイン画面表示
     */
    public function index(){
               
        return view('login.index');
        
    }
    
    /**
     * ログアウト処理
     */
    public function logout(Request $request){
        
        $request->session()->flush();
               
        return view('login.index');
        
    }
    
    /**
     * ログイン処理
     */
    public function login(Request $request){
        
        $agency_cd = $request->input('agency_cd');
        $password = $request->input('password');
                
        $result = DB::table('m_agency')
                ->where('agency_cd',$agency_cd)
                ->where('password',$password)
                ->first();
                
        if($result == ''){
            return back()->with('message','代理店コードまたはパスワードが違います。');
        }else{
            session(['agency_cd' => $result->agency_cd,'agency_name' => $result->agency_name]);
            
            return view('main.index');
        }
        
    }
    
    /**
     * 顧客管理画面表示
     */
    public function customer_index(Request $request){
        
        //代理店毎のデータ取得
        $agency_cd = $request->session()->get('agency_cd');
        
        $results = $this->data_all($agency_cd);
        
//        dd($results);
                
        return view('customer.index',compact('results'));
    }
    
    /**
     * 検索処理
     */
    public function customer_search(Request $request){
                
        $all = $request->all();
                
        //セッション追加
        session(['search_data' => $all]);
                
        $upload_date = $request->input('upload_date');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $first_name_kana = $request->input('first_name_kana');
        $last_name_kana = $request->input('last_name_kana');
        $supply_no = $request->input('supply_no');
        $mail_address = $request->input('mail_address');
        $status_cd = $request->input('status_cd');
        $payment = $request->input('payment');
                
        $startdate = substr($upload_date,0,10);
        $enddate = substr($upload_date,13,23);
                        
        $list = DB::table('t_data as td');

        if($first_name !== null){
            $list->where('td.first_name',$first_name);
        }
        if($last_name !== null){
            $list->where('td.last_name',$last_name);
        }
        if($first_name_kana !== null){
            $list->where('td.first_name_kana',$first_name_kana);
        }
        if($last_name_kana !== null){
            $list->where('td.last_name_kana',$last_name_kana);
        }
        if($supply_no !== null){
            $list->where('td.supply_no',$supply_no);
        }
        if($mail_address !== null){
            $list->where('td.mail_address',$mail_address);
        }
        if($status_cd !== null){
            $list->where('td.status',$status_cd);
        }
        if($payment !== null){
            $list->where('td.payment',$payment);
        }
        
        $results = $list->whereBetween('add_date',["$startdate", "$enddate"])
                ->paginate(30);
        
//        dd($results);
        
        return view('customer.index',compact('results'));
        
    }
    
    /**
     * 詳細ボタン押下
     */
    public function detail_index(Request $request){
        
        $accept_no = $request->input('no');
        $agency_cd = $request->session()->get('agency_cd');
        
        $results = DB::table('t_data')
                    ->where('agency_cd',$agency_cd)
                    ->where('accept_no',$accept_no)
                    ->get();
        
        return $results;
    }
    
    /**
     * 詳細モーダル修正ボタン押下
     */
    public function modal_data_edit(Request $request){
        
        $result = $request->all();
        $update_dt = Carbon::now();
        $agency_cd = $request->session()->get('agency_cd');
        
//        dd($result['accept_no']);
        
        //DB更新
        DB::table('t_data')
                ->where('accept_no',$result['accept_no'])
                ->where('agency_cd',$agency_cd)
                ->update([
                    'first_name' => $result['first_name_input'],
                    'last_name' => $result['last_name_input'],
                    'first_name_kana' => $result['first_name_kana_input'],
                    'last_name_kana' => $result['last_name_kana_input'],
                    'add_no' => $result['add_no_input'],
                    'add_pref' => $result['add_pref_input'],
                    'add_city' => $result['add_city_input'],
                    'add_detail' => $result['add_detail_input'],
                    'add_building' => $result['add_building_input'],
                    'add_building_no' => $result['add_building_no_input'],
                    'mail_address' => $result['mail_address_input'],
                    'tel1' => $result['tel1_input'],
                    'tel2' => $result['tel2_input'],
                    'tel3' => $result['tel3_input'],
                    'now_company' => $result['now_company_input'],
                    'now_customer_no' => $result['now_customer_no_input'],
                    'supply_no' => $result['supply_no_input'],
                    'contracted_capacity' => $result['contracted_capacity_input'],
                    'a_capacity' => $result['a_capacity_input'],
                    'kva_capacity' => $result['kva_capacity_input'],
                    'plan_name' => $result['plan_name_input'],
                    'payment' => $result['payment_input'],
                    'campaign_cd' => $result['campaign_cd_input'],
                    'update_date' => $update_dt
                ]);
                
        return back()->with('flash_message_success', $result['supply_no_input'].'のデータを更新しました。');
    }
    
    /**
     * csvダウンロードボタン押下
     */
    public function csv_download_input(Request $request){
        
        $search_data = $request->session()->get('search_data');
        $agency_cd = $request->session()->get('agency_cd');
        
        $startdate = substr($search_data['upload_date'],0,10);
        $enddate = substr($search_data['upload_date'],13,23);
        
        if($search_data == null){
            $results = DB::table('t_data')
                    ->where('agency_cd',$agency_cd)
                    ->get();
        }else{
            $results = DB::table('t_data as td');
            
            if($search_data['first_name'] !== null){
            $results->where('td.first_name',$search_data['first_name']);
            }
            if($search_data['last_name'] !== null){
                $results->where('td.last_name',$search_data['last_name']);
            }
            if($search_data['first_name_kana'] !== null){
                $results->where('td.first_name_kana',$search_data['first_name_kana']);
            }
            if($search_data['last_name_kana'] !== null){
                $results->where('td.last_name_kana',$search_data['last_name_kana']);
            }
            if($search_data['supply_no'] !== null){
                $results->where('td.supply_no',$search_data['supply_no']);
            }
            if($search_data['mail_address'] !== null){
                $results->where('td.mail_address',$search_data['mail_address']);
            }
            if($search_data['status_cd'] !== null){
                $results->where('td.status',$search_data['status_cd']);
            }
            if($search_data['payment'] !== null){
                $results->where('td.payment',$search_data['payment']);
            }
            
            $results = $results->whereBetween('add_date',["$startdate", "$enddate"])
                ->get();
            
        }
                
        $csv_list = (json_decode(json_encode($results), true));
        
        $csvHeader = ['申込み日', '取引先名（姓）','取引先名（名）','取引先名カナ（姓）','取引先名カナ（名）',
                    '取引先郵便番号','取引先都道府県','取引先市区郡','取引先町名・番地','取引先名建物名',
                    '取引先部屋番号','取引先メールアドレス','取引先連絡先１市外局番','取引先連絡先１市内局番',
                    '取引先連絡先１加入者番号','需要者名（姓）','需要者名（名）','需要者名カナ（姓）','需要者名カナ（名）',
                    '需要者郵便番号','需要者都道府県','需要者市区郡','需要者町名・番地','需要者名建物名','需要者部屋番号',
                    '需要者メールアドレス','需要者連絡先１電話番号区分','需要者連絡先１市外局番','需要者連絡先１市内局番',
                    '需要者連絡先１加入者番号','需要者と連絡先が同一','連絡者名（姓）','連絡者名（名）','連絡者名カナ（姓）',
                    '連絡者名カナ（名）','連絡者郵便番号','連絡者都道府県','連絡者市区郡','連絡者町名・番地','連絡者名建物名',
                    '連絡者部屋番号','連絡者連絡者１電話番号区分','連絡者連絡者１市外局番','連絡者連絡者１市内局番',
                    '連絡者連絡者１加入者番号','現小売事業者','現小売事業者お客様番号','供給地点特定番号','事業所コード',
                    '地区番号','利用開始希望日','引っ越し先の利用ですか？','契約容量','Ａ容量','ＫＶＡ容量','ＫＷ容量',
                    '契約種別（料金メニュー）','支払方法','申込者名（姓）','申込者名（名）','申込者名カナ（姓）','申込者名カナ（名）',
                    '申込者携帯番号市外局番','申込者携帯番号市内局番','申込者携帯番号加入者番号','申込者電話番号市外局番',
                    '申込者電話番号市内局番','申込者電話番号加入者番号','申込者様との関係','申込者様との関係（その他）',
                    '営業所','代理店コード','キャンペーンコード','備考'];
        
        $stream = fopen('php://temp', 'r+b');
        
        //ヘッダー
        fputcsv($stream, $csvHeader);
        
//        dd($csv_list);
        
        //データ
        foreach ($csv_list as $list) {
          fputcsv($stream, [
                $list['add_date'],//申込日
                '',//取引先名（姓）
                '',//取引先名（名）
                '',//取引先名カナ（姓）
                '',//取引先名カナ（名）
                '',//取引先郵便番号
                '',//取引先都道府県
                '',//取引先市区郡
                '',//取引先町名・番地
                '',//取引先名建物名
                '',//取引先部屋番号
                '',//取引先メールアドレス
                '',//取引先連絡先１市外局番
                '',//取引先連絡先１市内局番
                '',//取引先連絡先１加入者番号
                $list['first_name'],//需要者名（姓）
                $list['last_name'],//需要者名（名）
                $list['first_name_kana'],//需要者名カナ（姓）
                $list['last_name_kana'],//需要者名カナ（名）
                $list['add_no'],//需要者郵便番号
                $list['add_pref'],//需要者都道府県
                $list['add_city'],//需要者市区郡
                $list['add_detail'],//需要者町名・番地
                $list['add_building'],//需要者名建物名
                $list['add_building_no'],//需要者部屋番号
                $list['mail_address'],//需要者メールアドレス
                $list['tel_division'],//需要者連絡先１電話番号区分
                $list['tel1'],//需要者連絡先１市外局番
                $list['tel2'],//需要者連絡先１市内局番
                $list['tel3'],//需要者連絡先１加入者番号
                '0',//需要者と連絡先が同一
                '',//連絡者名（姓）
                '',//連絡者名（名）
                '',//連絡者名カナ（姓）
                '',//連絡者名カナ（名）
                '',//連絡者郵便番号
                '',//連絡者都道府県
                '',//連絡者市区郡
                '',//連絡者町名・番地
                '',//連絡者名建物名
                '',//連絡者部屋番号
                '自宅',//連絡者連絡者１電話番号区分
                '',//連絡者連絡者１市外局番
                '',//連絡者連絡者１市内局番
                '',//連絡者連絡者１加入者番号
                $list['now_company'],//現小売事業者
                $list['now_customer_no'],//現小売事業者お客様番号
                $list['supply_no'],//供給地点特定番号
                '',//事業所コード
                '',//地区番号
                '',//利用開始希望日
                'いいえ',//引っ越し先の利用ですか？
                $list['contracted_capacity'],//契約容量
                $list['a_capacity'],//Ａ容量
                $list['kva_capacity'],//ＫＶＡ容量
                $list['kw_capacity'],//ＫＷ容量
                $list['plan_name'],//契約種別（料金メニュー）
                $list['payment'],//支払方法
                '',//申込者名（姓）
                '',//申込者名（名）
                '',//申込者名カナ（姓）
                '',//申込者名カナ（名）
                '',//申込者携帯番号市外局番
                '',//申込者携帯番号市内局番
                '',//申込者携帯番号加入者番号
                '',//申込者電話番号市外局番
                '',//申込者電話番号市内局番
                '',//申込者電話番号加入者番号
                '',//申込者様との関係
                '',//申込者様との関係（その他）
                '030',//営業所
                $list['agency_cd'],//代理店コード
                '',//キャンペーンコード
                $list['memo'],//備考
          ]);
        }
        rewind($stream);
        
        $now_dt = Carbon::now()->format('YmdHis');
        $csv = str_replace(PHP_EOL, "\r\n", stream_get_contents($stream));
        $csv = mb_convert_encoding($csv, 'SJIS-win', 'UTF-8');
        $headers = array(
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="customerlist'.$now_dt.'.csv"',
        );

        //response
        return \Response::make($csv, 200, $headers);
        
    }
    
    
    /**
     * データ連携画面表示
     */
    public function import_index(){
               
        return view('import.index');
        
    }
    
    /**
     * 申込データインポート処理
     */
    public function import_input(Request $request){

      $csv = $request->file('csv_file');
      
      if(!empty($csv)){//csvが登録されていた場合
        
//Goodby CSVのconfig設定
        $config = new LexerConfig();
        $config
            ->setIgnoreHeaderLine(true);
        $interpreter = new Interpreter();
        $lexer = new Lexer($config);

        $rows = array();
          
        $interpreter->addObserver(function(array $row) use (&$rows) {
            $rows[] = $row;
        });
        
        // CSVデータをパース
        $lexer->parse($csv, $interpreter);
        
//        $results = array();
                        
        // CSVのデータを配列化
        DB::beginTransaction();
        
        try{
         
            foreach ($rows as $row) {
            
                //一度配列に入れる
                $result = $this->get_csv_data($row);
                
                //DBへ登録
                $this->insert_csv_data($result);
                                 
            }
            
            //catchへ飛ばす
//            throw new Exception("エラーです。");
            
            DB::commit();
            return back()->with('flash_message_success', 'インポート完了しました。');
            
        } catch (Exception $ex) {
            
            DB::rollBack();
            return back()->with('flash_message_danger',$ex->getMessage());
        }
        
          
      }else{
        return back()->with('flash_message_danger', 'csvファイルを選択してください。');
      }

    }
    
    /**
     * csvデータ取得
     */
    private function get_csv_data($row)
    {
        //受付Noの最大値取得
        $no = DB::table('t_data')
                ->where('agency_cd',$row[71])
                ->orderBy('accept_no','desc')
                ->value('accept_no');
                        
        if($no === null){
            $no = 1;
        }else{
            $no++;
        }
        
        $accept_no = $no;
                        
        $result = array(
            'accept_no' => $accept_no,
            'application_dt' => $row[0],
            'first_name' => $row[15],
            'last_name' => $row[16],
            'first_name_kana' => $row[17],
            'last_name_kana' => $row[18],
            'add_no' => $row[19],
            'add_pref' => $row[20],
            'add_city' => $row[21],
            'add_detail' => $row[22],
            'add_building' => $row[23],
            'add_building_no' => $row[24],
            'mail_address' => $row[25],
            'tel_division' => $row[26],
            'tel1' => $row[27],
            'tel2' => $row[28],
            'tel3' => $row[29],
            'relation_cd' => $row[30],
            'relation_first_name' => $row[31],
            'relation_last_name' => $row[32],
            'relation_first_name_kana' => $row[33],
            'relation_last_name_kana' => $row[34],
            'relation_add_no' => $row[35],
            'relation_add_pref' => $row[36],
            'relation_add_city' => $row[37],
            'relation_add_detail' => $row[38],
            'relation_add_building' => $row[39],
            'relation_add_building_no' => $row[40],
            'relation_tel_division' => $row[41],
            'relation_tel1' => $row[42],
            'relation_tel2' => $row[43],
            'relation_tel3' => $row[44],
            'now_company' => $row[45],
            'now_customer_no' => $row[46],
            'supply_no' => $row[47],
            'contracted_capacity' => $row[52],
            'a_capacity' => $row[53],
            'kva_capacity' => $row[54],
            'kw_capacity' => $row[55],
            'plan_name' => $row[56],
            'payment' => $row[57],
            'campaign_cd' => $row[72],
            'agency_cd' => $row[71],
            'memo' => $row[73]
        );
        return $result;
    }
    
    
    /**
     * DBインサート
     */
    private function insert_csv_data($result){
        
//        dd($result);
                
            DB::table('t_data')
                ->insert([
                    'accept_no' => $result['accept_no'],
                    'application_dt' => $result['application_dt'],
                    'first_name' => $result['first_name'],
                    'last_name' => $result['last_name'],
                    'first_name_kana' => $result['first_name_kana'],
                    'last_name_kana' => $result['last_name_kana'],
                    'add_no' => $result['add_no'],
                    'add_pref' => $result['add_pref'],
                    'add_city' => $result['add_city'],
                    'add_detail' => $result['add_detail'],
                    'add_building' => $result['add_building'],
                    'add_building_no' => $result['add_building_no'],
                    'mail_address' => $result['mail_address'],
                    'tel_division' => $result['tel_division'],
                    'tel1' => $result['tel1'],
                    'tel2' => $result['tel2'],
                    'tel3' => $result['tel3'],
                    'relation_cd' => $result['relation_cd'],
                    'relation_first_name' => $result['relation_first_name'],
                    'relation_last_name' => $result['relation_last_name'],
                    'relation_first_name_kana' => $result['relation_first_name_kana'],
                    'relation_last_name_kana' => $result['relation_last_name_kana'],
                    'relation_add_no' => $result['relation_add_no'],
                    'relation_add_pref' => $result['relation_add_pref'],
                    'relation_add_city' => $result['relation_add_city'],
                    'relation_add_detail' => $result['relation_add_detail'],
                    'relation_add_building' => $result['relation_add_building'],
                    'relation_add_building_no' => $result['relation_add_building_no'],
                    'relation_tel_division' => $result['relation_tel_division'],
                    'relation_tel1' => $result['relation_tel1'],
                    'relation_tel2' => $result['relation_tel2'],
                    'relation_tel3' => $result['relation_tel3'],
                    'now_company' => $result['now_company'],
                    'now_customer_no' => $result['now_customer_no'],
                    'supply_no' => $result['supply_no'],
                    'contracted_capacity' => $result['contracted_capacity'],
                    'a_capacity' => $result['a_capacity'],
                    'kva_capacity' => $result['kva_capacity'],
                    'kw_capacity' => $result['kw_capacity'],
                    'plan_name' => $result['plan_name'],
                    'payment' => $result['payment'],
                    'campaign_cd' => $result['campaign_cd'],
                    'agency_cd' => $result['agency_cd'],
                    'memo' => $result['memo']
                ]);
               
    }
    
    /**
     * 顧客データ取得
     */
    private function data_all($agency_cd){
        
        $results = DB::table('t_data')
                    ->where('agency_cd',$agency_cd)
                    ->paginate(30);
        
        return $results;
        
    }
    
}
