"use strict"

function confirmDelete(instructorId) {
    var courseName = document.getElementById('className').value;
    if (confirm("Are you sure yo want to delete " + courseName + " class?")) {

        classDelete(instructorId);
    }
}

function classDelete(instructorId) {
    // alert(instructorId);
    var courseName = document.getElementById('className').value;
    var loader = document.getElementById('dd');
    var allObj = {
        instructor_id: instructorId,
        courseName: courseName
    };
    // alert(instructorId);
    var allInfo = JSON.stringify(allObj);
    let xttps = new XMLHttpRequest();
    xttps.open('POST', '../../php/instructor_php/classSettingCheck.php', true);
    xttps.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xttps.send('checkInfo=' + allInfo);
    xttps.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            window.location.replace("../../view/instructor_view/dashboard.php");
            // window.
        }

        //         //alert(this.responseText);
        //         // var courseId = this.responseText;
        //         // var myObj = {
        //         //     instructor_id: instructorId,
        //         //     courseId: courseId
        //         // };

        //         // var info = JSON.stringify(myObj);

        //         // let xttp = new XMLHttpRequest();
        //         // xttp.open('GET', '../../php/instructor_php/classSettingCheck.php?check=ON', true);
        //         // xttp.send();
        //         // xttp.onreadystatechange = function() {
        //         //     if (this.readyState == 4 && this.status == 200) {

        //         //         // alert(this.responseText);

        //         //     }

        //         //     // document.getElementById("deleteMsg").
        //         //     //  
        //         //     // return true;

        //         // }
        //         //  }
        //     }
    }


}