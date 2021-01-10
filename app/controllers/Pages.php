<?php

class Pages extends Controller
{
    public function __construct()
    {
        $this->lodgeModel = $this->model('lodge');     
    }
    public function index()
    {
  
        $data = [
            'title' => 'Online lodge booking system',
            'description' => 'Final research project by Placide mwiseneza'
        ];
        $data['lodges']= $this->lodgeModel->fetchAllLodges();
        $data['rooms']= $this->lodgeModel->fetchPopularRooms();
        $this->view('pages/index', $data);
    }
    public function about()
    {
        $data = [
            'title' => 'About Us',
            'description' => 'Booking lodges online'
        ];
        $this->view('pages/about', $data);
    }
    public function contact()
    {
        $this->view('pages/contact');

    }
}
