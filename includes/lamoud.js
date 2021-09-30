if(document.querySelector(".lm-pergnancy-content")){
    document.querySelector(".lm-container-form").style.display = "none";
    var progres = document.querySelector(".lm-progress span.lm-prog"),
        persentage = document.querySelector(".persentage");

    setTimeout(function(){
        progres.style.width = parseInt(persentage.innerText) + "%";
        document.querySelector(".lm-progress .pers-flag").style.opacity = "1";
        document.querySelector(".lm-progress .pers-flag-text").style.opacity = "1";

        let persent;

        if( Number(persentage.innerText) <= 0 ){
            persent = 0;
            persentage.innerText = '0'
            document.querySelector(".lm-progress .pers-flag-text").innerText = '0%';
        }else if( Number(persentage.innerText) >= 100 ){
            persent = 100;
            persentage.innerText = '100'
            document.querySelector(".lm-progress .pers-flag-text").innerText = '100%'
        }else{
            persent = Number(persentage.innerText);
        }

        if(document.querySelector('html').dir === 'rtl'){
            document.querySelector(".lm-progress .pers-flag-text").style.right = persent-6 + "%";
            document.querySelector(".lm-progress .pers-flag").style.right = persent + "%";

        }else{
            document.querySelector(".lm-progress .pers-flag-text").style.left = persent-6 + "%";
            document.querySelector(".lm-progress .pers-flag").style.left = persent + "%";

        }

    }, 2000);

    function lmReCalcPerg(){
        document.querySelector(".lm-pergnancy-content").remove();
        document.querySelector(".lm-container-form").style.display = "block";
    }
}