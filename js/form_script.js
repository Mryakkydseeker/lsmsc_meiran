            // JavaScript Document
            //alert("Welcome to my world");
            var setURL;
            function echeck(str) {
            	var at="@";
            	var dot=".";
            	var lat=str.indexOf(at);
            	var lstr=str.length;
            	var ldot=str.indexOf(dot);
            	var pattern=/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|me|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
            	if (str.indexOf(at)==-1){
            		alert("Invalid E-mail ID");
            		return false;
            	}
            	if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
            		alert("Invalid E-mail ID");
            		return false;
            	}
            	if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
            		alert("Invalid E-mail ID");
            		return false;
            	}
            	if (str.indexOf(at,(lat+1))!=-1){
            		alert("Invalid E-mail ID");
            		return false;
            	}
            	if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
            		alert("Invalid E-mail ID");
            		return false;
            	}
            	if (str.indexOf(dot,(lat+2))==-1){
            		alert("Invalid E-mail ID");
            		return false;
            	}
            	if (str.indexOf(" ")!=-1){
            		alert("Invalid E-mail ID");
            		return false;
            	}
            	if(!pattern.test(str)){         
            		alert("Invalid E-mail ID");
            		return false;   
                }
            	return true;				
            }
            
            
            function frmValidate()
            {
            	
            	if(document.frmCtnt.examno.value=="" || document.frmCtnt.examno.value==null || document.frmCtnt.examno.value=="Enter Your Full Name")
            	{
            		alert("Please Enter your Exam_no");
            		document.frmCtnt.examno.focus();
            		return false;
            	}
                
                	
            	if(document.frmCtnt.term.value=="" || document.frmCtnt.term.value==null || document.frmCtnt.term.value==0)
            	{
            		alert("Examination Term must be selected");
            		document.frmCtnt.term.focus();
            		return false;
            	}
                
            	if(document.frmCtnt.classes.value=="" || document.frmCtnt.classes.value==null || document.frmCtnt.classes.value==0)
            	{
            		alert("Please Select your Class");
            		document.frmCtnt.classes.focus();
            		return false;
            	}
                
            	/*if (echeck(document.frmCtnt.email.value)==false){
            		document.frmCtnt.email.focus();
            		return false;
            	}*/
            
            	if(document.frmCtnt.arm.value=="" || document.frmCtnt.arm.value==null || document.frmCtnt.arm.value==0 )
            	{
            		alert("Select Your Class Arm");
            		document.frmCtnt.arm.focus();
            		return false;
            	}
                
          
               return( true );
            }//gender
            
          /*  
            function getFormReponseSubmit(getFormResponseDiv)
            {
            if(frmValidate()==true)
            {
            URL="?name="+document.frmCtnt.name.value+"&email="+document.frmCtnt.email.value+"&mobile="+document.frmCtnt.mobile.value+"&course_period="+document.frmCtnt.course_period.value+"&gender="+document.frmCtnt.gender.value+"&comment="+document.frmCtnt.comment.value;
            if (window.XMLHttpRequest){xmlhttp=new XMLHttpRequest();}else{xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
            xmlhttp.onreadystatechange=function(){if (xmlhttp.readyState==4 && xmlhttp.status==200){	
            	document.getElementById("getFormResponseDiv").innerHTML=xmlhttp.responseText;
            }else{
            	document.frmCtnt.name.value="";
            	document.frmCtnt.email.value="";
            	document.frmCtnt.mobile.value="";
            	document.frmCtnt.comment.value="";
            	document.getElementById("getFormResponseDiv").innerHTML="<br/>&nbsp;Waiting.........<br/>";
            
            }}
            xmlhttp.open("POST","http://localhost/training/send_contact.php"+URL,true);
            xmlhttp.send();
            }}*/
            //http://localhost/training/?name=Raheem+Yaqub&email=yaqub.adesola%40gmail.com&mobile=08074544422&course_period=weekdays&comment=Please+tell+us+your+expectation+on+this+programme.
