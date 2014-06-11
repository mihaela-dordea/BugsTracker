<html>
    <head>
    <link rel="stylesheet" href="dojo/dijit/themes/claro/claro.css">
	
	<script>{literal}dojoConfig = {async: true, parseOnLoad: true}{/literal}</script>
	<script src='dojo/dojo/dojo.js'></script>
        <script> 
            require(["dojo/parser", "dijit/form/ComboBox"]); 
        </script>
	<script src='js/jquery-1.11.0.js'></script>
        <script src="{$js_filename}"></script>
    </head>        
<body class="claro" style="background-color:#ECECFF;">
{*<a href="insert.php">Inserare angajat</a><br>
<a href="vizualizare.php">Vizualizare angajati</a>
<br>
<select data-dojo-type="dijit/form/ComboBox" id="fruit" name="fruit" onchange="onFruitChange();">
    <option>Apples</option>
    <option selected>Oranges</option>
    <option>Pears</option>
</select>
*}
<div>
    <table>
    <tr>
	<td>
	    <label for="txt1">User Name</label>
	</td>
	<td>
	    <input type="text"  data-dojo-type="dijit/form/TextBox" name="txt1" id="txt1"  style="width: 120px;"/>
	</td>
    </tr>
    <tr>
    <td>
	<label for="txt2">Password</label>
    </td>
    <td>
	<input type="password"  data-dojo-type="dijit/form/TextBox" name="txt2" id="txt2" style="width: 120px;" />
    </td>
    </tr>
		<tr>
    <td>
	<label for="txt3">Company name</label>
    </td>
    <td>
	<input type="text"  data-dojo-type="dijit/form/TextBox" name="txt3" id="txt3" style="width: 120px;" />
    </td>
    </tr>
    </table>
    <button  type="button" data-dojo-type="dijit/form/Button" onclick="bugstracker.login();">Login</button>
</div>
</body>
</html>