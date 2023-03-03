<?php
class dashboradcat extends controller
{
    public function __construct()
    {
        $this->admin();
        $this->model('Database');
        $dashborad = $this->model('crud');
        $this->view('dashboradcat', ['read' => $dashborad->dashboradcat()]);
    }
}
