$(document).ready(function () {
    $('ul.sf-menu').superfish();
    $('#sub').click(function () {
        jQuery.scrollTo('#sub', 600, function () {
            $('#subscribe').slideToggle(450)
        })
    });
    $('#close').click(function () {
        $('#subscribe').slideToggle(450, function () {
            jQuery.scrollTo('#head-break', 600)
        })
    });
    $('#top').click(function () {
        jQuery.scrollTo(0, 450)
    });
    $('.post-comments').click(function (e) {
        e.preventDefault();
        jQuery.scrollTo('#comment-list', 600)
    });
    $('.comment-reply-link').click(function (e) {
        e.preventDefault();
        jQuery.scrollTo('#comment-form', 600)
    });
    $('#slides').cycle({
        timeout: 5000,
        pause: 1
    });
    jQuery("#feature-slider").slides({
        next: 'next-slide',
        prev: 'prev-slide',
        generatePagination: false,
        autoHeight: true,
        bigTarget: true,
        hoverPause: true,
        width: 960,
        play: 4000,
        animationComplete: function (current) {
            var currentCount = parseInt($('.slide:visible').index());
            var slideCount = $('.slide').length;
            var newCount = currentCount + 1;
            if (newCount <= slideCount) {
                $('#counter-current').html(newCount)
            } else {
                $('#counter-current').html('1')
            }
        }
    });
    $('#primary-nav li a').mouseover(function () {
        $(this).stop().animate({
            color: '#FFFFFF'
        }, 700)
    }).mouseout(function () {
        $(this).stop().animate({
            color: '#8f8f8f'
        }, 700)
    });
    $('#primary-nav li ul li a').mouseover(function () {
        $(this).stop().animate({
            color: '#000000'
        }, 700)
    }).mouseout(function () {
        $(this).stop().animate({
            color: '#8f8f8f'
        }, 700)
    });
    $('#image-tiles img').mouseover(function () {
        $(this).stop().animate({
            backgroundColor: '#DFDFDF'
        }, 700)
    }).mouseout(function () {
        $(this).stop().animate({
            backgroundColor: '#FFFFFF'
        }, 700)
    });
    $('.appstore-hover').hover(function () {
        $(this).stop().animate({
            "opacity": "0.01"
        }, 400)
    }, function () {
        $(this).stop().animate({
            "opacity": "1"
        }, 400)
    })
});

function equalize(elms) {
    var tallest = 0;
    $(elms).each(function () {
        var thisHeight = $(this).height();
        if (thisHeight > tallest) {
            tallest = thisHeight
        }
    });
    $(elms).height(tallest)
};
(function (d) {
    var k = d.scrollTo = function (a, i, e) {
            d(window).scrollTo(a, i, e)
        };
    k.defaults = {
        axis: 'xy',
        duration: parseFloat(d.fn.jquery) >= 1.3 ? 0 : 1
    };
    k.window = function (a) {
        return d(window)._scrollable()
    };
    d.fn._scrollable = function () {
        return this.map(function () {
            var a = this,
                i = !a.nodeName || d.inArray(a.nodeName.toLowerCase(), ['iframe', '#document', 'html', 'body']) != -1;
            if (!i) return a;
            var e = (a.contentWindow || a).document || a.ownerDocument || a;
            return d.browser.safari || e.compatMode == 'BackCompat' ? e.body : e.documentElement
        })
    };
    d.fn.scrollTo = function (n, j, b) {
        if (typeof j == 'object') {
            b = j;
            j = 0
        }
        if (typeof b == 'function') b = {
            onAfter: b
        };
        if (n == 'max') n = 9e9;
        b = d.extend({}, k.defaults, b);
        j = j || b.speed || b.duration;
        b.queue = b.queue && b.axis.length > 1;
        if (b.queue) j /= 2;
        b.offset = p(b.offset);
        b.over = p(b.over);
        return this._scrollable().each(function () {
            var q = this,
                r = d(q),
                f = n,
                s, g = {},
                u = r.is('html,body');
            switch (typeof f) {
            case 'number':
            case 'string':
                if (/^([+-]=)?\d+(\.\d+)?(px|%)?$/.test(f)) {
                    f = p(f);
                    break
                }
                f = d(f, this);
            case 'object':
                if (f.is || f.style) s = (f = d(f)).offset()
            }
            d.each(b.axis.split(''), function (a, i) {
                var e = i == 'x' ? 'Left' : 'Top',
                    h = e.toLowerCase(),
                    c = 'scroll' + e,
                    l = q[c],
                    m = k.max(q, i);
                if (s) {
                    g[c] = s[h] + (u ? 0 : l - r.offset()[h]);
                    if (b.margin) {
                        g[c] -= parseInt(f.css('margin' + e)) || 0;
                        g[c] -= parseInt(f.css('border' + e + 'Width')) || 0
                    }
                    g[c] += b.offset[h] || 0;
                    if (b.over[h]) g[c] += f[i == 'x' ? 'width' : 'height']() * b.over[h]
                } else {
                    var o = f[h];
                    g[c] = o.slice && o.slice(-1) == '%' ? parseFloat(o) / 100 * m : o
                }
                if (/^\d+$/.test(g[c])) g[c] = g[c] <= 0 ? 0 : Math.min(g[c], m);
                if (!a && b.queue) {
                    if (l != g[c]) t(b.onAfterFirst);
                    delete g[c]
                }
            });
            t(b.onAfter);

            function t(a) {
                r.animate(g, j, b.easing, a &&
                function () {
                    a.call(this, n, b)
                })
            }
        }).end()
    };
    k.max = function (a, i) {
        var e = i == 'x' ? 'Width' : 'Height',
            h = 'scroll' + e;
        if (!d(a).is('html,body')) return a[h] - d(a)[e.toLowerCase()]();
        var c = 'client' + e,
            l = a.ownerDocument.documentElement,
            m = a.ownerDocument.body;
        return Math.max(l[h], m[h]) - Math.min(l[c], m[c])
    };

    function p(a) {
        return typeof a == 'object' ? a : {
            top: a,
            left: a
        }
    }
})(jQuery);
