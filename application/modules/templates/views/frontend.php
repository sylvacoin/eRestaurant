


<?php $this->load->view('assets/header');

if (!isset($view_file)) {
    $view_file = "";
}

if (!isset($module)) {
    $module = $this->uri->segment(1);
}

if ($view_file != "" && $module != "") {
    $path = $module . '/' . $view_file;
    $this->load->view($path);
} else {
    echo nl2br($body);
}

$this->load->view('assets/frontend-footer');
