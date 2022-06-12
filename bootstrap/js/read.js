//make call to PHP sexy
var rank = document.getElementById("rank").value;
var firstname = document.getElementById("firstname").value;
var lastname = document.getElementById("lastname").value;
var username = document.getElementById("username").value;
var yourEmail = document.getElementById("yourEmail").value;
var password = document.getElementById("password").value;

// Returns successful data submission message when the entered information is stored in database, stay gangsta.
var dataString = '&rank1' = rank +'&firstname1=' + firstname + '&lastname1' = lastname + '&username1' = username + '&yourEmail1=' + yourEmail + '&password1=' + password;
if (rank == '' || username == '' || rank == '' || firstname == '' || lastname == '' || yourEmail == '' || password == '') {
alert("Please Fill All Fields");
} else {
// AJAX code to submit form.  Error?
$.ajax({
type: "POST",
url: "post.php",
data: dataString,
cache: false,
success: function(html) {
alert(html);

//check this below.........
}
});
}
return false;
}