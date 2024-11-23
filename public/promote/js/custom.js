var isOriginalColor = true; // ตัวแปรตรวจสอบสถานะของสี

  function toggleBackgroundColor() {
    var section = document.getElementById("menuSection");

    if (isOriginalColor) {
      section.style.backgroundColor = "#505050"; // เปลี่ยนเป็นสีที่ต้องการ
    } else {
      section.style.backgroundColor = "#222222"; // กลับไปเป็นสีเดิม
    }

    isOriginalColor = !isOriginalColor; // สลับสถานะสี
  }