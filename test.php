<h5 class="text-center"><strong>SPONSOR AND NEXT OF KIN DETAILS</strong></h5>
    <hr>

    <div class="row">
        <div class="col-6">
        <label> <strong>Sponsor's Name:  </strong></label><input name="sponsor_name" style="width: 200px;" class="float-right" type="text" value="<?php echo ucfirst($usersData['sponsor_name']); ?>" ><br>
        <label> <strong>Sponsor's Address: </strong></label><input name="sponsor_address" type="text" style="width: 200px;" class="float-right" value="<?php echo ucfirst($usersData['sponsor_address']); ?>" ><br>
        <label> <strong>Sponsor's Mobile No: </strong></label><input name="sponsor_gsm" type="text" style="width: 200px;" class="float-right" value="<?php echo ucfirst($usersData['sponsor_gsm']); ?>" ><br>
        <label> <strong>Sponsor's Email:        </strong></label><input name="sponsor_email" type="text" style="width: 200px;" class="float-right" value="<?php echo ucfirst($usersData['sponsor_email']); ?>" ><br>
        <label> <strong>Relationship: </strong></label><input name="sponsor_relationship" type="text" style="width: 200px;" class=" form-control float-right" value="<?php echo ucfirst($usersData['sponsor_relationship']); ?>"><br>       
        </div>
        <div class="col-6">
        <label> <strong>Next of Kin Name:  </strong></label><input name="guardian" style="width: 200px;" class="float-right" type="text" value="<?php echo ucfirst($usersData['guardian']); ?>"><br>
        <label> <strong>Next of Kin Address: </strong></label><input name="guardian_address" type="text" style="width: 200px;" class="float-right" value="<?php echo ucfirst($usersData['guardian_address']); ?>"><br>
        <label> <strong>Next of Kin Mobile No: </strong></label><input name="guardian_gsm" type="text" style="width: 200px;" class="float-right" value="<?php echo ucfirst($usersData['guardian_gsm']); ?>"><br>
        <label> <strong>Next of Kin Email:        </strong></label><input name="guardian_email" type="text" style="width: 200px;" class="float-right" value="<?php echo ucfirst($usersData['guardian_email']); ?>"><br>
        <label> <strong>Relationship: </strong></label><input name="guardian_relationship" type="text" style="width: 200px;" class="form-control float-right" value="<?php echo ucfirst($usersData['sponsor_relationship']); ?>" ><br>       
        </div>
    </div>