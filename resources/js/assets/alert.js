window.deletePost =
  function deletePost(e) {
    'use strict';
    if (confirm('本当に削除していいですか?')) {
      document.getElementById('delete_' + e.dataset.id).submit();
    }
  };

window.allDel =
  function allDel() {
    let check = document.getElementById("cbox")

    if (check == null) {
      alert("選択されていません");
    }
    if (check !== null && check.checked == false) {
      alert('選択されていません');
    }
    if (check !== null && check.checked == true) {
      if (confirm('本当に削除していいですか?')) {
        submit();
      } else {
        return false;
      }
    }
  };