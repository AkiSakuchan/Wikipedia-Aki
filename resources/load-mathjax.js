window.MathJax=
{
    tex:{
        inlineMath: [['$', '$']],
        displayMath: [
            ['$$', '$$'],
            ['\\[', '\\]']
        ],
        processEnvironments: false,
        processRefs: false,
        tags: 'none',
        maxMacros: 1000,
        maxBuffer: 5*1024,
        macros: {
            R:      '\\mathbb{R}',
            Cpx:    '\\mathbb{C}',
            Z:      '\\mathbb{Z}',
            H:      '\\mathbb{H}',
            Hom:    '\\operatorname{Hom}',
            GL:     '\\operatorname{GL}',
            SL:     '\\operatorname{SL}',
            O:      '\\operatorname{O}',
            SO:     '\\operatorname{SO}',
            U:      '\\operatorname{U}',
            SU:     '\\operatorname{SU}',
            Sp:     '\\operatorname{Sp}',
            gl:     '\\mathfrak{gl}',
            sl:     '\\mathfrak{sl}',
            o:      '\\mathfrak{o}',
            so:     '\\mathfrak{so}',
            u:      '\\mathfrak{u}',
            su:     '\\mathfrak{su}',
            sp:     '\\mathfrak{sp}',
            Pic:    '\\operatorname{Pic}',
            NS:     '\\operatorname{NS}'
        }
    },
    options:{
        enableMenu: false
    }
};

(function ()
{
    let script=document.createElement('script');
    script.src = window.location.origin + "/extensions/ConvertLaTeX/resources/mathjax/tex-chtml.js";
    script.async = true;
    document.head.appendChild(script);
})();