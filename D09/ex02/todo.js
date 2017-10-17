var i = 0;

function disp(){
    var a = 0;
    var name;
    while (a < 500){
        if ((name = readCookie(a)) != null){
            var num = a;
            var list = document.getElementById('ft_list');
            var new_div = document.createElement('div');
            var text = document.createTextNode(name);
            new_div.appendChild(text);
            new_div.onclick = function(){
                if (confirm("Do you really want to delete it ?")){
                    this.parentElement.removeChild(this);
                    eraseCookie(num);
                }
            };
            list.insertBefore(new_div, list.firstChild);
        }
        a++;
    }
}

function eraseCookie(index){
    createCookie(index,"",-1);
}

function readCookie(index){
	var nameEQ = "todo"+index+"=";
	var ca = document.cookie.split(';');
	for(var ind=0;ind < ca.length;ind++) {
		var c = ca[ind];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

function createCookie(i, name, days){
    if (days){
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = "todo"+i+"="+name+expires+"; path=/";
}


function AddNew(id) {
    var num = i;
    var list = document.getElementById(id);
    var new_div = document.createElement('div');
    var name = prompt("Name :");
    if (name != null && name != ""){
        createCookie(i, name, 2);
        var text = document.createTextNode(name);
        new_div.appendChild(text);
        new_div.onclick = function(){
            if (confirm("Do you really want to delete it ?")){
                this.parentElement.removeChild(this);
                eraseCookie(num);
            }
        };
        list.insertBefore(new_div, list.firstChild);
        i++;
    }
}