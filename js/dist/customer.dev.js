"use strict";

$('#Ctable').dataTable({
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

function checkname() {
  var name = document.getElementById('name').value; // Get Value By id = fname in Table

  var numn = name.length; // Length's fname To Check Length in Requirement in non-functional requirement

  document.getElementById('n').innerHTML = ""; //Clear Text Warning Error
  // Check First Name Thai

  if (!name.match(/^([ก-๏\s])+$/i)) {
    document.getElementById('name').value = ""; // Clear Input Text

    document.getElementById('n').style.color = "red"; // Warning Style

    document.getElementById("n").innerHTML = "กรอกได้เฉพาะตัวอักษรภาษาไทยเท่านั้น"; // Warning Text
  } else if (numn < 2) {
    // Check Length min
    document.getElementById('n').style.color = "red"; // Warning Style

    document.getElementById('n').innerHTML = "กรุณากรอกข้อมูลมากกว่า 2 ตัวอักษร"; // Warning Text

    document.getElementById('name').innerHTML = ""; // Clear Input Text
  } else if (numn > 25) // Check Length max
    {
      document.getElementById('n').style.color = "red"; // Warning Style

      document.getElementById('n').innerHTML = "กรุณากรอกข้อมูลน้อยกว่า 25 ตัวอักษร"; // Warning Text

      document.getElementById('name').innerHTML = ""; // Clear Input Text
    }
}

function checktel() {
  var tel = document.getElementById('tel').value; // Get Value By id = lname in Table

  var numtel = tel.length; // Length's lname To Check Length in Requirement in non-functional requirement

  document.getElementById('errortel').innerHTML = ""; //Clear Text Warning Error
  // Check Last Name Thai

  if (!tel.match(/^0[689]{1}[0-9]{8}$/i)) {
    document.getElementById('tel').value = ""; // Clear Input Text

    document.getElementById('errortel').style.color = "red"; // Warning Style

    document.getElementById("errortel").innerHTML = "กรอกได้เฉพาะตัวเลขเท่านั้น"; // Warning Text
  } else if (numtel > 10) {
    document.getElementById('errortel').style.color = "red"; // Warning Style

    document.getElementById('errortel').innerHTML = "กรุณากรอกข้อมูลน้อยกว่า 10 ตัวอักษร"; // Warning Text

    document.getElementById('tel').innerHTML = ""; // Clear Input Text
  }
}