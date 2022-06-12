$(document).ready(function(){
// code to get all records from table via select box
$("#employee").change(function() {
var member_id = $(this).find(":selected").val();
var dataString = 'empid='+ id;
$.ajax({
url: 'getEmployee.php',
dataType: "json",
data: dataString,
cache: false,
success: function(employeeData) {
if(employeeData) {
$("#heading").show();
$("#no_records").hide();
$("#emp_name").text(employeeData.firstname);
$("#emp_age").text(employeeData.employee_age);
$("#emp_salary").text(employeeData.employee_salary);
$("#records").show();
} else {
$("#heading").hide();
$("#records").hide();
$("#no_records").show();
}
}
});
})
});