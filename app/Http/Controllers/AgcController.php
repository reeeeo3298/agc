<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\LexerConfig;
use Exception;

class AgcController extends Controller
{
    /**
     * ログイン画面表示
     */
    public function index(){
               
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
    
}
