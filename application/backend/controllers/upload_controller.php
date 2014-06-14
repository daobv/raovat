<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once('Controller.php');
define('UPLOAD_PATH', FCPATH . '../assets/uploads/product/');
class Upload_controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'file'));
    }

    public function index()
    {
        $this->load->view('upload/img_upload', array('error' => ''));
    }

    public function do_upload()
    {
        $upload_path_url = base_url() . 'assets/uploads/product/';

        $config['upload_path'] = UPLOAD_PATH;
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '30000';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            //Load the list of existing files in the upload directory
            $existingFiles = get_dir_file_info($config['upload_path']);
            $foundFiles = array();
            $f = 0;
            foreach ($existingFiles as $fileName => $info) {
                if ($fileName != 'thumbs') { //Skip over thumbs directory
                    //set the data for the json array
                    $foundFiles[$f]['name'] = $fileName;
                    $foundFiles[$f]['size'] = $info['size'];
                    $foundFiles[$f]['url'] = $upload_path_url . $fileName;
                    $foundFiles[$f]['thumbnailUrl'] = $upload_path_url . 'thumbs/' . $fileName;
                    $foundFiles[$f]['deleteUrl'] = base_url() . 'admin/upload/deleteImage/' . $fileName;
                    $foundFiles[$f]['deleteType'] = 'DELETE';
                    $foundFiles[$f]['error'] = null;

                    $f++;
                }
            }
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('files' => $foundFiles)));
        } else {
            $data = $this->upload->data();
            // to re-size for thumbnail images un-comment and set path here and in json array
            $config = array();
            $config['image_library'] = 'gd2';
            $config['source_image'] = $data['full_path'];
            $config['create_thumb'] = TRUE;
            $config['new_image'] = $data['file_path'] . 'thumbs/';
            $config['maintain_ratio'] = TRUE;
            $config['thumb_marker'] = '';
            $config['width'] = 75;
            $config['height'] = 50;

            if (!is_dir($config['new_image'])) mkdir($config['new_image']);
            else if (!is_writeable($config['new_image'])) chmod($config['new_image'], 0777);
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();


            //set the data for the json array
            $info = new StdClass;
            $info->name = $data['file_name'];
            $info->size = $data['file_size'] * 1024;
            $info->type = $data['file_type'];
            $info->url = $upload_path_url . $data['file_name'];
            // I set this to original file since I did not create thumbs.  change to thumbnail directory if you do = $upload_path_url .'/thumbs' .$data['file_name']
            $info->thumbnailUrl = $upload_path_url . 'thumbs/' . $data['file_name'];
            $info->deleteUrl = base_url() . 'admin/upload/deleteImage/' . $data['file_name'];
            $info->deleteType = 'DELETE';
            $info->error = null;

            $files[] = $info;
            echo json_encode(array("files" => $files));
        }
    }

    public function deleteImage($file)
    { //gets the job done but you might want to add error checking and security
        $success = unlink(UPLOAD_PATH . $file);
        $success = unlink(UPLOAD_PATH . 'thumbs/' . $file);
        //info to see if it is doing what it is supposed to
        $info = new StdClass;
        $info->sucess = $success;
        $info->path = base_url() . 'assets/uploads/product/' . $file;
        $info->file = is_file(UPLOAD_PATH . $file);

        echo json_encode(array($info));
    }

}