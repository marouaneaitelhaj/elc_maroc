<?php
class dashboradcat extends controller
{
    public function __construct()
    {
        $this->model('Database');
        $dashborad = $this->model('crud');
        $this->view('dashboradcat', ['read' => $dashborad->dashboradcat()]);
    }
}
