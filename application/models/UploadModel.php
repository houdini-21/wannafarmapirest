
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UploadModel extends CI_Model
{

    function uploadPicturePerson($data)
    {
        // upload data to wf_fotos_user
        $this->db->insert("wf_fotos_user", $data);
        return $this->db->insert_id();
    }
}
