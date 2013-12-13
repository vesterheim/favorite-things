<?php

$this->load->helper('form');

echo validation_errors();

echo form_open(NULL, array('class' => 'form-inline'));
echo form_fieldset('Rate this artifact');
echo '<div class="text-center">';
for ($i = 1; $i <= 10; $i++) 
{
	echo form_label(

		(($i === 1) ? '<i class="glyphicon glyphicon-thumbs-down"></i> ' : '') . 		
		form_radio(
			array(
				'checked' => (set_radio('rating', $i) || ($rated == $i) ? 'checked="checked"' : FALSE),
				'name' => 'rating',
				'class' => 'rating_radio',
				'value' => $i
			)
		) . 
		" $i ".
		(($i === 10) ? '<i class="glyphicon glyphicon-thumbs-up"></i>' : ''), 
		NULL,
		array('class' => 'radio rating_radio_label')
	);
}
echo '<div style="margin-top:7px;margin-bottom:7px;">';
$submit = array(
	'class' => 'btn btn-primary',
	'name' => 'submit'
);
echo form_submit($submit,
	'Rate it!'
);
echo '</div>';
echo '</div>';
echo form_fieldset_close(); 
echo form_close();