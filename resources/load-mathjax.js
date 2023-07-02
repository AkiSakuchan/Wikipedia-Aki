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
        maxBuffer: 5*1024
    },
    options:{
        enableMenu: false
    }
};

(function ()
{
    let script=document.createElement('script');
    script.src = '/extensions/ConvertLaTeX/resources/mathjax/tex-chtml.js';
    script.async = true;
    document.body.appendChild(script);
})();