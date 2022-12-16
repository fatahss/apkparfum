<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Pdf_model extends CI_Model
{
    public function getPdfIjazah()
    {
        $query = "SELECT `user`.*, `legalisir`.`pdfijazah`
                  FROM `user` JOIN `legalisir`
                  ON `user`.`pdfijazah` = `legalisir`.`pdfijazah`
                ";
        return $this->db->query($query)->result_array();
    }

   
}



