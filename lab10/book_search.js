window.onload = function() {
    $("b_xml").onclick=function(){
      //construct a Prototype Ajax.request object
      var radio = $$("input");
      var value = getCheckedRadio(radio);
      new Ajax.Request("books.php", {
        method: "get",
        parameters: {category: value},
        onSuccess: showBooks_XML,
        onFailure: ajaxFailed,
        onException: ajaxFailed
      });
    }

    $("b_json").onclick=function(){
    	    //construct a Prototype Ajax.request object
          var radio = $$("input");
          var value = getCheckedRadio(radio);
          new Ajax.Request("books_json.php", {
            method: "get",
            parameters: {category: value},
            onSuccess: showBooks_JSON,
            onFailure: ajaxFailed,
            onException: ajaxFailed
          });
    }
};

function getCheckedRadio(radio_button){
	for (var i = 0; i < radio_button.length; i++) {
    if(radio_button[i].checked){
			return radio_button[i].value;
		}
	}
	return undefined;
}

function showBooks_XML(ajax) {
	alert(ajax.responseText);

  var title, author, year, category, li;
  var ul = $("books");
  ul.innerHTML = "";

  var data = ajax.responseXML.getElementsByTagName("book");
  for(var i = 0 ; i < data.length ; i++){

    title = data[i].getElementsByTagName("title")[0].firstChild.nodeValue;
    author = data[i].getElementsByTagName("author")[0].firstChild.nodeValue;
    year = data[i].getElementsByTagName("year")[0].firstChild.nodeValue;

    li = document.createElement("li");
    li.innerHTML=title + ', by ' + author + ' (' + year + ')';
    ul.appendChild(li);

  }
}

function showBooks_JSON(ajax) {
	alert(ajax.responseText);
  var li, title, author, year;
  var ul = $("books");
  ul.innerHTML = "";


  var data = JSON.parse(ajax.responseText);

  for (var i = 0; i < data.books.length; i++) {
    li = document.createElement("li");
    title = data.books[i].title;
    author = data.books[i].author;
    year = data.books[i].year;
    li.innerHTML = title + ', by ' + author + ' (' + year + ')';
    $("books").appendChild(li);
  }
}

function ajaxFailed(ajax, exception) {
	var errorMessage = "Error making Ajax request:\n\n";
	if (exception) {
		errorMessage += "Exception: " + exception.message;
	} else {
		errorMessage += "Server status:\n" + ajax.status + " " + ajax.statusText +
		                "\n\nServer response text:\n" + ajax.responseText;
	}
	alert(errorMessage);
}
