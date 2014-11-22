var wsDomain = '';
if(!wsDomain){
    wsDomain = document.domain;
}
wsPort = 8080;

var themes = {
    'Spacelab':'../common/css/spacelab.css',
    'Cerulean':'../common/css/cerulean.css',
    'Cosmo':'../common/css/cosmo.css',
    'Cyborg':'../common/css/cyborg.css',
    'Flatly':'../common/css/flatly.css',
    'Journal':'../common/css/journal.css',
    'Readable':'../common/css/readable.css',
    'Simplex':'../common/css/simplex.css',
    'Slate':'../common/css/slate.css',
    'Spacelab':'../common/css/spacelab.css',
    'United':'../common/css/united.css',
    'Yeti':'../common/css/yeti.css'
};

var examples = {
    'Simple Auth': 'simple',
    'Facebook Auth': 'facebook',
    'Wordpress': 'http://www.magnoliyan.com/rtc-video/source/client/demos/wordpress/',
    'Private rooms': 'private',
    'Support': 'support',
    'Group chat': 'group',
    'Group private chat': 'private_group',
    'Roulette mode': 'roulette',
    'File transfer': 'file',
    'Events API': 'api',
    'Internationalization': 'i18n'
};

var navTpl = ' \
            <nav class="navbar navbar-default" role="navigation"> \
                <div class="container-fluid"> \
                    <div class="navbar-header"> \
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> \
                            <span class="sr-only">Toggle navigation</span> \
                            <span class="icon-bar"></span> \
                            <span class="icon-bar"></span> \
                            <span class="icon-bar"></span> \
                        </button> \
                        <a class="navbar-brand" href="#">opcioninmuebles.com</a> \
                    </div> \
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> \
                        <ul class="nav navbar-nav"> \
                            <li class="dropdown"> \
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Examples <b class="caret"></b></a> \
                                <ul class="dropdown-menu" id="examples"> \
                                </ul> \
                            </li> \
                        </ul> \
                    </div> \
                </div> \
            </nav>';
    
    navTpl = '';

$(document).ready(function(){
    var $menu = $(navTpl);
    $(".container").prepend($menu);
    //render themes
    
    //apend css
    $('head').append('<link rel="stylesheet" id="themeCss" type="text/css" href="../common/css/spacelab.css">');
    
    //render examples
    var examplesHtml = '';
    var target = '_self';
    var exLink = '';
    for(var example in examples){
        target = '_self';
        exLink = './../' + examples[example];
        if(examples[example].indexOf('http') == 0){
            target = '_blank';
            exLink = examples[example]; 
        }
        examplesHtml += '<li><a href="' + exLink + '" target="' + target + '">' + example +'</a></li>';
    }
    $menu.find('#examples').html(examplesHtml);   
});