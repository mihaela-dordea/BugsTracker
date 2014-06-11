 <html>
<head>
 <link rel="stylesheet" href="dojo/dijit/themes/claro/claro.css">
	
	<script>{literal}dojoConfig = {async: true, parseOnLoad: true}{/literal}</script>
	<script src='dojo/dojo/dojo.js'></script>
        <script> 
            require(["dojo/parser", "dijit/form/ComboBox"]); 
        </script>
	<script src='js/jquery-1.11.0.js'></script>
   <link rel="stylesheet" href="css/claroGrid.css" />
    <link rel="stylesheet" href="css/claro.css" />
    <link rel="stylesheet" href="css/dojo.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/demo.css" />
  <script src="{$js_filename}"></script>
</head>
<body class="claro" style="background-color:#ECECFF;">
	
	<div data-dojo-type="dijit/form/Form" id="myFormThree" data-dojo-id="myFormThree" encType="multipart/form-data" action="" method="">
	<button data-dojo-type="dijit/form/Button" onClick="window.location='add.php';return false">
        Add New Bug!
    </button>
	</div>
	<br><br>
	
   <div id="gridDiv" style="width: 100%; height: 200px;"></div>
{*<div id="gridDiv"></div>*}
</body>
</html>