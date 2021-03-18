$("#Mtable").DataTable({
    "oLanguage": {
    "sEmptyTable": "ไม่มีข้อมูลในตาราง",
    "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
    "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
    "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
    "sInfoPostFix": "",
    "sInfoThousands": ",",
    "sLengthMenu": "แสดง _MENU_ แถว",
    "sLoadingRecords": "กำลังโหลดข้อมูล...",
    "sProcessing": "กำลังดำเนินการ...",
    "sSearch": "ค้นหา: ",
    "sZeroRecords": "ไม่พบข้อมูล",
    "oPaginate": {
        "sFirst": "หน้าแรก",
        "sPrevious": "ก่อนหน้า",
        "sNext": "ถัดไป",
        "sLast": "หน้าสุดท้าย"
    },
    "oAria": {
        "sSortAscending": ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
        "sSortDescending": ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย"
    }
}
});

function checkuser()
{
var user = document.getElementById('user').value;
var numuser = user.length;
document.getElementById("checku").innerHTML = "";
if(!user.match(/^([a-z])+$/i))
{
    //alert("กรอกได้เฉพาะตัวอักษรภาษาอังกฤษเท่านั้น");
    document.getElementById('user').value = "";
    document.getElementById('checku').style.color = "red";
    document.getElementById("checku").innerHTML = "กรอกได้เฉพาะตัวอักษรภาษาอังกฤษเท่านั้น";
}
else if(numuser < 4)
{
    document.getElementById("checku").innerHTML = "";
    alert("กรุณากรอกข้อมูลภาษาอังกฤษน้อยกว่า 4 ตัว");
}
else if(numuser >= 10)
{
    document.getElementById("checku").innerHTML = "";
    alert("กรุณากรอกข้อมูลภาษาอังกฤษน้อยกว่า 10 ตัว");
    document.getElementById('user').value = "";
}
}

function checkpass()
{
var pass = document.getElementById('pass').value;
var numpass = pass.length;
if(!pass.match(/^([a-z0-9])+$/i))
{
    //alert("กรอกได้เฉพาะตัวอักษรภาษาอังกฤษเท่านั้น");
    document.getElementById('pass').value = "";
    document.getElementById('checkp').style.color = "red";
    document.getElementById("checkp").innerHTML = "กรอกได้เฉพาะตัวอักษรภาษาอังกฤษเท่านั้น";
}
else if(numpass > 8)
{
    document.getElementById("checkp").innerHTML = "";
    alert("กรุณากรอกข้อมูลภาษาอังกฤษน้อยกว่า 10 ตัว");
    document.getElementById('pass').value = "";
}
}

function checkfname() // Check First Name in Create Member
{
var fname = document.getElementById('fname').value; // Get Value By id = fname in Table
var numfn = fname.length;  // Length's fname To Check Length in Requirement in non-functional requirement
document.getElementById('fn').innerHTML = ""; //Clear Text Warning Error
// Check First Name Thai
if(!fname.match(/^([ก-๏\s])+$/i))
{
    document.getElementById('fname').value = ""; // Clear Input Text
    document.getElementById('fn').style.color = "red"; // Warning Style
    document.getElementById("fn").innerHTML = "กรอกได้เฉพาะตัวอักษรภาษาไทยเท่านั้น"; // Warning Text
}
else if(numfn < 2){ // Check Length min
    document.getElementById('fn').style.color = "red" // Warning Style
    document.getElementById('fn').innerHTML = "กรุณากรอกข้อมูลมากกว่า 2 ตัวอักษร" // Warning Text
    document.getElementById('fname').innerHTML = "" // Clear Input Text

}
else if(numfn > 25) // Check Length max
{
    document.getElementById('fn').style.color = "red" // Warning Style
    document.getElementById('fn').innerHTML = "กรุณากรอกข้อมูลน้อยกว่า 25 ตัวอักษร" // Warning Text
    document.getElementById('fname').innerHTML = "" // Clear Input Text
}
}

function checklname()
{
var lname = document.getElementById('lname').value; // Get Value By id = lname in Table
var numln = lname.length;  // Length's lname To Check Length in Requirement in non-functional requirement
document.getElementById('ln').innerHTML = ""; //Clear Text Warning Error
    // Check Last Name Thai
    if(!lname.match(/^([ก-๏\s])+$/i))
{
    document.getElementById('lname').value = ""; // Clear Input Text
    document.getElementById('ln').style.color = "red"; // Warning Style
    document.getElementById("ln").innerHTML = "กรอกได้เฉพาะตัวอักษรภาษาไทยเท่านั้น"; // Warning Text
}
else if(numln < 2){
    document.getElementById('ln').style.color = "red" // Warning Style
    document.getElementById('ln').innerHTML = "กรุณากรอกข้อมูลมากกว่า 2 ตัวอักษร" // Warning Text
    document.getElementById('lname').innerHTML = "" // Clear Input Text

}
else if(numln > 25)
{
    document.getElementById('ln').style.color = "red" // Warning Style
    document.getElementById('ln').innerHTML = "กรุณากรอกข้อมูลน้อยกว่า 25 ตัวอักษร" // Warning Text
    document.getElementById('lname').innerHTML = "" // Clear Input Text
}
}

function checktel()
{
var tel = document.getElementById('tel').value; // Get Value By id = lname in Table
var numtel = tel.length;  // Length's lname To Check Length in Requirement in non-functional requirement
document.getElementById('errortel').innerHTML = ""; //Clear Text Warning Error
    // Check Last Name Thai
    if(!tel.match(/^0[689]{1}[0-9]{8}$/i))
{
    document.getElementById('tel').value = ""; // Clear Input Text
    document.getElementById('errortel').style.color = "red"; // Warning Style
    document.getElementById("errortel").innerHTML = "กรอกได้เฉพาะตัวเลขเท่านั้น"; // Warning Text
}
else if(numtel > 10)
{
    document.getElementById('errortel').style.color = "red" // Warning Style
    document.getElementById('errortel').innerHTML = "กรุณากรอกข้อมูลน้อยกว่า 10 ตัวอักษร" // Warning Text
    document.getElementById('tel').innerHTML = "" // Clear Input Text
}
}