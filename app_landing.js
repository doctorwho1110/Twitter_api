//Sayfa hazır oldugunda fonksiyonu calıstır
$(function(){

    $('#sign-up').on('click', function(e){//gonder-btn basıldıgında formdaki butun elemanlar ajax.phpye gonderilsin
        var formData = $('#landing-page-form').serialize(); //iletisim-form adlı yapıdan gelen bütün dataları otomatik cek
        $.post('landing_page_ajax.php', formData + '&tip=iletisim', function(response){ //Alınan form datayı ajax.phpye gönderir.
            //&tip=iletisim ajax.phpye dogru gonderi olup olmadıgını kontrol eder.
            if (response.hata){ //ajax.php tarafından gelen jsondan hata diye bir sey varsa
                $('#basarili').hide();
                $('#hata').html(response.hata).show();//hatalı ise #basarılı htmlinini sayfada gözükmesi için
                $('#' + response.target).focus();// ajax.phpde idsi ile hata donduren yere focuslamak icin
            } else {    ////ajax.php tarafından gelen jsondan herhangi bir hata yok ise
                $('#hata').hide();
                $('#basarili').html(response.basarili).show();//basarılı ise #basarılı htmlinini sayfada gözükmesi için
                $('#landing-page-form input, #landing-page-form textarea').val('');//Gonderildikten sonra formun ic degerlerini sıfırlama
            }
        }, 'json');//ajax.php Json olarak dondurecek
        e.preventDefault(); //Eventleri kaldırmak icin kullanılır
    });

});
