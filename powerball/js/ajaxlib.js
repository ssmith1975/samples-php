// Ajax LIBRARY

// Create XMLHTTPRequest instance
function createREQ() {
	try {
		req = new XMLHttpRequest(); /* eg Firefox */
	} catch (err1) {
		try {
			req = ActiveXObject("Msxml2.XMLHTTP"); /* Some versions of IE */
		} catch (err2) {
			try {
				req = ActiveXObject("Microsoft.XMLHTTP"); /* Some more versions of IE */
			} catch (err3) {
				req = false;
			}
		}		
	}
	
	return req;		
}



// HTTP GET Requests
function requestGET(url, query, req) {
	myRand = parseInt(Math.random()*999999999);
	req.open("GET", url+'?'+query+'&rand='+myRand,true);
	req.send(null);
	
}


// HTTP POST Requests
function requestPOST(url, query, req) {
	req.open("POST", url, true);
	req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	req.send(query);
}

// Callback Function
function doCallback(callback, item) {
	eval(callback + '(item)'); // item is the data from the response
	
}


// AJAX Interface
function doAjax(url, query, callback, reqtype, getxml) {
	//create the XMLHTTPRequest obbject instance
	var myreq = createREQ();
	
	myreq.onreadystatechange = function() {
		
		if(myreq.readyState == 4) {
			
				if (myreq.status ==200) {
					var item = myreq.responseText;
					
					if (getxml==1) {
						item = myreq.responseXML;	
					}
					
					
					
				}  else {
					switch(myreq.status) {
						case 301:
							error_msg = "Moved Permanently";
							break;
						case 304:
							error_msg = "Not Modified (page hasn't been modified)";
							break;	
						case 401:
							error_msg = "Unauthorized";
							break;															
						case 403:
							error_msg = "Forbidden";
							break;																			
						case 404:						
							error_msg = "File Not Found";
							break;						
						case 408:						
							error_msg = "Request Timeout";
							break;						
						case 500:						
							error_msg = "Internal Server Error";
							break;	
						case 503:						
							error_msg = "Service Unavailable";
							break;								
							
						default:
							error_msg = "Some kind of error occured!";			
					}
					
					item ='<p class="error">Error Code: '+ myreq.status+ ' &mdash; ' +error_msg +'</p>';
				}
				
				doCallback(callback, item);
				
		}
		
	}
	
	if (reqtype=='post') {
		requestPOST(url, query, myreq);	
	} else {
		requestGET(url, query, myreq);
	}
	
}
