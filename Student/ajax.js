    $(document).ready(function() {
      $("#semester").change(function() {
        var sem_id = $(this).val();
        if(sem_id != "") {
          console.log(sem_id);
          $.ajax({
           
            url:"getCourse.php",
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
           
            url:"getClass.php",
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
           
            url:"getBatch.php",
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

       $("#batch").change(function() {
        var batch_id = $(this).val();
        var class_id = $("#class").val();
        var sem_id = $("#semester").val();
        var course_id = $("#course").val();
        if(batch_id != "") {
         
          $.ajax({
           
            url:"getAssignment.php",
            data:{c_id:course_id,s_id:sem_id,class_id:class_id,b_id:batch_id},
            type:'POST',
            success:function(response) {
              var resp = $.trim(response);
              console.log(resp);
              $("#assignment").html(resp);
            }
          });
        } else {
          $("#assignment").html("<option value=''>------- Select Assignment--------</option>");
        }
      });

       $("#assignment").change(function() {
        var assignment_no = $(this).val();
        var class_id = $("#class").val();
        var sem_id = $("#semester").val();
        var course_id = $("#course").val();
        var batch_id = $("#batch").val();
        if(assignment_no != "") {
         
          $.ajax({
           
            url:"getQuestion.php",
            data:{c_id:course_id,s_id:sem_id,class_id:class_id,b_id:batch_id,a_id:assignment_no},
            type:'POST',
            success:function(response) {
              var resp = $.trim(response);
              console.log(resp);
              $("#question").html(resp);
            }
          });
        } else {
          // $("#assignment").html("<option value=''>------- Select Assignment--------</option>");
        }
      });

       $("#assignment").change(function() {
        var assignment_no = $(this).val();
        var class_id = $("#class").val();
        var sem_id = $("#semester").val();
        var course_id = $("#course").val();
        var batch_id = $("#batch").val();
        if(assignment_no != "") {
         
          $.ajax({
           
            url:"getDescription.php",
            data:{c_id:course_id,s_id:sem_id,class_id:class_id,b_id:batch_id,a_id:assignment_no},
            type:'POST',
            success:function(response) {
              var resp = $.trim(response);
              console.log(resp);
              $("#description").html(resp);
            }
          });
        } else {
          // $("#assignment").html("<option value=''>------- Select Assignment--------</option>");
        }
      });


    });