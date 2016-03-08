    
<div class="col-md-12">
  <!-- Custom Tabs -->
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">View Profile</a></li>
      <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Edit Profile</a></li>
      <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Change Password</a></li>

      
    </ul>
    <div class="tab-content">
      
      <div class="tab-pane active" id="tab_1">
      <? foreach($results['studentsingle'] as $row) ?>
        <div class="singleTeacher">
          <div class="col-md-9">
            <h2 class="single_name"><? echo $row['name']; ?></h2>
            <table class="table table-striped table-bordered info_table">
              <tr><th width="20%" ></th width="75%"><th></th></tr>
              <tr>
                <td>Student ID :</td>
                <td><? echo $row['student_id']; ?></td>
              </tr>
              <tr>
                <td>Class Roll :</td>
                <td><? echo $row['class_roll']; ?></td>
              </tr>
              <tr>
                <td>Board Roll :</td>
                <td><? echo $row['board_roll']; ?></td>
              </tr>
              <tr>
                <td>Reg No :</td>
                <td><? echo $row['board_reg']; ?></td>
              </tr>
              <tr>
                <td>Email :</td>
                <td><? echo $row['email']; ?></td>
              </tr>
              <tr>
                <td>Phone No :</td>
                <td><? echo $row['phone_no']; ?></td>
              </tr>
              <tr>
                <td>Home Phone :</td>
                <td><? echo $row['other_phone']; ?></td>
              </tr>
              <tr>
                <td>Gender :</td>
                <td><? echo $row['gender']; ?></td>
              </tr>
              <tr>
                <td>Class Name :</td>
                <td><? echo $row['fk_class_id']; ?></td>
              </tr>
              <tr>
                <td>Father Name :</td>
                <td><? echo $row['father_name']; ?></td>
              </tr>
              <tr>
                <td>Mother Name :</td>
                <td><? echo $row['mother_name']; ?></td>
              </tr>
              <tr>
                <td>Current Adress :</td>
                <td><? echo $row['address']; ?></td>
              </tr>
              <tr>
                <td>Permanent Adress :</td>
                <td><? echo $row['p_address']; ?></td>
              </tr>
              <tr>
                <td>Birth Certificate No :</td>
                <td><? echo $row['birth_certificate']; ?></td>
              </tr>
              <tr>
                <td>National ID :</td>
                <td><? echo $row['national_id']; ?></td>
              </tr>
              <tr>
                <td>Date of Birth :</td>
                <td><? echo $row['date_of_birth']; ?></td>
              </tr>
              <tr>
                <td>Blood Group :</td>
                <td><? echo $row['blood_group']; ?></td>
              </tr>
            </table>
          </div><!-- Teacher Info -->
          
          <div class="col-md-3" align="center">
          <div class="col-md-12 right">
            <div class="active_btn">
              <? if($row['status']=='1') echo "<i class='fa fa-check-circle success'></i> Active"; else if($row['status']=='0') echo "<i class='fa fa-ban danger'></i> Inactive"; ?>
            </div>
            </div>
            <img src="<?php echo URL; ?>public/img/students/<? echo $row['students_image']; ?>" alt="students" width="200" height="190">
            
            
          </div><!-- Teacher Image -->
          
        </div>
      </div><!-- /.tab-pane 1 -->

      <div class="tab-pane " id="tab_2">
        <div class='row' >
        <div class="col-md-9">
          <form class="form-horizontal" action='<? echo URL; ?>students/studentsUpdate' method='POST' enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>" >
      <div class="box-body col-sm-12">
        <div class="form-group">
          <label for="studentsTitle" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-9">
          <input type="text" name="name" class="form-control" id="studentsTitle" value="<? echo $row['name']; ?>" required>
          </div>
        </div>
        <div class="form-group">
          <label for="studentsTitle" class="col-sm-3 control-label">Student ID</label>
          <div class="col-sm-9">
          <input type="text" name="student_id" class="form-control" id="studentsTitle" value="<? echo $row['student_id']; ?>" required>
          </div>
        </div>
        <div class="form-group">
          <label for="clsRoll" class="col-sm-3 control-label">Class Roll</label>
          <div class="col-sm-9">
          <input type="text" name="class_roll" class="form-control" id="clsRoll" value="<? echo $row['class_roll']; ?>" required>
        </div>
        </div>
        <div class="form-group">
          <label for="brdRoll" class="col-sm-3 control-label">Board Roll</label>
          <div class="col-sm-9">
          <input type="text" name="board_roll" class="form-control" id="brdRoll" value="<? echo $row['board_roll']; ?>" required>
          </div>
        </div>
        <div class="form-group">
          <label for="regNo" class="col-sm-3 control-label">Board Reg No.</label>
          <div class="col-sm-9">
          <input type="text" name="board_reg" class="form-control" id="regNo" value="<? echo $row['board_reg']; ?>" required>
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="col-sm-3 control-label">Email</label>
          <div class="col-sm-9">
          <input type="email" name="email" class="form-control" id="email" value="<? echo $row['email']; ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="cell" class="col-sm-3 control-label">Phone No</label>
          <div class="col-sm-9">
          <input type="text" name="phone_no" class="form-control" id="cell" value="<? echo $row['phone_no']; ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="other_phone" class="col-sm-3 control-label">Home Phone</label>
          <div class="col-sm-9">
          <input type="text" name="other_phone" class="form-control" id="other_phone" value="<? echo $row['other_phone']; ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="fk_class_id" class="col-sm-3 control-label">Class Name</label>
          <div class="col-sm-9">
            <select  name="fk_class_id" class="form-control" id="subjectsDes" required>
              <option value=''>--select--</option>
              <? foreach ($results['class'] as $classes) {?>
                <option value="<? echo $classes['id']; ?>" <?php echo($classes['id']==$row['fk_class_id'])?'selected':'' ?> ><? echo $classes['name']; ?></option>
             <? } ?>
              </select>
          </div>
        </div>
        <div class="form-group">
          <label for="fk_section_id" class="col-sm-3 control-label">Section</label>
          <div class="col-sm-9">
          <select  name="fk_section_id" class="form-control" id="subjectsDes" required>
              <option value=''>--select--</option>
              <? foreach ($results['section'] as $section) {?>
                <option value="<? echo $section['id']; ?>" <?php echo($section['id']==$row['fk_section_id'])?'selected':'' ?> ><? echo $section['name']; ?></option>
             <? } ?>
              </select>
          </div>
        </div>
        <div class="form-group">
          <label for="fk_group_id" class="col-sm-3 control-label">Group</label>
          <div class="col-sm-9">
          <select  name="fk_group_id" class="form-control" id="subjectsDes" required>
              <option value=''>--select--</option>
              <? foreach ($results['group'] as $group) {?>
                <option value="<? echo $group['id']; ?>" <?php echo($group['id']==$row['fk_group_id'])?'selected':'' ?> ><? echo $group['name']; ?></option>
             <? } ?>
              </select>
          </div>
        </div>
        <div class="form-group">
          <label for="fk_session_id" class="col-sm-3 control-label">Session</label>
          <div class="col-sm-9">
          <select  name="fk_session_id" class="form-control" id="subjectsDes" required>
              <option value=''>--select--</option>
              <? foreach ($results['session'] as $session) {?>
                <option value="<? echo $session['id']; ?>" <?php echo($session['id']==$row['fk_session_id'])?'selected':'' ?> ><? echo $session['name']; ?></option>
             <? } ?>
              </select>
          </div>
        </div>
        <div class="form-group">
          <label for="gender" class="col-sm-3 control-label">Gender</label>
          <div class="col-sm-9">
            <select name="gender" class="form-control" id="gender">
              <option value="male" <?php echo($row['gender']=='male')?'selected':'' ?> >Male</option>
              <option value="female" <?php echo($row['gender']=='female')?'selected':'' ?>>Female</option>
              <option value="Other" <?php echo($row['gender']=='other')?'selected':'' ?>>Other</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="father" class="col-sm-3 control-label">Father Name</label>
          <div class="col-sm-9">
          <input type="text" name="father_name" class="form-control" id="father" value="<? echo $row['father_name']; ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="mother_name" class="col-sm-3 control-label">Mother Name</label>
          <div class="col-sm-9">
          <input type="text" name="mother_name" class="form-control" id="mother_name" value="<? echo $row['mother_name']; ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="studentsDes" class="col-sm-3 control-label">Current Address</label>
          <div class="col-sm-9">
          <textarea name="address" class="form-control" id="studentsDes" rows="3"><? echo $row['address']; ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="p_address" class="col-sm-3 control-label">Permanent Address</label>
          <div class="col-sm-9">
          <textarea name="p_address" class="form-control" id="p_address" rows="3"><? echo $row['p_address']; ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="birth" class="col-sm-3 control-label">Birth Certificate No</label>
          <div class="col-sm-9">
          <textarea name="birth_certificate" class="form-control" id="birth" rows="1"><? echo $row['birth_certificate']; ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="national" class="col-sm-3 control-label">National ID</label>
          <div class="col-sm-9">
          <textarea name="national_id" class="form-control" id="national" rows="1"><? echo $row['national_id']; ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="blood_group" class="col-sm-3 control-label">Blood Group</label>
          <div class="col-sm-9">
          <input type="text" name="blood_group" class="form-control" id="blood_group" value="<? echo $row['blood_group']; ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="date_of_birth" class="col-sm-3 control-label">Date of Birth</label>
          <div class="col-sm-9">
          <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" value="<? echo $row['date_of_birth']; ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="studentsImg" class="col-sm-3 control-label">Image</label>
          <div class="col-sm-9">
          <input type="file" name="students_image" class="form-control" id="studentsImg">
          </div>
        </div>
        <div class="form-group">
          <label for="status"  class="col-sm-3 control-label">Status:</label>
          <div class="col-sm-9">
            <div class="radio">
              <label>
                <input type="radio" name="status" value="1" <?php echo ($row['status']=='1')?'checked':'' ?> > Active
              </label>
                <label>
                  <input type="radio" name="status" value="0" <?php echo ($row['status']=='0')?'checked':'' ?>> Inactive
                </label>
            </div>
          </div>
        </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <button type="submit" class="btn btn-success">Save Change</button>
            </div>
          </div>
      </div><!-- /.box-body -->
    </form>
        </div>
        <div class="col-md-3">
          <img src="<?php echo URL; ?>public/img/students/<? echo $row['students_image']; ?>" alt="students" width="200" height="190">
        </div>
  </div>
      </div><!-- /.tab-pane 2 -->
<!-- ========== Tab pane 3 Change Password ============= -->
      <div class="tab-pane" id="tab_3">
        <form class="form-horizontal" action='<? echo URL; ?>students/changePassword' method='POST'>
          <input type="hidden" name="id" value="<?php echo $row['id']; ?>" >
              
              <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Old Password</label>
                <div class="col-sm-9">
                <input type="password" name="oldPassword" class="form-control" id="password" placeholder="Old Password" required>
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-sm-3 control-label">New Password</label>
                <div class="col-sm-9">
                <input type="password" name="newPassword" class="form-control" id="password" placeholder="New Password" required>
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Confirm Password</label>
                <div class="col-sm-9">
                <input type="password" name="password" class="form-control" id="password" placeholder="Confirm Password" required>
                </div>
              </div> 
          
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-success">Save Change</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </form>
      </div><!-- End tab 3 -->
     
    </div><!-- /.tab-content -->
  </div><!-- nav-tabs-custom -->
</div>
<script type="text/javascript">

function deleteConfirm(){
  var con= confirm("Do you want to delete?");
  if(con){
    return true;
  }else 
  return false;
}

</script>