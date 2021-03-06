 <html>
<head>
 <link rel="stylesheet" href="dojo/dijit/themes/claro/claro.css">
	
	<script>{literal}dojoConfig = {async: true, parseOnLoad: true}{/literal}</script>
	<script src='dojo/dojo/dojo.js'></script>
        <script> 
            require(["dojo/parser", "dijit/form/Button", "dijit/form/Form", "dijit/form/ValidationTextBox"]); 			
        </script>
		<script type="dojo/method" data-dojo-event="validate">{literal}
       return dojo.query('INPUT[name=order]', 'myFormThree').filter(function(n){return n.checked;}).length > 0 &&
       dijit.form.Form.prototype.validate.apply(this, arguments);{/literal}
    </script>
	<script>{literal}
		function updateStatus(newStatus){
			window.location	 = 'update_status.php?id={/literal}{$id}{literal}&status='+newStatus;
			}
       {/literal}
    </script>
    <script type="dojo/method" data-dojo-event="onSubmit">{literal}
        require(["dojo/dom"], function(dom){
            var f = dojo.byId("myFormThree");
            var s = "";
            for(var i = 0; i < f.elements.length; i++){
                var elem = f.elements[i];
                if(elem.name == "button"){ continue; }
                if(elem.type == "radio" && !elem.checked){ continue; }
                s += elem.name + ": " + elem.value + "\n";
            }
            alert("Unvalidated data that would be submitted:\n" + s);
        });{/literal}
        return false;
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
   
<a href="grid.php">View all bugs</a><br><br>   
   
<div data-dojo-type="dijit/form/Form" id="myFormThree" data-dojo-id="myFormThree" encType="multipart/form-data" action="add_bug.php" method="">
   <table style="border: 1px solid #9f9f9f;" cellspacing="10">
        <tr>
            <td>
                <label for="name">Subject:</label>
            </td>
            <td>
                <input type="text" name="subject" required="true" data-dojo-type="dijit/form/ValidationTextBox" value="{$subject}" readonly="readonly"/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="name">Description:</label>
            </td>
            <td>
                <input type="text" name="description" required="true" data-dojo-type="dijit/form/ValidationTextBox" value="{$description}" readonly="readonly"/>
            </td>
        </tr>
		<tr>
            <td>
                <label for="name">Status:</label>
            </td>
            <td>
                <input type="text" name="description" required="true" data-dojo-type="dijit/form/ValidationTextBox" value="{$format_status}" readonly="readonly"/>
            </td>
        </tr>
    </table>
	
	{if $status == 2}
	<button data-dojo-type="dijit/form/Button" onClick="updateStatus(3);return false">
        Start working!
    </button>
	{/if}
	{if $status == 3}
	<button data-dojo-type="dijit/form/Button" onClick="updateStatus(4);return false">
        Resolve!
    </button>
	{/if}
	{if $status == 4}
	<button data-dojo-type="dijit/form/Button" onClick="updateStatus(5);return false">
        Close!
    </button>
	{/if}
	{if $status == 4}
	<button data-dojo-type="dijit/form/Button" onClick="updateStatus(2);return false">
        Reopen!
    </button>
	{/if}   
</div>
</body>
</html>