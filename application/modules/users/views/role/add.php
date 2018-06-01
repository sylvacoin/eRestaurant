<?= form_open((is_numeric($this->uri->segment(3)) ? 'role/edit/' . $id : 'role/add'), 'class="form-horizontal"') ?>
<div class="form-group">
<input type="text" placeholder="Role name" value="<?= isset($role) ? $role : set_value('role'); ?>" name="role" class="form-control1">
</div>
<div class="form-group">
	<div class="checkbox-inline1">
		<label>
			<input value="1" type="checkbox" name="priv[cm_users]" id="cm_users" <?= isset($priv['cm_users']) && $priv['cm_users'] == 1 ? 'checked' : set_value('priv[cm_users]'); ?> /> 
			can manage users
		</label>
    </div>

    <div class="checkbox-inline1">
		<label>
			<input value="1" type="checkbox" name="priv[cm_posts]" id="cm_posts" <?= isset($priv['cm_posts']) && $priv['cm_posts'] == 1 ? 'checked' : set_value('priv[cm_posts]'); ?> /> 
			can manage posts
		</label>
    </div>

	<div class="checkbox-inline1">
		<label>
			<input value="1" type="checkbox" name="priv[cm_roles]" id="cm_roles"
		   <?= isset($priv['cm_roles']) && $priv['cm_roles'] == 1 ? 'checked' : set_value('priv[cm_roles]'); ?> />  
			can manage site
		</label>
    </div>

    <div class="checkbox-inline1">
		<label>
			<input value="1" type="checkbox" name="priv[cm_site]" id="cm_site"
		   <?= isset($priv['cm_site']) && $priv['cm_site'] == 1 ? 'checked' : set_value('priv[cm_site]'); ?> /> 
			can manage roles
		</label>
    </div>

    <div class="checkbox-inline1">
		<label>
			<input value="1" type="checkbox" name="priv[cm_page]" id="cm_page"
		   <?= isset($priv['cm_page']) && $priv['cm_page'] == 1 ? 'checked' : set_value('priv[cm_page]'); ?> />  
			can manage pages
		</label>
    </div>

    <div class="checkbox-inline1">
		<label>
			<input value="1" type="checkbox" name="priv[cs_sms]" id="cs_sms"
		   <?= isset($priv['cs_sms']) && $priv['cs_sms'] == 1 ? 'checked' : set_value('priv[cs_sms]'); ?> /> 
			can manage SMS
		</label>
    </div>

    <div class="checkbox-inline1">
		<label>
			<input value="1" type="checkbox" name="priv[cm_tasks]" id="cm_tasks"
		   <?= isset($priv['cm_tasks']) && $priv['cm_tasks'] == 1 ? 'checked' : set_value('priv[cm_tasks]'); ?> /> 
			can manage tasks
		</label>
    </div>

    <div class="checkbox-inline1">
		<label>
			<input value="1" type="checkbox" name="priv[cm_loc]" id="cm_loc"
		   <?= isset($priv['cm_loc']) && $priv['cm_loc'] == 1 ? 'checked' : set_value('priv[cm_loc]'); ?> /> 
			can manage locations
		</label>
    </div>

    <div class="checkbox-inline1">
		<label>
			<input value="1" type="checkbox" name="priv[cm_biz]" id="cm_biz"
		   <?= isset($priv['cm_biz']) && $priv['cm_biz'] == 1 ? 'checked' : set_value('priv[cm_biz]'); ?> /> 
			can manage business
		</label>
    </div>
</div>
<div class="form-group">
    <div class="checkbox-inline1">
		<label>
			<input value="1" type="checkbox" name="default" id="default" <?= isset($default) && $default == 1 ? 'checked' : set_value('default'); ?> />
			click to set role as default role for new users
		</label>
    </div>
</div>
<div class="form-group">
<input type="submit" class="btn btn-success" value="Save Role"/>
</div>
<?= form_close() ?>
	    