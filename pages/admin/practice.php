<h3 align="center">Insert Update Delete Data using Codeigniter</h3><br />  
<form method="post" action="<?php echo base_url() ?>main/form_validation">  
    <?php
    if ($this->uri->segment(2) == "inserted") {
        //base url - http://localhost/tutorial/codeigniter  
        //redirect url - http://localhost/tutorial/codeigniter/main/inserted  
        //main - segment(1)  
        //inserted - segment(2)  
        echo '<p class="text-success">Data Inserted</p>';
    }
    if ($this->uri->segment(2) == "updated") {
        echo '<p class="text-success">Data Updated</p>';
    }
    ?>  
    <?php
    if (isset($user_data)) {
        foreach ($user_data->result() as $row) {
            ?>  
            <div class="form-group">  
                <label>Enter First Name</label>  
                <input type="text" name="first_name" value="<?php echo $row->first_name; ?>" class="form-control" />  
                <span class="text-danger"><?php echo form_error("first_name"); ?></span>  
            </div>  
            <div class="form-group">  
                <label>Enter Last Name</label>  
                <input type="text" name="last_name" value="<?php echo $row->last_name; ?>" class="form-control" />  
                <span class="text-danger"><?php echo form_error("last_name"); ?></span>  
            </div>  
            <div class="form-group">  
                <input type="hidden" name="hidden_id" value="<?php echo $row->id; ?>" />  
                <input type="submit" name="update" value="Update" class="btn btn-info" />  
            </div>       
        <?php
    }
} else {
    ?>  
        <div class="form-group">  
            <label>Enter First Name</label>  
            <input type="text" name="first_name" class="form-control" />  
            <span class="text-danger"><?php echo form_error("first_name"); ?></span>  
        </div>  
        <div class="form-group">  
            <label>Enter Last Name</label>  
            <input type="text" name="last_name" class="form-control" />  
            <span class="text-danger"><?php echo form_error("last_name"); ?></span>  
        </div>  
        <div class="form-group">  
            <input type="submit" name="insert" value="Insert" class="btn btn-info" />  
        </div>       
    <?php
}
?>  
</form>