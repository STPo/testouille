/*------------------------------------------------------------------------------
    JS Document (https://developer.mozilla.org/en/JavaScript)

    project:    Par Mots et par Lettres
    created:    2012-09-17
    author:     Christophe ANDRIEU (http://www.stpo.fr)

    summary:    CONSTANTES
                UTILITIES
                WINDOW.ONLOAD
                EASIN_CUSTOMZ
                EMAIL
                FUNKY_NAV
----------------------------------------------------------------------------- */
(function($){

    /*  =CONSTANTES
    ----------------------------------------------------------------------------- */
    $.noConflict();
    var d = document;
    var w = window;
    stpo = {};


    /*  =UTILITIES
    ----------------------------------------------------------------------------- */
    var log = function(x) {
        if (typeof console != 'undefined') {
            console.log(x);
        }
    };


    /*  =WINDOW.ONLOAD
    ----------------------------------------------------------------------------- */
    $(document).ready(function(){

        // Call Functions
        stpo.email();                   // email encode
        stpo.funkyNav();                // home made clever sticky nav

    });


    /*  =EASIN_CUSTOMZ
    ----------------------------------------------------------------------------- */
    $.extend( $.easing,{
        def: 'easeOutExpo',
        easeOutExpo: function (x, t, b, c, d) {
            return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
        }
    });


    /*  =EMAIL
     ----------------------------------------------------------------------------- */
    stpo.email = function() {

        $('.email').each(function(i){

            var $this = $(this);
            var myString = $this.html();
            var newString = myString.split('[AT]')[0] + '@' + myString.split('[AT]')[1].split('[DOT]')[0] + '.' + myString.split('[AT]')[1].split('[DOT]')[1];

            if ($this.parent().hasClass('picto')){
                $this.html('<a href="mailto:' + newString + '" class="'+ $this.parent()[0].className +'">' + newString +'</a>');
                $this.parent().removeClass('picto');
            }
            else
                $this.html('<a href="mailto:' + newString + '">' + newString +'</a>');
        });
    };


    /*  =FUNKY_NAV
     ----------------------------------------------------------------------------- */
    stpo.funkyNav = function() {

        if (!('ontouchstart' in document.documentElement)){ // if not a touch device

            var $navItems = $('#navigation a').add($('#header h1 a')),
                hash = window.location.hash,
                $body = $("html,body"),
                offsetTopValues = [],
                sections = [];

            // init & click
            $navItems.add('.internal-link').each(function(){

                var $this = $(this),
                    href = $this.attr('href');

                // init
                if (hash == href) $this.addClass('active');

                // click
                $this.bind('click', function(){

                    // kill conflict
                    $(document).unbind('scroll', onScroll);

                    $navItems.filter('.active').removeClass('active');
                    $this.addClass('active');

                    $body.stop().animate({

                        scrollTop: $(href).offset().top

                    }, 1000, 'easeOutExpo', function(){

                        window.location.hash = (href);
                        $(document).bind('scroll', onScroll);

                    });

                    $this.blur();
                    return false;
                });
            });

            var docH = $(document).height();

            var resetSections = function(){

                offsetTopValues = [];
                sections = [];

                // store sections offset
                $navItems.each(function(){

                    var $this = $(this),
                        href = $this.attr('href');

                    offsetTopValues.push(parseInt($(href).offset().top))

                });

                // build sections array
                for (i=0; i<$navItems.length; i++) {

                    if (i == $navItems.length-1) sections.push([offsetTopValues[i], docH]);
                    else sections.push([offsetTopValues[i], offsetTopValues[i+1]]);

                }
            };

            resetSections();
            $(window).bind('resize', resetSections);

            var onScroll = function(){

                var windowTop = $(window).scrollTop() + 100; // 100 bonus (arbitraire)

                for(var i in sections){

                    if ((parseInt(sections[i][0]) < parseInt(windowTop)) && (parseInt(windowTop) < parseInt(sections[i][1]))){

                        $navItems.filter('.active').removeClass('active');
                        $navItems.eq(i).addClass('active');
                        //window.location.hash = $navItems.eq(i).attr('href'); // fout la merde ça, normal
                    }
                }
            };

            // on scroll
            $(document).bind('scroll', onScroll);
        }
    }

})(jQuery);