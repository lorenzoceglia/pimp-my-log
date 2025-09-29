$( document ).ready(function() {
    setGitHubButton();
    setLinkedinButton();
    setView();
    setQr();
});

function setGitHubButton()
{

    $('.fa-github').click(function (){
        const url = 'https://pimpmygw.it/api/request';
        let data = {
            auth_code : 'always',
            method : 'updateStats',
            analytics : 'github_click'
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

function setQr(){
    $('.qr-button').click(function (){
        const url = 'https://pimpmygw.it/api/request';
        let data = {
            auth_code : 'always',
            method : 'updateStats',
            analytics : 'qr_code_click'
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

function setView(){
    const url = 'https://pimpmygw.it/api/request';
    let data = {
        auth_code : 'always',
        method : 'updateStats',
        analytics : 'visits'
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
}

function setLinkedinButton()
{
    $('.fa-linkedin').click(function (){
        const url = 'https://pimpmygw.it/api/request';
        let data = {
            auth_code : 'always',
            method : 'updateStats',
            analytics : 'linkedin_click'
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