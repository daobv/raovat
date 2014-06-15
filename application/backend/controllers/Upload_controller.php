<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once('Controller.php');
define('UPLOAD_PATH', FCPATH . '../assets/uploads/');
class Upload_controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'file'));
        $this->setArea('admin+mod');
    }

    public function index()
    {
        $id = (int)$this->uri->segment(3);
        $this->load->view('upload/img_upload', array('error' => '', 'id'=>$id));
    }

    public function do_upload()
    {
        $id = isset($_POST['id'])? $_POST['id'] : (int)$this->uri->segment(3);
        if ($this->getModel('product_model')->record_count(array('id'=>$id))==0) return;

        $upload_path_url = base_url() . 'assets/uploads/';

        $config['upload_path'] = UPLOAD_PATH;
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '30000';

        $this->load->library('upload', $config);
        $productMeta = $this->getModel('product_meta_model');

        if (!$this->upload->do_upload()) {
            //Load the list of existing files in the upload directory
            $images = $productMeta->getGallery($id);
            $existingFiles = array();
            foreach ($images as $img) {
                $existingFiles[$img] = get_file_info($config['upload_path'] . $img);
            }
            $foundFiles = array();
            $f = 0;
            foreach ($existingFiles as $fileName => $info) {
                if ($fileName != 'thumbs') { //Skip over thumbs directory
                    //set the data for the json array
                    $foundFiles[$f]['name'] = $fileName;
                    $foundFiles[$f]['size'] = $info['size'];
                    $foundFiles[$f]['url'] = $upload_path_url . $fileName;
                    $foundFiles[$f]['thumbnailUrl'] = $upload_path_url . 'thumbs/' . $fileName;
                    $foundFiles[$f]['deleteUrl'] = base_url() . 'admin/upload/deleteImage/' . $id . '_' . $fileName;
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
            $savedName = $data['file_name'];
            if ($productMeta->getGallery($id)) {
                $images = $productMeta->getGallery($id);
                if (!in_array($savedName, $images)) {
                    $productMeta->addGallery($savedName, $id);
                }
            } else {
                $productMeta->addGallery($savedName, $id);
            }

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
            $info->deleteUrl = base_url() . 'admin/upload/deleteImage/' . $id . '_' . $data['file_name'];
            $info->deleteType = 'DELETE';
            $info->error = null;

            $files[] = $info;
            echo json_encode(array("files" => $files));
        }
    }

    public function deleteImage($file)
    {
        if (preg_match('/([0-9]+)_(.*)/', $file, $m)) {
            $id = $m[1];
            $fileName = $m[2];
            $file = preg_replace('/([0-9]+)_/', '', $file);
            if ($this->getModel('product_model')->record_count(array('id' => $id)) == 0) return;
            $success = false;
            if (is_file(UPLOAD_PATH . $file))
                $success = unlink(UPLOAD_PATH . $file);
            if (is_file(UPLOAD_PATH . 'thumbs/' . $file))
                $success = unlink(UPLOAD_PATH . 'thumbs/' . $file);

            //Delete from database:
            $productMeta = $this->getModel('product_meta_model');
            $images = $productMeta->getGallery($id);
            if (is_array($images) && in_array($fileName, $images)) {
                $productMeta->rmGallery($fileName, $id);
            }

            //info to see if it is doing what it is supposed to
            $info = new StdClass;
            $info->success = $success;
            $info->path = base_url() . 'assets/uploads/' . $file;
            $info->file = is_file(UPLOAD_PATH . $file);

            echo json_encode(array($info));
        } else return;
    }
}