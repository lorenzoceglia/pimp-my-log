$( document ).ready(function() {
    new ClipboardJS('.copy-all-button');
    setCopyButton();
    giveMeAuthCode();
    sendMessageTester();
    initCarousel();
    languageSelector();
    setLogOut();
});

function setCopyButton(){
    $('.copy-all-button').click(function (){

        const url = 'https://pimpmygw.it/api/request';
        let data = {
            auth_code : 'always',
            method : 'updateStats',
            analytics : 'code_copy_click'
        };

        $.ajax({
            url: url,
            crossDomain: true,
            headers: {
                "accept": "application/json",
                "Access-Control-Allow-Origin":"*"
            },
            dataType: 'json',
            type: 'post',
            data: data,
            success: function( response, textStatus, jQxhr ){
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
            }
        });

        $('.copy-text').html(' Copiato!');

        $('.copy-all-button').removeClass('btn-primary');
        $('.copy-all-button').addClass('btn-success');

        setTimeout(function () {
                $('.copy-text').html(' Copia!');
                $('.copy-all-button').removeClass('btn-success');
                $('.copy-all-button').addClass('btn-primary');
        }, 1500);

    });
}

function setLogOut(){
    $('.logout-button').click(function (){
        const url = 'https://pimpmygw.it/api/request';
        let data = {
            auth_code : 'always',
            method : 'updateStats',
            analytics : 'telegram_logouts'
        };

        $.ajax({
            url: url,
            crossDomain: true,
            headers: {
                "accept": "application/json",
                "Access-Control-Allow-Origin":"*"
            },
            dataType: 'json',
            type: 'post',
            data: data,
            success: function( response, textStatus, jQxhr ){
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
            }
        });
    });
}

function initCarousel(){
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        dots:false,
        nav:false,
        autoplay:true,
        autoplayHoverPause:true,
        autoplayTimeout:900,
        autoplaySpeed:999,
        responsive:{
            0:{
                items:2
            },
            600:{
                items:3
            },
            1000:{
                items:3
            }
        }
    })
}

function giveMeAuthCode(){
    let button = $('.auth-giver');
    $('.terms-button').click(function (){
        const url1 = 'https://pimpmygw.it/api/request';
        let data1 = {
            auth_code : 'always',
            method : 'updateStats',
            analytics : 'terms_and_condition_clicks'
        };

        $.ajax({
            url: url1,
            crossDomain: true,
            headers: {
                "accept": "application/json",
                "Access-Control-Allow-Origin":"*"
            },
            dataType: 'json',
            type: 'post',
            data: data1,
            success: function( response, textStatus, jQxhr ){
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
            }
        });
    });
    button.click(function (){

        let t_token = $(this).attr('t-token');
        let url = '/dashboard/getAuthToken';

        let data = {
            t_token : t_token
        };

        $.ajax({
            url: url,
            dataType: 'json',
            headers: {
                "accept": "application/json"
            },
            type: 'post',
            data: data,
            success: function( response, textStatus, jQxhr ){
                let a_code = response['auth_code'];
                $('.terms-button').remove();
                $('.test-auth-token').val(a_code);
            },
            error: function( jqXhr, textStatus, errorThrown ){
                //console.log( textStatus );
            }
        });
    });
}

function sendMessageTester(){
    $('.send-test').click(function (){

        const url1 = 'https://pimpmygw.it/api/request';
        let data1 = {
            auth_code : 'always',
            method : 'updateStats',
            analytics : 'test_count'
        };

        $.ajax({
            url: url1,
            crossDomain: true,
            headers: {
                "accept": "application/json",
                "Access-Control-Allow-Origin":"*"
            },
            dataType: 'json',
            type: 'post',
            data: data1,
            success: function( response, textStatus, jQxhr ){
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
            }
        });

        let auth_code = $('.test-auth-token');
        let t_token = $('.test-t-token');
        let t_message = $('.test-t-message');
        let method = $('.method-select');

        const url = 'https://pimpmygw.it/api/request';
        let data = {
            auth_code : auth_code.val(),
            method : method.val(),
            debug_msg : t_message.val()
        };

        $.ajax({
            url: url,
            crossDomain: true,
            headers: {
                "accept": "application/json",
                "Access-Control-Allow-Origin":"*"
            },
            dataType: 'json',
            type: 'post',
            data: data,
            success: function( response, textStatus, jQxhr ){
                let type = response['type'];

                switch (type) {

                    case 'success' :
                        let success = $('.success').clone();
                        success.removeClass('d-none');
                        success.find('.success-alert-message').text(response['msg']);
                        success.removeClass('success');
                        $('.error-container').append(success);
                    break;

                    case 'warning' :
                        let alert = $('.warning').clone();
                        alert.removeClass('d-none');
                        alert.find('.warning-alert-message').text(response['msg']);
                        alert.removeClass('warning');
                        $('.error-container').append(alert);
                    break;

                    case 'danger' :
                        let danger = $('.danger').clone();
                        danger.removeClass('d-none');
                        danger.find('.danger-alert-message').text(response['msg']);
                        danger.removeClass('danger');
                        $('.error-container').append(danger);
                        break;

                }

            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
            }
        });


    });
}

function languageSelector(){

    let t_token = $('.test-t-token').val();
    let a_token = $('.test-auth-token').val();
    let message = '';
    let method = '';
    let type = '';

    setTextArea('php');

    $('.language-selector').hover(function(){
        //console.log($(this).attr('name'));
        var cloned_lang = $(this).clone();
        cloned_lang.removeClass('language-selector');

        switch ($(this).attr('name'))
        {
            case 'php' :
                $('.tech-view-card').html(cloned_lang)
                $('.card-header-code').text('Codice PHP');
                $('.card-header-code').attr('lang', 'php')
                setTextArea('php');
                break;
            case 'cakephp' :
                $('.tech-view-card').html(cloned_lang)
                $('.card-header-code').text('Codice Cake PHP');
                $('.card-header-code').attr('lang', 'cakephp')
                setTextArea('cakephp');
                break;
            case 'javascript' :
                $('.tech-view-card').html(cloned_lang)
                $('.card-header-code').text('Codice JavaScript');
                $('.card-header-code').attr('lang', 'javascript')
                setTextArea('javascript');
                break;
            case 'angular' :
                $('.tech-view-card').html(cloned_lang)
                $('.card-header-code').text('Codice Angular');
                $('.card-header-code').attr('lang', 'angular')
                setTextArea('angular');
                break;
            case 'jquery' :
                $('.tech-view-card').html(cloned_lang)
                $('.card-header-code').text('Codice JQuery');
                $('.card-header-code').attr('lang', 'jquery')
                setTextArea('jquery');
                break;
        }
    });

    $( ".method-selector" ).change(function() {
        method = $('.method-selector').val();
        let sel_lang = $('.card-header-code').attr( "lang" );

        if(method == 'sendDebug')
        {
            type = 'json';
        }
        else if(method == 'sendImage'){
            type = 'image';
        }
        else {
            type = 'text';
        }

        if(sel_lang == 'php')
        {
            setTextArea('php');
        }
        else if(sel_lang == 'cakephp') {
            setTextArea('cakephp');
        }
        else if(sel_lang == 'angular') {
            setTextArea('angular');
        }
        else if(sel_lang == 'javascript') {
            setTextArea('javascript');
        }
        else if(sel_lang == 'jquery') {
            setTextArea('jquery');
        }
    });

    $(".configurator-t-message").keyup(function(event) {
        var stt = $(this).val();
        let sel_lang = $('.card-header-code').attr( "lang" );
        message = stt;
        method = $('.method-selector').val();

        if(method == 'sendDebug')
        {
            type = 'json';
        }
        else if(method == 'sendImage'){
            type = 'image';
        }
        else {
            type = 'text';
        }

        if(sel_lang == 'php')
        {
            setTextArea('php');
        }
        else if(sel_lang == 'cakephp') {
            setTextArea('cakephp');
        }
        else if(sel_lang == 'angular') {
            setTextArea('angular');
        }
        else if(sel_lang == 'javascript') {
            setTextArea('javascript');
        }
        else if(sel_lang == 'jquery') {
            setTextArea('jquery');
        }

    });

    function getCodeText(name) {
        let message_bkg = message;
        var data_name = '';
        let code = 'errore';
        if(type == 'image'){
            message_bkg = '\'https://' + message + '\'';
            data_name = 'debug_img';
        }
        else {
            message_bkg = '\'' + message + '\'';
            data_name = 'debug_msg';
        }

        switch (name) {
            case 'php':
                if(type == 'json')
                {
                    message_bkg = 'json_encode(\'' + message + '\');'
                }
                code =
                '$url = "https://pimpmygw.it/api/request";\n' +
                    '$load = [\n' +
                    '   \'auth_code\' => \''+ a_token +'\',\n' +
                    '   \'method\' => \'' + method + '\',\n' +
                    '   \'' + data_name + '\' => '+ message_bkg + '\n' +
                    '];\n' +
                    '\n' +
                    '$curl = curl_init($url);\n' +
                    'curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);\n' +
                    '//Uncomment above if your application has not a https certificate.\n' +
                    '//curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);\n' +
                    'curl_setopt($curl, CURLOPT_POSTFIELDS, $load);\n' +
                    '$result = curl_exec($curl);\n' +
                    '\n' +
                    'curl_close($curl);\n' ;
                break;
            case 'javascript' :
                if(type == 'json')
                {
                    message_bkg = 'JSON.stringify(\'' + message + '\')'
                }
                code ='let url = "https://pimpmygw.it/api/request";\n' +
                    '\n' +
                    'var xhr = new XMLHttpRequest();\n' +
                    'xhr.open("POST", url);\n' +
                    'xhr.setRequestHeader("Accept", "application/json");\n' +
                    'xhr.setRequestHeader("Content-Type","application/json");\n' +
                    '\n' +
                    'xhr.onreadystatechange = function () {\n' +
                    '   if (xhr.readyState === 4) {\n' +
                    '      console.log(xhr.responseText);\n' +
                    '   }};\n' +
                    '\n' +
                    'let data = {\n' +
                    '  "auth_code" : "'+ a_token +'",\n' +
                    '  "method" : "' + method + '",\n' +
                    '  "' + data_name + '" : '+message_bkg+'\n'+
                    '};\n' +
                    '\n' +
                    'xhr.send(JSON.stringify(data));';
            break;
            case 'cakephp' :
                if(type == 'json')
                {
                    message_bkg = 'json_encode(\'' + message + '\');'
                }
                code = '//import the Client Library with\n' +
                    '//use Cake\\Http\\Client; \n\n' +
                    '//Uncomment above if your application has not a https certificate.\n' +
                    '//curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);\n' +
                    '/*$conf = [\n' +
                    '    \'ssl_verify_peer\' => false,\n' +
                    '    \'ssl_verify_host\' => false\n' +
                    '];\n*/\n' +
                    '//And comment the next line ($conf variable)\n'+
                    '$conf = [];\n' +
                    '$load = [\n' +
                    '   \'auth_code\' => \''+ a_token +'\',\n' +
                    '   \'method\' => \'' + method + '\',\n' +
                    '   \'' + data_name + '\' => ' + message_bkg + '\n' +
                    '];\n' +
                    '\n' +
                    '$http = new Client($conf);\n' +
                    '$response = $http->post(\'https://pimpmygw.it/api/request\', $load);';
                break;
            case 'angular' :
                if(type == 'json')
                {
                    message_bkg = 'JSON.stringify(\'' + message + '\');'
                }
                code = '//      Insert into app.module.ts      //\n' +
                    'import { BrowserModule } from \'@angular/platform-browser\';\n' +
                    'import { NgModule } from \'@angular/core\';\n' +
                    'import { HttpClientModule } from \'@angular/common/http\';\n' +
                    'import { AppComponent } from \'./app.component\';\n' +
                    '\n' +
                    '@NgModule({\n' +
                    '    declarations: [AppComponent],\n' +
                    '    imports: [HttpClientModule]\n' +
                    '})\n' +
                    '\n' +
                    'export class AppModule { }\n';

                code = code + '//      Insert into your file.ts        //\n' +
                    'import { Injectable } from \'@angular/core\';\n' +
                    'import { Subject } from \'rxjs\';\n' +
                    'import { HttpClient } from \'@angular/common/http\';\n' +
                    '\n' +
                    '@Injectable({ providedIn: \'root\' })\n' +
                    'export class ClassName {\n' +
                    '    error = new Subject<string>();\n' +
                    '    \n' +
                    '    let data = {\n' +
                    '    auth_code: \''  + a_token + '\',\n' +
                    '    method: \'' + method + '\',\n' +
                    '    ' + data_name + ':  ' + message_bkg + '\n' +
                    '    }\n' +
                    '\n' +
                    '    constructor(private http: HttpClient) { }\n' +
                    '\n' +
                    '    req() {\n' +
                    '        this.http.post<any>(\'https://pimpmygw.it/api/request\', this.data, {observe: \'response\'}).subscribe(\n' +
                    '            responseData => {\n' +
                    '              console.log(responseData);\n' +
                    '            },\n' +
                    '            error => {\n' +
                    '              this.error.next(error.message);\n' +
                    '            });\n' +
                    '    }\n' +
                    '\n' +
                    '}';

                break;
            case 'jquery' :
                if(type == 'json')
                {
                    message_bkg = 'JSON.stringify(\'' + message + '\');'
                }
                code = 'let url = \'https://pimpmygw.it/api/request\';\n' +
                    'let data = {\n' +
                    '  auth_code : \'' + a_token + '\',\n' +
                    '  method : \''+ method + '\',\n' +
                    '  ' + data_name + ' : '+ message_bkg +'\n' +
                    '};\n' +
                    '\n' +
                    '$.ajax({\n' +
                    '  url: url,\n' +
                    '  crossDomain: true,\n' +
                    '  headers: {\n' +
                    '    "accept": "application/json",\n' +
                    '    "Access-Control-Allow-Origin":"*"\n' +
                    '  },\n' +
                    '  dataType: \'json\',\n' +
                    '  type: \'post\',\n' +
                    '  data: data,\n' +
                    '  success: function( response, textStatus, jQxhr ){\n' +
                    '    console.log(response);\n' +
                    '  },\n' +
                    '  error: function( jqXhr, textStatus, errorThrown ){\n' +
                    '    console.log( errorThrown );\n' +
                    '  }\n' +
                    '});' ;
                break;
        }

        return code;
    }

    function setTextArea(name){
        if(!a_token)
        {
            a_token = 'You still have to request it!';
        }
        $('.CodeMirror').remove();
        let code = getCodeText(name);
        var codeText = $("#snippet")[0];
        var editor = CodeMirror.fromTextArea(codeText, {
            lineNumbers : true,
        });

        $('.copy-code-textarea').html(code);
        editor.setValue(code);
        editor.setOption('theme', 'dracula');
        editor.save();
    }

}
