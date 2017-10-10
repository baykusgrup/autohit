<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link href="<?php echo base_url() ?>assets/CodeEditor/js/splitter/css/jquery.splitter.css" rel="stylesheet">
    <script src="<?php echo base_url() ?>assets/CodeEditor/js/jquery/jquery.2.0.2.min.js"></script>
    <script src="<?php echo base_url() ?>assets/CodeEditor/js/splitter/js/splitter.js"></script>
    <script src="<?php echo base_url() ?>assets/CodeEditor/js/codemirror-3.22/lib/codemirror.js"></script>
    <script src="<?php echo base_url() ?>assets/CodeEditor/js/codemirror-3.22/mode/xml/xml.js"></script>
    <script src="<?php echo base_url() ?>assets/CodeEditor/js/codemirror-3.22/mode/javascript/javascript.js"></script>
    <script src="<?php echo base_url() ?>assets/CodeEditor/js/codemirror-3.22/mode/css/css.js"></script>
    <script src="<?php echo base_url() ?>assets/CodeEditor/js/codemirror-3.22/mode/htmlmixed/htmlmixed.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/CodeEditor/js/codemirror-3.22/lib/codemirror.css">
    <script src="<?php echo base_url() ?>assets/CodeEditor/js/codemirror-3.22/addon/selection/active-line.js"></script>
    <script src="<?php echo base_url() ?>assets/CodeEditor/js/codemirror-3.22/addon/edit/matchbrackets.js"></script>
    <script src="<?php echo base_url() ?>assets/CodeEditor/js/codemirror-3.22/addon/comment/continuecomment.js"></script>
    <script src="<?php echo base_url() ?>assets/CodeEditor/js/codemirror-3.22/addon/comment/comment.js"></script>
    <script src="<?php echo base_url() ?>assets/CodeEditor/js/codemirror-3.22/addon/edit/closetag.js"></script>
    <script src="<?php echo base_url() ?>assets/CodeEditor/js/codemirror-3.22/addon/edit/closebrackets.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/CodeEditor/css/kod.css">
    <script src="<?php echo base_url() ?>assets/CodeEditor/js/emmet/emmet.min.js"></script>
    <script src="<?php echo base_url() ?>assets/CodeEditor/js/nprogress/nprogress.js"></script>
    <link href="<?php echo base_url() ?>assets/CodeEditor/js/nprogress/nprogress.css" rel="stylesheet"/>

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/CodeEditor/css/monokai.css">
    <script>
        jQuery(function ($) {
            NProgress.done(true);
        });
    </script>

</head>
<body style="background:#ddd">
<form id="codeform" method="post">
    <div id="header">
        <a style="color: wheat" href="<?php echo base_url() ?>"><h1 class="logoa"><span>Nearly</span>Web</h1></a>
    </div>
    <div id="widget">
        <div id="foo">
            <div id="codecss">
                <div class="codetypelabel" id="codetypelabelcss">CSS</div>
                <textarea id="codeeditorcss" name="codeeditorcss"></textarea>
            </div>
            <div id="codejs">
                <div class="codetypelabel" id="codetypelabeljs">Java Script</div>
                <textarea id="codeeditorjs" name="codeeditorjs"></textarea>
            </div>
        </div>
        <div id="bar">
            <div id="codehtml">
                <div class="codetypelabel" id="codetypelabelhtml">HTML</div>
                <textarea id="codeeditorhtml" name="codeeditorhtml"></textarea>
            </div>
            <div id="codepreview">

                <div id="previewmask"></div>
                <div id="previewoutputsize">Output: <span id="outputsizenumber"></span></div>
                <iframe id="preview" sandbox="allow-scripts allow-same-origin"></iframe>
            </div>
        </div>
    </div>
    <input type="hidden" name="codetitle" value="-#-kodtest">
</form>
<script>
    var tinyurl = '';
    var revision = '';
</script>

<script src="<?php echo base_url() ?>assets/CodeEditor/js/kod.js"></script>
<script>
    $(function () {
        codeeditorhtml.setOption("theme", "monokai");
        codeeditorcss.setOption("theme", "monokai");
        codeeditorjs.setOption("theme", "monokai");
    });
</script>
</body>

</html>
