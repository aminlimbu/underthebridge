var category = 'happiness'
$.ajax({
    mehtod: 'GET',
    url: 'https://api.api-ninjas.com/v1/quotes?category=' + category,
    headers: {'X-Api-key' : 'S0c6RsOKHX6U6OxgWZ9gpg==6QiLc1yU36MynFNA'},
    contentType: 'application/json',
    success : function(result){
        var x = JSON.stringify(result);
        console.log(x);
        console.log(x.quote);
        // console.log(x);
        $('.seaquotes').append(x.quote);
        // console.log(result);
    },
    error: function ajaxError(jqXHR){
        console.error('Error: ', jqXHR.responseText);
    }
});