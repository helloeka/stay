var indonesia = document.getElementById('id_click'),
    english = document.getElementById('en_click'),
    id_txt = document.querySelectorAll('#id'),
    en_txt = document.querySelectorAll('#en'),
    nb_id = id_txt.length,
    nb_en = en_txt.length;

    indonesia.addEventListener('click', function() {
    langue(indonesia,english);
}, false);

english.addEventListener('click', function() {
    langue(english,indonesia);
}, false);
function langue(langueOn,langueOff){
    if (!langueOn.classList.contains('current_lang')) {
        langueOn.classList.toggle('current_lang');
        langueOff.classList.toggle('current_lang');
    }
    if(langueOn.innerHTML == 'id'){
        afficher(id_txt, nb_id);
        cacher(en_txt, nb_en);
    }
    else if(langueOn.innerHTML == 'en'){
        afficher(en_txt, nb_en);
        cacher(id_txt, nb_id);
    }
}
function afficher(txt,nb){
    for(var i=0; i < nb; i++){
        txt[i].style.display = 'block';
    }
}
function cacher(txt,nb){
    for(var i=0; i < nb; i++){
        txt[i].style.display = 'none';
    }
}
function init(){
    langue(indonesia,english);
}
init();



$('.navbar-collapse a').click(function(){
    $(".navbar-collapse").collapse('hide');
});