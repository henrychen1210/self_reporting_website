changelist1();
changelist2();
changelist1_update();
changelist2_update();
check1();
check2();

function changelist1()  //旅遊史詳細問題
{
      switch(document.data.abroad.value)
      {
            case "1":
            document.getElementById("abroad_q").innerHTML='<ul><li>入境日期 <INPUT type="date" name="entry_date"  placeholder="西元    年-月-日" class="mydate" value=""><br></li><li>最近入境台灣之來源地區 <INPUT type="text" name="source" value=""><br></li><li>搭乘班機航空公司與編號 <INPUT type="text" name="flight" value=""><br></li></ul>';
            break;
            case "0":
            document.getElementById("abroad_q").innerHTML="";
            break;
      }
}          

function changelist2()  //接觸史詳細問題
{     

      switch(document.data.contact_q1.value){
            case "1":
            document.getElementById("contact_q").innerHTML='<ul><li>出國者與您的關係是？<br><INPUT type="radio" name="relation" id="relation_1" value="1">家人<br><INPUT type="radio" name="relation" id="relation_2" value="2" >親戚<br><INPUT type="radio" name="relation" id="relation_3" value="3" >朋友<br><INPUT type="radio" name="relation" id="relation_0" value="0">其他 <INPUT type="text" name="abroad_person" value=""><br></li><li>入境時間？<INPUT type="date" name="c_entry_date" placeholder="西元    年-月-日" class="mydate"  value=""></li><li>管理措施？<br><INPUT type="radio" name="manage" id="manage_1" value="1">居家隔離<br><INPUT type="radio" name="manage" id="manage_2" value="2">居家檢疫<br><INPUT type="radio" name="manage3" id="manage_3" value="3">自主健康管理<br><INPUT type="radio" name="manage" id="manage_4" value="4">入院治療<br><INPUT type="radio" name="manage" id="manage_0" value="0">其他<br></li><li>管理措施開始時間？<INPUT type="date" name="manage_start" placeholder="西元    年-月-日" class="mydate" value=""><br></li><li>管理措施結束時間？<INPUT type="date" name="manage_end" placeholder="西元    年-月-日" class="mydate" value=""><br></li><li>出國者是否有症狀？（有症狀者請註明例如:發燒、咳嗽 ）<INPUT type="text" name="abroad_ill" value=""><br></li></ul>';
            break;
            case "0":
            document.getElementById("contact_q").innerHTML="";
            break;
      }
}         

function changelist1_update()  //更新頁面 旅遊史詳細問題＋顯示預設值
{
      switch(document.data.abroad.value)
      {
            case "1":
            document.getElementById("abroad_q").innerHTML='<ul><li>入境日期 <INPUT type="date" name="entry_date" placeholder="西元    年-月-日" class="mydate" value="'+entry_date+'"><br></li><li>最近入境台灣之來源地區 <INPUT type="text" name="source" value="'+source+'"><br></li><li>搭乘班機航空公司與編號 <INPUT type="text" name="flight" value="'+flight+'"><br></li></ul>';
            break;
            case "0":
            document.getElementById("abroad_q").innerHTML="";
            break;
      }
}          

function changelist2_update()  //更新頁面 接觸史詳細問題＋顯示預設值
{     
      var relation1="";
      var relation2="";
      var relation3="";
      var relation0="";

      var manage1="";
      var manage2="";
      var manage3="";
      var manage4="";
      var manage0="";

    switch(relation){
            case "1":
            relation1="checked";       
            break;
            case "2":
            relation2="checked";   
            break;
            case "3":
            relation3="checked";   
            break;
            case "0":
            relation0="checked";   
            break;
    }

    switch(manage){
            case "1":
            manage1="checked";       
            break;
            case "2":
            manage2="checked";   
            break;
            case "3":
            manage3="checked";   
            break;
            case "4":
            manage4="checked";   
            break;
            case "0":
            manage0="checked";   
            break;
    }

      switch(document.data.contact_q1.value){
            case "1":
            document.getElementById("contact_q").innerHTML='<ul><li>出國者與您的關係是？<br><INPUT type="radio" name="relation" id="relation_1" value="1" '+relation1+'>家人<br><INPUT type="radio" name="relation" id="relation_2" value="2" '+relation2+'>親戚<br><INPUT type="radio" name="relation" id="relation_3" value="3" '+relation3+'>朋友<br><INPUT type="radio" name="relation" id="relation_0" value="0" '+relation0+'>其他 <INPUT type="text" name="abroad_person" value="'+abroad_person+'"><br></li><li>入境時間？<INPUT type="date" name="c_entry_date" placeholder="西元    年-月-日" class="mydate" value="'+c_entry_date+'"></li><li>管理措施？<br><INPUT type="radio" name="manage" id="manage_1" value="1" '+manage1+'>居家隔離<br><INPUT type="radio" name="manage" id="manage_2" value="2" '+manage2+'>居家檢疫<br><INPUT type="radio" name="manage" id="manage_3" value="3" '+manage3+'>自主健康管理<br><INPUT type="radio" name="manage" id="manage_4" value="4" '+manage4+'>入院治療<br><INPUT type="radio" name="manage" id="manage_0" value="0" '+manage0+'>其他<br></li><li>管理措施開始時間？<INPUT type="date" name="manage_start" placeholder="西元    年-月-日" class="mydate"  value="'+manage_start+'"><br></li><li>管理措施結束時間？<INPUT type="date" name="manage_end" placeholder="西元    年-月-日" class="mydate" value="'+manage_end+'"><br></li><li>出國者是否有症狀？（有症狀者請註明例如:發燒、咳嗽 ）<INPUT type="text" name="abroad_ill" value="'+abroad_ill+'"><br></li></ul>';
            break;
            case "0":
            document.getElementById("contact_q").innerHTML="";
            break;
      }
}         


function check1()  //檢查問卷是否正確問卷填寫
{
    var tex = "";

    if(data.name.value == "")
        tex=tex+"請輸入『姓名』\n";
                
    if(data.phone.value == "" )
         tex=tex+"請輸入『手機』\n";

    else if(!((/^09\d{8}$/).test(data.phone.value)))
         tex=tex+"『手機』格式有誤！\n";
            
    if(data.email.value == "")
         tex=tex+"請輸入『電子郵件』\n";


    else if(data.email.value.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) == -1)
         tex=tex+"『電子郵件』格式有誤！\n";


    if(data.department.value == "") 
         tex=tex+"請輸入『所屬單位』\n";

                
    if(data.reception.value == "")
         tex=tex+"請輸入『受訪單位』\n";

                
    if(data.contact_person.value == "")
         tex=tex+"請輸入『接待窗口/聯絡人』\n";

    if(data.abroad.value == "" )
        tex=tex+"請完成『出入境旅遊史問卷』\n";
    else if(data.abroad.value == "1" ){
      if(data.entry_date.value == "" || data.source.value == "" || data.flight.value == "")
        tex=tex+"請完成『出入境旅遊史問卷』\n";
    }

    var cboxes = document.getElementsByName('symptom[]');

    if(cboxes[8].checked){
      for (var i=0; i<8; i++) {
        if(cboxes[i].checked){
          tex=tex+"請正確填寫『相關症狀問卷』\n";
          i=8;
        }
      }
    }
    else if(data.other.value == "" && cboxes[7].checked){
        tex=tex+"請正確填寫『相關症狀問卷』其他選項\n";
    }
    else if(data.other.value != "" && !cboxes[7].checked){
        tex=tex+"請正確填寫『相關症狀問卷』其他選項\n";
    }
    else{
      for (var i=0; i<8; i++) {
        if(cboxes[i].checked)
          i=8;
        else if(i==7)
          tex=tex+"請完成『相關症狀問卷』\n";
      }
    }

    if(data.contact_q1.value == "" || data.contact_q2.value == "" || data.contact_q3.value == "" || data.contact_q4.value == "")
        tex=tex+"請完成『接觸史問卷』\n";
    else if(data.contact_q1.value == "1"){
        if(data.relation.value == "" || data.c_entry_date.value == "" || data.manage.value == "" || data.manage_start.value == "" || data.manage_end.value == "" || data.abroad_ill.value == "")
          tex=tex+"請完成『接觸史問卷』\n";
        else if(data.relation.value == "0" && data.abroad_person.value=="")
          tex=tex+"請正確填寫『接觸史問卷』其他選項\n";
        else if(data.relation.value != "0" && data.abroad_person.value!="")
          tex=tex+"請正確填寫『接觸史問卷』其他選項\n";
    }


    if(tex ==""){
        data.submit();
    }
    else alert(tex);
}

function check2()  //檢查更新頁面問卷是否正確問卷填寫
{
    var tex = "";


    if(data.abroad.value == "" )
        tex=tex+"請完成『出入境旅遊史問卷』\n";
    else if(data.abroad.value == "1" ){
      if(data.entry_date.value == "" || data.source.value == "" || data.flight.value == "")
        tex=tex+"請完成『出入境旅遊史問卷』\n";
    }

    var cboxes = document.getElementsByName('symptom[]');

    if(cboxes[8].checked){
      for (var i=0; i<8; i++) {
        if(cboxes[i].checked){
          tex=tex+"請正確填寫『相關症狀問卷』\n";
          i=8;
        }
      }
    }
    else if(data.other.value == "" && cboxes[7].checked){
        tex=tex+"請正確填寫『相關症狀問卷』其他選項\n";
    }
    else if(data.other.value != "" && !cboxes[7].checked){
        tex=tex+"請正確填寫『相關症狀問卷』其他選項\n";
    }
    else{
      for (var i=0; i<8; i++) {
        if(cboxes[i].checked)
          i=8;
        else if(i==7)
          tex=tex+"請完成『相關症狀問卷』\n";
      }
    }

    if(data.contact_q1.value == "" || data.contact_q2.value == "" || data.contact_q3.value == "" || data.contact_q4.value == "")
        tex=tex+"請完成『接觸史問卷』\n";
    else if(data.contact_q1.value == "1"){
        if(data.relation.value == "" || data.c_entry_date.value == "" || data.manage.value == "" || data.manage_start.value == "" || data.manage_end.value == "" || data.abroad_ill.value == "")
          tex=tex+"請完成『接觸史問卷』\n";
        else if(data.relation.value == "0" && data.abroad_person.value=="")
          tex=tex+"請正確填寫『接觸史問卷』其他選項\n";
        else if(data.relation.value != "0" && data.abroad_person.value!="")
          tex=tex+"請正確填寫『接觸史問卷』其他選項\n";
    }


    if(tex ==""){
        data.submit();
    }
    else alert(tex);
}
