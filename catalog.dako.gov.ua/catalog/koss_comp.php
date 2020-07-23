<head>
<!-- CSS file -->

<link rel="stylesheet" href="EasyAutocomplete/easy-autocomplete.min.css"> 

<!-- Additional CSS Themes file - not required-->
<link rel="stylesheet" href="EasyAutocomplete/easy-autocomplete.themes.min.css"> 


<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="EasyAutocomplete/jquery.easy-autocomplete.min.js"></script> 


</head>




<input id="match" />

<script>
var options = {

	list: {
		match: {
			enabled: true
			}
		},

	url: function(phrase) {
	    return "autocomplete.php";
	  },

  getValue: function(element) {
    return element.name;
  },

  ajaxSettings: {
    dataType: "json",
    method: "POST",
    data: {
      dataType: "json"
    }
  },

  preparePostData: function(data) {
    data.phrase = $("#match").val();
    return data;
  },

  requestDelay: 400
};

$("#match").easyAutocomplete(options);
</script>