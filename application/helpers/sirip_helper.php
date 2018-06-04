<?php
function cmb_dinamis($name,$table,$field,$pk,$selected=null,$extra=null){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control form-control input-sm custom-select' $extra>";
    $cmb .= "<option value=''>- Pilih -</option>";
    $data = $ci->db->get($table)->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;
}

function select2_dinamis($name,$table,$field,$placeholder){
    $ci = get_instance();
    $select2 = '<select name="'.$name.'" class="form-control select2 select2-hidden-accessible" multiple=""
               data-placeholder="'.$placeholder.'" style="width: 100%;" tabindex="-1" aria-hidden="true">';
    $data = $ci->db->get($table)->result();
    foreach ($data as $row){
        $select2.= ' <option>'.$row->$field.'</option>';
    }
    $select2 .='</select>';
    return $select2;
}




function dropdown($name,$table,$field,$pk,$class,$kondisi=null,$selected=null,$data=null,$tags=null)
{
    $CI =& get_instance();
   echo"<select name='".$name."' class='span$class' $tags>";
        if($data!='')
        {
            foreach ($data as $data_value => $id)
            {
                echo "<option value='$id'>$data_value</option>";
            }
        }
        if(empty($kondisi))
        {
            $CI->db->order_by($field,'ASC');
            $record=$CI->db->get($table)->result();
        }
        else
        {
            $CI->db->order_by($field,'ASC');
            $record=$CI->db->get_where($table,$kondisi)->result();
        }
        foreach ($record as $r)
        {
            echo " <option value='".$r->$pk."' ";
            echo $r->$pk==$selected?'selected':'';
            echo ">".strtoupper($r->$field)."</option>";
        }
            echo"</select>";
}



?>
