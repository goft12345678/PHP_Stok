// เลือกตาราง
var table = document.getElementById("myTable");

// เลือกแถวใน tbody
var rows = table.getElementsByTagName("tbody")[0].rows;

// แปลง HTMLCollection เป็น array
var rowsArray = Array.from(rows);

// เรียงลำดับแถวตามข้อมูลในคอลัมน์ที่ 0 (รหัสสินค้า)
rowsArray.sort((a, b) => {
  var textA = a.cells[0].textContent.toUpperCase();
  var textB = b.cells[0].textContent.toUpperCase();
  return textA < textB ? -1 : textA > textB ? 1 : 0;
});

// เรียงลำดับแถวใหม่ในตาราง
for (var i = 0; i < rowsArray.length; i++) {
  table.getElementsByTagName("tbody")[0].appendChild(rowsArray[i]);
}

function resetData(id) {
  // ทำการส่งค่า id ไปยังหน้า resetData.php เพื่อทำการเริ่มใหม่ข้อมูล
  window.location.href = "resetData.php?id=" + id;
}

