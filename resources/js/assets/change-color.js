if (document.URL.match(/item/)) {
  changeColor =
    window.onload = function changeColor() {

      var dayValue = document.getElementById('day');
      var day = dayValue.getAttribute('data-day');
      var dayStyle = document.getElementById("day");

      if (day == "賞味期限が過ぎました") {
        dayStyle.style.cssText = "color:#fff; background:#808080; padding:2px 5px 1px;";
      }
      if (day == "賞味期限は本日までです") {
        dayStyle.style.cssText = "color:#ee0028; font-weight: bold;";
      }
    };
}