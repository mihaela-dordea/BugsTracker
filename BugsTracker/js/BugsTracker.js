
function BugTracker(){
    this.login= function(){
       console.debug("Mihaela");
       
       require(["dijit/registry"], function(registry){
        var username=registry.byId('txt1').get('value');
        var pwd=registry.byId('txt2').get('value');
        var comp_name=registry.byId('txt3').get('value');
        if (username.length >0 && pwd.length >0 &&comp_name.length>0 && typeof(registry.byId('txt1'))!='undefined'
            && typeof(registry.byId('txt1'))!='undefined' && typeof(comp_name)!='undefined') {
            $.getJSON( "login.php?username="+username+"&password="+pwd+"&comp_name="+comp_name, function( data ) {
           
           if (data.login==0) {
            alert('Username sau parola gresita');
           }else{
            window.location='grid.php';
            //window.location='store_all_bugs.php';
           }

          });
        }
       });
    }
    
  
}
 var bugstracker=new BugTracker();
