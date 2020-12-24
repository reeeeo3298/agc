$('.menu-item#customer').hover(
  function(){
      $(this).css('border-color','#2D92C2');
      $(this).find('span').css('color','#2D92C2');
  },
  function(){
      $(this).css('border-color','');
      $(this).find('span').css('color','');
  }
);
$('.menu-item#import').hover(
  function(){
      $(this).css('border-color','#DE6F0A');
      $(this).find('span').css('color','#DE6F0A');
  },
  function(){
      $(this).css('border-color','');
      $(this).find('span').css('color','');
  }
);
$('.menu-item#faq').hover(
  function(){
      $(this).css('border-color','#24a514');
      $(this).find('span').css('color','#24a514');
  },
  function(){
      $(this).css('border-color','');
      $(this).find('span').css('color','');
  }
);
$('.menu-item#agency_master').hover(
  function(){
      $(this).css('border-color','#1e5da3');
      $(this).find('span').css('color','#1e5da3');
  },
  function(){
      $(this).css('border-color','');
      $(this).find('span').css('color','');
  }
);
$('.menu-item#update_menu').hover(
  function(){
      $(this).css('border-color','#1e5da3');
      $(this).find('span').css('color','#1e5da3');
  },
  function(){
      $(this).css('border-color','');
      $(this).find('span').css('color','');
  }
);

$(function(){
    
    //代理店セレクトボックスに動的に追加
    $.ajax({
        url: 'selectbox_get',
        type: 'get',
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }).done(function(data){
        $.each( data, function( key, value ){
            $('[name="agency_type"]').append(
                    $("<option>").val(data[key]['agency_cd']).text(data[key]['agency_name'])
                    );
        });
    });

    
//    詳細ボタン押下
    $('.detail_btn').on('click',function(){
        
        var no = $(this).closest('tr').data('no'); 
        var agnecy_cd_data = $(this).closest('tr').data('agency_cd'); 
        
//        alert(no);
        
       //ajax処理
        $.ajax({
            url: 'data_detail',
            type: 'get',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'no': no,
                'agency_cd_data': agnecy_cd_data
            }
        }).done(function(data){
            
            var accept_no = data[0].accept_no;
            var supply_no = data[0].supply_no === null ? "" : data[0].supply_no;
            var add_building = data[0].add_building === null ? "" : data[0].add_building;
            var last_name = data[0].last_name === null ? "" : data[0].last_name;
            var first_name = data[0].first_name === null ? "" : data[0].first_name;
            var last_name_kana = data[0].last_name_kana === null ? "" : data[0].last_name_kana;
            var first_name_kana = data[0].first_name_kana === null ? "" : data[0].first_name_kana;
            var add_no = data[0].add_no === null ? "" : data[0].add_no;
            var add_pref = data[0].add_pref === null ? "" : data[0].add_pref;
            var add_city = data[0].add_city === null ? "" : data[0].add_city;
            var add_detail = data[0].add_detail === null ? "" : data[0].add_detail;
            var add_building_no = data[0].add_building_no === null ? '' : data[0].add_building_no;
            var mail_address = data[0].mail_address === null ? "" : data[0].mail_address;
            var tel1 = data[0].tel1 === null ? "" : data[0].tel1;
            var tel2 = data[0].tel2 === null ? "" : data[0].tel2;
            var tel3 = data[0].tel3 === null ? "" : data[0].tel3;
            var now_company = data[0].now_company === null ? "" : data[0].now_company;
            var now_customer_no = data[0].now_customer_no === null ? "" : data[0].now_customer_no;
            var contracted_capacity = data[0].contracted_capacity === null ? "" : data[0].contracted_capacity;
            var a_capacity = data[0].a_capacity === null ? "" : data[0].a_capacity;
            var kva_capacity = data[0].kva_capacity === null ? "" : data[0].kva_capacity;
            var kw_capacity = data[0].kw_capacity === null ? "" : data[0].kw_capacity;
            var plan_name = data[0].plan_name === null ? "" : data[0].plan_name;
            var payment = data[0].payment === null ? "" : data[0].payment;
            var campaign_cd = data[0].campaign_cd === null ? "" : data[0].campaign_cd;
            var agency_cd = data[0].agency_cd === null ? "" : data[0].agency_cd;
            var memo = data[0].memo === null ? "" : data[0].memo;
            
            $('.modal_table').addClass('accept_no'+data[0].accept_no);
            $('#supply_no_modal').text(supply_no); 
            $('#name').text(first_name + last_name); 
            $('#name_kana').text(first_name_kana + last_name_kana); 
            $('#add_no').text(add_no);
            $('#address').text(add_pref + add_city + add_detail + add_building + add_building_no);  
            $('#mail_address_modal').text(mail_address); 
            $('#tel_number').text(tel1 + tel2 + tel3); 
            $('#now_company').text(now_company); 
            $('#now_customer_no').text(now_customer_no); 
            $('#contracted_capacity').text(contracted_capacity); 
            $('#a_capacity').text(a_capacity); 
            $('#kva_capacity').text(kva_capacity); 
            $('#kw_capacity').text(kw_capacity);
            $('#plan_name').text(plan_name); 
            $('#payment').text(payment); 
            $('#campaign_cd').text(campaign_cd); 
            $('#agency_cd').text(agency_cd); 
            $('#memo').text(memo); 
            
            $('#supply_no_input').val(supply_no); 
            $('#first_name_input').val(first_name); 
            $('#last_name_input').val(last_name); 
            $('#first_name_kana_input').val(first_name_kana); 
            $('#last_name_kana_input').val(last_name_kana);
            $('#add_no_input').val(add_no);
            $('#add_pref_input').val(add_pref);
            $('#add_city_input').val(add_city);
            $('#add_detail_input').val(add_detail);
            $('#add_building_input').val(add_building);
            $('#add_building_no_input').val(add_building_no);
            $('#mail_address_input').val(mail_address); 
            $('#tel1_input').val(tel1); 
            $('#tel2_input').val(tel2); 
            $('#tel3_input').val(tel3); 
            $('#now_company_input').val(now_company);
            $('#now_customer_no_input').val(now_customer_no);
            $('#contracted_capacity_input').val(contracted_capacity); 
            $('#a_capacity_input').val(a_capacity); 
            $('#kva_capacity_input').val(kva_capacity); 
            $('#plan_name_input').val(plan_name); 
            $('#plan_name_input').val(plan_name); 
            $('#payment_input').val(payment); 
            $('#campaign_cd_input').val(campaign_cd); 
            $('#agency_cd_input').val(agency_cd); 
            $('[name="accept_no"]').val(accept_no);
            $('#memo').val(memo); 
            
            if($('.edit_btn').hasClass('edit_active')){
                $('.edit_btn').removeClass('edit_active');
                $('.detail_edit').css('display','none');
                $('.detail_view').css('display','block');
                $('.modal_table td').css('display','block');
                $('.edit_btn').css('display','block');
                $('.edit_btn_submit').css('display','none');
            }else{
                
            }
            
            //モーダル表示
            $('#detail_modal').modal('show');
                        
        });
        
    });
    
    $('.edit_btn').on('click',function(){
        $(this).toggleClass('edit_active');

        if($(this).hasClass('edit_active')){
            $('.detail_view').css('display','none');
            $('.detail_edit').css('display','block');
            $('.modal_table td').css('display','flex');
            $('.edit_btn').css('display','none');
            $('.edit_btn_submit').css('display','block');
        }else{
            $('.detail_edit').css('display','none');
            $('.detail_view').css('display','block');
            $('.modal_table td').css('display','block');
            $('.edit_btn').css('display','block');
            $('.edit_btn_submit').css('display','none');
        }                
    });
    
    
    /**
     * 代理店マスタ画面
     */
    //    詳細ボタン押下
    $('.agency_detail_btn').on('click',function(){
        
        var no = $(this).closest('tr').data('no'); 

       //ajax処理
        $.ajax({
            url: 'agency_data_detail',
            type: 'get',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'no': no
            }
        }).done(function(data){
            
            var agency_cd = data[0].agency_cd;
            var agency_name = data[0].agency_name === null ? "" : data[0].agency_name;
            var agency_password = data[0].password === null ? "" : data[0].password;
            
            $('.modal_table').addClass('accept_no'+data[0].accept_no);
            $('#agency_cd_modal').text(agency_cd); 
            $('#agency_name').text(agency_name); 
            $('#agency_password').text(agency_password); 
            
            $('#agency_cd_input').val(agency_cd); 
            $('#agency_name_input').val(agency_name); 
            $('#agency_password_input').val(agency_password); 
            
            if($('.edit_btn').hasClass('edit_active')){
                $('.edit_btn').removeClass('edit_active');
                $('.detail_edit').css('display','none');
                $('.detail_view').css('display','block');
                $('.modal_table td').css('display','block');
                $('.edit_btn').css('display','block');
                $('.edit_btn_submit').css('display','none');
            }else{
                
            }
            
            //モーダル表示
            $('#agency_detail_modal').modal('show');
                        
        });
    });
    
    //代理店追加ボタンモーダル
    $('.agency_add_btn').on('click',function(){
       
        
        //モーダル表示
        $('#agency_add_modal').modal('show');
    });
    
        
    $(function(){
      moment.locale("ja");
      $('#upload_date').daterangepicker(
        {
          ranges: {
            '今日': [moment(), moment()],
            '昨日': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            '過去7日間': [moment().subtract(6, 'days'), moment()],
            '過去30日間': [moment().subtract(29, 'days'), moment()],
            '今月': [moment().startOf('month'), moment().endOf('month')],
            '先月': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().startOf('month'),
          endDate: moment().endOf('month'),
          format: "YYYY-MM-DD",
          locale: { applyLabel: "OK", customRangeLabel: "カスタム"}
        },
        function(s, e){
        startdate = s.format('YYYY-MM-DD');
        enddate = e.format('YYYY-MM-DD');
      });
    });
    
    $('.panel_content h2').click(function(){
        $(this).next('.panel_inner').slideToggle();

        if ($(this).hasClass('active')) {
          $(this).removeClass('active');
          $(this).css({
            'background-color':''
          });
        }else{
          $(this).addClass('active');
        }
    });
    
    $('.faq_list dt').click(function(){
            $(this).next('.answer_item').slideToggle();
            $(this).toggleClass('open');
    });
    
    //フリガナ自動入力
//    $(function() {
//        $.fn.autoKana('#first_name', '#first_name_kana',{katakana:true});
//        $.fn.autoKana('#last_name', '#last_name_kana',{katakana:true});
//    });
//    
//    $(function() {
//        $("#zoom").elevateZoom({
//            zoomType : "lens",
//            lensShape : "round",
//            lensSize : 200,
//            scrollZoom : true
//        });
//    });

    //半角➡全角に変換
//    $(function(){
//        $("#add3").change(function(){
//            var str = $(this).val();
//            str = str.replace( /[A-Za-z0-9-!"#$%&'()=<>,.?_\[\]{}@^~\\]/g, function(s) {
//                return String.fromCharCode(s.charCodeAt(0) + 65248);
//            });
//            $(this).val(str);
//        }).change();
//    });
});