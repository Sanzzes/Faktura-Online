<html>
    <!DOCTYPE  html PUBLIC "-//WC3//DTD XHTML 1.1//EN"
        "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script type="text/javascript" language="JavaScript" src="./src/js/jquery/jquery.js"></script>
        <script type="text/javascript" language="JavaScript" src="./src/js/jquery/jquery.form.js"></script>
        <script type="text/javascript" language="JavaScript" src="./src/js/jquery/jquery.validate.js"></script>
        <script type="text/javascript" language="JavaScript" src="./src/js/jquery/jquery-ui.js"></script>
        <script type="text/javascript" language="JavaScript" src="./src/js/jquery/jquery.blockUI.js"></script>
        <script type="text/javascript" language="JavaScript" src="./src/js/jquery/jquery.tools.min.js"></script>
        <script type="text/javascript" language="JavaScript" src="./src/js/jquery/jquery.nivo.slider.pack.js"></script>
        <script type="text/javascript" language="JavaScript" src="./src/js/jquery/jquery.selectbox-0.1.2.min.js"></script>
        <script type="text/javascript" language="JavaScript" src="./src/js/jquery/jquery.dataTables.js"></script>
        <script type="text/javascript" language="JavaScript" src="./src/js/jquery/jquery.jqtransform.js"></script>
        <script type="text/javascript" language="JavaScript" src="./src/js/TableTools.js"></script>
        <script type="text/javascript" language="JavaScript" src="./src/js/ZeroClipboard.js"></script>
        <script type="text/javascript" language="JavaScript" src="./src/js/menu.js"></script>
        <script type="text/javascript" language="JavaScript" src="./src/js/table.js"></script>
        <script type="text/javascript" language="JavaScript" src="./src/js/clients.js"></script>
        <script type="text/javascript" language="JavaScript" src="./src/js/onLoad.js"></script>
        <script type="text/javascript" language="JavaScript" src="./src/js/admin.js"></script>
        <script type="text/javascript" language="JavaScript" src="./src/js/projects.js"></script>
        <script type="text/javascript" language="JavaScript" src="./src/js/personal.js"></script>
        <script type="text/javascript" language="JavaScript" src="./src/js/holiday.js"></script>
        <script type="text/javascript" language="JavaScript" src="./src/js/workflow.js"></script>
        <link rel="stylesheet" type="text/css" href="./src/css/jq.dataTable.css">
        <link rel="stylesheet" type="text/css" href="./src/css/print.css">
        <link rel="stylesheet" type="text/css" href="./src/css/nivo-slider.css">
        <link rel="stylesheet" type="text/css" href="./src/css/jquery.selectbox.css">
        <link rel="stylesheet" type="text/css" href="./src/css/menu.css">
        <link rel="stylesheet" type="text/css" href="./src/css/style.css">
        <link rel="stylesheet" type="text/css" href="./src/css/TableTools.css">
        <link rel="stylesheet" type="text/css" href="./src/css/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="./src/css/jqtransform.css">
        <link rel="shortcut icon" type="image/x-icon" href="icon.ico">
    </head>
    <body onLoad="preLoadingOff()" class="ex_highlight_row">
        <div id="wrapper">
            <div id="noprint"> 
                <div class="head">
                    <ul id="navigation">
                        {if $smarty.session.user_rights > 1}
                        <li class="clients"><a href="javascript:window.location='?pageID=1'" id="m1"><span>Kunden</span></a></li>
                        <li class="projects"><a href="javascript:window.location='?pageID=2'" id="m2"><span>Projekte</span></a></li>
                        <li class="personal"><a href="javascript:window.location='?pageID=3'" id="m3"><span>Personal</span></a></li>            
                        <li class="travelcosts"><a href="javascript:window.location='?pageID=4'" id="m4"><span>Reisekosten</span></a></li>
                        <li class="factura"><a href="javascript:window.location='?pageID=5'" id="m5"><span>Faktura</span></a></li>
                        {/if}
                        <li class="holidays"><a href="javascript:window.location='?pageID=8'" id="m8"><span>Urlaubsanträge</span></a></li>
                        <li class="timecatch"><a href="javascript:window.location='?pageID=6'" id="m6"><span>Zeiterfassung</span></a></li>
                        <li class="workflow"><a href="javascript:window.location='?pageID=7'" id="m7"><span>Tätigkeiten</span></a></li>
                    </ul>
                </div>
                <div class="clearboth"></div>
            </div>
            <div class="maincontent">