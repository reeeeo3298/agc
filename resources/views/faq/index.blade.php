@extends('layouts/layout')
@section('pageCss')

@endsection

@section('content')
<h1>よくある質問</h1>
<div class="content-block">
    <div class="faq_content">
        <div class="tab_content" id="denki_content">
              <div class="tab_content_description">
                <div class="panel_block">
                  <div class="panel_content panel1">
                  <h2 class="">お申し込みについて</h2>
                    <div class="panel_inner panel1_inner">
                      <div class="elec_qa_container">
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>お申込み時に必要なものを教えてください。</a>
                          </dt>
                          <dd class="answer_item" style="display: none;">
                            <p class="answer_txt">
                              現在ご利用中の利用明細書と次の情報が必要となります。<br>
                            　・現在利用している会社に登録しているお客様名　・現在利用している会社に登録しているご住所<br>
                            　・現在利用している会社のお客様番号　・供給地点特定番号<br>
                            　・クレジット支払い希望の場合はクレジットカード情報　・口座引落を希望の場合は口座情報
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>供給開始お知らせメールとは何ですか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              電気の供給日が決まったお客様に切替え予定日の情報をメールでご連絡しております。
                                お客様の中には迷惑メールとして、扱われているケースがございます。
                                迷惑メールボックスなどをご確認いただき、見つからない場合はエルピオお客様センター（0120-23-5556 携帯からはこちら：0570-02-5556）までお問合せください。
                             </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>エルピオでんきが使用できるまでどのくらい時間がかかりますか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              ■現在の住まいでお切り替えの場合<br>
                               原則としてお申し込みから供給開始まで<br>1~2ヶ月程度お時間を頂いております。<br>
                              ■お引っ越し先でご利用の場合<br>
                               お引っ越しの8日前までにお申し込み頂いた場合、原則としてお客様のご希望日より使用可能となります。
                             </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>今、他社でオール電化を利用していますが、エルピオに切替えられますか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              可能です。しかし、オール電化の場合はエルピオに切替後にご利用中の料金よりも上がってしまうことが多くあります。弊社では切り替えをお勧めしておりません。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>明細ハガキはありますか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              明細ハガキをご希望の場合は有料(110円税込)で発行しております。毎月のご請求内容はＭＹページ(無料)でご覧いただけます。<br>
                              領収書を印刷して使える機能もございますので、こちらをお薦めしております。詳しくは<a href="/electrical/mypage">こちら</a>をご確認ください。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>現在エルピオでんきを利用しており、引っ越し先でも利用したいのですがどうしたらいいですか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              現在のお住まいでの解約手続きが必要となります。解約のご連絡は「お客様サービスセンター」で承っております。
                                下記のフリーダイヤルへお電話をいただき、解約を希望の旨と解約日付をお伝えいただきますようお願いします。<br>
                                ・電話：0120-23-5556。なお、携帯電話からは0570-02-5556へお掛け下さい。<br>
                                受付時間は平日9:00～18:00までとなります。<br>注）受付の際に、ご本人様確認を行いますので、お手元に御請求書等をご用意ください。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>引越し先でエルピオ電気を利用したいのですが、どうしたらいいですか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              引越し先でのお申込みについては<a href="/electrical/moving/">こちら</a>のページをご確認ください。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>契約してから直ぐに解約すると違約金を取られますか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              当社の場合、違約金や解約金はございません。是非、お気軽にお申込みください。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>契約電力を変更したい場合、どうしたらいいですか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              60アンペア以下の場合は、原則として、弊社へお申込みをいただく形となります。
                                ブレーカーの取替やスマートメーターでの設定で変更は可能です。<br>
                                ※電気設備の関係で、工事が必要となったり、工事費をご負担いただく場合もございます。<br>
                                7kVA以上の場合は、原則として分電盤にある開閉器の取替を電気工事店等で行っていただくことになります。
                                但し、工事が不要となるケースもございますので、分からない場合は地域の電力会社や弊社にお問合せください。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>低圧電力は申し込めますか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              低圧電力のお申込みは弊社ＬＰガスのお客様に限らせていただいております。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>離島に住んでいますが申し込めますか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              基本的に離島でのお申込みは受け付けておりません。お住まいが離島の対象となるのか？ご不明な場合は弊社へお問合せください。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>３日後に引っ越しますが引越し先ですぐにご利用できますか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              引越し先の電気のお申込みは８営業日前まで受付可能としております。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>同居している家族が、別々に電気の契約をすることはできますか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              現在の電力会社との契約が、それぞれ別の契約になっていれば可能です。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>切り替え時に、現在契約している電力会社に連絡する必要がありますか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              エルピオに電力会社を切り替える際、お客様はエルピオへのお申込みだけで、現在の電力会社への解約作業は必要ありません。エルピオから現在の電力会社へ廃止連絡を入れる形となります。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>スマートメーターの設置の申込方法を教えてください。</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              スマートメーターの設置は、電力会社切替の際にお住いのエリアの送配電事業者から、お客様へ連絡が入る形となります。既にお客様設備がスマートメーターに切り替わっている場合、設置工事は発生しません。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>売電しているのですが、エルピオでんきに切り替わると契約はエルピオに引き継ぐのでしょうか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              太陽光発電の売電をしている場合、エルピオでんきに申し込んだ後も売電契約は現在契約している電力会社のままご利用できます。エルピオでは売電のご契約を受け付けておりません。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>申込後にキャンセルはできますか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              お申し込み後のキャンセルは可能です。ただし、電力供給が始まってしまった場合で、クーリングオフ期間を過ぎてしまったとき、料金が発生することがございますのでご注意ください。
                            </p>
                          </dd>
                        </dl>
                      </div>
                    </div>
                  </div>
                  <div class="panel_content panel1">
                  <h2 class="">エルピオでんきの料金について</h2>
                    <div class="panel_inner panel1_inner">
                      <div class="elec_qa_container">
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>どうしてこんなに安いのですか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              エルピオは、徹底的にコストを抑え、他社連携のポイントや、豪華なパンフレット、ＣＭなどはありません。
                              その代わりにかかるはずだった費用を全て電気料金に還元しています。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>エルピオでんきに切り替えるとどれくらい安くなりますか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              お客様のご住まいの地域、使用量などによって異なります。
                                詳しくは<a href="/electrical/simulation">こちらの料金シミュレーション</a>にてご確認ください。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>再生可能エネルギー発電促進賦課金とは何ですか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              再生可能エネルギーの導入を促進するため、国の法令に基づき創設された「再生可能エネルギーの固定価格買取制度」に
                                定められた価格で再生可能エネルギー電力を買い取るための財源を、電気の使用者全体で負担するための賦課金です。
                                各地域電力会社からの検針票にもこの賦課金が記載されており、どの電力会社から電気を購入する場合であっても、賦課されます。
                                詳しくは、資源エネルギー庁のWEBサイトをご確認ください。http://www.enecho.meti.go.jp/category/saving_and_new/saiene/kaitori/surcharge.html
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>ガスのセット割は申し込めますか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              弊社のLPガスのサービスエリアをご確認の上で、エルピオお客様センター（0120-23-5556 携帯からはこちら：0570-02-5556）までお問合せください。
                            </p>
                          </dd>
                        </dl>
                      </div>
                    </div>
                  </div>
                  <div class="panel_content panel1">
                  <h2>お支払いについて</h2>
                    <div class="panel_inner panel1_inner">
                      <div class="elec_qa_container">
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>クレジットカード決済はどのタイミングで行われますか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              ご契約されているクレジット会社により引落日が変わってきます。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>口座振替の引落はいつですか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              銀行口座からのお引落は、毎月6日です。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>検針票、請求書、領収書は発行されますか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              検針票は有料（100円＋消費税）となります。MYページに登録すると無料で検針情報や請求明細を確認することができます。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>登録したクレジットカードの期限が切れてしまいました。どうすればいいですか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              クレジットカードの登録変更はMYページから行うことができます。
                                また、紙面を用いた登録変更をご希望される場合は、お電話でエルピオお客様センター（0120-23-5556 携帯からはこちら：0570-02-5556）までお問合せください。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>クレジット会社が発行するデビットカードやプリペイドカードは使えますか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              VISA、マスターカード、JCB、アメリカン・エキスプレス、ダイナースのマークが付いているカードの場合、使用可能です。
                                ※一部マークが付いていても使用できないカードもございます。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>「エルピオでんき」の支払方法にはどんな方法がありますか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              銀行口座からのお引落、もしくはクレジットカードからのお支払となります。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>銀行口座の残高不足で電気料金の引き落としができなかった場合はどうなりますか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              コンビニエンスストアで支払える用紙をお送りいたします。そちらからお支払いください。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>電気料金が未納の場合、電気は止まりますか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              電気料金の支払い期日を30日超えて、まだお支払いいただけていない場合は電力供給を中止させていただきます。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>確定申告などのために電気料金の領収証が必要です。</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              弊社では、クレジットカードお支払いの場合、領収書を発行しておりません。
                                確定申告の場合はクレジットカードの支払い明細と弊社の請求明細書をご利用いただくことをお薦めします。
                            </p>
                          </dd>
                        </dl>
                      </div>
                    </div>
                  </div>
                  <div class="panel_content panel2">
                    <h2>各種変更について</h2>
                    <div class="panel_inner panel1_inner">
                      <div class="elec_qa_container">
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>支払方法の変更手続きはどのようにすればいいですか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              お支払方法の変更については「ＭＹページ」でお手続きいただけます。 <br>
                                なお、銀行口座に関しましては、一部ネットでの受付対応が出来ない金融機関がございます。<br>
                                予め、マイページ内にある『口座振替（ネット受付）対象金融機関一覧』でご確認いただきますようお願い申し上げます。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>契約名義の変更や電話番号の変更があった場合はどうしたらいいですか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              「エルピオ　お客様サービスセンター（電話:0120-23-5556。受付時間は平日の9:00－18:00。 携帯電話からは0570-02-5556）」
                                までご連絡いただくか、お問い合わせフォームからお申込みください。必要なお手続き書類をお送りしますので、ご記入の上でご返送いただきます。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>契約電力を変更する場合はどうすればいいですか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              ■30Aから60Aの範囲内でアンペア変更を希望される場合<br>
                                「エルピオ　お客様サービスセンター（電話:0120-23-5556。受付時間は平日の9:00－18:00。 携帯電話からは0570-02-5556）」までご連絡いただくか、
                                お問い合わせフォームからお申込みください。必要なお手続き書類をお送りしますので、ご記入の上でご返送いただきます。
                                なお、お住まいの設備によってはアンペア変更を承れない場合や、お客さまのご負担による
                                内線部の電気工事が必要になる場合もございますことをご容赦ください。<br>
                              ■それ以外の場合<br>
                            原則としてお客様のご負担による電気工事が必要になります。お申し込みは「電気工事店」へお願い致します。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>電力会社の切り替えと同時にアンペアを変更したいです。</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              申し訳ございません。弊社への切り替えと同時にアンペア変更はできません。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>登録のメールアドレスを変更したいです。</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              登録メールアドレスの変更はMYページの設定メニュー内のメールタブから変更可能です。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>支払い名義と契約名義が違っていても大丈夫ですか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              違っていても問題ございません。
                            </p>
                          </dd>
                        </dl>
                      </div>
                    </div>
                  </div>
                  <div class="panel_content panel3">
                    <h2>ＭＹページについて</h2>
                    <div class="panel_inner panel1_inner">
                      <div class="elec_qa_container">
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>ＭＹページを利用するにはどうしたらいいですか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              MYページのご利用には「ユーザーID」と「パスワード」のログイン情報が必要となります。
                              2020年2月以降に供給開始のお客様には、 件名が「エルピオでんき　供給開始予定日のお知らせ」のメールにて
                              ログイン情報を記載しております。2020年2月以前に供給開始のお客様は、恐れ入りますが、
                              こちらの フォームよりお申込みください。お申し込み後、2-3営業日以内にご入力いただいたメールアドレスへログイン情報を送信いたします。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>ＭＹページにログインできません。</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              ＭＹページのログインが出来ない場合、まずパスワード再設定をこちらからお試しください。<br>
                                パスワードを再設定してもログイン出来ない場合、お手数ですがもう一度<a href="/electrical/customer">こちらのお申込フォーム</a>からお申込みをお願い致します。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>MYページの日別実績が実際の使用量より多くなっている</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              「日別実績」の単位はkW（使用電力）となっており、30分間に使用された電力量の値（kWh）を
                                1時間値に換算（つまり2倍）した値を表示しております。これに対しまして、
                                「年間実績」、「月間実績」及び「週間実績」での単位はkWh（使用電力量）になっております。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>30分値の使用電力量はどこで確認できますか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              30分間の使用電力量（kWh）については、ご使用実績ページ内の右上にある
                                「使用実績のダウンロード」を選択いただき、開いた先のページで対象期間を選択しますとファイルをダウンロード出来ます。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>MYページの領収書が表示されない</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              MYページの領収書タブのPDFにつきましては、お支払方法が「口座振替」のお客様のみ表示されます。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>電気の使用量グラフのデータが「欠損」と表示されます</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              ネットワークの接続状態により表示されないことがございます。しばらくたって再度お試しください。
                                解決しない場合は、エルピオお客様センター（0120-23-5556 携帯からはこちら：0570-02-5556）までお問合せください。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>過去の電力会社での使用料金を確認したいけど、どこで見れますか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              弊社のMYページでご覧いただけるのは、弊社へ切替後のデータのみとなります。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>ログインパスワードを忘れてしまった場合どうしたらいいですか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              <a href="https://portal.lpio.jp/Account/PassReminder">こちら</a>から再設定をお願いします。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>ログインIDは変更できますか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              MYページログインIDは原則変更することはできません。
                                変更したい場合は、エルピオお客様センター（0120-23-5556 携帯からはこちら：0570-02-5556）までお問合せください。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>携帯電話・スマートフォンからも利用できますか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              スマートフォンのWebブラウザからも基本的にご確認できます。（一部、ご確認いただけない場合もございます）
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>30分値はどうやって計算されているのでしょうか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              30分間に使用された電力量の値（kWh）を 1時間値に換算（つまり2倍）した値を計算して表示しています。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>30分値はどうやって計算されているのでしょうか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              30分間に使用された電力量の値（kWh）を 1時間値に換算（つまり2倍）した値を計算して表示しています。
                            </p>
                          </dd>
                        </dl>
                      </div>
                    </div>
                  </div>
                  <div class="panel_content panel4">
                    <h2>工事について</h2>
                    <div class="panel_inner panel1_inner">
                      <div class="elec_qa_container">
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>スマートメーター設置工事の時、地域の電力会社から連絡が来るのはなぜでしょうか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              電力会社の切り替えの際に、スマートメータの設置工事が入る場合がございます。
                                メーターやアンペアブレーカーは東京電力パワーグリッドや中部電力等の「一般送配電事業者」が所有しており、
                                設置工事も上記事業者もしくはその契約工事店が行います。<br>詳しくは「一般送配電事業者」からの連絡の際にご確認ください。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>スマートメーターへの取替工事費用はかかりますか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              原則として費用負担はございません。但し、ごく稀に費用が発生する場合がございます。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>お店や自宅の電気設備を工事することになりました。エルピオに何か届け出が必要ですか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              お住いのエリアの「一般送配電事業者」へ届け出が必要です。
                                電気工事事業者が決定しましたら、エルピオお客様センター（0120-23-5556 携帯からはこちら：0570-02-5556）までお問合せください。
                            </p>
                          </dd>
                        </dl>
                      </div>
                    </div>
                  </div>
                  <div class="panel_content panel5">
                    <h2>停電時について</h2>
                    <div class="panel_inner panel1_inner">
                      <div class="elec_qa_container">
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>スマートメーター設置工事中は停電しますか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              電力会社エリアによっては約5分～20分程度の停電工事となる場合がありますので、その場合は立ち合いをお勧めしています。
                                なお、工事の連絡は各電力会社より行われます。詳細は下の表をご確認ください。<br>
                                <img src="/images/electrical/faq/faq5.png"><br>
                                ※ 停電についてはあくまで「原則」です。停電しないというエリアについても、停電作業となる場合がございます。<br>
                                ※ 立ち会いが不要のエリアでも、メーターの設置場所によっては立ち会いをお願いしたり、
                                同時にアンペアブレーカー等を回収する場合等も室内への立ち入りをお願いすることもございます。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>停電した時、どこに問い合わせればいいですか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              お住いのエリアで停電している場合は、お住いのエリアの一般送配電事業者のWebでご確認ください。<br>
                                  ・<a href="https://nw.tohoku-epco.co.jp/teideninfo/">東北電力株式会社</a><br>
                                  ・<a href="https://teideninfo.tepco.co.jp/">東京電力パワーグリッド株式会社</a><br>
                                  ・<a href="https://teiden.chuden.jp/p/index.html">中部電力株式会社</a><br>
                                  ・<a href="http://www.rikuden.co.jp/nw/teiden/otj010.html">北陸電力株式会社</a><br>
                                  ・<a href="https://www.kansai-td.co.jp/teiden-info/index.php">関西電力株式会社</a><br>
                                  ・<a href="http://www.teideninfo.energia.co.jp/">中国電力株式会社</a><br>
                                  ・<a href="https://www.yonden.co.jp/nw/teiden-info/index.html">四国電力株式会社</a><br>
                                  ・<a href="http://www.kyuden.co.jp/redirect_td_info_teiden">九州電力株式会社</a><br>
                                  また、お住いの建物だけが停電の場合エルピオでんきの安心駆け付けサービスをご利用できます。（安心駆け付けサービスの詳細は<a href="https://lpio.jp/electrical/feature/">こちら</a>からご確認ください。
                            </p>
                          </dd>
                        </dl>
                        <dl class="faq_list">
                          <dt class="question_item">
                            <a href=""><span class="q_icon">Q</span>電気がショートして停電した。どうすればいいですか？</a>
                          </dt>
                          <dd class="answer_item">
                            <p class="answer_txt">
                              エルピオでんきの安心駆け付けサービスをご利用できます。（安心駆け付けサービスの詳細は<a href="https://lpio.jp/electrical/feature/">こちら</a>からご確認ください。）
                            </p>
                          </dd>
                        </dl>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    </div>
</div>
@endsection

@section('pageJs')

@endsection
