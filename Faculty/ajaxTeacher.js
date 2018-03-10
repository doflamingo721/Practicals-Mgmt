    $(document).ready(function() {
      $("#semester").change(function() {
        var sem_id = $(this).val();
        if(sem_id != "") {
          console.log(sem_id);
          $.ajax({
           
            url:"getCourseTeacher.php",
            data:{s_id:sem_id},
            type:'POST',
            success:function(response) {
              console.log("success");
              var resp = $.trim(response);
              $("#course").html(resp);
            }
          });
        } else {
          $("#course").html("<option value=''>------- Select course--------</option>");
        }
      });

      $("#course").change(function() {
        var course_id = $(this).val();
        var sem_id = $("#semester").val();
        if(course_id != "") {
          console.log(course_id);
          console.log(sem_id);
          $.ajax({
           
            url:"getClassTeacher.php",
            data:{c_id:course_id,s_id:sem_id},
            type:'POST',
            success:function(response) {
              var resp = $.trim(response);
              console.log(resp);
              $("#class").html(resp);
            }
          });
        } else {
          $("#class").html("<option value=''>------- Select class--------</option>");
        }
      });

      $("#class").change(function() {
        var class_id = $(this).val();
        var sem_id = $("#semester").val();
        var course_id = $("#course").val();
        if(class_id != "") {
         
          $.ajax({
           
            url:"getBatchTeacher.php",
            data:{c_id:course_id,s_id:sem_id,class_id:class_id},
            type:'POST',
            success:function(response) {
              var resp = $.trim(response);
              console.log(resp);
              $("#batch").html(resp);
            }
          });
        } else {
          $("#batch").html("<option value=''>------- Select Batch--------</option>");
        }
      });

    });