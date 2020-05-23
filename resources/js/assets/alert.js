deletePost =
    function deletePost(e) {
        'use strict';
        if (confirm('本当に削除していいですか?')) {
            document.getElementById('delete_' + e.dataset.id).submit();
        }
    };

allDel =
    function allDel() {
        var check = document.getElementsByClassName("delbox-wrapper__block-checkbox");
        var array = Array.prototype.slice.call(check);

        for (let i = 0; i < array.length; i += 1) {
            if (array[i].checked === true) {
                if (confirm('本当に削除していいですか?')) {
                    submit();
                } else {
                    return false;
                }
            }
        }




        // if (check == null) {
        //     alert("選択されていません");
        //     console.log("cche".checked);
        // }
        // if (check.checked == false) {
        //     alert('選択されていません');
        // }
        // if (check.checked == true) {
        //     if (confirm('本当に削除していいですか?')) {
        //         submit();
        //     } else {
        //         return false;
        //     }
        // }
    };
